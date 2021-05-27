<div align="center">
	<p><img  src="docs/img/logo.png" alt="PowerGrid Logo"></p>
</div>

------
 
 
 # Bypass for PHP

`Bypass` for PHP provides a quick way to create a custom instead of an actual HTTP server to return prebaked responses to client requests. This is most useful in tests, when you want to create a mock HTTP server and test how your HTTP client handles different types of responses from the server.

## Requirements

- PHP 8.0

## Install

To install via composer, run:

```bash
composer require --dev ciareis/bypass
```

## Getting started

### Use case

For demo purpose:

1. Imagine you have a service `TotalScoreService` and you must write a test for it.
2. This service calculates the total game score of a specific username.
3. To get the score, it consumes the fictitious API at `emtudo-games.com/v1/score/::USERNAME::` 
4. The API returns status `200`and a JSON body with a list of games:

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

Let's test it with Bypass.

### 1. Start by opening a Bypass server

Bypass will always run at `http://localhost`. To open a server use:

```php
    $bypass = Bypass::open();
```

By default, Bypass will be listening to a random port number. 
If needed, a specific port can be passed as an argument:

```php
    // opens Bypass in port 8080
    $bypass = Bypass::open(8080);
```


### 2. Bypass URL & Port

The URL with Port can be retrieved with the method `getBaseUrl()`:

 ```php
 $bypass_port = $bypass->getBaseUrl(); //for example: http://localhost:16819
 ````
 
If you need to retrieve only the port number, use the method `getPort()`:

 ```php
 $bypass_port = $bypass->getPort(); //for example: 16819
 ````

### 3. Tell Bypass what it should expect

Bypass needs to be informed of what it will be expecting from the request.
Based on our demo case, we will need:

- **Method**: the request will be made using the HTTP method `get`
- **URI**: the request will be at the URI `/v1/score/USERNAME` 
- **Status number** `200` (OK success) 
- **Body**: a text body (JSON encoded).

And our case will look like:

```php
    //The body containing the API response with games in JSON format
    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    //Telling Bypass what it should expect. 
    $bypass->expect(method: 'get', uri: '/v1/score', status: 200, body: $body);
```

The method `expect()` accepts the following parameters:

| Option | Description
|----|----|
|**HTTP Method**| *(string) $method* - Method to expect. (GET/POST/PUT/PATCH/DELETE) |
|**URI**| *(string) $uri* - URI to be served by Bypass |
|**Status**| *(int) $status* - Status to be returned by Bypass (default: 200)|
|**Body**|  *(string) $body*  - body that will be served (optional)|

### 4. Use the service with the Bypass URL

At this point, you can tell `TotalScoreService` to access the Bypass URL (`localhost:16819/v1/score`), instead of the original URL (`emtudo-games.com/v1/score/`):

```php
    $bypass = Bypass::open();
    $bypass_url = $bypass->getBaseUrl();
    

    $service = new TotalScoreService();
    $response = $serivce
        ->setBaseUrl($bypass_url) // set the URL to Bypass url
        ->getTotalScoreByUsername("johndoe"); //returns 35
```

### 5. Stop or shutdown

Bypass can be stopped or shutdown with the following methods:

To stop:
`$bypass->stop();`

To shutdown:
`$bypass->down();`

## Examples

### Quick examples

Click below to see code snippets for [Pest PHP](pestphp.com/) and PHPUnit.


<details><summary>Pest PHP</summary>
	
```php
it('properly returns the total score by username', function () {
  
    // prepare
    $bypass = Bypass::open();
	
    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    $bypass->expect(method: 'get', uri: '/v1/score', status: 200, body: $body);
    
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass->getBaseUrl())
        ->getTotalScoreByUsername("johndoe");

    expect(35)->toEqual($response);
});
```
</details>

<details><summary>PHPUnit</summary>
	
```php
 class BypassTest extends TestCase
  {
    public function test_total_score_by_username(): void
    {
  
    // prepare
    $bypass = Bypass::open();
	
    $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
    
    $bypass->expect(method: 'get', uri: '/v1/score', status: 200, body: $body);
    
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass->getBaseUrl())
        ->getTotalScoreByUsername("johndoe");

        $this->assertEquals(35, $response);
    }
 }
```
</details>


📚 See Bypass being used in complete tests with [Pest PHP](https://github.com/ciareis/bypass/blob/main/tests/BypassPestTest.php) and [PHPUnit](https://github.com/ciareis/bypass/blob/main/tests/BypassTest.php).
 

## Credits

- [Leandro Henrique](https://github.com/emtudo)
- [All Contributors](../../contributors)

And a special thanks to [Daniel](https://github.com/dansysanalyst)

### Inspired

Code inspired by [Bypass](https://github.com/PSPDFKit-labs/bypass)
