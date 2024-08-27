



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

   <section   class="content">
<div class="container-fluid bg-light p-1   ">

<div class="row col-md-6 d-flex flex-row">
 

 <button id="refresh"  title="refrescar" onclick="iniciarrefresh();"  type="button" class="col-md-2 col-3 btn-success p-2 "> <i class="fa fa-sync   "></i></button>
 <button title="leer estadisticas"   onclick="detenerupdatedash();" type="button" class="col-md-2 col-3 btn-primary  p-2 "> <i class="fa fa-stop-circle "></i></button>
  
 
 

  </div>


  


 
 

 </div>

 
     <!-- /.end -->


<div class="loading show">
    <div class="spin"></div>
</div>


  <!-- secion de body main -->
  <section id="loader" class="content">
  
      
 
    </section>
    <!-- secion de contenido body -->
    <section id="contbody" class="content text-center">
      
 <div class="container-fluid bg-black  mt-2 rounded">
 
    
        <div class="row">



 





<div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
DHCP o estáticas
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-wifi "></i> 
              
      </div> 


 <strong id="userhp" class="info-box-number ">0</strong>
</div>
 
 
 
 
</div>
           

<div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Conectados hotspot 
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-wifi "></i> 
              
      </div> 


 <strong id="connecthp" class="info-box-number">0</strong>
</div>
 
 
 
 
</div>


<div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Conectados PPPoE 
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-wifi "></i> 
              
      </div> 


       <strong id="connectppp" class="info-box-number"> 0</strong>
</div>
 
 
 
 
</div>


<div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Puertos 
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-ethernet "></i> 
              
      </div> 

<strong id="npuertos" class="info-box-number"> ...</strong>
</div>
 
 
 
 
</div>



    <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center  ">
Mikrotik 
              
      </div> 
<div class="d-flex justify-content-center">

<i class="fas iconos rounded-circle border border-dark p-2 fa-star "></i> 
              
      </div> 
<strong id="namerb" class="info-box-number"> ...</strong>
</div>
 
 
 
 
</div>
     
        
       <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Modelo 
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-info-circle "></i> 
              
      </div> 
 <strong id="modelrb" class="info-box-number"> ...</strong>
</div>
 
 
 
 
</div>  


 
       <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Versión 
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-terminal "></i> 
              
      </div> 
 <strong id="verionrb" class="info-box-number">... </strong>
</div>
 
 
 
 
</div>  



<div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Arquitectura
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-industry "></i> 
              
      </div> 
 <strong id="arquirb" class="info-box-number">...</strong>
</div>
 
  
</div>  

<div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Actualización
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-download "></i> 
              
      </div> 
 <strong id="manurb" class="info-box-number">... </strong>
</div>
 
  
</div>  

    

    <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
En línea
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-clock "></i> 
              
      </div> 
 <strong id="tiempoenlinea" class="info-box-number">...  </strong>
</div>
 
  
</div>     
  


    <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
CPU
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-microchip "></i> 
              
      </div> 
 <div class="col-12   rounded  mt-2 ">
     <div style="height: 25px;"  class="progress border border-dark  ">
        <div  id="cpuuso" class="progress-bar  progress-bar-striped progress-bar-animated " style="min-width: 20px;"></div>
    </div>
    
</div> 
</div>
 
  
</div>  

        
      <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
Paquetes
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-box-open "></i> 
              
      </div> 
<strong id="paquetesinstalados" class="info-box-number"> 0</strong>
</div>
 
  
</div>  



 
   

     <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
RAM  <strong id="totalRAM" class="info-box-text ml-2"> 0</strong>
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-sim-card "></i> 
              
      </div> 
     <div class="col-12   rounded  mt-2 ">
     <div style="height: 25px;"  class="progress border border-dark  ">
        <div  id ="ramtotal" class="progress-bar   " style="min-width: 20px;"></div>
    </div>
    
</div>   
</div>
 
  
</div>       



      
 
     <div style="cursor:pointer;" title="hdd"  name=""  class="tarjet form-group rounded  col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div class="d-flex justify-content-center">
 HDD 
 <strong id="totalHDD" class="info-box-text ml-2"> 0</strong>
              
      </div> 
<div class="d-flex justify-content-center">
<i class="fas iconos rounded-circle border border-dark p-2 fa-hdd "></i> 
              
      </div> 
 <div class="col-12 mt-2 rounded">
         <div style="height: 25px;"  class="progress border border-dark  ">
        <div  id="hddtotal" class="progress-bar   " style="min-width: 20px;"></div>
    </div>
   
</div>    
</div>
 
  
</div>  
    
 


     <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div id="textsubida" class="d-flex justify-content-center">
Subida              
      </div> 
<div id="divsubida" class="d-flex justify-content-center">
<i class="fas iconos iconosubida rounded-circle border border-dark p-2 fa-upload "></i> 
              
      </div> 
<strong id="subida" class="info-box-number ">0</strong>
</div>
 
  
</div> 
          


   <div style="cursor:pointer;" title="informacion"  name=""  class="tarjet form-group rounded col-md-3 col-6  bg-success p-2 border border-dark text-center mb-0">
<div class="inner">
<div id="textdescarga" class="d-flex justify-content-center">
Descarga             
      </div> 
<div id="divdescarga" class="d-flex justify-content-center">
<i class="fas iconos iconodescarga rounded-circle border border-dark p-2 fa-download "></i>
              
      </div> 
  <strong id="descarga"  class="info-box-number ">0</strong>
</div>
 
  
</div> 
 


      
 
      
        </div>
        <!-- /.card-body -->
       
       
</div>


   
                                     

 <!-- termina seccion main-->
    </section>
   
  
  <!-- cierre de contenido body -->
  </div>
  <?php 

 
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>


<script type="text/javascript" src="jsapp/dashboardpro.js"></script>
