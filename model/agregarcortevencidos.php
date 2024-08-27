	 
<?php

require("../require/connect_db.php");


       
        $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];

date_default_timezone_set($zone);
$hora=date("his");
$fecha=date("Y-m-d");
$vendedor= $_POST['vendedor'];
$responsable= $_POST['responsable'];
$cantidad= $_POST['total'];
$Rb= $_POST['mikrotik'];
$por= $_POST['porcentaje'];
$Co= $_POST['comision'];
$Res= $_POST['diferencia'];
 

$data= mysqli_query($mysqli,"INSERT INTO `cortes` (`hora`, `fecha`, `cantidad`, `responsable`, `vendedor`, `porcentaje`, `comision`, `restante`, `estado`, `nota`) VALUES ('$hora', '$fecha', '$cantidad', '$responsable', '$vendedor', '$por', '$Co', '$Res', 'pagado','')");

if($data){

 require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {
 

     $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
            ".proplist" => ".id,comment,name",
            "?disabled" => "yes",
            
            ));

$TotalReg = count($obtenerusers);





            if ($TotalReg<1){
                
                 echo '<div class="alert alert-warning alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Correcto</strong>  no se encontraron registros en mikrotik
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
            }
            
            else{

for ($i = 0; $i < $TotalReg; $i++) {
    


$users = $obtenerusers[$i];
$id = $users['.id'];
$username =$users['name'];
$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];

    require("../require/connect_db.php");   
    $checkname=mysqli_query($mysqli,"SELECT * FROM fichas WHERE user='$username'");
    $checkname=mysqli_num_rows($checkname); 
    if($checkname=1){
        mysqli_query($mysqli,"DELETE FROM fichas WHERE user='$username'");

    }



 
            if($vendedor==$comentario)
{
        $API->comm("/ip/hotspot/user/remove",
        array(
            ".id" => $id,
            )
        );  


}

 


        }
            echo '<div class="alert alert-success alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Correcto</strong>  Se ha terminado el proceso correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;

        }



}


else {
    
    echo '<div class="alert alert-warning alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Correcto</strong>  Error! la conexión fallo no se eliminaron los usuarios
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}

    	}

else {
echo '<div class="alert alert-warning alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Error!</strong>  No se ha agregado el registro correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;

}

	
?>
 
