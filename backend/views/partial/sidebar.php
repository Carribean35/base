<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::DESKTOP_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="/">
				<i class="icon-home"></i> 
				<span class="title">Главная</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php if(Yii::app()->user->checkAccess('Catalog.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::CATALOG_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('catalog/index') ?>">
				<i class="icon-reorder"></i> 
				<span class="title">Каталог</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('News.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::NEWS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('news/index') ?>">
				<i class="icon-coffee"></i> 
				<span class="title">Новости</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Settings.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::SETTINGS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('settings/index') ?>">
				<i class="icon-wrench"></i>
				<span class="title">Настройки</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Access.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[BController::ACCESS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('access/index') ?>">
				<i class="icon-key"></i> 
				<span class="title">Права доступа</span>
				<span class="selected"></span>
			</a>
		</li>
		<?php endif;?>
		
	</ul>
	<!-- END SIDEBAR MENU -->
</div>