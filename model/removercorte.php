<?php
require("../require/connect_db.php");

$id=$_POST['datadelete'];

$sqla=("SELECT * FROM cortes WHERE id='$id'");
 $data=mysqli_query($mysqli,$sqla);  
$verdata=mysqli_fetch_array($data);
$archivo="../../corte/".$verdata['nota'];
if (file_exists($archivo)) {

unlink($archivo);

}
$sql = "DELETE  FROM cortes WHERE id='$id'";
$res = $mysqli->query($sql);



if($res){
    echo 1 ;
}else{
    echo '<div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
  <strong>Error! </strong>  No se pudo eliminar el registro
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}
?>
 