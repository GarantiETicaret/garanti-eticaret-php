<?php include('menu.php');?>
<?php $orderid=Helper::GenerateOrderId(); ?>

<h2>GarantiPAy Satış </h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">İşlem Bilgileri</label></legend>
    <label style="font-weight:bold;">İşlem Tipi &nbsp; :   &nbsp; </label> Sales<br>
    <label style="font-weight:bold;">Terminal ID &nbsp; :&nbsp; </label> 30690133 <br>
    <label style="font-weight:bold;">MerchantID  &nbsp;:   &nbsp;</label> 7000679 <br>
    <label style="font-weight:bold;">ProvUserID &nbsp;:  &nbsp;</label> PROVAUT <br>
    <label style="font-weight:bold;">UserID &nbsp;:  &nbsp;</label> PROVAUT<br>

</fieldset>

<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend><label style="font-weight:bold;width:250px;">Ödeme Bilgileri</label></legend>
        <!-- Text input-->
       
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  OrderID:</label>
            <div class="col-md-4">
			<input value="<?php echo $orderid; ?>" name="orderID" class="form-control input-md">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  İşlem Tutarı:</label>
            <div class="col-md-4">
                <input value="" name="transactionAmount" class="form-control input-md">
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
   
   
    $settings3D=new Settings3D();
    $terminal=new Terminal();

    $request = new GarantiPayRequest();
    $request->apiversion = $settings3D->apiversion;
    $request->mode = $settings3D->mode;

    $request->terminalid="30690133";
    $request->terminaluserid="PROVOOS";
    $request->terminalprovuserid ="PROVOOS";
    $request->terminalmerchantid = "3424113";



    $request->successurl = "http://garantiphp.codevist.com/GarantiPaySuccess.php";
    $request->errorurl = "http://garantiphp.codevist.com/GarantiPayError.php";
    $request->customeremailaddress = "fatih@codevist.com";
   
    $request->customeripaddress = "127.0.0.1";
    $request->secure3dsecuritylevel = "CUSTOM_PAY";
    $request->orderid = $_POST["orderID"];
    $request->txnamount = $_POST["transactionAmount"];
	$request->txntype = "gpdatarequest";
	$request->txnsubtype = "sales";
	$request->txninstallmentcount ="";
	$request->totallinstallmentcount = "2";
	$request->installmentamount1 = "110";
	$request->installmentamount2 = "120";
	$request->installmentnumber1 = "2";
	$request->installmentnumber2 = "3";
	$request->bnsuseflag = "N";
	$request->chequeuseflag = "N";
	$request->fbbuseflag = "N";
	$request->garantipay = "Y";
	$request->txntimeoutperiod = "300";
	$request->installmentratewithreward1 = "1000";
	$request->installmentratewithreward2 = "2000";
	$request->companyname = "DENEME";
	$request->txncurrencycode = "949";
	$request->storekey = "12345678";
	$request->txntimestamp = date("d-m-Y H:i:s");
	$request->lang = "tr";
	$request->refreshtime = "1";
	
	
	
    
    $request->secure3dhash=GarantiPayRequest::Compute3DHash($request,$settings3D);
    $response = GarantiPayRequest::execute($request,$settings3D); //GarantiPayRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print $response;
	?>

<?php endif; ?>	 



<?php include('footer.php');?>