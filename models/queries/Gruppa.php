<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "gruppa".
 *
 * @property int $gruppa_id
 * @property string $name
 * @property int $special_id
 * @property string $date_begin
 * @property string|null $date_end
 */
class Gruppa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gruppa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gruppa_id', 'name', 'special_id', 'date_begin'], 'required'],
            [['gruppa_id', 'special_id'], 'integer'],
            [['date_begin', 'date_end'], 'safe'],
            [['name'], 'string', 'max' => 10],
            [['gruppa_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gruppa_id' => 'Gruppa ID',
            'name' => 'Name',
            'special_id' => 'Special ID',
            'date_begin' => 'Date Begin',
            'date_end' => 'Date End',
        ];
    }
    public function getStudent(){
        return $this->hasMany(Student::className(),['user_id' =>
'user_id']);
    }
    public function getSpecial(){
        return $this->hasOne(Special::className(),['special_id' =>
'special_id']);
    }
    public function getLessonPlan(){
        return $this->hasMany(LessonPlan::className(),['lesson_plan_id' =>
'lesson_plan_id']);
    }
}
