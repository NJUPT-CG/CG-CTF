@extends('layouts.app')

@section('style')
    {{--<style type="text/css">--}}
        {{--.row-margin-top {--}}
            {{--margin-top: 5px;--}}
            {{--margin-bottom: 5px;--}}
        {{--}--}}
    {{--</style>--}}
@endsection


@section('content')
    {{--@if (count($errors) > 0)--}}
        {{--<div class="alert alert-danger" id="alert">--}}
            {{--{!! implode('<br>', $errors->all()) !!}--}}
        {{--</div>--}}
        {{--<script>--}}
            {{--setTimeout(function () {--}}
                {{--document.getElementById("alert").style.display = "none";--}}
            {{--}, 3000);--}}
            {{--//1000是多久被隐藏，单位毫秒--}}
        {{--</script>--}}
    {{--@endif--}}
    {{--<div class="container">--}}
        {{--<div id="challenge-container" class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--@if(isset($challengeInfo))--}}
                    {{--@foreach($challengeInfo as $challenge)--}}
                        {{--<div class="col-md-2  row-margin-top">--}}
                            {{--<button type="button" id="challenge{{$challenge['id']}}"--}}
                                    {{--class="btn btn-{{$challenge['issolved']?'success':'primary'}} btn-lg btn-block"--}}
                                    {{--data-toggle="modal" data-target="#challenges{{$challenge['id']}}">--}}

                                {{--<p>{{$challenge['title']}}</p><br>--}}
                                {{--<p>{{$challenge['score'].' pt'}}</p>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- Modal -->--}}
    {{--@if(isset($challengeInfo))--}}
        {{--@foreach($challengeInfo as $challenge)--}}
            {{--<div class="modal fade" id="challenges{{$challenge['id']}}" tabindex="-1" role="dialog"--}}
                 {{--aria-labelledby="ChallengeTitle">--}}
                {{--<div class="modal-dialog" role="document">--}}
                    {{--<div class="modal-content">--}}
                        {{--<form action="{{ url('/submitflag/'.$challenge['id']) }}" method="POST">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<div class="modal-header">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
                                            {{--aria-hidden="true">&times;</span></button>--}}
                                {{--<h3 class="modal-title" id="ChallengeTitle">{{$challenge['title']}}</h3>--}}
                                {{--<h5 class="modal-title" id="ChallengeTitle">{{$challenge['score'].' pt'}}</h5>--}}
                            {{--</div>--}}
                            {{--<div class="modal-body">--}}
                                {{--{{$challenge['description']}}--}}
                            {{--</div>--}}
                            {{--@if($challenge['url'])--}}
                                {{--<div class="modal-body">--}}
                                    {{--<a href="{{ url($challenge['url']) }}">题目地址</a>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                            {{--<div class="modal-body">--}}
                                {{--<input type="text" name="flag" placeholder="flag"/>--}}
                            {{--</div>--}}
                            {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--@endif--}}
@endsection
