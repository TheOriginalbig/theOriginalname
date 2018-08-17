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
        <!-- <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script> -->
<title>管理员</title>
</head>

<body>
<div class="page-content clearfix">
  <div class="administrator">
       <div class="d_Confirm_Order_style">
    <div class="search_style">
     
      <ul class="search_content clearfix">
        <form action="index.php?r=user/index" id="seachform" method="post">
           <li><label class="l_f">管理员名称</label><input name="username" type="text"  class="text_add" placeholder=""  style=" width:400px"/></li>
           <li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" name="createtime" style=" margin-left:10px;"></li>
           <li style="width:90px;"><button type="button" onClick="search()"  class="btn_search"><i class="fa fa-search"></i>查询</button></li>
        </form>
      </ul>
    </div>
    <!--操作-->
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="administrator_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加管理员</a>
        <!-- <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a> -->
       </span>
       <span class="r_f">共：<b>5</b>人</span>
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
        <th width="250px">用户名</th>
        <th width="100px">手机</th>
        <th width="100px">邮箱</th>
                <th width="100px">角色</th>       
        <th width="180px">加入时间</th>
        <th width="70px">班级</th>                
        <th width="200px">操作</th>
      </tr>
    </thead>
  <tbody>
  	<?php foreach($data as $k=>$v){?>
     <tr>
      <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
      <!-- <td>1</td> -->
      <td><?=$v['username']?></td>
      <td><?=$v['phone']?></td>
      <td><?=$v['email']?></td>
      <td></td>
      <td><?=date("Y-m-d",$v['createtime'])?></td>
      <td class="td-status"><?=$v['userclass']?></td>
      <td class="td-manage">
 
        <a title="编辑" onclick="member_edit('编辑','member-add.html','4','','510')" href="javascript:;"  class="btn btn-xs btn-info" >编辑</a>       
        <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" >删除</a>
       </td>
     </tr>
   <?php }?> 
    </tbody>
    </table>
      <div style="float: right">

      	<button>首页</button>
      	<?php for($i=1;$i<=$total;$i++){
               if ( $i == $page ) {
      		?>

      	   <button  style="background: white"><?=$i?></button>
        <?php }else{?>
           <button><?=$i?></button>
        <?php }}?>
      	<button>尾页</button>

      </div>
      </div>
     </div>
  </div>
</div>
 <!--添加管理员-->
 <div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="index.php?r=user/add" method="post" id="form-admin-add">
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>管理员：</label>
      <div class="formControls">
        <input type="text" class="input-text"  placeholder="" id="username" name="username" datatype="*2-16" value="" nullmsg="用户名不能为空"   onblur ="username()">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>初始密码：</label>
      <div class="formControls">
      <input type="password" placeholder="密码" name="userpassword" autocomplete="off" value="" class="input-text" onblur ="userpassword()" datatype="*6-20" nullmsg="密码不能为空">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>确认密码：</label>
      <div class="formControls ">
    <input type="password" placeholder="确认新密码" autocomplete="off" onblur ="newpassword2()" class="input-text Validform_error" errormsg="您两次输入的新密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="userpassword" id="newpassword2" name="newpassword2">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>性别：</label>
      <div class="formControls  skin-minimal">
          <label><input name="sex" type="radio" class="ace" checked="checked"><span class="lbl">保密</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" class="ace"><span class="lbl">女</span></label>
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label "><span class="c-red">*</span>手机：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" onblur ="usertel()" maxlength="11" placeholder="" id="user-tel" name="usertel" datatype="m" nullmsg="手机不能为空">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>邮箱：</label>
      <div class="formControls ">
        <input type="text" class="input-text" placeholder="@" name="email" onblur ="email()" id="email" datatype="e" nullmsg="请输入邮箱！">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
    <div class="form-group">
      <label class="form-label"><span class="c-red">*</span>班级：</label>
      <div class="formControls ">
        <input type="text" class="input-text" placeholder="班级" name="userclass" onblur ="userclass()" id="userclass" datatype="e" nullmsg="请输入班级！">
      </div>
      <div class="col-4"> <span class="Validform_checktip"></span></div>
    </div>
   <!--  <div class="form-group">
      <label class="form-label">角色：</label>
      <div class="formControls "> <span class="select-box" style="width:150px;">
        <select class="select" name="admin-role" size="1">
          <option value="0">超级管理员</option>
          <option value="1">管理员</option>
          <option value="2">栏目主辑</option>
          <option value="3">栏目编辑</option>
        </select>
        </span> </div>
    </div> -->
   
    <div> 
        <input class="btn btn-primary radius" type="button" onClick="Submission()"  id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
  </form>
   </div>
 </div>
