
<?php 
session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}

include_once('includes/header.php');
include_once('includes/navbar.php');
include_once('includes/asidebartpv.php');
include_once('includes/seccionlink.php');

?> 

    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

   
   <!-- seccion de botones-->
<section   class="content">
	   <!-- /start head -->
<div class="container-fluid bg-light p-1 border">
   <div class="row col-md-6 d-flex flex-row">
<button type="button" class="col-md-1 col-2 btn-primary p-2" data-toggle="modal" data-target="#Modallotescards">
   <i class="fas fa-user-plus   "></i>
</button>

  <button  type="button" class="col-md-1 col-2 btn-primary p-2" data-toggle="modal" data-target="#ModalH">
  <i class="fas fa-address-card    "></i>
</button>
  <button  type="button" class="col-md-1 col-2 btn-dark p-2" data-toggle="modal" data-target="#ModalF">
  <i class="fas fa-qrcode    "></i>
</button>

  <button  type="button" class="col-md-1 col-2 btn-danger p-2" data-toggle="modal" data-target="#Modalremovelotes">
  <i class="fas fa-trash    "></i>
</button>

<button id="updateusershp" type="button" class="col-md-1 col-2 btn-primary p-2"> <i class="fa fa-sync "></i></button>
 

<button onclick="mostrarPDF()"  type="button" class="col-md-1 col-2 btn-danger p-2"> <i class="fa fa-file-pdf "></i></button>
 <button  type="button" class="col-md-2 col-2 btn-success p-2" data-toggle="modal" data-target="#designcard">
   Personalizar
</button>
</div></div>
</section>
     <!-- /.end -->

  <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
include_once('includes/formulariosdelete.php');
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>
<script type="text/javascript" src="jsapp/generador.js"></script>
<script type="text/javascript" src="jsapp/misventas.js"></script>
<script type="text/javascript" src="jsapp/getqr.js"></script>
<script type="text/javascript" src="jsapp/getinfouserhp.js"></script>
 <script src="js/canvas2image.js"></script>
<script src="js/html2canvas.min.js"></script>
<script type="text/javascript" src="jsapp/downimg.js"></script>
 <script type="text/javascript" src="jsapp/customcard.js"></script>