<?php



class BatchInqRequest extends VPOSRequest
{
    public $CurrencyCode;
    public $Type;
    public $Hash;
    public $BatchNum;
    public $ListPageNum;

    public static function Execute(BatchInqRequest $request,Settings $settings)
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
        "       <Number />".
        "       <ExpireDate/>" .
        "       <CVV2/>" .
        "    </Card>\n" .
        "    <Order>\n" .
        "       <OrderID />".
        "       <Description/>" .
        "       <ListPageNum>" .$this->ListPageNum . "</ListPageNum>\n" .
        "    </Order>\n" .
        "    <Transaction>\n" .
        "         <Type>" .$this->Transaction->Type . "</Type>\n" .
        "         <Amount>" .$this->Transaction->Amount . "</Amount>\n" .
        "         <CurrencyCode>" .$this->CurrencyCode . "</CurrencyCode>\n" .
        "         <BatchNum>" .$this->BatchNum . "</BatchNum>\n" .
        "    </Transaction>\n" .
        "</GVPSRequest>";
         return $xml_data;
    }
}