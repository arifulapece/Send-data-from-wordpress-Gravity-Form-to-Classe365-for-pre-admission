<?php
/*
Plugin Name:  API for Classe365
Plugin URI:   https://elsclass.com
Description:  From Gravity from to API for Classe365
Version:      1.0.0
Author:       Super Global Host
Author URI:   https://superglobalhost.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  cl365
Domain Path:  /languages
*/

define( 'CL365_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CL365_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CL365_PLUGIN_VERSION', "1.0.0" );


add_action('gform_after_submission_1', 'cl365_after_submission_form1', 10, 2);

add_action('gform_after_submission_2', 'cl365_after_submission_form2', 10, 2);

function cl365_after_submission_form1($entry, $form){
	$student_mage = null;
	$imgarray = json_decode( rgar( $entry, '53'), true );

	if(is_array($imgarray) && count($imgarray) > 0){
		$student_mage = $imgarray[0];
	}
	
	$applicationData=[
		'text_11'=> rgar( $entry, '1'),
		'first_name'=> rgar( $entry, '2'),
		'father_name'=> rgar( $entry, '3'),
		'last_name'=> rgar( $entry, '4'),
		'email'=> rgar( $entry, '5'),
		'select_12'=> rgar( $entry, '6'),
		'checkbox_13'=> rgar( $entry, '7')
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


function cl365_after_submission_form2($entry, $form){
	$student_mage = null;
	$imgarray = json_decode( rgar( $entry, '53'), true );

	if(is_array($imgarray) && count($imgarray) > 0){
		$student_mage = $imgarray[0];
	}
	
	$applicationData=[
		'text_11'=> rgar( $entry, '1'),
		'first_name'=> rgar( $entry, '2'),
		'father_name'=> rgar( $entry, '3'),
		'last_name'=> rgar( $entry, '4'),
		'email'=> rgar( $entry, '5'),
		'select_12'=> rgar( $entry, '6'),
		'checkbox_13'=> rgar( $entry, '7')
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
