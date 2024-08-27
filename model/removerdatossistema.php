<?php
require("../require/connect_db.php");

$consult=("SELECT * FROM sistema where  id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);				   
$logo=$p['logo'];

$target_dir ="../".$logo; 


 if (file_exists($target_dir)) {   
unlink($target_dir);
}
$sql = "DELETE  FROM sistema WHERE id='1'";
$res = $mysqli->query($sql);
if($res){
    echo '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
  <strong>Correcto</strong>  Se ha eliminado el registro correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}else{
    echo '<div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
  <strong>Error! </strong>  No se pudo eliminar el registro
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}
?>
 
