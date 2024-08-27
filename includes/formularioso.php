<!-- Modal delete -->
<div class="modal fade" id="Modaldeletedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="titledelete">   Eliminar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeletedata">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong id="preguntadeletedata">¿Está seguro de eliminar el siguiente dato?</strong>
  </div>
<div  id="seedata" class="alert text-center alert-danger" role="alert">
  
</div>
 
<input type="hidden" class="form-control"  id="datadelete"   name="datadelete">



<!-- error-->
  <div id="errordeletedata" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit" id="submitdeletedata"  class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete data-->



<!-- Modal y formulario para agregar cards usuarios-->

<div class="modal fade" id="Modaladusers" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
	   <form  id="Formgenerarusuarios"  >   
	 
      <div class="modal-header bg-success">

         <li class="fa fa-cog  fa-2x mr-4"></li>
        <h5 class="modal-title" id="exampleModalLongTitle">Configuración de tarjetas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-6">
	
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Server</span>
  </div>
  <input type="text" id="servers"  required name="servidor" class="form-control" value="all" placeholder="Nombre servidor"  >
     <button id="updateservers" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div>


	 <div  class="input-group mb-1">
  <div id="perfiles" class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Perfil</span>
  </div>
 
 <input type="text" id="btnprofile"  required name="perfil" class="form-control" placeholder="Nombre perfil"  > 
  
 <button id="updateperfil" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>
</div> 

<div class="input-group mb-1">
  <div class="input-group-prepend">
<span  style="width:100px; "  class="input-group-text text-white bg-success  ">Precio</span>
  </div>
  <input required name="comentario"   class="form-control" type="text"   value=""> 
</div>
 

    </div>
    <div class="form-group col-md-6">


<div class="input-group border border-success mb-2">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-success"  >Tiempo</span>
  </div>  
  <input name="tiemponumber"   min="0" required type="number" class="form-control" value="0"   >
   <select name="tiempoword"  required class="form-control"  >
      <option value="m">Minutos</option>
      <option value="h">Horas</option>
      <option value="d">Días</option>
      
    </select>
  
</div>

 
<div class="input-group mb-1">
  <div class="input-group-prepend">
<span  style="width:100px; "  class="input-group-text text-white bg-success  ">Descripción</span>
  </div>
  <input required name="descripcion"   class="form-control" type="text"   value=""> 
</div>




    </div>
  </div>
  
    
 <div id="erroraduser"  class="modal-body">
      
   </div>
     

      </div>
	  
	  
	  
	  
      <div class="modal-footer">
	  <button id="submitreg" type="submit" class="btn btn-success">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
	
	</form>
  </div>
</div>	


<!-- Fin Modal y formulario para connfigurar cards usuarios-->







<!-- Modal agregar opciones lote-->
<div class="modal fade" id="Modallotescards" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title"   >Generar usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddlotes" >
    <!-- contenido-->
      <div class="modal-body">
     

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Tiempo</span>
  </div>
  <select id="tiemposlotes"  required name="tiempo" class="form-control"> <option value="">Seleccione tiempo</option> </select>
  
     <button id="updatelotes" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Precio</span>
  </div>
  <input type="text" id="precioslotes" readonly required name="precio" class="form-control" value="" placeholder="precio"  >
      
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Tipo</span>
  </div>
  <select required name="caracteres" class="form-control">
    
   
    <option value="0987654321">1-9</option>
    <option value="ABCDEFGHIJKLMNOPQRSTUVWXWZ">A_Z</option>
    <option value="abcdefghijklmnopqrstuvwxyz">a-z</option>
    <option value="98765432abcdefghijkmnpqrstuvwxyz">9-0-a-z</option>
    <option value="9876ABCDEFGHJKLMNPQRSTUVWXWZ5432">9-0-A-Z</option>
  </select>
</div>

 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Longitud</span>
  </div>
   <select required name="longitud" class="form-control">
    
     <option value="8">8</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    

  </select>
</div>





<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Cantidad</span>
  </div>
  <input type="number"   required name="cantidad"  min="1"   class="form-control " value="1" placeholder="cantidad"   >
  
</div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <label style="width:100px; class="switch">
  <input  checked id="genrarpdf" type="checkbox">
  <span class="slider"></span>
</label>
  </div>
   
  
     <button  readonly type="button" class="btn form-control text-left"> <li class="fa text-danger fa-file-pdf"></li> Generar PDF </button>
</div>
 

<!-- error-->
  <div id="erroraddlotes" class="col-12 mt-2 mb-1">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitlotes" type="submit"    class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal agregar  opciones lote-->


<!-- Modal opcionestioimeout user-->
<div class="modal fade" id="Modaloption" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" ><i class="fa fa-comments"></i>   Comentarios  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <!-- contenido-->
      <div class="modal-body">



    <div class="alert">
  <strong>Comentarios</strong>
  </div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-info"  >Comentario</span>
  </div>
  <input type="text" id="comentlimituptime"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
     <button  onclick="obtenercomtimeout()" type="button" class="btn btn-info"> <i class="fa fa-sync"></i></button>
</div>
 
 

<!-- error-->
  <div id="errorremovecomlimitup" class="content">
 </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
        <button type="button" onclick="updateteuserslm()"   class="btn btn-primary"><i class="fa fa-money-bill-alt"></i> Consultar</button>
    <button type="button" onclick="deleteusers()"   class="btn btn-warning"><i class="fa fa-trash"></i> Eliminar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
        
      </div>
    
    </div>
  </div>
</div>

<!-- Fin Modal opciones timeout lotes user-->

<!-- Modal y formulario para agregar binding-->


<div class="modal fade" id="Modaladbinding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	   <form  id="Formagregarbinding"  >   
	 
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo usuario binding</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
	
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:140px; " class="input-group-text text-white bg-primary"  >MAC</span>
  </div>
  <input id="newmac" type="text"  maxlength="17" required name="macbinding" class="form-control" value="" placeholder="MAC" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:140px; " class="input-group-text text-white bg-primary"  >IP</span>
  </div>
  <input id="newip" type="text"  required  name="ipbinding" class="form-control" value="" placeholder="Ip" >
</div>



  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:140px; " class="input-group-text text-white bg-primary"  >Servidor</span>
  </div>
  <input id="serverbinding" type="text" required name="serverbinding" class="form-control" value="all" placeholder="Sever" >
   <button id="updateserverbinding"   class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:140px; "  class="input-group-text text-white bg-primary"  >Tipo</span>
  </div>
 <select   class="form-control"  name="tipobinding">
     <option value="bypassed">Bypassed</option>
	 <option value="blocked" >Bloquear</option>
    <option value="regular">Regular</option>
   
  
  </select>
