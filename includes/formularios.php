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



<!-- Modal config binding user-->
<div class="modal fade" id="Modalconfigurar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" ><i class="fa fa-user-minus"></i>   Deshabilitación automatica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formrconfigb">
    <!-- contenido-->
      <div class="modal-body">
    <div class="input-group-text alert text-left">
   Configure tiempo para deshabilitación</br>
   0 = ilimitado 
  </div>
 
 


<div class="input-group border border-success mb-2 mt-2">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >MAC</span>
  </div>  
  <input type="text" readonly class="form-control"  id="direcionmacbin2"   name="mac">
  
</div>


<div class="input-group border border-success mb-2 mt-2">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Comentario</span>
  </div>  
  <input type="text" class="form-control   "  id="comentariobi"   name="comentario">
  
</div>


<div class="input-group border border-success mb-2 mt-2">
  <div class="input-group-prepend">
    <span style="width:130px; " class="input-group-text text-white bg-primary"  >Tiempo</span>
  </div>  
  <input name="tiempo1"   min="0" required type="number" class="form-control" value="0"   >
   <select name="tiempo2"  required class="form-control"  >
      <option value="m">Minutos</option>
      <option value="h">Horas</option>
      <option value="d">Días</option>
      
    </select>
  
</div>

 

<!-- error-->
  <div id="errorrconfigb" class="content">
 </div>





<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submit"   class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal config binding user-->
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
<span class="info-box-text">Limite total bytes</span>
 <span id="1lbt" class="info-box-number">$limit-bytes-total</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-download"></i></span>
<div class="info-box-content">
<span class="info-box-text">Limit-bytes-entrada</span>
 <span id="1bi" class="info-box-number">$limit-bytes-in</span>
</div></div></div>

<div class="col-md-4 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-maroon"><i class="fas fa-upload"></i></span>
<div class="info-box-content">
<span class="info-box-text">Limit-bytes-salida</span>
 <span id="1bout" class="info-box-number">$limit-bytes-out</span>
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
     
 <input type="hidden" id="idcard"  required name="id" class="form-control" value="" placeholder="id"  >
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
  <input type="number" id="cantidadv"   required name="cantidad"  min="3" max="1026"   class="form-control " value="3" step="3" placeholder="cantidad"   >
  
</div>

<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span   class="input-group-text text-white bg-primary"  >Caducidad:</span>
  </div>

    <select style="width: 20%;" required name="caducidad"  >
    <option value="ilimitado">Ilimitado</option> 
     <option value="limitado">Limitado</option>
       </select>


  <input style="width: 30%;"  type="date"    name="fcaducidad"     class=" "   placeholder="cantidad"   >


  <select class="form-control"  name="hcaducidad"   >
    <option value="04:00:00">04:00 h.</option>
