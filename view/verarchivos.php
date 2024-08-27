<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Administración de carpetas</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">


            <?php



$dir = '../../voucher/';

  
 if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
 



if (is_dir($dir)) {
    
   
echo "<table id='dataTablearchivos' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                 
                    <th class='text-left'>Nombre</th>  
                                   
                     <th>Eliminar</th>
                      
                      
                </tr>
            </thead> <tbody>";
foreach(scandir($dir) as $item){
    
    $extension  =pathinfo($item, PATHINFO_EXTENSION );
    if (!($item == '.')) {
        if (!($item == '..')) {
            if (is_dir($dir."/".$item)){

   echo '
    
             
                
                <tr>
                    
                    <td>
                    <button value="'.$item.'" title="Click para abrir" id="'.$item.'" type="button" class="abrir form-control"><i class="abrir fas fa-folder text-warning"></i> '.$item.'</button>

                    

                    </td>
                      
                    
                    <td><button value="'.$item.'"  class="viewcarpeta btn btn-block text-danger" data-toggle="modal" data-target="#Modaldeletecarpeta" ><i class="fa fa-trash"></i> </button></td>
                </tr>
               
            ';


 
                    
            }
            
           
        

            else {
                
                
            
    echo '        
                
                <tr>
                    
                    <td>
                    <button   type="button" class="abrir form-control"><i class="abrir fas fa-file text-dark"></i> '.$item.'</button>

                    

                    </td>
                      
                    <td> </td>
                </tr>
               
            ';
             
              
            }
              
              
              
}}}

echo "</tbody> </table>";
}
?>