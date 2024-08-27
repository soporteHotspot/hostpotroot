$(document).ready(function () {
        
       
       requestDatta();updatedashboard();
      
 
    });
var bg = ["bg-danger ","bg-purple ","bg-primary ","bg-cyan ","bg-black ","bg-secondary ","bg-success ", "bg-Fuchsia ","bg-indigo ","bg-maroon ","bg-olive " ,"bg-lime ","bg-teal","bg-pink "];
     
     $( ".tarjet, .iconos" ).each(function() {
 

  var rand = bg[Math.floor(Math.random() * bg.length)];

  $( this ).addClass( rand );
  $(".iconos").width(18).height(18);


});
   function requestDatta() {

     
    $.ajax({
      url: 'view/traficodash.php',
       type: "POST",
      datatype: "json",
         
      success: function(data) {

        if (data=="error"){

            detenerupdatedash();
        }
else
     {    var midata = JSON.parse(data);
             // console.log(data);
              
              var TX=parseInt(midata[0].data);
                     var RX=parseInt(midata[1].data);
                       var interface=midata[2].data;

 var rand = bg[Math.floor(Math.random() * bg.length)];
 $("#divsubida").html('<i class="fas iconos iconodescarga rounded-circle border p-2 fa-upload "></i>');
 $("#divdescarga").html('<i class="fas iconos iconodescarga rounded-circle border p-2 fa-download "></i>');
 
  $( ".iconodescarga, .iconosubida" ).addClass( rand );
 
   
     
               $("#subida").html(convert(TX));   
               $("#descarga").html(convert(RX)); 

               $("#textsubida").html('Subida '+ interface); 
               $("#textdescarga").html('Descarga '+interface);     
                 }
         
      },
            
    });
  } 





  function convert( bytes) {      
                                                  
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              }

