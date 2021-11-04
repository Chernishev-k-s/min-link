<?php

namespace App\Services;

class HashGeneratorService
{
    public static function encode(int $int, int $length_min = 5, array $tokens = []): string
    {
        $tokens = $tokens ?: config('hash.tokens');
        $tokens_count = count($tokens);

        $hash = '';
        while ($int != 0)
        {
            $hash = $tokens[floor(abs($int % $tokens_count))] . $hash;
            $int = floor($int / $tokens_count);
        }
        return str_pad($hash, $length_min, $tokens[0], STR_PAD_LEFT);
    }

    public static function decode(string $hash, array $tokens = []): int
    {
        $tokens = array_flip($tokens ?: config('hash.tokens'));
        $tokens_count = count($tokens);

        $arr = [];
        foreach (str_split($hash) as $i => $token)
        {
            if(!isset($tokens[$token])) {
                throw new \Exception("Incorrect combination of hash and tokens. Found unknown token - $token");
            }

            $arr[] = $tokens[$token];
        }

        $int = 0;
        foreach (array_reverse($arr) as $i => $val)
        {
            $int += $val * ($tokens_count ** $i);
        }
        return $int;
    }

    public function isDecoded(string $hash, array $tokens = []): bool
    {
        $tokens = array_flip($tokens ?: config('hash.tokens'));
        foreach (str_split($hash) as $i => $token)
        {
            if(!isset($tokens[$token])) {
                return false;
            }
        }
        return true;
    }
}
