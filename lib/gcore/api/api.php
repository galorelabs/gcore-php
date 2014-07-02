<?php
class GCore
{
    public function getURL()
    {
        return  "http://qa.api.gcore.galoretv.com";
    }
    protected static function getHeader()
    {
        $api_key = null;
        $api_secret = null;
        return $header = array("Accept: application/json", "Authorization: $api_key:$api_secret", "Content-Type: application/json");
    }
}
?>