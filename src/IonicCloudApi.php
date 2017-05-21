<?php

namespace Tomloprod\IonicCloud;

use Tomloprod\IonicCloud\PushApi\Push;

// TODO: use Tomloprod\IonicCloud\AuthApi\Auth;
// TODO: use Tomloprod\IonicCloud\DeployApi\Deploy;

/**
 * Ionic Cloud Api
 *
 * @version 1.0.0
 * @package Tomloprod\IonicCloud
 * @category  Library
 * @author  Tomás L.R (@tomloprod)
 * @author  Ramon Carreras (@ramoncarreras)
 */
class IonicCloudApi {

    /**
     * Push class instance.
     *
     * @var Push
     */
    public $push;

    /**
     * Auth class instance.
     *
     * @var Auth
     */
    //public $auth;

    /**
     * Deploy class instance.
     *
     * @var Deploy
     */
    //public $deploy;

    /**
     * Push constructor.
     *
     * @param $ionicProfile
     * @param $IonicCloudToken
     */
    public function __construct($ionicProfile, $IonicCloudToken) {
        $this->push = new Push($ionicProfile, $IonicCloudToken);
        // TODO: $this->auth = new Auth($ionicProfile, $IonicCloudToken);
        // TODO: $this->deploy = new Deploy($ionicProfile, $IonicCloudToken);
    }

}
