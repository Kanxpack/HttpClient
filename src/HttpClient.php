<?php
namespace Kanxpack\HttpClient;

use Kanxpack\CurlGet\CurlGet;
use Kanxpack\HttpClient\HttpResponseMessage;

class HttpClient {

	private static $instance;
	protected static $httpResponseMessage;

    public static function getInstance() : self
    { 
    	return empty(self::$instance) ? (new self()) : self::$instance; 
    }

    protected static function setHttpResponseMessage(array $httpResponseMessage) : self
    {
        self::$httpResponseMessage = HttpResponseMessage::set($httpResponseMessage);
        return self::getInstance();
    }

	public static function get(string $url) : self
	{
        self::setHttpResponseMessage(CurlGet::get($url)->getResultArray());
		return self::getInstance();
	}

    public static function getHttpResponseMessage()
    {
        return self::$httpResponseMessage;
    }
}