# mc-http

PHP curl wrapper

```php
class http
{

    public function __construct(string $url, array $options = []);
    public function set_option($key, $value);
    public function set_options(array $options;
    public function get(array $data = [], array $options = []);
    public function post(array $data = [], array $options = []);
    public function put(array $data = [], array $options = []);
    public function delete(array $data = [], array $options = []);
}
```