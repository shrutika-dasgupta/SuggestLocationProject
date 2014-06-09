<?php

class TestController extends BaseController{

	//Default action like a function in java
	public $restful = true;

	public function get_index()
	{
		$view = View::make('authors.index',array('name'=>'Shrutika Dasupta'))->with('age','28');

		$view->location = 'California';
		$view['speciality'] = 'PHP';

		return $view;
	}
}