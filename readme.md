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

For this demo, lets assume you need to test the service `TotalScoreService` which calculates the total score of multiple games played by an user.

This service consumes the ficticious API `emtudo-games.com/v1/score/USERNAME` which returns a list of games in JSON format.

Example:

```json
{
  "games": [
    {
      "name": "game 1",
      "points": 25
    },
    {
      "name": "game 2",
      "points": 10
    }
  ],
  "is_active": true
}
```

### 1. Start by opening by pass server

```php
    $bypass = Bypass::open();
```

The open() method accept the following parameters:

| Option | Description
|----|----|
|**Port**| *(int) $port* - Listening Port |
|**Php path**| *(str) $phpPath* - PHP installation path |

### 2. Bypass URL & Port

If you have not specified a port, Bypass will be running at `http://localhost` with a random port number.

To retrive the port, use the method:

 ```php
 $bypass_port = $bypass->getPort(); //for example: 16819
 ````

### 3. Tell Bypass what it should expect

Bypass needs to be informed that a request will be made using the HTTP method `get`, at the URI `/v1/score/USERNAME` and it should return a status `200` with a specific JSON body.

```php
    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    $bypass->expect(method: 'get', uri: '/v1/score', status: 200, body: $body);
```

The method `expect()` accepts the following parameters:

| Option | Description
|----|----|
|**HTTP Method**| *(string) $method* - Method to expect. (GET/POST/PUT/PATCH/DELETE) |
|**URI**| *(string) $uri* - URI to be served by Bypass |
|**Status**| *(int) $status* - Status to be returned by Bypass (default: 200)|
|**Body**|  *(string) $body*  - body that will be served (optional)|

### 4. Use your service with the Bypass URL

```php
    $bypass_port = $bypass->getPort();
    $bypass_url = "http://localhost:{$bypass_port}";
    
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass_url)
        ->getTotalScoreByUsername("johndoe"); //returns 35
```

### 5. Stop or shutdown

Bypass can be stopped or shutdown with the following methods:

To stop:
`$bypass->stop();`

To shutdown:
`$bypass->down();`

### Full test Method

We recommned you to check Bypass' folder `tests` to see a working implementation in a TestCase.

Also, you can see below a test example with [PEST PHP](https://pestphp.com).

```php
it('properly returns the score by username', function () {
  
    // prepare
    $bypass = Bypass::open();

    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    $bypass->expect(method: 'get', uri: '/v1/score', status: 200, body: $body);

    $bypass_port = $bypass->getPort();
    $bypass_url = "http://localhost:{$bypass_port}";
    
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass_url)
        ->getTotalScoreByUsername("johndoe");

    expect(35)->toEqual($response);
});
```

### Examples

- if you prefer to use phpunit, you can see [an example here](https://github.com/ciareis/bypass/blob/main/tests/BypassTest.php)
- If you need more example [access  here](https://github.com/ciareis/bypass/blob/main/tests/BypassPestTest.php)

## Credits

Developed by Leandro Henrique Reis

### Inspired

Code inspired by [Bypass](https://github.com/PSPDFKit-labs/bypass)
