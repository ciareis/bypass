<div align="center">
	<p><img  src="docs/img/logo.png" alt="PowerGrid Logo"></p>
</div>

------
 
 
 # Bypass for PHP

`Bypass` for PHP provides a quick way to create a custom plug that can be put in place instead of an actual HTTP server to return prebaked responses to client requests. This is most useful in tests, when you want to create a mock HTTP server and test how your HTTP client handles different types of responses from the server.

## Requirements

- PHP 8.0

## Install

To install via composer, run:

```bash
composer require --dev ciareis/bypass
```

## Usage
To use Bypass in a test case, open a connection and use its port to connect your client to it.

## Credits
Developed by Leandro Henrique Reis

### Inspired

Code inspired from [https://github.com/PSPDFKit-labs/bypass](https://github.com/PSPDFKit-labs/bypass)

