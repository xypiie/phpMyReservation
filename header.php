<?php include_once('main.php'); ?>

<div id="header_inner_div"><div id="header_inner_left_div">

<a href="#about">About</a>

<?php

if(isset($_SESSION['logged_in']))
{
	echo ' | <a href="#help">Help</a>';
	echo ' | <a href="#room-overview">Overview</a>';

	$rooms = array_keys($global_rooms);
	for($i = 0; $i < count($global_rooms); $i++)
	{
		echo ' | <a href="#'.$rooms[$i].'">'.$rooms[$i].'</a>';
	}
}

?>

</div><div id="header_inner_center_div">

<?php

if(isset($_SESSION['logged_in']))
{
	echo '<b>Week ' . global_week_number . ' - ' . global_day_name . ' ' . date('jS F Y') . '</b>';
}

?>

</div><div id="header_inner_right_div">

<?php

if(isset($_SESSION['logged_in']))
{
	echo '<a href="#cp">Control panel</a> | <a href="#logout">Log out</a>';
}
else
{
	echo 'Not logged in';
}

?>

</div></div>
