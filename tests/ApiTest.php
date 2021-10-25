<?php

use FintechSystems\LaravelApiHelpers\Api;

it('can test', function () {
    expect(true)->toBeTrue();
});

it('can do http get to a jokes api website', function () {
    $api = new Api();
    $result = json_decode($api->get("https://v2.jokeapi.dev/joke/Any"));
    expect($result->error)->toBeFalse();
});

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

it('can post an array to a slack', function () {
    $api = new Api();

    require 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
    $dotenv->load();

    $data = [
        "token"    => $_ENV['SLACK_TEST_TOKEN'],
        "channel"  => $_ENV['SLACK_TEST_CHANNEL'],
        "text"     => "Hello, Foo-Bar channel message.",
        "username" => "tester",
    ];

    $headers = [
        'Content-Type'  => 'application/json;charset=utf-8',
        'Authorization' => 'Bearer xoxp-517707603539-517317390080-2595346380192-a041335a3cd8eb472e280ad72fcfae4e',
    ];

    $result = $api->post(
        'https://slack.com/api/chat.postMessage',
        $data
    );

    expect(json_decode($result, true)["ok"])->toEqual(true);
});