</div>
    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span  style="width:140px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input type="text"  required name="comentariobinding" class="form-control" value="" placeholder="Comentario nombre cliente" >
   
</div>

<div class="input-group border border-success mb-2">
  <div class="input-group-prepend">
    <span style="width:140px; " class="input-group-text text-white bg-primary"  >Tiempo</span>
  </div>  
  <input name="tiempo1"   min="0" required type="number" class="form-control" value="0"   >
   <select name="tiempo2"  required class="form-control"  >
      <option value="m">Minutos</option>
      <option value="h">Horas</option>
      <option value="d">Días</option>
      
    </select>
  
</div>


<div class="input-group border border-success mb-2">
  <div class="input-group-prepend">
    <span style="width:140px; " class="input-group-text text-white bg-primary"  >Velocidad</span>
  </div>  
    <input type="text"  required name="velocidad" class="form-control" value="" placeholder="Velocidad tx/rx" >
  
</div>
    </div>
  </div>
  
    
 <div id="erroradbinding"  class="modal-body">
      
   </div>
     

      </div>
	  
	  
	  
	  
      <div class="modal-footer">
	  <button id="submitregbin" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
	
	</form>
  </div>
</div>	


<!-- Fin Modal y formulario para agregar binding-->






<!-- Modal y formulario para editar binding-->


<div class="modal fade" id="Modaleditbinding" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
	   <form  id="Formeditbinding"  >   
	 
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLongTitle">Edición usuario binding</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
	
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >MAC</span>
  </div>
  <input type="text" id="macbin"  maxlength="17" required name="macbinding" class="form-control" value="" placeholder="MAC" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >IP</span>
  </div>
  <input type="text" id="ipbin"  required name="ipbinding" class="form-control" value="" placeholder="Ip" >
</div>



  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Servidor</span>
  </div>
  <input id="serverbin" type="text" required name="serverbinding" class="form-control" value="" placeholder="Sever" >
   <button id="updateserb" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span id="tipobin" style="width:100px; " class="input-group-text text-white bg-primary"  >Tipo</span>
  </div>
 <select   class="form-control"  name="tipobinding">
     <option value="bypassed">Bypassed</option>
	 <option value="blocked" >Bloquear</option>
    <option value="regular">Regular</option>
   
  
  </select>
</div>
    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span  class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input type="text" id="comentariobin" required name="comentariobinding" class="form-control" value="" placeholder="Comentario" >
   
</div>
    </div>
  </div>
  
    
 <div id="erroreditbin"  class="modal-body">
      
   </div>
     

      </div>
	  
	  
	  
	  
      <div class="modal-footer">
	  <button id="submitregbin2" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
	
	</form>
  </div>
</div>	

<!-- Fin Modal y formulario para editar binding-->



<!-- Modal y formulario para editar datos cards-->


<div class="modal fade" id="Modaleditcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <form  id="Formeditcards"  >   
   
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Edición opciones tarjetas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
  <input type="hidden" id="idcard"    required name="id" class="form-control" value="" placeholder="idcard"  >
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-light"  >Servidor</span>
  </div>
  <input type="text" id="servidorcard"    required name="servidor" class="form-control" value="" placeholder="Server"  >
</div>





  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-light"  >Perfil</span>
  </div>
  <input id="perfilcard" type="text" required name="perfil" class="form-control" value="" placeholder="Perfil" >
   <button id="updatecardedit" type="button" class="btn btn-light"> <i class="fa fa-sync"></i></button>
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-light"  >Precio</span>
  </div>
  <input type="text" id="preciocard"  required name="precio" class="form-control" value="" placeholder="Precio"  >
</div>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span id="tipobin" style="width:130px; " class="input-group-text text-white bg-light"  >Tiempo</span>
  </div>
 <input type="text" id="tiempocard"  required name="tiempo" class="form-control" value="" placeholder="Tiempo"  >
</div>
    
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span  style="width:130px;" class="input-group-text text-white bg-light"  >Descripcion</span>
  </div>
  <input type="text" id="descripcioncard" required name="descripcion" class="form-control" value="" placeholder="Comentario" >
   
</div>
    </div>
  </div>
  
    
 <div id="erroreditcards"  class="modal-body">
      
   </div>
     

      </div>
    
    
    
    
      <div class="modal-footer">
    <button id="submiteditcard" type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  
  </form>
  </div>
</div>  

<!-- Fin Modal y formulario para editar datoscard-->


<!-- Modal y formulario para agregar bridge-->

<div class="modal fade" id="Modaladbridge" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
	   <form  id="Formagregarbridge"  >   
	 
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo bridge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
	
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Nombre</span>
  </div>
  <input type="text"  required name="nombre" class="form-control" value="Bridge" placeholder="Nombre" >
</div>






<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >ARP</span>
  </div>
 <select style="width:100px; "  class="form-control"  name="arp">
    <option value="enabled" >Enabled</option>
    <option value="disabled">Disabled</option>
    <option value="local-proxy-arp">Local-proxy-arp</option>
    <option value="proxy-arp">Proxy-arp</option>
	<option value="reply-only">Reply-only</option>
  </select>
</div>


  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input type="text"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
</div>

    
    

    </div>
  </div>
  
    
 <div id="erroradbridge"  class="modal-body">
      
   </div>
     

      </div>
	  
	  
	  
	  
      <div class="modal-footer">
	  <button id="submitregpbre" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
	
	</form>
  </div>
</div>	


<!-- Fin Modal y formulario para agregar bridge-->
<!-- Modal y formulario para agregar vlan-->

<div class="modal fade" id="Modaladvlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
     <form  id="Formagregarvlan"  >   
   
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva VLAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Nombre</span>
  </div>
  <input type="text"  required name="nombre" class="form-control" value="vlan1" placeholder="Nombre"  >
</div>



  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >MTU</span>
  </div>
  <input type="number"  required name="mtu" class="form-control" value="1500" placeholder="Nombre"  >
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >ARP</span>
  </div>
 <select style="width:100px; "  class="form-control"  name="arp">
    <option value="enabled" >Enabled</option>
    <option value="disabled">Disabled</option>
    <option value="local-proxy-arp">Local-proxy-arp</option>
    <option value="proxy-arp">Proxy-arp</option>
  <option value="reply-only">Reply-only</option>
  </select>
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >ID VLAN</span>
  </div>
  <input type="number"  required name="vlanid" class="form-control" value="1" placeholder="Id"  >
