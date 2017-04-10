@extends('main')

@section('content')

<div>
	<ul>
		<li>&nbsp;&nbsp;tod1&nbsp;&nbsp; | <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a></li>
		<li>&nbsp;&nbsp;tod1&nbsp;&nbsp; | <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a></li>
		<li>&nbsp;&nbsp;tod1&nbsp;&nbsp; | <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a></li>
		<li>&nbsp;&nbsp;tod1&nbsp;&nbsp; | <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a></li>
		<li>&nbsp;&nbsp;tod1&nbsp;&nbsp; | <a href="#">edit</a>&nbsp;&nbsp;<a href="#">del</a></li>
	</ul>
</div>



<form action="./content.php">
	<input type="text" name="title">
	<input type="text" name="time">

	<input type="submit" name="">
</form>


@endsection



@section('js')
<script type="text/javascript" src="/js/index.js"></script>
@endsection