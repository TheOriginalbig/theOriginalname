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
<title>设备分类</title>
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
<div class="page-content clearfix">
  <div class="administrator">
       <div class="d_Confirm_Order_style">
    <div class="search_style">
     
      <ul class="search_content clearfix">
       <li><label class="l_f">设备分类名称</label><input name="" type="text" id="goryName" class="text_add" placeholder="<?=$goryName?>" value="<?=$goryName?>"  style=" width:400px"/></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
      </ul>
    </div>
    <!--操作-->
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="administrator_add" class="btn btn-warning"><i class="fa fa-plus"></i> 设备分类</a>
       </span>
     </div>
     <!--管理员列表-->
   <!--  <div class="clearfix administrator_style" id="administrator"> 
      <div class="left_style"> 
       <div id="scrollsidebar" class="left_Treeview"> -->
                    <!-- <div class="show_btn" id="rightArrow"><span></span></div>
                      <div class="widget-box side_content" >
                        <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
                          <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">管理员分类列表</h4></div>
                            <div class="widget-body">
                               <ul class="b_P_Sort_list">
                                <li><i class="fa fa-users green"></i> <a href="#">全部管理员（13）</a></li>
                                <li><i class="fa fa-users orange"></i> <a href="#">超级管理员（1）</a></li>
                                <li><i class="fa fa-users orange"></i> <a href="#">普通管理员（5）</a></li>
                                <li><i class="fa fa-users orange"></i> <a href="#">产品编辑管理员（4）</a></li>
                                <li><i class="fa fa-users orange"></i> <a href="#">管理员（1）</a></li>
                               </ul>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </div> -->
      <div class="table_menu_list"  id="testIframe">
           <table class="table table-striped table-bordered table-hover" id="sample_table">
    <thead>
      
      
     <tr>
        <th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>

        <!-- <th width="80px">编号</th> -->
        <th width="250px">设备分类名称</th>
        <!-- <th width="100px">图片展示</th> -->
       <!--  <th width="100px">邮箱</th>
                <th width="100px">角色</th>        -->
        <th width="180px">加入时间</th>
        <!-- <th width="70px">状态</th>                 -->
        <th width="200px">操作</th>
      </tr>
      
    </thead>
  <tbody>
    <?php  foreach( $datarr as $k=>$v ){?>
     <tr>
      <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
      <!-- <td>1</td> -->
      <td><?=$v['goryName']?></td>
      <!-- <td>18934334544</td> -->
   <!--    <td>2345454@qq.com</td>
      <td>超级管理员</td> -->
      <td><?=date("Y-m-d",$v['createtime'])?></td>
      <!-- <td class="td-status"><span class="label label-success radius">已启用</span></td> -->
      <td class="td-manage">
        <!-- <a onClick="member_stop(this,'10001')"  href="javascript:;" title="详情"  class="btn btn-xs btn-success">详情</a>   -->
        <a title="编辑" onclick="member_edit('<?=$v['id']?>')" href="javascript:;"  class="btn btn-xs btn-info" >编辑</a>       
        <a title="删除" href="javascript:;"  onclick="member_del('<?=$v['id']?>')" class="btn btn-xs btn-warning" >删除</a>
       </td>
     </tr>
    <?php  }?>
    </tbody>
    </table>
      </div>
     </div>
  </div>
</div>
<div class="page">
   <a href="javascript:ovid(0);" onClick="pages(1)">首页</a>
   <a href="javascript:ovid(0);" onClick="pages(<?php echo  $page-1?>)">上一页</a>
   <?php if ( $total-$page > 5 ){

    ?>
    <?php  for($i=$page;$i<=$page+2;$i++){?>
      <a href="javascript:ovid(0);" onClick="pages(<?=$i?>)"><?=$i?></a>
    <?php }?>
      <a href="javascript:ovid(0);" >...</a>
      <?php  for($i=$total-2;$i<=$total;$i++){?>
      <a href="javascript:ovid(0);" onClick="pages(<?=$i?>)"><?=$i?></a>
    <?php }?>
   <?php }else{?>
      <?php  for($i=$page;$i<=$total;$i++){?>
      <a href="javascript:ovid(0);" onClick="pages(<?=$i?>)"><?=$i?></a>
    <?php }?>
   <?php }?>
   <a href="javascript:ovid(0);" onClick="pages(<?=$page+1?>)">下一页</a>
   <a href="javascript:ovid(0);" onClick="pages(<?=$total?>)">尾页</a>
</div>

 <!--添加管理员-->
 <div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="index.php?r=equgory/add" method="post" id="formview" enctype="multipart/form-data">
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>分类名称</label>
      <div class="formControls">
            <input type="text" name="goryName" id="charttu" />
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
   <div class="form-group">
      <label class="form-label">所属分类：</label>
      <div class="formControls "> <span class="select-box" style="width:150px;">
        <select class="select" name="pid" size="1">
          <option value="0">无</option>
          <?php  foreach( $data as $k=>$v ){?>
            <option value="<?=$v['id']?>"><?=$v['goryName']?></option>
          <?php  }?>
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
// 分页
function  pages(page){
    var  goryName = $("#goryName").val();

    if ( page == 0 ){
      layer.msg('已经是第一页', {time: 2000, icon:5});
      return false;
    }
    if ( page > <?=$total?> ){
      layer.msg('已经是尾页', {time: 2000, icon:5});
      return false;
    }
    window.location.href = "index.php?r=equgory/index&page="+page+"&goryName="+goryName;

}
// 查询
$(".btn_search").on('click',function(){
    var  goryName = $("#goryName").val();
    window.location.href = "index.php?r=equgory/index&goryName="+goryName;
})
// 编辑
function member_edit(id){
   var page = '<?=$page?>';
   var goryName = '<?=$goryName?>';

   window.location.href = "index.php?r=equgory/edit&goryName="+goryName+"&page="+page+"&id="+id;
}
// 编辑
function member_del(id){
   var page = '<?=$page?>';
   var goryName = '<?=$goryName?>';

   window.location.href = "index.php?r=equgory/del&goryName="+goryName+"&page="+page+"&id="+id;
}
// //初始化宽度、高度  
//  $(".widget-box").height($(window).height()-215); 
// $(".table_menu_list").width($(window).width()-60);
//  $(".table_menu_list").height($(window).height()-215);
//   //当文档窗口发生改变时 触发  
//     $(window).resize(function(){
//   $(".widget-box").height($(window).height()-215);
//    $(".table_menu_list").width($(window).width()-260);
//     $(".table_menu_list").height($(window).height()-215);
//   })
//  laydate({
//     elem: '#start',
//     event: 'focus' 
// });


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

