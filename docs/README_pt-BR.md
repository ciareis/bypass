<div align="center">
    <p>
        <img  src="img/logo.png" alt="Logo do Bypass" width="200" />
        <h1>Bypass para PHP</h1>
    </p>
</div>

<p align="center">
    <a href="#sobre">Sobre</a> |
    <a href="#instalação">Instalação</a> |
    <a href="#escrevendo-testes">Escrevendo Testes</a> |
    <a href="#exemplos">Exemplos</a> |
    <a href="#créditos">Créditos</a> |
    <a href="#inspiração">Inspiração</a>
</p>

<p align="center">
    <!-- base64 flags are available at https://www.phoca.cz/cssflags/ -->
    <!-- en-US -->
    <a href="../README.md">
        <img height="20px" src="https://img.shields.io/badge/English (US)-flag.svg?color=555555&style=flat&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjM1IDY1MCIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPg0KPGRlZnM+DQo8ZyBpZD0idW5pb24iPg0KPHVzZSB5PSItLjIxNiIgeGxpbms6aHJlZj0iI3g0Ii8+DQo8dXNlIHhsaW5rOmhyZWY9IiN4NCIvPg0KPHVzZSB5PSIuMjE2IiB4bGluazpocmVmPSIjczYiLz4NCjwvZz4NCjxnIGlkPSJ4NCI+DQo8dXNlIHhsaW5rOmhyZWY9IiNzNiIvPg0KPHVzZSB5PSIuMDU0IiB4bGluazpocmVmPSIjczUiLz4NCjx1c2UgeT0iLjEwOCIgeGxpbms6aHJlZj0iI3M2Ii8+DQo8dXNlIHk9Ii4xNjIiIHhsaW5rOmhyZWY9IiNzNSIvPg0KPC9nPg0KPGcgaWQ9InM1Ij4NCjx1c2UgeD0iLS4yNTIiIHhsaW5rOmhyZWY9IiNzdGFyIi8+DQo8dXNlIHg9Ii0uMTI2IiB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4PSIuMTI2IiB4bGluazpocmVmPSIjc3RhciIvPg0KPHVzZSB4PSIuMjUyIiB4bGluazpocmVmPSIjc3RhciIvPg0KPC9nPg0KPGcgaWQ9InM2Ij4NCjx1c2UgeD0iLS4wNjMiIHhsaW5rOmhyZWY9IiNzNSIvPg0KPHVzZSB4PSIuMzE1IiB4bGluazpocmVmPSIjc3RhciIvPg0KPC9nPg0KPGcgaWQ9InN0YXIiPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0ibWF0cml4KC0uODA5MDIgLS41ODc3OSAuNTg3NzkgLS44MDkwMiAwIDApIi8+DQo8dXNlIHhsaW5rOmhyZWY9IiNwdCIgdHJhbnNmb3JtPSJtYXRyaXgoLjMwOTAyIC0uOTUxMDYgLjk1MTA2IC4zMDkwMiAwIDApIi8+DQo8dXNlIHhsaW5rOmhyZWY9IiNwdCIvPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0icm90YXRlKDcyKSIvPg0KPHVzZSB4bGluazpocmVmPSIjcHQiIHRyYW5zZm9ybT0icm90YXRlKDE0NCkiLz4NCjwvZz4NCjxwYXRoIGZpbGw9IiNmZmYiIGlkPSJwdCIgZD0iTS0uMTYyNSwwIDAtLjUgLjE2MjUsMHoiIHRyYW5zZm9ybT0ic2NhbGUoLjA2MTYpIi8+DQo8cGF0aCBmaWxsPSIjYmYwYTMwIiBpZD0ic3RyaXBlIiBkPSJtMCwwaDEyMzV2NTBoLTEyMzV6Ii8+DQo8L2RlZnM+DQo8cGF0aCBmaWxsPSIjZmZmIiBkPSJtMCwwaDEyMzV2NjUwaC0xMjM1eiIvPg0KPHVzZSB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8dXNlIHk9IjEwMCIgeGxpbms6aHJlZj0iI3N0cmlwZSIvPg0KPHVzZSB5PSIyMDAiIHhsaW5rOmhyZWY9IiNzdHJpcGUiLz4NCjx1c2UgeT0iMzAwIiB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8dXNlIHk9IjQwMCIgeGxpbms6aHJlZj0iI3N0cmlwZSIvPg0KPHVzZSB5PSI1MDAiIHhsaW5rOmhyZWY9IiNzdHJpcGUiLz4NCjx1c2UgeT0iNjAwIiB4bGluazpocmVmPSIjc3RyaXBlIi8+DQo8cGF0aCBmaWxsPSIjMDAyODY4IiBkPSJtMCwwaDQ5NHYzNTBoLTQ5NHoiLz4NCjx1c2UgeGxpbms6aHJlZj0iI3VuaW9uIiB0cmFuc2Zvcm09Im1hdHJpeCg2NTAgMCAwIDY1MCAyNDcgMTc1KSIvPg0KPC9zdmc+DQo=" alt="Bandeira dos USA em base64" />
    </a>
    <!-- pt-BR> -->
    <a href="README_pt-BR.md">
        <img height="20px" src="https://img.shields.io/badge/Português (BR)-gray.svg?logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAHjSURBVHjaYmRIZkCAfwwMf2DkLzCCMyDoBwNAALEAlTVGN/5nYPj//x8Q/P3/9++/vzZa31gY/mw5z/Tn3x8g98+f37///fn99/eq2lUAAQTS8J/h/7NPz/9C5P79WRj89f9/zv//fztLvPVezPzrz+8/f3//+vtLhl8GaANAAIE1/P8PVA1U6qn7NVTqb1XVpAv/JH7/+a/848XmtpBlj39PO8gM1PP7z2+gqwACiAnoYpC9TF9nB34NVf5z4XpoZJbEjJKfWaEfL7KLlbaURKj8Opj08RfIVb+BNgAEEBPQW1L8P+b6/mb6//s/w+/+nc4F0/9P2cj65xdHc+p/QR39//9/AdHJ9A/60l8YvjIABBAT0JYH75jStv75zwCSMBY8BXTMxXv/21ezfHj9X5/3BESDy5JfBy7/ZuBnAAggkA1//vx594kpaCnLloe/smLaVT9/ff3y/+/P/w+u/+JuW7fhwS/tSayPXrOycrEyfGQACCAWoA1//oOCDIgm72fu4vy6b4LD/9/S/3///s9+S28yy+9/LEAf//kLChVgCAEEEEjD7z9/JHgkQeHwD8gUjV79O9r6CzPLv6lr1OUFwWH9Fxjcv//9BcYoA0AAMTI4ImIROUYRMf2XARkABBgA8kMvQf3q+24AAAAASUVORK5CYII=" alt="Bandeira do BRA em base64" />
    </a>
