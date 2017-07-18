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
    .challenge
    {
        position: relative;
        font-size: 18px;
        border: 1px solid black;
        width: 12rem;
        text-align: center;
        height: 6rem;
        padding: 1rem;
    }
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
        <div id="challenge{{$challenge['id']}}" class="challenge">
            <!-- <a>{{$challenge['class']}}</a><br> -->
            <!-- <a>{{$challenge['info']}}</a><br> -->
            <a>{{$challenge['title']}}</a><br>
            <br>
            <a>{{$challenge['score']}}</a><br>
            <!-- <a>{{$challenge['flag']}}</a><br> -->
            <!-- <a>{{$challenge['description']}}</a><br> -->
        </div>
        @endforeach
    @endif
</div>
</body>
</html>