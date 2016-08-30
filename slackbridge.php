<?php

# Add in the outgoing webhook tokens. It is recommended that you store these and the incoming webhooks elsewhere.

$team1token = 'Put your token here.';
$team2token = 'Put the other teams token here.';

$team1slackurl = 'Put your incoming webhook url here.';
$team2slackurl = 'Put the other teams incoming webhook url here.';

$slacktoken = $_POST['token'];
$slackdomain = $_POST['team_domain'];
$slackuserid = $_POST['user_id'];
$slackusername = $_POST['user_name'];
$slacktext = $_POST['text'];

$slackbot = 'USLACKBOT';

$botusername = $slackusername . ' ' . '(' . $slackdomain . ')';
$md5hash = md5($slackuserid);

# This pulls a random avatar image that is unique to the user to visually mark different users from the other team.
$icon_url = "http://api.adorable.io/avatars/40/$md5hash";

# Super simple processor to send the messages to the right place.

if ($slackuserid != $slackbot) {
	if ($slacktoken == $team1token) {
	    //Initiate cURL.
		$ch = curl_init($team2slackurl);

		//The JSON data.
		$payload = array(
		   "username" => "$botusername",
		   "text" => "$slacktext",
		   "icon_url" => "$icon_url"
		);

		//Encode the array into JSON.
		$jsonDataEncoded = json_encode($payload);

		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);

		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

		//Execute the request
		$result = curl_exec($ch);
	} elseif ($slacktoken == $team2token) {
	        //Initiate cURL.
		$ch = curl_init($team1slackurl);

		//The JSON data.
		$payload = array(
		   "username" => "$botusername",
		   "text" => "$slacktext",
		   "icon_url" => "$icon_url"
		);

		//Encode the array into JSON.
		$jsonDataEncoded = json_encode($payload);

		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);

		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

		//Execute the request
		$result = curl_exec($ch);
	} else {
	    echo "Validation failed";
	}
} else {
	echo "Validation failed";
}

?>