



<?php 

session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}
if ($_SESSION['tipo']=="vendedor") {
  header("Location:puntodeventa");
}


include_once('includes/header.php');
include_once('includes/navbar.php');
include_once('includes/asidebar.php');
include_once('includes/seccionlink.php');

?> 

   <!-- seccion de botones-->
   <section   class="content  ">
   	 <div class="form-row">
    <div class="form-group col-md-6">
   	<div class="btn-group" role="group" aria-label="Basic example">
  <button id="refresh" title="Ver grafica"    type="button"  name="grafica" class="btn btn-primary">   <i class="fas   fa-chart-line " aria-hidden="true"></i>  Ver tráfico  </button>
   <button  title="dener"  onclick="detener();" type="button" class="btn btn-danger "> <i class="fas fa-stop-circle "></i> Detener</button>
 




</div>
 
 
</div>


<div class="form-group col-md-6">
       
    


  <div class="input-group ">
  
 
  
<?php if (isset($_POST["interface"])) { $interface = $_POST["interface"];echo '<div class="input-group-prepend">
  <span     class="input-group-text   ">Interface</span>
  </div><input name="interface"  id="interface"   required type="text" class="form-control" placeholder="interfaz" value="'.$interface.'" >';}  else { require_once 'require/routerboardtrafico.phar';
  if ($API->connect($ip,$Usuario,$password)) {
  
   $Getinterfaz = $API->comm("/interface/print", array(
           
            "?type" =>"ether",          
              
            ));

    

$TotalReg2 = count($Getinterfaz);
$INTERFAZ = $Getinterfaz['0'];  

echo '<div class="input-group-prepend">
  <span     class="input-group-text   ">Interface</span>
  </div><select required id="interface" name="interface" class="form-control" >';

for ($i = 0; $i < $TotalReg2; $i++) {
  $INTERFAZ = $Getinterfaz[$i];
  
  $nameinterfaz=$INTERFAZ['name'];
  
  echo '<option value="'.$nameinterfaz.'">'.$nameinterfaz.'</option>';
        
   
     
}
echo "</select>";
 
}

else print '<div class="alert alert-danger" role="alert">
  No se cargaron los datos, recargue la página!
</div>';




} ?>
 <button id="updateinterfaz" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>
</div></div>

</section>

 
     <!-- /.end -->

  <?php 
include_once('includes/main.php');
 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>


<script type="text/javascript" src="jsapp/trafico.js"></script>

<script type="text/javascript" src="js/highcharts.js"></script>
 
