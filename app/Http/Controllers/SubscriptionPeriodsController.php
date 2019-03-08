<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class SubscriptionPeriodsController extends Controller
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

    public function getSubscriptionPeriods(Request $request)
    {
        $results = $this->publisher->getSubscriptionPeriods($request->all());

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function getSubscriptionPeriod(Request $request)
    {
        $results = $this->publisher->getSubscriptionPeriod($request->id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function createSubscriptionPeriod(Request $request){
        logger($request->all());
        $results = $this->publisher->createSubscriptionPeriod($request->all());

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function updateSubscriptionPeriod(Request $request, $subscription_period_id){

        $results = $this->publisher->updateSubscriptionPeriod($subscription_period_id, $request->all());

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function deleteSubscriptionPeriod($subscription_period_id){

        $results = $this->publisher->delete($subscription_period_id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }
}
