<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	/**
	 * @var string the default layout for the controller view. Defaults to 'main',
	 */
	public $layout = 'main';
	public $meta_title = '';
	public $meta_description = '';
	public $meta_keyword = '';
	public $canonical = '';
        public $og_image= '';

	public $breadcrumbs;

	public function init(){
		$this->meta_title = Setting::s('TITLE_DEFAULT','SEO');
		$this->meta_description = Setting::s('DESCRIPTION_DEFAULT','SEO');
		$this->meta_keyword = Setting::s('KEYWORD_DEFAULT','SEO');
		$this->canonical = Yii::app()->request->hostInfo.Yii::app()->request->url;

        Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;

        Yii::app()->counter->refresh();
	}

	public function iPhoenixRender($view,$data=null,$return=false){
		if (isset($_SERVER['HTTP_X_PJAX'])) {
			$this->renderPartial($view,$data, $return, true);
		}
		else
			$this->render($view,$data,$return);
	}
	
	public function beforeAction($action) {
	    if( parent::beforeAction($action) ) {
			return true;
		}
		$controller = Yii::app()->controller->id;
	    return false;
	}

	// Common actions
	public function actionIndex(){
		$this->render('index');
	}

	public function actionList(){
		$this->render('list');
	}

	public function actionView(){
        if(Yii::app()->request->isAjaxRequest){
            $result = array();
            $comment = new Comment();
            if(isset($_POST['comment']['parent_id'])){
                $comment->parent_id = $_POST['comment']['parent_id'];
            }
            if(isset($_POST['comment']['parent_class'])){
                $comment->parent_class = $_POST['comment']['parent_class'];
            }
            if(isset($_POST['comment']['name'])){
                $comment->name = $_POST['comment']['name'];
            }
            if(isset($_POST['comment']['content'])){
                $comment->content = $_POST['comment']['content'];
            }

            if($comment->save()){
                $html = $this->renderPartial('/site/_commentBox',array(
                    'parent_id'=>$_POST['comment']['parent_id'],
                    'parent_class'=>$_POST['comment']['parent_class']
                ),true,true);

                $result['success'] = true;
                $result['html'] = $html;
            }
            else{
                $result['success'] = false;
                $error = array_values($comment->getErrors());
                $result['message'] = $error[0][0];
            }

            echo json_encode($result);
            Yii::app()->end();
        }
		$this->render('view');
	}


    public function actionAjaxComment(){
        if(Yii::app()->request->isAjaxRequest){
            $result = array();
            $comment = new Comment();
            if(isset($_POST['comment']['parent_id'])){
                $comment->parent_id = $_POST['comment']['parent_id'];
            }
            if(isset($_POST['comment']['parent_class'])){
                $comment->parent_class = $_POST['comment']['parent_class'];
            }
            if(isset($_POST['comment']['name'])){
                $comment->name = $_POST['comment']['name'];
            }
            if(isset($_POST['comment']['content'])){
                $comment->content = $_POST['comment']['content'];
            }

            if($comment->save()){
                $html = $this->renderPartial('/site/_commentBox',array(
                    'parent_id'=>$_POST['comment']['parent_id'],
                    'parent_class'=>$_POST['comment']['parent_class']
                ),true,true);

                $result['success'] = true;
                $result['html'] = $html;
            }
            else{
                $result['success'] = false;
                $error = array_values($comment->getErrors());
                $result['message'] = $error[0][0];
            }

            echo json_encode($result);
            Yii::app()->end();
        }
    }


    public function actionSearch(){
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
            Yii::app()->session['keyword'] = $keyword;
        }
        else{
            $keyword = Yii::app()->session['keyword'];
        }
        $this->render('/site/search',array(
            'keyword'=>$keyword,
        ));
    }


    public function actionSuggestName()
    {
        if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
        {
            $titles=Product::model()->suggestName($keyword);
            if($titles!==array())
                echo implode("\n",$titles);
        }
    }

    public function actionUpdateDropdownlist(){
        $shtml = '<option value="">Quận/ Huyện</option>';
        if(isset($_POST['id'])&& $_POST['id'] != ''){
            $list_district = City::getDistrictInCity($_POST['id']);
            foreach($list_district as $key => $value)
            {
                $shtml .='<option value="'.$key.'">'.$value.'</option>';
            }
        }

        echo $shtml;
    }

}
