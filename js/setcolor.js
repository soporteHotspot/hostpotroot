$(document).ready(function () { 
  applycolor(); 
  
 
           });
     


       $(document).on('click', '.tema', function(e){
        e.preventDefault();     
    
 
    
      
   
    var aside=$(this).attr('data-color'); 
 var navcolor=$(this).attr('data-class'); 
  $.ajax({
                url: "model/registrar/agregarcolor.php",
                method: "POST",
                dataType: "html",
                data: {"id": navcolor,"aside": aside},
                success: function (data) { 

                if(data==1){

                  
                      
                                  Swal.fire({
  confirmButtonText:'Aceptar',
  confirmButtonColor: '#d33',
  icon: 'success',
  title: 'Excelente',
  text: "Tema aplicado",
  timer: 1000
 
});
 applycolor();
                               
          
                } 

                if (data==2){

                      Swal.fire({
  confirmButtonText:'Aceptar',
  confirmButtonColor: '#d33',
  icon: 'error',
  title: 'Oops...',
  text: "Error inesperado de sistema",
  timer: 1500
 
});
                }



                     
                    
                }
            });


 
});


 



    var applycolor = function () {  
 
   
            $.ajax({
                url: "model/consulta/color.php",
                method: "POST",
                dataType: "json",                
                success: function (data) { 
                    if (data.coloraside!="") {

                        if (data.coloraside=="bg-black text-light")

                         {$("a").removeClass("text-dark");
                     $("a").addClass("text-light");}

                     else if (data.coloraside=="bg-white text-dark")

                         {   $("a").removeClass("text-light");

                            $("a").addClass("text-dark");}

                            else if (data.coloraside=="bg-warning text-dark")

                         {   $("a").removeClass("text-light");

                            $("a").addClass("text-dark");}


                             else if (data.coloraside=="bg-lime text-dark")

                         {   $("a").removeClass("text-light");

                            $("a").addClass("text-dark");}

                    else {
                      $("a").removeClass("text-dark");
                      $("a").addClass("text-light");


                    }
  
 $("thead").removeAttr("class"); 
                     
                     $("thead").addClass(data.colorpanel);
                    $("#asidenav").removeAttr("class"); 
                    $("#barnavbar").removeAttr("class");  
                    $("#asidenav").addClass("main-sidebar sidebar-dark-primary elevation-4 "+data.coloraside);

                    $("#barnavbar").addClass("main-header navbar navbar-expand "+data.colorpanel);

                    }




                   
                }
            });
         
       
    }
