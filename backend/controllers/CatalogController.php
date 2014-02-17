<?php
/**
 *
 * CatalogController class
 *
 */
class CatalogController extends RController
{
	public function actionIndex($id = 0)
	{
		$modelCatalog = new Catalog();
//		$modelDish = false;
		$currentSection = false;
		$modelCatalog->pid = $id;
		if (!empty($id)) 
		{
			$currentSection = $this->loadModel('Catalog', $id);
			$this->breadcrumbs = $this->buildBreadkrumbsCatalog($currentSection);
//			$modelDish = new Dish();
//			$modelDish->pid = $id;
		} else {
			$this->breadcrumbs[] = 'Каталог';
		}
		
//		$this->render('index', array('modelMenu' => $modelCatalog, 'currentSection' => $currentSection, 'modelDish' => $modelDish));
		$this->render('index', array('modelCatalog' => $modelCatalog, 'currentSection' => $currentSection));
	}
	
	public function actionSection($pid = 0, $id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать раздел';
			$model = $this->loadModel('Catalog', $id);
		}
		else
		{
			$header = 'Добавить раздел';
			$model = new Catalog();
		}
		
		if(isset($_POST['Catalog'])) {
			$model->attributes=$_POST['Catalog'];
			
			$model->pid = $pid;
			
			if (!empty($pid)) {
				$parentSection = $this->loadModel('Catalog', $pid);
				$model->level = $parentSection->level + 1; 
			}
			
			if($model->save()) {
				if (!empty($_FILES['Catalog']['tmp_name']['image'])) {
					$model->saveImage($_FILES['Catalog']['tmp_name']['image']);
				}
				
				$this->redirect($this->createUrl('catalog/index', array('id' => $pid)));
			}
		}
		
		if (!empty($pid)) {
			$currentSection = $this->loadModel('Catalog', $pid);
			$this->breadcrumbs = $this->buildBreadkrumbsCatalog($currentSection, true);
			$this->breadcrumbs[] = $header;
		} else {
			$this->breadcrumbs=array(
				'Каталог' => $this->createUrl('catalog/index'),
				$header
			);
		}
		
		$this->render('section', array('header' => $header, 'model' => $model));
	}
	
	private function buildBreadkrumbsCatalog($parentSection, $lastLink = false) 
	{
		if ($lastLink)
			$breadcrumbs[$parentSection->name] = $this->createUrl('catalog/index', array('id'=>$parentSection->id));
		else 
			$breadcrumbs[] = $parentSection->name;
		
		while(true)
		{
			if (empty($parentSection->pid))
			{
				break;
			}
			$parentSection = $this->loadModel('Catalog', $parentSection->pid);
			$breadcrumbs[$parentSection->name] = $this->createUrl('catalog/index', array('id'=>$parentSection->id));
		}
		$breadcrumbs['Каталог'] = $this->createUrl('catalog/index');
		$breadcrumbs = array_reverse($breadcrumbs);
		return $breadcrumbs;
	}
	
	public function actionDeleteSection($id) 
	{
		$section = $this->loadModel('Catalog', $id);
		$pid = $section->pid;
		$section->recurciveDelete();
		$this->redirect($this->createUrl('catalog/index', array('id' => $pid)));
	}
}