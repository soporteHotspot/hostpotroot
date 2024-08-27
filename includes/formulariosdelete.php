

 

<!-- Modal remove lotes user-->
<div class="modal fade" id="Modalremovelotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" ><i class="fa fa-user-minus"></i>   Remover usuarios hotspot por lotes </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formremovelotes">
    <!-- contenido-->
      <div class="modal-body">



    <div class="alert">
  <strong>¿Remover usuarios que contengan comentarios</strong>
  </div>
<div class="input-group mb-1">
  <div class="input-group-prepend">
    <span style="width:100px; " class="input-group-text text-white bg-danger"  >Comentario</span>
  </div>
  <input type="text" id="comentariosdeletelotes"  required name="comentario" class="form-control" value="" placeholder="Comentario" >
     <button id="updatecom"  onclick="mostrarcomdel()" type="button" class="btn btn-danger"> <i class="fa fa-sync"></i></button>
</div>
 
 

<!-- error-->
  <div id="errorremoveloteporcomentario" class="content">
 </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button id="submitdeletelotes"    class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal remove lotes user-->



<!-- Modal delete user-->
<div class="modal fade" id="Modaldeldeleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-times"></i>   Eliminar usuario hotspot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="Formdeleteuserhp">
	  <!-- contenido-->
      <div class="modal-body">
	  <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente usuario?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="mostrarnombre"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombreusuario"   name="nombre">

<!-- error-->
  <div id="errordeleteuserhp" class="content">
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

<!-- Fin Modal delete user-->



<!-- Modal delete user mikrotik-->
<div class="modal fade" id="Modaldeldelusermikrotik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-times"></i>   Eliminar usuario </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="Formdeleteusermikrotik">
    <!-- contenido-->
      <div class="modal-body">
    <div class="alert">
  <strong>¿Está seguro de eliminar el siguiente usuario?</strong>
  </div>
<div  class="alert text-center alert-danger" role="alert">
  <h2 id="mostrarnombremuserm2"> </h2>
</div>
 
<input type="hidden" class="form-control"  id="nombreusuariomikrotik2"   name="nombre">

<!-- error-->
  <div id="errordeleteusermik2" class="content">
 </div>
<!-- errior-->

      </div>
      <!-- end contenido-->
      <div class="modal-footer">
    <button type="submituserm"   class="btn btn-primary">Confirmar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    
    </form>
    </div>
  </div>
</div>

<!-- Fin Modal delete user mikrotik-->









 


 










 



