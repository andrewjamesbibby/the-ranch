<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class ReadersController extends Controller
{

    public function getReader(Publisher $publisher, $id){

        $results = $publisher->getReader($id);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

    public function getReaders(Publisher $publisher, Request $request){




        $results = $publisher->getReaders([
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

    public function createReader(Publisher $publisher, Request $request){

        $results = $publisher->createReader([
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

    public function updateReader(Publisher $publisher, Request $request, $readerId){

        $results = $publisher->updateReader($readerId , [
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

    public function deleteReader(Publisher $publisher, Request $request, $readerId){

        $results = $publisher->deleteReader($readerId);

        return [
            'raw'        => $results->raw(),
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

}
