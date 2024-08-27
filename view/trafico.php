
 

<?php
$interface = $_POST["interface"];
 require_once '../require/routerboard.phar';
  //"<pppoe-nombreusuario>";

 
	if ($API->connect($ip,$Usuario,$password)) {

//$getinterface = $API->comm("/interface/print");
    //$interface = $getinterface[$iface-1]['name'];
    $getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
      "interface" => "$interface",
      "once" => "",
      ));

    $rows = array(); $rows2 = array(); $rows3 = array();$rows4 = array();

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
      $rows3['data'][] = $interface;

       $rows4['name'] = 'ip';
      $rows4['data'][] = $ip;
	  $API->disconnect();

  $result = array();

  array_push($result,$rows);
  array_push($result,$rows2);
  array_push($result,$rows3);
        array_push($result,$rows4);
  print json_encode($result);

  }else{
		$data=3;

    print json_encode($data);
  }
  
  

?>
