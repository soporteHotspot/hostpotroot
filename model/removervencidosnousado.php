<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {
    
$com=$_POST['vendedor'];

     $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
            ".proplist" => ".id,comment",
            "?disabled" => "yes",
            
            ));

$TotalReg = count($obtenerusers);





            if ($TotalReg<1){
                
                  echo '<div class="alert alert-warning alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Correcto</strong>  No se encontraron registros en mikrotik
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
            }
            
            else{

for ($i = 0; $i < $TotalReg; $i++) {
  

$users = $obtenerusers[$i];
$id = $users['.id'];
$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];


 
            if($com==$comentario)
{
        $API->comm("/ip/hotspot/user/remove",
        array(
            ".id" => $id,
            )
        );  


}

else  if($com!=$comentario) {  

echo "";
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
 
 

 ?>