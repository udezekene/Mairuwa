<?php
			    
$newsletterFileName = "file.txt";
//validate email address - check if input was empty  

function GetField($input) {
    $input=strip_tags($input);
    $input=str_replace("<","<",$input);
    $input=str_replace(">",">",$input);
    $input=str_replace("#","%23",$input);
    $input=str_replace("'","`",$input);
    $input=str_replace(";","%3B",$input);
    $input=str_replace("script","",$input);
    $input=str_replace("%3c","",$input);
    $input=str_replace("%3e","",$input);
    $input=trim($input);
    return $input;
} 


$email 	= GetField($_GET['email']);
//$pass 	= validEmail($email);
$pass 	= preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email);

if ($pass) {
	$f = fopen($newsletterFileName, 'a+');
	$read = fread($f,filesize($newsletterFileName));
	If (strstr($read,"@")) {
		$delimiter = ";";
	}
	if (strstr($read,$email)) { 
		$status = "error";  
        $message = "You've already this email address!";
	} else {
		fwrite($f, $delimiter . $email);
		$status = 'success';  
		$message = 'you have been signed up!'; 
	}
	fclose($f);
} else {
	$status = "error";  
    $message = "Please enter a valid email address!";  
}

     
		fclose($f);      */
        //return json response  
        $data = array(  
            'status' => $status,  
            'message' => $message  
        );  
      
        echo json_encode($data);  
      
        exit;  

?>	