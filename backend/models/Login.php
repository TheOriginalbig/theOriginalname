<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Login extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


   

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    /*
     * 首页列表
     */
    public function land($post)
    {
        $sql     = "SELECT phone,id FROM   sc_user WHERE username = :username and userpassword = :userpassword";
        $db      = \Yii::$app->db;
        $userpassword = md5($post['userpassword'].'bhsj');
        $command = $db->createCommand($sql, [':username'=>$post['username'],':userpassword'=>$userpassword]);
        $data = $command->queryone();
        if ( !empty($data) ){
            return $data;
        }else{
            return false;
        }
        
    }
    /*
     * 得到用户手机号
     */
    public function getphone($post){
        // print_r($post);die;
        $sql     = "SELECT phone FROM   sc_user WHERE username = :username and userpassword = :userpassword";
        $db      = \Yii::$app->db;
        $userpassword = md5($post['userpassword'].'bhsj');
        $command = $db->createCommand($sql, [':username'=>$post['username'],':userpassword'=>$userpassword]);
        $data = $command->queryone();
        if ( !empty($data) ){
            return $data['phone'];
        }else{
            return false;
        }
        
    }
    /*
     * 用户添加  
     */
    public function add($post)
    {

    	$arr['username'] = $post['username'];
    	$arr['userpassword'] = md5($post['userpassword'].'bhsj');
    	$arr['phone'] = $post['phone'];
    	
    	$arr['userclass'] = $post['userclass'];
    	$arr['createtime'] = strtotime(date("Y-m-d"));
        // print_r($arr);die;
        Yii::$app->db->createCommand()->insert('sc_user', $arr)->execute();
        return  Yii::$app->db->getLastInsertID();
    }

}
