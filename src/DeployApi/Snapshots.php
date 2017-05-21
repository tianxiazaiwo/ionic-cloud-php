<?php

namespace Tomloprod\IonicCloud\DeployApi;

use Tomloprod\IonicCloud\Request;

/**
 * Class Snapshots
 *
 * Stores ionic deploy api methods related to Snapshots.
 * More info: https://docs.ionic.io/api/endpoints/deploy.html
 *
 * @package Tomloprod\IonicCloud\DeployApi
 */
class Snapshots extends Request {

    private static $endPoints = [
        'list' => '/deploy/snapshots', // GET
        'retrieve' => '/deploy/snapshots/:snapshot_id', // GET
        'update' => '/deploy/snapshots/:snapshot_id', // PATCH
    ];

    /**
     * Paginated listing of App Snapshots
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#get-snapshots Ionic documentation
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
     * Update a Snapshot
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#patch-channels-channel_id Ionic documentation
     * @param string $channelId - Channel id
     * @param array $parameters
     * @return object $response
     */
    public function update($snapshotId, $parameters) {
        return $this->sendRequest(
            self::METHOD_PATCH,
            str_replace(':snapshot_id', $snapshotId, self::$endPoints['update'] . '?' . http_build_query($parameters))
        );
    }

    /**
     * Retrieve a Snapshot
     *
     * @link https://docs.ionic.io/api/endpoints/deploy.html#get-snapshots-snapshot_id Ionic documentation
     * @param string $snapshotId - Snapshot ID
     * @return object $response
     */
    public function retrieve($snapshotId) {
        return $this->sendRequest(
            self::METHOD_GET,
            str_replace(':snapshot_id', $snapshotId, self::$endPoints['retrieve'])
        );
    }



}
