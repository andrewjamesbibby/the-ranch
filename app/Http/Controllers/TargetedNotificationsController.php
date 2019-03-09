<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class TargetedNotificationsController extends Controller
{
    private $publisher;

    public function __construct(Request $request)
    {
        $key = $request->headers->get('Publisher-Key');
        $secret = $request->headers->get('Publisher-Secret');

        if(! $key || ! $secret){
            abort(403, 'Missing credentials - Publisher Key AND Publisher Secret must both be specified');
        }

        $this->publisher = new Publisher($key, $secret, [ 'debug' => true ]);
    }

    public function send(Request $request){

        $results = $this->publisher->sendTargetedNotification(
            $request->get('nodeId'),
            $request->get('title'),
            $request->get('message'),
            $request->get('publisherSubscribers'),
            $request->get('thirdPartySubscribers'),
            $request->get('priority')
        );

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }
}