</p>

<p align="center">
    <a href="https://github.com/ciareis/bypass/actions/workflows/php.yml">
        <img src="https://github.com/ciareis/bypass/actions/workflows/php.yml/badge.svg?branch=main" alt="Testes" style="max-width:100%;" />
    </a>
    <a href="https://packagist.org/packages/ciareis/bypass" rel="nofollow">
        <img src="https://img.shields.io/github/v/tag/ciareis/bypass" alt="GitHub tag (último por data)" data-canonical-src="https://img.shields.io/github/v/tag/ciareis/bypass" style="max-width:100%;" />
    </a>
    <a href="https://packagist.org/packages/ciareis/bypass" rel="nofollow">
        <img src="https://img.shields.io/packagist/dt/ciareis/bypass" alt="Downloads no Packagist" data-canonical-src="https://img.shields.io/packagist/dt/ciareis/bypass" style="max-width:100%;" />
    </a>
    <a href="https://github.com/ciareis/bypass/blob/main/LICENSE.md">
        <img src="https://img.shields.io/packagist/l/ciareis/bypass"" alt="Licença no Packagist" data-canonical-src="https://img.shields.io/packagist/l/ciareis/bypass" style="max-width:100%;" />
    </a>
    <a href="https://github.com/ciareis/bypass/commits/main">
        <img src="https://img.shields.io/github/last-commit/ciareis/bypass" alt="Última Atualização" data-canonical-src="https://img.shields.io/github/last-commit/ciareis/bypass.svg" style="max-width:100%;" />
    </a>
</p>

-------

## Sobre

