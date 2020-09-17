<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "lesson_plan".
 *
 * @property int $lesson_plan_id
 * @property int $gruppa_id
 * @property int $subject_id
 * @property int $user_id
 */
class LessonPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_plan_id', 'gruppa_id', 'subject_id', 'user_id'], 'required'],
            [['lesson_plan_id', 'gruppa_id', 'subject_id', 'user_id'], 'integer'],
            [['lesson_plan_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lesson_plan_id' => 'Lesson Plan ID',
            'gruppa_id' => 'Gruppa ID',
            'subject_id' => 'Subject ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return LessonPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LessonPlanQuery(get_called_class());
    }
    public function getGruppa(){
        return $this->hasOne(Gruppa::className(),['lesson_plan_id' =>
'lesson_plan_id']);
    }
    public function getTeacher(){
        return $this->hasOne(Teacher::className(),['user_id' =>
'user_id']);
    }
    public function getSubject(){
        return $this->hasOne(Subject::className(),['subject_id' =>
'subject_id']);
    }
    public function Schedule(){
        return $this->hasMany(Schedule::className(),['schedule_id' =>
'schedule_id']);
    }
}
