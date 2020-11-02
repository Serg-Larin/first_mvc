<?php

namespace components;



class DB {

    /**
     * @return \Pixie\QueryBuilder\QueryBuilderHandler;
     */
    public static function builder(){
    $config = [
    	'driver'    => 'mysql', // Db driver
    	'host'      => DB_HOST,
    	'database'  => DB_NAME,
    	'username'  => DB_USER,
    	'password'  => 'Temp123#$'
	];

	$connection = new \Pixie\Connection('mysql', $config);
	try {
    	$DB = new \Pixie\QueryBuilder\QueryBuilderHandler($connection);
    	if(!$DB){
        	throw new \mysql_xdevapi\Exception(getError(DATABASE_CONNECT_ERROR));
    	}
		} catch (Exception $e){
    echo $e->getMessage();
	}
        if($DB){
        	return $DB;
        }
    
    }

}
