<?php

class GarantiPayMORequest extends VPOSRequest
{
    public $Installmentamount;
	public $Installmentamount1;
    public $Installmentnumber;
	public $Installmentnumber1;
    public $TotalInstallmentCount;
	public $InstallmentOnlyForCommercialCard;
	public $GSMNumber;
	public $TCKN;
	public $ReturnUrl;
	public $NotifSendInd;
	public $TxnTimeOutPeriod;
	public $OrderInfo;
	public $CompanyName;
	public $mileuseflag;
	public $chequeuseflag;
    public $fbbuseflag;
    public $bnsuseflag;
	public $SubType;
	public $CardholderPresentCode;
	public $ReturnServerUrl;
	public $MotoInd;
	public $CurrencyCode;
	
	
	public static function Execute(GarantiPayMORequest $request,Settings $settings)
    {
      
        return  restHttpCaller::post($settings->BaseUrl, $request->toXmlString());
    }
      //Post edilmesi istenen xml metni oluşturulup bu xml metni belirtilen adrese post edilir.
      public function toXmlString()
      {
         
          $xml_data =
          "<GVPSRequest>\n" .
          "    <Mode>" . $this->Mode . "</Mode>\n" .
          "    <Version>" . $this->Version . "</Version>\n" .
          "    <Terminal>\n" .
          "       <ProvUserID>" .$this->Terminal->ProvUserID . "</ProvUserID>\n" .
          "       <HashData>" .$this->Hash. "</HashData>\n" .
          "       <UserID>" .$this->Terminal->UserID . "</UserID>\n" .
          "       <ID>" .$this->Terminal->ID . "</ID>\n" .
          "       <MerchantID>" .$this->Terminal->MerchantID . "</MerchantID>\n" .
          "    </Terminal>\n" .
          "    <Customer>\n" .
          "       <IPAddress>" .$this->Customer->IPAddress . "</IPAddress>\n" .
          "       <EmailAddr>" .$this->Customer->EmailAddr . "</EmailAddr>\n" .
          "    </Customer>\n" .
          "    <Card>\n" .
          "       <Number>" .$this->Card->Number . "</Number>\n" .
          "       <ExpireDate>" .$this->Card->ExpireDate . "</ExpireDate>\n" .
          "       <CVV2>" .$this->Card->CVV2 . "</CVV2>\n" .
          "    </Card>\n" .
          "    <Order>\n" .
          "       <OrderID>" .$this->Order->OrderID . "</OrderID>\n" .
          "       <Description/>" .
		  "       <GroupID/>" .
          "    </Order>\n" .
          "    <Transaction>\n" .
          "         <Type>" .$this->Transaction->Type . "</Type>\n" .
          "         <Amount>" .$this->Transaction->Amount . "</Amount>\n" .
          "         <CurrencyCode>" .$this->CurrencyCode . "</CurrencyCode>\n" .
          "         <CardholderPresentCode>" .$this->CardholderPresentCode . "</CardholderPresentCode>\n" .
		  "         <MotoInd>" .$this->MotoInd . "</MotoInd>\n" .
		  "         <SubType>" .$this->SubType . "</SubType>\n" .
		  "         <ReturnServerUrl>" .$this->ReturnServerUrl . "</ReturnServerUrl>\n" .
		  "    	 <GarantiPaY>\n" .
		  "          <bnsuseflag>" .$this->bnsuseflag . "</bnsuseflag>\n" .
		  "          <fbbuseflag>" .$this->fbbuseflag . "</fbbuseflag>\n" .
		  "          <chequeuseflag>" .$this->chequeuseflag . "</chequeuseflag>\n" .
		  "          <mileuseflag>" .$this->mileuseflag . "</mileuseflag>\n" .
		  "          <CompanyName>" .$this->CompanyName . "</CompanyName>\n" .
		  "          <OrderInfo>" .$this->OrderInfo . "</OrderInfo>\n" .
		  "          <TxnTimeOutPeriod>" .$this->TxnTimeOutPeriod . "</TxnTimeOutPeriod>\n" .
		  "          <NotifSendInd>" .$this->NotifSendInd . "</NotifSendInd>\n" .
		  "          <TCKN>" .$this->TCKN . "</TCKN>\n" .
		  "          <GSMNumber>" .$this->GSMNumber . "</GSMNumber>\n" .
		  "          <InstallmentOnlyForCommercialCard>" .$this->InstallmentOnlyForCommercialCard . "</InstallmentOnlyForCommercialCard>\n" .
		  "          <TotalInstallmentCount>" .$this->TotalInstallmentCount . "</TotalInstallmentCount>\n" .
		  "    	   <GPInstallments>\n" .
		  "             <Installment>\n" .
		  "          <Installmentnumber>" .$this->Installmentnumber . "</Installmentnumber>\n" .
		  "          <Installmentamount>" .$this->Installmentamount . "</Installmentamount>\n" .
		  "             </Installment>\n" .
		  "             <Installment>\n" .
		  "          <Installmentnumber>" .$this->Installmentnumber1 . "</Installmentnumber>\n" .
		  "          <Installmentamount>" .$this->Installmentamount1 . "</Installmentamount>\n" .
		  "             </Installment>\n" .
		  "    	   </GPInstallments>\n" .
		  "    	 </GarantiPaY>\n" .
          "    </Transaction>\n" .
          "</GVPSRequest>";
           return $xml_data;
      }  
}
