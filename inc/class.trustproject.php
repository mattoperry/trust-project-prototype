<?php
use Google\Cloud\Datastore\DatastoreClient;

class TrustProjectDomains {
	
	private $datastore;
	private $google_project_id = 'trust-project-prototype';
	
	public function verify( $domain ) {
		if ( !$this->validate( $domain ) ) {
			return false;
		}
		$this->query_domain( $domain );
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
	
	private function query_domain( $domain ) {
		$this->init_datastore();
		$key = $this->datastore->key( 'Domain', $domain );
		$result = $this->datastore->lookup( $key );
		print_r( $domain);
		die;
	}
	
	private function init_datastore() {
		if ( !$this->datastore ) {
			$this->datastore = new DatastoreClient( $this->$google_project_id );
		}
	}
}