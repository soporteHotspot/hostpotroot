<?php
require("../require/connect_db.php");

$id=$_POST['id'];
$sql = "DELETE  FROM fichas WHERE id=$id";
$res = $mysqli->query($sql);
if($res){
    echo '<div class="alert alert-success alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Correcto</strong>  Se ha eliminado el registro correctamente
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}else{
    echo '<div class="alert alert-warning alert-dismissible fade show mb-2 mt-2" role="alert">
  <strong>Error! </strong>  No se pudo eliminar el registro
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}
?>
 