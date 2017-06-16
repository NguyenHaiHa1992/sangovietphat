<?php
/**
 * 
 * FileController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */

/**
 * FileController includes actions relevant to File:
 *** upload image
 *** delete image
 *** update image
 *** list image
 *** clear image
 *** reverse model's status
 *** suggest model's title
 *** load model from id  
 */
class FileController extends Controller
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
				'actions'=>array('index'),
				'roles'=>array('file_index'),
			),
			array('allow',  
				'actions'=>array('upload'),
				'roles'=>array('file_upload'),
			),
			array('allow',  
				'actions'=>array('delete'),
				'roles'=>array('file_delete'),
			),
			array('deny', 
				'users'=>array('*'),
			),	
		);
	}

	/**
	 * 
	 * upload image into server
	 */
	public function actionUpload($type)
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");
		//Create folder year/month/day
		$dir='data/upload/'.$type;
		$folder=File::createDir($dir);
        $allowedExtensions = File::$allowedExtensions;//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = File::$sizeLimit;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $tmp = $uploader->handleUpload($folder);
		if(isset($tmp['id'])){
			$file_id=$tmp['id'];
			$file=File::model()->findByPk($file_id);
			$result=array(
				'success'=>true,
				'id'=>$file->id,
				'url'=>$file->getUrl(),
				'fullname'=>$file->fullname,
				'extension'=>$file->extension
				);
		}
		else{
        	$result=$tmp;// it's array
        }
		echo json_encode($result);
	}

	/**
	 * delete model
	 * @param integer $id the ID of model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=File::model()->findByPk($id);
		if($model->delete()) 
			$result=array('status'=>true,'id'=>$model->id);
		else 
			$result=array('status'=>false);
		echo json_encode($result);
		Yii::app()->end();
	}

	public function loadModel($id)
	{
		$model=File::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
