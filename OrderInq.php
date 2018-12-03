<?php include('menu.php');?>
<h2>Sipariş Sorgulama</h2>
<br />
<fieldset>

    <legend><label style="font-weight:bold;width:250px;">Terminal Bilgileri</label></legend>
    <label style="font-weight:bold;">Servis Adı &nbsp; :   &nbsp; </label> Orderinq<br>
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
            <label class="col-md-4 control-label" for="">  Sipariş Numarası:</label>
            <div class="col-md-4">
                <input value="" name="orderID" class="form-control input-md">
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

    $request = new OrderInqRequest();
    $request->Version = $settings->Version;
    $request->Mode = $settings->Mode;

    $request->Customer = new Customer();
    $request->Customer->EmailAddr="fatih@codevist.com";
    $request->Customer->IPAddress="127.0.0.1";

    $request->Card = new Card();
    $request->Card->CVV2="";
    $request->Card->ExpireDate="";
    $request->Card->Number="";

    $request->Order = new Order();
    $request->Order->OrderID=$_POST["orderID"];
    $request->Order->Description="";
   
    $request->Terminal= new Terminal();
    $request->Terminal->ProvUserID=$terminal->ProvUserID;
    $request->Terminal->UserID=$terminal->UserID;
    $request->Terminal->ID=$terminal->ID;
    $request->Terminal->MerchantID=$terminal->MerchantID;

    $request->Transaction = new Transaction();
    $request->Transaction->Amount="100";
    $request->Transaction->Type="orderinq";
    $request->CurrencyCode="949";
  
    $request->Hash=Helper::ComputeHash($request,$settings);

    $response = OrderInqRequest::execute($request,$settings); //OrderInqRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
    
	?>

<?php endif; ?>	 
<?php include('footer.php');?>
