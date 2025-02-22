<?php

include_once('main.php');

if(check_login() != true) { exit; }

if(isset($_GET['make_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo make_reservation($week, $day, $time);
}
elseif(isset($_GET['delete_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo delete_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo read_reservation($week, $day, $time);
}
elseif(isset($_GET['read_reservation_details']))
{
	$week = mysql_real_escape_string($_POST['week']);
	$day = mysql_real_escape_string($_POST['day']);
	$time = mysql_real_escape_string($_POST['time']);
	echo read_reservation_details($week, $day, $time);
}
elseif(isset($_GET['week']))
{
	$yearweek = $_GET['week'];
	$tmp = explode("-", $yearweek);
	$year = $tmp[0];
	$week = $tmp[1];
	$room = "room-overview";

	if(isset($_GET['room']) && !empty($_GET['room']))
	{
		$_SESSION['room'] = $_GET['room'];
	}

	if(isset($_SESSION['room']) && !empty($_SESSION['room']))
	{
		$room = $_SESSION['room'];
	}

	echo '<h1>Room: '.$room.'</h1>';
	echo '<center><img src="rooms/'.$room.'.png" height="500"></center>';

	if($room != "room-overview")
	{
		echo '<h1>Week: '.$yearweek.'</h1>';

		echo '<table id="reservation_table"><colgroup span="1" id="reservation_time_colgroup"></colgroup><colgroup span="7" id="reservation_day_colgroup"></colgroup>';
		$week_start = new DateTime();
		$week_start->setISODate($year,$week);

		$days_row = '<tr><td id="reservation_corner_td">'.
			'<input type="button" class="blue_button small_button" id="reservation_today_button" value="Today">'.
			'</td>';
		for($i = 0; $i < 7; ++$i)
		{
			$days_row .= '<th class="reservation_day_th">'.$week_start->format('(l) || d-M-Y').'</th>';
			$week_start->modify('+1 day');
		}
		$days_row .= '</tr>';

		$days_row = str_replace('||', '<br>', $days_row);
		$days_row = str_replace('(', '<b>', $days_row);
		$days_row = str_replace(')', '</b>', $days_row);

		if($yearweek == global_year_week)
		{
			echo highlight_day($days_row);
		}
		else
		{
			echo $days_row;
		}

		foreach($global_rooms[$room] as $t)
		{
			$time = $room.$t;
			echo '<tr><th class="reservation_time_th">' . $t . '</th>';

			$i = 0;

			while($i < 7)
			{
				$i++;

				echo '<td><div class="reservation_time_div"><div class="reservation_time_cell_div" id="div:' . $yearweek . ':' . $i . ':' . $time . '" onclick="void(0)">' . read_reservation($yearweek, $i, $time) . '</div></div></td>';
			}

			echo '</tr>';
		}

		echo '</table>';
	}
}
else
{
	echo '</div><div class="box_div" id="reservation_div"><div class="box_top_div" id="reservation_top_div"><div id="reservation_top_left_div"><a href="." id="previous_week_a">&lt; Previous week</a></div><div id="reservation_top_center_div">Reservations for week <span id="yearweek_number_span">'.global_year_week.'</span></div><div id="reservation_top_right_div"><a href="." id="next_week_a">Next week &gt;</a></div></div><div class="box_body_div"><div id="reservation_table_div"></div></div></div><div id="reservation_details_div">';
}

?>
