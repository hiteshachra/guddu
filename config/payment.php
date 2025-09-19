<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Payment Connection Name
    |--------------------------------------------------------------------------
    |
    |
    */



    'razorpay' => [
            'razorpay_key' => env('RAZORPAY_KEY', 'rzp_test_4ru2ls8U6gPAEV'), //Key Id 
            'razorpay_secret' => env('RAZORPAY_SECRET', 'SGEwVtHJZIDqPbXxMQESA7As'), //Key Secret
            'merchant_id' => env('MERCHANT_ID', 'HQqD7PZEgoEBuJ'), //Merchant id
    ],
    


];
