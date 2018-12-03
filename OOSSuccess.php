<?php include('menu.php');?>

<?php

   $hash=$_POST["hash"];
   $hashParamsVal="";
   $storeKey= "12345678";
   $hashParams=$_POST["hashparams"];
   $valid=false;
   //Validasyon 
	   if (!empty($hashParams)) 
	   {
		   $result= explode(":",$hashParams);
		  
			foreach ($result as $key) 
			{
				if(!empty($key))
				$hashParamsVal .= $_POST[$key];
				
			
			}
			$hashParamsVal .= $storeKey;
			
			$valid=Helper::Validate3DReturn($hashParamsVal,$hash);
	   }

   if($valid==true){
ini_set ( 'display_errors', 1 );
error_reporting ( E_ERROR );
print "<h1>3D Ödeme Başarılı!</h1>";
print "<h3>Sonuç:</h3>";
echo ("<pre>");
print_r ( $_POST );
echo ("</pre>");
   }
   else
	   print "<h1>Hash Doğrulaması Yapılamadı.</h1>";

	?>




<?php include('footer.php');?>