<?php

/**
 * Class HashkitTest
 * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
 */
class HashkitTest extends TestCase
{

    /**
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-25 08:41
     */
    public function Login() {

        $vars = [
            'username' => "user_1",
            'password' => "it_is_sample"
        ];

        $this->json( 'POST', '/login', $vars )
            ->log( 'generate-hash' )
            ->seeStatusCode( 200 )
            ->seeJsonStructure([ 'token' ]);

    }

    /**
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-25 08:41
     */
    public function Register() {

        $vars = [
            'username' => "user_" . rand( 1, 999999 ),
            'password' => "it_is_sample"
        ];

        $this->json( 'POST', '/register', $vars )
            ->log( 'register-user' )
            ->seeStatusCode( 200 )
            ->seeJsonStructure([ 'token' ]);

    }

}
