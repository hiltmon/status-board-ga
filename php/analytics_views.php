<?php
define('ga_email','hiltmon@gmail.com');
define('ga_password','i_aint_sayin');
define('which_profile',0); // The first profile
define('days_to_report', 7); // No of days excluding today!
define('ga_title','Hiltmon.com Stats');

require 'gapi.class.php';

date_default_timezone_set('America/New_York');

$ga = new gapi(ga_email,ga_password);

$ga->requestAccountData();

// Run this to see available accounts
// foreach($ga->getResults() as $result)
// {
//   echo $result . ' (' . $result->getProfileId() . ")<br />";
// }

// And this to get the graph
$results = $ga->getResults();
$result = $results[which_profile];
$ga_profile_id = $result->getProfileId();

$start_date = date("Y-m-d", strtotime('-' . days_to_report . ' days'));
$end_date = date("Y-m-d");

$metrics = array('pageviews', 'visitors', 'newVisits');
$ga->requestReportData($ga_profile_id, array('Date'), $metrics, array('Date'), null, $start_date, $end_date);

$array1 = array(); $color1 = "yellow";
$array2 = array(); $color2 = "blue";
$array3 = array(); $color3 = "green";

foreach($ga->getResults() as $result2) {
	$key = date("Y-m-d", strtotime($result2));
	$res1 = array("title" => $key, "value" => $result2->getPageviews());
	$res2 = array("title" => $key, "value" => $result2->getVisitors());
	$res3 = array("title" => $key, "value" => $result2->getNewVisits());
	
	array_push($array1, $res1);
	array_push($array2, $res2);
	array_push($array3, $res3);
}

$jsonarray = array(
	"graph" => array(
		"title" => ga_title,
		"total" => false,
		"type" => "bar",
		"datasequences" => array(
			array("title" => "Page Views", "color" => $color1, "datapoints" => $array1),
			array("title" => "Visitors", "color" => $color2, "datapoints" => $array2),
			array("title" => "New Visits", "color" => $color3, "datapoints" => $array3)
		)
	)
);

echo json_encode($jsonarray);

?>