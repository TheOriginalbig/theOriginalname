<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use  yii\web\Session;
use api\models\Login;

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
                $arr = array('Message'=>'error','requestid'=>'用户名或密码错误，请重新登陆！','code'=>3);
                return json_encode($arr);
            }else{
                // $session = Yii::$app->session;
                $session = Yii::$app->session;

              
                $session->set('user',$data);
              
                $arr = array('Message'=>'ok','requestid'=>'登陆成功','code'=>1);
                return json_encode($arr);
            }
            
          
        }
    }
    /**
     * 根据登录时的用户名和密码查询手机号，并发送短信到手机
     * 
     * @return true false
     */
    // public function actionGetphone()
    // {
    //     $post = Yii::$app->request->post();
    //     $login = new Login();
    //     $mobile = $login->getphone($post);
    //     if( $mobile == false ){
    //         $arr = array('Message'=>'error','requestid'=>'用户名或密码错误，请重新登陆！','code'=>3);
    //         return json_encode($arr);
    //     }
    //     $code = $this->get_code();
    //     $session = Yii::$app->session;
    //     $time = time()+120;
    //     $arr = array('code'=>$code , 'extime'=>$time);
    //     $session->set($mobile, $arr);
    //     $product = '[\'智慧车库\']';
    //     $sm = new \SmsDemo();
    //     $autograph = '登录验证';
    //     $Template  = 'SMS_67550006';
    //     $response = $sm->infoSms($mobile,$code,$product,$autograph,$Template);
    //      if ( $response->Message == 'OK' ){
    //         $arr = array('Message'=>'ok','requestid'=>'发送短信成功','code'=>1);
    //         return json_encode($arr);
    //     }else{
    //         $arr = array('Message'=>'error','requestid'=>'发送短信失败，请稍后重试。每分钟只能发一条，每小时只能发五条，每天只能发10条验证码！','code'=>2);
    //         return json_encode($arr);
    //     }
    //     // return $this->render('land');
    // }
    /**
     * 注册
     *
     * @return string
     */
    public function actionRegister()
    {
        $post = Yii::$app->request->post();
        // if ( !empty($post)){
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
                    $arr = array('Message'=>'ok','requestid'=>'保存成功','code'=>1);
                    return json_encode($arr);
                }else{
                    $arr = array('Message'=>'error','requestid'=>'保存失败','code'=>2);
                    return json_encode($arr);
                }
                
            }else{
                $arr = array('Message'=>'error','requestid'=>'验证码错误！','code'=>3);
                return json_encode($arr);
            }
           
        // }
       
        // return $this->render('register');
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
                $arr = array('Message'=>'error','requestid'=>'验证码错误！','code'=>3);
                return json_encode($arr);
            }
            if ( $re == true ) 
            {
                $arr = array('Message'=>'ok','requestid'=>'密码修改成功！','code'=>1);
                return json_encode($arr);
            }else{
                $arr = array('Message'=>'error','requestid'=>'密码修改失败！请稍后重试。','code'=>2);
                return json_encode($arr);
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
            $arr = array('Message'=>'ok','requestid'=>'验证码发送成功！','code'=>1);
            return json_encode($arr);
        }else{
            $arr = array('Message'=>'error','requestid'=>'验证码错误！','code'=>2);
            return json_encode($arr);
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
        // echo  $mobile.'/'.$code.'/'.$product.'/'.$autograph.'/'.$Template;die;
        $response = $sm->infoSms($mobile,$code,$product,$autograph,$Template);
        return $response;
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
        $arr['response'] = json_decode($response);
        return $arr;
    }
  
}
