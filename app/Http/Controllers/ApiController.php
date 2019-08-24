<?php

namespace App\Http\Controllers;

use App\Repository\GooglePlaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    private $repo;

    /**
     * Create api controller instance.
     *
     * @return void
     */
    public function __construct( GooglePlaceRepository $repo )
    {

        $this->repo = $repo;

    }

    /**
     * Search in google place by query parameters
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @param Request $request
     * @return array|\Illuminate\Support\MessageBag
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchByQuery(Request $request) {

        $validator = Validator::make($request->all(), [
            'query' => 'required'
        ]);

        if ( $validator->fails() )
            return $validator->errors();

        $result = $this->repo->query( $request->get('query' ) );

        return $result;

    }

    /**
     * Search in google place by long & lat parameters
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @param Request $request
     * @return array|\Illuminate\Support\MessageBag
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchByLocation(Request $request) {

        $validator = Validator::make($request->all(), [
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        if ( $validator->fails() )
            return $validator->errors();

        $result = $this->repo->query( $request->get('longitude' ), $request->get('latitude' ) );

        return $result;

    }

}
