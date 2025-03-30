<div align="center">
    <p>
        <img  src="docs/img/logo.png" alt="Bypass Logo" width="200" />
        <h1>Bypass for PHP</h1>
    </p>
</div>

<p align="center">
    <a href="#about">About</a> |
    <a href="#installation">Installation</a> |
    <a href="#writing-tests">Writing Tests</a> |
    <a href="#examples">Examples</a> |
    <a href="#credits">Credits</a> |
    <a href="#inspired">Inspired</a>
</p>

<p align="center">
    <!-- base64 flags are available at https://www.phoca.cz/cssflags/ -->
    <!-- en-US -->
    <a href="README.md">
        <img height="20px" src="https://img.shields.io/badge/English (US)-flag.svg?color=555555&style=flat&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjM1IDY1MCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPg0KPGRlZnM+DQo8ZyBpZD0idW5pb24iPg0KPHVzZSB5PSItLjIxNiIgeGxpbms6aHJlZj0iI3g0Ii8+DQo8dXNlIHhsaW5rOmhyZWY9IiN4NCIvPg0KPHVzZSB5PSIuMjE2IiB4bGluazpocmVmPSIjczYiLz4NCjwvZz4NCjxnIGlkPSJ4NCI+DQo8dXNlIHhsaW5rOmhyZWY9IiNzNiIvPg0KPHVzZSB5PSIuMDU0IiB4bGluazpocmVmPSIjczUiLz4NCjx1c2UgeT0iLjEwOCIgeGxpbms6aHJlZj0iI3M2Ii8+DQo8dXNlIHk9Ii4xNjIiIHhsaW5rOmhyZWY9IiNzNSIvPg0KPC9nPg0KPGcgaWQ9InM1Ij4NCjx1c2UgeD0iLS4yNTIiIHhsaW5rOmhyZWY9IiNzdGFyIi8+DQo8dXNlIHg9Ii0uMTI2IiB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4PSIuMTI2IiB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4PSIuMjUyIiB4bGluazpocmVmPSIjc3RhciIvPg0KPC9nPg0KPGcgaWQ9InM2Ij4NCjx1c2UgeD0iLS4wNjMiIHhsaW5rOmhyZWY9IiNzNSIvPg0KPHVzZSB4PSIuMzE1IiB4bGluazpocmVmPSIjc3RhciIvPg0KPC9nPg0KPGcgaWQ9InN0YXIiPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0ibWF0cml4KC0uODA5MDIgLS41ODc3OSAuNTg3NzkgLS44MDkwMiAwIDApIi8+DQo8dXNlIHhsaW5rOmhyZWY9IiNwdCIgdHJhbnNmb3JtPSJtYXRyaXgoLjMwOTAyIC0uOTUxMDYgLjk1MTA2IC4zMDkwMiAwIDApIi8+DQo8dXNlIHhsaW5rOmhyZWY9IiNwdCIvPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0icm90YXRlKDcyKSIvPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0icm90YXRlKDE0NCkiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNmZmYiIGlkPSJwdCIgZD0iTS0uMTYyNSwwIDAtLjUgLjE2MjUsMHoiIHRyYW5zZm9ybT0ic2NhbGUoLjA2MTYpIi8+DQo8cGF0aCBmaWxsPSIjYmYwYTMwIiBpZD0ic3RyaXBlIiBkPSJtMCwwaDEyMzV2NTBoLTEyMzV6Ii8+DQo8L2RlZnM+DQo8cGF0aCBmaWxsPSIjZmZmIiBkPSJtMCwwaDEyMzV2NjUwaC0xMjM1eiIvPg0KPHVzZSB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8dXNlIHk9IjEwMCIgeGxpbms6aHJlZj0iI3N0cmlwZSIvPg0KPHVzZSB5PSIyMDAiIHhsaW5rOmhyZWY9IiNzdHJpcGUiLz4NCjx1c2UgeT0iMzAwIiB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8dXNlIHk9IjQwMCIgeGxpbms6aHJlZj0iI3N0cmlwZSIvPg0KPHVzZSB5PSI1MDAiIHhsaW5rOmhyZWY9IiNzdHJpcGUiLz4NCjx1c2UgeT0iNjAwIiB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8cGF0aCBmaWxsPSIjMDAyODY4IiBkPSJtMCwwaDQ5NHYzNTBoLTQ5NHoiLz4NCjx1c2UgeGxpbms6aHJlZj0iI3VuaW9uIiB0cmFuc2Zvcm09Im1hdHJpeCg2NTAgMCAwIDY1MCAyNDcgMTc1KSIvPg0KPC9zdmc+DQo=" alt="US flag in base64" />
    </a>
    <!-- pt-BR> -->
    <a href="docs/README_pt-BR.md">
        <img height="20px" src="https://img.shields.io/badge/Português (BR)-gray.svg?logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHjSURBVHjaYmRIZkCAfwwMf2DkLzCCMyDoBwNAALEAlTVGN/5nYPj//x8Q/P3/9++/vzZa31gY/mw5z/Tn3x8g98+f37///fn99/eq2lUAAQTS8J/h/7NPz/9C5P79WRj89f9/zv//fztLvPVezPzrz+8/f3//+vtLhl8GaANAAIE1/P8PVA1U6qn7NVTqb1XVpAv/JH7/+a/848XmtpBlj39PO8gM1PP7z2+gqwACiAnoYpC9TF9nB34NVf5z4XpoZJbEjJKfWaEfL7KLlbaURKj8Opj08RfIVb+BNgAEEBPQW1L8P+b6/mb6//s/w+/+nc4F0/9P2cj65xdHc+p/QR39//9/AdHJ9A/60l8YvjIABBAT0JYH75jStv75zwCSMBY8BXTMxXv/21ezfHj9X5/3BESDy5JfBy7/ZuBnAAggkA1//vx594kpaCnLloe/smLaVT9/ff3y/+/P/w+u/+JuW7fhwS/tSayPXrOycrEyfGQACCAWoA1//oOCDIgm72fu4vy6b4LD/9/S/3///s9+S28yy+9/LEAf//kLChVgCAEEEEjD7z9/JHgkQeHwD8gUjV79O9r6CzPLv6lr1OUFwWH9Fxjcv//9BcYoA0AAMTI4ImIROUYRMf2XARkABBgA8kMvQf3q+24AAAAASUVORK5CYII=" alt="BR flag in base64" />
    </a>
