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

}