<option value="00:00:00">00:00 h.</option>
<option value="00:15:00">00:15 h.</option>
<option value="00:30:00">00:30 h.</option>
<option value="00:45:00">00:45 h.</option>
<option value="01:00:00">01:00 h.</option>
<option value="01:15:00">01:15 h.</option>
<option value="01:30:00">01:30 h.</option>
<option value="01:45:00">01:45 h.</option>
<option value="02:00:00">02:00 h.</option>
<option value="02:15:00">02:15 h.</option>
<option value="02:30:00">02:30 h.</option>
<option value="02:45:00">02:45 h.</option>
<option value="03:00:00">03:00 h.</option>
<option value="03:15:00">03:15 h.</option>
<option value="03:30:00">03:30 h.</option>
<option value="03:45:00">03:45 h.</option>
<option value="04:00:00">04:00 h.</option>
<option value="04:15:00">04:15 h.</option>
<option value="04:30:00">04:30 h.</option>
<option value="04:45:00">04:45 h.</option>
<option value="05:00:00">05:00 h.</option>
<option value="05:15:00">05:15 h.</option>
<option value="05:30:00">05:30 h.</option>
<option value="05:45:00">05:45 h.</option>
<option value="06:00:00">06:00 h.</option>
<option value="06:15:00">06:15 h.</option>
<option value="06:30:00">06:30 h.</option>
<option value="06:45:00">06:45 h.</option>
<option value="07:00:00">07:00 h.</option>
<option value="07:15:00">07:15 h.</option>
<option value="07:30:00">07:30 h.</option>
<option value="07:45:00">07:45 h.</option>
<option value="08:00:00">08:00 h.</option>
<option value="08:15:00">08:15 h.</option>
<option value="08:30:00">08:30 h.</option>
<option value="08:45:00">08:45 h.</option>
<option value="09:00:00">09:00 h.</option>
<option value="09:15:00">09:15 h.</option>
<option value="09:30:00">09:30 h.</option>
<option value="09:45:00">09:45 h.</option>
<option value="10:00:00">10:00 h.</option>
<option value="10:15:00">10:15 h.</option>
<option value="10:30:00">10:30 h.</option>
<option value="10:45:00">10:45 h.</option>
<option value="11:00:00">11:00 h.</option>
<option value="11:15:00">11:15 h.</option>
<option value="11:30:00">11:30 h.</option>
<option value="11:45:00">11:45 h.</option>
<option value="12:00:00">12:00 h.</option>
<option value="12:15:00">12:15 h.</option>
<option value="12:30:00">12:30 h.</option>
<option value="12:45:00">12:45 h.</option>
<option value="13:00:00">13:00 h.</option>
<option value="13:15:00">13:15 h.</option>
<option value="13:30:00">13:30 h.</option>
<option value="13:45:00">13:45 h.</option>
<option value="14:00:00">14:00 h.</option>
<option value="14:15:00">14:15 h.</option>
<option value="14:30:00">14:30 h.</option>
<option value="14:45:00">14:45 h.</option>
<option value="15:00:00">15:00 h.</option>
<option value="15:15:00">15:15 h.</option>
<option value="15:30:00">15:30 h.</option>
<option value="15:45:00">15:45 h.</option>
<option value="16:00:00">16:00 h.</option>
<option value="16:15:00">16:15 h.</option>
<option value="16:30:00">16:30 h.</option>
<option value="16:45:00">16:45 h.</option>
<option value="17:00:00">17:00 h.</option>
<option value="17:15:00">17:15 h.</option>
<option value="17:30:00">17:30 h.</option>
<option value="17:45:00">17:45 h.</option>
<option value="18:00:00">18:00 h.</option>
<option value="18:15:00">18:15 h.</option>
<option value="18:30:00">18:30 h.</option>
<option value="18:45:00">18:45 h.</option>
<option value="19:00:00">19:00 h.</option>
<option value="19:15:00">19:15 h.</option>
<option value="19:30:00">19:30 h.</option>
<option value="19:45:00">19:45 h.</option>
<option value="20:00:00">20:00 h.</option>
<option value="20:15:00">20:15 h.</option>
<option value="20:30:00">20:30 h.</option>
<option value="20:45:00">20:45 h.</option>
<option value="21:00:00">21:00 h.</option>
<option value="21:15:00">21:15 h.</option>
<option value="21:30:00">21:30 h.</option>
<option value="21:45:00">21:45 h.</option>
<option value="22:00:00">22:00 h.</option>
<option value="22:15:00">22:15 h.</option>
<option value="22:30:00">22:30 h.</option>
<option value="22:45:00">22:45 h.</option>
<option value="23:00:00">23:00 h.</option>
<option value="23:15:00">23:15 h.</option>
<option value="23:30:00">23:30 h.</option>
<option value="23:45:00">23:45 h.</option>
</select>
  
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


<label for="exampleFormControlSelect1">plantillas disponibles</label> 
 <div class="input-group">
   
    <select onchange="modelos()"  id="seeplantilla" class="form-control"  >
      <option>Sin archivos</option>
    </select>
     <div class="input-group-prepend">
       <button id="getphp" type="button" class="form-control"><i class="fa fa-sync"></i>  </button>
 
    </div>
  </div>


    <div class="form-group col-md-6">
      <div class="form-check m-2">
  <input onchange="modelos()" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">






  <label class="form-check-label" for="flexRadioDefault1">
    <li class="fa fa-address-card text-warning  mr-2"></li>  Personalizado
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
     
  <strong id="ask">¿Está seguro de cambiar el estado ?</strong>
   
<input id="estadocambiar" required type="hidden" class="form-control"  value=''  name="estado">
<input id="dataacambiar" required readonly   class="form-control form-control-lg  text-danger  bg-white text-center border border-light "  value=''  name="data">
 

  <div id="divedeestado"  class="alert  text-center mt-2">

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

<div id="divpass"  class="d-none">

<div   class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width: 50px;" class="input-group-text"  ><i class="fa fa-lock"  aria-hidden="true"></i> </span>
  </div>
    <strong class="form-control" id="clavex"> clave</strong>
 
</div>
</div>

 

 

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
     
      <img class="rounded mx-auto d-block img-thumbnail" alt="Código QR" id="codigo">
    
        
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

 

<!-- Fin Modal y formulario para editar serhospt mikrotikr-->










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
    <button type="submitstatic"    class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal static mikrotikr-->

<!-- card-->


  <div id="designcard" class="modal fade  " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">

    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personalizar vouchers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><form id="Formplantilla">
      <div class="modal-body">


  <div class="row">

    <div class="col-12 col-md-8"> 
<div class="alert  bg-light mb-0 "> Estilos css
</div>
        <textarea  id="estiloscss" name="css" class="design   " style="width: 100%; height: 30vh; background-color: #2D2F30; color:#24B93F ;">  

 .contenedor{ 
min-width: 792px;
max-width: 792px;
   margin:  auto;
} 

.tarjeta { 
display: inline-block;
  --tw-bg-opacity: 1;
 background-image: url("");
   background-position: center center;
   background-repeat: no-repeat;  
   background-attachment: relative;
   background-size: cover;

 70%,rgba(0, 0, 0,1) 85%);

   justify-content: center;
  width: 32.2%;
