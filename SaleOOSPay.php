<?php include('menu.php');?>
<?php $orderid=Helper::GenerateOrderId(); ?>

<h2>OOS Pay Ödeme İşlemi </h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">İşlem Bilgileri</label></legend>
    <label style="font-weight:bold;">İşlem Tipi &nbsp; :   &nbsp; </label> Sales<br>
    <label style="font-weight:bold;">Terminal ID &nbsp; :&nbsp; </label> 30691300 <br>
    <label style="font-weight:bold;">MerchantID  &nbsp;:   &nbsp;</label> 7000679 <br>
    <label style="font-weight:bold;">ProvUserID &nbsp;:  &nbsp;</label> PROVOOS<br>
    <label style="font-weight:bold;">UserID &nbsp;:  &nbsp;</label> PROVOOS<br>

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

    $request = new SaleOOSPayRequest();
    $request->apiversion = $settings3D->apiversion;
    $request->mode = $settings3D->mode;

    $request->terminalid="30691300";
    $request->terminaluserid="PROVOOS";
    $request->terminalprovuserid ="PROVOOS";
    $request->terminalmerchantid = "7000679";



    $request->successurl = "http://garantiphp.codevist.com/OOSSuccess.php";
    $request->errorurl = "http://garantiphp.codevist.com/OOSError.php";
    $request->customeremailaddress = "fatih@codevist.com";
   
    $request->customeripaddress = "127.0.0.1";
    $request->secure3dsecuritylevel = "OOS_PAY";
    $request->orderid = $_POST["orderID"];
    $request->txnamount = $_POST["transactionAmount"];
	$request->txntype = "sales";
	$request->txninstallmentcount = "";
	$request->txncurrencycode = "949";
	$request->storekey = "12345678";
	$request->txntimestamp = date("d-m-Y H:i:s");
	$request->lang = "tr";
	$request->refreshtime = "10";
	$request->companyname = "deneme";
	
	
    
    $request->secure3dhash=SaleOOSPayRequest::Compute3DHash($request,$settings3D);
    $response = SaleOOSPayRequest::execute($request,$settings3D); //SaleOOSPayRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print $response;
	?>

<?php endif; ?>	 



<?php include('footer.php');?>