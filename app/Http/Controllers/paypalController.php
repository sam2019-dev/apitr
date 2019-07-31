<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Omnipay\Omnipay;
use Illuminate\Http\Request;
use App\paypalcustomer;
use App\custrn;

class paypalController extends Controller
{
    protected $gateway;

    function __construct()
    {
       
        $this->gateway =  Omnipay::create('PayPal_Pro');
       // dd($this->gateway->getDefaultParameters());  
        $this->gateway->setUsername(config('services.paypal.username'));
        $this->gateway->setPassword(config('services.paypal.password'));
        $this->gateway->setSignature(config('services.paypal.signature'));
        $this->gateway->setTestMode(config('services.paypal.sandbox'));
       
    }
    public function createpayment()
    {
        return view('paypal.paymenform');
    }
    public   function makepayment()
    {
        
       // $this->gateway->setParameter('custom','123456');
        $paypalcustomer = paypalcustomer::create(['email'=>'test@test.com','first_name'=>'test','last_name'=>'test']);
        $pur = $this->gateway->purchase([
            'amount' => 30.00,
            'transactionId' => Carbon::now()->timestamp ,
            'currency' => 'USD',
            'cancelUrl' => url('/cancelpaypal'),
            'returnUrl' => url('/successpaypal'),
            'notifyUrl' => url('/notify'),
            'custom' => '1234'
        ]);
        $data = $pur->getData();
        $data['custom'] = '123';
        $response = $pur->sendData($data);
        $resposearr= $response->getData();
        //dd($resposearr);
        $payer_id = $resposearr["TOKEN"];
        $cust_id = $paypalcustomer->id;
        $ammount = 30.00;
        $transaction_id = Carbon::now()->timestamp;
        custrn::create(["customer_id"=>$cust_id,"transaction_id"=>$transaction_id,"ammount"=>$ammount,'payer_id'=>$payer_id]);
        if($response->isRedirect())
        {
            $response->redirect();
        }
    }
    public function paymentstat(Request $request)
    {
       // dd($request->all());
       $parameters =[ 'amount' => 30,
       'transactionId' => $request['payerId'],
       'currency' => 'USD',
       'cancelUrl' =>  url('/cancelpaypal'),
       'returnUrl' => url('/successpaypal'),
       'notifyUrl' => url('/notify'),
    ];
    $this->gateway->setParameter('custom','123456');
       $response = $this->gateway
            ->completePurchase($parameters)
            ->send();
            //dd($response);
           if($response->isSuccessful())
           {
               $ppresponse = $response->getData();
               $token = $ppresponse["TOKEN"];
               custrn::where('payer_id', $token)->update(['gateway_transaction_id' => $ppresponse['PAYMENTINFO_0_TRANSACTIONID'],'status'=>'A']);
               dd($ppresponse);
            }

    }
    
    public function notify()
    {

    }
    public function cancelpaypal()
    {
    }
}
