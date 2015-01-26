<?php

class ProfilePageController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'something';
	}
	public function createTable(){
		Schema::dropIfExists('users');
		$status = Schema::create('users', function($table){
			$table->increments('id');
			$table->string('name', 100);
			//$table->string('email', 100);
			$table->string('email')->unique();
			$table->string('github');
		});
		return '[{"create": "'.$status.'"}]';
	}
	public function createUser(){
	
		if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['github']) && !($this->validate($_REQUEST['email']))){
			$status = DB::table('users')->insert(array(
			array('email' => $_REQUEST['email'], 'name' => $_REQUEST['name'], 'github' => $_REQUEST['github'])
			));
			return '[{"data": "1", "create": "'.$status.'"}]';
        }else{
            return '[{"data": "0", "create": "0"}]';
	    }
		
	}

	public function updateUser(){
		if(isset($_REQUEST['name']) && isset($_REQUEST['email'])){
			$status = DB::table('users')
				->where('email', $_REQUEST['email'])
				->update(array('name' => $_REQUEST['name']));
			return '[{"data": "1", "update": "'.$status.'"}]';
        }else{
            return '[{"data": "0", "udpate": "0"}]';
		}


	}

	public function listUsers(){
		$data = DB::select('select * from users');
		return json_encode($data);
	}
	public function validate($email){
		$status = DB::select('select count(id) count from users where email="'.$email.'"');
		//$status = false;
		error_log(print_r($status,1));
		return $status[0]-> count;
	}
	public function lookup($id){
		return 'it is working';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
