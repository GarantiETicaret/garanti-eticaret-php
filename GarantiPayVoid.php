<?php include('menu.php');?>
<?php $orderid=Helper::GenerateOrderId(); ?>

<h2>Garanti Pay İşlem İptali </h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">İşlem Bilgileri</label></legend>
    <label style="font-weight:bold;">İşlem Tipi &nbsp; :   &nbsp; </label> garantipaycancel<br>
    <label style="font-weight:bold;">Terminal ID &nbsp; :&nbsp; </label> 30691297 <br>
    <label style="font-weight:bold;">MerchantID  &nbsp;:   &nbsp;</label> 7000679 <br>
    <label style="font-weight:bold;">ProvUserID &nbsp;:  &nbsp;</label> PROVAUT <br>
    <label style="font-weight:bold;">UserID &nbsp;:  &nbsp;</label> PROVAUT<br>



</fieldset>

<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="">  OrderID:</label>
            <div class="col-md-4">
                <input value="" name="orderID" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  gpID:</label>
            <div class="col-md-4">
                <input value="" name="gpID" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  İşlem Tutarı:</label>
            <div class="col-md-4">
                <input value="100" name="transactionAmount" class="form-control input-md">
            </div>
        </div>

    </fieldset>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-danger"> İşlem Yap</button>
        </div>
    </div>
</form>

<?php if (!empty($_POST)): ?>
<?php
   
   
    $settings=new Settings();
    $terminal=new Terminal();

    $request = new GarantiPayVoidRequest();
    $request->Version = $settings->Version;
    $request->Mode = $settings->Mode;

	$request->Terminal=new Terminal();
    $request->Terminal->ID = "30691297";
    $request->Terminal->MerchantID = "7000679";
    $request->Terminal->ProvUserID = "PROVAUT";
    $request->Terminal->UserID = "PROVAUT";



	$request->Card=new Card();
    $request->Card->CVV2 = "";
    $request->Card->ExpireDate = "";
    $request->Card->Number = "";
   
	$request->Customer=new Customer();
	$request->Customer->EmailAddr = "fatih@codevist.com";
	$request->Customer->IPAddress = "127.0.0.1";
   
	$request->Order=new Order();
	$request->Order-> OrderID =$_POST["orderID"];
	$request->Order->Description = "";
   
  

    $request->GPID = $_POST["gpID"];
    $request->Status = "E";
	
	
	$request->Transaction=new Transaction();
	$request->Transaction->Amount = $_POST["transactionAmount"];
	$request->CurrencyCode = 949;
	$request->CardholderPresentCode = 0;
	$request->ReturnServerUrl = "";
	$request->Transaction->Type = "garantipaycancel";
	$request->MotoInd = "N";
	
    
    $request->Hash=Helper::ComputeHash($request,$settings);
    $response = GarantiPayVoidRequest::execute($request,$settings); //GarantiPayVoidRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 



<?php include('footer.php');?>