
	function requestDatta() {

		var interface=$('#interface').val();
		$.ajax({
			url: 'view/trafico.php',
			 type: "POST",
			datatype: "json",
			  data: {'interface':interface},
			success: function(data) {
  if (data==3){
Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});
detener();
return false;
  }else
			{   var midata = JSON.parse(data);
              // console.log(data);
               
                var TX=parseInt(midata[0].data);
                var RX=parseInt(midata[1].data);
                  var interface=midata[2].data;
                    var ip=midata[3].data;
                var x = (new Date()).getTime(); 
                shift=chart.series[0].data.length > 19;
                chart.series[0].addPoint([x, TX], true, shift);
                chart.series[1].addPoint([x, RX], true, shift);}
					chart.setTitle({text: "<strong>Tráfico Interface:</strong> "+ interface+'<br><strong> IP: </strong>'+ip});

$("#refresh").html('<i class="fa fa-sync  fa-spin fa-fw"></i> Ver tráfico ');
				 
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown); 
			}       
		});
	}	


  function detener() {$( "#refresh" ).prop( "disabled", false ); $("#refresh").html('<i class="fas   fa-chart-line " aria-hidden="true"></i>  Ver tráfico ');
        clearInterval(graficarrr);
     }


	 $(document).on('click','#refresh',function(){
			Highcharts.setOptions({
				global: {
					useUTC: false
				},
         
			});
	

           chart = new Highcharts.Chart({

			   chart: {   
          backgroundColor: {
            linearGradient: [0, 0, 500, 500],
            stops: [
                [0, 'rgb(255, 246, 238 ,0.5 )'],
                [1, 'rgb(255, 246, 238,1 )']
            ]
        },

         
        borderWidth: 2,

         
          
        
        plotBackgroundColor: 'rgba(0, 0, 0, 1)',
        plotShadow: true,
         

				renderTo: 'contbody',
				animation: Highcharts.svg,

				type: 'areaspline',
				events: {
					load: function () {
						graficarrr=setInterval(function () {
							requestDatta();


						}, 1000);
					}				
			}
		 },


		 title: {
backgroundColor: 'white',
			text: 'Tráfico ',
			color: '#18B303',

		 },
       
		 xAxis: { 
			type: 'datetime',
				tickPixelInterval: 60,
				maxZoom: 20 * 1000,
        color:"red",
         

		 },
		 
		yAxis: {
                            minPadding: 0.7,
                            maxPadding: 0.7,


                            title: { 
                              text: ' ',
                            },
                            labels: {
                              formatter: function () {      
                                var bytes = this.value;                          
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              },
                            },       
                        },
            series: [{
                name: 'TX-Transmisión',
                data: [],
                color: 'rgba(222, 19, 19 ,1)'

            }, {
                name: 'RX- Recepción',
                data: [],
                color: 'rgba(255, 243, 7 ,1)'
            }],
   
             plotOptions: {
        
        areaspline: {
            fillOpacity: 0.3,
        },
    },
			  tooltip: {
        headerFormat: '<b style="font-size: 15px">{series.name} </b> <br/>',
        pointFormat: '<b >Fecha: {point.x:%d/%m/%Y}</b> <br/>  Hora {point.x:%H:%M:%S}<br/> Bps: <b style="color: blue" >{point.y}</b >',
        color: '#00FF00',
        backgroundColor: 'white',
        borderWidth: 2,


    },


	  });
  });
  function convert( bytes) {      
                                                  
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];                    
                              }



$('#updateinterfaz').click(function(event) {
    event.preventDefault();   
   $.ajax({ 
                url: "view/obtenerinterfaces.php",
                method: "POST",
                dataType: "html",                 
                success: function (data) { 
                if(data=="") { 

                Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! al obtener interfaces </strong>',  
  
  
});}

                else if (data==3){
Swal.fire({ confirmButtonText:
    'Aceptar',
    showConfirmButton:true,
  title: '<strong>Error!</strong>',
  icon: 'error',
  html:   '<strong>Error! de conexión </strong>',  
  
  
});

  }
else { $('#interface').replaceWith(data);}
                }
            });
});


