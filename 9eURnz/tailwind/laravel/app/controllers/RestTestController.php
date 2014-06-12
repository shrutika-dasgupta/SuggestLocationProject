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
		return View::make('restView.displayData')->with('title','Results');
	}

	public function interactModel()
	{
		$user = new Restro;

		$value = $user->insertRest();

		//echo $value;

		//print($value."in controller");

		return View::make('restView.displayData',array('title'=>$value));
	}
}