<?php
	
	$server = "127.0.0.1";
	$user_name = "root";
	$password = "";
	$database = "ecom";
	
	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	
	if(!$db_found){
		die('</br><b>Could not connect: ' . mysql_error() . "</i></br>");
	}
	if (!mysql_select_db($database)){
		die('</br><b>Cant select database: ' . mysql_error() . "</i></br>");	
	}
	
	
	
	#------------CUSTOM FUNCTIONS----------
	#--can add data validation here later--
	
	#perform any query on DB: queryDB("select blah from blah blah")
	function queryDB($query){
		$result = mysql_query($query);
		if(!$result){
			#give semi-useful html formatted error output
			die("</br><b>query failed:</b><i> " . mysql_error() . "</i></br>");	
		}
		return $result;
	}

	#this gets the relevant image for the passed product_id
	#only returns one/first image at the moment.
	function getImage($product_id){
		$query = "SELECT IMAGE_ID FROM product_image WHERE PROD_ID = \"" . $product_id . "\"";
		$result = mysql_query($query);
		$image_field = mysql_fetch_assoc($result);
		$image_loc= $image_field['IMAGE_ID'];		
		return $image_loc;
	}
	
	function resizeImage($image_source, $w, $h){
		
		list($width, $height) = getimagesize($image_source);
		$ratio = $width / $height;
		
		if ($w / $h > $ratio){
			$new_width = $h * $ratio;
			$new_height = $h;
		}else{
			$new_height = $w / $ratio;
			$new_width = $w;
		}
		
		$srcHandle = imagecreatefromjpeg($image_source);
		
		$dstFile = 'images/thumbnails/tn_' . basename($image_source);
		
		$dstHandle = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($dstHandle, $srcHandle, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		imagejpeg($dstHandle, $dstFile, 80);
		return($dstFile);
	}
?>