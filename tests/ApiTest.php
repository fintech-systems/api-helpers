<?php

use FintechSystems\LaravelApiHelpers\Api;

it('can test', function () {
    expect(true)->toBeTrue();
});

// it('can do http get to a jokes api website', function () {
//     $api = new Api();
//     $result = json_decode($api->get("https://v2.jokeapi.dev/joke/Any"));
//     expect($result->error)->toBeFalse();
// });

it('can convert 14085551234 to +1.408-555-1234', function () {
    $api = new Api();
    $result = $api->convertWhatsAppNumberToWhmcsPhoneNumber('14085551234');
    expect($result)->toEqual('+1.408-555-1234');
});

it('can convert 27823096710 to +27.82 309 6710', function () {
    $api = new Api();
    $result = $api->convertWhatsAppNumberToWhmcsPhoneNumber('27823096710');
    expect($result)->toEqual('+27.82 309 6710');
});
