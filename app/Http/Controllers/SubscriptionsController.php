<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function __construct(Request $request)
    {
        $key = $request->headers->get('Publisher-Key');
        $secret = $request->headers->get('Publisher-Secret');

        if(! $key || ! $secret){
            abort(403, 'Missing credentials - Publisher Key AND Publisher Secret must both be specified');
        }

        $this->publisher = new Publisher($key, $secret, [ 'debug' => true ]);
    }

    public function getSubscription($subscription_id){

        $results = $this->publisher->getSubscription($subscription_id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function getSubscriptions(Request $request){

        $results = $this->publisher->getSubscriptions([
            'title'            => $request->title,
            'onDeviceTitle'    => $request->onDeviceTitle,
            'disabled'         => $request->disabled,
            'subscriptionType' => $request->subscriptionType,
            'node'             => $request->node,
            'reader'           => $request->reader,
            'edition'          => $request->edition,
        ]);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

}
