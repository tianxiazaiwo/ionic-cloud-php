<?php

namespace Tomloprod\IonicCloud\Api\Auth;

use Tomloprod\IonicCloud\Request\Request;

/**
 * Class Auth
 *
 * Stores ionic deploy api methods related to Auth.
 * More info: https://docs.ionic.io/api/endpoints/auth.html
 *
 * @package Tomloprod\IonicCloud\Api\Auth
 */
class Auth extends Request {

    private static $endPoints = [
        'list' => '/users', // GET
        'create' => '/users', // POST
        'retrieve' => '/users/:user_uuid', // GET
        'retrieveCustom' => '/users/:user_uuid/custom', // GET
        'replaceCustom' => '/users/:user_uuid/custom', // PUT
        'update' => '/users/:user_uuid', // PATCH
        'delete' => '/users/:user_uuid', // DELETE
    ];

    /**
     * Returns a paginated collection of Users
     *
     * @link https://docs.ionic.io/api/endpoints/auth.html#get-users Ionic documentation
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
     * Create a new User.
     * This is only applicable for the Email/Password provider.
     * Other providers will automatically generate the user upon a successful login.
     *
     * @link https://docs.ionic.io/api/endpoints/auth.html#post-users Ionic documentation
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
      * Retrieve a User
      * @link https://docs.ionic.io/api/endpoints/auth.html#get-users-user_uuid Ionic documentation
      * @param string $userUUID - user UUID
      * @param boolean $customData - If true, will return the user custom data.
      * @return object $response
      */
     public function retrieve($userUUID, $customData = false) {
         $endPoint = (!$customData) ? self::$endPoints['retrieve'] : self::$endPoints['retrieveCustom'] ;
         return $this->sendRequest(
              self::METHOD_GET,
             str_replace(':user_uuid', $userUUID, $endPoint)
         );
     }

     /**
      * TODO: Sets a new custom data object for a User.
      * The JSON body sent to this endpoint will become the new custom data object for the user.
      *
      * @param string $userUUID - User UUID
      * @return object
      */
     /*public function replace($userUUID) {
         $response = $this->sendRequest(
             self::METHOD_PUT,
             str_replace(':user_uuid', $userUUID, self::$endPoints['replaceCustom']),
             $this->requestData
         );
         $this->resetRequestData();
         return $response;
     }*/

     /**
      * Update a User
      *
      * @link https://docs.ionic.io/api/endpoints/auth.html#patch-users-user_uuid Ionic documentation
      * @param string $userUUID - User ID
      * @param array $parameters
      * @return object $response
      */
     public function update($userUUID, $parameters) {
         return $this->sendRequest(
             self::METHOD_PATCH,
             str_replace(':user_uuid', $userUUID, self::$endPoints['update'] . '?' . http_build_query($parameters))
         );
     }

     /**
      * Delete a User
      *
      * @link https://docs.ionic.io/api/endpoints/auth.html#delete-users-user_uuid Ionic documentation
      * @param string $userUUID - User ID
      * @return object $response
      */
     public function delete($userUUID) {
         return $this->sendRequest(
             self::METHOD_DELETE,
             str_replace(':user_uuid', $userUUID, self::$endPoints['delete'])
         );
     }

}
