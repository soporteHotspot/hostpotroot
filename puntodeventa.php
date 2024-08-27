

<?php 
session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}
include_once('includes/header.php');
include_once('includes/navbar.php');
include_once('includes/asidebartpv.php');
include_once('includes/seccionlink.php');

?> 
 

<!-- Modal -->
 
  <?php 
include_once('includes/main.php');
include_once('includes/formularios.php');
include_once('includes/formulariosdelete.php');
include_once('includes/script.php');
include_once('includes/footer.php'); 

?>

 <script src="js/canvas2image.js"></script>
<script src="js/html2canvas.min.js"></script>
<script type="text/javascript" src="jsapp/tpv.js"></script>
<script type="text/javascript" src="jsapp/downimg.js"></script>
<script type="text/javascript" src="js/qrious.js"></script>
