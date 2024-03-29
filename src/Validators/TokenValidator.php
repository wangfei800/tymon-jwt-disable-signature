<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tymon\JWTAuth\Validators;

class TokenValidator extends Validator
{
    /**
     * Check the structure of the token.
     *
     * @throws \Tymon\JWTAuth\Exceptions\TokenInvalidException
     */
    public static function check(string $token): string
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            static::throwFailed('Wrong number of segments');
        }

        $parts = array_filter(array_map('trim', $parts));

        if (count($parts) !== 3 || implode('.', $parts) !== $token) {
            static::throwFailed('Malformed token');
        }

        return $token;
    }
}
