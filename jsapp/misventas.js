

$(document).ready(function () {
        
       Ventas();
        
 
    });


  
 
 
   

 
   
        var Ventas= function (e) { 
    
    
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning mt-2" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando fichas vendidas</strong></div>'); 
            $.ajax({
                url: "view/misventas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablerouter').DataTable({ responsive: true });       
                }
            });
     
       
    }



        var Estadisticas= function (e) { 
    
    
        
    $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning mt-2" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando estadísticas</strong></div>'); 
            $.ajax({
                url: "view/misestadisticas.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) {                  
          $('#contbody').html(data);            
            $('#loader').html("");                     
            $('#dataTablerouter').DataTable({ responsive: true });       
                }
            });
     
       
    }