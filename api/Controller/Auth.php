<?php 
namespace Api\Controller\Auth;

    class Auth {
        
        public function __construct() {}

            public function login( $username, $password ) {
                if ($username->strtolower() == 'admin' && CRYPT_MD5($password) == CRYPT_MD5('admin') ){
                    return json_encode(
                        'true'
                    );
                }

                return json_encode(
                    'false'
                );
            }
    }