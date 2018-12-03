<?php
ini_set('display_errors',on); 
error_reporting(-1);

include ("Settings3D.php");
include ("Settings.php");
include ("restHttpCaller.php");
include ('Helper.php');
include ('VPOSRequest.php');
include ('Request/BINInqRequest.php');
include ('Request/SalesRequest.php');
include ('Request/BatchInqRequest.php');
include ('Request/DccInquiryRequest.php');
include ('Request/RewardInquiryRequest.php');
include ('Request/ExtendedCreditInquiryRequest.php');
include ('Request/CommercialCardLimitInqRequest.php');
include ('Request/UtilityPaymentInqRequest.php');
include ('Request/GsmUnitInqRequest.php');
include ('Request/OrderInqRequest.php');
include ('Request/OrderHistoryInqRequest.php');
include ('Request/IdentityInqRequest.php');
include ('Request/OrderListInqRequest.php');
include ('Request/CardtxnListInqRequest.php');
include ('Request/OrderItemInqRequest.php');
include ('Request/SettlementInqRequest.php');
include ('Request/TransactionServices/SalesWithProductInfoRequest.php');
include ('Request/TransactionServices/SalesWithAddressInfoRequest.php');
include ('Request/TransactionServices/InstallmentSalesRequest.php');
include ('Request/TransactionServices/VoidRequest.php');
include ('Request/TransactionServices/RefundRequest.php');
include ('Request/TransactionServices/DelaySalesRequest.php');
include ('Request/TransactionServices/DownPaymentSalesRequest.php');
include ('Request/TransactionServices/RewardSalesRequest.php');
include ('Request/TransactionServices/FirmRewardSalesRequest.php');
include ('Request/TransactionServices/PlayerChequeSalesRequest.php');
include ('Request/TransactionServices/ProductChequeRequest.php');
include ('Request/TransactionServices/PreauthRequest.php');
include ('Request/TransactionServices/PostauthRequest.php');
include ('Request/TransactionServices/ExtentedCreditSalesRequest.php');
include ('Request/TransactionServices/DCCSalesRequest.php');
include ('Request/TransactionServices/ExtrePreauthRequest.php');
include ('Request/TransactionServices/ExtrePostauthRequest.php');
include ('Request/TransactionServices/FirmCardRelRequest.php');
include ('Request/TransactionServices/FirmCardSalesRequest.php');
include ('Request/TransactionServices/FirmCardPreauthRequest.php');
include ('Request/TransactionServices/CommercialCardExtendedCreditRequest.php');
include ('Request/TransactionServices/CommercialCardPreauthRequest.php');
include ('Request/TransactionServices/SMSPreauthRequest.php');
include ('Request/TransactionServices/SMSPostauthRequest.php');
include ('Request/TransactionServices/RecurringSalesRequest.php');
include ('Request/TransactionServices/VRecurringSalesRequest.php');
include ('Request/TransactionServices/RecurringVoidRequest.php');
include ('Request/TransactionServices/RecurringUpdateRequest.php');
include ('Request/TransactionServices/UtilityPaymentRequest.php');
include ('Request/TransactionServices/GsmUnitSalesRequest.php');
include ('Request/TransactionServices/SalesWithCommentInfoRequest.php');
include ('Request/Sale3DSecureRequest.php');
include ('Secure3DResponse.php');
include ('Request/Secure3DSuccessRequest.php');
include ('NameValueCollection.php');
include ('Request/Sale3DOOSPayRequest.php');
include ('Request/Sale3DPayRequest.php');
include ('Request/SaleOOSPayRequest.php');
include ('Request/GarantiPayRequest.php');
include ('Request/GarantiPayMORequest.php');
include ('Request/GarantiPayAppRequest.php');
include ('Request/GarantiPayVoidRequest.php');



?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garanti Developer Portal</title>
    <link href="/Assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
    <!-- Our Custom CSS -->
    <link href="/Assets/css/style.css" rel="stylesheet" />
    <link rel="icon" href="~/favicon.ico">
    <!-- Scrollbar Custom CSS -->
