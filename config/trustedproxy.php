<?php

return [
    'proxies' => str(env('TRUSTED_PROXIES', ''))
        ->explode(',')
        ->map(fn($proxy) => trim($proxy))
        ->filter()
        ->whenEmpty(fn($ip) => null,
            function ($ip) {
                if ($ip->contains('**')) {
                    return '**';
                }

                if ($ip->contains('*')) {
                    return '*';
                }

                return $ip->toArray();
            }),
];
