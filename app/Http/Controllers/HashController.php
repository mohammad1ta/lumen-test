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

        $hash = Utility::encode();

        $output = [
            'hash'    => $hash
        ];

        $monolog = new \Monolog\Logger( 'hash-kit' );

        $monolog->info( 'Encoded string', $output );

        return response()->json( $output );

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