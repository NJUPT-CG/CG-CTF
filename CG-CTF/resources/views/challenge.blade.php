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
@if(Auth::check())
    <p>{{Auth::user()->name}}
        <a href="{{url('user/logout')}}">登出</a>
    </p>
@else
    <a href="{{url('/login')}}">登录</a>
@endif                           <!--检测是否登录-->

<div id="challenges">
    @if(isset($challengeInfo))
        @foreach($challengeInfo as $challenge)
            <a>{{$challenge['class']}}</a><br>
            <a>{{$challenge['score']}}</a><br>
            <a>{{$challenge['info']}}</a><br>
            <a>{{$challenge['title']}}</a><br>
            <a>{{$challenge['flag']}}</a><br>
            <a>{{$challenge['description']}}</a><br>
        @endforeach
    @endif
</div>
</body>
</html>