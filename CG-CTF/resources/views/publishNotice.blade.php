@extends('layouts.app')

@section('content')
    <div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$status or '发布公告'}}</div>
                <div class="panel-body">
                    <form action="{{ url('newNotice') }}" method="POST">
                        {!! csrf_field() !!}

                        <br>

                        <textarea name="content"  rows="10" class="form-control" required="required" splaceholder="请输入内容" >{{old('content')}}</textarea>
                    
                        <br>
                        <button class="btn btn-lg btn-info">发布</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>  
@endsection 