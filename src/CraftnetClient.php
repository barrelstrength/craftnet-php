<?php

namespace barrelstrength\craftnetphp;

use GuzzleHttp\Client;

class CraftnetClient
{
    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string Craft ID Account username
     */
    protected $username;

    /**
     * @var string Craft ID Account API Token
     */
    protected $apiToken;

    /**
     * @var PluginLicenses Class
     */
    public $pluginLicenses;

    /**
     * CraftnetClient constructor.
     *
     * @param $username
     * @param $apiToken
     */
    public function __construct($username, $apiToken)
    {
        // Set Client
        $this->setClient();

        $this->pluginLicenses = new PluginLicenses($this);

        $this->username = $username;
        $this->apiToken = $apiToken;
    }

    /**
     * Sets the client
     */
    public function setClient()
    {
        $this->httpClient = new Client();
    }

    /**
     * Gets the Client
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->httpClient;
    }

    /**
     * Returns an array of the username and apiToken
     *
     * @return array
     */
    protected function setAuth()
    {
        return [$this->username, $this->apiToken];
    }

    /**
     * Sends a GET request to the Craftnet API
     *
     * @param       $endpoint
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($endpoint)
    {
        return $this->httpClient->request('GET', 'https://api.craftcms.com/v1/'.$endpoint, [
            'auth' => $this->setAuth()
        ]);
    }

    /**
     * Sends a POST request to the Craftnet API
     *
     * @param       $endpoint
     * @param array $options
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($endpoint, array $options = [])
    {
        $jsonValues = [];

        if (isset($options['json'])) {
            $jsonValues = $options['json'];
        }

        return $this->httpClient->request('POST', 'https://api.craftcms.com/v1/'.$endpoint, [
            'auth' => $this->setAuth(),
            'json' => $jsonValues
        ]);
    }
}