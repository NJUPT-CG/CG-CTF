
@extends('layouts.app')

@section('content')
    <div class="container" v-pre>  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$status ?? '修改'}}</div>
                <div class="panel-body">
                    <form action="{{ url('/editchallenge/'.$challenge->id ) }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{$challenge->title ?? ''}}">
                        <div class="form-group">
                         <label for="class">分类</label>
                         <select class="form-control" id="class" name="class">
                         <option value="Web" {{ $challenge->class =='Web'?"selected='1'":''}} >Web</option>
                         <option value="Re"  {{ $challenge->class =='Re'?"selected='1'":''}} >Re</option>
                         <option value="Pwn"  {{ $challenge->class =='Pwn'?"selected='1'":''}} >Pwn</option>
                         <option value="Crypto" {{$challenge->class =='Crypto'?"selected='1'":''}} >Crypto</option>
                         <option value="Misc"  {{ $challenge->class =='Misc'?"selected='1'":''}} >Misc</option>
                         </select>
                        </div>

                        <br>
                        <input type="text" name="flag" class="form-control" required="required" placeholder="flag" value="{{$challenge->flag ?? ''}}">

                        <input type="text" name="url" class="form-control" placeholder="url" value="{{$challenge->url ?? ''}}">

                        <input type="integer" name="score" class="form-control" placeholder="score" value="{{$challenge->score ?? ''}}">


                        <textarea name="description"  rows="10" class="form-control" splaceholder="请输入内容" >{{$challenge->description ?? ''}}</textarea>
                    
                        <br>
                        <label class="radio-inline">
                         <input type="radio" name="info" id="info" value="hide" {{$challenge->info=='hide'? 'checked':''}} > 隐藏
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="info" id="info" value="start" {{$challenge->info=='start'? 'checked':''}} > 开启
                        </label>
                         <label class="radio-inline">
                        <input type="radio" name="info" id="info" value="over" {{$challenge->info=='over'? 'checked':''}} > 关闭
                        </label>
                        <br>
                        <button class="btn btn-lg btn-info">修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>  
@endsection  