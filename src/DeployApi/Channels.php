<?php

namespace Tomloprod\IonicCloud\DeployApi;

use Tomloprod\IonicCloud\Request;

/**
 * Class Channels
 *
 * Stores ionic deploy api methods related to channels.
 * More info: https://docs.ionic.io/api/endpoints/deploy.html
 *
 * @package Tomloprod\IonicCloud\DeployApi
 */
class Channels extends Request {

    private static $endPoints = [
        'list' => '/deploy/channels', // GET
        'create' => '/deploy/channels', // POST
        'retrieve' => '/deploy/channels/:channel_id', // GET
        'retrieveByTag' => '/deploy/channels/:tag', // GET
        'update' => '/deploy/channels/:channel_id', // PATCH
        'delete' => '/deploy/channels/:channel_id', // DELETE
    ];

    /**
     * Paginated listing of Channels
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#get-channels Ionic documentation
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
     * Create a deploy channel
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#post-channels Ionic documentation
     * @param array $parameters
     * @return object $response
     */
    public function create($parameters) {
        return $this->sendRequest(
            self::METHOD_POST,
            self::$endPoints['create'] . '?' . http_build_query($parameters)
        );
    }

    /**
     * Update a deploy channel
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#patch-channels-channel_id Ionic documentation
     * @param string $channelId - Channel id
     * @param array $parameters
     * @return object $response
     */
    public function update($channelId, $parameters) {
        return $this->sendRequest(
            self::METHOD_PATCH,
            str_replace(':channel_id', $channelId, self::$endPoints['update'] . '?' . http_build_query($parameters))
        );
    }

    /**
     * Retrieve a single Channel
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#get-channels-channel_id Ionic documentation
     * @param string $channelId - Channel ID
     * @return object $response
     */
    public function retrieve($channelId) {
        return $this->sendRequest(
            self::METHOD_GET,
            str_replace(':channel_id', $channelId, self::$endPoints['retrieve'])
        );
    }

    /**
     * Retrieve a single Channel by it’s tag
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#get-channels-tag Ionic documentation
     * @param string $tag - Channel Tag
     * @return object $response
     */
    public function retrieveByTag($tag) {
        return $this->sendRequest(
            self::METHOD_GET,
            str_replace(':tag', $tag, self::$endPoints['retrieveByTag'])
        );
    }

    /**
     * Deletes a deploy channel
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#delete-channels-channel_id Ionic documentation
     * @param string $channelId - Channel ID
     * @return object $response
     */
    public function delete($channelId) {
        return $this->sendRequest(
            self::METHOD_DELETE,
            str_replace(':channel_id', $channelId, self::$endPoints['delete'])
        );
    }

}
