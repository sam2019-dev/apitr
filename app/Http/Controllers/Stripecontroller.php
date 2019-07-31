<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;

class Stripecontroller extends Controller
{
    public function paymentform()
    {
       return view('stripe.paymenform');
    }
    public function makepayment(Request $request)
    {
        //dd($request->all());
        $token = $request->input('stripeToken');
        //dd($request->all());
        $customer = customer::create([
            'email' => 'test10@test.com',
            'first_name' => 'test',
            'last_name' => 'test',
        ]);
        
        $customer->newSubscription('main', 'plan_CfR7mN5MuHNlUV')->trialDays(60)->withMetadata(['wt_id' => '123456789',
        'email' => $customer->email,'first_name' => $customer->first_name,'last_name'=> $customer->last_name,])->create($token,['email'=>$customer->email]);
    }
}
