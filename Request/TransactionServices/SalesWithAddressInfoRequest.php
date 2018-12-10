<?php
//Adres bilgileriyle satış işlemi Örnek sınıfı ve çağrısını temsil eder.
class SalesWithAddressInfoRequest extends VPOSRequest
{
    public $CurrencyCode;
    public $MotoInd;
    public $Hash;
    public $Type;
    public $Name;
    public $LastName;
    public $Company;
    public $Text;
    public $City;
    public $Country;
    public $PostalCode;
    public $PhoneNumber;

    public static function Execute(SalesWithAddressInfoRequest $request,Settings $settings)
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
          "       <OrderID>" .$this->Order->OrderID . "</OrderID>\n" .
          "       <Description/>" .
          "       <AddressList>\n" .
          "         <Address>\n" .
          "             <Type>" .$this->Type . "</Type>\n" .
          "             <Name>" .$this->Name . "</Name>\n" .
          "             <LastName>" .$this->LastName . "</LastName>\n" .
          "             <Company>" .$this->Company . "</Company>\n" .
          "             <Text>" .$this->Text . "</Text>\n" .
          "             <City>" .$this->City . "</City>\n" .
          "             <Country>" .$this->Country . "</Country>\n" .
          "             <PostalCode>" .$this->PostalCode . "</PostalCode>\n" .
          "             <PhoneNumber>" .$this->PhoneNumber . "</PhoneNumber>\n" .
          "         </Address>\n" .
          "       </AddressList>\n" .
          "    </Order>\n" .
          "    <Transaction>\n" .
          "         <Type>" .$this->Transaction->Type . "</Type>\n" .
          "         <Amount>" .$this->Transaction->Amount . "</Amount>\n" .
          "         <CurrencyCode>" .$this->CurrencyCode . "</CurrencyCode>\n" .
          "         <MotoInd>" .$this->MotoInd . "</MotoInd>\n" .
          "    </Transaction>\n" .
          "</GVPSRequest>";
           return $xml_data;
      }  
}
