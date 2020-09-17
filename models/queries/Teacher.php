<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $user_id
 * @property int $otdel_id
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'otdel_id'], 'required'],
            [['user_id', 'otdel_id'], 'integer'],
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
            'otdel_id' => 'Otdel ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TeacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeacherQuery(get_called_class());
    }
    public function getUser(){
        return $this->hasMany(User::className(),['gender_id' =>
'gender_id']);
    }
    public function getLessonPlan(){
        return $this->hasMany(LessonPlan::className(),['lesson_plan_id' =>
'lesson_plan_id']);
    }
    public function getOtdel(){
        return $this->hasOne(Otdel::className(),['otdel_id' =>
'otdel_id']);
    }
}