</body>
</html>
<script type="text/javascript">
  // // 搜索
  //  function search(){
  //     $("#seachform").submit();
  //  }

  // // 添加
  // function username(){
  // 	  alert(13213);
  // }
  // function userpassword(){
  // 	  alert(13213);
  // }
  //  function newpassword2(){
  // 	  alert(13213);
  // }
  //  function usertel(){
  // 	  alert(13213);
  // }
  //  function email(){
  // 	  alert(13213);
  // }
  


  function  Submission(){
  	 var username =   $("#username").val();
  	 var userpassword =   $("input[name='userpassword']").val();
  	 var newpassword2 =   $("input[name='newpassword2']").val();
  	 var usertel =   $("input[name='usertel']").val();
     var email =   $("input[name='email']").val();
  	 var userclass =   $("input[name='userclass']").val();
  	 var remarks =   $(".textarea").val();

     if ( username == false ){
        layer.alert('用户名不能为空', {icon: 5});
        return false;
     } else if ( userpassword == false ) {
        layer.alert('密码不能为空', {icon: 5});
        return false;
     } else if ( newpassword2 != userpassword ) {
        layer.alert('两次密码不一致', {icon: 5});
        return false;
     } else if ( usertel == false ) {
        layer.alert('手机号不能为空', {icon: 5});
        return false;
     } else if ( email == false ) {
        layer.alert('邮箱不能为空', {icon: 5});
        return false;
     
      } else if ( userclass == false ) {
        layer.alert('班级', {icon: 5});
        return false;
     
     } else {
        $("#form-admin-add").submit();
     }  
  	 
  }
</script>
<script type="text/javascript">
// $(function() { 
//   $("#administrator").fix({
//     float : 'left',
//     //minStatue : true,
//     skin : 'green', 
//     durationTime :false,
//     spacingw:50,//设置隐藏时的距离
//       spacingh:270,//设置显示时间距
//   });
// });
// 字数限制
function checkLength(which) {
  var maxChars = 100; //
  if(which.value.length > maxChars){
     layer.open({
     icon:2,
     title:'提示框',
     content:'您输入的字数超过限制!', 
    });
    // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
    which.value = which.value.substring(0,maxChars);
    return false;
  }else{
    var curr = maxChars - which.value.length; //250 减去 当前输入的
    document.getElementById("sy").innerHTML = curr.toString();
    return true;
  }
};
//初始化宽度、高度  
 $(".widget-box").height($(window).height()-215); 
$(".table_menu_list").width($(window).width()-60);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
  $(".widget-box").height($(window).height()-215);
   $(".table_menu_list").width($(window).width()-260);
    $(".table_menu_list").height($(window).height()-215);
  })
 laydate({
    elem: '#start',
    event: 'focus' 
});

/*用户-停用*/
// function member_stop(obj,id){
//   layer.confirm('确认要停用吗？',function(index){
//     $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
//     $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
//     $(obj).remove();
//     layer.msg('已停用!',{icon: 5,time:1000});
//   });
// }
// /*用户-启用*/
// function member_start(obj,id){
//   layer.confirm('确认要启用吗？',function(index){
//     $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="fa fa-check  bigger-120"></i></a>');
//     $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
//     $(obj).remove();
//     layer.msg('已启用!',{icon: 6,time:1000});
//   });
// }
// // /*产品-编辑*/
// function member_edit(title,url,id,w,h){
//   layer_show(title,url,w,h);
// }

// // /*产品-删除*/
// function member_del(obj,id){
//   layer.confirm('确认要删除吗？',function(index){
//     $(obj).parents("tr").remove();
//     layer.msg('已删除!',{icon:1,time:1000});
//   });
// }
// /*添加管理员*/
$('#administrator_add').on('click', function(){
  layer.open({
    type: 1,
  title:'添加管理员',
  area: ['700px',''],
  shadeClose: false,
  content: $('#add_administrator_style'),
  
  });
})
//   //表单验证提交
// $("#form-admin-add").Validform({
    
//      tiptype:2,
  
//     callback:function(data){
//     //form[0].submit();
//     if(data.status==1){ 
//                 layer.msg(data.info, {icon: data.status,time: 1000}, function(){ 
//                     location.reload();//刷新页面 
//                     });   
//             } 
//             else{ 
//                 layer.msg(data.info, {icon: data.status,time: 3000}); 
//             }       
//       var index =parent.$("#iframe").attr("src");
//       parent.layer.close(index);
//       //
//     }
    
    
//   }); 
</script>