</div>

  
 <div  class="input-group mb-1">
  <div id="interfacesss" class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Interfaz</span>
  </div>
 
 <input type="text" id="btnintrfaces"  required  class="form-control" placeholder="interfaces" > 
  
 <button id="updateinterfaces" type="button" name="inter"  class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div> 






<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input type="text"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
</div>

    
    

    </div>
  </div>
  
    
 <div id="erroradvlan"  class="modal-body">
      
   </div>
     

      </div>
    
    
    
    
      <div class="modal-footer">
    <button id="submitregvlan" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  
  </form>
  </div>
</div>  


<!-- Fin Modal y formulario para agregar vlan-->

<!-- Modal y formulario para  editarrr interface-->

<div class="modal fade" id="Modaleditinterface" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  " role="document">
    <div class="modal-content">
	   <form  id="Formeditinterfaz" >   
	 
      <div class="modal-header bg-success">
        <h5 class="modal-title" >Editar nombres interfaces</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">


	
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Nombre default</span>
  </div>
  <input type="text"  readonly id="namedefault"  required name="namedefault" class="form-control" value="" placeholder="Nombre" >
</div>



<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Nombre actual</span>
  </div>
  <input type="text" readonly  id="nombreactual"  required name="nombreactual" class="form-control" value="" placeholder="Nombre actual" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Nuevo nombre</span>
  </div>
  <input type="text"   id="newname"  required name="newname" class="form-control" value="" placeholder="Nuevo nombre" >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Tipo</span>
  </div>
  <input type="text"  readonly id="tipo"  required name="tipo" class="form-control" value="" placeholder="Nuevo nombre" >
</div>

  
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>
  <input  id="comentariointerface" type="text"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
</div>

    
    

    </div>
  </div>
  
    
 <div id="erroreditinterface"  class="modal-body">
      
   </div>
     

      </div>
	  
	  
	  
	  
      <div class="modal-footer">
	  <button id="submiteditinterfaz" type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
	
	</form>
  </div>
</div>	


<!-- Fin Modal y formulario para editarrr interface-->


<!-- Modal y formulario para agregar secret-->

<div class="modal fade" id="Modaladdsecret" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered   " role="document">
    <div class="modal-content">
	   <form  id="Formagregarsecret"  >   
	 
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar secret usuarios PPPoE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-row">
    <div class="form-group col-md-12">
	
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Nombre</span>
  </div>
  <input type="text"  required name="nombre" class="form-control" value="" placeholder="Nombre "  >
</div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Password</span>
  </div>
  <input type="password" id="passwordeR" required name="password" class="form-control" value="" placeholder="Password"  >

    <div class="input-group-append"> <span class="input-group-text">
 
  <input    id='toggle'  type="checkbox"   onchange='togglePassword(this);'>
  
</span> </div>
</div>

	 <div  class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Perfil</span>
  </div>
 
 <input type="text" id="btnperfileppoe"  required name="perfil" class="form-control" placeholder="Nombre perfil" > 
 
 <button id="updateperfilpppoe" type="button" class="btn bg-lime"> <i class="fa fa-sync"></i></button>
</div> 


   <div  class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-lime"  >Comentario</span>
  </div>
 
 <input type="text"   required name="comentario" class="form-control" placeholder="Cometario"  > 
 

</div> 

    
    

    </div>
  </div>
  
    
 <div id="erroradsecret"  class="modal-body">
      
   </div>
     

      </div>
	  
	  
	  
	  
      <div class="modal-footer">
	  <button id="submitregppoe" type="submit" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
	
	</form>
  </div>
</div>	


<!-- Fin Modal y formulario para agregar secret-->






<!-- Modal y formulario para agregar Perfiles-->
<div class="modal fade" id="Modaladprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="FormaddProfile">
	  <!-- contenido-->
      <div class="modal-body">


 

  
   	


  


       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Nombre </span>
  </div>
<input name="nombrep" required type="text" class="form-control" placeholder="Nombre de perfil" value="" >
 
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Velocidad </span>
  </div>
<input name="velocidadp" required type="text" class="form-control" placeholder="Ej. 500K/1M" value="" >
 
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">No. usuarios</span>
  </div>
<select name="nusuariosp" required class="form-control"   >

 <option value="">Seleccione No. usuarios</option>
  
  <option  SELECTED value="1">1 Usuario </option>
        <option value="unlimited">Ilimitados</option>          
          <option value="2">2 Usuarios </option>
          <option value="3">3 Usuarios </option>
          <option value="4">4 Usuarios </option>
          <option value="5">5 Usuarios </option>
          <option value="6">6 Usuarios </option>
          <option value="7">7 Usuarios </option>
          <option value="9">8 Usuarios </option>
          <option value="9">9 Usuarios </option>
          <option value="10">10 Usuarios </option>

   </select>
</div>


    <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">MAC Cookie </span>
  </div>
<input  id="cookiep" class="form-control"   name="cookiep"  maxlength="13" placeholder="Ingrese  tiempo mac cookie " type="text" value="30d 00:00:00">  
</div>

    <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Tipo de perfil</span>
  </div>
<select   class="form-control "  name="tipop">  
          <option value="0">Tiempo corrido y autodeshabilitacion</option>  
         <option value="1">Tiempo corrido y autoeliminación</option>     
         <option  value="2">Tiempo pausado y autoeliminación</option>   
           <option  value="3">Tiempo pausado y autodeshabilitacion</option>
                  
                                                            
</select>
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <label style="width:130px; class="switch">
  <input    id="checkt" type="checkbox">
  <span class="slider"></span>
</label>
  </div>
   
  
     <button  readonly type="button" class="btn form-control text-left"> <li class="fa text-primary fa-paper-plane"></li> Notificación por telegram </button>
</div>



	  

	    




      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Token </span>
  </div>
<input id="token" name="token"  type="text" class="form-control" placeholder="Token bot" >
 
</div>



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Id chat </span>
  </div>
<input id="idchat" name="idchat"  type="text" class="form-control" placeholder="Id chat" value="" >
 
</div>











<!-- error-->
  <div id="erroradperfil" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"  id="submitprofile"  class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar pper-->


<!-- Modal y formulario para agregar Perfiles PPPoE-->
<div class="modal fade" id="ModaladprofilePPPoE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar perfil PPPoE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="FormaddProfilePPPoE">
	  <!-- contenido-->
      <div class="modal-body">
	  
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Nombre </span>
  </div>
<input name="nombre" required type="text" class="form-control" placeholder="Nombre de perfil" value="" >
 
</div>

      <div class="input-group mb-1">  
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Pool-local </span>
  </div>
 
