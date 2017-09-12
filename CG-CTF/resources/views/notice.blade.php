@extends('layouts.app')
@section('content')
<div class="container">
<table class="table">
	<caption>NOTICE</caption>
   <thead>
      <tr>
      <th>notice</th>
		  <th>time</th>
      @if(App\User::isadmin())
      <th>admin</th>
      @endif
      </tr>
   </thead>
   @if(isset($notices))
       @foreach($notices as $notice)
    <tbody>
      <tr>
         <td width="80%">{!! nl2br(e($notice['content'])) !!}</td>
		      <td>{{$notice['created_at']}}</td>
          @if(App\User::isadmin())
          <th><a href="{{ url('notice/edit/'.$notice['id']) }}" class="btn btn-info">编辑</a></th>
         @endif
	   </tr>
   </tbody>
       @endforeach
    @endif
</table>

  {{ $notices->links() }}
</div>
@endsection