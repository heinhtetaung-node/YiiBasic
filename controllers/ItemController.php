<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Item;
use app\models\Category;
use yii\helpers\Url;

class ItemController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['login', 'logout', 'signup'],  if not contain only, this means all
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],   // this mean all login user can access index action
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['authorRole','adminRole', 'editorRole'],   // this mean author can access index and create actions
                    ],
                    [
                        'allow' => true,
                        'actions' => ['edit', 'delete'],
                        'roles' => ['adminRole', 'editorRole'],   // this mean 'adminRole', 'editorRole' can access 'create', 'edit', 'delete'
                    ]                     
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $items = Item::find()->orderBy('item.id')
                             ->addSelect(['item.*', 'category.cat_name AS c_name'])
                             ->leftJoin('category', '`item`.`cat_id` = `category`.`id`')
                             ->asArray()
                             ->all();
        
        return $this->render('index', ['items'=>$items]);
    }

    public function actionCreate()
    {
        $item = new Item();
        $categories = Category::find()->orderBy('id')->all();
        if($item->load(Yii::$app->request->post()) && $item->validate()){            
            $res = $item->save();
            if($res==1){

                return $this->redirect(['item/index']);

                // Yii::$app->session->setFlash('success', 'the data successfully saved');
                // can use hasFlash
                // can use getFlash    
            }
            // Yii::$app->session->setFlash('success', 'Error occour in saving');            
            return $this->render('create', ['model'=>$item, 'title'=>'Create', 'categories'=>$categories]);            
        }else{
            return $this->render('create', ['model'=>$item, 'title'=>'Create', 'categories'=>$categories]);
        }        
    }

    public function actionEdit($id)
    {
        $item = Item::find()->where(['id' => $id])->one();
        $categories = Category::find()->orderBy('id')->all();
        
        // can get item category by using this way
        // var_dump($item->getCategory()->one()); exit;
        
        if($item->load(Yii::$app->request->post()) && $item->validate()){            
            
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
            return $this->render('create', ['model'=>$item, 'title'=>'Edit', 'categories'=>$categories]);            
        }else{
            return $this->render('create', ['model'=>$item, 'title'=>'Edit', 'categories'=>$categories]);
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
