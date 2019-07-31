<?php
namespace App\Http\Controllers;

use Omnipay\Omnipay;
use Illuminate\Http\Request;
use Omnipay\Common\CreditCard;

class pappalpro extends Controller
{
    function __construct()
    {
        
        $this->gateway =  Omnipay::create('PayPal_Express');
       // dd($this->gateway->getDefaultParameters());  
        $this->gateway->setUsername(config('services.paypalpro.username'));
        $this->gateway->setPassword(config('services.paypalpro.password'));
        $this->gateway->setSignature(config('services.paypalpro.signature'));
        $this->gateway->setTestMode(config('services.paypalpro.sandbox'));
       
    }
    public function createpayment()
    {
        return view('paypalpro.paymenform');
    }
    public function pay(Request $request)
    {
        $formData = [
            'number' => '4694414469680157',
            'expiryMonth' => '08',
            'expiryYear' => '2024',
            'cvv' => '123'
        ];
        $card = new CreditCard($formData);
        try{
            $response = $this->gateway->purchase(
                [
                    'amount' => '10.00',
                    'currency' => 'USD',
                    'card' => $card ,
                    'returnUrl' =>url('/paypalreturn'),
                    'cancelUrl' =>url('/cancelpaypal'),
                ]
            )->send(); 
             if($response->isRedirect())
             {
                 $response->redirect();
             }
             else
             {
                 dd($response);
             }
            
            }
            catch(\Exception $e)
            {
              echo $e->getMessage();
            }       
    }
    public function cardsuccess(Request $request)
    {
        /// dd($request->all());
        $formData = [
            'number' => '4242424242424242',
            'expiryMonth' => '3',
            'expiryYear' => '2020',
            'cvv' => '123'
        ];
        $card = new CreditCard($formData);
         $parameters =[ 'amount' => '10.00',
         'transactionId' => $request['payerId'],
         'currency' => 'USD',
         'card'     => $card,
         'cancelUrl' =>  url('/cancelpaypal'),
         'returnUrl' => url('/successpaypal'),
         'notifyUrl' => url('/notify'),
      ];
         
          $response = $this->gateway
              ->completePurchase($parameters)
              ->send();
              //dd($response);
             if($response->isSuccessful())
             {
                 $ppresponse = $response->getData();
                 $token = $ppresponse["TOKEN"];
               //  custrn::where('payer_id', $token)->update(['gateway_transaction_id' => $ppresponse['PAYMENTINFO_0_TRANSACTIONID'],'status'=>'A']);
                 dd($ppresponse);
              }
    }
}
