<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="POST" action="{{url('/user/login')}}">
    {{csrf_field()}}
    <input type="text" name="username" >
    <input typr="password" name="password">
    <input type="submit" value="Submit">
    @if(isset($data))
        {{$data['error']}}
    @endif
</form>
</body>
</html>