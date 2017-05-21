<?php

namespace Tomloprod\IonicCloud\DeployApi;

/**
 * Ionic API Deploy
 *
 * @package Tomloprod\IonicCloud\DeployApi
 */
class Deploy {

    /**
     * Channels class instance.
     *
     * @var Channels
     */
    public $channels;

    /**
     * Deploys class instance.
     *
     * @var Deploys
     */
    public $deploys;

    /**
     * Snapshots class instance.
     *
     * @var Deploys
     */
    public  $snapshots;


    /**
     * Deploy constructor.
     *
     * @param $ionicProfile
     * @param $IonicCloudToken
     */
    public function __construct($ionicProfile, $IonicCloudToken) {
        $this->channels = new Channels($ionicProfile, $IonicCloudToken);
        $this->deploys = new Deploys($ionicProfile, $IonicCloudToken);
        $this->snapshots = new Snapshots($ionicProfile, $IonicCloudToken);
    }

}
