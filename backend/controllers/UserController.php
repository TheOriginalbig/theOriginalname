<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\User;

/**
 * Site controller
 */
class UserController extends Controller
{
   
    public $enableCsrfValidation = false ;
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $page = Yii::$app->request->get('page') ? Yii::$app->request->get('page') : 1 ;
    	$user = new User;
    	$data = $user->index($page);
    
    	return $this->render('index',$data);
    }
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionAdd()
    {

    	$user = new User;
        $post =  Yii::$app->request->post();
        $re = $user->add($post);
        if($re == true){
        	Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
        	Yii::$app->getSession()->setFlash('error', '保存失败');
        }
        return $this->redirect(['user/index']);

    }


}





