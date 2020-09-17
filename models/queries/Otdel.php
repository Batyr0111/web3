<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "otdel".
 *
 * @property int $otdel_id
 * @property string $name
 * @property int $active
 */
class Otdel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'otdel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['otdel_id', 'name', 'active'], 'required'],
            [['otdel_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['otdel_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'otdel_id' => 'Otdel ID',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }
    public function getTeacher(){
        return $this->hasMany(Teacher::className(),['user_id' =>
'user_id']);
    }
    public function getSpecial(){
        return $this->hasMany(Special::className(),['special_id' =>
'special_id']);
    }
    public function getSubject(){
        return $this->hasMany(Subject::className(),['subject_id' =>
'subject_id']);
    }
}
