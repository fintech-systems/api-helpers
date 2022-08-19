# Changelog

All notable changes to `laravel-api-helpers` will be documented in this file.

## v0.1.5 - 2022-08-19

- had to come upgrade because Yodlee PHP API needs this weird dependency!
- upgraded Orchestra testbench to be L9 compatible (version 7)
- had to remove all packages, upgrade Orchestra, and then add all packages back
- updated composer.json because url is not laravel-api-helpers but just api-helpers
- tests failing because no slack API token available on hand but that's fine because 4/6 are passing

## v0.1.3 - 2021-10-26

- allow union type string|array in post and delete
- attempt at determining if post type is array then http_build_query() but didn't work
- make delete and put same signature
- update readme to show that same signature is sued

## v0.1.1 - 2021-10-25

- revert previous version

## v0.1.0 - 2021-10-25

- breaking change POST now accepts and array for postFields instead of a string

## v0.0.3 - 2021-10-23

- Add a phone number converter for changing from WhatsApp format to WHMCS format
- Add tests for phone number conversion

## 0.0.2 - 2021-10-16

- Add generic CURL DELETE

## 0.0.1 - 2021-10-15

- initial release
- Generic CURL GET & PUT
- LaravelApiHelpersCommand to help with caching
