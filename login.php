<?php
	require("config.php");
	require 'Twitter-API-Login-PHP-master/autoload.php';
	use Abraham\TwitterOAuth\TwitterOAuth;
	session_start();
	
	
	unset($_SESSION['oauth_token']);
	unset($_SESSION['oauth_token_secret']);
	$token = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
	$request_token = $token->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

	

	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

	$token = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
	$url = $token->url('oauth/authenticate', array('oauth_token' => $request_token['oauth_token']));

	header("location:" . $url);

	//$_SESSION['oauth_token'] = $request_token['oauth_token'];
//	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	
	
//	$url = $token->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	
	//print_r($access_token);
//	header("Location: " . $url);
	//echo $url;
	

	?>