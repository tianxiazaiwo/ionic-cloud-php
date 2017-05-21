<?php

namespace Tomloprod\IonicCloud;

use Tomloprod\IonicCloud\Exception\RequestException;

/**
 * Class Request
 *
 * @package Tomloprod\IonicCloud\Api
 * @author Tomás L.R (@tomloprod)
 * @author Ramon Carreras (@ramoncarreras)
 */
class Request {

    // Available HTTP methods
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    // API URL
    private static $ionicBaseURL = 'https://api.ionic.io';

    // cURL
    public $timeout = 5; // Set timeout to 0 is inadvisable in a production environment
    public $connectTimeout = 5; // Set timeout to 0 is inadvisable in a production environment
    public $sslVerifyPeer = 0;

    // Required for Authorization
    private $ionicProfile;
    private $IonicCloudToken;

    /**
     * Request constructor.
     *
     * @param string $ionicProfile
     * @param string $IonicCloudToken
     */
    public function __construct($ionicProfile, $IonicCloudToken) {
        $this->ionicProfile = $ionicProfile;
        $this->IonicCloudToken = $IonicCloudToken;
    }

    /**
     * Send requests to the Ionic Push API.
     *
     * INFO: https://docs.ionic.io/api/http.html#response-structure
     *
     * @param string $method
     * @param string $endPoint
     * @param string $data
     * @throws RequestException
     * @return object
     */
    public function sendRequest($method, $endPoint, $data = "") {
        $jsonData = json_encode($data);

        $endPoint = self::$ionicBaseURL . $endPoint;

        $curlHandler = curl_init();

        $authorization = sprintf('Bearer %s', $this->IonicCloudToken);

        $headers = [
            'Authorization:' . $authorization,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ];

        curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, $this->sslVerifyPeer);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlHandler, CURLOPT_HEADER, false);

        switch($method) {
            case self::METHOD_POST:
                curl_setopt($curlHandler, CURLOPT_POST, true);
                break;
            case self::METHOD_GET:
            case self::METHOD_DELETE:
            case self::METHOD_PATCH:
                curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, $method);
                break;
        }

        if(!empty($jsonData)) {
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $jsonData);
        }

        curl_setopt($curlHandler, CURLINFO_HEADER_OUT, true);
        curl_setopt($curlHandler, CURLOPT_URL, $endPoint);

        $response = curl_exec($curlHandler);

        $httpStatusCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        curl_close($curlHandler);

        $response = json_decode($response);

        // Exceptions
        if($this->isInvalidResponse($httpStatusCode)) {
            throw new RequestException("Invalid Response", "The response from ionic is invalid", "", $httpStatusCode);
        } else if($this->isClientErrorResponse($httpStatusCode) || $this->isServerErrorResponse($httpStatusCode)) {
            if(empty($response) || empty($response->error)) {
                throw new RequestException($this->isServerErrorResponse($httpStatusCode) ? "Server Error" : "Client Error", RequestException::$statusTexts[$httpStatusCode], "", $httpStatusCode);
            } else {
                throw new RequestException($response->error->type, $response->error->message, $response->error->link, $httpStatusCode);
            }
        }

        // Return response.
        return $response;
    }

    /**
     * Is response valid?
     *
     * @private
     * @param number $statusCode
     * @return bool
     */
    /*private function isValidResponse($statusCode) {
        return !$this->isInvalidResponse($statusCode);
    }*/

    /**
     * Is response invalid?
     *
     * @private
     * @param number $statusCode
     * @return bool
     */
    private function isInvalidResponse($statusCode) {
        return $statusCode < 100 || $statusCode >= 600;
    }

    /**
     * Is there a client error?
     *
     * @private
     * @param number $statusCode
     * @return bool
     */
    private function isClientErrorResponse($statusCode) {
        return $statusCode >= 400 && $statusCode < 500;
    }

    /**
     * Was there a server side error?
     *
     * @private
     * @param number $statusCode
     * @return bool
     */
    private function isServerErrorResponse($statusCode) {
        return $statusCode >= 500 && $statusCode < 600;
    }

}