border: 1px dotted black;
border-radius:5px;
margin:1px;
}
.encabezado {
margin-top:1px;
border-radius:10px;
margin-left:2px;
margin-right:2px;
  --tw-bg-opacity: 1;
 
   font-style: italic;
 color:white;
  text-align: center;
font-size:20px;
}
.qrlogo{ 
margin-top:1px;
margin-left:1px;
width: 70px;
height:70px;
border-radius:5px;
  --tw-bg-opacity: 1;
background: linear-gradient(to bottom,  rgba(254,255,255,1) 0%,rgba(221,241,249,1) 35%,rgba(160,216,239,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
} 
.contenido { 
margin-left:2px;
margin-right:2px;
margin-top: 0px;
font-size:14px;
color:white;
text-align: left; 
margin-bottom:0px;
background-color:rgba(0,0,0,0.5)
} 
.flex { 
  display: flex;
margin-bottom:0px;
}
.flex-col { display: flex;
  flex-direction: column;
color:white;
text-align:center;
font-size:20px;

}

        </textarea>
<div class="alert  bg-light mt-2 mb-0 "> Html
</div>
<textarea id="htmlcard" name="htmlcard" class="design   mt-0"  style="width: 100%; height: 30vh; background-color: #2D2F30; color:#24B93F ;"> 
<div class="tarjeta"> 
<div class="encabezado" >   [encabezado]  </div>   
  <div class="flex  ">  
<img alt="" src="[logo]" class="qrlogo" />  
         
        
    <p class="contenido">
       [idusername] : [username]    </br>    
        [idpassword] : [password]    </br>    
       Tiempo: [tiempo]    </br>    
 Precio:
[precio]   <br>
Caducidad.: [cadcorta] 
</br>    
           
       
      </p>

    </div>
</textarea>
          </div>
        
 <div   class="col-6 col-md-4"> 
<label for="exampleFormControlSelect1">Estilos</label> 
 <div class="input-group">
   
    <select id="seeestilos" class="form-control"  >
      <option>Sin archivos</option>
    </select>
     <div class="input-group-prepend">
       <button id="getstile" class="form-control"><i class="fa fa-sync"></i>  </button>


       <button type="button" id="readestile" class="form-control text-warning"><i class="fa fa-edit"></i>  </button>
       <button type="button" id="deletecss" class="form-control text-danger"><i class="fa fa-trash"></i>  </button>
    </div>
  </div>
 

 


 
 <label for="exampleFormControlSelect1">HTML </label>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
   <i class="fa fa-question"></i> 
</button>
 <div class="input-group">
   
    <select id="seehtml" class="form-control"  >
      <option>Sin archivos</option>
    </select>
     <div class="input-group-prepend">
       <button id="gethtml" class="form-control"><i class="fa fa-sync"></i>  </button>
            <button type="button" id="readhtml" class="form-control text-warning"><i class="fa fa-edit"></i>  </button>

                 <button type="button" id="deletehtml" class="form-control text-danger"><i class="fa fa-trash"></i>  </button>
    </div>
  </div>

 




    <div class="alert bg-light mt-2  "> Vista previa 
</div>



   <div id="vistaprevia"  > 
   
 
      
 
      
        </div>
 
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Modelo</span>
        </div>
        <select required name="model" class="form-control">
          <option value="">Seleccione modelo</option>
<option value="qr">Modelo con QR</option>
 <option value="html">Modelo sin QR</option>

        </select>
         
      </div>
 
      
        </div>

</div>
      </div>
      <div class="modal-footer">
        

        <div class="btn-group" role="group" aria-label="Basic example">
    <input required type="text" class="form-control" id="namefile" name="nombrep" placeholder="Nombre de la plantilla"  >
    <input id="enviardata" class="btn btn-success" type="submit" name="save" value="Guardar">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
        
      </div></form>
    </div>
  </div>
</div>

<!-- card-->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Variables</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <textarea style="height:400px; font-size: 10px;" class="modal-body">
  
      [encabezado] obtenido de la base de datos, es el texto que correponde a la sucursal. 
      [logo] imagen logo obtenida del sistema   
      [codeqr] imagen qr generado por sistema  es reemplazado por logo
      [idusername] Identificador de usuario  obtenido de la base de datos al igual que el identificador de contraseña idpassword en apartado empresa
      [idpassword] Identificador de contraseña 
      [username] usuario, username en MikroTik     
      [password] contraseña del usuario        
      [tiempo] para obtener tiempo, éste es obtenida del limit-uptime del usuario     
      [cadcorta]    para caducidad corta incluye solo fecha
      [cadlarga]    para caducidad corta incluye fecha y hora
      [precio] Para precios el símbolo de moneda obtenida de la base de datos este dato es obtenido del comentario, por tanto si usa otro sistema éste no se relflejará correctamente
      
      </textarea>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div><!-- Modal -->