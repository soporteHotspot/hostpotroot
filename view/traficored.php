<!-- Default box -->
      <div id="contperfil" class="card mt-1 ">
        <div class="card-header bg-success">
          <h3 class="card-title ">Trafico</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body  ">
		  <div class="form-row">
    <div class="form-group col-md-3">
 
    </div>
  </div>
		
		 
	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

echo "<table id='dataTablei' border='1' style='width:100%;'  class='table border-success table-sm     table-striped' cellspacing='0'>
            <thead>
                <tr><th>ID</th>
                    <th>Nombre</th>
          <th>Tipo</th>
          <th>Nombre Default</th>
            
                  <th>Comentario</th>   
            
            <th>Editar</th>   
           <th>Eliminar</th>  
           
          
                   
                </tr>
            </thead> <tbody>";


if ($API->connect($ip,$Usuario,$password)) {


  
   $Obtenerinterfaces = $API->comm("/interface/monitor-traffic/print");


  
    $TotalReg = count($Obtenerinterfaces);

$Perfiles = $Obtenerinterfacz['0'];  

 
}

else {
  
  echo 3;
}
?>

	    </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->