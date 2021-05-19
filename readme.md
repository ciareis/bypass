# Bypass

`Bypass` provides a quick way to create a custom plug that can be put in place
instead of an actual HTTP server to return prebaked responses to client
requests. This is most useful in tests, when you want to create a mock HTTP
server and test how your HTTP client handles different types of responses from
the server.

Bypass supports PHP 8.0.

## Usage

To use Bypass in a test case, open a connection and use its port to connect your
client to it.


## Install
```php
composer require ciareis/bypass
```

### Inspired

Code inspired from [https://github.com/PSPDFKit-labs/bypass](https://github.com/PSPDFKit-labs/bypass)

