<?php

namespace App\Http\Controllers;

use Hashkit\Utility\Utility;
use Illuminate\Http\Request;

/**
 * Class UsersController
 * @package App\Http\Controllers
 * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
 */
class HashController extends Controller
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * HashController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Encode string
     * @return \Illuminate\Http\JsonResponse
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-25 08:22
     */
    public function encode() {

        $variable = $this->request->variable;
        $hash = Utility::encode( $variable );

        $log_output = [
            'string'    => $variable,
            'hash'    => $hash
        ];

        $monolog = new \Monolog\Logger( 'hash-kit' );

        $monolog->info( 'Encoded string', $log_output );

        return response()->json( [ "hash" => $hash ] );

    }

    /**
     * Decode string
     * @return \Illuminate\Http\JsonResponse
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-25 08:22
     */
    public function decode() {

        $variable = $this->request->variable;

        $output = [
            'string'    => $variable,
            'result'    => Utility::decode( $variable )
        ];

        return response()->json( $output );

    }

}