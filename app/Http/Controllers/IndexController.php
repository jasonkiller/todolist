<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function index()
    {
    	$todo = \DB::table('todo')->where('finish_at', 0)->where('delete_at', 0)->get();
    	$finish = \DB::table('todo')->where('finish_at', '!=', 0)->where('delete_at', '!=', 0)->get();

    	return view('index', ['todo' => $todo, 'finish' => $finish]);
    }

    public function add(Request $request)
    {
    	$title = $request->input('title');
    	$description = $request->input('description');
    	$data = [];
    	$data['title'] = $title;
    	$data['description'] = $description;

    	$res = \DB::table('todo')->insert($data);

    	if($res){
    		$result['message'] = 'ok';
    		$result['status_code'] = 200;
    	}else{
    		$result['message'] = 'error';
    		$result['status_code'] = 201;
    	}

    	return $result;
    }

    public function edit($data)
    {
    	$id = $data['id'];
    	$data = $data['data'];

    	$res = \DB::table('todo')->where('id', $id)->updata($data);
    	if($res){
    		$result['message'] = 'ok';
    		$result['status_code'] = 200;
    	}else{
    		$result['message'] = 'error';
    		$result['status_code'] = 201;
    	}

    	return $result;
    }

    public function del($id)
    {
    	$res = \DB::table('todo')->where('id', $id)->update(['delete_at', time()]);
    	if($res){
    		$result['message'] = 'ok';
    		$result['status_code'] = 200;
    	}else{
    		$result['message'] = 'error';
    		$result['status_code'] = 201;
    	}

    	return $result;
    }


}
