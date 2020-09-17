<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "day".
 *
 * @property int $day_id
 * @property string $name
 */
class Day extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day_id', 'name'], 'required'],
            [['day_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['day_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'day_id' => 'Day ID',
            'name' => 'Name',
        ];
    }
    public function getSchedule(){
        return $this->hasMany(Schedule::className(),['schedule_id' =>
'schedule_id']);
    }
}
