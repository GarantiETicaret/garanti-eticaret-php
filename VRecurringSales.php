<?php include('menu.php');?>
<?php $orderid=Helper::GenerateOrderId(); ?>

<h2>Değişken Tekrarlı Satış </h2>
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
            <label class="col-md-4 control-label" for="">  Ödeme Listesi:</label>
            <div class="col-md-4">
                <table border="1">
                    <tr>
                        <td><label class="col-md-4 control-label" for="">Sıra</label></td>
                        <td><label class="col-md-4 control-label" for="">  Tutar</label></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>100</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Toplam Tekrar Sayısı:</label>
            <div class="col-md-4">
                <input value="2" name="totalPaymentNum" class="form-control input-md" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="">  Tekrar Sıklığı: </label>
            <div class="col-md-4">
                <input value="1" name="frequencyInterval" class="form-control input-md" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for=""> Sıklık Tipi (D/W/M/Y): </label>
            <div class="col-md-4">
                <input value="M" name="frequencyType" class="form-control input-md" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for=""> Başlangıç Tarihi: </label>
            <div class="col-md-4">
                <input value="20181201" name="startDate" class="form-control input-md" readonly>
            </div>
        </div>
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

    $request = new VRecurringSalesRequest();
    $request->Version = $settings->Version;
    $request->Mode = $settings->Mode;

    $request->Customer = new Customer();
    $request->Customer->EmailAddress="eticaret@garanti.com.tr";
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
    $request->TotalPaymentNum="2";// tekrar sayısı girilir.
    $request->FrequencyInterval== "2"; // tekrar sıklığının girildiği alandır. Ör: 2 girilirse type W için iki haftada bir anlamına gelir.
    $request->FrequencyType== "D"; // tekrar tipi girilir. Günlük: D, Haftalık: W, Aylık: M, Yıllık: Y
    $request->Type== "D";// tekrarlı işlem tipi
    $request->StartDate== "20181201"; //YYYYMMGG
	$request->RecurringRetryAttemptCount== "10"; // red alan işlemin kaç gün tekrarlanacağı bilgisi
	$request->RetryAttemptEmail== "eticaret@garanti.com.tr"; // işlem durumunun gönderileceği adres
	
    $request->Number="1";
    $request->Amount="1200";

    $request->Number1="2";
    $request->Amount1="1200";

    $request->Hash=Helper::ComputeHash($request,$settings);
    $response = VRecurringSalesRequest::execute($request,$settings); //VRecurringSalesRequest servisi başlatılması için gerekli servis çağırısını temsil eder.
    print "<h3>Sonuç:</h3>";
	echo "<pre>";
    echo htmlspecialchars ($response);  
    echo "</pre>";
	?>

<?php endif; ?>	 

<?php include('footer.php');?>