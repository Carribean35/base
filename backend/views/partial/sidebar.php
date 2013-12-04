<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php if (!empty($this->menuActiveItems[EController::DESKTOP_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="/">
			<i class="icon-home"></i> 
			<span class="title">Рабочий стол</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[EController::DESKTOP_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
		<?php if(Yii::app()->user->checkAccess('Access.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[EController::ACCESS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('access/index') ?>">
			<i class="icon-key"></i> 
			<span class="title">Права доступа</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[EController::ACCESS_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
		<?php endif;?>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>