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
		return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
				&& preg_match("/^.{1,253}$/", $domain_name) //overall length check
				&& preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
	
	}	
}