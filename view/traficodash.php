
 

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
      "once" => "",
      ));

    $rows = array(); $rows2 = array(); $rows3 = array();

    if(isset($getinterfacetraffic[0]['tx-bits-per-second'])){

      $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
    }
    else { $ftx=0;}

    if(isset($getinterfacetraffic[0]['rx-bits-per-second'])){

     $frx = $getinterfacetraffic[0]['rx-bits-per-second'];
    }
    else { $frx=0;}

    
    
  $rows['name'] = 'Tx';
      $rows['data'][] = $ftx;
     
   
      $rows2['name'] = 'Rx';
      $rows2['data'][] = $frx;
       $rows3['name'] = 'interface';
      $rows3['data'][] = $nameinterfaz;

   
	  
      
  }else{
		echo "error";
  }
  
  $API->disconnect();

	$result = array();

	array_push($result,$rows);
	array_push($result,$rows2);
    array_push($result,$rows3);
  print json_encode($result);

?>
