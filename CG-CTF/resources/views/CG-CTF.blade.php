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
		<li><a href="{{url('challenges/Web')}}">Web</a></li>
		<li><a href="{{url('challenges/Re')}}">Re</a></li>
		<li><a href="{{url('challenges/Pwn')}}">Pwn</a></li>
		<li><a href="{{url('challenges/Crypto')}}">Crypto</a></li>
		<li><a href="{{url('challenges/Misc')}}">Misc</a></li>
	<li href="#">About</li>
	</ul></div>
<br>
<div id="WelcomeWords">welcome to CG-CTF!!!</div>

@if(Auth::check())
	<p>{{Auth::user()->name}}
		<a >Admin</a>
	<a href="{{url('user/logout')}}">登出</a>
	</p>
@else
    <a href="{{url('/login')}}">登录</a>
@endif                           <!--检测是否登录-->
</body>
</html>