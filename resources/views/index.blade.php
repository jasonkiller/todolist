@extends('main')


@section('css')
@parent
<link href="/css/index.css" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div>
	<h2>{{ trans('index.TODO') }}</h2>
	<table>
		@if(!empty($todo))
		<tr>
			<th>{{ trans('index.TITLE') }}</th>
			<th>{{ trans('index.DESCRIPTION') }}</th>
			<th>{{ trans('index.CREATE_AT') }}</th>
			<th>{{ trans('index.HANDLE') }}</th>
		</tr>
		@endif
		@forelse($todo as $tod)
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
			@empty
			<tr>
				<td>暂无待办任务</td>
			</tr>
		@endforelse
	</table>
	<h2>{{ trans('index.FINISHED') }}</h2>
	<table>
		@if(!empty($finish))
        <tr>
			<th>{{ trans('index.TITLE') }}</th>
			<th>{{ trans('index.DESCRIPTION') }}</th>
			<th>{{ trans('index.FINISH_AT') }}</th>
			<th>{{ trans('index.HANDLE') }}</th>
		</tr>
		@endif
		@forelse($finish as $fin)
		<tr>
            <td>{{ $fin->title }}</td>
			<td>{{ $fin->description }}</td>
			<td>{{ date('Y-m-d H:i:s', $fin->finish_at) }}</td>
            <td>
				<button data-id="{{ $fin->id }}" class="del">del</button>
				<button data-id="{{ $fin->id }}" class="unFinish">unFinish</button>
			</td>
		</tr>
		@empty
			<tr>
				<td>暂无已完成任务</td>
			</tr>
        @endforelse
	</table>
    <h2>{{ trans('index.DELETED') }}</h2>
	<table>
		@if(!empty($delete))
		<tr>
			<th>{{ trans('index.TITLE') }}</th>
			<th>{{ trans('index.DESCRIPTION') }}</th>
            <th>{{ trans('index.DELETE_AT') }}</th>
			<th>{{ trans('index.HANDLE') }}</th>
        </tr>
        @endif
		@forelse($delete as $del)
        <tr>
            <td>{{ $del->title }}</td>
            <td>{{ $del->description }}</td>
            <td>{{ date('Y-m-d H:i:s', $del->delete_at) }}</td>
			<td>
				<button data-id="{{ $del->id }}" class="unDel">undel</button>
				<button data-id="{{ $del->id }}" class="clrDel" style="color: red;">clear</button>
			</td>
        </tr>
        @empty
        	<tr>
        		<td>暂无已删除任务</td>
        	</tr>
        @endforelse
	</table>
</div>
<h2>{{ trans('index.ANT') }}</h2>
<form action="" method="post" target="iframe">
	{{ trans('index.TITLE') }}
	<input type="text" name="" id="title"><br>
	{{ trans('index.DESCRIPTION') }}
	<input type="text" name="" id="description"><br>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="taskId" id="taskId" value="">

	<input type="submit" value="{{ trans('index.SUBMIT') }}" id="submit">
</form>
<iframe name="iframe" style="display: none;"></iframe>

@endsection


@section('js')
@parent
<script type="text/javascript" src="/js/index.js"></script>
@endsection