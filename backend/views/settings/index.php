<?php
/* @var $this SettingsController */

$this->title_h3='Настройки';

$this->breadcrumbs=array(
);

$this->menuActiveItems[BController::SETTINGS_MENU_ITEM] = 1;

$this->breadcrumbs=array(
	'Настройки'
);

?>

<div>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$settings->formId,
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:contentAfterAjaxValidateNoReload',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('/')),

	)); ?>

		<div class="control-group">
			<?php echo $form->label($settings,'emailAdmin',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($settings,'emailAdmin',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($settings,'emailAdmin'); ?></span>
			</div>
		</div>
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
	<?php $this->endWidget(); ?>
</div>
