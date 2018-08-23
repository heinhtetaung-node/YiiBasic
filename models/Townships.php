<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "townships".
 *
 * @property int $id
 * @property string $township_name
 * @property string $township_code
 * @property int $country_id
 * @property int $state_id
 *
 * @property Country $country
 * @property State $state
 */
class Townships extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'townships';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['township_name', 'township_code'], 'required'],
            [['country_id', 'state_id'], 'integer'],
            [['township_name', 'township_code'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'township_name' => 'Township Name',
            'township_code' => 'Township Code',
            'country_id' => 'Country ID',
            'state_id' => 'State ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
}
