<?php

namespace App\Http\Controllers;


use Omnipay\Omnipay;
use Illuminate\Http\Request;
use Omnipay\Common\CreditCard;


class retpaypal extends Controller
{
     protected $gateway;
            function __construct()
            {
                $this->gateway =  Omnipay::create('PayPal_Rest');
                $this->gateway->initialize(array(
                    'clientId' => 'AXHinUOV5ySvUT94SR45MOigNWWc-oV6ozDyCkkT73vheV3aug0H8vpbjMYzXFvAJBKsJaD4ClZjsGAX',
                    'secret'   => 'EAzYO98H1uy34HruyUpgVYNyIumQkFDOJsbpTYuKH5WuhMWpJT12D_pD8FkY_crrZtLKIWU_Zx9QysZf',
                    'testMode' => true, // Or false when you are ready for live transactions
                ));
            }
            public function createpayment()
            {
                return view('paypalcard.paymenform');
            }
            public function pay(Request $request)
            {
                
                $request->validate([
                        'first_name' => 'required',
                        'last_name'  => 'required',
                        'card'       => 'required',
                        'cvc'        => 'required',
                        'exp_month'  => 'required',
                        'exp_year'   => 'required',
                        'amount'     => 'required'

                ]);
                try{
                $card = new CreditCard(array(
                    'firstName' => $request['first_name'],
                    'lastName' => $request['last_name'],
                    'number' => $request['card'],
                    'expiryMonth'           => $request['exp_month'],
                    'expiryYear'            => $request['exp_year'],
                    'cvv'                   => $request['cvc'],
                    //'billingAddress1'       => '1 Main St, San Jose, CA 95131',
                    //'billingCountry'        => 'US',
                    //'billingCity'           => 'CA',
                   // 'billingPostcode'       => '95131',
                   // 'billingState'          => 'AL',
                ));
                $transaction = $this->gateway->purchase(array(
                    'amount'        => number_format($request['amount'],2,'.',''),
                    'currency'      => 'USD',
                    'description'   => 'This is a test purchase transaction.',
                    'card'          => $card,
                ));
                $response = $transaction->send();
               // dd($response);
               // dd($response);
                if ($response->isSuccessful()) {
                  // echo "Purchase transaction was successful!\n";
                   $sale_id = $response->getTransactionReference();
                  // echo "Transaction reference = " . $sale_id . "\n";
                 return redirect()->back()->with(["message"=>"Purchase transaction was successful!\n Transaction reference =  $sale_id"]);
                }
               else
                {
                  
                    $messageerr= $response->getData();
                    return redirect()->back()->withErrors(["eror"=>  $messageerr["name"].":". $messageerr["message"]]);
                } 
            }
                catch(\Exception $e)
                {
                    return redirect()->back()->withErrors(["eror"=> $e->getMessage() ])->withInput();
                }
            }
}
