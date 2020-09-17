<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $lastname
 * @property string $firstname
 * @property string|null $patronymic
 * @property string|null $login
 * @property string|null $pass
 * @property string $token
 * @property int|null $expired_at
 * @property int $gender_id
 * @property string|null $birthday
 * @property int $active
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'lastname', 'firstname', 'token', 'gender_id', 'active'], 'required'],
            [['user_id', 'expired_at', 'gender_id', 'active'], 'integer'],
            [['birthday'], 'safe'],
            [['lastname', 'firstname', 'patronymic', 'login'], 'string', 'max' => 50],
            [['pass', 'token'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'patronymic' => 'Patronymic',
            'login' => 'Login',
            'pass' => 'Pass',
            'token' => 'Token',
            'expired_at' => 'Expired At',
            'gender_id' => 'Gender ID',
            'birthday' => 'Birthday',
            'active' => 'Active',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\queries\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\queries\UserQuery(get_called_class());
    }
    public function getGender(){
        return $this->hasOne(Gender::className(),['gender_id' =>
'gender_id']);
    }
    public function getStudent(){
        return $this->hasOne(Student::className(),['user_id' =>
'user_id']);
    }
    public function getTeacher(){
        return $this->hasOne(Teacher::className(),['user_id' =>
'user_id']);
    }
}
