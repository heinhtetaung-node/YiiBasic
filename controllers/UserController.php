<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Category;
use yii\helpers\Url;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $users = User::find()->orderBy('id')->all();
        
        return $this->render('index', ['users'=>$users]);
    }

    public function actionCreate()
    {
        $user = new User();
        if($user->load(Yii::$app->request->post()) && $user->validate()){     
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            $res = $user->save();
            if($res==1){
                return $this->redirect(['user/index']);
            }
            return $this->render('create', ['model'=>$user, 'title'=>'Create']);            
        }else{
            return $this->render('create', ['model'=>$user, 'title'=>'Create']);
        }        
    }

    public function actionEdit($id)
    {
        $user = User::find()->where(['id' => $id])->one();
        $post = Yii::$app->request->post();        
        if($user->load($post) && $user->validate()){
            if($post['password']!=""){
                $user->password = $post['password'];
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            }       
            $res = $user->save();
            if($res==1){
                return $this->redirect(['user/index']);
            }
            return $this->render('create', ['model'=>$user, 'title'=>'Edit']);            
        }else{
            return $this->render('create', ['model'=>$user, 'title'=>'Edit']);
        }     

    }

    public function actionDelete(){
        $post = Yii::$app->request->post();
        $id = $post['id'];
        $item = User::findOne($id);
        $item->delete();
        return $this->redirect(['user/index']);
    }    

}
