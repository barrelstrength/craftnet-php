<?php

namespace barrelstrength\craftnetphp;

class PluginLicenses
{
    /**
     * @var CraftnetClient
     */
    private $client;

    /**
     * PluginLicenses constructor.
     *
     * @param CraftnetClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Gets one or more licenses for the given Craft ID account
     *
     * @param array $options
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $options = [])
    {
        if (isset($options['key'])) {
            return $this->client->get('plugin-licenses/'.$options['key']);
        }

        return $this->client->get('plugin-licenses');
    }

    /**
     * Creates a license for the given Craft ID account
     *
     * @param array $options
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $options = [])
    {
        $options['json'] = $options;

        return $this->client->post('plugin-licenses', $options);
    }
}