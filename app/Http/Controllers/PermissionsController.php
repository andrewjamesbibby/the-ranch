<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yudu\Publisher\Publisher;

class PermissionsController extends Controller
{
    public function __construct(Request $request)
    {
        $key = $request->headers->get('Publisher-Key');
        $secret = $request->headers->get('Publisher-Secret');

        if(! $key || ! $secret){
            abort(403, 'Missing credentials - Publisher Key AND Publisher Secret must both be specified');
        }

        $this->publisher = new Publisher($key, $secret, [ 'debug' => true ]);
    }

    public function getPermissions(Request $request){

        $results = $this->publisher->getPermissions($request->all());

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function getPermission($permission_id){

        $results = $this->publisher->getPermission($permission_id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function createPermission(Request $request){

        $results = $this->publisher->createPermission($request->all());

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function updatePermission(Request $request, $permission_id){

        $results = $this->publisher->updatePermission( $permission_id, [
            'expiryDate'  => $request->expiry_date,
        ]);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

    public function deletePermission($permission_id){

        $results = $this->publisher->deletePermission($permission_id);

        return [
            'request'     => $results->request(),
            'statusCode'  => $results->statusCode(),
            'body'        => $results->xmlString(),
        ];
    }

}
