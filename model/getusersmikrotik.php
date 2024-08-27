
 <?php  


require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
	

	 $obtenerusers = $API->comm("/user/print");
		
		$TotalReg = count($obtenerusers);
 	print '<select required class="form-control" id="usersmikrotik" name="nombre"> ';

for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];

print '<option value="'.$nombre.'">'.$nombre.'</option>';
}

 print '</select>';


}

 else   
 
{ 

	
      print '<input type="text" id="usersmikrotik"  required name="nombre" class="form-control" value="" placeholder="Nombre usuario mikortik"  >';        

}
                 ?>