<?php

namespace mc;

class http
{
    private string $url;
    private array $options = [];

    public function __construct(string $url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    private static function request(array $options){

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        if (!$result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    public function set_option($key, $value) {
        $this->options[$key] = $value;
    }

    public function set_options(array $options){
        foreach($options as $key => $value){
            $this->options[$key] = $value;
        }
    }

    public function get(array $data = [], array $options = [])
    {
        $q = strpos($this->url, '?') === false ? '?' : '';
        $this->set_options($options);
        $this->options[CURLOPT_HTTPGET] = true;
        $this->options[CURLOPT_URL] = $this->url . $q . http_build_query($data);
        return self::request($this->options);
    }

    public function post(array $data = [], array $options = [])
    {
        $this->set_options($options);
        $options[CURLOPT_POST] = true;
        $options[CURLOPT_URL] = $this->url;
        $options[CURLOPT_FRESH_CONNECT] = true;
        $options[CURLOPT_POSTFIELDS] = http_build_query($data);
        return self::request($options);
    }

    public function put(array $data = [], array $options = [])
    {
        $this->set_options($options);
        $options[CURLOPT_CUSTOMREQUEST] = "PUT";
        $options[CURLOPT_URL] = $this->url;
        $options[CURLOPT_FRESH_CONNECT] = true;
        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_FORBID_REUSE] = true;
        $options[CURLOPT_POSTFIELDS] = http_build_query($data);
        return self::request($options);
    }

    public function delete(array $data = [], array $options = [])
    {
        $q = strpos($this->url, '?') === false ? '?' : '';
        $this->set_options($options);
        $options[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $options[CURLOPT_URL] = $this->url . $q . http_build_query($data);
        $options[CURLOPT_FRESH_CONNECT] = true;
        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_FORBID_REUSE] = true;
        $options[CURLOPT_POSTFIELDS] = '';
        return self::request($options);
    }

}
