<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.challengedetail
		{

		}

	</style>
</head>
<body>
	<div class="challengedetail">
		<form action="{{ url('/submitflag/'.$challenge->id ) }}" method="POST">
		{!! csrf_field() !!}
		<p>{{$challenge->title}}</p>
		<p>{{$challenge->class}}</p>
		<p>{{$challenge->description or ''}}</p>
		<a href="{{$challenge->url or ''}}">{{$challenge->url or ''}}</a>
		<p>{{$challenge->info or ''}}</p>
		<input type="text" name="flag" placeholder="flag" />
		<button>Submit</button>
	</form>
	</div>
</body>
</html>