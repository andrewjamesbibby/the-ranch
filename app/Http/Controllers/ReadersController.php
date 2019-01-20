<?php

namespace App\Http\Controllers;

use Yudu\Publisher\Publisher;
use Illuminate\Http\Request;

class ReadersController extends Controller
{

    public function getReader(Request $request){

        $publisher = new Publisher(config('yudu.key'), config('yudu.secret'), [ 'debug' => false ]);

        $results = $publisher->getReader($request->id);

        return $results->xmlString();
    }

    public function getReaders(Request $request){

        $publisher = new Publisher(config('yudu.key'), config('yudu.secret'), [ 'debug' => false ]);

        $results = $publisher->getReaders();

        return $results->xmlString();
    }

    public function createReader(Request $request){

        $publisher = new Publisher(config('yudu.key'), config('yudu.secret'), [ 'debug' => false ]);

        $results = $publisher->createReader([
            'username'      => $request->username,
            'emailAddress'  => $request->emailAddress,
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'password'      => $request->password,
        ]);

        return $results->xmlString();
    }

    public function updateReader(Request $request, $readerId){

        $publisher = new Publisher(config('yudu.key'), config('yudu.secret'), [ 'debug' => false ]);

        $results = $publisher->updateReader($readerId , [
            'username'      => $request->username,
            'emailAddress'  => $request->emailAddress,
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'password'      => $request->password,
        ]);

        return $results->xmlString();
    }

    public function deleteReader(Request $request, $readerId){

        $publisher = new Publisher(config('yudu.key'), config('yudu.secret'), [ 'debug' => false ]);

        $results = $publisher->deleteReader($readerId);

        return $results->xmlString();
    }

}
