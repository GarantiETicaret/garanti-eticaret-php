<?php include('menu.php');?>
<?php $orderid=Helper::GenerateOrderId(); ?>

<h2>Bonus Kullanım </h2>
<br />
<fieldset>
    <legend><label style="font-weight:bold;width:250px;">Terminal Bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> Sales<br>
    <label style="font-weight:bold;">Terminal ID &nbsp; :&nbsp; </label> 30691297 <br>
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
            <label class="col-md-4 control-label" for="">  Kart Numarası:</label>
            <div class="col-md-4">
                <input value="4282209027132016" name="creditCardNo" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Son Kullanma Tarihi Ay/Yıl: </label>
            <div class="col-md-4">
                <input value="0520" name="expireDate" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  CVC: </label>
            <div class="col-md-4">
                <input value="165" name="cvv" class="form-control input-md">
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
                <input value="" name="transactionAmount" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Bonus Bilgisi:</label>
            <div class="col-md-4">
                <input value="" name="usedAmount" class="form-control input-md">
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

    $request = new RewardSalesRequest();
    $request->Version = $settings->Version;
    $request->Mode = $settings->Mode;

    $request->Customer = new Customer();
    $request->Customer->EmailAddr="fatih@codevist.com";
    $request->Customer->IPAddress="127.0.0.1";

    $request->Card = new Card();
    $request->Card->CVV2=$_POST["cvv"];
    $request->Card->ExpireDate=$_POST["expireDate"];
    $request->Card->Number=$_POST["creditCardNo"] ;

    $request->Order = new Order();
    $request->Order->OrderID=$_POST["orderID"] ;
    $request->Order->Description="";
   
    $request->Terminal= new Terminal();
    $request->Terminal->ProvUserID=$terminal->ProvUserID;
    $request->Terminal->UserID=$terminal->UserID;
    $request->Terminal->ID=$terminal->ID;
    $request->Terminal->MerchantID=$terminal->MerchantID;
    $request->Transaction = new Transaction();
    $request->Transaction->Amount=$_POST["transactionAmount"];
    $request->Transaction->Type="sales";
    $request->CurrencyCode="949";
    $request->MotoInd="N";
    $request->Type="BNS";
    $request->UsedAmount =$_POST["usedAmount"];

    $request->Hash=Helper::ComputeHash($request,$settings);
    $response = RewardSalesRequest::execute($request,$settings); //RewardSalesRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 

<?php include('footer.php');?>