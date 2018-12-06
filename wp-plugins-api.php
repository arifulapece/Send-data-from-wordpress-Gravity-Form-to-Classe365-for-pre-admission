<?php
/*
Plugin Name:  Classe365 API
Plugin URI:   https://elsclass.com
Description:  An automated Classe365 API
Version:      1.0.0
Author:       Api Developer
Author URI:   https://superglobalhost.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  cl365
Domain Path:  /languages
*/

define( 'CL365_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CL365_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CL365_PLUGIN_VERSION', "1.0.0" );


add_action('gform_after_submission_3', 'cl365_after_submission_form3', 10, 2);

add_action('gform_after_submission_7', 'cl365_after_submission_form7', 10, 2);

function cl365_after_submission_form3($entry, $form){
	$student_mage = null;
	$imgarray = json_decode( rgar( $entry, '53'), true );

	if(is_array($imgarray) && count($imgarray) > 0){
		$student_mage = $imgarray[0];
	}
	
	$applicationData=[
		'text_24'=> rgar( $entry, '4'),
		'text_25'=> rgar( $entry, '5'),
		'text_26'=> rgar( $entry, '6'),
		'first_name'=> rgar( $entry, '7'),
		'father_name'=> rgar( $entry, '8'),
		'last_name'=> rgar( $entry, '9'),
		'text_18'=> rgar( $entry, '10'),
		'text_20'=> rgar( $entry, '46'),
		'text_19'=> rgar( $entry, '15'),
		'student_dob'=> rgar( $entry, '17'),
		'text_22'=> rgar( $entry, '45'),
		'contact'=> rgar( $entry, '55'),
		'email'=> rgar( $entry, '20'),
		'text_29'=> rgar( $entry, '22'),
		'text_33'=> rgar( $entry, '24'),
		'address'=> rgar( $entry, '25'),
		'mother_name'=> rgar( $entry, '26'),
		'parents_contact'=> rgar( $entry, '54'),
		'parents_email'=> rgar( $entry, '32'),
		'student_image'=> $student_mage,
		'text_30'=> rgar( $entry, '29'),
		'select_36'=> rgar( $entry, '30'),
		'text_32'=> rgar( $entry, '31'),
		'select_51'=> rgar( $entry, '33'),
		'select_37'=> rgar( $entry, '34'),
		'text_38'=> rgar( $entry, '35'),
		'text_39'=> rgar( $entry, '36'),
		'text_54'=> rgar( $entry, '57'),
		'text_52'=> rgar( $entry, '47'),
		'checkbox_40'=> rgar( $entry, '38'),
		'select_41'=> rgar( $entry, '39'),
		'select_44'=> rgar( $entry, '40'),
		'select_45'=> rgar( $entry, '41'),
		'select_42'=> rgar( $entry, '42'),
		'select_53'=> rgar( $entry, '56'),
		'gender'=> rgar( $entry, '58'),
		'select_43'=> rgar( $entry, '44')
	];
	$data=[];
	$data['data']=json_encode($applicationData);
	
	
	$apiUrl = 'https://dfp.classe365.com/rest/applicationSubmit';
	$domainName="dfp";
	$apiKey='2nhsQm6Td&1*e5Oh';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiUrl);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, $domainName.":".$apiKey);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	$output = curl_exec($ch);
	curl_close($ch); 

	$info["status"] = 1;
	$info["msg"] = "Your form submitted successfully";
	return $info;
}


function cl365_after_submission_form7($entry, $form){
	$student_mage = null;
	$imgarray = json_decode( rgar( $entry, '53'), true );

	if(is_array($imgarray) && count($imgarray) > 0){
		$student_mage = $imgarray[0];
	}
	
	$applicationData=[
		'text_24'=> rgar( $entry, '4'),
		'text_25'=> rgar( $entry, '5'),
		'text_26'=> rgar( $entry, '6'),
		'first_name'=> rgar( $entry, '7'),
		'father_name'=> rgar( $entry, '8'),
		'last_name'=> rgar( $entry, '9'),
		'text_18'=> rgar( $entry, '10'),
		'text_20'=> rgar( $entry, '46'),
		'text_19'=> rgar( $entry, '15'),
		'student_dob'=> rgar( $entry, '17'),
		'text_22'=> rgar( $entry, '45'),
		'contact'=> rgar( $entry, '55'),
		'email'=> rgar( $entry, '20'),
		'text_29'=> rgar( $entry, '22'),
		'text_33'=> rgar( $entry, '24'),
		'address'=> rgar( $entry, '25'),
		'mother_name'=> rgar( $entry, '26'),
		'parents_contact'=> rgar( $entry, '54'),
		'parents_email'=> rgar( $entry, '32'),
		'student_image'=> $student_mage,
		'text_30'=> rgar( $entry, '29'),
		'select_36'=> rgar( $entry, '30'),
		'text_32'=> rgar( $entry, '31'),
		'select_51'=> rgar( $entry, '33'),
		'select_37'=> rgar( $entry, '34'),
		'text_38'=> rgar( $entry, '35'),
		'text_39'=> rgar( $entry, '36'),
		'text_54'=> rgar( $entry, '57'),
		'text_52'=> rgar( $entry, '47'),
		'checkbox_40'=> rgar( $entry, '38'),
		'select_41'=> rgar( $entry, '39'),
		'select_44'=> rgar( $entry, '40'),
		'select_45'=> rgar( $entry, '41'),
		'select_42'=> rgar( $entry, '42'),
		'select_53'=> rgar( $entry, '56'),
		'gender'=> rgar( $entry, '58'),
		'select_43'=> rgar( $entry, '44')
	];
	$data=[];
	$data['data']=json_encode($applicationData);

	error_log(print_r($applicationData, true));
	
	
	$apiUrl = 'https://dfp.classe365.com/rest/applicationSubmit';
	$domainName="dfp";
	$apiKey='2nhsQm6Td&1*e5Oh';
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiUrl);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, $domainName.":".$apiKey);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
	$output = curl_exec($ch);
	curl_close($ch); 

	$info["status"] = 1;
	$info["msg"] = "Your form submitted successfully";
	return $info;
}
