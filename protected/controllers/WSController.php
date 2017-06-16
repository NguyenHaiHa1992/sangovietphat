<?php 
class WSController extends Controller{
	public function actions(){
        return array(
            'service'=>array(
                'class'=>'CWebServiceAction',
                'classMap'=>array(
                    'WSPartner'=>'WSPartner',  
                ),
            ),
        );
    }
	
	/**
	 * @param str the str of the partner
	 * @return array[obj]
	 * @soap 
	 */
	public function ListPartner($str){
		$result = array();
		$criteria = new CDbCriteria();
		$criteria->compare('status', true);
		$list_partners = Partner::model()->findAll($criteria);
		
		$partners = array();
		foreach($list_partners as $tmp_partner){
			$partner = new WSPartner;
			$partner->email = $tmp_partner->email;
			$partner->id = $tmp_partner->id;
			$partner->password = $tmp_partner->password;
			$partner->key_active = $tmp_partner->key_active;
			$partner->salt = $tmp_partner->salt;
			$partners[]=$partner;
		}
		return $partners;
	}
	
	/**
	 * @param object the obj of the partner
	 * @return str the str
	 * @soap
	 */
	public function CreateIssue($issue){
		$model = new Partner();
		$model->email = $issue->email;
		$model->firstname = $issue->firstname;
		$model->lastname = $issue->lastname;
		$model->address = $issue->address;
		$model->phone = $issue->phone;
		$model->app_name = $issue->app_name;
		$model -> salt = $model -> generateSalt();
		$model -> password = $model -> hashPassword($issue->password, $model -> salt);
		if($model->save()){
			return 'yes';
		} else
			return 'Thêm thất bại';
	}
	
	/**
	 * @param int the int of the partner
	 * @return object the obj
	 * @soap
	 */
	public function ViewIssue($id){
		$model = Partner::model()->findByPk($id);
		$ws = new WSPartner();
		$ws->email = $model->email;
		$ws->firstname = $model->firstname;
		$ws->lastname = $model->lastname;
		$ws->address = $model->address;
		$ws->phone = $model->phone;
		$ws->app_name = $model->app_name;
		return $ws;
	}
	
		/**
	 * @param object the obj of the partner
	 * @return str the str
	 * @soap
	 */
	public function UpdateIssue($issue){
		$model = new Partner();
		$model->email = $issue->email;
		$model->firstname = $issue->firstname;
		$model->lastname = $issue->lastname;
		$model->address = $issue->address;
		$model->phone = $issue->phone;
		$model->app_name = $issue->app_name;
		if($model->save()){
			return 'yes';
		} else {
			return "no";
		}
	}
}

?>
