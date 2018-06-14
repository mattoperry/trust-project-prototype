<?php

class TrustProjectDomains {
	
	public function verify( $domain ) {
		if ( !$this->validate( $domain ) ) {
			return false;
		}
		return true;
	}
	
	//checks if the domain is well-formed
	private function validate( $domain ) {
		
		if ( count( explode( '.', $domain ) ) < 2 ) {
			return false;
		}
		return ( preg_match( "/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain ) //valid chars check
				&& preg_match( "/^.{1,253}$/", $domain ) //overall length check
				&& preg_match( "/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain ) ); //length of each label
	}	
}