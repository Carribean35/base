<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->title_h3=$header;

$this->menuActiveItems[BController::CATALOG_MENU_ITEM] = 1;

Yii::app()->clientScript->registerScriptFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.js'
	),
	CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
	Yii::app()->assetManager->publish(
		Yii::getPathOfAlias('webroot').'/plugins/bootstrap-fileupload/bootstrap-fileupload.css'
	),
	'',
	CClientScript::POS_END
);

$imageUrl = '/img/size-208x131.jpg';

if (!empty($model->id) && file_exists($model->imagesPath.'admin_preview/'.$model->id.".jpg"))
	$imageUrl = $model->imagesUrl.'admin_preview/'.$model->id.".jpg";

?>
<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:contentAfterClientValidate',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('menu/index', array('id'=>$model->pid)), 'enctype'=>'multipart/form-data'),

	)); ?>

		<div class="control-group">
			<?php echo $form->label($model,'image',array('class'=>'control-label')); ?>
			<div class="controls">
				<div data-provides="fileupload" class="fileupload fileupload-new">
					<div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
						<img alt="" src="<?php echo $imageUrl;?>">
					</div>
					<div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
					<div>
						<span class="btn btn-file"><span class="fileupload-new">Выберите изображение</span>
						<span class="fileupload-exists">Изменить</span>
						<?php echo $form->fileField($model,'image',array('class'=>'default')); ?>
						</span>
						<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Удалить</a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'name',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'name',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'name'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'visible',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->checkBox($model,'visible'); ?>
				<span class="help-inline"><?php echo $form->error($model,'visible'); ?></span>
			</div>
		</div>
		
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php if (!empty($model->id)) : ?>
				<a href="/catalog/deleteSection/<?php echo $model->id?>/" onclick="return confirmDelete()"><?php echo CHtml::htmlButton('<i class="icon-remove"></i> Удалить', array('class' => 'btn red', 'type' => 'button')); ?></a>
			<?php endif;?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
		
		<?php echo $form->hiddenField($model,'id'); ?>

	<?php $this->endWidget(); ?>

</div>