<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class EditionsController extends Controller
{
    private $publisher;

    public function __construct(Request $request)
    {
        if(!$request->publisherKey || !$request->publisherSecret){
            abort(403, 'Missing credentials - Publisher Key AND Publisher Secret must both be specified');
        }

        $this->publisher = new Publisher($request->publisherKey, $request->publisherSecret, [ 'debug' => true ]);
    }

    public function getEditions(Request $request){

        $results = $this->publisher->getEditions([
            'id'            => $request->get('editionId'),
            'name'          => $request->get('name'),
            'publishedDate' => $request->get('publishedDate'),
        ]);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

}
