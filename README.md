# JSON-RPC 2.0 Client and Server with Laravel 7.0

## Client

```php
class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'data';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => config('services.data.base_uri')
        ]);
    }

    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }

}
```

## Server

```php
Route::post('/data', function (Request $request, JsonRpcServer $server) {
    return $server->handle($request);
});
```

```php
class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'data';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => config('services.data.base_uri')
        ]);
    }

    public function send(string $method, array $params): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        return json_decode($response, true);
    }

}
```

## Example
-->
```json
 {"jsonrpc": "2.0", "method": "getPageById","params": {"page_uid": "f09f7c040131"}, "id": "54645"}
 
```
<--
```json
{
    "jsonrpc": "2.0",
    "result": {
        "id": 2,
        "title": "Index Page",
        "content": "Content",
        "description": "Description",
        "page_uid": "f09f7c040131",
        "created_at": "2020-04-23T12:52:11.000000Z",
        "updated_at": "2020-04-23T12:52:11.000000Z"
    },
    "id": "54645"
}
```


