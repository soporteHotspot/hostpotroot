
   <?php

				require("require/connect_db.php");			 
				$obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
				$data=mysqli_fetch_array($datax);					 					 
					 $id=$data['id'];
					  $sistema=$data['sistema'];
					  $logo=$data['logo'];
					   
					
					 ?>

  <!-- Main Sidebar Container -->
  <aside id="asidenav" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    	   <i class="fas  fa-user-circle text-light bg-dark"></i> 
      
      <span class="brand-text font-weight-light"> <?php if(isset($sistema)){ echo $sistema; } else { echo "SISTEMA PRO"; } ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image ">
        	<i  class="fas fa-user fa-2x "> </i> 
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul id="sidebarnav" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
		  
		   <li class=" rounded border"> 
            <a    href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

           

   <li class="nav-item has-treeview mt-1">
            <a href="#" class="nav-link border ">
              <i class="nav-icon fas fas fa-shopping-cart"></i>
              <p>
                Punto de VentaLLL
                <i class="fas fa-angle-left right"></i>
              <span id="nventas" class="badge badge-info right">0</span>
              </p>
            </a>
            <ul class="nav nav-treeview ">
			
			
			  
                <li class="border rounded  mt-1  mb-1">
            <a   href="tpvwisp" class="nav-link ">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
             Punto de ventaLL
                
              </p>
            </a>
          </li>
		  
		   <li class="border rounded  mt-1  mb-1">
            <a    href="ventas" class="nav-link ">
              <i class="nav-icon fa fa-cart-arrow-down"></i>
              <p>
               VentasLL
                
              </p>
            </a>
          </li>
             <li class="border rounded  mt-1  mb-1">
            <a    href="timeout" class="nav-link ">
              <i class="nav-icon fa fa-user-clock"></i>
              <p>
              Consumidos
                
              </p>
            </a>
          </li>
           


           <li class="border rounded  mt-1  mb-1">
            <a   href="corte" class="nav-link ">
              <i class="nav-icon fa fa-box"></i>
              <p>
             Cortes
                
              </p>
            </a>
          </li>
             
           
  

 </ul>
          </li>


		 
		  
		 
            
          </li>
         
          <li class="nav-item has-treeview mt-1 ">
            <a href="#" class="nav-link border">
              <i class="fa fa-wifi"></i>
              <p>
               Hotspot
                <i class="fas fa-angle-left right"></i>
                <span id="hp" class="badge badge-info right">0</span>
              </p>
            </a>
			
			
           
            <ul class="nav nav-treeview">
                <li class="border rounded  mt-1  mb-1">
            <a   href="usuarioshotspot" class="nav-link ">
              <i class="nav-icon fa fa-user-tie"></i>
              <p>
                Usuarios
                
              </p>
            </a>
          </li>
		  
 
		  
		  <li class="border rounded  mt-1  mb-1">
            <a   href="activoshotspot" class="nav-link ">
              <i class="nav-icon fa fa-user-friends"></i>
              <p>
               Activos 
              </p>
            </a>
          </li>
		   <li class="border rounded  mt-1  mb-1">
            <a   href="cookiehotspot" class="nav-link ">
              <i class="nav-icon fa fa-user"></i>
              <p>
               Cookies
              </p>
            </a>
          </li>

            <li class="border rounded  mt-1  mb-1">
            <a   href="host" class="nav-link ">
              <i class="nav-icon fa fa-circle"></i>
              <p>
               Hosts
              </p>
            </a>
          </li>

		  <li class="border rounded  mt-1  mb-1">
            <a   href="bindinghotspot" class="nav-link ">
              <i class="nav-icon fa fa-user"></i>
              <p>
               IP binding
              </p>
            </a>
          </li>

           

          


               <li class="border rounded  mt-1  mb-1">
            <a   href="perfileshotspot" class="nav-link ">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
              Perfiles
              </p>
            </a>
          </li>


           <li class="border rounded  mt-1  mb-1">
            <a   href="fichaspdf" class="nav-link ">
              <i class="nav-icon fa fa-file-pdf "></i>
              <p>
              Archivos PDF
              </p>
            </a>
          </li>
             
            </ul>
          </li>
         
              <li class="nav-item has-treeview mt-1">
            <a href="#" class="nav-link border ">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                PPP
                <i class="fas fa-angle-left right"></i>
               <span id="pppoe" class="badge badge-info right">0</span>
              </p>
            </a>
            <ul class="nav nav-treeview ">
			
			
			  
                <li class="border rounded  mt-1  mb-1">
            <a   href="secretspppoe" class="nav-link ">
              <i class="nav-icon fa fa-users"></i>
              <p>
               Secrets
                
              </p>
            </a>
          </li>
		  
		   <li class="border rounded  mt-1  mb-1">
            <a    href="activospppoe" class="nav-link ">
              <i class="nav-icon fa fa-user-friends"></i>
              <p>
               Activos
                
              </p>
            </a>
          </li>
               <li class="border rounded  mt-1  mb-1">
            <a   href="perfilespppoe" class="nav-link ">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
               Perfiles
                
              </p>
            </a>
          </li>
             
            </ul>
          </li>
         
		  <li class="nav-item has-treeview mt-1">
            <a href="#" class="nav-link border ">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview ">
		 

          <li class=" rounded border mb-1"> 
            <a   href="leases" class="nav-link">

              <i class="nav-icon fa fa-circle"></i>
              <p>
             Leases
                 
              </p>
            </a>
          </li>

     <li class=" rounded border mb-1"> 
            <a   href="schedule" class="nav-link">

              <i class="nav-icon fa fa-circle"></i>
              <p>
             Schedule
                 
              </p>
            </a>
          </li>



		     
		 
		     <li class=" rounded border mb-1"> 
            <a   href="interfaces" class="nav-link">
              <i class="nav-icon fa fa-ethernet"></i>
              <p>
               Interfaces
                 
              </p>
            </a>
          </li>

   <li class=" rounded border mb-1"> 
            <a   href="trafico" class="nav-link">
              <i class="nav-icon fa fa-chart-line"></i>
              <p>
               Tráfico
                 
              </p>
            </a>
          </li>
          

         <li class=" rounded border mb-1"> 
            <a   href="package" class="nav-link">
              <i class="nav-icon fa fa-box-open"></i>
              <p>
               Paquetes
                 
              </p>
            </a>
          </li>
		 
       

             </ul>
          </li>
         
         
		       <li class="nav-item has-treeview mt-1">
            <a href="#" class="nav-link border ">
              <i class="nav-icon fas fa-server"></i>
              <p>
                MikroTik
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview ">
       <li class="border rounded  mt-1  mb-1">
            <a    href="router" class="nav-link ">
              <i class="nav-icon fa fa-server"></i>
              <p>
              Mikrotik
                
              </p>
            </a>
          </li>
      
        <li class=" rounded border mb-1"> 
            <a   href="usuarios" class="nav-link ">
              <i class="nav-icon fa fa-user"></i>
              <p>
              Usuarios 
                 
              </p>
            </a>
          </li>
      


             
            </ul>

          </li>
         
            
      <li class="nav-item has-treeview mt-1">
            <a href="#" class="nav-link border ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
              Configuración
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview ">
      
      
        
    

            <li class="border rounded  mt-1  mb-1">
            <a   href="inputs" class="nav-link ">
              <i class="nav-icon fa fa-cart-plus"></i>
              <p>
              Botones PV
                
              </p>
            </a>
          </li>
    <li class="border rounded  mt-1  mb-1">
            <a   href="mayoreo" class="nav-link ">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
             Mayoristas
                
              </p>
            </a>
          </li>
            
             
            </ul>

          </li>
         
          





           
          <li class="nav-item has-treeview mt-1">
            <a href="#" class="nav-link border ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Sistema
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview ">
      
      
        
                <li class="border rounded  mt-1  mb-1">
            <a   href="sistema" class="nav-link ">
              <i class="nav-icon fa fa-industry"></i>
              <p>
               Empresa
                
              </p>
            </a>
          </li>


            <li class="border rounded  mt-1  mb-1">
            <a   href="sucursal" class="nav-link ">
              <i class="nav-icon fa fa-industry"></i>
              <p>
               Sucursales
                
              </p>
            </a>
          </li>
      <li class="border rounded  mt-1  mb-1">
            <a   href="email" class="nav-link ">
              <i class="nav-icon fa fa-industry"></i>
              <p>
               Email
                
              </p>
            </a>
          </li>

        
               <li class="border rounded  mt-1  mb-1">
            <a   id="about" class="nav-link ">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
               Información
                
              </p>
            </a>
          </li>


 




             
            </ul>

    <li class=" rounded border"> 
            <a    href="respaldo" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Respaldo
                
              </p>
            </a>
          </li>

          </li>
         
     
     
       
        
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>