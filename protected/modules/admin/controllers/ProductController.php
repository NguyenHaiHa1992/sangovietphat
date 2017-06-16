<?php
/**
 * 
 * ProductController class file 
 * @author ihbvietnam <hotro@ihbvietnam.com>
 * @link http://iphoenix.vn
 * @copyright Copyright &copy; 2012 IHB Vietnam
 * @license http://iphoenix.vn/license
 *
 */
class ProductController extends Controller
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
                'actions'=>array('create'),
                'roles'=>array('product_create'),
            ),
            array('allow',
                'actions'=>array('copy'),
                'roles'=>array('product_copy'),
            ),
            array('allow',
                'actions'=>array('update'),
                'roles'=>array('product_update'),
            ),
            array('allow',
                'actions'=>array('autoSave'),
                'roles'=>array('product_autoSave'),
            ),
            array('allow',
                'actions'=>array('delete'),
                'roles'=>array('product_delete'),
            ),
            array('allow',
                'actions'=>array('checkbox'),
                'roles'=>array('product_checkbox'),
            ),
            array('allow',
                'actions'=>array('index'),
                'roles'=>array('product_index'),
            ),
            array('allow',
                'actions'=>array('reverseStatus'),
                'roles'=>array('product_reverseStatus'),
            ),
            array('allow',
                'actions'=>array('reverseHome'),
                'roles'=>array('product_reverseHome'),
            ),
            array('allow',
                'actions'=>array('reverseNew'),
                'roles'=>array('product_reverseNew'),
            ),
            array('allow',
                'actions'=>array('reverseSale'),
                'roles'=>array('product_reverseSale'),
            ),
            array('allow',
                'actions'=>array('suggestName'),
                'roles'=>array('product_suggestName'),
            ),
            array('allow',
                'actions'=>array('updateSuggest'),
                'roles'=>array('news_updateSuggest'),
            ),
            array('allow',
                'actions'=>array('updateSuggestNews'),
                'roles'=>array('news_updateSuggest'),
            ),
            array('allow',
                'actions'=>array('updateSuggestVideo'),
                'roles'=>array('news_updateSuggest'),
            ),
            array('allow',
                'actions'=>array('edit'),
                'roles'=>array('product_edit'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
    public function actionCreate()
    {
        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        $model=new Product();
        // Ajax validate
        $this->performAjaxValidation($model);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Product']))
        {
            $model->attributes=$_POST['Product'];
            if($model->save())
                $this->redirect(iPhoenixUrl::createUrl('admin/product/update',array('id'=>$model->id)));
        }
        //Group categories that contains product
        $list_category=ProductCategory::getList_nodes();


        //Handler list suggest product
        $this->initCheckbox('checked-suggest-list','SuggestProduct',$model->list_current_suggest_ids);
        $suggest=new Product('search');
        $suggest->unsetAttributes();
        if(isset($_GET['SuggestProduct']))
            $suggest->attributes=$_GET['SuggestProduct'];


        //Handler list suggest news
        /*$this->initCheckbox('checked-suggest-list','SuggestNews',$model->list_current_suggest_ids);
        $suggest=new News('search');
        $suggest->unsetAttributes();
        if(isset($_GET['SuggestNews']))
            $suggest->attributes=$_GET['SuggestNews'];*/

        //Group categories that contains product
        $list_category_news=NewsCategory::getList_nodes();
        //Handler list suggest product
        /*$this->initCheckbox('checked-news-list','SuggestNews',$model->list_current_news_ids);
        $news=new News('search');
        $news->unsetAttributes();
        if(isset($_GET['SuggestNews'])){
            $news->attributes=$_GET['SuggestNews'];
        }*/

        $this->iPhoenixRender('create',array(
            'model'=>$model,
            'list_category'=>$list_category,
            'suggest' => $suggest,
            /*'news' => $news,
            'list_category_news'=>$list_category_news,*/
        ));
    }
    /**
     * Copy a new model
     * @param integer $id the ID of model to be copied
     */
    public function actionCopy($id)
    {
        $product=Product::model()->findByPk($id);
        $copy=$product->copy();
        if(isset($copy))
        {
            $this->redirect(iPhoenixUrl::createUrl('admin/product/update',array('id'=>$copy->id)));
        }
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        if (Yii::app ()->user->checkAccess ( 'product_update', array ('product' => $model ) )) {
            $this->performAjaxValidation($model);

            if(isset($_POST['Product']))
            {
                $model->attributes=$_POST['Product'];
                if($model->save()){
                    $this->redirect(iPhoenixUrl::createUrl('admin/product/update',array('id'=>$model->id)));
                }
            }
            //Group categories that contains product
            $list_category=ProductCategory::getList_nodes();


            //Handler list suggest product
            $this->initCheckbox('checked-suggest-list','SuggestProduct',$model->list_current_suggest_ids);
            $suggest=new Product('search');
            $suggest->unsetAttributes();
            if(isset($_GET['SuggestProduct']))
                $suggest->attributes=$_GET['SuggestProduct'];

            //Handler list suggest news
            /*$this->initCheckbox('checked-suggest-list','SuggestNews',$model->list_current_suggest_ids);
            $suggest=new News('search');
            $suggest->unsetAttributes();
            if(isset($_GET['SuggestNews']))
                $suggest->attributes=$_GET['SuggestNews'];
            //Group categories that contains product
            $list_category_news=NewsCategory::getList_nodes();*/
            //Handler list suggest product
            /*$this->initCheckbox('checked-news-list','SuggestNews',$model->list_current_news_ids);
            $news=new News('search');
            $news->unsetAttributes();
            if(isset($_GET['SuggestNews']))
                $news->attributes=$_GET['SuggestNews'];*/

            //Group categories that contains product
            /*$list_category_video=VideoCategory::getList_nodes();
            //Handler list suggest product
            $this->initCheckbox('checked-video-list','SuggestVideo',$model->list_current_suggest_video);
            $video=new Video('search');
            $video->unsetAttributes();
            if(isset($_GET['SuggestVideo']))
                $video->attributes=$_GET['SuggestVideo'];*/

            $this->iPhoenixRender('update',array(
                'model'=>$model,
                'list_category'=>$list_category,
                'suggest' => $suggest,
                /*'news' => $news,
                'list_category_news'=>$list_category_news,
                'list_category_video'=>$list_category_video,
                'video'=>$video*/
            ));
        }
        else
            throw new CHttpException(400,'Bạn không có quyền chỉnh sửa bài viết này.');
    }

	/**
	 * Auto save a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAutoSave($id='')
	{
		if($id==''){
			$model=new Product();
			if(isset($_POST['Product']))
			{
				$model->attributes=$_POST['Product'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success', 'url' => iPhoenixUrl::createUrl('admin/product/update',array('id'=>$model->id))));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
		else{
			$model=$this->loadModel($id);
			if(isset($_POST['Product']))
			{
				$model->attributes=$_POST['Product'];
				if($model->save())
					echo json_encode(array('success' => true, 'message'=>'Success'));
				else
					echo json_encode(array('success' => false, 'message'=>'Error'));
			}
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,iPhoenixLang::admin_t('Invalid request. Please do not repeat this request again','main'));
	}

	/**
	 * Performs the action with multi-selected product from checked models in section
	 * @param string action to perform
	 * @return boolean, true if the action is procced successfully, otherwise return false
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-product-list','Product');
		$list_checked = Yii::app()->session["checked-product-list"];
		$result=array();
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'product_delete')) {
					foreach ( $list_checked as $id ) {
						$item = Product::model ()->findByPk ( (int)$id );
						if (isset ( $item ))
							if ( $item->delete ()) {
								$result['success']=true;
								$result['message']=iPhoenixLang::admin_t('Delete successfully','main');
							}
							else{
								$result['success']=false;
								break;
							}
					}
					Yii::app ()->session ["checked-product-list"] = array ();
				} else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
			case 'copy' :
				if (Yii::app ()->user->checkAccess ( 'product_copy')) {
					foreach ( $list_checked as $id ) {
						$product=Product::model()->findByPk($id);
						$copy=$product->copy();
						if(isset($copy))
						{
							$result['success']=true;
							$result['message']=iPhoenixLang::admin_t('Copy successfully','main');
						}
						else{
							$result['success']=false;
							break;
						}
					}
					Yii::app ()->session ["checked-product-list"] = array ();
				}
				else {
					$result['success']=false;
					$result['message']=iPhoenixLang::admin_t('You do not have authorization to perform this action','main');
					break;
				}
				break;
		}
		echo json_encode($result);
		Yii::app()->end();
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->initCheckbox('checked-product-list','Product');
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];	
		//Group categories that contains product
		$list_category=ProductCategory::getList_nodes();
		$this->iPhoenixRender('index',array(
			'model'=>$model,
			'list_category'=>$list_category,
		));
	}
	/**
	 * Reverse status of product
	 * @param integer $id, the ID of product to be reversed
	 */
	public function actionReverseStatus($id)
	{
		$product=Product::model()->findByPk($id);
		$old_status=$product->status;
		$product->status=!$old_status;
		if($product->save()) 
			echo json_encode(array('success'=>true,'src'=>$product->imageStatus));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status home of product
	 * @param integer $id, the ID of product to be reversed
	 */
	public function actionReverseHome($id)
	{
		$product=Product::model()->findByPk($id);
		$old_home=$product->home;
		$product->home=!$old_home;
		if($product->save()) 
			echo json_encode(array('success'=>true,'src'=>$product->imageHome));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Reverse status new of product
	 * @param integer $id, the ID of product to be reversed
	 */
	public function actionReverseNew($id)
	{
		$product=Product::model()->findByPk($id);
		$old_new=$product->new;
		$product->new=!$old_new;
		if($product->save()) 
			echo json_encode(array('success'=>true,'src'=>$product->imageNew));
		else 
			echo json_encode(array('success'=>false));
	}
	
	/**
	 * Suggests name of product.
	 */
	public function actionSuggestName()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$names=Product::model()->suggestName($keyword);
			if($names!==array())
				echo implode("\n",$names);
		}
	}


    public function actionUpdateSuggest()
    {
        $this->initCheckbox('checked-suggest-list','SuggestProduct');
        $list_checked = Yii::app()->session["checked-suggest-list"];
        echo implode(',',$list_checked);
    }

    /*public function actionUpdateSuggestNews()
    {
        $this->initCheckbox('checked-news-list','SuggestNews');
        $list_checked = Yii::app()->session["checked-news-list"];
        echo implode(',',$list_checked);
    }

    public function actionUpdateSuggestVideo()
    {
        $this->initCheckbox('checked-video-list','SuggestVideo');
        $list_checked = Yii::app()->session["checked-video-list"];
        echo implode(',',$list_checked);
    }*/

	/*
	 * Edit attribute
	 */
	public function actionEdit($id,$attribute,$value)
	{
		$model = Product::model()->findByPk($id);
		$model->$attribute = $value;
		if($model->save()){
			echo $value;
		}
	}
		
	/**
	 * Init checkbox selection
	 * @param string $name_params, name of section to work	 
	 */
	public function initCheckbox($name_params,$class,$default=array()){
		if (! isset ( Yii::app ()->session [$name_params] ))
			Yii::app ()->session [$name_params] = $default;
		if (! Yii::app ()->getRequest ()->getIsAjaxRequest ())
		{
			Yii::app ()->session [$name_params] = $default;
		}
		else {
			if (isset ( $_POST [$class] ['list-checked'] )) {
				$list_new = array_diff ( explode ( ',', $_POST [$class] ['list-checked'] ), array ('') );
				$list_old = Yii::app ()->session [$name_params];
				$list = $list_old;
				foreach ( $list_new as $id ) {
					if (! in_array ( $id, $list_old ))
						$list [] = $id;
				}
				Yii::app ()->session [$name_params] = $list;
			}
			if (isset ( $_POST [$class] ['list-unchecked'] )) {
				$list_unchecked = array_diff ( explode ( ',', $_POST [$class] ['list-unchecked'] ), array ('') );
				$list_old = Yii::app ()->session [$name_params];
				$list = array ();
				foreach ( $list_old as $id ) {
					if (! in_array ( $id, $list_unchecked )) {
						$list [] = $id;
					}
				}
				Yii::app ()->session [$name_params] = $list;
			}
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,iPhoenixLang::admin_t('The requested page does not exist','main'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest() )
		{
		if( !isset($_GET['ajax'] )  || ($_GET['ajax'] != 'product-list'  && $_GET['ajax'] != 'news-list'  && $_GET['ajax'] != 'video-list')){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
	
	
}
