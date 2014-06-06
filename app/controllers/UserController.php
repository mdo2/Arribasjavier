<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$data=array(
			'name' => Input::get("register_name"),
			'username' => Input::get("register_username"),
			'email' => Input::get("register_email"),
			'password' => Input::get("register_password")			
		);
		$validator = Validator::make($data,array(
			'name' => 'required',
			'username' => 'required|unique:users|min:3|max:8',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6'
		));
		if ($validator->fails())
			return Redirect::to('user/register')->withInput()->withErrors($validator);
		else{
			$data['password']=Hash::make($data['password']);
			User::create($data);
			return Redirect::to("/");
		}
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
