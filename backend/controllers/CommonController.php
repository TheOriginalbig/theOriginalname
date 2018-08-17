<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Common;

/**
 * Site controller
 */
class CommonController extends Controller
{
   

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $arr = array('Message'=>'error','requestid'=>'验证码错误！','code'=>3);
                echo  json_encode($arr);die;
        $a = "stdClass Object ( [Message] => OK [RequestId] => 7A916302-81CD-43CB-BC8B-D925EA4FD505 [BizId] => 764619734161082264^0 [Code] => OK )" ;
        // $array = json_decode(json_encode(simplexml_load_string($a)),TRUE);
        $a = new Common();
        $a->land();

        // echo json_decode($str, true);die;
        print_r($array );
    }

 
  
}
