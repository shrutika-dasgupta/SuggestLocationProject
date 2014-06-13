<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Restro extends Eloquent 
{
	public $table = 'members';

	//protected $hidden = array('password', 'remember_token');
	protected $fillable = array('id', 'name', 'address','distance','rating','categoriesId','categoriesName');

	public function callFoursq()
	{
		$host="localhost"; // Host name 
		$username="root"; // Mysql username 
		$password="root";

		// Connect to server and select database.
		$pdo = new PDO('mysql:host=localhost;dbname=restros', $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		require_once "FoursquareAPI.class.php";
		$key= "X0CXGZW3L0WX1VO4GTKEKXTNCRDZ3ANTQGK01RQVTRAOGKOV";
		$secret="QCBGPZTNNW2FBZS1F5P1LHMVFJKBLHPCFO3SRBWYBJJIKSLE";
		$foursquare = new FoursquareAPI( $key,$secret);

		// Searching for venues nearby Montreal, Quebec
		$endpoint = "venues/explore";

		// Prepare parameters
		$params = array("section"=>"food","ll"=>"38.8373, -72.8869","v"=>"20141006","limit"=>"50");
		// Perform a request to a public resource
		$response = $foursquare->GetPublic($endpoint,$params);
		//print $response;
		$result=json_decode($response);
		$group = array();
		$item = array();
		$cat = array();

		$group= $result->response;

		foreach ($group->groups as $item)
		{
			foreach ($item->items as $data) 
			{

				$id = $data->venue->id;
				$name =$data->venue->name;
				$location = $data->venue->location;
				$address = $location->address.", ".$location->city.", ".$location->state;
				$distance =$location->distance;
				$rating=$data->venue->rating;
				foreach($data->venue->categories as $cat)
				{
					$categoriesId = $cat->id;
					$categoriesName = $cat->name;
				}
				//print $id."</br>".$name."</br>".$address."</br>".$distance."</br>".$rating."</br>".$categoriesId."</br>".$categoriesName."</br>";

				
				try
				{
					$rest = Restro::create(array('id'=>$id,'name'=>$name,'address'=>$address,'distance'=>$distance,'categoriesId'=>$categoriesId,'categoriesName'=>$categoriesName,'rating'=>$rating));
				 	$rest ->save(); 
				}
				catch ( PDOException $exception )
				{
					echo "PDO error :" . $exception->getMessage();
				}
			}
		}
		return "done";
	}

	public function getData()
	{
		$results = Restro::all();

		return $results;
	}
}			