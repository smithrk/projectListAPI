<?php

class ProjectAPIController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		error_log('a string');
		return 'something';
	}
	public function createProjectTable(){
		Schema::dropIfExists('projects');
		$status = Schema::create('projects', function($table){
			$table->increments('id');
			$table->string('title', 100)->unique();
			//$table->string('email', 100);
			$table->string('date');
			$table->string('contributors');
			$table->string('location');
		});
		return '[{"create": "'.$status.'"}]';
	}
	public function createProject(){
		
		if(isset($_REQUEST['title']) && isset($_REQUEST['date']) && isset($_REQUEST['contributors']) && isset($_REQUEST['location']) && !($this->validate($_REQUEST['title']))){
			
			$status = DB::table('projects')->insert(array(
			array('title' => $_REQUEST['title'], 'date' => $_REQUEST['date'], 'contributors' => $_REQUEST['contributors'], 'location' => $_REQUEST['location'])
			));
			
			return '[{"data": "1", "create": "'.$status.'"}]';
        }else{
            return '[{"data": "0", "create": "0"}]';
	    }
		
	}

	public function updateProject(){
		if(isset($_REQUEST['title']) && isset($_REQUEST['date']) && isset($_REQUEST['contributors']) && isset($_REQUEST['location'])){
			$status = DB::table('projects')
				->where('title', $_REQUEST['title'])
				->update(array('date' => $_REQUEST['date'], 'contributors' => $_REQUEST['contributors'], 'location' => $_REQUEST['location'] ));
			return '[{"data": "1", "update": "'.$status.'"}]';
        }else{
            return '[{"data": "0", "udpate": "0"}]';
		}


	}

	public function listProjects(){
		$data = DB::select('select * from projects');
		return json_encode($data);
	}
	public function validate($title){
		$status = DB::select('select count(id) count from projects where title="'.$title.'"');
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