<input id="poollocal" name="local" required type="text" class="form-control" placeholder="" value="" >
  <button id="updatepool1" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Pool-remoto</span>
  </div>
<input id="poolremoto" name="remoto" required type="text" class="form-control" placeholder="" value="" >
  <button id="updatepool2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Velocidad (rx/tx)</span>
  </div>
<input name="velocidad" required type="text" class="form-control" placeholder="Ej. 500K/1M" value="" >
 
</div>







 

<!-- error-->
  <div id="erroradperfilPPP" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"  id="submitadPPP"  class="btn btn-primary">Generar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar pper-->


<!-- Modal y formulario para edit datos sistema-->
<div class="modal fade" id="Modaleditdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar datos sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="Formeditsistema">
	  <!-- contenido-->
      <div class="modal-body">
	     <div style=" width:40%" id="preview2"></div>
     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Logo</span>
  </div>
  <input id="files2" class="form-control" type="file"  name="logo" accept="image/png, .jpeg, .jpg">

</div>	  
  


     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Empresa</span>
  </div>
<input id="nombree" name="nameempresa" required type="text" class="form-control" placeholder="Nombre empresa" value="" >

</div>	

  <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Modo</span>
  </div>
<select id="modo" name="modo" class="form-control">
  <option value="10">PIN (Usuario=Contraseña)</option>
    <option value="20">PIN (Solo usuario)</option>
     <option value="30">Usuario y contraseña</option>

</select>

</div>

     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Idusuario</span>
  </div>
<input id="idusere"  name="idusuario" required type="text" class="form-control" placeholder="Ej. Usuario" value="" >

</div>	



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Idcontraseña</span>
  </div>
<input id="idpasse" name="idpassword" required type="text" class="form-control" placeholder="Ej. Contraseña" value="" >

</div>	



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Texto</span>
  </div>
<input id="texte" name="texto" required type="text" class="form-control" placeholder="Texto" value="" >

</div>	


     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-light"  >Z. Horaria</span>
  </div>
<input id="zonahoraria" name="zonahoraria" required type="text" class="form-control" placeholder="zona horaria" value="" >

</div>

  

    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:180px; " class="input-group-text text-white bg-light"  >Simbolo de moneda</span>
  </div>
<input id="moneda" name="moneda" required type="text" class="form-control" placeholder="moneda" value="$" >

</div>




<!-- error-->
  <div id="erroreditsistema" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"   class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar sistema-->


<!-- Modal y formulario para agregar datos sistema-->
<div class="modal fade" id="Modaladdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-cyan">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar datos sistema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="Formadsistema">
	  <!-- contenido-->
      <div class="modal-body">
	     <div style=" width:40%" id="preview"></div>
     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Logo</span>
  </div>
  <input id="files" class="form-control" type="file"  required name="logo" accept="image/png, .jpeg, .jpg">

</div>	  
  


     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Empresa</span>
  </div>
<input name="nameempresa" required type="text" class="form-control" placeholder="Nombre empresa" value="" >

</div>	

   <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Modo</span>
  </div>
<select name="modo" class="form-control">
  <option value="10">PIN (Usuario=Contraseña)</option>
    <option value="20">PIN (Solo usuario)</option>
     <option value="30">Usuario y contraseña</option>

</select>

</div>

     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Idusuario</span>
  </div>
<input name="idusuario" required type="text" class="form-control" placeholder="Ej. Usuario" value="" >

</div>	



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Idcontraseña</span>
  </div>
<input name="idpassword" required type="text" class="form-control" placeholder="Ej. Contraseña" value="" >

</div>	



     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Texto</span>
  </div>
<input name="texto" required type="text" class="form-control" placeholder="Texto" value=""  >

</div>	

     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-cyan"  >Z. Horaria</span>
  </div>
<input name="zonahoraria" required type="text" class="form-control" placeholder="zona horaria" value="America/Mexico_City" >

</div>

 


    <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:180px; " class="input-group-text text-white bg-cyan"  >Simbolo de moneda</span>
  </div>
<input name="moneda" required type="text" class="form-control" placeholder="moneda" value="$" >

</div>


<!-- error-->
  <div id="erroradsistema" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"   class="btn bg-blue">Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar sistema-->


<!-- Modal y formulario para agregar   router-->
<div class="modal fade" id="Modaladrouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar nuevo router</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="Foradrouters">
	  <!-- contenido-->
      <div class="modal-body">
	  
     <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Dir. IP</span>
  </div>
  <input name="dirip" required type="text" class="form-control" placeholder="ej. 192.168.50.1" value=""   >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Nombre</span>
  </div>
  <input name="userm" required type="text" class="form-control" placeholder="Nombre completo del usuario" value=""  >
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Usuario</span>
  </div>
  <input name="nombre" required type="text" class="form-control" placeholder="Nombre de usuario para mikrotik" value="" >
</div>


<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Contraseña</span>
  </div>
  <input name="password"   type="text" class="form-control" placeholder="contraseña no es forzoso" value="" >
</div>


 
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-primary"  >Puerto</span>
  </div>
  <input name="puerto" required type="text" class="form-control" placeholder="Puerto api" value=""   >
</div>

 


<!-- error-->
  <div id="erroradrouter" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"  id="submitrouter"  class="btn btn-primary">Registrar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar routers-->

<!-- Modal edit   router-->
<div class="modal fade" id="ModaleditRouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar router</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="FormEditR">
	  <!-- contenido-->
      <div class="modal-body">
	 
   
<input type="hidden" class="form-control" id="ideR"   name="id">
 

 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">IP</span>
  </div>
<input type="text" class="form-control" id="ipeR"   name="ip">
</div>


 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">Nombre</span>
  </div>
<input type="text" class="form-control" id="nombreeR"   name="nombre">
</div>


 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text" id="basic-addon1">Usuario</span>
  </div>
<input type="text" class="form-control" id="usuarioeR"   name="usuario">
</div>

 <div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px;"  class="input-group-text"  >Contraseña</span>
  </div>
<input type="password" class="form-control" id="passwordeditR"   name="password">
<div class="input-group-prepend">
    <span class="input-group-text"  ><input    id='toggler'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>
 





<!-- error-->
  <div id="erroreditrouter" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
	    <!-- end contenido-->
      <div class="modal-footer">
	  <button type="submit"  id="submisaver"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal edit routers-->





