<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classroom".
 *
 * @property int $classroom_id
 * @property string $name
 * @property int $active
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'name', 'active'], 'required'],
            [['classroom_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['classroom_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'classroom_id' => 'Classroom ID',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }
    public function getSchedule(){
        return $this->hasMany(Schedule::className(),['schedule_id' =>
'schedule_id']);
    }
}
