<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
 <table id="datatable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Perfil</th>
          <th>Usuario</th>
          <th>Limite ultime</th>
          <th>Comentario</th>
          <th>Habilitar</th>
        </tr>
      </thead>
      <tbody id="data">
      </tbody>
    </table>


</body>
</html>
 
    
<?php



function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

error_reporting(0);
 ini_set('max_execution_time', '0');
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on







 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {

 
	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => "name,profile,limit-uptime,uptime,comment,disabled",
           
            ));
		
		$TotalReg = count($obtenerusers);


//$i = 1;

//while ( $i <= $TotalReg) {
		$response[]=array();

for ($i = 0; $i < $TotalReg; $i++) {  
	$users = $obtenerusers[$i];
	 
	
	 $response[] = $users; 
} 
echo json_encode($response); 
 

}

else {
 
	
	echo "error";
}

 ?>

 <script type="text/javascript">4     let url = 'view/usershp.php';
  
             fetch(url)
            .then( response => response.json() )
            .then( data => mostrarData(data) )
            .catch( error => console.log(error) )

            const mostrarData = (data) => {
              
            //console.log(data);
            let contenido = ""
            for (var i = 0; i < data.length; i++) {  

               contenido+=`<tr>
               <td>${data[i].profile}</td>
               <td>${data[i].name}</td>
               <td>${data[i].uptime}</td>
               <td>${data[i].comment}</td>
               <td>${data[i].disabled}</td>
               </tr>`
            }
            document.getElementById('data').innerHTML = contenido;
            $('#datatable').DataTable({ responsive: true }); 
           // console.log(contenido)
        }</script>