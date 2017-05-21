<?php

namespace Tomloprod\IonicCloud\PushApi;

  /**
  * Ionic API Push
  *
  * @package Tomloprod\IonicCloud\PushApi
  * @author Tomás L.R (@tomloprod)
  * @author Ramon Carreras (@ramoncarreras)
  */
class Push {

    /**
     * Notifications class instance.
     *
     * @var Notifications
     */
    public $notifications;

    /**
     * DeviceTokens class instance.
     *
     * @var DeviceTokens
     */
    public $deviceTokens;

    /**
     * Messages class instance.
     *
     * @var Messages
     */
    public $messages;

    /**
     * Push constructor.
     *
     * @param $ionicProfile
     * @param $IonicCloudToken
     */
    public function __construct($ionicProfile, $IonicCloudToken) {
        $this->notifications = new Notifications($ionicProfile, $IonicCloudToken);
        $this->deviceTokens = new DeviceTokens($ionicProfile, $IonicCloudToken);
        $this->messages = new Messages($ionicProfile, $IonicCloudToken);
    }

}
