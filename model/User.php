<?php

namespace model;

use model\extend\Model;
/**
 *
 * @property int    id
 * @property string login
 * @property string email
 * @property int    type
 * @property string password
 * @property string image
 */

class User extends Model {

    public static function tableName(){
        return 'users';
    }
}
