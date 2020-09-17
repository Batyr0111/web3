<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "lesson_num".
 *
 * @property int $lesson_num_id
 * @property string $name
 * @property string $time_lesson
 */
class LessonNum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_num';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_num_id', 'name', 'time_lesson'], 'required'],
            [['lesson_num_id'], 'integer'],
            [['time_lesson'], 'safe'],
            [['name'], 'string', 'max' => 10],
            [['lesson_num_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lesson_num_id' => 'Lesson Num ID',
            'name' => 'Name',
            'time_lesson' => 'Time Lesson',
        ];
    }
    public function getSchedule(){
        return $this->hasMany(Schedule::className(),['schedule_id' =>
'schedule_id']);
    }
}
