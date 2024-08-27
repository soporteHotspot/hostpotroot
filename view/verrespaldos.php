<!-- Default box -->
 
    
                     <!-- Default box -->
      <div id="controuters" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Sistema</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">


            <?php

 

$dir = '../backup';

 
 if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
 



if (is_dir($dir)) {
    
   
echo "<table id='dataTable' border='1'  '  class='table table-sm table-bordered table-striped' cellspacing='0'>
            <thead>
                <tr>
                 
                    <th class='text-left'>Nombre</th> 
                           <th>Ultima modificación</th>     
                          <th>Tamaño</th>  
                              <th>Restaurar</th>            
                     <th>Eliminar</th>
                      
                      
                </tr>
            </thead> <tbody>";
foreach(scandir($dir) as $item){
    
    $extension  =pathinfo($item, PATHINFO_EXTENSION );
    if (!($item == '.')) {
        if (!($item == '..')) {
            if (is_dir($dir."/".$item)){
               echo '<div class="form-group col-md-4 text-left">';
              echo '<button   type="button" class="form-control"><i class="abrir fas fa-folder text-warning"></i> '.$item.'</button>' ;
              echo '</div>';
                    
            }
            
         if($extension =="gz" AND $item!="factory.gz")
         {   echo '
             
                      
                         
                         <tr>
                             
                             <td><i target="_blank" class="btn   "  role="button"><i class="fa fa-database" aria-hidden="true"></i>  '.$item.'</i>
         
                             
         
                             </td>
                               
                             <th>'.date("d F Y H:i:s.", filectime($dir."/".$item)).'</th>

             
                             <th style="text-align:center;">' . filesize($dir."/".$item) . ' bytes'.'</th>
                              <td style="text-align:center;" ><button   value="'.$item.'"  class="seeitem btn   btn-primary" data-toggle="modal" data-target="#Modalrecoverysql" ><i class="fa fa-upload"></i> </button></td>

                             <td style="text-align:center;"><button   value="'.$item.'"  class="deleteitem btn   text-danger" data-toggle="modal" data-target="#Modaldeleteitem" ><i class="fa fa-trash"></i> </button></td>

                            

                         </tr>
                        
                     ';
                     }

                     else  if($item=="factory.gz")
         {   echo '
             
                      
                         
                         <tr>
                             
                             <td><a target="_blank" class="btn  "  role="button"><i class="text-primary fa fa-database"></i>  '.$item.'</a>
         
                             
         
                             </td>
                               
                             <th>'.date("d F Y H:i:s.", filectime($dir."/".$item)).'</th>

             
                             <th style="text-align:center;">' . filesize($dir."/".$item) . ' bytes'.'</th>
                              <td style="text-align:center;" ><button   value="'.$item.'"  class="seeitem btn   btn-primary" data-toggle="modal" data-target="#Modalrecoverysql" ><i class="fa fa-upload"></i> </button></td>

                             <td style="text-align:center;"></td>

                            

                         </tr>
                        
                     ';
                     }
          
          
        

         
             
              
            }
              
              
              
}}}


echo "</tbody> </table>";
 
?>    </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