<!-- Fin Modal export fichas-->
<div class="modal fade" id="ModalF" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	
	<form id="formqrmodelos" action="voucher/fichasmpdfqr" method="post" target="_blanck">
      <div class="modal-header bg-dark">
	  
	  <li class="fa fa-qrcode text-dark fa-2x mr-4"></li>
        <h5 class="modal-title" id="exampleModalLongTitle">   Exportar vouchers QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="form-row">
    <div class="form-group col-md-6">
	 <div class="form-check m-2">
  <input onchange="modelosqr()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio1" >
  <label class="form-check-label" for="flexRadio1">
    <li class="fa fa-file-pdf text-danger  mr-2"></li> Usuario por hoja
  </label>
</div>

 <div class="form-check m-2">
  <input onchange="modelosqr()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio3" >
  <label class="form-check-label" for="flexRadio3">
    <li class="fa fa-file-pdf text-danger  mr-2"></li> Ticket QR
  </label>
</div>
	</div>
	 <div class="form-group col-md-6">
	<div class="form-check m-2">
  <input onchange="modelosqr()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadio2" >
  <label class="form-check-label" for="flexRadio2">
    <li class="fa fa-file-pdf text-danger   mr-2"></li> 3 columnas
  </label>
</div>
	</div>
	</div>
       

  
   
 
	  

	  
	       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-dark">Exportar por </span>
  </div>
<select id="opcion" name="opcion" required class="form-control"   >

 

            <option value="comment">Comentario </option>
          <option value="profile">Perfil </option>
          
		   <option value="limit-uptime">Tiempo </option>
         

   </select>
   
   
  
</div>


 <div  id="perfiles2" class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-dark">Parámetro </span>
  </div>
  
 
<input id="parametro" required type="text" class="form-control"    name="parametro">
 <button id="updateperfil2" type="button" class="btn btn-dark"> <i class="fa fa-sync"></i></button>

</div>
 
		
		
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal export fichas-->





<!-- Fin Modal export tickets-->
<div class="modal fade" id="ModalT" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
	
	<form action="voucher/tickets" method="post" target="_blanck">
      <div class="modal-header bg-light">
	  
	  <li class="fa fa-address-card text-success fa-2x mr-4"></li>
        <h5 class="modal-title" id="exampleModalLongTitle">   Exportar tickets</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Exportar por </span>
  </div>
<select name="opcion" required class="form-control"   >

 <option value="">Seleccione opcion</option>

            
          <option value="profile">Perfil </option>
          <option value="comment">Comentario </option>
		   <option value="limit-uptime">Tiempo </option>
         

   </select>
</div>


	       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-primary">Parámetro </span>
  </div>
<input required type="text" class="form-control"    name="parametro">
</div>
 
		
		
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Fin Modal export tickets-->



<!--  Modal export tarjetas-->
<div class="modal fade" id="ModalH" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  
  <form id="Formmodelos" action="voucher/tarjetas.php" method="post" target="_blanck">
      <div class="modal-header bg-light">
    
    <li class="fa fa-address-card text-success fa-2x mr-4"></li>
        <h5 class="modal-title" >   Exportar tarjetas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
	
   <div class="form-row">
    <div class="form-group col-md-6">
      <div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    <li class="fa fa-address-card text-warning  mr-2"></li>  Tarjetas 1
  </label>
</div>
 
<div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2">
    <li class="fa fa-address-card text-danger  mr-2"></li>  Tarjetas 2
  </label>
</div>




 <div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" >
  <label class="form-check-label" for="flexRadioDefault3">
    <li class="fa fa-address-card text-secunday  mr-2"></li>  Tarjetas 3
  </label>
</div>
    </div>
    <div class="form-group col-md-6">
      	 <div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" >
  <label class="form-check-label" for="flexRadioDefault4">
    <li class="fa fa-file-pdf text-danger  mr-2"></li> PDF 1
  </label>
</div>

		 <div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5" >
  <label class="form-check-label" for="flexRadioDefault5">
    <li class="fa fa-file-pdf text-danger  mr-2"></li> PDF 2
  </label>
</div>

     <div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6" >
  <label class="form-check-label" for="flexRadioDefault6">
    <li class="fa fa-file-pdf text-danger  mr-2"></li> Tarjetas PDF
  </label>
</div>


    </div>
  </div>
  
 
 


	


	
         <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-success">Exportar por </span>
  </div>
<select id="opciontarjet" name="opcion" required class="form-control"   >

 
 <option value="comment">Comentario </option>
            
          <option value="profile">Perfil </option>
         
       <option value="limit-uptime">Tiempo </option>
         

   </select>
   
   
  
</div>


         <div   class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:130px; "  class="input-group-text  text-white bg-success">Parámetro </span>
  </div>
  
 
<input id="parametrotarjet" required type="text" class="form-control"  value=''  name="parametro">
 <button id="updateperfilT" type="button" class="btn btn-success"> <i class="fa fa-sync"></i></button>

</div>
 
    
    
      </div>
      <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal export tarjetas-->






<!-- Modal habilitar   -->
<div class="modal fade" id="Modaldisabled" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
   
        <h5 class="modal-title"  >Cambio de estado </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdces" class="Cambiarestatus" >
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong id="ask">¿Está seguro de cambiar el estado ?</strong>
  </div>
<input id="estadocambiar" required type="hidden" class="form-control"  value=''  name="estado">
<input id="dataacambiar" required readonly   class="form-control form-control-lg  text-danger  bg-white text-center border border-light "  value=''  name="data">
 

  <div class="alert bg-light text-center">

Estado actual:
  <strong id="estadoactualdata"></strong>

   
  </div>


<!-- error-->
  <div id="errorcambioestado" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitestadoshp" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal habilitar     -->




<!-- Modal habilitar  userM -->
<div class="modal fade" id="Modaldisabled2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
   
        <h5 class="modal-title"  >Cambio de estado </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdces2" class="Cambiarestatus" >
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong id="ask2">¿Está seguro de cambiar el estado ?</strong>
  </div>
<input id="estadocambiar2" required type="hidden" class="form-control"  value=''  name="estado">
<input id="dataacambiar2" required readonly   class="form-control form-control-lg  text-danger  bg-white text-center border border-light "  value=''  name="data">
 

  <div class="alert bg-light text-center">

Estado actual:
  <strong id="estadoactualdata2"></strong>

   
  </div>


<!-- error-->
  <div id="errorcambioestado2" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitestadoshp2" type="submit"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal habilitar    userm -->



<!-- Button trigger modal -->
 