</p>

<p align="center">
    <a href="https://github.com/ciareis/bypass/actions/workflows/php.yml">
        <img src="https://github.com/ciareis/bypass/actions/workflows/php.yml/badge.svg?branch=main" alt="Tests" style="max-width:100%;" />
    </a>
    <a href="https://packagist.org/packages/ciareis/bypass" rel="nofollow">
        <img src="https://img.shields.io/github/v/tag/ciareis/bypass" alt="GitHub tag (latest by date)" data-canonical-src="https://img.shields.io/github/v/tag/ciareis/bypass" style="max-width:100%;" />
    </a>
    <a href="https://packagist.org/packages/ciareis/bypass" rel="nofollow">
        <img src="https://img.shields.io/packagist/dt/ciareis/bypass" alt="Packagist Downloads" data-canonical-src="https://img.shields.io/packagist/dt/ciareis/bypass" style="max-width:100%;" />
    </a>
    <a href="https://github.com/ciareis/bypass/blob/main/LICENSE.md">
        <img src="https://img.shields.io/packagist/l/ciareis/bypass" alt="Packagist License" data-canonical-src="https://img.shields.io/packagist/l/ciareis/bypass" style="max-width:100%;" />
    </a>
    <a href="https://github.com/ciareis/bypass/commits/main">
        <img src="https://img.shields.io/github/last-commit/ciareis/bypass" alt="Last Updated" data-canonical-src="https://img.shields.io/github/last-commit/ciareis/bypass.svg" style="max-width:100%;" />
    </a>
</p>

---

## About

<table>
  <tr>
    <td>
      <p>Bypass for PHP provides a quick way to create a custom HTTP Server to return predefined responses to client requests.</p>
      <p>This is useful in tests when your application makes requests to external services, and you need to simulate different situations like returning specific data or unexpected server errors.</p>
      <p>Just open a Bypass server and configure your application/service to reach Bypass instead of the real-world API end point.</p>
    </td>
  </tr>
</table>

---

## Installation

📌 Bypass requires PHP 8.2+.

