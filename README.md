# mc-http

PHP curl wrapper

Request data encoders allowed:

- __http_build_query__ - default
- __json_encode__

## Interface

```php
namespace Mc;

class Http
{

    public function __construct(string $url, array $options = []);
    public function SetEncoder(callable $encoder);
    public function SetOption($key, $value);
    public function SetOptions(array $options);
    public function Get(array $data = [], array $options = []): string|false;
    public function Post(array $data = [], array $options = []): string|false;
    public function Put(array $data = [], array $options = []): string|false;
    public function Delete(array $data = [], array $options = []): string|false;
}
```

Options are curl options (aka `CURLOPT_*`).

## Recommendations

If you have SSL certificate error, use the next options:

```php
$opts = [
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => true
];
$http = new \Mc\Http("https://www.google.com", $opts);
echo $http->Get();
```
