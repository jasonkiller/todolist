<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {
	//
	public function index() {
		$todo = \DB::table('todo')->where('finish_at', 0)->where('delete_at', 0)->orderBy('create_at', 'desc')->get();
		$finish = \DB::table('todo')->where('finish_at', '!=', 0)->where('delete_at', '=', 0)->get();
		$delete = \DB::table('todo')->where('delete_at', '!=', 0)->get();

		return view('index', ['todo' => $todo, 'finish' => $finish, 'delete' => $delete]);
	}

	/**
	 * [add description]
	 * @param Request $request [description]
	 */
	public function add(Request $request) {
		$id = $request->input('id');
		$title = $request->input('title');
		$description = $request->input('description');
		$time = time();
		$data = [];
		$data['title'] = $title;
		$data['description'] = $description;
		$data['create_at'] = $time;
		if ($id) {
			$res = \DB::table('todo')->where('id', $id)->update($data);
		} else {
			$res = \DB::table('todo')->insert($data);
		}

		if ($res) {
			$result['message'] = 'ok';
			$result['status_code'] = 200;
		} else {
			$result['message'] = 'error';
			$result['status_code'] = 201;
		}
		return $result;
	}

	/**
	 * [edit description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function edit(Request $request) {
		$id = $request->input('id');

		$res = \DB::table('todo')->where('id', $id)->get();
		if ($res) {
			$result['message'] = 'ok';
			$result['status_code'] = 200;
			$result['data'] = $res;
		} else {
			$result['message'] = 'error';
			$result['status_code'] = 201;
		}
		return $result;
	}

	/**
	 * [del description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function del(Request $request) {
		$id = $request->input('id');
		$type = $request->input('type');
		if ($type == 'del') {
			$res = \DB::table('todo')->where('id', $id)->update(['delete_at' => time()]);
		} else {
			$res = \DB::table('todo')->where('id', $id)->update(['delete_at' => '']);
		}
		if ($res) {
			$result['message'] = 'ok';
			$result['status_code'] = 200;
		} else {
			$result['message'] = 'error';
			$result['status_code'] = 201;
		}
		return $result;
	}

	/**
	 * [clrDel description]
	 * @param  Request    $request
	 * @return [type]              [description]
	 */
	public function clrDel(Request $request) {
		$id = $request->input('id');
		$res = \DB::table('todo')->where('id', $id)->delete();
		if ($res) {
			$result['message'] = 'ok';
			$result['status_code'] = 200;
		} else {
			$result['message'] = 'error';
			$result['status_code'] = 201;
		}
		return $result;
	}

	/**
	 * [doFinish description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function doFinish(Request $request) {
		$id = $request->input('id');
		$type = $request->input('type');
		if ($type == 'finish') {
			$res = \DB::table('todo')->where('id', $id)->update(['finish_at' => time()]);
		} else {
			$res = \DB::table('todo')->where('id', $id)->update(['finish_at' => '']);
		}

		if ($res) {
			$result['message'] = 'ok';
			$result['status_code'] = 200;
		} else {
			$result['message'] = 'error';
			$result['status_code'] = 201;
		}
		return $result;
	}

}
