<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class ReadersController extends Controller
{

    public function getReader(Publisher $publisher, Request $request){

        $results = $publisher->getReader($request->id);

        return [
            'request'    => 'hopefully raw request here',
            'statusCode' => $results->statusCode(),
            'body'       => $results->xmlString(),
        ];
    }

    public function getReaders(Publisher $publisher, Request $request){

        $results = $publisher->getReaders();

        return $results->xmlString();
    }

    public function createReader(Publisher $publisher, Request $request){

        $results = $publisher->createReader([
            'username'      => $request->username,
            'emailAddress'  => $request->emailAddress,
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'password'      => $request->password,
        ]);

        return $results->xmlString();
    }

    public function updateReader(Publisher $publisher, Request $request, $readerId){

        $results = $publisher->updateReader($readerId , [
            'username'      => $request->username,
            'emailAddress'  => $request->emailAddress,
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'password'      => $request->password,
        ]);

        return $results->xmlString();
    }

    public function deleteReader(Publisher $publisher, Request $request, $readerId){

        $results = $publisher->deleteReader($readerId);

        return $results->xmlString();
    }

}
