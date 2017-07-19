<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CG-CTF</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
    <body>
    <div class="container">  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$status or '新增'}}</div>
                <div class="panel-body">
                    <form action="{{ url('newchallenge') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{old('title')}}">
                        <div class="form-group">
                         <label for="class">分类</label>
                         <select class="form-control" id="class" name="class">
                         <option value="Web">Web</option>
                         <option value="Re">Re</option>
                         <option value="Pwn">Pwn</option>
                         <option value="Crypto">Crypto</option>
                         <option value="Misc">Misc</option>
                         </select>
                        </div>

                        <br>
                        <input type="text" name="flag" class="form-control" required="required" placeholder="flag" value="{{old('flag')}}">

                        <input type="text" name="url" class="form-control" placeholder="url" value="{{old('url')}}">

                        <input type="number" name="score" class="form-control" placeholder="score" value="{{old('score')}}">


                        <textarea name="description"  rows="10" class="form-control" splaceholder="请输入内容" >{{old('description')}}</textarea>
                    
                        <br>
                        <button class="btn btn-lg btn-info">新增</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>  
</body>  
</html>  