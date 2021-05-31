<div align="center">
	<p><img  src="docs/img/logo.png" alt="Logo do Bypass"></p>
</div>

[![PHP Composer](https://github.com/ciareis/bypass/actions/workflows/php.yml/badge.svg?branch=main)](https://github.com/ciareis/bypass/actions/workflows/php.yml)
[![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/ciareis/bypass)](https://packagist.org/packages/ciareis/bypass)
[![Packagist Downloads](https://img.shields.io/packagist/dt/ciareis/bypass)](https://packagist.org/packages/ciareis/bypass)
[![Packagist License](https://img.shields.io/packagist/l/ciareis/bypass)](https://github.com/ciareis/bypass/blob/main/LICENSE.md)
[![Last Updated](https://img.shields.io/github/last-commit/ciareis/bypass.svg)](https://github.com/ciareis/bypass/commits/main)

------ 
# Bypass para PHP

Para documentação em inglês: [🇺🇸](https://github.com/ciareis/bypass/blob/main/readme.md)

`Bypass` para PHP fornece uma maneira rápida para você criar um servidor HTTP personalizado, a ser utilizado no lugar de um servidor HTTP real, de modo que você tenha respostas pré-formuladas como retorno as requisições lançadas pelos clientes a ele conectados. Esta facilidade é mais útil em um ambiente de testes, onde você poderá ter a necessidade de criar um servidor HTTP simulado(Mock) para testar o seu cliente HTTP, verificando como ele irá lidar com diferentes tipos de respostas vindas do servidor.

## Requerimentos

- PHP 8.0

## Instalação

Para instalar utilizando o composer, execute:

```bash
composer require --dev ciareis/bypass
```

## Começando

### Caso de uso

Para fins de demonstração:

1. Imagine que você tem um serviço denominado de `TotalScoreService` e deve escrever um teste para ele.
2. Este serviço calcula a pontuação total de um usuário específico em um jogo, através de seu nome de usuário.
3. Para obter a pontuação, este serviço consome uma API fictícia no endereço `emtudo-games.com/v1/score/::USERNAME::`
4. A API consumida retorna o código de status HTTP([HTTP Status Code](https://developer.mozilla.org/pt-BR/docs/Web/HTTP/Status)) `200` e um JSON contendo em seu corpo uma lista de jogos:

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

Vamos testar utilizando o Bypass.

### 1. Comece iniciando o servidor Bypass

O Bypass sempre será executado em `http://localhost`. Para iniciar o servidor, utilize:

```php
$bypass = Bypass::open();
```

Por padrão, o Bypass escutará em uma porta de número aleatória.
Caso seja necessário, um número de porta específico pode ser passado como argumento:

```php
// iniciar o Bypass na porta de número 8080
$bypass = Bypass::open(8080);
```

### 2. Endereço(URL) e Porta do servidor Bypass

O endereço(URL) e porta do servidor podem ser recuperados usando o método `getBaseUrl()`:

 ```php
 $bypass_url = $bypass->getBaseUrl(); //por exemplo: http://localhost:16819
 ```
 
Se você precisar de recuperar apenas o número da porta, use o método `getPort()`:

 ```php
 $bypass_port = $bypass->getPort(); //por exemplo: 16819
 ```

### 3. Adicionar uma rota(route)

Agora, vamos criar uma rota para ser acessada pelo serviço `TotalScoreService` usando as seguintes opções:

- **Method**: a solicitação será realizada usando o método HTTP `get`
- **URI**: a solicitação será realizada no URI `/v1/score/USERNAME` 
- **Status number** o código de status HTTP retornado será `200` (OK, sucesso) 
- **Body**: um corpo de texto codificado no formato (JSON).

E o código será assim:

```php
//O corpo de texto codificado em (JSON) contendo a resposta da API com a listagem de games e suas pontuações
$body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';

//Rota do Bypass server 
$bypass->addRoute(method: 'get', uri: '/v1/score', status: 200, body: $body);
```

O método `addRoute()` aceita os seguintes parâmetros:

| Opção | Descrição
|-------|-----------|
|**HTTP Method**| *(string) $method* - Método HTTP a ser esperado pelo Bypass. (GET/POST/PUT/PATCH/DELETE) |
|**URI**| *(string) $uri* - URI a ser servido pelo Bypass |
|**Status**| *(int) $status* - Código de status HTTP a ser retornado pelo Bypass (padrão: 200)|
|**Body**|  *(string) $body*  - Corpo de texto codificado em formato JSON a ser servido pelo Bypass (opicional)|
|**Times**|  * (int) $time*  - Determina a quantidade de vezes em que a rota deverá ser acessada (padrão: 1) |

O método `addRouteFile()` aceita os seguintes parâmetros:

| Opção | Descrição
|-------|-----------|
|**HTTP Method**| *(string) $method* - Método HTTP a ser esperado pelo Bypass. (GET/POST/PUT/PATCH/DELETE) |
|**URI**| *(string) $uri* - URI a ser servido pelo Bypass |
|**Status**| *(int) $status* - Código de status HTTP a ser retornado pelo Bypass (padrão: 200)|
|**File**|  * (binary) $file*  - Arquivo binário a ser servido pelo Bypass. |
|**Times**|  * (int) $time*  - Determina a quantidade de vezes em que a rota deverá ser acessada (padrão: 1) |

O método `assertRoute()` retorna uma exceçao(exception) se as rotas definidas não forem alcançadas pelo número de vezes esperado.


### 4. Utilize o serviço com o endereço(URL) fornecido pelo Bypass

Neste momento, você já pode configurar o URL de acesso a API no seviço `TotalScoreService`, direcionando-o para o URL servida pelo Bypass ao invés do URL original da API (`emtudo-games.com/v1/score/`):

```php
$bypass = Bypass::open();
$bypass_url = $bypass->getBaseUrl();

$service = new TotalScoreService();
$response = $service
  ->setBaseUrl($bypass_url) // Define o URL a ser escutado pelo Bypass
  ->getTotalScoreByUsername("johndoe"); // retorna 35
```

### 5. Interromper(stop) ou encerrar(shutdown)

O Bypass pode ser interrompido ou encerrado com os seguintes métodos:

Para interromper:
`$bypass->stop();`

Para encerrar:
`$bypass->down();`

## Exemplos

### Exemplos rápidos

Clique abaixo para visualizar trechos de códigos utilizando [Pest PHP](https://pestphp.com) e [PHPUnit](https://phpunit.de).


<details><summary>Pest PHP</summary>

```php
it('properly returns the total score by username', function () {

  // Preparação
  $bypass = Bypass::open();

  $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
  
  $bypass->addRoute(method: 'get', uri: '/v1/score', status: 200, body: $body);
  
  $service = new TotalScoreService();
  $response = $service
    ->setBaseUrl($bypass->getBaseUrl())
    ->getTotalScoreByUsername("johndoe");

  expect($response)->toEqual(35);
});
```
</details>

<details><summary>PHPUnit</summary>

```php
class BypassTest extends TestCase
{
  public function test_total_score_by_username(): void
  {

  // Preparação
  $bypass = Bypass::open();

  $body = '{"games":[{"name":"game 1","points":25},{"name":"game 2","points":10}],"is_active":true}';
  
  $bypass->addRoute(method: 'get', uri: '/v1/score', status: 200, body: $body);

  $service = new TotalScoreService();
  $response = $service
      ->setBaseUrl($bypass->getBaseUrl())
      ->getTotalScoreByUsername("johndoe");

      $this->assertSame(35, $response);
  }
}
```
</details>

📚 Veja exemplos de utilização do Bypass em testes completos com [Pest PHP](https://github.com/ciareis/bypass/blob/main/tests/BypassPestTest.php) e [PHPUnit](https://github.com/ciareis/bypass/blob/main/tests/BypassTest.php).
 

## Créditos

- [Leandro Henrique](https://github.com/emtudo)
- [Todos os Contribuidores](../../contributors)

E um agradecimento especial para o [@DanSysAnalyst](https://github.com/dansysanalyst) pela documentação criada

## Inspiração

Código inspirado no pacote [Bypass](https://github.com/PSPDFKit-labs/bypass)
