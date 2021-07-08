<?php

namespace RPAPP;

use Illuminate\Support\Str;

class UniqueIdentifier
{
    const RANDOM_BYTES = 'RANDOM_BYTES';
    const RANDOM_STRING = 'RANDOM_STRING';
    const OPENSSL_RANDOM_PSEUDO_BYTES = 'OPENSSL_RANDOM_PSEUDO_BYTES';

    /**
     * @param string $type
     * @param int $length
     * @param bool|null $strong_result
     * @return string
     * @throws \Exception
     */
    public function generate(string $type, int $length, bool $strong_result = null): string
    {
        $result = '';

        $a = trim($type);

        switch($a)
        {
            case UniqueIdentifier::RANDOM_BYTES:
            {
                $b = random_bytes($length);
                $result = bin2hex($b);

                break;
            }
            case UniqueIdentifier::RANDOM_STRING:
            {
                $b = Str::random($length);
                $result = $b;

                break;
            }
            case UniqueIdentifier::OPENSSL_RANDOM_PSEUDO_BYTES:
            {
                $b = openssl_random_pseudo_bytes($length, $strong_result);
                $result = bin2hex($b);

                break;
            }
        }

        return $result;
    }
}