<?php

namespace Tomloprod\IonicCloud\Api\Deploy;

/**
 * Ionic API Deploy
 *
 * @package Tomloprod\IonicCloud\Api\Deploy
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
     * @var Snapshots
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
