<?php

class Site extends CFormModel
{

	public $emailAdmin;
	public $formId = 'site-form';
    private $file;
    
    public function init()
    {
    	parent::init();
    	$this->file = YiiBase::getPathOfAlias('common').'/data/site/site.txt';
    	
    	if (file_exists($this->file)) {
    		
    		$json = file_get_contents($this->file);
    		$obj = CJSON::decode($json);
    		$this->attributes = $obj;
    	}
    }
    
	public function rules()
    {
        return array(
        	array('emailAdmin', 'email'),
		);
    }
	
	public function save() {
		$json = CJSON::encode($this);
 		file_put_contents($this->file, $json);
		return true;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'emailAdmin' => Yii::t('main', 'Email Admin'),
		);
	}
	
}
