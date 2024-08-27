
  
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
      <div class="image text-warning">
            <i  class="fas fa-user fa-2x "> </i> 
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['tipo']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul id="sidebarnav" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
		   <li class=" rounded border mb-2">  
            <a    href="puntodeventa" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
               CREAR PINES
                
              </p>
            </a>
          </li>
 


   <li class=" rounded border mb-2"> 
            <a    href="misventas" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
              Ventas
                
              </p>
            </a>
          </li>
 
		 


   <li class=" rounded border mb-2"> 
            <a    href="entregados" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
        Entregados
                
              </p>
            </a>
          </li>
 
		     <li class=" rounded border mb-2"> 
            <a    href="consultactivoshotspot" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
        Consulta Activos
                
              </p>
            </a>
          </li>
		 
            
          </li>
      
          </li>
		  
 
 
         
             
            </ul>
          </li>
         
           
          </li>
         
		 
		 
          </li>

          
        
         
          
         
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>