<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\Equgory;
use yii\data\Pagination;
/**
 * Site controller
 */
class EqugoryController extends Controller
{
    
    public $enableCsrfValidation = false ;
    protected  $cate;
    /**
     * Displays homepage.
     *
     * @return string
     */
    // public function __construct(){
    //     $this->cate = new Currigory();
    // }
    public function actionIndex()
    {
        $get = Yii::$app->request->get();
        $cate = new Equgory();
        $res = $cate->catelist($get);
        
        
       
     
    	return $this->render('index',$res);
    }
    public function actionAdd()
    {
    	$post = Yii::$app->request->post();
        $cate = new Equgory();
        $re = $cate->add($post);
        if ( $re == true ) {
            echo "<script> alert('添加成功');parent.location.href='index.php?r=equgory/index'; </script>"; 
        }else{
            echo "<script> alert('保存失败！请稍后重试');parent.location.href='index.php?r=equgory/index'; </script>";
        }
    }
    public function actionEdit()
    {
        $get = Yii::$app->request->get();
        $post = Yii::$app->request->post();
        $cate = new Equgory();
        
        if( !empty($post) ){
           $re = $cate->edit($get['id'],$post);
            if ( $re == true ) {
               echo "<script> alert('修改成功');parent.location.href='index.php?r=equgory/index&page=".$get['page']."&goryName=".$get['goryName']."'; </script>";
            }else{
                // echo 12111;die;
               echo "<script> alert('保存失败！请稍后重试');parent.location.href='index.php?r=equgory/index&page=".$get['page']."&goryName=".$get['goryName']."'; </script>";
            }
           
        }
      
        
        $data = $cate->catedatae($get['id']);
        $arr = $cate->editdata($get['id']);
        $re = [
            'data' => $data,
            'arr' => $arr,
        ];
        return $this->render('edit',$re);
     
    }
    public function actionDel()
    {
        $get = Yii::$app->request->get();
        $cate = new Currigory();

        $re = $cate->del($get['id']);
        if ( $re == true ) {
           echo "<script> alert('删除成功');parent.location.href='index.php?r=equgory/index&page=".$get['page']."&goryName=".$get['goryName']."'; </script>";
        }else{
            // echo 12111;die;
           echo "<script> alert('删除失败！请稍后重试');parent.location.href='index.php?r=equgory/index&page=".$get['page']."&goryName=".$get['goryName']."'; </script>";
        }
        
     
    }


  
}

 
 
 

