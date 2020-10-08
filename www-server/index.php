<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: origin, x-requested-with, content-type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

$str = '{
	"gallery":[
	    {
			"alt":"Bild zeigt eine top_left Position.",
			"description":"Eine top_left Position",
			"title":"Bild top_left",
			"src":"http://127.0.0.1:8088/assets/img/top_left.png"
		},
	    	{
			"alt":"Bild zeigt eine top_right Position.",
			"description":"Eine top_right Position",
			"title":"Bild top_right",
			"src":"http://127.0.0.1:8088/assets/img/top_right.png"
		},
		{
			"alt":"Bild zeigt eine bottom_left Position.",
			"description":"Eine bottom_left Position",
			"title":"Bild bottom_left",
			"src":"http://127.0.0.1:8088/assets/img/bottom_left.png"
			
		},
		{
			"alt":"Bild zeigt eine bottom_right Position.",
			"description":"Eine bottom_right Position",
			"title":"Bild bottom_right",
			"src":"http://127.0.0.1:8088/assets/img/bottom_right.png"
			
		},
		{
			"alt":"Bild zeigt eine center Position.",
			"description":"Eine center Position",
			"title":"Bild center",
			"src":"http://127.0.0.1:8088/assets/img/center.png"
		}
	],
	"users":[
	    	{
			"name":"Max",
			"password":"1234"
		},
	    	{
			"name":"Anna",
			"password":"4321"
		}
	]
}';

// $_POST["hash"] ?
// invalidate ?

if( isset( $_GET["hash"] ) ) {
	$hash = htmlspecialchars($_GET["hash"]);

	$json = json_decode($str);
	foreach( $json->users as $user ) {
		$sha256 = hash('sha256',$user->name . $user->password);
		if( $sha256 == $hash ) {
			if( !isset( $_GET["data"] ) ) {
				echo "true";
			} else {
				echo $str;  // return with users in string ?
			}
		}
	}
}
?>
