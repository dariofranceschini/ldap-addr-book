<?php
/** OpenLDAP BDB Backend On-Line Configuration (OLC) schema (partial) */

class openldap_back_bdb_schema extends ldap_schema
{
	function __construct(&$ldap_server)
	{
		// Structural object classes
		$this->object_schema = array(
			array("name"=>"olcBdbConfig",			"icon"=>"openldap/db.png",		"is_folder"=>false,"rdn_attrib"=>"olcDatabase","display_name"=>gettext("BDB Database"),"required_attribs"=>"olcSuffix,olcDbDirectory","parent_class"=>"olcDatabaseConfig")
			);

		parent::__construct($ldap_server);
	}
}
?>