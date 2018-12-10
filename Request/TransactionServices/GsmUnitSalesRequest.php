<?php

//GSM TL Sorgulama Çağrısının yapıldığı sınıfı temsil etmektedir.
class GsmUnitSalesRequest extends VPOSRequest
{
    public $CurrencyCode;
    public $MotoInd;
    public $Hash;
    public $SubscriberCode;
    public $InstitutionCode;
    public $UnitID;
    public $Quantity;

    public static function Execute(GsmUnitSalesRequest $request,Settings $settings)
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
          "       <EmailAddress>" .$this->Customer->EmailAddress . "</EmailAddress>\n" .
          "    </Customer>\n" .
          "    <Card>\n" .
          "       <Number>" .$this->Card->Number . "</Number>\n" .
          "       <ExpireDate>" .$this->Card->ExpireDate . "</ExpireDate>\n" .
          "       <CVV2>" .$this->Card->CVV2 . "</CVV2>\n" .
          "    </Card>\n" .
          "    <Order>\n" .
          "       <OrderID/>\n" .
          "       <Description/>" .
          "    </Order>\n" .
          "    <Transaction>\n" .
          "         <Type>" .$this->Transaction->Type . "</Type>\n" .
          "         <Amount>" .$this->Transaction->Amount . "</Amount>\n" .
          "         <CurrencyCode>" .$this->CurrencyCode . "</CurrencyCode>\n" .
          "         <MotoInd>" .$this->MotoInd . "</MotoInd>\n" .
          "        <GSMUnitSales>\n" .
          "             <InstitutionCode>" .$this->InstitutionCode . "</InstitutionCode>\n" .
          "             <SubscriberCode>" .$this->SubscriberCode . "</SubscriberCode>\n" .
          "             <UnitID>" .$this->UnitID . "</UnitID>\n" .
          "             <Quantity>" .$this->Quantity . "</Quantity>\n" .
          "             <Amount>" .$this->Amount . "</Amount>\n" .
          "        </GSMUnitSales>\n" .
          "    </Transaction>\n" .
          "</GVPSRequest>";
           return $xml_data;
      }  
}
