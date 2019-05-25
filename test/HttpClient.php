<?php

declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace SwoftTest;

use GuzzleHttp\Client;
use Swoft\Helper\ArrayHelper;

class HttpClient
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct($baseUri = 'http://127.0.0.1:9501')
    {
        $this->client = new Client([
            'base_uri' => $baseUri,
            'timeout' => 2,
        ]);
    }

    public function get($uri, $data = [], $headers = [])
    {
        if ($data) {
            $uri .= '?' . http_build_query($data);
        }
        $response = $this->client->get($uri, [
            'headers' => $headers,
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function post($uri, $data = [], $headers = [])
    {
        $response = $this->client->post($uri, [
            'headers' => $headers,
            'form_params' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function json($uri, $data = [], $headers = [])
    {
        $headers['Content-Type'] = 'application/json';
        $response = $this->client->post($uri, [
            'json' => $data,
            'headers' => $headers,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function file($uri, $data = [], $headers = [])
    {
        $multipart = [];
        if (ArrayHelper::isAssociative()($data)) {
            $data = [$data];
        }

        foreach ($data as $item) {
            $name = $item['name'];
            $file = $item['file'];

            $multipart[] = [
                'name' => $name,
                'contents' => fopen($file, 'r'),
                'filename' => basename($file),
            ];
        }

        $response = $this->client->post($uri, [
            'headers' => $headers,
            'multipart' => $multipart,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
