<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class IndexController extends Controller
{
   

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    	return $this->render('index');
    }
     public function actionMain()
    {
    	return  $this->render('main');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // echo 1332233;die;
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        // $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     return $this->goBack();
        // } else {
        //     $model->password = '';

        //     return $this->render('login', [
        //         'model' => $model,
        //     ]);
        // }
    }

  
}
