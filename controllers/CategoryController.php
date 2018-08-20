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
        $model = new CategoryForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){            
            //var_dump(Yii::$app->request->post()); echo "<hr>"; var_dump($model); exit;
            $category = new Category();
            $category->cat_name = $model->cat_name;            
            $res = $category->save();
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
        $arr = $category->attributes; unset($arr['id']);
        $model = new CategoryForm($arr);
        if($model->load(Yii::$app->request->post()) && $model->validate()){            
            $category->cat_name = $model->cat_name;
            $res = $category->save();
            if($res==1){
                return $this->redirect(['category/index']);
            }            
            return $this->render('create', ['model'=>$model, 'title'=>'Edit']);            
        }else{
            return $this->render('create', ['model'=>$model, 'title'=>'Edit']);
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
