
  <?php 
   require("../require/connect_db.php"); 
     
     
        $consulta=("SELECT DISTINCT vendedor FROM fichas");
    $datos=mysqli_query($mysqli,$consulta); 
  echo '<select required id="vendedores" name="vendedor" class="form-control" >';
  
  echo '<option value="">seleccione vendedor</option>';
 
             while($vendedores=mysqli_fetch_array($datos)){            
              $nombre=$vendedores['vendedor'];
              
              
              if (isset($nombre)){                
                echo '<option value="'.$nombre.'">'.$nombre.'</option>';
              }
              }
              
              echo '</select>';
             
             ?>


      