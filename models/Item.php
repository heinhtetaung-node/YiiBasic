<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Item extends ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	public static function tableName()
	{
		return '{{item}}';
	}

	public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function rules()
	{
		return [
			[['item_name', 'item_price'], 'required'],
			//['item_price', ['numerical', 'min' => 1, 'max' => 100000, 'intergerOnly' => true, 'tooSmall' => 'You must at least1', 'tooBig'=>'more than 100000']]
			['item_price', 'number'],
			['item_description','default'],  // means that no validation for that field
			['cat_id', 'default']
		];
	}

}