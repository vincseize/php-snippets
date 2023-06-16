# check localhost
if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { // localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
  // what u want
}
if( !in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { // remote 
  # check https
	if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || 
	$_SERVER['HTTPS'] == 1) ||  
	isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&   
	$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
	{
		//  $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$redirect = "https://www.yoursite.com";
		// header('HTTP/1.1 301 Moved Permanently');
		header('Location: ' . $redirect);
		exit();
	}
}
