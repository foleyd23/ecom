<?php include 'header.php';?>

<?php
    $user_name = "root";
    $password = "";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 
?> 


 <body>
 
 <div id="container">  	
 	<div id="fullpackage">
 	
 	<?php echo "I KNOW THESE WONT REALLY GO HERE ITS JUST TO TEST PHP/SQL I/O. Lenny.<BR>"?>

	<?php

	$allProd = "SELECT * FROM products";
	$result = mysql_query($allProd);
	 if ($db_found) {
	
	
	while ($db_field = mysql_fetch_assoc($result)) { 
		echo "<div style=\"float: left; padding: 10px; width:200px;\">";
	$prod_id= $db_field['PROD_ID'];
	$prod_name= $db_field['PROD_NAME'];
		echo "<p>";
		echo "Product Name: <b>" . $prod_name;
 		echo "</b></p>";
	$prod_price= $db_field['PROD_PRICE'];
		echo "<p>";
		echo "Price: <b>" . $prod_price;
 		echo "</b></p>";	
	$prod_quantity= $db_field['PROD_QUANTITY'];
		echo "<p>";
		echo "In Stock: <b>" . $prod_quantity;
 		echo "</b></p>";
 	$prod_desc= $db_field['PROD_DESC'];
		echo "<p>";
		echo "About: <b>" . $prod_desc;
 		echo "</b></p>";
 		 		
 	$SQL2 = "SELECT IMAGE_ID
		FROM product_image
		WHERE PROD_ID = \"" . $prod_id . "\"";
		$result2 = mysql_query($SQL2);

		while ($image_field = mysql_fetch_assoc($result2)){
			$image_loc= $image_field['IMAGE_ID'];
			echo "<p>";
			echo "<img src =\"" . $image_loc . "\">";
			echo "</p>";
		}

 	
	echo "</div>";
	
	}
	$kites=mysql_query("SELECT * FROM products WHERE PROD_TYPE='kite'");
	$kites_result=mysql_fetch_array($kites);
 		$kites_name=$kites_result['PROD_NAME'];	
 	
 	$boards=mysql_query("SELECT*FROM products WHERE PROD_TYPE='board'");
 	$boards_result=mysql_fetch_array($boards);
 	$boards_name=$boards_result['PROD_NAME'];
	?>
 		</div>
<<<<<<< HEAD
 		<div id="newproducts"><?php echo "new products go here :"?></div>
 		<div id="kites"> <a href="products.php?prod_type=kite">Kites</a><?php  echo "kites go here :".$kites_name ?></div>
=======
 		<div id="newproducts">
 		NEW STOCK
 		(Add date_added field to DB pick newest 2)
 		
 		<?php
 		$newProd = "SELECT * FROM PRODUCTS";
		$newProds = mysql_query($newProd);
 	
 			while ($new_field = mysql_fetch_assoc($newProds)) { 
 					echo "<div style=\"float: top; padding: 10px; width:175px;\">";
 				$prod_id= $new_field['PROD_ID'];
 				$prod_name= $new_field['PROD_NAME'];
 					echo "<a href =\"generate_link.php\">" . $prod_name . "</a>";
 				
 				$SQLnew = "SELECT IMAGE_ID
 					FROM product_image
 					WHERE PROD_ID = \"" . $prod_id . "\"";
 				$result3 = mysql_query($SQLnew);
 				
 				$image_field = mysql_fetch_assoc($result3);
 				$image_loc= $image_field['IMAGE_ID'];
					echo "<img src =\"" . $image_loc . "\">";
					echo "</div>";
 			}
 	 	
 		
 		?>
 		
 		</div>
 		
 		
 		
 		
 		<div id="kites"><?php  echo "kites go here :".$kites_name ?></div>
>>>>>>> 98e417a77ced7ce3a398cef2140d355df091311f
 		<div id="boards"><?php echo "boards go here :".$boards_name ?> </div>
 		<div id="accessories"><?php echo "accessories go here"?> </div>


	<?php
		mysql_close($db_handle);
		}
		else {
		echo "Database NOT Found ";
		mysql_close($db_handle);
		}
	?> 		
 		
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
