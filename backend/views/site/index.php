<?php
/* @var $this SiteController */

$this->title_h3='Рабочий стол';

$this->breadcrumbs=array(
);

$this->menuActiveItems[BController::DESKTOP_MENU_ITEM] = 1;

?>

<div class="portlet box green main-gallery">
	<div class="portlet-title">
		<div class="caption"><i class="icon-cogs"></i>Настройки</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>$site->formId,
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
				<?php echo $form->label($site,'emailAdmin',array('class'=>'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($site,'emailAdmin',array('class'=>'m-wrap medium')); ?>
					<span class="help-inline"><?php echo $form->error($site,'emailAdmin'); ?></span>
				</div>
			</div>
			<div class="form-actions large">
				<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
				<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>