<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Item;

class Category extends ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	public static function tableName()
	{
		return '{{category}}';
	}

	public function getItems()
    {
        return $this->hasMany(Item::className(), ['cat_id' => 'id']);
    }
}