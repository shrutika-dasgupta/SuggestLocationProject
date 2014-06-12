<?php

class RestTestController extends BaseController
{
	public $restful = true;

	public function get_restro_list()
	{
		return View::make('restView.restaurant')->with('title','Restuarant Details');
	}

	public function display_list()
	{
		$user = new Restro;

		$value = $user->callFoursq();

		return View::make('restView.displayData',array('title'=>$value));
	}

	public function interactModel()
	{
		
	}
}