function detenerupdatedash() {$( "#refresh" ).prop( "disabled", false ); $("#refresh").html('<i class="fa fa-sync   "></i> ');
        clearInterval(IntervDash);
     }

     function iniciarrefresh(){ $( "#refresh" ).prop( "disabled", true );
$("#refresh").html('<i class="fa fa-sync  fa-spin fa-fw"></i> ');
IntervDash= setInterval(function(){ requestDatta();updatedashboard(); },1000);

 

     }
    

   var updatedashboard= function () {   
     
            $.ajax({
                url: "view/dashboardpro.php",
                method: "POST",
                dataType: "json",                 
                success: function (data) {

                  if(data.mikrotik=="Error!"){detenerupdatedash();}

                 $('#loader').html("");
                      $('#userhp').html(data.usershp);
                      $('#connecthp').html(data.conectadoshp);
                      $('#connectppp').html(data.conectadoppp);
                      $('#npuertos').html(data.npuertos);
                      $('#namerb').html(data.mikrotik);
                      $('#modelrb').html(data.modelorb);
                      $('#verionrb').html(data.versionrb);
                      $('#arquirb').html(data.arquirb);
                      $('#manurb').html(data.manurb);
                      $('#tiempoenlinea').html(data.inline);

 if(data.cpurb<=30){

                       $("#cpuuso").css("background-color","#063FCD");
                      $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");   
                     }

                       else if(data.cpurb<=70){

                       $("#cpuuso").css("background-color","#01A039");
                      $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");   
                     }
                     else if(data.cpurb<=90){

                       $("#cpuuso").css("background-color","#CAC10B");
                      $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");   
                     } else 
                     { $("#cpuuso").css("background-color","#AF021F");
                                            $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");    } 
                             



                       if(data.memoriatotal<=30){

                       $("#ramtotal").css("background-color","#063FCD");
                      $("#ramtotal").css("width", data.memoriatotal+ "%").text(data.memoriatotal+ "%");   
                     }

                       else if(data.memoriatotal<=70){

                       $("#ramtotal").css("background-color","#01A039");
                      $("#ramtotal").css("width", data.memoriatotal + "%").text(data.memoriatotal+ "%");   
                     }
                     else if(data.memoriatotal<=90){

                       $("#ramtotal").css("background-color","#CAC10B");
                      $("#ramtotal").css("width", data.memoriatotal + "%").text(data.memoriatotal+ "%");   
                     } else 
                     { $("#ramtotal").css("background-color","#AF021F");
                     $("#ramtotal").css("width", data.memoriatotal + "%").text(data.memoriatotal+ "%");    } 
                       

                    

                       $('#totalRAM').html(data.totalRAM);
                      $('#totalHDD').html(data.totalHDD);


                  if(data.hddtotal<=30){

                       $("#hddtotal").css("background-color","#063FCD");
                      $("#hddtotal").css("width", data.hddtotal+ "%").text(data.hddtotal+ "%");   
                     }

                       else if(data.hddtotal<=70){

                       $("#hddtotal").css("background-color","#01A039");
                      $("#hddtotal").css("width", data.hddtotal + "%").text(data.hddtotal+ "%");   
                     }
                     else if(data.hddtotal<=90){

                       $("#hddtotal").css("background-color","#CAC10B");
                      $("#hddtotal").css("width", data.hddtotal+ "%").text(data.hddtotal+ "%");   
                     } else 
                     { $("#hddtotal").css("background-color","#AF021F");
                     $("#hddtotal").css("width", data.hddtotal + "%").text(data.hddtotal+ "%");    } 
            
                }
            });
     
       
    }


        var dashboardMiKroTik= function (e) { 
    
    $('#userhp').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#connecthp').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#connectppp').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#npuertos').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#namerb').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#modelrb').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#verionrb').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#arquirb').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#manurb').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#tiempoenlinea').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#cpuuso').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#paquetesinstalados').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#ramlibre').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#ramtotal').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#hddlibre').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
                      $('#hddtotal').html('<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>');
        
 //   $('#loader').html('<div class="alert  customestile mt-1 mb-2 border  bg-warning" role="alert"><strong ><i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Cargando dashboard</strong></div>'); 
            $.ajax({
                url: "view/dashboardpro.php",
                method: "POST",
                dataType: "json",

                success: function (data) {                  
          
           
                      $('#loader').html("");
                      $('#userhp').html(data.usershp);
                      $('#connecthp').html(data.conectadoshp);
                      $('#connectppp').html(data.conectadoppp);
                      $('#npuertos').html(data.npuertos);
                      $('#namerb').html(data.mikrotik);
                      $('#modelrb').html(data.modelorb);
                      $('#verionrb').html(data.versionrb);
                      $('#arquirb').html(data.arquirb);
                      $('#manurb').html(data.manurb);
                      $('#tiempoenlinea').html(data.inline);

                      $('#paquetesinstalados').html(data.paquetes);
                  
          if(data.cpurb<=30){

                       $("#cpuuso").css("background-color","#063FCD");
                      $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");   
                     }

                       else if(data.cpurb<=70){

                       $("#cpuuso").css("background-color","#01A039");
                      $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");   
                     }
                     else if(data.cpurb<=90){

                       $("#cpuuso").css("background-color","#CAC10B");
                      $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");   
                     } else 
                     { $("#cpuuso").css("background-color","#AF021F");
                                            $("#cpuuso").css("width", data.cpurb + "%").text(data.cpurb+ "%");    } 
                             



                       if(data.memoriatotal<=30){

                       $("#ramtotal").css("background-color","#063FCD");
                      $("#ramtotal").css("width", data.memoriatotal+ "%").text(data.memoriatotal+ "%");   
                     }

                       else if(data.memoriatotal<=70){

                       $("#ramtotal").css("background-color","#01A039");
                      $("#ramtotal").css("width", data.memoriatotal + "%").text(data.memoriatotal+ "%");   
                     }
                     else if(data.memoriatotal<=90){

                       $("#ramtotal").css("background-color","#CAC10B");
                      $("#ramtotal").css("width", data.memoriatotal + "%").text(data.memoriatotal+ "%");   
                     } else 
                     { $("#ramtotal").css("background-color","#AF021F");
                     $("#ramtotal").css("width", data.memoriatotal + "%").text(data.memoriatotal+ "%");    } 
                       

                    

                       $('#totalRAM').html(data.totalRAM);
                      $('#totalHDD').html(data.totalHDD);


                  if(data.hddtotal<=30){

                       $("#hddtotal").css("background-color","#063FCD");
                      $("#hddtotal").css("width", data.hddtotal+ "%").text(data.hddtotal+ "%");   
                     }

                       else if(data.hddtotal<=70){

                       $("#hddtotal").css("background-color","#01A039");
                      $("#hddtotal").css("width", data.hddtotal + "%").text(data.hddtotal+ "%");   
                     }
                     else if(data.hddtotal<=90){

                       $("#hddtotal").css("background-color","#CAC10B");
                      $("#hddtotal").css("width", data.hddtotal+ "%").text(data.hddtotal+ "%");   
                     } else 
                     { $("#hddtotal").css("background-color","#AF021F");
                     $("#hddtotal").css("width", data.hddtotal + "%").text(data.hddtotal+ "%");    } 


                      
                      
           
                }
            });
     
       
    }