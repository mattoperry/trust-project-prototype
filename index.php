<?php

require_once( 'vendor/limonade/lib/limonade.php' );
require_once( 'inc/class.trustproject.php');

$TPDomains = new TrustProjectDomains;

/** routes **/

dispatch('/v1/verify/:domain', function( $domain ) { 
	global $TPDomains;
	return json(
		array( 
			'domain' => $domain,
			'verified'	=> $TPDomains->verify( $domain ),
		)
	);	
} );

/** go **/
run();