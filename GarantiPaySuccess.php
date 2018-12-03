
<?php

if(($_POST["gphashdata"]!=null) && ($_POST["gphashdata"]!=""))
{
    public $storeKey="12345678";
    public $gpHash=$_POST["clientid"] . $_POST["oid"] . $_POST["authcode"] . $_POST["procreturncode"] . $_POST["gpinstallmentamount"] . $_POST["gpinstallment"] . $storeKey;
    public $gphashdata=$_POST["gphashdata"];
   Helper::Validate3DReturn($hashParamsVal,$hash);
		if(( Helper::Validate3DReturn( $gpHash,$gphashdata )) == true)
		{
			ini_set ( 'display_errors', 1 );
			error_reporting ( E_ERROR );
			print "<h1>3D Ödeme Başarılı!</h1>";
			print "<h3>Sonuç:</h3>";
			echo ("<pre>");
			print_r ( $_POST );
			echo ("</pre>");
			
		}
   
	  
    
}


	
	
	
	
	
	
	
	
	
     
	
}
