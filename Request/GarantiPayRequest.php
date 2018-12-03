
<?php

class GarantiPayRequest extends VPOSRequest
{
    public $mode;
    public $apiversion;
    public $terminalprovuserid;
    public $terminaluserid;
    public $terminalmerchantid;
    public $terminalid;
    public $errorurl;
    public $secure3dsecuritylevel;
    public $successurl;
    public $secure3dhash;
    public $orderid;
    public $txnamount;
    public $txntype;
	public $txnsubtype;
    public $companyname;
    public $bnsuseflag;
    public $fbbuseflag;
    public $chequeuseflag;
    public $garantipay;
    public $totallinstallmentcount;
    public $installmentnumber1;
    public $installmentamount1;
    public $installmentnumber2;
    public $installmentamount2;
    public $txntimeoutperiod;
    public $txncurrencycode;
    public $customeremailaddress;
    public $customeripaddress;
    public $storekey;
    public $txntimestamp;
    public $lang;
    public $refreshtime;
    public $installmentratewithreward1;
    public $installmentratewithreward2;
    public $txninstallmentcount;
    
   
		
    public static function Execute(GarantiPayRequest $request,Settings3D $settings3D)
    {
      
	  $Data=new NameValueCollection();
	  
	  $Data->Add("mode",$request->mode);
	  $Data->Add("secure3dsecuritylevel",$request->secure3dsecuritylevel);
	  $Data->Add("apiversion",$request->apiversion);
	  $Data->Add("terminalprovuserid",$request->terminalprovuserid);
	  $Data->Add("terminaluserid",$request->terminaluserid);
	  $Data->Add("terminalmerchantid",$request->terminalmerchantid);
	  $Data->Add("terminalid",$request->terminalid);
	  $Data->Add("txntype",$request->txntype);
	  $Data->Add("txnamount",$request->txnamount);
	  $Data->Add("txncurrencycode",$request->txncurrencycode);
	  $Data->Add("txninstallmentcount",$request->txninstallmentcount);
	  $Data->Add("orderid",$request->orderid);
	  $Data->Add("successurl",$request->successurl);
	  $Data->Add("errorurl",$request->errorurl);
	  $Data->Add("customeremailaddress",$request->customeremailaddress );
	  $Data->Add("customeripaddress",$request->customeripaddress);
	  $Data->Add("secure3dhash",$request->secure3dhash);
	  $Data->Add("txntimestamp",$request->txntimestamp);
	  $Data->Add("installmentratewithreward1", $request->installmentratewithreward1);
	  $Data->Add("installmentratewithreward2",$request->installmentratewithreward2);
	  $Data->Add("totallinstallmentcount", $request->totallinstallmentcount);
	  $Data->Add("installmentnumber1",$request->installmentnumber1);
	  $Data->Add("installmentnumber2",$request->installmentnumber2);
	  $Data->Add("installmentamount1", $request->installmentamount1);
	  $Data->Add("installmentamount2",$request->installmentamount2);
	  $Data->Add("bnsuseflag",$request->bnsuseflag);
	  $Data->Add("fbbuseflag",$request->fbbuseflag);
	  $Data->Add("chequeuseflag",$request->chequeuseflag);
	  $Data->Add("garantipay",$request->garantipay);
	  $Data->Add("refreshtime",$request->refreshtime);
	  $Data->Add("txnsubtype",$request->txnsubtype);
	  $Data->Add("companyname",$request->companyname);
	  $Data->Add("txntimeoutperiod",$request->txntimeoutperiod );
	  $Data->Add("storekey",$request->storekey);
	  
	  
        return  $request->PreparePostForm ( $settings3D->BaseUrl, $Data );
    }
	
	public static function Compute3DHash(GarantiPayRequest $request,Settings3D $settings3D)
    {
        $SecurityData = strtoupper(sha1($settings3D->Password . str_pad($request->terminalid, 9, '0', STR_PAD_LEFT)));
        $HashData = strtoupper(sha1($request->terminalid . $request->orderid . $request->txnamount . $request->successurl . $request->errorurl . $request->txntype .$request->txninstallmentcount .$request->storekey .$SecurityData));
        return $HashData;
    }
	
	
	
	
	
	
	
	public static function PreparePostForm($url,NameValueCollection $data)
    {
		
        $formName="PostForm";
		$formID ="<form id=\"" . $formName . "\" name=\"" . $formName . "\" action=\"" . $url . "\" method=\"POST\">";
		foreach ($data->AllKeys()  as $key)
            {
                $formID .="<input type=\"hidden\" name=\"" . $key .
                               "\" value=\"" . $data->Get($key) . "\">";
           
			}
			$formID .="</form>";
			$strScript ="<script language=\"javascript\">";
		$strScript .="var v" . $formName . " = document." . $formName . ";";
		$strScript .="v" . $formName . ".submit();"; 
		$strScript .="</script>";
		$form=$formID .	$strScript ;
		return $form;
							 
    }
	
	
	
	
     
	
}
