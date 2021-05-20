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

### 2. Bypass URL & Port

Bypass will be running at `http://localhost` with a random port number.

To retrive the port, use the method:

 `$bypass_port = $bypass->getPort()`.

### 3. Tell Bypass what it should expect

Bypass needs to be informed that a request will be made using the HTTP method `get`, at the URI `/v1/score/USERNAME` and it should return a status `200` with a specific JSON body.

```php
    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    $bypass->expect(method: 'get', uri: '/v1/score/USERNAME', status: 200, body: $body);
```

The method `expect()` accepts the following parameters:

| Option | Description
|----|----|
|**HTTP Method**| Method to expect. (GET/POST/PUT/PATCH/DELETE) |
|**URI**| URI to be served by Bypass |
|**Status**| Status to be returned by Bypass
|**Body**| JSON body that will be served  by Bypass|


### 4. Use your service with the Bypass URL

```php
    $bypass_port = $bypass->getPort()
    $bypass_url = "http://localhost:{$bypass_port}";
    
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass_url)
        ->getTotalScoreByUsername("johndoe"); //returns 35
```

### Full test Method

Below you can see a full [PEST PHP](https://pestphp.com) test method:

```php
it('properly returns the score by username', function () {
  
    // prepare
    $bypass = Bypass::open();

    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    $bypass->expect(method: 'get', uri: '/v1/score/', status: 200, body: $body);

    $bypass_port = $bypass->getPort()
    $bypass_url = "http://localhost:{$bypass_port}";
    
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass_url)
        ->getTotalScoreByUsername("johndoe");

    expect(35)->toEqual($response);
});
```

## Credits

Developed by Leandro Henrique Reis

### Inspired

Code inspired by [Bypass](https://github.com/PSPDFKit-labs/bypass)
