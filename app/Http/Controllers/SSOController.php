<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yudu\Publisher\Publisher;

class SSOController extends Controller
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

    public function createAnyToken(Request $request)
    {
        $results = $this->publisher->createToken($request->get('user'));

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function createPublicationToken(Request $request)
    {
        $results =  $this->publisher->createPublicationToken($request->get('user'), $request->get('publication'));

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function createEditionToken(Request $request)
    {
        $results =  $this->publisher->createEditionToken($request->get('user'), $request->get('edition'));

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

}
