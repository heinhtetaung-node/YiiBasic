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

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $identity = User::findOne(['username' => $model->username]);
            if($identity!=null){
                $res = Yii::$app->security->validatePassword($model->password, $identity->password);
                if($res==1){
                    $res = Yii::$app->user->login($identity);

                    // adding roles
                    $auth = Yii::$app->authManager;
                    $id = $identity->getId();
                    $passign = $auth->getAssignment('adminRole', $id);                          
                    if($passign){
                        $assignrole = $auth->getRole('adminRole');                        
                        $auth->revoke($assignrole, $id);                        
                    }
                    $passign = $auth->getAssignment('editorRole', $id);                          
                    if($passign){
                        $assignrole = $auth->getRole('editorRole');                        
                        $auth->revoke($assignrole, $id);                        
                    }
                    $passign = $auth->getAssignment('authorRole', $id);                          
                    if($passign){
                        $assignrole = $auth->getRole('authorRole');                        
                        $auth->revoke($assignrole, $id);                        
                    }
                    
                    if($identity->role==1){
                        $assignrole = $auth->getRole('adminRole');                        
                    }
                    if($identity->role==2){
                        $assignrole = $auth->getRole('editorRole');                        
                    }
                    if($identity->role==3){
                        $assignrole = $auth->getRole('authorRole');                        
                    }                    
                    $auth->assign($assignrole, $id);
                    
                    return $this->goBack();
                }
            }            
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        // $auth = Yii::$app->authManager;
        
        // $identity = Yii::$app->user->identity;
        // $id = $identity->id;
        // $role = $identity->role;
        // if($role==1){
        //     $roleSet = $auth->getRole('adminRole');
        // }
        // if($role==2){
        //     $roleSet = $auth->getRole('editorRole');
        // }
        // if($role==3){
        //     $roleSet = $auth->getRole('authorRole');
        // }
        // if($roleSet){
        //     $auth->revoke($roleSet, $id);                    
        // }        

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
