<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * Class Users
 * @package App\Models
 * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
 */
class Users extends Model
{

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'updated_at',
    ];

    /**
     * Register new user to database
     * @param $input
     * @return mixed
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 16:27
     */
    public function register( $input ) {

        $input['password'] = Hash::make( $input['password'] );

        return $this->create( $input->all() );

    }

    /**
     * Get user info by username
     * @param $username
     * @return mixed
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-24 16:28
     */
    public function getUser( $username ) {

        $data = User::where( 'username', $username )->first();

        return $data;

    }

}