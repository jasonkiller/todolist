@extends('main')


@section('css')
@parent
<link href="/css/index.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')
{{ dump($todo) }}
<div>
	<h2>todo</h2>
	<ul class="todul">
	@foreach($todo as $tod)
		<li data-id="{{ $tod->id }}">
			<div>&nbsp;&nbsp;{{ $tod->title }}</div>
			<div>&nbsp;&nbsp;{{ $tod->description }}</div>&nbsp;&nbsp;&nbsp;&nbsp;{{ date('Y-m-d H:i:s', $tod->create_at) }}| <button data-id="{{ $tod->id }}">edit</button>&nbsp;&nbsp;<button data-id="{{ $tod->id }}">del</button>&nbsp;&nbsp;<button data-id="{{ $tod->id }}" id="finish">finish</button></li>
			<div style="clear:both"></div>
	@endforeach
	</ul>
	<div style="clear:both"></div>
	<h2>finished</h2>
	<ul class="finul">
	@foreach($finish as $fin)
		<li>
			<div>&nbsp;&nbsp;{{ $fin->title }}</div>
			<div>&nbsp;&nbsp;{{ $fin->description }} &nbsp;&nbsp;</div>
			<div>&nbsp;&nbsp;{{ $fin->create_at }}</div>| &nbsp;&nbsp;<button>del</button>&nbsp;&nbsp;FINISH_AT : {{ date('Y-m-d H:i:s', $fin->finish_at) }}</li>
		<div style="clear:both"></div>
	@endforeach
	</ul>
</div>



<form action="" method="post" target="iframe">
	<input type="text" name="title" id="title">
	<input type="text" name="description" id="description">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input type="submit" name="" id="submit">
</form>
<iframe name="iframe" style="display: none;"></iframe>

@endsection



@section('js')
@parent
<script type="text/javascript" src="/js/index.js"></script>
@endsection