<table>
    <tr>
        <td>
            <p>O Bypass para PHP prove uma maneira rápida para você criar um Servidor HTTP personalizado que retorne resposta predefinidas as requisições do seu cliente.</p>
            <p>Ele é muito útil em ambientes de testes, onde seu aplicativo realiza requisições HTTP a serviços externos e você precisa simular diferentes situações, como por exemplo retornar dados específicos ou erros inesperados do servidor.</p>
        </td>
    </tr>
</table>

-------

## Instalação

📌 O Bypass requer o uso do PHP 8.2 ou superior.

Para instalar o Bypass através do [composer](https://getcomposer.org), execute o seguinte comando:

```bash
composer require --dev ciareis/bypass
```

-------

## Vídeo demonstrativo

[Testando nota fácil.io com Laravel e Bypass: Meu próprio sandbox](https://www.youtube.com/watch?v=28ZK-T2qlOg)

## Escrevendo Testes

### Conteúdo

- [Abrindo o Servidor Bypass](#1-abrindo-o-servidor-bypass)
- [Recuperando o URL do Bypass](#2-endereço-e-porta-do-bypass)
- [Rotas](#3-rotas)
    - [Rota Padrão](#31-rota-padrão)
    - [Rota de Arquivo](#32-rota-de-arquivo)
    - [Método serve() do Bypass](#33-método-serve-do-bypass)
        - [Assistentes para Rotas](#assistentes-para-rotas)
- [Verificando se Rotas foram Chamadas](#4-verificando-se-rotas-foram-chamadas)
- [Parar ou Encerrar](#5-interromper-ou-encerrar)

📝 Nota: Se você deseja visualizar os códigos completos, vá para a seção [Exemplos](#exemplos).

### 1. Abrindo o Servidor Bypass

Para escrever um teste, primeiro abra uma instância do servidor Bypass:

```php
//Abre uma nova instância do Bypass Server
$bypass = Bypass::open();
```

O Bypass sempre será executado no URL `http://localhost` escutando através de uma porta de número aleatório.

Caso seja necessário, a porta pode ser especificada passando um valor para o argumento `(int) $port`:

```php
//Abre uma nova instância do Bypass Server na porta 8081
$bypass = Bypass::open(8081);
```

### 2. Endereço e Porta do Bypass

O endereço(URL) e porta do servidor pode ser recuperados usando o método `getBaseUrl()`:

```php
$bypassUrl = $bypass->getBaseUrl(); //http://localhost:16819
```

Se você precisar recuperar apenas o número da porta, utilize o método `getPort()`:

```php
$bypassPort = $bypass->getPort(); //16819
```

### 3. Rotas

O Bypass serve dois tipos de rotas: A `Rota Padrão`, que pode retornar uma corpo de texto em formato JSON e a `Rota de Arquivo`, que pode retornar um arquivo binário.

Ao executar seus testes, você informará as rotas do Bypass para o seu aplicativo ou serviço, fazendo com que ele acesse os URLs do Bypass ao invés dos URLs do mundo real.

#### 3.1 Rota Padrão

```php
use Ciareis\Bypass\Bypass;

//Corpo de texto em formato JSON
$body = '{"username": "john", "name": "John Smith", "total": 1250}';

//Define uma rota que deverá retornar um corpo de texto (JSON) e o código HTTP 200
$bypass->addRoute(method: 'get', uri: '/v1/demo', status: 200, body: $body);

//Instânciando a classe DemoService
$service = new DemoService();

//Consumindo o serviço utilizando o URL fornecido pelo Bypass
$response = $service->setBaseUrl($bypass->getBaseUrl())
    ->getTotal();

//Suas asserções/verificações de teste ficam aqui...
```

O método `addRoute()` aceita os seguintes parâmetros:

| Parâmetro | Tipo     | Descrição                  |
| :-------- | :------- | :------------------------- |
| **HTTP Method** | `int $method` | [Método de Requisição HTTP](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE) |
| **URI** | `string $uri` | URI a ser servido pelo Bypass |
| **Status** | `int $status` | [Código de Status HTTP](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html) a ser retornado pelo Bypass (padrão: 200) |
| **Body** | `string\|array $body` | Corpo de texto (JSON) a ser servido pelo Bypass (opcional) |
| **Times** | `int $times` | Quantidade de vezes em que a rota deve ser acessada (padrão: 1) |
| **Headers**| `array $headers`      | Cabeçalhos a ser servido pelo Bypass (opcional) |

#### 3.2 Rota de Arquivo

```php
use Ciareis\Bypass\Bypass;

//Lendo um arquivo PDF
$demoFile = \file_get_contents('storage/pdfs/demo.pdf');

//Define uma rota que deverá retornar o arquivo PDF e o código HTTP 200
$bypass->addFileRoute(method: 'get', uri: '/v1/myfile', status: 200, file: $demoFile);

//Instânciando a classe DemoService
$service = new DemoService();

//Consumindo o serviço utilizando o URL fornecido pelo Bypass
$response = $service->setBaseUrl($bypass->getBaseUrl())
    ->getPdf();

//Suas asserções/verificações de teste ficam aqui...
```

O método `addFileRoute()` aceita os seguintes parâmetros:

| Parâmetro | Tipo     | Descrição                |
| :-------- | :------- | :------------------------- |
| **HTTP Method** | `int $method` | [Método de Requisição HTTP](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE) |
| **URI** | `string $uri` | URI a ser servido pelo Bypass |
| **Status** | `int $status` | [Código de Status HTTP](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html) a ser retornado pelo Bypass (padrão: 200) |
| **File** | `binary $file` | Arquivo binário a ser servidor pelo Bypass |
| **Times** | `int $times` | Quantidade de vezes em que a rota deve ser acessada (padrão: 1) |
| **Headers**| `array $headers`      | Cabeçalhos a ser servido pelo Bypass (opcional) |

#### 3.3 Método Serve() do Bypass

O Bypass vem com uma variedade de atalhos convenientes para as requisições HTTP mais utilizadas.

Esses atalhos são chamados de "Métodos Assistentes para Rotas", porém para simplificar vamos chama-los apenas de "Assistentes para Rotas". Eles são servidos em uma porta aleatória e de forma automatica ao utilizarmos: `Bypass::serve()`.

Ao servirmos as rotas por meio dos assistentes, não necessitamos de chamar `Bypass::open()`.

Exemplo:

```php
use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

//Criando as rotas na inicialização do servidor
$bypass = Bypass::serve(
    Route::ok(uri: '/v1/demo/john', body: ['username' => 'john', 'name' => 'John Smith', 'total' => 1250]), //método GET, código HTTP 200
    Route::notFound(uri: '/v1/demo/wally') //método GET, código HTTP 404
);

//Instânciando a classe DemoService
$service = new DemoService();
$service->setBaseUrl($bypass->getBaseUrl());

//Consumindo o serviço utilizando a rota "OK (200)"
$responseOk = $service->getTotalByUser('john'); //200 - OK com total => 1250

//Consumindo o serviço utilizando a rota "Not Found (404)"
$responseNotFound = $service->getTotalByUser('wally'); //404 - Recurso não encontrado

//Suas asserções/verificações de teste ficam aqui...
```

No exemplo acima, o Bypass está servindo duas rotas: Uma rota acessível pelo método HTTP `GET` retornando um JSON com o código HTTP `200`, e uma segunda rota sendo acessível também pelo método `GET` só que retornando apemas um código HTTP `404`.

#### Assistentes para Rotas

| Método Assistente         | Método HTTP    | Codigo HTTP    | Retorno                  | Uso comum                         |
| :------------------------ | :------------- | :------------- | :----------------------- | :-------------------------------- |
| **Route::ok()**           | GET            | 200            | opcional (string\|array) | Requisição foi bem sucedida       |
| **Route::created()**      | POST           | 201            | opcional (string\|array) | Resposta a uma requisição em que resultou uma criação |
| **Route::badRequest()**   | POST           | 400            | opcional (string\|array) | Algo incorreto na requisição  (ex: parâmetro errado)  |
| **Route::unauthorized()** | GET            | 401            | opcional (string\|array) | Não autenticado                   |
| **Route::forbidden()**    | GET            | 403            | opcional (string\|array) | Autenticado, porém tentando acessar um recurso restrito (sem permissão) |
| **Route::notFound()**     | GET            | 404            | opcional (string\|array) | URL ou recurso não existem        |
| **Route::notAllowed()**   | GET            | 405            | opcional (string\|array) | Método não permitido              |
| **Route::validationFailed()** | POST       | 422            | opcional (string\|array) | Os dados enviados não satisfazem as regras de validação |
| **Route::tooMany()**      | GET            | 429            | opcional (string\|array) | Requisição rejeitada devido a limitações do servidor    |
| **Route::serverError()**  | GET            | 500            | opcional (string\|array) | Geralmente indica que algum erro aconteceu no lado do servidor  |

Você também pode personalizar os assistentes de rotas de acordo com as suas necessidades, passando os seguintes parâmetros:

| Parâmetro       | Tipo             | Descrição                                                                                                           |
| :-------------- | :--------------- | :------------------------------------------------------------------------------------------------------------------ |
| **URI**         | `string $uri`    | URI a ser servido pelo Bypass                                                                                          |
| **Body**        | `string\|array $body` | Corpo de texto (JSON) a ser servido pelo Bypass (opcional)                                                                              |
| **HTTP Method** | `string $method` | [Método de Requisição HTTP](https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html) (GET/POST/PUT/PATCH/DELETE)           |
| **Times**       | `int $times`     | Quantidade de vezes em que a rota deve ser acessada (padrão: 1)                                                              |
| **Headers**| `array $headers`      | Cabeçalhos a ser servido pelo Bypass (opcional) |

No exemplo abaixo, você pode ver o assistente `Route::badRequest` usando o método `GET` ao invés do método `POST`.

```php
use Ciareis\Bypass\Bypass;
use Ciareis\Bypass\Route;

Bypass::serve(
    Route::badRequest(uri: '/v1/users?filter=foo', body: ['error' => 'O parâmetro filter de valor foo não existe.'], method: 'GET')
);
```

📝 Nota: Rotas personalizadas podem ser criadas usando uma [Rota Padrão](#31-rota-padrão) no caso de você necessitar de algo mais específico, não coberto pelos assistentes de rotas.

### 4. Verificando se Rotas Foram Chamadas

Você pode necessitar de verificar se uma rota foi acessada uma ou mais vezes.

O método `assertRoutes()` retorna um `RouteNotCalledException` no caso de uma rota não ter sido acessada por tantas vezes quanto forão definidas no parâmetro `$times`.

Se você precisa garantir que uma rota não está sendo acessada pelo seu serviço, defina o parâmetro como zero `$times = 0`.

```php
//Corpo de texto em formato JSON
$body = '{"username": "john", "name": "John Smith", "total": 1250}';

//Define uma rota que deve ser acessada duas vezes
$bypass->addRoute(method: 'get', uri: '/v1/demo', status: 200, body: $body, times: 2);

//Instânciando a classe DemoService
$service = new DemoService();

//Consumindo o serviço utilizando o URL fornecido pelo Bypass
$response = $service->setBaseUrl($bypass->getBaseUrl())
    ->getTotal();

$bypass->assertRoutes();

//Suas asserções/verificações de teste ficam aqui...
```

### 5. Interromper ou encerrar

O Bypass vai encerrar seu próprio servidor uma vez que seu teste termine de ser executado.

O servidor do Bypass pode ser interrompido ou encerrado a qualquer momento com os seguintes métodos:

Para interromper:
`$bypass->stop();`

Para encerrar:
`$bypass->down();`

## Exemplos

### Caso de Uso

Para ilustrar melhor o uso do Bypass, imagine que você necessita escrever testes para um serviço chamado de `TotalScoreService`. Este serviço calcula a pontução total de um usuário específico em um jogo através de seu nome de usuário.
Para obter a pontuação, este serviço deve consumir uma API fictícia hospedada no endereço `emtudo-games.com/v1/score/::USERNAME::`. A API consumida retorna o código de status HTTP `200` e um JSON contendo em seu corpo a lista de jogos:

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

//Abre uma nova instância do Bypass Server
$bypass = Bypass::open();

//Recuperando o URL de acesso do Bypass Server
$bypassUrl = $bypass->getBaseUrl();

//Corpo de texto em formato JSON
$body = '{"games":[{"id":1,"name":"game 1","points":25},{"id":2,"name":"game 2","points":10}],"is_active":true}';

//Definição de rota a ser acessada pelo serviço
$bypass->addRoute(method: 'get', uri: '/v1/score/johndoe', status: 200, body: $body);
    
//Instânciando TotalScoreService
$service = new TotalScoreService();

//Consumindo o serviço utilizando a URL retornada pelo Bypass Server
$response = $service
    ->setBaseUrl($bypassUrl) //Define o URL a ser usado pelo serviço
    ->getTotalScoreByUsername('johndoe'); //retorna 35

//Verificando se a resposta é 35 com Pest PHP
expect($response)->toBe(35);

//Verificando se a resposta é 35 com PHPUnit
$this->assertSame($response, 35);
```

### Exemplos Rápidos de Testes

Clique abaixo para visualizar trechos de códigos utilizando [Pest PHP](https://pestphp.com) e [PHPUnit](https://phpunit.de).

<details><summary>Pest PHP</summary>

```php
use Ciareis\Bypass\Bypass;

it('properly returns the total score by username', function () {

    //Abre uma nova instância do Bypass Server
    $bypass = Bypass::open();

    //Corpo de texto em formato JSON
    $body = '{"games":[{"id":1,"name":"game 1","points":25},{"id":2,"name":"game 2","points":10}],"is_active":true}';

    //Definição de rota a ser acessada pelo serviço
    $bypass->addRoute(method: 'get', uri: '/v1/score/johndoe', status: 200, body: $body);

    //Instânciando e consumindo o serviço utilizando a URL retornada pelo Bypass Server
    $service = new TotalScoreService();
    $response = $service
        ->setBaseUrl($bypass->getBaseUrl())
        ->getTotalScoreByUsername('johndoe');

    //Verifica se a resposta é 35
    expect($response)->toBe(35);
});

it('properly gets the logo', function () {

    //Abre uma nova instância do Bypass Server
    $bypass = Bypass::open();

    //Lendo arquivo a partir do caminho informado
    $filePath = 'docs/img/logo.png';
    $file = \file_get_contents($filePath);

    //Definição de rota a ser acessada pelo serviço
    $bypass->addFileRoute(method: 'get', uri: $filePath, status: 200, file: $file);

    //Instânciando e consumindo o serviço utilizando a URL retornada pelo Bypass Server
    $service = new LogoService();
    $response = $service->setBaseUrl($bypass->getBaseUrl())
        ->getLogo();

    //Verifica se o arquivo retornado pelo Bypass é igual ao arquivo local
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
        //Abre uma nova instância do Bypass Server
        $bypass = Bypass::open();
        
        //Corpo de texto em formato JSON
        $body = '{"games":[{"id":1,"name":"game 1","points":25},{"id":2,"name":"game 2","points":10}],"is_active":true}';

        //Definição de rota a ser acessada pelo serviço
        $bypass->addRoute(method: 'get', uri: '/v1/score/johndoe', status: 200, body: $body);

        //Instânciando e consumindo o serviço utilizando a URL retornada pelo Bypass Server
        $service = new TotalScoreService();
        $response = $service
            ->setBaseUrl($bypass->getBaseUrl())
            ->getTotalScoreByUsername('johndoe');
        
        //Verifica se a resposta é 35 
        $this->assertSame(35, $response);
    }

    public function test_gets_logo(): void
    {
        //Abre uma nova instância do Bypass Server
        $bypass = Bypass::open();

        //Lendo arquivo a partir do caminho informado
        $filePath = 'docs/img/logo.png';
        $file = \file_get_contents($filePath);

        //Definição de rota a ser acessada pelo serviço
        $bypass->addFileRoute(method: 'get', uri: $filePath, status: 200, file: $file);

        //Instânciando e consumindo o serviço utilizando a URL retornada pelo Bypass Server
        $service = new LogoService();
        $response = $service->setBaseUrl($bypass->getBaseUrl())
            ->getLogo();

        //Verifica se o arquivo retornado pelo Bypass é igual ao arquivo local
        $this->assertSame($response, $file);
    }
}
```

</details>

### Exemplos de Testes

📚 Veja exemplos completos de utilização do Bypass em testes com [Pest PHP](https://github.com/ciareis/bypass/blob/main/tests/BypassPestTest.php) e [PHPUnit](https://github.com/ciareis/bypass/blob/main/tests/BypassPhpUnitTest.php) para o exemplo de serviço [GithubRepoService](https://github.com/ciareis/bypass/blob/main/tests/Services/GithubRepoService.php).

## Créditos

- [Leandro Henrique](https://github.com/emtudo)
- [Todos os Contribuidores](../../contributors)

E um agradecimento especial para o [@DanSysAnalyst](https://github.com/dansysanalyst)

### Inspiração

Código inspirado no pacote [Bypass](https://github.com/PSPDFKit-labs/bypass)
