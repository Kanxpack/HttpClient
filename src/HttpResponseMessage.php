<?php
namespace Kanxpack\HttpClient;

class HttpResponseMessage {

    private static $instance;
    protected static $response = '';

    public static function getInstance() : self
    { 
        return empty(self::$instance) ? (new self()) : self::$instance; 
    }

    protected static function setResponse(array $response) : self
    {
        self::$response = $response;
        return self::getInstance();
    }

    public static function getResponse() : array
    {
        return self::$response;
    }

    public static function set(array $response) : self
    {
        self::setResponse($response);
        return self::getInstance();
    }

    public static function get(array $response) : self
    {
        return self::getResponse($response);
    }

    public static function ensureSuccessStatusCode() : bool
    {
        if (isset(self::getResponse()['status']) && self::getResponse()['status']  == '200') {
            return true;
        }
        return false;
    }

    public static function getResult() : array
    {
        if (isset(self::getResponse()['result']) && self::getResponse()['result']) {
            return self::getResponse()['result'];
        }
        return false;
    }

    public static function getRespone() : array
    {
        return self::getResponse();
    }
}