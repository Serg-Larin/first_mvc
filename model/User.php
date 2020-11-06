<?php

namespace model;

use model\extend\ModelMutator;

/**
 *
 * @property int    id
 * @property string login
 * @property string email
 * @property int    type
 * @property string password
 * @property string image
 */

class User extends ModelMutator {
    protected $table = 'users';
}
