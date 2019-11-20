<?php include("top.html"); ?>

<?php

$user= $_POST["name"];

$userData = $user;

foreach ($_POST as $key => $value) {

	if ($key != "name"){

		$userData = $userData.",".$value;
	}
}

file_put_contents("dataresourse/singles.txt", "\n".$userData, FILE_APPEND);
?>

<div>


<h1>Thank you!</h1>


<p>
Welcome to NerdLuv, <?= $user ?>!<br /><br />
Now <a href="matches.php">log in to see your matche(s)!</a>

</p>

</div>

<?php include("bottom.html"); ?>