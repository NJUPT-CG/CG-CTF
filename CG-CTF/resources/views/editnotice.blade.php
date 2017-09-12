@extends('layouts.app')

@section('content')
    <div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$status or '修改公告'}}</div>
                <div class="panel-body">
                    <form action="{{ url('editNotice/'.$notice['id'] ) }}" method="POST">
                        {!! csrf_field() !!}

                        <br>

                        <textarea name="content"  rows="10" class="form-control" required="required" splaceholder="请输入内容" >{{ $notice['content'] }}</textarea>
                    
                        <br>
                        <button class="btn btn-lg btn-info">修改</button>
                     </form>
                     <br>
                    <form action="{{ url( 'deleteNotice/'.$notice['id'] ) }}" method="POST" style="display: inline;">  
                   {{ method_field('DELETE') }}
                   {{ csrf_field() }}
                   <button type="submit" class="btn btn-lg btn-danger">删除</button>
                   </form>  
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection 