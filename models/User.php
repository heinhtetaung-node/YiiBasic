<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class User extends ActiveRecord
{
	//const STATUS_INACTIVE = 0;
	//const STATUS_ACTIVE = 1;

	public static function tableName()
	{
		return '{{user}}';
	}

	public function rules()
	{
		return [
			['username', 'required'],
			['username', 'unique'],
			['password','required'],  // means that no validation for that field			
		];
	}

}