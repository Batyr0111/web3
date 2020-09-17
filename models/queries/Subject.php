<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $subject_id
 * @property string $name
 * @property int $otdel_id
 * @property int $hours
 * @property int $active
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'name', 'otdel_id', 'hours', 'active'], 'required'],
            [['subject_id', 'otdel_id', 'hours', 'active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['subject_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'name' => 'Name',
            'otdel_id' => 'Otdel ID',
            'hours' => 'Hours',
            'active' => 'Active',
        ];
    }
    public function getOtdel(){
        return $this->hasOne(Otdel::className(),['otdel_id' =>
'otdel_id']);
    }
    public function getLessonPlan(){
        return $this->hasMany(LessonPlan::className(),['lesson_plan_id' =>
'lesson_plan_id']);
    }
    
}
