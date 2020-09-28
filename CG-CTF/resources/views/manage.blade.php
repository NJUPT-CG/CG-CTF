@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@section('content')
    <div class="container" v-pre>  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">比赛</div>
                <div class="panel-body">
                    <form action="{{ url('time')}}" method="POST">
                        {!! csrf_field() !!}

                        <br>
                        比赛时间
                        <div class="row" >
                            <div class="col-md-3">
                                 <div class="form-group">
                                 <!-- readonly代表是否为禁用输入 -->
                              开始时间: <input id="date1ID" name='starttime' type='text' class="form-control" value="请选择日期" >
                                </div>
                            </div>
                            <div class="col-md-3">
                        
                            <div class="form-group">
                               结束时间: <input id="dateID" type='text' name='endtime' class="form-control" value="请选择日期" >
                            </div> 
                            </div>
                        </div>
                    
                        <br>
                        <button class="btn btn-lg btn-info">确定</button>
                        <a class="btn btn-lg btn-danger" href="{{url('gameover')}}" role="button">立即结束</a>
                        <a class="btn btn-lg btn-success" href="{{url('gamestartnow')}}" role="button">立即开始</a>
                     </form>
                     <br>
                    
                </div>
            </div>
            </div>
        </div>
    </div>
</div>  

@endsection 
@section('script')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/bootstrap-datetimepicker.min.js"></script>
    
    <script type="text/javascript">
        /* 第三步:初始化插件  */
        $(function() {
            $(".form-control").datetimepicker({
                format : 'yyyy-mm-dd hh:ii:ss', // 展现格式
                startDate : "2019-01-01",// 开始时间
                endDate : "2100-01-01", // 结束时间
                autoclose : true, // 选择日期后关闭
                // 选择器打开之后首先显示的视图
                // 0表示分钟(默认),1表示小时,2表示天,3表示月,4表示年
                startView : 2,
                // 选择器所能够提供的最精确的时间选择视图
                // 0表示分钟(默认),1表示小时,2表示天,3表示月,4表示年
                minView : 0,
                
            });
            
        });
    </script>
@endsection