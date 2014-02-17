<?php
/**
 *
 * PagesController class
 *
 */
class PagesController extends RController
{
	public function actionIndex()
	{
		$model = new Pages();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать страницу';
			$model = $this->loadModel('Pages', $id);
		} else  
		{
			$header = 'Добавить страницу';
			$model = new Pages();
		}
		
		if(isset($_POST['Pages'])) {
			$model->attributes=$_POST['Pages'];

			if($model->save()) {
				if (!empty($_FILES['Pages']['tmp_name']['image'])) {
					Yii::app()->ih
					->load($_FILES['Pages']['tmp_name']['image'])
					->resize(200,140)
					->save($model->imagesPath.$model->id);
				} else if (!$model->existImage()){
					$model->visible = 0;
					$model->save();
				}
				
				$this->redirect($this->createUrl('pages/index'));
			}
		}
		
		$this->render('item', array('header' => $header, 'model' => $model));
	}
	
	public function actionDelete($id) {
		$action = $this->loadModel('Pages', $id);
		$action->deleteFull();
		$this->redirect($this->createUrl('pages/index'));
	}
}