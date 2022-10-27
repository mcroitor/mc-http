# mc-http

PHP curl wrapper

Request data encoders allowed:

 - __http_build_query__ - default
 - __json_encode__

## Interface

```php
namespace mc;

class http
{

    public function __construct(string $url, array $options = []);
    public function set_encoder(callable $encoder);
    public function set_option($key, $value);
    public function set_options(array $options);
    public function get(array $data = [], array $options = []);
    public function post(array $data = [], array $options = []);
    public function put(array $data = [], array $options = []);
    public function delete(array $data = [], array $options = []);
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
$http = new \mc\http("https://www.google.com", $opts);
echo $http->get();
```
