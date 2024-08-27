<!DOCTYPE html>
<html>


<?php if (!is_file("require/connect_db.php")) {
   header("Location:index");
   // fopen($fileconect, 'w');
   return false;  
}

else{
  require("require/connect_db.php");   
  
$checkreg=mysqli_query($mysqli,"SELECT * FROM sistema" );
  $check_reg=mysqli_num_rows($checkreg);  
 
      if($check_reg==0){
header("Location:index");
       }


        else {

$checkregs=mysqli_query($mysqli,"SELECT * FROM sucursal" );
  $check_regs=mysqli_num_rows($checkregs);  
 
      if($check_regs==0){
header("Location:index");
       }



}
}



 ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$_SERVER['HTTP_HOST'];?><?=$_SERVER['REQUEST_URI'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link 
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="logo/favicon.jpg"
    />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome611/css/all.css">
 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="css/adminlte.css">
   <link rel="stylesheet" href="css/body.css">
  <!-- Google Font: Source Sans Pro -->

  
  
   <!-- DataTables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
</head>
    

<body>

<!-- Page Content -->
<div class="row h-100">
	
	
    <div class="container  mt-5    p-2 ">

                   
                            
              

<section id="tabs">

 <!--start div 2-->
		  <div class="form-row">
    <div class="form-group col-md-4">
<div class="container">
	
 
		    
		 
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link bg-danger active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user"> </i> Login</a>

						<a class="nav-item bg-danger nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-save"> </i> Guardados</a>

					 </div>
				</nav>
				<div  class="  tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div style="height: 280px;" class="  tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					 <form id="login" >
                         <div class="input-group mb-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-circle"> </i></div>
        </div>
        <input id="iplogin" required maxlength="30" type="text"  class="form-control input-sm chat-input " value="" name="address" placeholder="ip"/>
      </div>
					
                              <div class="input-group mb-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user"> </i></div>
        </div>
        <input required type="text"  class="form-control input-sm chat-input " value="" name="username" placeholder="Usuario"/>
      </div>
					
                
                

                <div class="input-group   mb-1">
 <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"> </i></div>
        </div>
  <input id="intpassword1" type="password"  class="form-control" value="" name="password" placeholder="Contraseña"/>
   <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"><input    id='toggle'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>

                            <div class="input-group mb-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-cog"> </i></div>
        </div>
        <input type="number"  class="form-control input-sm chat-input " value="" name="puerto" placeholder="Puerto api default 8728"/>
      </div>       










                   <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-save"> </i></div>
        </div>
        <SELECT title="Guardar?" name="guardar" class="form-control">
            <OPTION value="Si">Si</OPTION>
          <OPTION value="No">No</OPTION>
        
          
 


        </SELECT>
      </div>       
<?php
                require("require/connect_db.php");  
  
$checkregs=mysqli_query($mysqli,"SELECT * FROM sucursal" );
  $check_regs=mysqli_num_rows($checkregs);  
 
      if($check_regs>=1){


require("require/connect_db.php");
       
                          print ' <div class="input-group mb-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-industry"> </i></div>
        </div>';
echo "<select  id='sucursal' name='sucursal' class='form-control '>";
echo '<option  value="" > Sin sucursal</option>';
  while($verdata=mysqli_fetch_array($checkregs)){  
            $idsuc=$verdata['id'];                  
               
               $names=$verdata['nombre'];
            


echo '<option  value="'.$idsuc.'" > '.$names.' </option>';
        
  
    
  }
     
     
 
echo "</select></div>";            

}
else {
print ' <div class="input-group mb-1">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa fa-industry"> </i></div>
        </div>';
echo "<select  id='sucursal' name='sucursal' class='form-control '>";
echo '<option  value="" > Sin sucursal</option>';
  echo "</select></div>";  
}
 

?>




                 
                <section id="errorconect" class="content">
 
      
 
    </section>
                <div class="wrapper">
                        <span class="group-btn">
                             <input id="btnentrar"  class="btn btn-primary float-right p-2" type="submit" value="Conectar">
                        </span>
                </div>
				
				
				 
</form>
					
					</div>
					<div style="height: 280px;" class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						 
						 <form id="logintwo" >
						
       
     
						 
						 <?php
               	require("require/connect_db.php");	
	
	
	 //reseteo de ids
$sql11 = "SELECT COUNT(*) total FROM routerboard";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

if($idss>=1){ 
require("require/connect_db.php");
			 
				$obtenerda=("SELECT * FROM routerboard");
                 $data=mysqli_query($mysqli,$obtenerda); 

                 print ' <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user"> </i></div>
        </div>';
echo "<select required id='usuariomikro' name='usuario' class='form-control '>";
echo '<option  value="" > Seleccione usuario </option>';
  while($verdata=mysqli_fetch_array($data)){	
            $idr=$verdata['id'];                  
					     $ip=$verdata['ip'];
					     $namex=$verdata['nombre'];
					     $username=$verdata['usuario'];					  
					     $password=$verdata['password'];
						 $dnsname=$verdata['dns'];


echo '<option  value="'.$idr.'" > '.$namex.' </option>';
        
	
    
  }
		 
		 
 
echo "</select></div>";						 

}
else {
	
	
	echo '<div class="alert alert-danger" role="alert">
  Sin router registrados!
</div>';
}
 

?>
 
<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user-circle"> </i></div>
        </div>
  <input type="hidden" id='idsucursal' class="form-control input-sm chat-input mb-2" value=""   name="sucursal" placeholder="sucursal"/>
<input type="hidden" id='nombreuser' class="form-control input-sm chat-input mb-2" value=""   name="nombreuser" placeholder="puerto api"/>
 <input type="hidden" id='IPMikroTik' class="form-control input-sm chat-input mb-2" value=""   name="address" placeholder="puerto api"/>
 <input required type="text" id="username" class="form-control input-sm chat-input " value="" readonly name="username" placeholder="Usuario"/>

</div>
     <div class="input-group   mb-1">
  <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock"> </i></div>
        </div>
  <input type="password" required id="password" class="form-control input-sm chat-input  " value=""  name="password" placeholder="Contraseña"/>
   <div class="input-group-prepend">
    <span class="input-group-text"  ><input    id='toggle2'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>
                
                


                <input type="hidden" id="puerto" class="form-control input-sm chat-input mb-2" value=""   name="puerto" placeholder="puerto api"/>
                 <section id="errorconect2" class="content">
 
      
 
    </section>
                <div class="wrapper">
                        <span class="group-btn">
                             <input id="btnentrar2"  class="btn btn-primary float-right p-2" type="submit" value="Conectar">
                        </span>
                </div>
				 
</form>


					</div>
					 
				</div>
			
		 
	</div>
    </div>
    <div class="form-group   d-flex justify-content-center align-items-center col-md-8">


 
 
 <div class="row">

 
   
 

             
             <?php
                require("require/connect_db.php");  
  
  
$checkreg=mysqli_query($mysqli,"SELECT * FROM sistema" );
	$check_reg=mysqli_num_rows($checkreg);	
 
			if($check_reg>=1){
  
   $verdata=mysqli_fetch_array($checkreg);
        $sistema=$verdata['sistema'];
        $logo=$verdata['logo'];


if (file_exists($logo)) {

	print '<div class=" col-12 mb-4">
    	<div class="text-center">
  <img src="'.$logo.'" class="rounded logo" alt="...">
</div></div>';
     
}



print '<div class=" col-12">

<div class="neon">
   
 <div class="text" > '.$sistema.'</div>
 
  <span class="gradient"></span>
  <span class="spotlight"></span>
</div>


      </div>';  
}

else {
  
  print '<div class=" col-12">

<div class="neon">
   
 <div class="text" > HOTSPOT-CONTROL</div>
 
  <span class="gradient"></span>
  <span class="spotlight"></span>
</div>


      </div>';
}
 

?>
    </div>
  </div></div>


	
</section>


</div>

        <!--start box-->
	 
		
    </div>
	

 
    <!--footer-->
   
    <!--//footer-->

     
              
   <?php 

include_once('includes/script.php');
 

?>
               
            </div>
       
		
		
  
 <script type="text/javascript" src="../jsapp/login.js"></script>
       
        
    </body>
</html>