To install via [composer](https://getcomposer.org), run the following command:

```bash
composer require --dev ciareis/bypass
```

---

## Video demo

[Pest and Bypass](https://youtube.com/watch?v=q_8kRlAIyms&t=2171s)

## Writing Tests

### Content

- [Open Bypass Server](#1-open-a-bypass-server)
- [Bypass URL and Port](#2-bypass-url-and-port)
- [Routes](#3-routes)
  - [Standard Route](#31-standard-route)
  - [File Route](#32-file-route)
  - [Bypass Serve and Route Helpers](#33-bypass-serve-and-route-helpers)
- [Assert Route](#4-asserting-route-calling)
- [Stop or shut down](#5-stop-or-shut-down)

🔥 Check out full code examples [here](#examples) section.

### 1. Open a Bypass Server

To write a test, first open a Bypass server:

```php
//Open a new Bypass server
$bypass = Bypass::open();
```

Bypass will always run at `http://localhost` listening to a random port number.

To specify a custom port, just pass it in the argument `(int) $port`.

```php
//Open a new Bypass using port 8081
$bypass = Bypass::open(8081);
```

### 2. Bypass URL and Port

You can retrieve the Bypass server URL using `getBaseUrl()`.

```php
$bypassUrl = $bypass->getBaseUrl(); //http://localhost:16819
```

If you need to retrieve only the port number, use the `getPort()` method:

```php
$bypassPort = $bypass->getPort(); //16819
```

### 3. Routes

Bypass provides two types of routes: The `Standard Route` to return a text body content and the `File Route`, which returns a binary file.

When running your test suit, you should pass the URL created with Bypass to your service. In this way, you will make the service you are testing reach Bypass instead of reaching the real-world API end point.

#### 3.1 Standard Route

```php
use Ciareis\Bypass\Bypass;

//Json body
$body = '{"username": "john", "name": "John Smith", "total": 1250}';

//Route retuning the JSON body with HTTP Status 200
$bypass->addRoute(method: 'GET', uri: '/v1/demo/john', status: 200, body: $body);

//Instantiates a DemoService class
$service = new DemoService();

//Configure your service to access Bypass URL
$response = $service->setBaseUrl($bypass->getBaseUrl())
  ->getTotalByUser('john');

//Your test assertions here...
```

The method `addRoute()` accepts the following parameters:

| Parameter       | Type                  | Description                                                                                                         |
| :-------------- | :-------------------- | :------------------------------------------------------------------------------------------------------------------ |
| **HTTP Method** | `string $method`      | [HTTP Request Method](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE)           |
| **URI**         | `string $uri`         | URI to be served by Bypass                                                                                          |
| **Status**      | `int $status`         | [HTTP Status Code](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html) to be returned by Bypass (default: 200) |
| **Body**        | `string\|array $body` | Body to be served by Bypass (optional)                                                                              |
| **Times**       | `int $times`          | How many times the route should be called (default: 1)                                                              |
| **Headers**     | `array $headers`      | Header to be served by Bypass (optional) |


#### 3.2 File Route

```php
use Ciareis\Bypass\Bypass;

//Reads a PDF file
$demoFile = \file_get_contents('storage/pdfs/demo.pdf');

//File Route returning a binary file with HTTP Status 200
$bypass->addFileRoute(method: 'GET', uri: '/v1/myfile', status: 200, file: $demoFile);

//Instantiates a DemoService class
$service = new DemoService();

//Configure your service to access Bypass URL
$response = $service->setBaseUrl($bypass->getBaseUrl())
  ->getPdf();

//Your test assertions here...
```

The method `addFileRoute()` accepts the following parameters:

| Parameter       | Type             | Description                                                                                                         |
| :-------------- | :--------------- | :------------------------------------------------------------------------------------------------------------------ |
| **HTTP Method** | `string $method` | [HTTP Request Method](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE)           |
| **URI**         | `string $uri`    | URI to be served by Bypass                                                                                          |
| **Status**      | `int $status`    | [HTTP Status Code](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html) to be returned by Bypass (default: 200) |
| **File**        | `binary $file`   | Binary file to be served by Bypass                                                                                  |
| **Times**       | `int $times`     | How many times the route should be called (default: 1)                                                              |
| **Headers**     | `array $headers`      | Header to be served by Bypass (optional) |

#### 3.3 Bypass Serve and Route Helpers

Bypass provides you with convenient shortcuts to the most-common-used HTTP requests.

These shortcuts are called "Route Helpers" and are served automatically at a random port using `Bypass::serve()` without the need to call `Bypass::open()`.

In the next example, Bypasss serves two routes: A URL accessible by method `GET` returning a JSON body with status `200`, and a second route URL accessible by method `GET` and returning status `404`.

```php
use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

//Create and serve routes
$bypass = Bypass::serve(
  Route::ok(uri: '/v1/demo/john', body: ['username' => 'john', 'name' => 'John Smith', 'total' => 1250]), //method GET, status 200
  Route::notFound(uri: '/v1/demo/wally') //method GET, status 404
);

//Instantiates a DemoService class
$service = new DemoService();
$service->setBaseUrl($bypass->getBaseUrl());

//Consumes the "OK (200)" route
$responseOk = $service->getTotalByUser('john'); //200 - OK with total => 1250

//Consumes the "Not Found (404)" route
$responseNotFound = $service->getTotalByUser('wally'); //404 - Not found

//Your test assertions here...
```

#### Route Helpers

You may find below the list of Route Helpers.

| Route Helper                  | Default Method | HTTP Status | Body                     | Common usage                                                               |
| :---------------------------- | :------------- | :---------- | :----------------------- | :------------------------------------------------------------------------- |
| **Route::ok()**               | GET            | 200         | optional (string\|array) | Request was successful                                                     |
| **Route::created()**          | POST           | 201         | optional (string\|array) | Response to a POST request which resulted in a creation                    |
| **Route::badRequest()**       | POST           | 400         | optional (string\|array) | Something can't be parsed (ex: wrong parameter)                            |
| **Route::unauthorized()**     | GET            | 401         | optional (string\|array) | Not logged in                                                              |
| **Route::forbidden()**        | GET            | 403         | optional (string\|array) | Logged in but trying to request a restricted resource (without permission) |
| **Route::notFound()**         | GET            | 404         | optional (string\|array) | URL or resource does not exist                                             |
| **Route::notAllowed()**       | GET            | 405         | optional (string\|array) | Method not allowed                                                         |
| **Route::validationFailed()** | POST           | 422         | optional (string\|array) | Data sent does not satisfy validation rules                                |
| **Route::tooMany()**          | GET            | 429         | optional (string\|array) | Request rejected due to server limitation                                  |
| **Route::serverError()**      | GET            | 500         | optional (string\|array) | General indication that something is wrong on the server side              |

You may also adjust the helpers to your needs by passing arguments:

| Parameter       | Type                  | Description                                                                                               |
| :-------------- | :-------------------- | :-------------------------------------------------------------------------------------------------------- |
| **URI**         | `string $uri`         | URI to be served by Bypass                                                                                |
| **Body**        | `string\|array $body` | Body to be served by Bypass (optional)                                                                    |
| **HTTP Method** | `string $method`      | [HTTP Request Method](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE) |
| **Times**       | `int $times`          | How many times the route should be called (default: 1)                                                    |
| **Headers**     | `array $headers`      | Header to be served by Bypass (optional) |

In the example below, you can see the Helper `Route::badRequest` using method `GET` instead of its default method `POST`.

```php
use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

Bypass::serve(
  Route::badRequest(uri: '/v1/users?filter=foo', body: ['error' => 'Filter parameter foo is not allowed.'], method: 'GET')
);
```

📝 Note: Custom routes can be created using a [Standard Route](#31-standard-route) in case something you need is not covered by the Helpers.

### 4. Asserting Route Calling

Sometimes you may need to assert that a route was called at least one or multiple times.

The method `assertRoutes()` will return a `RouteNotCalledException` if a route was NOT called as many times as defined in the `$times` parameter.

If you need to assert that a route is NOT being called by your service, set the parameter `$times = 0`

```php
//Json body
$body = '{"username": "john", "name": "John Smith", "total": 1250}';

//Defines a route which must be called two times
$bypass->addRoute(method: 'GET', uri: '/v1/demo/john', status: 200, body: $body, times: 2);

//Instantiates a DemoService class
$service = new DemoService();

//Consumes the service using the Bypass URL
$response = $service->setBaseUrl($bypass->getBaseUrl())
  ->getTotalByUser('john');

$bypass->assertRoutes();

//Your test assertions here...
```

### 5. Stop or shut down

Bypass will automatically stop its server once your test is done running.

The Bypass server can be stopped or shut down at any point with the following methods:

To stop:
`$bypass->stop();`

To shut down:
`$bypass->down();`

## Examples

### Use case

To better illustrate Bypass usage, imagine you have to write a test for a service that calculates the total game score of a given username.

The score is obtained by making an external request to a fictitious API at `emtudo-games.com/v1/score/::USERNAME::`. The API returns HTTP Status `200` and a JSON body with a list of games:

```json
{
  "games": [
    {
      "id": 1,
      "points": 25
    },
    {
      "id": 2,
      "points": 10
    }
  ],
  "is_active": true
}
```

```php
use Ciareis\Bypass\Bypass;

//Opens a new Bypass server
$bypass = Bypass::open();

//Retrieves the Bypass URL
$bypassUrl = $bypass->getBaseUrl();

//Json body
$body = '{"games":[{"id":1, "name":"game 1","points":25},{"id":2, "name":"game 2","points":10}],"is_active":true}';

//Defines a route
$bypass->addRoute(method: 'GET', uri: '/v1/score/johndoe', status: 200, body: $body);

//Instantiates a TotalScoreService
$service = new TotalScoreService();

//Configure your service to access Bypass URL
$response = $serivce
  ->setBaseUrl($bypassUrl) // set the URL to the Bypass URL
  ->getTotalScoreByUsername('johndoe'); //returns 35

//Pest PHP verifies that response is 35
expect($response)->toBe(35);

//PHPUnit verifies that response is 35
$this->assertSame($response, 35);
```

### Quick Test Examples

Click below to see code snippets for [Pest PHP](https://pestphp.com) and PHPUnit.

<details><summary>Pest PHP</summary>

```php
use Ciareis\Bypass\Bypass;


it('properly returns the total score by username', function () {

  //Opens a new Bypass server
  $bypass = Bypass::open();

  //Json body
  $body = '{"games":[{"id":1, "name":"game 1","points":25},{"id":2, "name":"game 2","points":10}],"is_active":true}';

  //Defines a route
  $bypass->addRoute(method: 'GET', uri: '/v1/score/johndoe', status: 200, body: $body);

  //Configure your service to access Bypass URL
  $service = new TotalScoreService();
  $response = $service
    ->setBaseUrl($bypass->getBaseUrl())
    ->getTotalScoreByUsername('johndoe');

  //Verifies that response is 35
  expect($response)->toBe(35);
});

it('properly gets the logo', function () {

  //Opens a new Bypass server
  $bypass = Bypass::open();

  //Reads the file
  $filePath = 'docs/img/logo.png';
  $file = \file_get_contents($filePath);

  //Defines a route
  $bypass->addFileRoute(method: 'GET', uri: $filePath, status: 200, file: $file);

  //Configure your service to access Bypass URL
  $service = new LogoService();
  $response = $service->setBaseUrl($bypass->getBaseUrl())
    ->getLogo();

  // asserts
  expect($response)->toEqual($file);
});
```

</details>

<details><summary>PHPUnit</summary>

```php
use Ciareis\Bypass\Bypass;


class BypassTest extends TestCase
{
  public function test_total_score_by_username(): void
  {
    //Opens a new Bypass server
    $bypass = Bypass::open();

    //Json body
    $body = '{"games":[{"id":1,"name":"game 1","points":25},{"id":2,"name":"game 2","points":10}],"is_active":true}';

    //Defines a route
    $bypass->addRoute(method: 'GET', uri: '/v1/score/johndoe', status: 200, body: $body);

    //Configure your service to access Bypass URL
    $service = new TotalScoreService();
    $response = $service
      ->setBaseUrl($bypass->getBaseUrl())
      ->getTotalScoreByUsername('johndoe');

    //Verifies that response is 35
    $this->assertSame(35, $response);
  }

  public function test_gets_logo(): void
  {
    //Opens a new Bypass server
    $bypass = Bypass::open();

    //Reads the file
    $filePath = 'docs/img/logo.png';
    $file = \file_get_contents($filePath);

    //Defines a route
    $bypass->addFileRoute(method: 'GET', uri: $filePath, status: 200, file: $file);

    //Configure your service to access Bypass URL
    $service = new LogoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())
      ->getLogo();

    $this->assertSame($response, $file);
  }
}
```

</details>

### Test Examples

📚 See Bypass being used in complete tests with [Pest PHP](https://github.com/ciareis/bypass/blob/main/tests/BypassPestTest.php) and [PHPUnit](https://github.com/ciareis/bypass/blob/main/tests/BypassPhpUnitTest.php) for the [GithubRepoService](https://github.com/ciareis/bypass/blob/main/tests/Services/GithubRepoService.php) demo service.

## Credits

- [Leandro Henrique](https://github.com/emtudo)
- [All Contributors](../../contributors)

And a special thanks to [@DanSysAnalyst](https://github.com/dansysanalyst)

### Inspired

Code inspired by [Bypass](https://github.com/PSPDFKit-labs/bypass)