<?php
namespace model\extend;

use components\Exceptions\CustomValidationException;

abstract class ActiveRecordEntity
{
    
    protected $id;

    public static function getClass($class){
        return substr($class, strrpos($class, '\\') + 1);
    }

    public function getId(): int
    {
        return $this->id;
    }
    protected function belongsTo($class,$thisColumn='',$thatColumn='',$table=''){
        $db = Db::getInstance();
        $columnIn = self::underscoreToCamelCase($thisColumn?$thisColumn:strtolower(self::getClass($class)).'_id');
        $columnOut = $thatColumn?$thatColumn:'id';
        $table = $table?$table:$class::tableName();
        $entities = $db->query(
            "SELECT * FROM " . $table . " WHERE $columnOut=:$columnOut;",
            [':'.$columnOut => $this->$columnIn],
            $class
        );
        return $entities ? $entities[0] : null;
    }
    protected function hasOne($class,$thatColumn='',$thisColumn='',$table=''){
        $db = Db::getInstance();
        $table = $table?$table:$class::tableName();
        $thisColumn = $thisColumn?$this->underscoreToCamelCase($thisColumn):'id';
        $thatColumn = $thatColumn?$thatColumn:strtolower(static::class).'_id';
        $entities = $db->query(
            "SELECT * FROM " . $table . " WHERE $thatColumn=:$thatColumn;",
            [':'.$thatColumn => $this->$thisColumn],
            $class
        );

        return $entities ? $entities[0] : null;
    }
    protected function hasMany($class,$thatColumn='',$thisColumn='',$table=''){
        $db = Db::getInstance();
        $table = $table?$table:$class::tableName();
        $thisColumn = $thisColumn?$this->underscoreToCamelCase($thisColumn):'id';
        $thatColumn = $thatColumn?$thatColumn:strtolower(static::class).'_id';
        $entities = $db->query(
            "SELECT * FROM " . $table . " WHERE $thatColumn=:$thatColumn;",
            [':'.$thatColumn => $this->$thisColumn],
            $class
        );
        return $entities ? $entities : null;
    }

    /**
     * belongsToMany - Отношение между таблицами Много ко многому.
     *
     * @param string $class - Класс с которым у нас связь
     * @param string $table - Таблица в которой у нас
     * @param string $firstJoinColumn - Колонка соответствия в первой таблице (в основном id)
     * @param string $secondJoinColumn - Колонка соответствия во второй таблице (в основном id)
     * @return array|null
     */

    protected function belongsToMany($class,$table='',$firstJoinColumn='',$secondJoinColumn='',$comparsionColum =''){
           /*
            - вытягиваем название класса с неймспейсом
            - убираем неймспейсы
            - преобразуем строку в нижний регистр
           */
          /*Класс из которого был создан метод*/
          $currentClass = strtolower(substr(strrchr(get_class($this), "\\"), 1));
          $currentClassColumn = $currentClass.'_id';
          /*Класс объект которого будет возвращен*/
          $returnDataClass = strtolower(substr(strrchr($class, "\\"), 1));

          /*Таблица связей*/
          $db = Db::getInstance();
          $joinTable = $class::tableName();

          $firstJoinColumn = $firstJoinColumn?$firstJoinColumn:'id';

          $secondJoinColumn = $secondJoinColumn?$secondJoinColumn:$returnDataClass.'_id';

          $entities = $db->query(
            "SELECT * FROM  $joinTable as j JOIN $table as i ON j.$firstJoinColumn = i.$secondJoinColumn WHERE i.$currentClassColumn=:id;",
            [':id'=>$this->id],
            $class
          );
        return $entities ? $entities : null;

    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();

        $entities = $db->query(
            'SELECT * FROM `' . static::tableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function getByColumn(string $column, $value): ?self
    {
        $db = Db::getInstance();

        $entities = $db->query(
            'SELECT * FROM `' . static::tableName() . '` WHERE '.$column.'=:value;',
            [':value' => $value],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public function delete() : void
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::tableName() . '` WHERE id=:id;',
            [':id' => $this->id]
        );
    }

    public static function setTableName($tableName){
        static::$tableName = $tableName;
    }
    public function getByColumnName($columnName,$value)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::tableName() . "` WHERE $columnName=:$columnName;",
            [":$columnName" => $value],
            static::class );
        return $entities ? $entities[0] : null;
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }

        return $mappedProperties;
    }

    /**
     * save - сохраняет текущий объект в базу данных
     *
     * @return bool
     */

    public function save(){
        $mappedProperties = $this->mapPropertiesToDbFormat();

        if($this->id!==null){

            return  $this->update($mappedProperties);

        }
        else{

            return $this->insert($mappedProperties);
        }

    }

    private function update($properties){
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($properties as $column => $value) {
            $param = ':param' . $index; 
            $columns2params[] = $column . ' = ' . $param;
            $params2values[$param] = $value; 
            $index++;
        }
        $sql = 'UPDATE ' . static::tableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;

        $db = Db::getInstance();
        return $db->query($sql, $params2values, static::class);
    }

    private function insert(array $mappedProperties)
    {
        $filteredProperties = array_filter($mappedProperties);

        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filteredProperties as $columnName => $value) {
            $columns[] = '`' . $columnName. '`';
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);

        $sql = 'INSERT INTO ' . static::tableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
        return $this->id;
    }



    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

   
    public static function findAll()
    {
        $db = Db::getInstance();
//        dd(static::tableName());
        return $db->query('SELECT * FROM `' . static::tableName() . '`;', [], static::class);
    }

    protected static function tableName(){}


}
