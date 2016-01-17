<?php
/**
 * MainMenu is a widget displaying main menu items.
 *
 * The menu items are displayed as an HTML list. One of the items
 * may be set as active, which could add an "active" CSS class to the rendered item.
 *
 * To use this widget, specify the "items" property with an array of
 * the menu items to be displayed. Each item should be an array with
 * the following elements:
 * - visible: boolean, whether this item is visible;
 * - label: string, label of this menu item. Make sure you HTML-encode it if needed;
 * - url: string|array, the URL that this item leads to. Use a string to
 *   represent a static URL, while an array for constructing a dynamic one.
 * - pattern: array, optional. This is used to determine if the item is active.
 *   The first element refers to the route of the request, while the rest
 *   name-value pairs representing the GET parameters to be matched with.
 *   When the route does not contain the action part, it is treated
 *   as a controller ID and will match all actions of the controller.
 *   If pattern is not given, the url array will be used instead.
 */
class UserMenu extends CWidget
{
	public $items=array();
	public $scriptFile='/js/usermenu.js';

	public function run()
	{
		Yii::app()->getClientScript()->registerScriptFile($this->scriptFile);
		if(!Yii::app()->user->isGuest) {
			$user=User::model()->findByPk(Yii::app()->user->id);
			$output=$this->render('userPanel',array('user'=>$user),true);
		} else {
			$form=new LoginForm();
			$output=$this->render('loginPanel',array('form'=>$form),true);
		}
		$this->widget('FormWindow',array('selector'=>'.user_profile a'));
		$this->render('userMenu',array('content'=>$output));
	}
}