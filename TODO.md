# TODO

Upcoming work:

## 2022-08-20

- Change name space from Laravel API Helpers to change API Helpers
- Change method signature from Api:: to ApiHelper::
- The delete method signature has changed to include the ability to post as well. Return the HTTP status code and data as an array:

```
$result = [code , data];
```

This is to make provision for some APIs that just would expect a 204 (success without content) and so that the API consumer has access to the HTTP status code.
