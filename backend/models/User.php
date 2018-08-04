<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class User extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    // public function rules()
    // {
    //     return [
    //         // name, email, subject and body are required
    //         [['name', 'email', 'subject', 'body'], 'required'],
    //         // email has to be a valid email address
    //         ['email', 'email'],
    //         // verifyCode needs to be entered correctly
    //         ['verifyCode', 'captcha'],
    //     ];
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function attributeLabels()
    // {
    //     return [
    //         'verifyCode' => 'Verification Code',
    //     ];
    // }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    /*
     * 首页列表
     */
    public function index($page)
    {
        $command = Yii::$app->db->createCommand('SELECT count(id) num FROM sc_user');
        $num = $command->queryOne()['num'];
       
        $pagesize = '10';
        $limit = ($page-1)*$pagesize;
        $total = ceil($num/$pagesize);
    	$command = Yii::$app->db->createCommand('SELECT username,phone,email,status,createtime,sex FROM sc_user order by id desc limit '. $limit . ' , ' . $pagesize  );  
        $data = $command->queryAll();
    	$re = [
            'data' => $data,
            'total' => $total,
            'page' => $page
        ];
        return $re;
    }
    /*
     * 用户添加  
     */
    public function add($post)
    {
    	$arr['username'] = $post['username'];
    	$arr['userpassword'] = $post['userpassword'];
    	$arr['phone'] = $post['usertel'];
    	$arr['email'] = $post['email'];
    	$arr['sex'] = $post['sex'];
    	$arr['createtime'] = strtotime(date("Y-m-d"));
        return Yii::$app->db->createCommand()->insert('sc_user', $arr)->execute();
    }

}
