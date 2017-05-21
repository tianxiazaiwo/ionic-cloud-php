<?php

namespace Tomloprod\IonicCloud\DeployApi;

use Tomloprod\IonicCloud\Request;

/**
 * Class Deploys
 *
 * Stores ionic deploy api methods related to Deploys.
 * More info: https://docs.ionic.io/api/endpoints/deploy.html
 *
 * @package Tomloprod\IonicCloud\DeployApi
 */
class Deploys extends Request {

    private static $endPoints = [
        'list' => '/deploys', // GET
        'create' => '/deploys', // POST
    ];

    /**
     * List recent deploys
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#gets Ionic documentation
     * @param array $parameters
     * @return object $response
     */
    public function paginatedList($parameters = []) {
        return $this->sendRequest(
            self::METHOD_GET,
            self::$endPoints['list'] . '?' . http_build_query($parameters)
        );
    }

    /**
     * Deploy an App Snapshot to the specified Channel
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#posts Ionic documentation
     * @param array $parameters
     * @return object $response
     */
    public function create($parameters) {
        return $this->sendRequest(
            self::METHOD_POST,
            self::$endPoints['create'] . '?' . http_build_query($parameters)
        );
    }
}
