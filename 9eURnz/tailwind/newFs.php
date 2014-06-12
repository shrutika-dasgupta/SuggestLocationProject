<?php
//connection to the database
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root";

// Connect to server and select database.
$pdo = new PDO('mysql:host=localhost;dbname=restros', $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


require_once "FoursquareAPI.class.php";
$foursquare = new FoursquareAPI("Z4YI1WLX2P1N3W3KQMCY12VZR3UOKRNZ3ZSJLBU4H3JDLZYA", "3UMKWJGHVGI3QHQCE5C3DACKYCWGSQDC3B3LGWAK1R02IYN0");

// Searching for venues nearby Montreal, Quebec
$endpoint = "venues/explore";

// Prepare parameters
$params = array("section"=>"food","ll"=>"40.744749, -73.993705","v"=>"20141006","limit"=>"50");
// Perform a request to a public resource
$response = $foursquare->GetPublic($endpoint,$params);
//print $response;
$response=json_decode($response);
foreach ($response as $groups)
{
	foreach ($groups->groups as $items)
	{
		foreach ($items->items as $data) 
		{
			$id = $data->venue->id;
			$name =$data->venue->name;
			$address = $data->venue->location->address.", ".$data->venue->location->crossStreet.", ".$data->venue->location->city.", ".$data->venue->location->state;
			$distance =$data->venue->location->distance;
			$rating=$data->venue->rating;
			foreach($data->venue->categories as $cat){
				$categoriesId = $cat->id;
				$categoriesName = $cat->name;
			}
			try
				{
 					$statement = $pdo->prepare('INSERT INTO members (id, name, address,distance,categoriesId,categoriesName,rating) VALUES (:var1,:var2,:var3,:var4,:var5,:var6,:var7)');
 					
 					$statement->execute(array(':var1'=>$id,':var2'=>$name,':var3'=>$address,':var4'=>$distance,':var5'=>$categoriesId,':var6'=>$categoriesName,':var7'=>$rating));	 
 				}
 			catch ( PDOException $exception )
 			{
 				echo "PDO error :" . $exception->getMessage();
 			}
 		}
	}
}
?>
