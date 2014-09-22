<?php

return [
    'default' => 'production',

    'connections' => [
        'production' => [
            'host' => getenv('REMOTE_HOST'),
            'username' => getenv('REMOTE_USER'),
            'password' => getenv('REMOTE_PASS'),
            'key' => getenv('REMOTE_KEY'),
            'keyphrase' => getenv('REMOTE_KEYPHRASE'),
            'root' => getenv('REMOTE_ROOT'),
        ]
    ]
];