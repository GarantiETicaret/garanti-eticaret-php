<?php include('menu.php');?>
<h2>Ortak Kart Limit Sorgulama </h2>
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
        <legend><label style="font-weight:bold;width:250px;">Sorgulama Bilgileri</label></legend>
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
            <button type="submit" id="" name="" class="btn btn-danger"> Sorgulama Yap</button>
        </div>
    </div>
</form>

<?php if (!empty($_POST)): ?>
<?php
   
   
    $settings=new Settings();
    $terminal=new Terminal();

    $request = new CommercialCardLimitInqRequest();
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
    $request->Order->OrderID="";
    $request->Order->Description="";
   
    $request->Terminal= new Terminal();
    $request->Terminal->ProvUserID=$terminal->ProvUserID;
    $request->Terminal->UserID=$terminal->UserID;
    $request->Terminal->ID=$terminal->ID;
    $request->Terminal->MerchantID=$terminal->MerchantID;

    $request->Transaction = new Transaction();
    $request->Transaction->Amount=$_POST["transactionAmount"];
    $request->Transaction->Type="commercialcardlimitinq";
    $request->CurrencyCode="949";
    $request->MotoInd="H";
    $request->CardholderPresentCode = "0";
    
    $request->Hash=Helper::ComputeHash($request,$settings);
    $response = CommercialCardLimitInqRequest::execute($request,$settings); //CommercialCardLimitInqRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 
<?php include('footer.php');?>