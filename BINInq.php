<?php include('menu.php');?>
<h2>BIN Sorgulama</h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">Terminal Bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> Bin Sorgulama<br>
    <label style="font-weight:bold;">Terminal ID &nbsp; :&nbsp; </label> 30691297 <br>
    <label style="font-weight:bold;">MerchantID  &nbsp;:   &nbsp;</label> 7000679 <br>
    <label style="font-weight:bold;">ProvUserID &nbsp;:  &nbsp;</label> PROVAUT <br>
    <label style="font-weight:bold;">UserID &nbsp;:  &nbsp;</label> PROVAUT<br>

</fieldset>

<form action="" method="post" class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <legend><label style="font-weight:bold;width:250px;">Sipariş Bilgileri</label></legend>
        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Kart Tipi:</label>
            <div class="col-md-4">
                <input value="A" name="cardType" class="form-control input-md" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Grup Tipi:</label>
            <div class="col-md-4">
                <input value="A" name="groupType" class="form-control input-md" >
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

    $request = new BINInqRequest();
    $request->Version = $settings->Version;
    $request->Mode = $settings->Mode;

    $request->Customer = new Customer();
    $request->Customer->EmailAddress="eticaret@garanti.com.tr";
    $request->Customer->IPAddress="127.0.0.1";

    $request->Card = new Card();
    $request->Card->CVV2="";
    $request->Card->ExpireDate="";
    $request->Card->Number="";

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
    $request->Transaction->Type="bininq";
    $request->CurrencyCode="949";
    $request->CardType=$_POST["cardType"] ;
    $request->Group=$_POST["groupType"] ;
  
    $request->hash=Helper::ComputeHash($request,$settings);

    $response = BINInqRequest::execute($request,$settings); //BINInqRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
    
	?>

<?php endif; ?>	 
<?php include('footer.php');?>
