<div class="span3" id="sidebar">
	<img id="avatar" src="<?= $me['photo']; ?>" class="img-polaroid" />
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Home</a></li>
		
		<?php if($isAdmin == true): ?>
			<li class=""><a href="manage.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage Exams</a></li>
			<li class=""><a href="session_m.php"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Manage Students</a></li>
			<li class=""><a href="que_sort.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage Questions</a></li>
			<li class=""><a href="settings.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Settings</a></li>
		<?php endif; ?>
	</ul>
</div>