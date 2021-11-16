<?php

### IF YOU ARE GOING TO USE THE CHARACTER ' IN ANY OF THE OPTIONS, ESCAPE IT LIKE THIS: \' ###

// MySQL details
define('global_mysql_server', '127.0.0.1');
define('global_mysql_user', 'sqluser');
define('global_mysql_password', 'sqlpass');
define('global_mysql_database', 'phpmyreservation');

// Salt for password encryption. Changing it is recommended. Use 9 random characters
// This MUST be 9 characters, and must NOT be changed after users have been created
define('global_salt', 'k4i8pa2m5');

// Days to remember login (if the user chooses to remember it)
define('global_remember_login_days', '180');

// Title. Used in page title and header
define('global_title', 'Desksharing');

// Organization. Used in page title and header, and as sender name in reservation reminder emails
define('global_organization', 'Future inc.');

// Secret code. Can be used to only allow certain people to create a user
// Set to '0' to disable
define('global_secret_code', '0');

// Email address to webmaster. Shown to users that want to know the secret code
// To avoid spamming, JavaScript & Base64 is used to show email addresses when not logged in
define('global_webmaster_email', 'your@email.address');

// Set to '1' to enable reservation reminders. Adds an option in the control panel
// Check out the wiki for instructions on how to make it work
define('global_reservation_reminders', '0');

// Reservation reminders are sent from this email
// Should be an email address that you own, and that is handled by your web host provider
define('global_reservation_reminders_email', 'some@email.address');

// Code to run the reservation reminders script over HTTP
// If reservation reminders are enabled, this MUST be changed. Check out the wiki for more information
define('global_reservation_reminders_code', '1234');

// Full URL to web site. Used in reservation reminder emails
define('global_url', 'http://127.0.0.1/phpmyreservation/');

// Currency (short format). Price per reservation can be changed in the control panel
// Currency should not be changed after reservations have been made (of obvious reasons)
define('global_currency', '€');

// How many weeks forward in time to allow reservations
define('global_weeks_forward', '2');

// room definition
$global_rooms = array(
	"room-1101" => array(
		'Desk 01',
		'Desk 02',
		'Desk 03',
	),
	"room-1102" => array(
		'Desk 01',
		'Desk 02',
		'Desk 03',
		'Desk 04',
	),
	"room-1103" => array(
		'Desk 01',
		'Desk 02',
		'Desk 03',
		'Desk 04',
	),
)


?>
