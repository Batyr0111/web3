<?php

namespace app\models\queries;

use Yii;

/**
 * This is the model class for table "special".
 *
 * @property int $special_id
 * @property string $name
 * @property int $otdel_id
 * @property int $active
 */
class Special extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['special_id', 'name', 'otdel_id', 'active'], 'required'],
            [['special_id', 'otdel_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['special_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'special_id' => 'Special ID',
            'name' => 'Name',
            'otdel_id' => 'Otdel ID',
            'active' => 'Active',
        ];
    }
    public function getGruppa(){
        return $this->hasMany(Gruppa::className(),['gruppa_id' =>
'gruppa_id']);
    }
    public function getOtdel(){
        return $this->hasOne(Otdel::className(),['otdel_id' =>
'otdel_id']);
    }
}
