<!-- Navbar -->
  <nav id="barnavbar" class="main-header navbar navbar-expand bg-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       
    </ul>

    <ul class="navbar-nav ml-auto">
  
     
    
    
    <div class="btn-group ">
      <li class="nav-item">
        <a title="full-screen"  class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
  <button  onclick="detenerupdatedash();" id="dropdown" class="btn bg-dark  border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i  class="fas fa-user-tie "> </i>
 <?php  if(isset($_SESSION['nombre'])) 
 {  echo $_SESSION['nombre'];
} 
else 
{ echo $_SESSION['username'];} ?> 
 
  </button>
 <div style="width: 100%;" class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
 
 <div class="alert alert-light text-center" role="alert">
  IP:  <?php echo $_SESSION['ip']; ?>    

  
</div>    

<div class="alert alert-light text-center" role="alert">



  
   <?php require("require/connect_db.php");

$consult=("SELECT * FROM sistema where  id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);          
$logo=$p['logo'];

if(file_exists($logo)){ echo '<img width="100" src="'.$logo.'">';}

else {echo "Sin logo";}
  ?>    


  
</div>  
        <button type="button" tabindex="0" class="btn btn-warning form-control p-2 m-1"  data-toggle="modal" data-target="#Modalbackup"><i  class="fas fa-download "> </i>   Respaldo</button>
          
    <button title="Cerrar sesión" id="closesession" type="button" class="btn form-control bg-danger mb-1"><i  class="fas fa-sign-in-alt "> </i> Cerrar sesión</button>      
          
          
          
    <!--<a   href="model/desconectar.php"  title="Salir del sistema" class="btn btn-block   bg-success "    ><i  class="fas fa-sign-in-alt "> </i> Cerrar sesión</a>-->
  </div>
</div> 
      
      
      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      
      
      
      
      
      
      
    </ul>
    </ul>


      
  
  <!-- Modal -->
 
  
  
<!-- forms-->
  
<!-- forms-->
  </nav>
  <!-- /.navbar -->




  <!-- Modal -->
<div class="modal fade" id="Modalbackup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">  Generar respaldo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <div id="namefile" class="alert bg-primary">

        Genere respaldo para enviar por email
       </div>



 

    

<input class="form-control" id="filerespaldo" type="hidden" readonly name="">

      </div>


      <div class="modal-footer">
              <div class="btn-group" >

                 <button id="senbporemail" type="button" class="btn btn-danger"> <i class="fas fa-envelope-square nav-icon"></i> Enviar por email</button>
                 <button id="backup" type="button" class="btn btn-primary"><i  class="fas fa-download"> </i> Generar backup</button>
       


        <button type="button" class="btn btn-danger" data-dismiss="modal"><i  class="fas fa-window-close"> </i> Cerrar</button>
      </div>  </div>
    </div>
  </div>
</div>
  
  
<!-- forms-->