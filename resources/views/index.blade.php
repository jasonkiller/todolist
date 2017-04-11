@extends('main')

@section('content')
{{ dump($todo) }}
<div>
	<h2>todo</h2>
	<ul>
	@foreach($todo as $tod)
		<li><span>&nbsp;&nbsp;{{ $tod->title }}</span>&nbsp;&nbsp;{{ $tod->description }} &nbsp;&nbsp;&nbsp;&nbsp;{{ $tod->create_at }}| <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a>&nbsp;&nbsp;<a href="">finish</a></li>
	@endforeach
	</ul>
	<h2>finished</h2>
	<ul>
	@foreach($finish as $fin)
		<li><span>&nbsp;&nbsp;{{ $fin->title }}</span>&nbsp;&nbsp;{{ $fin->description }} &nbsp;&nbsp;&nbsp;&nbsp;{{ $fin->create_at }}| <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a>&nbsp;&nbsp;<a href="">finish</a></li>
	@endforeach
	</ul>
</div>



<form action="/add" method="post">
	<input type="text" name="title">
	<input type="text" name="description">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input type="submit" name="">
</form>


@endsection



@section('js')
<script type="text/javascript" src="/js/index.js"></script>
@endsection