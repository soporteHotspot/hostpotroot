
 

<?php
//$interface = $_POST["interface"];
 require_once '../require/routerboard.phar';
   

 function readableBytes($bytes) {
    $i = floor(log($bytes) / log(1024));
    $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
}

	if ($API->connect($ip,$Usuario,$password)) {




  $Getinterfaz = $API->comm("/interface/print", array(
           
            "?type" =>"ether",          
              
            ));

 
  
  $nameinterfaz=$Getinterfaz[0]['name'];
  
  
        

//$getinterface = $API->comm("/interface/print");
    //$interface = $getinterface[$iface-1]['name'];
    $getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
      "interface" => $nameinterfaz,
      ));

    

    if(isset($getinterfacetraffic[0]['tx-bits-per-second'])){

      $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
      $ftx= readableBytes($ftx);
    }
    else { $ftx=0;}

    if(isset($getinterfacetraffic[0]['rx-bits-per-second'])){

     $frx = $getinterfacetraffic[0]['rx-bits-per-second'];
    $frx= readableBytes($frx);
    }
    else { $frx=0;}

      $data=array(
'textdescarga'=>"Descarga ".$nameinterfaz,
'textsubida'=>"Subida ".$nameinterfaz,
'subida'=>$ftx,
'descarga'=>$frx,);

  echo json_encode($data);
 
	  
      
  }else{
		echo "error";
  }
  
 

	

?>
