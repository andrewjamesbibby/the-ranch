<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use Yudu\Publisher\Publisher;

class OtherController extends Controller
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

    public function verifyCredentials(Request $request) {

        $results = $this->publisher->getLinks();

        if($results->statusCode() == 200){
            return [ "verified" => true ];
        }

        if($results->statusCode() == 401){
            return [ "false" => false ];
        }

        throw new Exception('Credentials could not be verified');
    }

    public function removeDevices(Request $request) {

        $results = $this->publisher->removeDevices($request->get('user'));

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function authPasswords(Request $request) {

        $results = $this->publisher->authenticatePassword($request->get('id'), $request->get('password') );

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];

    }

}
