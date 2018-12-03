<?php include('menu.php');?>
<?php $orderid=Helper::GenerateOrderId(); ?>

<h2>Garanti Pay App İşlem </h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">İşlem Bilgileri</label></legend>
    <label style="font-weight:bold;">İşlem Tipi &nbsp; :   &nbsp; </label> gpdatarequest<br>
    <label style="font-weight:bold;">Alt İşlem Tipi &nbsp; :   &nbsp; </label> sales<br>
    <label style="font-weight:bold;">Terminal ID &nbsp; :&nbsp; </label> 30691297 <br>
    <label style="font-weight:bold;">MerchantID  &nbsp;:   &nbsp;</label> 7000679 <br>
    <label style="font-weight:bold;">ProvUserID &nbsp;:  &nbsp;</label> PROVAUT <br>
    <label style="font-weight:bold;">UserID &nbsp;:  &nbsp;</label> PROVAUT<br>
    <label style="font-weight:bold;">bnsuseflag &nbsp;:  &nbsp;</label> N<br>
    <label style="font-weight:bold;">fbbuseflag &nbsp;:  &nbsp;</label> N<br>
    <label style="font-weight:bold;">chequeuseflag &nbsp;:  &nbsp;</label> N<br>
    <label style="font-weight:bold;">mileuseflag &nbsp;:  &nbsp;</label> N<br>


</fieldset>

<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend><label style="font-weight:bold;width:250px;">Ödeme Bilgileri</label></legend>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Ödeme Listesi:</label>
            <div class="col-md-4">
                <table border="1">
                    <tr>
                        <td><label class="col-md-4 control-label" for="">Taksit Sayısı</label></td>
                        <td><label class="col-md-4 control-label" for="">Taksit Tutarı</label></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>104</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  TC Kimlik:</label>
            <div class="col-md-4">
                <input value="" name="tckn" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for=""> Gsm Numarası:</label>
            <div class="col-md-4">
                <input value="" name="gsmNumber" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  OrderID:</label>
            <div class="col-md-4">
			<input value="<?php echo $orderid; ?>" name="orderID" class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  İşlem Tutarı:</label>
            <div class="col-md-4">
                <input value="100" name="transactionAmount" class="form-control input-md" readonly>
            </div>
        </div>

    </fieldset>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for=""></label>
        <div class="col-md-4">
            <button type="submit" id="" name="" class="btn btn-danger"> Ödeme Yap</button>
        </div>
    </div>
</form>

<?php if (!empty($_POST)): ?>
<?php
   
   
    $settings=new Settings();
    $terminal=new Terminal();

    $request = new GarantiPayAppRequest();
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
   
    $request->Installmentnumber = 2;
    $request->Installmentamount = "10200";
	$request->Installmentnumber1 = 4;
    $request->Installmentamount1 = "10400";
	
	
	
	
    $request->bnsuseflag = "N";
    $request->fbbuseflag = "N";
	$request->chequeuseflag = "N";
	$request->mileuseflag = "N";
	$request->CompanyName = "Abc";
	$request->TxnTimeOutPeriod = "300";
	$request->NotifSendInd = "N";
	$request->TCKN = ($_POST["tckn"] == null ? "" : $_POST["tckn"]);
	$request->GSMNumber = ($_POST["gsmNumber"] == null ? "" : $_POST["gsmNumber"]);
	$request->InstallmentOnlyForCommercialCard = "N";
	$request->TotalInstallmentCount = "2";
	
	$request->Transaction=new Transaction();
	$request->Transaction->Amount = $_POST["transactionAmount"];
	$request->CurrencyCode = 949;
	$request->CardholderPresentCode = 0;
	$request->ReturnServerUrl = "";
	$request->SubType = "sales";
	$request->Transaction->Type = "gpdatarequest";
	$request->MotoInd = "N";
	
    
    $request->Hash=Helper::ComputeHash($request,$settings);
    $response = GarantiPayAppRequest::execute($request,$settings); //GarantiPayAppRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 



<?php include('footer.php');?>