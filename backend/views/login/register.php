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
    <div class="loginbody" style="height: 715px">
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
												用户注册
											</h4>

											<div class="login_icon"><img src="backend/images/login.png" /></div>

											<form class="" id="formview" action="index.php?r=login%2Fregister" method="post">
												<fieldset>
										<ul>
   <li class="frame_style form_error"><label class="user_icon"></label><input name="username" type="text"  id="username"/><i>姓名</i></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="phone" type="text"   	 id="userpwd"/><i>手机号</i></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="userclass" type="text"   	 id="userclass"/><i>班级</i></li>
   <li class="frame_style form_error"><label class="Codes_icon"></label><input name="verification" type="text" style="width:160px;"   id="verification"/><i>验证码</i><div class="Codes_region"  onClick="Codesregion(this)" style="text-align: center;cursor:default;" >发送</div></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="userpassword" type="password"   	 id="userpwd"/><i>密码</i></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="userpassword2" type="password"   	 id="userpwd2"/><i>确认密码</i></li>
   
  </ul>
													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<!-- <input type="checkbox" class="ace"> -->
															<a href="index.php?r=login%2Fland"><span class="lbl" >返回 >> </span></a>
															
														</label>

														<button type="button" class="width-35 pull-right btn btn-sm btn-primary" onClick="Submission()" id="login_btn">
															<i class="icon-key"></i>
															提交
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
											     欢迎注册
											</div>
										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											

											
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
                        </div>
                        <div class="loginbm"></a> </div><strong></strong>

</body>
</html>
<script>
//  发送验证码
function Codesregion(node){
	var _this = $(node);
	alert(13213);
	_this.html('已发送');
	_this.css('pointer-events': 'none');
	return fasle;
	// alert(14974 == true);
	// return false;
 	var phone =   $("input[name='phone']").val();
 	if ( phone == false ) {
        layer.msg('手机号不能为空！', {time: 2000, icon:5});
        return false;
 	}
 	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
 	if(!myreg.test(phone)){
 		layer.msg('手机号格式不对！', {time: 2000, icon:5});
        return false;
 	}
 	$.ajax({
	   type: "POST",
	   url: "index.php?r=login%2Fsendsms",
	   data: {phone: phone},
	   success: function(msg){
	     if ( msg == false ){
	     	_this.html('已发送');
             layer.alert('发送失败！请稍后重试！（每分钟只能发一条，每小时只能发五条，每天只能发10条验证码！）', {icon: 5});
	     	 return false;
	     }else{
	     	$("#verfi").val(msg);
             _this.html('已发送');
             layer.msg('发送成功', {time: 2000, icon:6});
	     }
	   }
	});
}
/*
 * 注册
 */
// $('#login_btn').on('click', function(){
	function  Submission(){
	 var verfi = $("#verfi").val();
	 var verification = $("#verification").val();
  	 var username =   $("#username").val();
  	 var phone =   $("input[name='phone']").val();
  	 var userclass =   $("input[name='userclass']").val();
  	 var userpassword =   $("input[name='userpassword']").val();
  	 var userpassword2 =   $("input[name='userpassword2']").val();

  	 var usertel =   $("input[name='usertel']").val();
     // var email =   $("input[name='email']").val();
  	 var userclass =   $("input[name='userclass']").val();
  	 // var remarks =   $(".textarea").val();
     var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
     if ( username == false ){
     	layer.msg('用户名不能为空', {time: 2000, icon:5});
        return false;
     } else if ( phone == false ) {
     	layer.msg('手机号不能为空！', {time: 2000, icon:5});
        return false;
 	}else if(!myreg.test(phone)){
 		layer.msg('手机号格式不对！', {time: 2000, icon:5});
        return false;
    }else if(userclass == false){
    	layer.msg('班级不能为空！', {time: 2000, icon:5});
        return false;
    }else if(verification == false){
    	layer.msg('请填写验证码！', {time: 2000, icon:5});
        return false;
    }else if(verification != verfi){
    	layer.msg('验证码错误！', {time: 2000, icon:5});
        return false;
     } else if ( userpassword == false ) {
     	layer.msg('密码不能为空', {time: 2000, icon:5});
        return false;
     } else if ( userpassword2 != userpassword ) {
     	layer.msg('两次密码不一致', {time: 2000, icon:5});
        return false;
     
    // } else if ( userclass == false ) {
    // 	layer.msg('邮箱不能为空', {time: 2000, icon:5});
    //     return false;

     }
     $("#formview").submit();

  }

	//      var num=0;
	// 	 var str="";
 //     $("input[type$='text'],input[type$='password']").each(function(n){
 //          if($(this).val()=="")
 //          {
               
	// 		   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
 //                title: '提示框',				
	// 			icon:0,								
 //          }); 
	// 	    num++;
 //            return false;            
 //          } 
	// 	 });
	// 	  if(num>0){  return false;}	 	
 //          else{
	// 		  layer.alert('登录成功！',{
 //               title: '提示框',				
	// 		   icon:1,		
	// 		  });
	//           location.href="index.html";
	// 		   layer.close(index);	
	// 	  }		  		     						
		
	// });
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