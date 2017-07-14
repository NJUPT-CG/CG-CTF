<!DOCTYPE html>
<html>
<head>
	<title>CG-CTF</title>
</head>
<style type="text/css">
	ul ,li{
		list-style: none;
	}
	#menu li{
		float:left;
		color:red;
		margin:6%;
		cursor: pointer;
	}
</style>
<body>
<div><ul id="menu">
	<li href="#">Web</li>
	<li href="#">Re</li>
	<li href="#">Pwn</li>
	<li href="#">Crypto</li>
	<li href="#">Misc</li>
	<li href="#">About</li>
	</ul></div>
<br>
<div id="WelcomeWords">welcome to CG-CTF!!!</div>
<a href="{{url('/login')}}">登录</a>

@if(Auth::check())
	<p>您已登陆</p>
	<a href="{{url('user/logout')}}">登出</a>
@endif                           <!--检测是否登录-->
</body>
</html>