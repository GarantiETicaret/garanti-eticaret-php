<?php
//Adres bilgileriyle satış işlemi Örnek sınıfı ve çağrısını temsil eder.
class SalesWithProductInfoRequest extends VPOSRequest
{
    public $CurrencyCode;
    public $MotoInd;
    public $Hash;
    public $Number;
    public $ProductID;
    public $ProductCode;
    public $Quantity;
    public $Price;
    public $TotalAmount;
    public $Description;

    public static function Execute(SalesWithProductInfoRequest $request,Settings $settings)
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
          "       <ItemList>\n" .
          "         <Item>\n" .
          "             <Number>" .$this->Number . "</Number>\n" .
          "             <ProductID>" .$this->ProductID . "</ProductID>\n" .
          "             <ProductCode>" .$this->ProductCode . "</ProductCode>\n" .
          "             <Quantity>" .$this->Quantity . "</Quantity>\n" .
          "             <Price>" .$this->Price . "</Price>\n" .
          "             <TotalAmount>" .$this->TotalAmount . "</TotalAmount>\n" .
          "             <Description>" .$this->Description . "</Description>\n" .
          "         </Item>\n" .
          "       </ItemList>\n" .
          "    </Order>\n" .
          "    <Transaction p2:type=\"BINInqTransactionRequest\" xmlns:p2=\"http://www.w3.org/2001/XMLSchema-instance\">\n" .
          "         <Type>" .$this->Transaction->Type . "</Type>\n" .
          "         <Amount>" .$this->Transaction->Amount . "</Amount>\n" .
          "         <CurrencyCode>" .$this->CurrencyCode . "</CurrencyCode>\n" .
          "         <MotoInd>" .$this->MotoInd . "</MotoInd>\n" .
          "    </Transaction>\n" .
          "</GVPSRequest>";
           return $xml_data;
      }  
}