<!-- Modal  ad bnt     -->
<div class="modal fade" id="Modaladboton" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
    <li class="fa fa-cog text-light fa-2x mr-4"></li>
        <h5 class="modal-title" id="exampleModalLongTitle">Configurar botones </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddbtn"  >
    <!-- contenido-->
      <div class="modal-body">
    

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Nombre</span>
        </div>
        <input type="text"  class="form-control" name="nombre"   placeholder="Nombre eje. Ficha 1 Hora" required>
      </div>



       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Servidor</span>
        </div>
        <input type="text" id="servidorbtnedit" class="form-control" name="servidor"  placeholder="Servidor" required>
         <button id="loadserverbtn" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Perfil</span>
        </div>
        <input type="text" id="perfilbtnedit" class="form-control" name="perfil"  placeholder="Perfil" required>
         <button id="loadperfilesbtn" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Tiempo</span>
        </div>      
<input name="tiemponumber"   min="0" required type="number" class="form-control"   >
   <select name="tiempoword"  required class="form-control"  >
      <option value="m">Minutos</option>
      <option value="h">Horas</option>
      <option value="d">Días</option>
      
    </select>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Precio</span>
        </div>
        <input type="number"  class="form-control"  name="precio" placeholder="Eje. 5" required>
      </div>



 

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;"   class="bg-primary input-group-text" >Longitud</span>
        </div>
        <input type="text"   class="form-control" name="longitud"  placeholder="longitud de los usuarios" value="8" required>
      </div>


 
 

  


<!-- error-->
  <div id="erroradbtn" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitbtnventas" type="submit"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin ad bnt    -->

<!-- Modal  edit bnt     -->
<div class="modal fade" id="Modaleditboton" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title" id="exampleModalLongTitle">Editar botones </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditbtn"  >
    <!-- contenido-->
      <div class="modal-body">
    
<input type="hidden" id="idbntedit" class="form-control" name="idbtn"   >
 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Nombre</span>
        </div>
        <input type="text" id="nombrebtnedit" class="form-control" name="nombre"   placeholder="Nombre eje. Ficha 1 Hora" required>
      </div>



       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Servidor</span>
        </div>
        <input   type="text" id="servidorbtnedit2" class="form-control" name="Servidorhp"  placeholder="Servidor" required>
         <button id="loadserverbtn2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Perfil</span>
        </div>
        <input   type="text" id="perfilbtnedit2" class="form-control" name="perfil"  placeholder="Perfil" required>
         <button id="loadperfbtn2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Tiempo</span>
        </div>
        <input type="text" id="tiempobtnedit" class="form-control" name="tiempo" value="0d 00:00:00"  placeholder="eje. 0d 00:00:00" required>
      </div>



 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;" class="bg-primary input-group-text" >Precio</span>
        </div>
        <input type="number" id="preciobtnedit" class="form-control"  name="precio" placeholder="Eje. 5" required>
      </div>



 

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 100px;"   class="bg-primary input-group-text" >Longitud</span>
        </div>
        <input type="text" id="longitudbtnedit" class="form-control" name="longitud"  placeholder="longitud de los usuarios" value="8" required>
      </div>


 
 

  


<!-- error-->
  <div id="erroreditbtn" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submiteditbtn" type="submit"    class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin modal editar bnt    -->

<!-- Modal  ad  cortes     -->
<div class="modal fade" id="Modaladcorte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title"  >Agregar corte </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddcorte"  >
    <!-- contenido-->
      <div class="modal-body">
    

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Fecha </span>
        </div>
        <input type="text"  readonly  class="form-control" value="<?php require("require/connect_db.php");


       
        $obtenerda=("SELECT * FROM system");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];

date_default_timezone_set($zone); $fecha=date("d/m/Y"); echo $fecha; ?>" name="fecha" required>
      </div>




 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Mikrotik </span>
        </div>
  <?php 
   require("require/connect_db.php"); 
     
     
        $consulta=("SELECT DISTINCT mikrotik FROM fichas");
    $datos=mysqli_query($mysqli,$consulta); 
  echo '<select required  name="mikrotik" class="form-control" ';
  
  echo '<option value=""  >Seleccione mikrotik </option>';
 
             while($m=mysqli_fetch_array($datos)){            
              $nombre=$m['mikrotik'];
              
              
              if (isset($nombre)){                
                echo '<option>'.$nombre.'</option>';
              }
              }
              
              echo '</select>';
             
             ?>


      </div>







 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Vendedor </span>
        </div>
  <?php 
   require("require/connect_db.php"); 
     
     
        $consulta=("SELECT DISTINCT vendedor FROM fichas");
    $datos=mysqli_query($mysqli,$consulta); 
  echo '<select id="vendedorperro" name="vendedor" class="form-control" >';
  
  echo '<option value="">seleccione vendedor</option>';
 
             while($vendedores=mysqli_fetch_array($datos)){            
              $nombre=$vendedores['vendedor'];
              
              
              if (isset($nombre)){                
                echo '<option value="'.$nombre.'">'.$nombre.'</option>';
              }
              }
              
              echo '</select>';
             
             ?>


      </div>


 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Responsable</span>
        </div>
        <input type="text"  readonly id="usernamecut" class="form-control" value="<?php echo $_SESSION['username']; ?>" name="responsable" required>
      </div>





 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Total</span>
        </div>
        <input type="text" id="netoventas" class="form-control"  name="total" required>
      </div>


       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Porcentaje</span>
        </div>
        <input type="text" id="porcentaje" class="form-control"  name="porcentaje" required>
      </div>

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Comision vendedor</span>
        </div>
        <input type="text" id="comision" class="form-control"  name="comision" required>
      </div>
 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Diferencia</span>
        </div>
        <input type="text" id="diferencia" class="form-control"  name="diferencia" required>
      </div>


 



 
 

  


<!-- error-->
  <div id="erroradcorte" class="content mt-2">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitaddcorte" type="submit"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin ad cortes   -->



<!-- Modal  ad  cortes   vencidos  -->
<div class="modal fade" id="Modaladcortevencidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
   
        <h5 class="modal-title"  >Agregar corte vencidos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddcortevencidos"  >
    <!-- contenido-->
      <div class="modal-body">
    

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Fecha </span>
        </div>
        <input type="text"  readonly  class="form-control" value="<?php require("require/connect_db.php");


       
        $obtenerda=("SELECT * FROM system");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];

