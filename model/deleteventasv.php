<?php
require("../require/connect_db.php");

$vendedor=$_POST['vendedor'];
$sql = "DELETE  FROM fichas WHERE vendedor='$vendedor'";
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
 