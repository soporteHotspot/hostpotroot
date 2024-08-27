   <!-- seccion contenido body -->

<div class="content-wrapper">

    <!-- seccion links de navegación-->
    <section class="content-header p-2 rounded">
<div class="container-fluid  border">
        <div class="row mb-1 mt-1">
          <div class="col-sm-6 text-uppercase">
            <h5> <?php $url=$_SERVER['REQUEST_URI']; echo str_replace("/"," ",$url);?></h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <a  href="index">Inicio</a>
    <a href="<?=$_SERVER['REQUEST_URI'];?>"><?=$_SERVER['REQUEST_URI'];  ?></a> 

    
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

  <!-- /start head -->

  <!-- endd header  -->
 
    </section>
     <!-- /.end -->
  