<?php
namespace backend\models;
 
use yii\base\Model;
use yii\web\UploadedFile;
use yii\data\Pagination;
/**
* UploadForm is the model behind the upload form.
*/
class Currigory extends Model
{
	/**
	 * @var UploadedFile file attribute
	 */
	 public $file;
	 public $table = 'sc_gory';
	 
	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
		  [['file'], 'file'],
		];
	}
	// 首页调用
	public function catelist($get)
	{
		$page = isset($get['page'])?$get['page']:'1';
		$goryName = isset($get['goryName'])?$get['goryName']:'';
		$where = ' 1=1 ';
		if ( $goryName ) {
            $where .= " and  goryName like '%".$goryName."%'";
		}
		
        
        $data = $this->catedata();
		
        $sql     = "SELECT id,goryName,createtime FROM   ".$this->table." WHERE type=1 and ".$where;
        $db      = \Yii::$app->db;
        $command = $db->createCommand($sql);
        $arr = $command->queryAll();
        

        $pagesize = '3';
        $cou = count($arr);
        $limit = ($page-1)*$pagesize;


        $sql     = "SELECT id,goryName,createtime FROM   ".$this->table." WHERE type=1 and ".$where." order by id desc limit ".$limit." , ".$pagesize;
        $command = $db->createCommand($sql);
        $datarr = $command->queryAll();
	    // $pages = new Pagination([
	    //       'pageSize'   => $pagesize,
	    //       'totalCount' => count($arr),
	    //     ]);


	    $total = ceil($cou/$pagesize);
        $res = [
        	'data' => $data,
        	'arr' => $arr  ,
        	'datarr' => $datarr,
        	'page' => $page,
        	'total' => $total,
        	'goryName' => $goryName
        ];
        return $res;
	}
	// 获取所有的课程分类
	public function catedata()
	{
        $sql     = "SELECT id,goryName,createtime FROM   ".$this->table." WHERE type=1 ";
        $db      = \Yii::$app->db;
        $command = $db->createCommand($sql);
        $data = $command->queryAll();
        return $data;

	}
	// 获取所有的课程分类  修改调用
	public function catedatae($id)
	{
        $sql     = "SELECT id,goryName,createtime FROM   ".$this->table." WHERE type=1 and id!=".$id;
        $db      = \Yii::$app->db;
        $command = $db->createCommand($sql);
        $data = $command->queryAll();
        return $data;

	}
	// 添加调用
	public function add($post)
	{
        $post['type'] = 1;
        $post['createtime'] = strtotime(date("Y-m-d H:i:s"));
		return  \Yii::$app->db->createCommand()->insert($this->table, $post)->execute();
	}
	// 得到要修改的数据
	public function editdata($id){
        $sql     = "SELECT id,goryName,pid FROM   ".$this->table." WHERE type=1 and id= ".$id;
        $db      = \Yii::$app->db;
        $command = $db->createCommand($sql);
        $data = $command->queryone();
        return $data;
	}
	// 根据id修改
	public function edit($id,$arr){
        $re = \Yii::$app->db->createCommand()->update($this->table, $arr, 'id = '.$id)->execute();
        return $re;
	}
	// 得到要修改的数据
	public function del($id){
        $re = \Yii::$app->db->createCommand()->delete($this->table,'id='.$id)->execute();;
        return $re;
	}
	
}






