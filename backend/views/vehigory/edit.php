<?php
use yii\widgets\LinkPager;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
         <link href="backend/ssets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="backend/css/style.css"/>       
        <link href="backend/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="backend/assets/css/ace.min.css" />
        <link rel="stylesheet" href="backend/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->
    <script src="backend/js/jquery-1.9.1.min.js"></script>
        <script src="backend/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="backend/Widget/Validform/5.3.2/Validform.min.js"></script>
    <script src="backend/assets/js/typeahead-bs2.min.js"></script>            
    <script src="backend/assets/js/jquery.dataTables.min.js"></script>
    <script src="backend/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="backend/assets/layer/layer.js" type="text/javascript" ></script>          
    <script src="backend/js/lrtk.js" type="text/javascript" ></script>
         <script src="backend/assets/layer/layer.js" type="text/javascript"></script> 
        <script src="backend/assets/laydate/laydate.js" type="text/javascript"></script>
<title>车辆分类</title>
<style>
   .page{            
    text-align: center;            
    margin-top: 50px;   
    float:right;
    position:relative; 
    left:-20px;   
  }

.page a{            
  text-decoration: none;            
  border:1px solid #f9d52b;            
  padding: 5px 16px;            
  color: #767675;            
  cursor: pointer;        
}
</style>
</head>

<body>


 <!--添加分类-->

 <div id="add_administrator_style" class="add_menber"  >
    <form action="" method="post" id="formview" enctype="multipart/form-data">
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>分类名称</label>
      <div class="formControls">
            <input type="text" name="goryName" id="charttu" value="<?=$arr['goryName']?>" />
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
   <div class="form-group">
      <label class="form-label">所属分类：</label>
      <div class="formControls "> <span class="select-box" style="width:150px;">
        <select class="select" name="pid" size="1">
          <option value="0">无</option>
           <?php  foreach( $data as $k=>$v ){
               if ($v['id'] == $arr['pid']) {
            ?>
            <option value="<?=$v['id']?>" selected><?=$v['goryName']?></option>
          <?php  }else{?>
            <option value="<?=$v['id']?>"><?=$v['goryName']?></option>
          <?php  }}?>
        </select>
        </span> </div>
    </div>
    <!--  <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>确认密码：</label>
      <div class="formControls ">
    <input type="password" placeholder="确认新密码" autocomplete="off" class="input-text Validform_error" errormsg="您两次输入的新密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="userpassword" id="newpassword2" name="newpassword2">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>性别：</label>
      <div class="formControls  skin-minimal">
          <label><input name="form-field-radio" type="radio" class="ace" checked="checked"><span class="lbl">保密</span></label>&nbsp;&nbsp;
            <label><input name="form-field-radio" type="radio" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;
            <label><input name="form-field-radio" type="radio" class="ace"><span class="lbl">女</span></label>
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>手机：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="" id="user-tel" name="user-tel" datatype="m" nullmsg="手机不能为空">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>邮箱：</label>
      <div class="formControls ">
        <input type="text" class="input-text" placeholder="@" name="email" id="email" datatype="e" nullmsg="请输入邮箱！">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label">角色：</label>
      <div class="formControls "> <span class="select-box" style="width:150px;">
        <select class="select" name="admin-role" size="1">
          <option value="0">超级管理员</option>
          <option value="1">管理员</option>
          <option value="2">栏目主辑</option>
          <option value="3">栏目编辑</option>
        </select>
        </span> </div>
    </div>
    <div class="form-group">
      <label class="form-label">备注：</label>
      <div class="formControls">
        <textarea name="" cols="" rows="" class="textarea" placeholder="说点什么...100个字符以内" dragonfly="true" onkeyup="checkLength(this);"></textarea>
        <span class="wordage">剩余字数：<span id="sy" style="color:Red;">100</span>字</span>
      </div>
      <div class="col-4"> </div>
    </div> -->
    <div> 
        <input class="btn btn-primary radius" type="button" onClick="submit1()" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
  </form>
   </div>
 </div>
</body>
</html>

<script type="text/javascript">
function submit1(){
   $("#formview").submit();
}

// /*添加管理员*/
$('#administrator_add').on('click', function(){
  layer.open({
    type: 1,
  title:'轮播图',
  area: ['700px',''],
  shadeClose: false,
  content: $('#add_administrator_style'),
  
  });
})

</script>

