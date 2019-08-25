<?php

/**
 * Class HashkitTest
 * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
 */
class HashkitTest extends TestCase
{

    /**
     * Generate hash
     * @author Mohammadreza Yektamaram <mohammad.1ta@gmail.com>
     * @since 2019-08-25 08:39
     */
    public function generateHash() {

        $vars = [
            'variable' => "Hellooooo"
        ];

        $this->json( 'GET', '/hash', $vars )
            ->log( 'generate-hash' )
            ->seeStatusCode(200)
            ->seeJsonStructure([ 'hash' ]);

    }

}
