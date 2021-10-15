<?php

use FintechSystems\LaravelApiHelpers\Api;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can do http get', function() {
    $api = new Api;
    $result = json_decode($api->get("https://v2.jokeapi.dev/joke/Any"));
    expect($result->error)->toBeFalse();
});