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

it('can post an Array to a Slack', function () {
    require 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
    $dotenv->load();

    $data = [
        "token" => $_ENV['SLACK_TEST_TOKEN'],
        "channel" => $_ENV['SLACK_TEST_CHANNEL'],
        "text" => "Test 1",
        "username" => "tester",
    ];

    $api = new Api();

    $result = $api->post(
        'https://slack.com/api/chat.postMessage',
        $data
    );

    expect(json_decode($result, true)["ok"])->toEqual(true);
});

it('can post a String to a Slack', function () {
    require 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
    $dotenv->load();

    $header = [
        "Content-Type: application/json;charset=utf-8",
        "Authorization: Bearer {$_ENV['SLACK_TEST_TOKEN']}",
    ];

    $data = "{'channel': '" . $_ENV['SLACK_TEST_CHANNEL'] . "',"
            . "'text': 'Test 2',"
            . "'username': 'tester'}";

    $api = new Api();

    $result = $api->post(
        'https://slack.com/api/chat.postMessage',
        $data,
        $header
    );

    expect(json_decode($result, true)["ok"])->toEqual(true);
});
