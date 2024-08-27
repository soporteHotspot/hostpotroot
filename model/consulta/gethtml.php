 <?php

 

$dir = '../../custom/html';

 
 if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
 



if (is_dir($dir)) {

  print '  <select id="seehtml" class="form-control"  >   ';
    
 
foreach(scandir($dir) as $item){
    
    $extension  =pathinfo($item, PATHINFO_EXTENSION );
    if (!($item == '.')) {
        if (!($item == '..')) {
            
            
         if($extension =="html")
         {   $item = pathinfo($item, PATHINFO_FILENAME);
            echo '<option>'.$item.'</option>';
                     }

                             
            }
              
              
              
}}

print '</select>';

}



 
?>   