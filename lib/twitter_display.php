<?php
	// require the Twitter access class
	require_once('Twitter.php');

        // array of crew member Twitter handles
        $crew = array('ramsey',
                      'lisamusing',
                      'NickASloan');

	// array of community_sponsors member Twitter handles
	$community_sponsors = array('croscon');

	// array of Twitter data for each community_sponsors member
	$data['community_sponsors'] = array('croscon);
        foreach ($community_sponsors as $username) {
            $data['community_sponsors'][] = Twitter::profile($username);
        }

        foreach ($data['community_sponsors'] as $key => $person) {
	    // create temp array of first names for sorting with later
            $cnames[$key] = strtolower($person['name']);
            $data['community_sponsors'][$key]['description'] = htmlentities($person['description'], ENT_QUOTES, 'UTF-8');
        }

echo "community sponsors<br>";
	// Sort people by first name using temporary arrays of first names.
	array_multisort($cnames, $data['community_sponsors']);
	foreach ($data['community_sponsors'] as $person) {
		echo $person['screen_name']."<br>";
		echo "<img src=".$person['profile_image_url']."><br>";
		echo $person['name']."<br>";
		echo $person['description']."<br>";
		echo $person['url']."<br><br><br>";
	}


?>
