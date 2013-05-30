<?php
define('ga_email','hiltmon@gmail.com');
define('ga_password','i_aint_sayin');
define('which_profile',0); // The first profile
define('days_to_report', 0); // No of days excluding today!
define('ga_title','Top Pages Today');

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

$metrics = array('pageviews');
$ga->requestReportData($ga_profile_id, array('PageTitle'), $metrics, array('-pageViews'), null, $start_date, $end_date);

echo '<table id="analytics_pages">';
	
foreach($ga->getResults() as $result2) {
	echo '<tr>';
	echo '<td class="pageViews" style="width:15%;text-align:right;">' . $result2->getPageviews() . '</td>';
	echo '<td class="pageTitle" style="width:85%;">' . $result2 . '</td>';
	echo '</tr>';
}

echo '</table>';
	
?>
