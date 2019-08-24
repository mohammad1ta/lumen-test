<?php

namespace App\Helpers;

use App\User;
use Firebase\JWT\JWT;

class Utilities {

    /**
     * Get requirement payload for encoding JWT
     * @param User $user
     * @return array
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 15:48
     */
    public static function getJwtPayload( $user ) {

        return [
            'iss'   => "lumen",
            'sub'   => $user->id,
            'iat'   => time(),
            'exp'   => time() + 3600
        ];

    }

    /**
     * Get JWT token for user
     * @param User $user
     * @return string
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 15:48
     */
    public static function jwtEncode(  $user ) {

        $payload = self::getJwtPayload( $user );

        return JWT::encode( $payload, env( 'JWT_SECRET' ) );

    }

}