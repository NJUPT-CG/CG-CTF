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
                <div class="panel-heading">{{$statue or '修改'}}</div>
                <div class="panel-body">
                    <form action="{{ url('/editchallenge/'.$challenge->id ) }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{$challenge->title or ''}}">
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
                        <input type="text" name="flag" class="form-control" required="required" placeholder="flag" value="{{$challenge->flag or ''}}">

                        <input type="text" name="url" class="form-control" placeholder="url" value="{{$challenge->url or ''}}">

                        <textarea name="description"  rows="10" class="form-control" splaceholder="请输入内容" >{{$challenge->description or ''}}</textarea>
                    
                        <br>
                        <button class="btn btn-lg btn-info">修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>  
</body>  
</html>  