<?
/** microsoft.schema (partial) */

class microsoft_schema extends ldap_schema
{
	var $attribute_schema = array(
		// microsoft.std.schema entries (partial)
		array("name"=>"c",				"data_type"=>"country_code",	"display_name"=>"Country Code"),
		array("name"=>"cn",				"data_type"=>"text",		"display_name"=>"Common Name/Full Name"),
		array("name"=>"description",			"data_type"=>"text",		"display_name"=>"Description"),
		array("name"=>"facsimileTelephoneNumber",	"data_type"=>"text",		"display_name"=>"Fax Number"),
		array("name"=>"givenName",			"data_type"=>"text",		"display_name"=>"Given Name"),
		array("name"=>"homePhone",			"data_type"=>"phone_number",	"display_name"=>"Home Telephone Number"),
		array("name"=>"l",				"data_type"=>"text",		"display_name"=>"Locality (e.g. Town/City)"),
		array("name"=>"mail",				"data_type"=>"text",		"display_name"=>"E-mail Address"),
		array("name"=>"mobile",				"data_type"=>"phone_number",	"display_name"=>"Mobile/Cell Telephone Number"),
		array("name"=>"pager",				"data_type"=>"text",		"display_name"=>"Pager Telephone Number"),
		array("name"=>"physicalDeliveryOfficeName",	"data_type"=>"text",		"display_name"=>"Office"),
		array("name"=>"postalCode",			"data_type"=>"postcode",	"display_name"=>"Postal Code"),
		array("name"=>"sn",				"data_type"=>"text",		"display_name"=>"Surname"),
		array("name"=>"st",				"data_type"=>"text",		"display_name"=>"State (or Province/County)"),
		array("name"=>"telephoneNumber",		"data_type"=>"phone_number",	"display_name"=>"Telephone Number"),
		array("name"=>"thumbnailLogo",			"data_type"=>"image",		"display_name"=>"Thumbnail Logo"),
		array("name"=>"thumbnailPhoto",			"data_type"=>"image",		"display_name"=>"Thumbnail Photograph"),
		array("name"=>"title",				"data_type"=>"text",		"display_name"=>"Job Title"),

		// Added for Windows Server 2003 (or inetOrgPerson kit for Windows 2000 Server)
		array("name"=>"jpegPhoto",			"data_type"=>"image",		"display_name"=>"Photograph"),

		// microsoft.schema entries (partial)
		array("name"=>"company",			"data_type"=>"text",		"display_name"=>"Company"),
		array("name"=>"department",			"data_type"=>"text",		"display_name"=>"Department"),
		array("name"=>"displayName",			"data_type"=>"text",		"display_name"=>"Display/Preferred Name"),
		array("name"=>"info",				"data_type"=>"text_area",	"display_name"=>"General Information"),
		array("name"=>"streetAddress",			"data_type"=>"text_area",	"display_name"=>"Street Address"),
		array("name"=>"url",				"data_type"=>"text",		"display_name"=>"URL (e.g. web page)"),
		array("name"=>"wWWHomePage",			"data_type"=>"text",		"display_name"=>"WWW Home Page")
		);

	// Structural object classes
	var $object_schema = array(
		array("name"=>"organizationalUnit",		"icon"=>"folder.png",	"is_folder"=>true,"rdn_attrib"=>"ou","display_name"=>"Organizational Unit","can_create"=>true),
		array("name"=>"container",			"icon"=>"folder.png",	"is_folder"=>true,"display_name"=>"Container","can_create"=>true),
		array("name"=>"builtinDomain",			"icon"=>"folder.png",	"is_folder"=>true),
		array("name"=>"lostAndFound",			"icon"=>"folder.png",	"is_folder"=>true),
		array("name"=>"msDS-QuotaContainer",		"icon"=>"folder.png",	"is_folder"=>true),
		array("name"=>"group",				"icon"=>"group24.png",	"is_folder"=>false,"display_name"=>"Group","can_create"=>true),
		array("name"=>"contact",			"icon"=>"contact24.png","is_folder"=>false,"display_name"=>"Contact","can_create"=>true),
		array("name"=>"computer",			"icon"=>"microsoft-active-directory/computer24.png","is_folder"=>false,"display_name"=>"Computer","can_create"=>true),
		array("name"=>"foreignSecurityPrincipal",	"icon"=>"user-alias24.png","is_folder"=>false),
		array("name"=>"user",				"icon"=>"user24.png",	"is_folder"=>false,"display_name"=>"User","can_create"=>true),

		// Proprietary implementation of InetOrgPerson:
		//	- Subclass of proprietary "user" (so listed after it in schema definition)
		//	- Attribute "sn" is not mandatory
		array("name"=>"inetOrgPerson",			"icon"=>"user24.png",	"is_folder"=>false,"display_name"=>"InetOrgPerson","can_create"=>true),
		);

	function __construct(&$ldap_server)
	{
		// delete any pre-existing version of the inetOrgPerson class,
		// to be re-created with MS-specific class inheritance order
		$ldap_server->delete_object_class("inetOrgPerson");

		parent::__construct($ldap_server);
	}
}
?>
