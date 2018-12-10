<?php include('menu.php');?>
<h2>Kredi Kartı ile İşlem Sorgulama</h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">Terminal Bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> cardtxnlistinq<br>
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
            <label class="col-md-4 control-label" for="">  Kredi Kartı Numaarsı:</label>
            <div class="col-md-4">
                <input value="" name="creditCard" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Başlangıç Tarihi:</label>
            <div class="col-md-4">
                <input value="06/11/2018 08:00" name="startDate" class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Bitiş Tarihi:</label>
            <div class="col-md-4">
                <input value="07/11/2018 08:00" name="endDate" class="form-control input-md">
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

    $request = new CardtxnListInqRequest();
    $request->Version = $settings->Version;
    $request->Mode = $settings->Mode;

    $request->Customer = new Customer();
    $request->Customer->EmailAddress="eticaret@garanti.com.tr";
    $request->Customer->IPAddress="127.0.0.1";

    $request->Card = new Card();
    $request->Card->CVV2="";
    $request->Card->ExpireDate="";
    $request->Card->Number=$_POST["creditCard"];

    $request->Order = new Order();
    $request->Order->OrderID="";
    $request->Order->Description="";
   
    $request->Terminal= new Terminal();
    $request->Terminal->ProvUserID=$terminal->ProvUserID;
    $request->Terminal->UserID=$terminal->UserID;
    $request->Terminal->ID=$terminal->ID;
    $request->Terminal->MerchantID=$terminal->MerchantID;

    $request->Transaction = new Transaction();
    $request->Transaction->Amount="100";
    $request->Transaction->Type="cardtxnlistinq";
    $request->CurrencyCode="949";
    $request->StartDate=$_POST["startDate"];
    $request->EndDate=$_POST["endDate"];
    $request->ListPageNum = "1";

  
    $request->Hash=Helper::ComputeHash($request,$settings);

    $response = CardtxnListInqRequest::execute($request,$settings); //CardtxnListInqRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
    
	?>

<?php endif; ?>	 
<?php include('footer.php');?>
