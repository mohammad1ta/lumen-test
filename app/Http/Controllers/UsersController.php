<?php

namespace App\Http\Controllers;

use App\Helpers\Utilities;
use Validator;
use Illuminate\Http\Request;
use App\Models\Users;

use App\Helpers\Response;

/**
 * Class UsersController
 * @package App\Http\Controllers
 * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
 */
class UsersController extends Controller
{

    /**
     * @var Users
     */
    protected $users;

    /**
     * @var Request
     */
    protected $request;

    /**
     * UsersController constructor.
     * @param Users $users
     * @param Request $request
     */
    public function __construct(Users $users, Request $request)
    {
        $this->users = $users;
        $this->request = $request;
    }

    /**
     * Register new user
     * @return \Illuminate\Http\JsonResponse|string
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 16:24
     */
    public function register() {

        // Form validator
        $validator = Validator::make($this->request->all(), [
            'username'   => 'required|unique:users|max:255',
            'password'   => 'required|min:6',
            'email'      => 'required|unique:users|max:255|email',
        ]);

        // Check validation of form
        if ( $validator->errors()->count() ) {
            return response()->json([ $validator->errors() ]);
        }

        // Register new user to database
        $user = $this->users->register( $this->request );

        // Get JWT token for registered user
        if ($user) {
            $jwt = Utilities::jwtEncode( $user );
            return response()->json([ "token" => $jwt ]);
        }

        return response()->json([ 'Unable to create the user' ]);

    }

}