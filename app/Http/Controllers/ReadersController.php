<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class ReadersController extends Controller
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

    public function getReader($id){

        $results = $this->publisher->getReader($id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
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
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
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
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function updateReader(Request $request, $readerId){

        $fields = [];

        if($request->username){
            $fields['username'] = $request->username;
        }
        if($request->emailAddress){
            $fields['emailAddress'] = $request->emailAddress;
        }
        if($request->firstName){
            $fields['firstName'] = $request->firstName;
        }
        if($request->lastName){
            $fields['lastName'] = $request->lastName;
        }
        if($request->password){
            $fields['password'] = $request->password;
        }

        $results = $this->publisher->updateReader($readerId , $fields);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function deleteReader($id){

        $results = $this->publisher->deleteReader($id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }
}
