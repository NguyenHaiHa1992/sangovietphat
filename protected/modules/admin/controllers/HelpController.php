<?php
/**
 * 
 * HelpController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * HelpController includes actions relevant to Help model:
 *** create Help
 *** copy Help
 *** update
 *** delete Help
 *** index Help
 *** reverse status Help
 *** suggest title Help
 *** update suggest
 *** load model
 */
class HelpController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  
				'actions'=>array('view'),
				'roles'=>array('help_view'),
			),
			array('allow',  
				'actions'=>array('index'),
				'roles'=>array('help_index'),
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id='')
	{
		if($id != ''){
			$help = simplexml_load_file("http://ihbvietnam.com/help/view/".$id);
			$this->render ( 'help', array ('help' => $help ));
		}
	}

	public function actionIndex()
	{
		$check_1 = @simplexml_load_file("http://ihbvietnam.com/help/index?type=".Setting::s('TYPE_OF_WEB','ADMIN'), 'SimpleXMLElement', LIBXML_NOCDATA);
		$check_2 = @simplexml_load_file("http://ihbvietnam.com/help/cat", 'SimpleXMLElement', LIBXML_NOCDATA);
		if($check_1 && $check_2){
			$list_help = simplexml_load_file("http://ihbvietnam.com/help/index?type=".Setting::s('TYPE_OF_WEB','ADMIN'));
			$list_cat = simplexml_load_file("http://ihbvietnam.com/help/cat", 'SimpleXMLElement', LIBXML_NOCDATA);
			$this->render ( 'help', array ('list_help' => $list_help, 'list_cat' => $list_cat ));
		}
	else
		throw new CHttpException(404,'Có lỗi khi lấy thông tin.');
	}
}
