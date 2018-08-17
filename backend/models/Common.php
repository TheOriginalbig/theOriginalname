<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Common extends Model
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
    public function land()
    {
        $arr = array(
           'username' => 'dasfds',
           'userpassword' => 'dasfds'
        );
        echo Yii::$app->db->createCommand()->insert('sc_user', $arr)->execute();
        echo Yii::$app->db->getLastInsertID() ;die;
    }

}
