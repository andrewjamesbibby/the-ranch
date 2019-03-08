<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class EditionsController extends Controller
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

    public function getEditions(Request $request){

        $results = $this->publisher->getEditions($request->all());

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function getEdition($editionId) {

        $results = $this->publisher->getEdition($editionId);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

}
