<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CategoryForm extends Model
{
	public $cat_name;
	
	public function rules()
	{
		return [
			['cat_name', 'required']			
		];
	}

}