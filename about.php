<?php

include_once('main.php');

?>

<div class="box_div" id="about_div">
<div class="box_top_div"><a href="#">Start</a> &gt; About</div>
<div class="box_body_div">

<p class="center_p"><?php echo global_project_name . ' ' . global_project_version ?></p>
<p class="center_p" id="about_latest_version_p"></p>
<p class="center_p"><a href="<?php echo global_project_website; ?>" target="_blank">Visit website</a></p>
<p class="center_p">Originally developed by: <a href="http://www.olejon.net/">OleJon</a></p>
<p class="center_p">Updated and improved by: <a href="http://piie.net">Peter Kaestle</a></p>
<p class="center_p">Licensed under <a href="LICENSE.txt">GPLv3</a></p>

</div></div>
