<?php

/** Errors list */
define("VALIDATION_REQUEST_JSON_EXPECTED", 101);
define("VALIDATION_REQUIRED_FIELD", 102);

return [
    VALIDATION_REQUEST_JSON_EXPECTED => [
        'message' => 'The requested API method is waiting for json input',
    ],
    VALIDATION_REQUIRED_FIELD => [
        'message' => 'Required field',
    ]
];
