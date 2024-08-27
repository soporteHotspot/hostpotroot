
 $(document).on('click','#backup', function(){
  Swal.fire({
 showConfirmButton: false,
  icon: 'info',
  title: '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i>',
  text:'Verificando...',
   });
      $.ajax({
                url: "model/mails/createbackup.php",
                method: "POST",
                dataType: "json",                
                success: function (data) {

                    if(data.confirm==1){
                   Swal.fire({
            showConfirmButton: false,
  icon: 'success',
  title: 'Excelente',
  text:'Respaldo generado',

  timer:1000,
   });
      $('#filerespaldo').val(data.file)

       $('#namefile').html("Respaldo generado <hr> "+data.filename)
             leerficheros();          
               }

                 
       else {
                   Swal.fire({
            showConfirmButton: false,
  icon: 'error',
  title: 'Error!',
  text:data,
   });
                 
               }

                }
            });
   
                    

                       
                       
               
             
   
});  

 $(document).on('click','#senbporemail', function(){

file=$('#filerespaldo').val();

if(file=="")

{

   Swal.fire({
 
  icon: 'error',
  title: 'Error!',
  text:'Por favor genere un respaldo',
  timer:1500
   });
}
else{ 
  Swal.fire({
 showConfirmButton: false,
  icon: 'info',
  title: '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i>',
  text:'Enviando respaldo espere...',
   });
      $.ajax({
                url: "model/mails/sendbackup.php",
                method: "POST",
                dataType: "json",

                 data: {file: file},                              
                success: function (data) {

                    if(data==1){
                   Swal.fire({
            showConfirmButton: false,
  icon: 'success',
  title: 'Excelente',
  text:'Respaldo enviado',

  timer:1000,
   });
      $('#filerespaldo').val("")

       $('#namefile').html("Genere respaldo para enviar")
                       
               }


                 else if(data==2){
                   Swal.fire({
            showConfirmButton: false,
  icon: 'error',
  title: 'Error!',
  text:'Error al enviar respaldo',

  timer:1000,
   });
     
                       
               }
       else {
                   Swal.fire({
            showConfirmButton: false,
  icon: 'error',
  title: 'Error!',
  text:data,
   });
                 
               }

                }
            });
   
                    
}
                       
                       
               
             
   
}); 
