<?php

    //Declaring Global Variables
    $api_key = null;
    $api_secret = null;
    $endpoint =  "http://qa.api.gcore.galoretv.com";

    function getAuth()
    {
        global $api_key, $api_secret;
        return $api_key. ":" . $api_secret;
    }
    function getURL()
    {
        global $endpoint;
        return $endpoint;
    }
    function getHeader()
    {
        global $api_key, $api_secret;
        return $header = array("Accept: application/json", "Authorization: $api_key:$api_secret", "Content-Type: application/json");
    }
?>