<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ItemForm extends Model
{
	public $item_name;
	public $item_description;
	public $item_price;

	public function rules()
	{
		return [
			[['item_name', 'item_price'], 'required'],
			//['item_price', ['numerical', 'min' => 1, 'max' => 100000, 'intergerOnly' => true, 'tooSmall' => 'You must at least1', 'tooBig'=>'more than 100000']]
			['item_price', 'number'],
			['item_description','default'],  // means that no validation for that field
		];
	}

}