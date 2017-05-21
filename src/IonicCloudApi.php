<?php

namespace Tomloprod\IonicCloud;

use Tomloprod\IonicCloud\Api\Auth\Auth,
    Tomloprod\IonicCloud\Api\Deploy\Deploy,
    Tomloprod\IonicCloud\Api\Push\Push;

/**
 * Ionic Cloud Api
 *
 * @version 1.0.2
 * @package Tomloprod\IonicCloud
 * @category  Library
 */
class IonicCloudApi {

    /**
     * Push class instance.
     *
     * @var Push
     */
    public $push;

    /**
     * Deploy class instance.
     *
     * @var Deploy
     */
    public $deploy;

    /**
     * Auth class instance.
     *
     * @var Auth
     */
    public $auth;


    /**
     * Ionic cloud api constructor.
     *
     * @param $ionicProfile
     * @param $IonicCloudToken
     */
    public function __construct($ionicProfile, $IonicCloudToken) {
        $this->push = new Push($ionicProfile, $IonicCloudToken);
        $this->deploy = new Deploy($ionicProfile, $IonicCloudToken);
        $this->auth = new Auth($ionicProfile, $IonicCloudToken);
    }

}
