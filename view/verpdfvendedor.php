<!-- Default box -->
 
    
      <div   class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Archivos en PDF</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">

            <?php

session_start();
$vendedor =$_SESSION['username'];

$dir = '../../voucher/'.$vendedor;
 
 function filesize_formatted($path) { $size = filesize($path); $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'); $power = $size > 0 ? floor(log($size, 1024)) : 0; return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power]; }

 
 
 if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
 



if (is_dir($dir)) {
    
   
echo "<table id='dataTablepdf' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr>
                 
                    <th class='text-left'>Nombre</th>  
                      <th>Tamaño</th> 
                       <th>Fecha</th>                
                   <th>Eliminar</th>
                       
                   
                      
                      
                </tr>
            </thead> <tbody>";
foreach(scandir($dir) as $item){
    
    $extension  =pathinfo($item, PATHINFO_EXTENSION );

    


    $tfile= date("F d Y H:i:s A", filectime($dir."/".$item));
    if (!($item == '.')) {
        if (!($item == '..')) {
            if (is_dir($dir."/".$item)){
               echo '<div class="form-group col-md-4 text-left">';
              echo '<button title="Click para abrir" id="'.$item.'" type="button" class="form-control"><i class="abrir fas fa-folder text-warning"></i> '.$item.'</button>' ;
              echo '</div>';
                    
            }
            
         
 

            else if($extension=="pdf")
            {
              $peso  =filesize_formatted($dir."/".$item);
               $fec= date ("F d Y H:i:s.", filemtime($dir."/".$item));
            echo '
    
             
                
                <tr>
                    
                    <td><a target="_blank" title="Abrir" class="btn  " href="verpdf?pdf='.$vendedor .'/'.$item.'" role="button"><i class="text-danger fa fa-file-pdf"></i>  '.$item.'</a>

                     

                    </td><td>'.$peso.'</td><td>'.$fec.'</td>
                      
                    
                   
         
                     


                            <td><button title="Eliminar" id="'.$vendedor .'" value="'.$item.'"  class="viewpdf btn btn-block text-danger" data-toggle="modal" data-target="#Modaldeletepdf" ><i class="fa fa-trash"></i> </button></td>
                </tr>
               
            ';
            
            }
        

            else {
                
                
               echo '
    
             
                
                <tr>
                    
                    <td><a target="_blank" class="btn  "  role="button"><i class="text-dark fa fa-file"></i>  '.$item.'</a>

                    

                    </td>
                      
                    
                    <td><button id="'.$carpeta.'" value="'.$item.'"  class="viewpdf btn btn-block text-danger" data-toggle="modal" data-target="#Modaldeletepdf" ><i class="fa fa-trash"></i> </button></td>
                </tr>
               
            ';
             
              
            }
              
              
              
}}}


echo "</tbody> </table>";
}
?>