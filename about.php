<?php
	require_once "db/connect.php";
	$result = queryInUsersDB("SELECT `user_id` FROM `users`");
	$num_users = $result->num_rows;
	
?>

<h2>About</h2>

<p>Currently we have <span><?php echo $num_users?></span> registerd users.</p> 

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod est id metus placerat, non gravida risus vehicula. Praesent est metus, tincidunt vitae est at, tempor consectetur metus. In egestas velit at odio facilisis fringilla. Fusce id auctor magna. Sed id libero ac turpis molestie egestas. Etiam nisl mi, euismod ut nulla vel, luctus pulvinar quam. Etiam consectetur sed ligula eu posuere. Vestibulum tempus nunc felis. Maecenas metus felis, scelerisque non congue vitae, suscipit at mauris. Suspendisse potenti. Praesent gravida sem sollicitudin, ornare est nec, vestibulum tortor.
</p>
<p>
In sit amet neque tincidunt, tempor dui ac, varius orci. Cras non ligula vitae lacus fermentum pellentesque. Curabitur gravida nec tortor nec vulputate. Integer a egestas nunc, bibendum mollis massa. Aliquam erat volutpat. Curabitur sagittis cursus placerat. Sed ut tincidunt sapien. Ut facilisis interdum est. Proin elementum nibh mauris, a vehicula elit tincidunt vel. Ut quis nisl tristique, adipiscing elit vitae, dictum leo. Sed vulputate eros non tortor vestibulum, id auctor lectus consectetur. Duis imperdiet tortor nec est pulvinar ultrices.
</p>
<p>
Donec ut mi id felis dignissim mattis at et quam. Sed porta, leo at dapibus euismod, ante libero consequat nisi, eu rutrum sapien enim quis quam. Nulla laoreet, turpis a tincidunt tincidunt, augue justo pellentesque lacus, sed bibendum tortor justo in felis. Nullam porta lacus eu pretium posuere. Proin sed luctus ipsum. Vestibulum sit amet egestas leo. Quisque volutpat ut urna ut condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam consectetur dui ac quam suscipit mattis. Vivamus consequat massa at tortor pretium accumsan. Praesent nisl risus, consectetur vel tellus tempor, luctus laoreet tellus. Morbi volutpat tincidunt sapien quis sagittis. Pellentesque lacinia adipiscing malesuada. Cras elit nisi, ornare blandit ligula vitae, bibendum tempor nisl. Suspendisse facilisis leo tortor, eu luctus risus congue id.
</p>
<p>
Sed enim urna, ullamcorper eget elit in, cursus consectetur ligula. In ut molestie odio, et tincidunt sapien. Suspendisse sollicitudin nec metus nec consequat. Vivamus ultrices auctor consectetur. Pellentesque elementum mauris nec urna ultricies commodo. Donec consectetur fringilla varius. Integer nec dignissim felis, quis dapibus velit. Duis vulputate sapien at dolor dapibus fermentum. Aliquam auctor condimentum odio id dapibus. Nunc ut neque enim. Maecenas ultrices ullamcorper velit. Fusce mollis elit ipsum. Phasellus ligula elit, imperdiet at egestas et, mattis tincidunt ante. Vestibulum elementum posuere massa eu tincidunt. In tristique, velit suscipit lobortis posuere, odio nibh porttitor lorem, eu ullamcorper augue magna id sapien. Proin lobortis diam sit amet cursus aliquam.
</p>
