@extends('layouts.app')
@section('content')
<div class="container">
<table class="table">
	<caption>Total Score:{{$score or '' }}</caption>
   <thead>
      <tr>
      <th>Title</th>
		  <th>score</th>
		  <th>time</th>
      </tr>
   </thead>
   @if(isset($challenges))
       @foreach($challenges as $challenge)
    <tbody>
      <tr>
      <td>{{$challenge['title']}}</td>
		  <td>{{$challenge['score']}}</td>
		  <td>{{$challenge['pivot']['created_at']}}</td>
	   </tr>
   </tbody>
       @endforeach
    @endif
</table>
</div>
@endsection