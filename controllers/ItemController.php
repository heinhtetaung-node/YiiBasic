<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ItemForm;
use app\models\Item;
use yii\helpers\Url;

class ItemController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $items = Item::find()->orderBy('id')->all();
        return $this->render('index', ['items'=>$items]);
    }

    public function actionCreate()
    {
        $model = new ItemForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){            
            //var_dump(Yii::$app->request->post()); echo "<hr>"; var_dump($model); exit;
            $item = new Item();
            $item->item_name = $model->item_name;
            $item->item_price = $model->item_price;
            $item->item_description = $model->item_description;            
            $res = $item->save();
            if($res==1){

                return $this->redirect(['item/index']);

                // Yii::$app->session->setFlash('success', 'the data successfully saved');
                // can use hasFlash
                // can use getFlash    
            }
            // Yii::$app->session->setFlash('success', 'Error occour in saving');            
            return $this->render('create', ['model'=>$model, 'title'=>'Create']);            
        }else{
            return $this->render('create', ['model'=>$model, 'title'=>'Create']);
        }        
    }

    public function actionEdit($id)
    {
        $item = Item::find()->where(['id' => $id])->one();
        $arr = $item->attributes; unset($arr['id']);
        $model = new ItemForm($arr);
        if($model->load(Yii::$app->request->post()) && $model->validate()){            
            $item->item_name = $model->item_name;
            $item->item_price = $model->item_price;
            $item->item_description = $model->item_description;  
            
            // $item->attributes = $model->attributes;  // this is the whole model fills to item activerecord
            // var_dump($model->attributes); 
            // var_dump($item);
            // exit;

            $res = $item->save();
            if($res==1){

                return $this->redirect(['item/index']);

                // Yii::$app->session->setFlash('success', 'the data successfully saved');
                // can use hasFlash
                // can use getFlash    
            }
            // Yii::$app->session->setFlash('success', 'Error occour in saving');            
            return $this->render('create', ['model'=>$model, 'title'=>'Edit']);            
        }else{
            return $this->render('create', ['model'=>$model, 'title'=>'Edit']);
        }     

    }

    public function actionDelete(){
        $post = Yii::$app->request->post();
        $id = $post['id'];
        $item = Item::findOne($id);
        $item->delete();
        return $this->redirect(['item/index']);
    }    

}