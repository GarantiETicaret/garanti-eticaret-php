<?php



class BINInqRequest extends VPOSRequest
{
    public $CurrencyCode;
    public $MotoInd;
    public $Group;
    public $CardType;
    public $Type;
    public $hash;


    public static function Execute(BINInqRequest $request,Settings $settings)
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
        "       <HashData>" .$this->hash. "</HashData>\n" .
        "       <UserID>" .$this->Terminal->UserID . "</UserID>\n" .
        "       <ID>" .$this->Terminal->ID . "</ID>\n" .
        "       <MerchantID>" .$this->Terminal->MerchantID . "</MerchantID>\n" .
        "    </Terminal>\n" .
        "    <Customer>\n" .
        "       <IPAddress>" .$this->Customer->IPAddress . "</IPAddress>\n" .
        "       <EmailAddr>" .$this->Customer->EmailAddr . "</EmailAddr>\n" .
        "    </Customer>\n" .
        "    <Card>\n" .
        "       <Number />".
        "       <ExpireDate/>" .
        "       <CVV2/>" .
        "    </Card>\n" .
        "    <Order>\n" .
        "       <OrderID />".
        "       <Description/>" .
        "    </Order>\n" .
        "    <Transaction p2:type=\"BINInqTransactionRequest\" xmlns:p2=\"http://www.w3.org/2001/XMLSchema-instance\">\n" .
        "         <Type>" .$this->Transaction->Type . "</Type>\n" .
        "         <Amount>" .$this->Transaction->Amount . "</Amount>\n" .
        "         <CurrencyCode>" .$this->CurrencyCode . "</CurrencyCode>\n" .
        "         <BINInq>\n" .
        "               <Group>" .$this->Group. "</Group>\n" .
        "               <CardType>" .$this->CardType. "</CardType>\n" .
        "         </BINInq>\n" .
        "    </Transaction>\n" .
        "</GVPSRequest>";
         return $xml_data;
    }
}