date_default_timezone_set($zone); $fecha=date("d/m/Y"); echo $fecha; ?>" name="fecha" required>
      </div>




 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Mikrotik </span>
        </div>
 <?php 
  if(isset($_SESSION['ip']))
{
    echo '<input type="text"  class="form-control" value="'.$_SESSION['ip'].'" name="mikrotik" required>';
            } 
             ?>


      </div>







 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Vendedor </span>
        </div>
  <input type="text" id="vendedoresperros2"  required name="vendedor" class="form-control" value="" placeholder="vendedor" >
     <button  onclick="obtenercomtimeoutvencidos()" type="button" class="btn btn-info"> <i class="fa fa-sync"></i></button>

      </div>


 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Responsable</span>
        </div>
        <input type="text"  readonly  class="form-control" value="<?php echo $_SESSION['username']; ?>" name="responsable" required>
      </div>





 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Total</span>
        </div>
        <input type="text" id="netoventasvencidos" class="form-control"  name="total" required>
      </div>


       <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Porcentaje</span>
        </div>
        <input  type="text" id="porcentaje2" class="form-control"  name="porcentaje" required>
      </div>

 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Comision vendedor</span>
        </div>
        <input type="text" id="comision2" class="form-control"  name="comision" required>
      </div>
 <div class="input-group">
        <div class="input-group-prepend">
          <span  style="width: 160px;" class="bg-primary input-group-text" >Diferencia</span>
        </div>
        <input type="text" id="diferencia2" class="form-control"  name="diferencia" required>
      </div>


 



 
 

  


<!-- error-->
  <div id="erroradcortevencidos" class="content mt-2">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitaddcortevencidos" type="submit"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin ad cortes vencidos  -->

<!-- Modal -->
<div style="z-index: 1000000;" class="modal fade" id="Modalpreviewuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div  class="modal-content">
      <div class="modal-header">
        <h5 id="titlesell" class="modal-title" id="exampleModalLabel">Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="voucher/usuario" method="post"  target="_blank">
      <div id="divimg" class="modal-body text-center border">
<input type="hidden"   id="usernamegenrated" name="usuario"> 

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width: 50px;" class="input-group-text"  ><i class="fa fa-user-check"  aria-hidden="true"></i> </span>
  </div>
    <strong class="form-control" id="userx"> usuario</strong>
 
</div>


<div id="divpass"></div>

 

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span  style="width: 50px;" class="input-group-text" ><i class="fa fa-money-bill"  aria-hidden="true"></i> </span>
  </div>
    <strong class="form-control" id="preciox">Precio</strong>
 
</div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width: 50px;" class="input-group-text"><i class="fa fa-clock"  aria-hidden="true"></i> </span>
  </div>
    <strong class="form-control" id="tiempox"> Tiempo</strong>
 
</div>
     
      
    
        <div class="container" id="qrx"></div>
      </div>
      <div class="modal-footer">
        <button id="btnSaveimg" type="button" class="form-control bg-primary printeruser mb-2" >Descargar imagen <i class="fas fa-image "></i></button>
        <button type="submit" class="btn bg-primary printeruser" >Imprimir <i class="fas fa-print "></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>

         
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal see username-->
<div style="z-index: 10000;" class="modal fade" id="Modalusergenerado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">

     
      <div class="modal-header bg-primary">
     <i class="fa fa-user" aria-hidden="true"></i>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
    <!-- contenido-->
     <form action="voucher/usuario" method="post" target="_blank">
      <div id="nombrecreado" class="modal-body">
     

 


 
<!-- errior-->

      </div>
       
      <!-- end contenido-->
      <div class="modal-footer bg-primary">
   
        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>



        <button type="submit" class="btn btn-light border"  > <li class="fa fa-print" > </li> </button>
        
      </div>
    </form>

    <button type="button"  id="btnSave2" class="btn btn-success border"  >Descargar imagen  <li class="fa fa-image" > </li> </button>
 
    </div>
  </div>
</div>

<!-- Fin Modal mostraruser-->








<!-- Modal y formulario para agregar user mikrotik-->
<div class="modal fade" id="Modaladusermikrotik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar vendedores o administradores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddusuariorb">
    <!-- contenido-->
      <div class="modal-body">


            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Nombre </span>
  </div>
<input name="nombre" required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
 
</div>

          <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Contraseña </span>
  </div>
<input name="password" required type="text" class="form-control" placeholder="Contraseña de usuario" value="" >
 
</div>
   
 



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Grupo</span>
  </div>
<input id="gruporb" name="grupodelusuario" required type="text" class="form-control" placeholder="" value="" >
  <button id="updategrupo" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-primary">Comentario</span>
  </div>
<select class="form-control" name="comentario">
  
  <option value="vendedor">Vendedor</option>
   <option value="administrador">Administrador</option>
</select>
</div>







 

<!-- error-->
  <div id="erroraddusermikrotik" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitaduu"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar ser mikrotikr-->










<!-- Modal y formulario para editar userhotspot mikrotik-->
<div class="modal fade" id="Modaledituserhp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuarios hotspot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditusuarioshotspot">
    <!-- contenido-->
      <div class="modal-body">

<input name="nombre1" id="useredithp0"  required type="hidden" class="form-control" placeholder="Nombre de usuario" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-user"> </i> </span>
  </div>
<input name="nombre2" id="useredithp"  required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
  
</div>

  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text    "><i class="fa fa-lock"> </i> </span>
  </div>
<input name="password" id="pasedithp"  required type="password" class="form-control" placeholder="password" value="" >
 <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm"><input    id='toggleuh'  type="checkbox"   onchange='togglePassword(this);'></span>
  </div>
</div>
  
   
 



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-user-circle"> </i></span>
  </div>
<input id="perfilehp" name="perfil" required type="text" class="form-control" placeholder="perfil" value=""   >
 <button id="updateprofilehp" title="Obtener perfiles del mikrotik" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>

   <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fas fa-clock"> </i></span>
  </div>
<input id="tiempolimite"  name="tiempolimite"  type="text" class="form-control" placeholder="limit-uptime" value="" >
 
  
</div>
     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:40px; "  class="input-group-text   "><i class="fa fa-comments"> </i></span>
  </div>
<input id="comentuserhp" name="comentario"   type="text" class="form-control" placeholder="comentario" value="" >
 
  
</div>







 

<!-- error-->
  <div id="erroredituserhp" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitedithpot"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar serhospt mikrotikr-->


<!-- Modal y formulario para editar user mikrotik-->
<div class="modal fade" id="Modaledituserm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuarios mikrotik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditusuariosrb">
    <!-- contenido-->
      <div class="modal-body">

<input name="nombre1" id="nombreeditmikrotik21"  required type="hidden" class="form-control" placeholder="Nombre de usuario" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text    ">Nombre </span>
  </div>
<input name="nombre2" id="nombreeditmikrotik22"  required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
 
</div>

  
   
 



      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Grupo</span>
  </div>
<input id="grupousermikrotik" name="grupo" required type="text" class="form-control" placeholder="grupo" value=""   >
 <button id="updategrupo2" type="button" class="btn btn-primary"> <i class="fa fa-sync"></i></button>
