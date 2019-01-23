<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class ReadersController extends Controller
{
    private $publisher;

    public function __construct(Request $request)
    {
        if(!$request->publisherKey || !$request->publisherSecret){
            abort(403, 'Missing credentials - Publisher Key AND Publisher Secret must both be specified');
        }

        $this->publisher = new Publisher($request->publisherKey, $request->publisherSecret, [ 'debug' => true ]);
    }

    public function getReader($id){

        $results = $this->publisher->getReader($id);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

    public function getReaders(Request $request){

        $results = $this->publisher->getReaders([
            'emailAddress' =>  $request->get('emailAddress'),
            'username'     =>  $request->get('username'),
            'firstName'    =>  $request->get('firstName'),
            'lastName'     =>  $request->get('lastName'),
            'nodeId'       =>  $request->get('nodeId'),
            'subscription' =>  $request->get('subscription'),
        ]);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

    public function createReader(Request $request){

        $results = $this->publisher->createReader([
            'username'      => $request->username,
            'emailAddress'  => $request->emailAddress,
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'password'      => $request->password,
        ]);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

    public function updateReader(Request $request, $readerId){

        $results = $this->publisher->updateReader($readerId , [
            'username'      => $request->username,
            'emailAddress'  => $request->emailAddress,
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'password'      => $request->password,
        ]);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

    public function deleteReader($readerId){

        $results = $this->publisher->deleteReader($readerId);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }
}
