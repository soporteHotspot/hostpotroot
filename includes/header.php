
 

 
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$_SERVER['HTTP_HOST'];?><?=$_SERVER['REQUEST_URI'];?></title>

   <link 
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="logo/favicon.jpg"
    />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  
  <link rel="stylesheet" href="../fontawesome611/css/all.css"> 
 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../css/adminlte.css">
   
  <!-- Google Font: Source Sans Pro -->

  
  
   <!-- DataTables -->
  <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/responsive.bootstrap4.min.css">
 <script src="../js/qrious.js"></script>
  
  <style> 

     .loading {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: 1s all;
        opacity: 0;
    }
    .loading.show {
        opacity: 1;
    }
    .loading .spin {
        border: 3px solid hsla(185, 100%, 62%, 0.2);
        border-top-color: #3cefff;
        border-radius: 50%;
        width: 3em;
        height: 3em;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }            

::-webkit-scrollbar {
    width: 12px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(255,0,0,1); 
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    border-radius: 10px;
     background-color: red;
}
 





  	.td {  

	 max-width: 100px;
     white-space: nowrap;
     overflow: hidden;
   
}
  </style>
</head>
<body class="hold-transition sidebar-mini">
<?php if (!is_file("require/connect_db.php")) {
   header("Location:index");
   // fopen($fileconect, 'w');
   return false;  
}  ?>
  <!-- inicia wraper -->
<div class="wrapper">


 

