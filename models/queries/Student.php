<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $user_id
 * @property int $gruppa_id
 * @property string $num_zach
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gruppa_id', 'num_zach'], 'required'],
            [['user_id', 'gruppa_id'], 'integer'],
            [['num_zach'], 'string', 'max' => 10],
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
            'gruppa_id' => 'Gruppa ID',
            'num_zach' => 'Num Zach',
        ];
    }

    /**
     * {@inheritdoc}
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentQuery(get_called_class());
    }
    
    public function getUser(){
        return $this->hasOne(User::className(),['gender_id' =>
'gender_id']);
    }
    public function getGruppa(){
        return $this->hasOne(Gruppa::className(),['gruppa_id' =>
'gruppa_id']);
    }
}
