<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="backend/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="backend/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="backend/assets/css/ace.min.css" />
		<link rel="stylesheet" href="backend/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="backend/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="backend/css/style.css"/>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="backend/assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="backend/js/jquery-1.9.1.min.js"></script>        
        <script src="backend/assets/layer/layer.js" type="text/javascript"></script>
<title>登录</title>
</head>

<body class="login-layout Reg_log_style">
<div class="logintop">    
    <span>欢迎后台管理界面平台</span>    
    <ul>
    <li><a href="#">返回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    <div class="loginbody">
<div class="login-container">
	<div class="center">
	     <img src="backend/images/logo1.png" />
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												管理员登录
											</h4>

											<div class="login_icon"><img src="backend/images/login.png" /></div>

											<form class="" id="formview" action="index.php?r=login%2Fland" method="post">
												<fieldset>
										<ul>
   <li class="frame_style form_error"><label class="user_icon"></label><input name="username" type="text"  id="username"/><i>用户名</i></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="userpassword" type="password"   	 id="userpwd"/><i>密码</i></li>
   <li class="frame_style form_error"><label class="Codes_icon"></label><input name="verification" type="text"   id="Codes_text"/><i>验证码</i><div class="Codes_region" style="text-align: center;cursor:default;" onClick="Codesregion(this)" >发送</div></li>
   
  </ul>
													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<!-- <input type="checkbox" class="ace"> -->
															<a href="index.php?r=login%2Fregister"><span class="lbl">注册</span></a>
															&nbsp;&nbsp;
															<a href="index.php?r=login%2Fretrieve"><span class="lbl">忘记密码？</span></a>
														</label>

														<button type="button" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn">
															<i class="icon-key"></i>
															登录
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
												<input type="hidden" id="verfi" value=""/>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110">通知</span>
											</div>

											<div class="social-login center">
											     欢迎登陆
											</div>
										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											

											
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
                        </div>
                        <div class="loginbm"></div><strong></strong>
</body>
</html>
<script>
	//  发送验证码
function Codesregion(node){
	var _this = $(node);
	var username =   $("#username").val();
 	var userpassword =   $("input[name='userpassword']").val();
 	if ( username == false ) {
        layer.msg('用户名不能为空！', {time: 2000, icon:5});
        return false;
 	}
 	if ( userpassword == false ) {
        layer.msg('密码不能为空！', {time: 2000, icon:5});
        return false;
 	}
 	// var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
 	// if(!myreg.test(phone)){
 	// 	layer.alert('手机号格式不对！', {time: 2000, icon:5});
  //       return false;
 	// }
 	$.ajax({
	   type: "POST",
	   url: "index.php?r=login%2Fgetphone",
	   data: {username: username, userpassword: userpassword},
	   success: function(msg){
	     if ( msg == false ){
             layer.alert('发送失败！请稍后重试！（每分钟只能发一条，每小时只能发五条，每天只能发10条验证码！）', {icon: 5});
	     	 return false;
	     }else if ( msg == 'false1' ){
	     	layer.msg('用户名或密码错误！', {time: 2000, icon:5});
	     	return false;
          }else{
	     	$("#verfi").val(msg);
             _this.html('已发送');
             layer.msg('发送成功', {time: 2000, icon:6});
             return false;
	     }
	   }
	});
}
//  登陆
 $("#login_btn").on('click',function(){
    var verfi =   $("#verfi").val();
    var username =   $("#username").val();
 	var userpassword =   $("input[name='userpassword']").val();
 	var verification =   $("input[name='verification']").val();
 	if ( username == false ) {
        layer.msg('用户名不能为空！', {time: 2000, icon:5});
        return false;
 	}
 	if ( userpassword == false ) {
        layer.msg('手机号不能为空！', {time: 2000, icon:5});
        return false;
 	}
 	if ( verfi != verification ) {
        layer.msg('验证码错误！', {time: 2000, icon:5});
        return false;
 	}
 	$("#formview").submit();
 })
// $('#login_btn').on('click', function(){
// 	     var num=0;
// 		 var str="";
//      $("input[type$='text'],input[type$='password']").each(function(n){
//           if($(this).val()=="")
//           {
               
// 			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
//                 title: '提示框',				
// 				icon:0,								
//           }); 
// 		    num++;
//             return false;            
//           } 
// 		 });
// 		  if(num>0){  return false;}	 	
//           else{
// 			  layer.alert('登录成功！',{
//                title: '提示框',				
// 			   icon:1,		
// 			  });
// 	          location.href="index.html";
// 			   layer.close(index);	
// 		  }		  		     						
		
// 	});
  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
		});
	  })

</script>