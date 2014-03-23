<?php
/**
 * BController class
 */
class BController extends EController
{
	const DESKTOP_MENU_ITEM = "desktop";
	const ACCESS_MENU_ITEM = "access";
	const CATALOG_MENU_ITEM = "catalog";
	const NEWS_MENU_ITEM = "news";
	const PAGES_MENU_ITEM = "pages";
	const SETTINGS_MENU_ITEM = "settings";
	
	public $breadcrumbs;
	public $breadcrumbs_button;
	public $menuActiveItems = array();
	public $title_h3;

}