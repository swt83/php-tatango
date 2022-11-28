<?php

namespace Travis;

class Tatango
{
    public static function run($user, $apikey, $method, $arguments, $request_type = 'GET')
    {
        // set endpoint
        $url = 'https://app.tatango.com/api/v2/'.$method.'?';

        // build auth string
        $auth = $user.':'.$apikey;

        // build query
        if (!empty($arguments))
        {
            foreach($arguments as $key => $value)
            {
                $url .= '&'.$key.'='.urlencode($value);
            }
        }

        // setup curl request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERPWD, $auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($request_type));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arguments));
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // catch error...
        if (curl_errno($ch))
        {
            // report
            #$errors = curl_error($ch);

            // close
            curl_close($ch);

            // return false
            return false;
        }

        // close
        curl_close($ch);

        // decode response
        return json_decode($response);
    }
}