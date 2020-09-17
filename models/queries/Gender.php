<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property int $gender_id
 * @property string $name
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_id', 'name'], 'required'],
            [['gender_id'], 'integer'],
            [['name'], 'string', 'max' => 10],
            [['gender_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gender_id' => 'Gender ID',
            'name' => 'Name',
        ];
    }
    public function getUsers(){
        return $this->hasMany(User::className(), ['gender_id' =>
'gender_id']);
    }
}
