<?php

class Twitter
{

    public static function profile($username = '')
    {
        if (empty($username)) {
            return array('error' => 'Username is required');
        }

        // Store cached profiles in /cache for now.
        $cache = dirname($_SERVER['SCRIPT_FILENAME']) . "/cache/cache-twitter-{$username}";
	//echo "cache is" . $cache . "<br>";
        if (file_exists($cache)) {
	//	echo "file exists<br>";
		$file = file_get_contents($cache);
		//echo "file is: ". $file . "<br>";
            return unserialize(file_get_contents($cache));
        } else {
	//	echo "file doesn't";
            $url = "http://api.twitter.com/1/users/show.json?screen_name={$username}";

            // Give Twitter 3 seconds to respond.
            $context = stream_context_create(array('http' => array('timeout' => 3)));

            if (!$json = file_get_contents($url, FALSE, $context)) {
                return array('error' => 'Twitter is not responding.');
            } else {
                $profile = json_decode($json, TRUE);
                
                file_put_contents($cache, serialize($profile));

                return $profile;
            }
        }
    }

}

?>
