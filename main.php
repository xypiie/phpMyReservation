<?php

// About

define('global_project_name', 'phpMyReservation');
define('global_project_version', '2.1');
define('global_project_website', 'https://github.com/xypiie/phpMyReservation');

// Include necessary files

include_once('config.php');
include_once('functions.php');

// MySQL

mysql_connect();

define('global_mysql_configuration_table', 'phpmyreservation_configuration');
define('global_mysql_users_table', 'phpmyreservation_users');
define('global_mysql_reservations_table', 'phpmyreservation_reservations');

// Cookies

define('global_cookie_prefix', 'phpmyreservation');

// Start session

session_start();

// Configuration

define('global_price', get_configuration('price'));

// Date

date_default_timezone_set('Europe/Berlin');
// use ISO 8601 year for year-week calculations
define('global_year', date('o'));
define('global_week_number', ltrim(date('W'), '0'));
define('global_day_number', date('N'));
define('global_day_name', date('l'));
// according to ISO 8601, 28th December is always in the last week of the year
define('global_max_weeks', date("W", strtotime("28 December ".global_year)));
define('global_max_weeks_prev_year', date("W", strtotime("28 December ".(global_year - 1))));
define('global_year_week', global_year.'-'.global_week_number);

// User agent

if(isset($_SERVER['HTTP_USER_AGENT']))
{
	define('global_ua', $_SERVER['HTTP_USER_AGENT']);
}
else
{
	define('global_ua', 'CLI');
}

if(strstr(global_ua, 'iPhone') || strstr(global_ua, 'iPod') || strstr(global_ua, 'iPad') || strstr(global_ua, 'Android'))
{
	if(strstr(global_ua, 'AppleWebKit'))
	{
		if(strstr(global_ua, 'OS 5_') || strstr(global_ua, 'OS 6_') || strstr(global_ua, 'Android 2.3') || strstr(global_ua, 'Android 3') || strstr(global_ua, 'Android 4'))
		{
			define('global_css_animations', '1');
		}
		else
		{
			define('global_css_animations', '0');
		}
	}
}
elseif(strstr(global_ua, 'Chrome') || strstr(global_ua, 'Safari') && strstr(global_ua, 'Macintosh') || strstr(global_ua, 'Safari') && strstr(global_ua, 'Windows') || strstr(global_ua, 'Firefox') || strstr(global_ua, 'Opera') || strstr(global_ua, 'MSIE 10'))
{
	define('global_css_animations', '1');
}
else
{
	define('global_css_animations', '0');
}

// Check stuff

if(strlen(global_salt) != 9)
{
	echo '<script type="text/javascript">window.location.replace(\'error.php?error_code=1\');</script>';
	exit;
}

if(isset($_GET['day_number']))
{
	echo date('N');
}

?>
