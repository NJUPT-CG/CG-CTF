<!DOCTYPE html>
<html>
<head>
    <title>CG-CTF</title>
</head>
<link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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

<div id="challenge-container">
    @if(isset($challengeInfo))
        @foreach($challengeInfo as $challenge)
        <button type="button" id="challenge{{$challenge['id']}}" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#challenges{{$challenge['id']}}">

            <p>{{$challenge['title']}}</p><br>
            <p>{{$challenge['score']}}</p>

        </button>
        @endforeach
    @endif
</div>
<!-- Modal -->
@if(isset($challengeInfo))
    @foreach($challengeInfo as $challenge)
        <div class="modal fade" id="challenges{{$challenge['id']}}" tabindex="-1" role="dialog" aria-labelledby="ChallengeTitle">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="ChallengeTitle">{{$challenge['title']}}</h3>
                        <h5 class="modal-title" id="ChallengeTitle">{{$challenge['score']}}</h5>
                    </div>
                    <div class="modal-body">
                        {{$challenge['info']}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif

</body>
</html>