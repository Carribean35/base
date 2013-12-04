<?php
/**
 *
 * SiteController class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
class SiteController extends RController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
			$this->render('error', $error);
	}
	
	public function actionLogin() {
		
		$this->layout = '//layouts/login';
		$model = new LoginForm();
		
		/**
		 * @var CWebUser $user
		*/
		$user = Yii::app()->user;
		if (!$user->isGuest) {
			$this->redirect(Yii::app()->user->returnUrl);
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
		
			if($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		
		$this->render('login',array(
			'model'=>$model,
		));
		
	}
}