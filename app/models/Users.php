<?php

namespace app\models;

use Yii;
use app\models\UsersBase;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $token
 * @property string $name
 * @property string $date_created
 *
 * @property Activity[] $activities
 */
class Users extends UsersBase
{
    public $password;
    public $password_repeat;

    public function beforeValidate()
    {
        if ($this->password_repeat == $this->password) {
            return parent::beforeValidate();
        }
    }

    public function rules()
    {
        return array_merge([
            ['password', 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']],
            parent::rules());
    }
}
