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
	   
		 if(($_POST["mdstatus"]=="1") or ($_POST["mdstatus"]=="2") || ($_POST["mdstatus"]=="3") || ($_POST["mdstatus"]=="4"))
	   {
		   $secureresponse=new Secure3DResponse();
		   
		   $secureresponse->orderID=$_POST["orderid"];
		   $secureresponse->authenticationCode=$_POST["cavv"];
		   $secureresponse->securityLevel=$_POST["eci"];
		   $secureresponse->txnID=$_POST["xid"];
		   $secureresponse->MD=$_POST["md"];
		   $secureresponse->mode=$_POST["mode"];
		   $secureresponse->apiversion=$_POST["apiversion"];
		   $secureresponse->terminalProvUserID=$_POST["terminalprovuserid"];
		   $secureresponse->installmentCount=$_POST["txninstallmentcount"];
		   $secureresponse->terminalUserID=$_POST["terminaluserid"];
		   $secureresponse->terminalID=$_POST["clientid"];
		   $secureresponse->amount=$_POST["txnamount"];
		   $secureresponse->currencyCode=$_POST["txncurrencycode"];
		   $secureresponse->customerIpAddres=$_POST["customeripaddress"];
		   $secureresponse->customerEmailAddress=$_POST["customeremailaddress"];
		   $secureresponse->terminalMerchantID=$_POST["terminalmerchantid"];
		   $secureresponse->txnType=$_POST["txntype"];
		   $secureresponse->procreturnCode=$_POST["procreturncode"];
		   $secureresponse->authcode=$_POST["authcode"];
		   $secureresponse->response=$_POST["response"];
		   $secureresponse->mdstatus=$_POST["mdstatus"];
		   $secureresponse->rnd=$_POST["rnd"];
		   $secureresponse->xmlResponse="";
		  

			$request=new Secure3DSuccessRequest();
			$settings=new Settings();
			
			$request->Mode=$secureresponse->mode;
			$request->Version=$secureresponse->apiversion;
		
			$request->Terminal= new Terminal();

			$request->Terminal->ID=$secureresponse->terminalID;
			$request->Terminal->MerchantID=$secureresponse->terminalMerchantID;
			$request->Terminal->ProvUserID=$secureresponse->terminalProvUserID;
			$request->Terminal->UserID=$secureresponse->terminalUserID;
			
				
			$request->Card = new Card();

			$request->Card->CVV2="";
			$request->Card->ExpireDate="";
			$request->Card->Number="";
			
			$request->Customer = new Customer();

			$request->Customer->EmailAddr=$secureresponse->customerEmailAddress;
			$request->Customer->IPAddress=$secureresponse->customerIpAddres;
			
			$request->AuthenticationCode=$secureresponse->authenticationCode;
			$request->Md=$secureresponse->MD;
			$request->SecurityLevel=$secureresponse->securityLevel;
			$request->TxnID=$secureresponse->txnID;
			
			$request->Order = new Order();

			$request->Order->OrderID=$secureresponse->orderID;
			$request->Order->Description="";
			
			$request->Transaction = new Transaction();

			$request->Transaction->Amount=$secureresponse->amount;
			$request->Transaction->Type=$secureresponse->txnType;
			$request->CurrencyCode=$secureresponse->currencyCode;
			$request->InstallmentCnt=$secureresponse->installmentCount;
			$request->MotoInd="N";
			$request->CardholderPresentCode=13;
			
				$request->Hash=Helper::ComputeHash($request,$settings);

				 $response = Secure3DSuccessRequest::execute($request,$settings); //SalesRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
		
		$req=new Secure3DSuccessRequest();
		$req=$request;
		
		print "<h3>Sonuç:</h3>";
		echo ("<pre>");
	print_r ( $req );
		echo ("</pre>");
		
	
		
		print "<h3>Provizyon Sonucu Bilgileri:</h3>";
		echo "<pre>";
		echo htmlspecialchars ($response);  
		echo "</pre>";   

	   }
   
   
   }
   else
	   print "<h3>Hash Doğrulaması Yapılamadı.</h3>";


	?>




<?php include('footer.php');?>