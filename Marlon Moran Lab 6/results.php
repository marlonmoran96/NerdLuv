<?php include("top.html"); ?>


<?php

$textFile = file_get_contents("dataresourse/singles.txt");
$singles = explode("\n", $textFile);

$user= $_GET["name"];


$userInfo = array();

foreach ($singles as $people) {

	$userInfo = explode(",", $people);
	if($userInfo[0] == $user){   
		break;
	}
}
function Pcheck($matchP, $userP){
	for($i=0; $i<4; $i++){
		if ($matchP[$i] == $userP[$i]){
			return true;
		}
	}
}


function matches(){
	global $singles;
	global $userInfo;
	$matches = $singles;
	$arraySize = sizeof($matches);
	
	for ($i=0; $i<$arraySize; $i++){

		$matchInfo = explode(",", $matches[$i]);
        $location = $i+1;
        
		if ($matchInfo[1] == $userInfo[1]){
			unset($matches[$i]); 
        }
        
		else if ($matchInfo[4] != $userInfo[4]){
            unset($matches[$i]); 
            
        }
        
		else if (($matchInfo[2] < $userInfo[5] || $matchInfo[2] > $userInfo[6]) || ($userInfo[2] < $matchInfo[5] || $userInfo[2] > $matchInfo[6])){
            unset($matches[$i]); 
            
        }
        
		else if (!Pcheck(str_split($matchInfo[3]), str_split($userInfo[3])))
		{

			unset($matches[$i]); 
		}
	}
    $matches = array_values($matches); 
    
	return $matches;
}

function showMatches(){

    $matches = matches();
    
	for ($i=0; $i<sizeof($matches); $i++) {

        $potential = explode(",", $matches[$i]);
        
		printMatches($potential);
	}
}


function printMatches($potential){

    echo "<div class='match'>
    
        <p><img src='images/user.jpg' alt='user icon' />
        
		" . $potential[0] . "</p>
        <ul>
        
            <li><strong>gender:</strong>" . $potential[1] . "</li>
            
            <li><strong>age:</strong>" . $potential[2] . "</li>
            
            <li><strong>type:</strong>" . $potential[3] . "</li>
            
            <li><strong>OS:</strong>" . $potential[4] . "</li>     
                               
        </ul>
        
		</div>";
}
?>

<h1>Matches for <?=$user?></h1>


<?php showMatches();?>
	


<?php include("bottom.html"); ?>

