<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CategoryForm;
use app\models\Category;
use yii\helpers\Url;

class CategoryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $categories = Category::find()->orderBy('id')->all();
        return $this->render('index', ['categories'=>$categories]);
    }

    public function actionCreate()
    {
        $model = new Category();
        if($model->load(Yii::$app->request->post()) && $model->validate()){            
            $res = $model->save();
            if($res==1){

                return $this->redirect(['category/index']);

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
        $category = Category::find()->where(['id' => $id])->one();

        // can get items of this category by using this way
        // echo "<pre>";
        // $items = $category->getItems()
        //         //->where(['>', 'subtotal', 200])
        //         ->orderBy('id')
        //         ->all();
        // var_dump($items);
        // echo "</pre>";
        
        if($category->load(Yii::$app->request->post()) && $category->validate()){            
            $res = $category->save();
            if($res==1){
                return $this->redirect(['category/index']);
            }            
            return $this->render('create', ['model'=>$category, 'title'=>'Edit']);            
        }else{
            return $this->render('create', ['model'=>$category, 'title'=>'Edit']);
        }     
    }

    public function actionDelete(){
        $post = Yii::$app->request->post();
        $id = $post['id'];
        $category = Category::findOne($id);
        $category->delete();
        return $this->redirect(['category/index']);
    }    

}