</head>
<body>
    <div class="wrapper">
    <nav id="sidebar">
    <div class="sidebar-header">
        <a href="/"><img src="/Assets/img/logo.png" width="165" height="90" /></a>
        
    </div>
    <ul class="list-unstyled components">
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">İşlem Servisleri</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">

                <li><a href="index.php">Satış (Sales)</a></li>
                <li><a href="SalesWithProductInfo.php">Ürün Bilgisi ile Satış İşlemi</a></li>
                <li><a href="SalesWithAddressInfo.php">Adres Bilgisi ile Satış İşlemi</a></li>
				<li><a href="SalesWithCommentInfo.php">Özel Alan Bilgisi ile Satış İşlemi</a></li>
                <li><a href="InstallmentSales.php">Taksitli Satış</a></li>
                <li><a href="Void.php">İptal (Void)</a></li>
                <li><a href="Refund.php">İade (Refund)</a></li>
                <li><a href="DelaySales.php">Ötemeli Satış</a></li>
                
                <li><a href="DownPaymentSales.php">Peşinatlı Satış</a></li>
                <li><a href="RewardSales.php">Bonus Kullanım</a></li>
                <li><a href="FirmRewardSales.php">Firma Bonus</a></li>
                <li><a href="PlayerChequeSales.php">Player Çek</a></li>
                <li><a href="ProductCheque.php">Sözünüze Ürün Çek</a></li>
                <li><a href="Preauth.php">Ön Otorizasyon (preauth)</a></li>
                <li><a href="Postauth.php">Ön Otorizasyon Kapama (postauth)</a></li>
                <li><a href="ExtentedCreditSales.php">Tüketici Kredisi (extentedcredit)</a></li>
                <li><a href="DCCSales.php">DCC Satış (DCC)</a></li>

                <li><a href="ExtrePreauth.php">Ekstre Doğrulama/Ön Otorizasyon</a></li>
                <li><a href="ExtrePostauth.php">Ekstre Doğrulama/Otorizasyon Kapama</a></li>

                <li><a href="FirmCardRel.php">Firma Kart Eşleştirme (firmcardrel)</a></li>
                <li><a href="FirmCardSales.php">Firma Kart İle Satış (firmcardsales)</a></li>
                <li><a href="FirmCardPreauth.php">Firma Ön otorizasyon (firmcardpreauth)</a></li>

                <li><a href="CommercialCardExtendedCredit.php">Ortak Kart Satış (commercialcardextendedcredit)</a></li>
                <li><a href="CommercialCardPreauth.php">Ortak Kart Ön Otorizasyon (commercialcardpreauth)</a></li>
                <li><a href="SMSPreauth.php">Sms Doğrulama/Ön Otorizasyon</a></li>
                <li><a href="SMSPostauth.php">Sms Doğrulama/Otorizasyon Kapama</a></li>

                <li><a href="RecurringSales.php">Sabit Tekrarlayan Satış</a></li>
                <li><a href="VRecurringSales.php">Değişken Tekrarlayan Satış</a></li>

                <li><a href="RecurringVoid.php">Tekrarlayan İptal</a></li>

                <li><a href="RecurringUpdate.php">Tekrarlayan Update</a></li>

                <li><a href="UtilityPayment.php">Fatura Ödeme (utilitypayment)</a></li>
                <li><a href="GsmUnitSales.php">GSM TL Yükleme (gsmunitsales)</a></li>


            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Host Sorgu Servisleri</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">

                <li><a href="RewardInquiry.php">Bonus Sorgulama</a></li>
                <li><a href="ExtendedCreditInquiry.php">Tüketici Kredisi Sorgulama</a></li>
                <li><a href="CommercialCardLimitInq.php">Ortak Kart Limit Sorgulama</a></li>
                <li><a href="DccInquiry.php">DCC Doğrulama</a></li>
                <li><a href="UtilityPaymentInq.php">Fatura Sorgu</a></li>
                <li><a href="GsmUnitInq.php">GSM TL Sorgu</a></li>
                <!-- <li><a href="BonusPayInq.php">BonusPay Bonus Sorgu</a></li> -->
                <li><a href="IdentityInq.php">TCKN Doğrulama</a></li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false">Sanal POS Sorgulamaları</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">

                <li><a href="OrderInq.php">Sipariş Sorgu</a></li>
                <li><a href="OrderHistoryInq.php">Sipariş Detay Sorgu</a></li>
                <li><a href="OrderListInq.php">Tarih Aralığı İşlem Sorgu</a></li>
                <li><a href="BatchInq.php">Batch Sorgulama</a></li>
                <li><a href="BINInq.php">BIN Sorgulama</a></li>
                <li><a href="OrderItemInq.php">Ürün Sorgulama</a></li>
                <li><a href="CardtxnListInq.php">KartNo ile İşlem Sorgulama</a></li>
                <li><a href="SettlementInq.php">Gün Sonu Sorgulama (settlementinq)</a></li>
               <!--  <li><a href="@Url.Action("Index","Home")">BonusPay İşlem Sorgu</a></li>-->
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">3D Secure İşlemler</a>
            <ul class="collapse list-unstyled" id="pageSubmenu3">
                <li><a href="Sale3DSecure.php">3D Secure İşlem</a></li>
				<li><a href="Sale3DOOSPay.php">3D OOS Ödeme</a></li>
				<li><a href="Sale3DPay.php">3D Pay Ödeme</a></li>
				<li><a href="SaleOOSPay.php">OOS Pay Ödeme</a></li>
				<li><a href="GarantiPay.php">Garanti Pay Ödeme</a></li>
				<li><a href="GarantiPayMO.php">Garanti Pay Mail Order İle Ödeme</a></li>
				<li><a href="GarantiPayVoid.php">Garanti Pay İptal İşlemi</a></li>
				<li><a href="GarantiPayApp.php">Garanti Pay App İle Ödeme</a></li>
            </ul>
        </li>
        <li>
       
      
        
    </ul>  
</nav>
<div id="content">
            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="glyphicon glyphicon-align-left"></i>
                        </button>
                    </div>
                </div>
            </nav>