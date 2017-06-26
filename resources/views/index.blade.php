@extends('main')


@section('css')
@parent
<link href="/css/index.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div>
	<h2>TODO</h2>
	<table>
		<tr>
			<th>TITLE</th>
			<th>DESCRIPTION</th>
			<th>CREATE_AT</th>
			<th>HANDLE</th>
		</tr>
		@foreach($todo as $tod)
			<tr>
				<td>{{ $tod->title }}</td>
				<td>{{ $tod->description }}</td>
				<td>{{ date('Y-m-d H:i:s', $tod->create_at) }}</td>
				<td>
					<button data-id="{{ $tod->id }}" class="edit">edit</button>
					<button data-id="{{ $tod->id }}" class="del">del</button>
					<button data-id="{{ $tod->id }}" class="finish">finish</button>
				</td>
			</tr>
		@endforeach
	</table>
	<h2>FINISHED</h2>
	<table>
        <tr>
			<th>TITLE</th>
			<th>DESCRIPTION</th>
			<th>FINISH_AT</th>
			<th>HANDLE</th>
		</tr>
		@foreach($finish as $fin)
		<tr>
            <td>{{ $fin->title }}</td>
			<td>{{ $fin->description }}</td>
			<td>{{ date('Y-m-d H:i:s', $fin->finish_at) }}</td>
            <td>
				<button data-id="{{ $fin->id }}" class="del">del</button>
				<button data-id="{{ $fin->id }}" class="unFinish">unFinish</button>
			</td>
		</tr>
        @endforeach
	</table>
    <h2>DELETED</h2>
	<table>
		<tr>
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>DELETE_AT</th>
			<th>HANDLE</th>
        </tr>
		@foreach($delete as $del)
        <tr>
            <td>{{ $del->title }}</td>
            <td>{{ $del->description }}</td>
            <td>{{ date('Y-m-d H:i:s', $del->delete_at) }}</td>
			<td>
				<button data-id="{{ $del->id }}" class="unDel">undel</button>
				<button data-id="{{ $del->id }}" class="clrDel">clear</button>
			</td>
        </tr>
        @endforeach
	</table>
</div>
<h2>ADD NEW TASK</h2>
<form action="" method="post" target="iframe">
	TITLE
	<input type="text" name="title" id="title"><br>
	DESCRIPTION
	<input type="text" name="description" id="description"><br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="taskId" id="taskId" value="">

	<input type="submit" value="submit" id="submit">
</form>
<iframe name="iframe" style="display: none;"></iframe>

@endsection


@section('js')
@parent
<script type="text/javascript" src="/js/index.js"></script>
@endsection