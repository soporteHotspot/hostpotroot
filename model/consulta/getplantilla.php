 <?php

 

$dir = '../../custom/';

 
 if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
 



if (is_dir($dir)) {

  print '  <select onchange="modelos()"  id="seeplantilla" class="form-control"  >   ';
    
 
foreach(scandir($dir) as $item){
    
    $extension  =pathinfo($item, PATHINFO_EXTENSION );
    if (!($item == '.')) {
        if (!($item == '..')) {
            
            
         if($extension =="php")
         {   
$item = pathinfo($item, PATHINFO_FILENAME);
 

            echo '<option>'.$item.'</option>';
                     }

                             
            }
              
              
              
}}

print '</select>';

}



 
?>   