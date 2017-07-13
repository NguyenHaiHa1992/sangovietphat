<?php

/**
 * 
 * SystemAddressController class file 
 * @author tunglexuan<tunghus1993@gmail.com>
 *
 */
class SystemAddressController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('create'),
                'roles' => array('systemAddress_create'),
            ),
            array('allow',
                'actions' => array('index'),
                'roles'  => array('systemAddress_index'),
            ),
            array('allow',
                'actions' => array('update'),
                'roles'  => array('systemAddress_update'),
            ),
            array('allow',
                'actions' => array('delete'),
                'roles'  => array('systemAddress_delete'),
            ),
            array('allow',
                'actions' => array('checkbox'),
                'roles'  => array('systemAddress_checkbox'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        $model = new SystemAddress();
        // Ajax validate
        $this->performAjaxValidation($model);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $list_systemStore = SystemStore::getAll();
        if (isset($_POST['SystemAddress'])) {
            $model->attributes = $_POST['SystemAddress'];
            if ($model->save())
                $this->redirect(iPhoenixUrl::createUrl('admin/systemAddress/update', array('id' => $model->id)));
        }

        $this->iPhoenixRender('create', array(
            'model' => $model,
            'list_systemStore' => $list_systemStore,
        ));
    }

    /**
     * Copy a new model
     * @param integer $id the ID of model to be copied
     */
    public function actionCopy($id) {
        $store = SystemAddress::model()->findByPk($id);
        $copy = $store->copy();
        if (isset($copy)) {
            $this->redirect(iPhoenixUrl::createUrl('admin/systemAddress/update', array('id' => $copy->id)));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->user->checkAccess('systemAddress_update', array('systemAddress' => $model))) {
            $this->performAjaxValidation($model);
            $list_systemStore = SystemStore::getAll();
            if (isset($_POST['SystemAddress'])) {
                $model->attributes = $_POST['SystemAddress'];
                if ($model->save()) {
                    $this->redirect(iPhoenixUrl::createUrl('admin/systemAddress/update', array('id' => $model->id)));
                }
            }

            $this->iPhoenixRender('update', array(
                'model' => $model,
                'list_systemStore' => $list_systemStore,
            ));
        } else
            throw new CHttpException(400, 'Bạn không có quyền chỉnh sửa bài viết này.');
    }

    /**
     * Auto save a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAutoSave($id = '') {
        if ($id == '') {
            $model = new SystemAddress();
            if (isset($_POST['SystemAddress'])) {
                $model->attributes = $_POST['SystemAddress'];
                if ($model->save())
                    echo json_encode(array('success' => true, 'message' => 'Success', 'url' => iPhoenixUrl::createUrl('admin/systemAddress/update', array('id' => $model->id))));
                else
                    echo json_encode(array('success' => false, 'message' => 'Error'));
            }
        }
        else {
            $model = $this->loadModel($id);
            if (isset($_POST['SystemAddress'])) {
                $model->attributes = $_POST['SystemAddress'];
                if ($model->save())
                    echo json_encode(array('success' => true, 'message' => 'Success'));
                else
                    echo json_encode(array('success' => false, 'message' => 'Error'));
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, iPhoenixLang::admin_t('Invalid request. Please do not repeat this request again', 'main'));
    }

    /**
     * Performs the action with multi-selected product from checked models in section
     * @param string action to perform
     * @return boolean, true if the action is procced successfully, otherwise return false
     */
    public function actionCheckbox($action) {
        $this->initCheckbox('checked-system-store-list', 'SystemAddress');
        $list_checked = Yii::app()->session["checked-system-store-list"];
        $result = array();
        switch ($action) {
            case 'delete' :
                if (Yii::app()->user->checkAccess('systemAddress_delete')) {
                    foreach ($list_checked as $id) {
                        $item = SystemAddress::model()->findByPk((int) $id);
                        if (isset($item))
                            if ($item->delete()) {
                                $result['success'] = true;
                                $result['message'] = iPhoenixLang::admin_t('Delete successfully', 'main');
                            } else {
                                $result['success'] = false;
                                break;
                            }
                    }
                    Yii::app()->session ["checked-system-store-list"] = array();
                } else {
                    $result['success'] = false;
                    $result['message'] = iPhoenixLang::admin_t('You do not have authorization to perform this action', 'main');
                    break;
                }
                break;
            case 'copy' :
                if (Yii::app()->user->checkAccess('systemAddress_copy')) {
                    foreach ($list_checked as $id) {
                        $store = SystemAddress::model()->findByPk($id);
                        $copy = $store->copy();
                        if (isset($copy)) {
                            $result['success'] = true;
                            $result['message'] = iPhoenixLang::admin_t('Copy successfully', 'main');
                        } else {
                            $result['success'] = false;
                            break;
                        }
                    }
                    Yii::app()->session ["checked-system-store-list"] = array();
                } else {
                    $result['success'] = false;
                    $result['message'] = iPhoenixLang::admin_t('You do not have authorization to perform this action', 'main');
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
    public function actionIndex() {
        $this->initCheckbox('checked-system-store-list', 'SystemAddress');
        $model = new SystemAddress('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SystemAddress']))
            $model->attributes = $_GET['SystemAddress'];
        //Group categories that contains product
        $list_systemStore = SystemStore::getAll();
        $this->iPhoenixRender('index', array(
            'model' => $model,
            'list_systemStore' => $list_systemStore,
        ));
    }


    public function actionEdit($id, $attribute, $value) {
        $model = SystemAddress::model()->findByPk($id);
        $model->$attribute = $value;
        if ($model->save()) {
            echo $value;
        }
    }

    /**
     * Init checkbox selection
     * @param string $name_params, name of section to work	 
     */
    public function initCheckbox($name_params, $class, $default = array()) {
        if (!isset(Yii::app()->session [$name_params]))
            Yii::app()->session [$name_params] = $default;
        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            Yii::app()->session [$name_params] = $default;
        } else {
            if (isset($_POST [$class] ['list-checked'])) {
                $list_new = array_diff(explode(',', $_POST [$class] ['list-checked']), array(''));
                $list_old = Yii::app()->session [$name_params];
                $list = $list_old;
                foreach ($list_new as $id) {
                    if (!in_array($id, $list_old))
                        $list [] = $id;
                }
                Yii::app()->session [$name_params] = $list;
            }
            if (isset($_POST [$class] ['list-unchecked'])) {
                $list_unchecked = array_diff(explode(',', $_POST [$class] ['list-unchecked']), array(''));
                $list_old = Yii::app()->session [$name_params];
                $list = array();
                foreach ($list_old as $id) {
                    if (!in_array($id, $list_unchecked)) {
                        $list [] = $id;
                    }
                }
                Yii::app()->session [$name_params] = $list;
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = SystemAddress::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, iPhoenixLang::admin_t('The requested page does not exist', 'main'));
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (Yii::app()->getRequest()->getIsAjaxRequest()) {
            if (!isset($_GET['ajax']) || ($_GET['ajax'] != 'product-list' && $_GET['ajax'] != 'news-list' && $_GET['ajax'] != 'video-list')) {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }
}
