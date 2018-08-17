<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use  yii\web\Session;
use backend\models\Login;

/**
 * Site controller
 */
class LoginController extends Controller
{
   public $enableCsrfValidation = false ;

    /**
     * 登陆
     *
     * @return string
     */
    public function actionLand()
    {
        $post = Yii::$app->request->post();
        if( !empty($post) ){
            $login = new Login();
            $data = $login->land($post);
            $mobile = $data['phone'];
            if( $mobile == false ){
                // echo "<script>alert('用户名或密码错误，请重新登陆！')</script>";
                Yii::$app->getSession()->setFlash('error', '用户名或密码错误，请重新登陆！');
                return $this->redirect(['login/register']);
            }
            $session = Yii::$app->session;
            $code = $session->get($mobile);
            if( $code['code'] != $post['verification'] ){
                // echo "<script>alert('验证码错误请重新登陆')</script>";
                Yii::$app->getSession()->setFlash('error', '验证码错误请重新登陆');
                return $this->redirect(['login/register']);
            }else{
                $data['username'] = $post['username'];
                $session->set('username',$data);
                return $this->redirect(['index/index']);
            }
        }
       return $this->render('land');
    }
    /**
     * 根据登录时的用户名和密码查询手机号，并发送短信到手机
     * 
     * @return true false
     */
    public function actionGetphone()
    {
        $post = Yii::$app->request->post();
        $login = new Login();
        $mobile = $login->getphone($post);
        if( $mobile == false ){
            return 'false1';
        }
        $code = $this->get_code();
        $session = Yii::$app->session;
        $time = time()+120;
        $arr = array('code'=>$code , 'extime'=>$time);
        $session->set($mobile, $arr);
        $product = '[\'智慧车库\']';
        $sm = new \SmsDemo();
        $autograph = '登录验证';
        $Template  = 'SMS_67550006';
        $response = $sm->infoSms($mobile,$code,$product,$autograph,$Template);
         if ( $response->Message == 'OK' ){
             return $code;
        }else{
             return false;
        }
        // return $this->render('land');
    }
    /**
     * 注册
     *
     * @return string
     */
    public function actionRegister()
    {
        $post = Yii::$app->request->post();
        if ( !empty($post)){
            $session = Yii::$app->session;
            // $post['phone'] = '13733280315';
            $verfi = $session->get($post['phone']);
            if($verfi['code'] == $post['verification']){
                $login = new Login();
                $re = $login->add($post);
                if ( $re ) {
                    $asd = array();
                    $asd['userid'] = $re;
                    $asd['phone'] = $post['phone'];
                    $asd['username'] = $post['username'];
                    $session->set('user',$asd);
                    Yii::$app->getSession()->setFlash('success', '保存成功');
                    return $this->redirect(['index/index']);
                }else{
                   Yii::$app->getSession()->setFlash('error', '保存失败');
                   return $this->redirect(['login/register']); 
                }
                
            }else{
                Yii::$app->getSession()->setFlash('error', '保存失败');
                return $this->redirect(['login/register']);
            }
           
        }
       
        return $this->render('register');
    }

    /**
     * 找回密码
     *
     * @return string
     */
    public function actionRetrieve()
    {
       $post = Yii::$app->request->post();
       if ( !empty($post) ) 
       {
            $login = new Login();
            $session = Yii::$app->session;
            $code = $session->get($post['phone']);
            $userpassword = md5($post['userpassword'].'bhsj');
            $arr = array('userpassword'=>$userpassword);
            $re = false;
            if ( $post['verification'] == $code['code'] )
            { 
                $sql     = "SELECT id,username FROM   sc_user WHERE phone = :phone";
                $command = Yii::$app->db->createCommand($sql, [':phone'=>$post['phone']]);
                $data = $command->queryone();
                $data['phone'] = $post['phone'];
                $session->set('user',$data);
               $re = Yii::$app->db->createCommand()->update('sc_user', $arr, 'phone = '.$post['phone'])->execute();
            }else{
                // echo "<script>alert('验证码错误！')</script>";
                Yii::$app->getSession()->setFlash('error', '验证码错误！');
                return $this->redirect(['login/retrieve']);
            }
            if ( $re == true ) 
            {
                // echo "<script>alert('密码修改成功！')</script>";
                Yii::$app->getSession()->setFlash('success', '密码修改成功！');
                return $this->redirect(['index/index']);
                
            }else{
                // echo "<script>alert('密码修改失败！请稍后重试。')</script>";
                Yii::$app->getSession()->setFlash('error', '密码修改失败！请稍后重试。');
                return $this->redirect(['login/retrieve']);
            }
            
            
       }
       return $this->render('retrieve');
    }
    /*
     * 找回密码   发送短信验证码
     * return string
     */
    public function actionGettrie()
    {
        $post = Yii::$app->request->post();
        $autograph = '变更验证';
        $Template  = 'SMS_67550002';
        $arr = $this->smssend($post['phone'],$autograph,$Template);
        $response = $arr['response'];
        $code = $arr['code'];
        if ( $response->Message == 'OK' ){
             return $code;
        }else{
             return false;
        }
    }
    /**
     *  注册 发送手机验证码
     *
     * @return string
     */
    public function actionSendsms()
    {   
        // $mobile = '13733280315';
        $post = Yii::$app->request->post();
        $mobile = $post['phone'];
        $code = $this->get_code();
        $session = Yii::$app->session;
        $time = time()+120;
        $arr = array('code'=>$code , 'extime'=>$time);
        $session->set($mobile, $arr);
        $product = '[\'智慧车库\']';
        $sm = new \SmsDemo();
        $autograph = '注册验证';
        $Template  = 'SMS_67550004';
        $response = $sm->infoSms($mobile,$code,$product,$autograph,$Template);
        
        if ( $response->Message == 'OK' ){
             return $code;
        }else{
             return false;
        }
    }
    /**
     * 得到验证码随机数
     * 
     * @return  string
     */
    public function get_code()
    {
        // $input = array ('0','1','2','3','4','5','6','7','8','9','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m'); 
        // $rand_keys = array_rand ($input, 5);
        // $code =  $input[$rand_keys[0]].$input[$rand_keys[1]].$input[$rand_keys[2]].$input[$rand_keys[3]].$input[$rand_keys[4]]; 
        return rand(10000,99999);
    }


    /*
     * 发送短信  类内调用
     * return obj
     */
    public function smssend($mobile,$autograph,$Template)
    {
        $code = $this->get_code();
        $session = Yii::$app->session;
        $time = time()+120;
        $arr = array('code'=>$code , 'extime'=>$time);
        $session->set($mobile, $arr);
        $product = '[\'智慧车库\']';
        $sm = new \SmsDemo();
        $response = $sm->infoSms($mobile,$code,$product,$autograph,$Template);
        $arr = array();

        $arr['code'] = $code;
        $arr['response'] = $response;
        return $arr;
    }
  
}