</div>


     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Comentario</span>
  </div>
<input id="comentusermikrotik" name="comentario" required type="text" class="form-control" placeholder="comentario" value="" >
 
  
</div>







 

<!-- error-->
  <div id="erroreditusermikrotik" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submiteditum"  class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar ser mikrotikr-->






<!-- Modal y formulario para agregar grupo mikrotik-->
<div class="modal fade" id="Modaladdgroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar grupo usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formaddgroup">
    <!-- contenido-->
      <div class="modal-body">


            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">Nombre grupo</span>
  </div>
<input name="nombre" id="groupapim" required type="text" class="form-control" placeholder="Nombre de usuario" value="" >
 
</div>
<!-- error-->
  <div id="erroraddgroup" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitaddgroup"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para agregar group mikrotikr-->




<!-- Modal y formulario para acambiar puerto api mikrotik-->
<div class="modal fade" id="Modalchangeport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar puerto api</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formasetport">
    <!-- contenido-->
      <div class="modal-body">


            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">Puerto</span>
  </div>
<input name="puerto" id="portapi" required type="text" class="form-control" placeholder="N puerto" value="" >
 
</div>
<!-- error-->
  <div id="errorsetport" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submitsetport"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para cambiar puerto mikrotikr-->


 




<!-- Modal static mikrotik-->
<div class="modal fade" id="Modaladstatic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Fijar mac </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formasetstatic">
    <!-- contenido-->
      <div class="modal-body">

      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">MAC</span>
  </div>
<input name="mac" id="macfijo" required type="text" class="form-control" placeholder="MAC" value="" >
 
</div>
      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">IP</span>
  </div>
<input name="ip"  required type="text" class="form-control" placeholder="IP" value="" >
 
</div>
      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">Rx/Tx</span>
  </div>
<input name="rate"  required type="text" class="form-control" placeholder="velocidad" value="" >
 
</div>
      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">Comentario</span>
  </div>
<input name="comentario"   required type="text" class="form-control" placeholder="comentario" value="" >
 
</div>
            
 


<!-- error-->
  <div id="errormacstatic" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submitstatic"  id="submitsetport"  class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal static mikrotikr-->





<!-- Modal remove host mikrotik-->
<div class="modal fade" id="Modalremovehost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle">Remover host de lease</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formadeletehost">
    <!-- contenido-->
      <div class="modal-body">

      <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text  text-white bg-light">MAC</span>
  </div>
<input name="mac" id="machost" required type="text" class="form-control" placeholder="MAC" value="" >
 
</div>
    
 


<!-- error-->
  <div id="errorremovehost" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submithost"  id="submitsetport"  class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin remove host->



<!-- Modal y formulario para editar perfilhp mikrotik-->
<div class="modal fade" id="Modaleditprofilehp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  " role="document">
    <div class="modal-content">
      <div class="modal-header bg-yellow">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar perfil hotspot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formeditprofilehp">
    <!-- contenido-->
      <div class="modal-body">

<input name="nombre1" id="nombreprofileedit1"  required type="hidden" class="form-control" placeholder="Nombre" value="" >
            
       <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text    ">Nombre</span>
  </div>
<input name="nombre2" id="nombreprofileedit2"  required type="text" class="form-control" placeholder="Nombre del perfil" value="" >
 
</div>

 

     <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">No. Usuarios</span>
  </div>
<input id="nusuariosp" name="nusuarios" required type="text" class="form-control" placeholder="numero usuarios" value="" >
 
  
</div>
  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Velocidad</span>
  </div>
<input id="velocidadprofile" name="velocidad"  type="text" class="form-control" placeholder="Rx/Tx" value="" >
 
  
</div>
  <div class="input-group mb-1">
  <div class="input-group-prepend">
  <span  style="width:140px; "  class="input-group-text   ">Cookie</span>
  </div>
<input id="cookieprofile" name="cookie"  type="text" class="form-control" placeholder="cookie" value="" >
 
  
</div>
 




 

<!-- error-->
  <div id="erroreditprofilehp" class="content">
 
      
 
    </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"  id="submiteditprofilehp"  class="btn btn-primary">Guardar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para editar perfilhp mikrotikr-->




<!-- Modal y formulario para info uhp mikrotik-->
<div class="modal fade" id="Modalainnfouser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="tituloinfo">Información de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <!-- contenido-->
      <div class="modal-body">
            
 
<div class="row">

  <div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span id="iconoestado" class="info-box-icon bg-navy"><i class="far fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Estado</span>
 <span id="1status" class="info-box-number">$activo-inactivo</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Usuario</span>
 <span id="1u" class="info-box-number">$username</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-black"><i class="fa fa-lock"></i></span>
<div class="info-box-content">
<span class="info-box-text">Contraseña</span>
 <span id="1pass" class="info-box-number">$password</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-red"><i class="far fa-circle"></i></span>
<div class="info-box-content">
<span class="info-box-text">IP</span>
 <span id="1ip" class="info-box-number">$address</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-info"><i class="fas fa-info"></i></span>
<div class="info-box-content">
<span class="info-box-text">MAC</span>
 <span id="1mac" class="info-box-number">$mac</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-lime"><i class="fas fa-circle-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Perfil</span>
 <span id="1perfil" class="info-box-number">$profile</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-cyan"><i class="fas fa-user-clock"></i></span>
<div class="info-box-content">
<span class="info-box-text">Tiempo</span>
 <span id="1uptime" class="info-box-number">$uptime</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-yellow"><i class="fas fa-clock"></i></span>
<div class="info-box-content">
<span class="info-box-text">Tiempo limite</span>
 <span id="1limitup" class="info-box-number">$limit-uptime</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-secondary"><i class="fas fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">Limite bytes</span>
 <span id="1lbt" class="info-box-number">$limit-bytes-total</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-download"></i></span>
<div class="info-box-content">
<span class="info-box-text">Bytes entrada</span>
 <span id="1bi" class="info-box-number">$bytes-in</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-maroon"><i class="fas fa-upload"></i></span>
<div class="info-box-content">
<span class="info-box-text">Bytes Salida</span>
 <span id="1bout" class="info-box-number">$btes-out</span>
</div></div></div>
 

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-indigo"><i class="fas fa-comment-dots"></i></span>
<div class="info-box-content">
<span class="info-box-text">Cometario</span>
 <span id="1com" class="info-box-number">$comment</span>
</div></div></div>

      </div></div>
      <!-- end contenido-->
      <div class="modal-footer">
   
        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
        
      </div>
    
    
    </div>
  </div>
</div>

<!-- Fin Modal y formulario para info userhp mikrotikr-->



