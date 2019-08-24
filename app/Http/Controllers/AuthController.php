<?php

namespace App\Http\Controllers;

use App\Helpers\Utilities;
use App\Models\Users;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class AuthController
 * @package App\Http\Controllers
 * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
 */
class AuthController extends BaseController
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
     * AuthController constructor.
     * @param Users $users
     * @param Request $request
     */
    public function __construct(Users $users, Request $request)
    {
        $this->users = $users;
        $this->request = $request;
    }

    /**
     * Create and get new user token
     * @param User $user
     * @return string
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 15:24
     */
    protected function jwt(User $user) {

        return Utilities::jwtEncode( $user );

    }

    /**
     * Check user input and login
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 16:17
     */
    public function authenticate( User $user ) {

        // Validation form
        $this->validate($this->request, [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        // Find user by email
        $user = $this->users->getUser( $this->request->input( 'username' ) );

        if ( !$user ) {
            return response()->json([
                'error' => 'Username does not exist'
            ], 400);
        }

        // Verify login and return token
        if ( Hash::check( $this->request->input( 'password' ), $user->password ) ) {
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }

        // Failed login
        return response()->json([
            'error' => 'Username or password is wrong.'
        ], 400);

    }

}