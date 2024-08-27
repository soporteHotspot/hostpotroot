<?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
	
 
$com=$_POST['nombre'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            "?disabled" => "yes",
            
            ));

		
 


			$TotalReg = count($obtenerusers);


			if ($TotalReg<1){
         echo 2;

		}


		else {


//$i = 1;

//while ( $i <= $TotalReg) {
$suma=0;
for ($i = 0; $i < $TotalReg; $i++) {   


	$users = $obtenerusers[$i];

	if(isset($users['comment']))
		
     {$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];}
 else {$comentario="0 SIN-COMENTARIOS";}	





if($com==$comentario){
 
		 
		if (isset($users['comment'])){
			$comentariomm =$users['comment'];
			$int=explode(" ",$comentariomm);
			$suma+=(int)$int[0];			 
			
		}
		else {
			$suma =0;
		}
	
	 	 
}}

 

echo json_encode($suma);
 

}}

else {
	
	echo "Error";
}

 ?> 