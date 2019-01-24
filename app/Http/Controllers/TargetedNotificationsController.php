<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class TargetedNotificationsController extends Controller
{
    private $publisher;

    public function __construct(Request $request)
    {
        if(!$request->publisherKey || !$request->publisherSecret){
            abort(403, 'Missing credentials - Publisher Key AND Publisher Secret must both be specified');
        }

        $this->publisher = new Publisher($request->publisherKey, $request->publisherSecret, [ 'debug' => true ]);
    }


    public function send(Request $request){

        $results = $this->publisher->sendTargetedNotification(
            $request->nodeId,
            $request->title,
            $request->message,
            $request->publisherSubscribers,
            $request->thirdPartySubscribers,
            $request->priority
        );

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }
}
