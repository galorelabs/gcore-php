<?php
class GCore
{
    public function getURL()
    {
        return  "http://qa.api.gcore.galoretv.com";
    }
    private static function getHeader()
    {
        $api_key = null;
        $api_secret = null;
        return $header = array("Accept: application/json", "Authorization: $api_key:$api_secret", "Content-Type: application/json");
    }
    protected static function runCURL($URL, $html, $data)
    {
        $header = GCore::getHeader();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        if ($html != null)
        {
            switch($html)
            {
                case "PUT":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    break;
                case "POST":
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    break;
            }
        }
        $result=curl_exec ($ch);
        curl_close ($ch);
        return $result;
    }
    protected static function appendURL($params)
    {
        $URL = GCore::getURL();

        if ($params["store_id"] != null)
        {
            //Initial Append of URL
            $store_id = $params["store_id"];
            if ($params["id"] != null)
            {
                $id = $params["id"];
                return $URL."/stores/$store_id/sales_orders/$id";
            }
            else
            {
                $www = $URL."/stores/$store_id/sales_orders/?pretty=true";
                //Checking for Hash
                if ($params["page"] != null || $params["limit"] != null)
                {
                    return GCore::appendHash($www, $params);
                }
                else
                {
                    return $www;
                }
            }
        }
        return null;
    }
    protected static function appendJSON($params)
    {
        if ($params["data"] != null)
        {
            return json_encode($params["data"]);
        }
        else
        {
            return null;
        }
    }
    protected static function appendHash($URL, $params)
    {
        if ($params["page"] != null)
        {
            $page = $params["page"];
            $URL = $URL."&page=$page";
        }
        if ($params["limit"] != null)
        {
            $limit = $params["limit"];
            $URL = $URL."&limit=$limit";
        }
        return $URL;
    }
}
?>