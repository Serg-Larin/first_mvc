<?php

namespace model\extend;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class ModelMutator
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static Builder select($columns=['*'])
 * @method static Builder whereDate($column, $operator, $value, $boolean = 'and')
 * @method static Builder orderBy($column, $direction = 'asc')
 * @method static Builder limit($count)
 * @method static self[] get()
 * @method static self create($array)
 * @method static find($id)
 */
class ModelMutator extends Model
{

}
