<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $schedule_id
 * @property int $lesson_plan_id
 * @property int $day_id
 * @property int $lesson_num_id
 * @property int $classroom_id
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'lesson_plan_id', 'day_id', 'lesson_num_id', 'classroom_id'], 'required'],
            [['schedule_id', 'lesson_plan_id', 'day_id', 'lesson_num_id', 'classroom_id'], 'integer'],
            [['schedule_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'schedule_id' => 'Schedule ID',
            'lesson_plan_id' => 'Lesson Plan ID',
            'day_id' => 'Day ID',
            'lesson_num_id' => 'Lesson Num ID',
            'classroom_id' => 'Classroom ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScheduleQuery(get_called_class());
    }
    public function getClassrom(){
        return $this->hasOne(Classroom::className(),['classroom_id' =>
'classromm_id']);
    }
    public function getDay(){
        return $this->hasOne(Day::className(),['day_id' =>
'day_id']);
    }
    public function getLessonPlan(){
        return $this->hasOne(LessonPlan::className(),['lesson_plan_id' =>
'lesson_plan_id']);
    }
    public function getLessonNum(){
        return $this->hasOne(LessonNum::className(),['lesson_num_id' =>
'lesson_num_id']);
    }
}
