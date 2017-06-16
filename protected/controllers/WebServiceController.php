<?php
ini_set("soap.wsdl_cache_enabled", 0);
class WebServiceController extends CController
{
	public function actions()
    {
        return array(
            'ticket'=>array(
                'class'=>'CWebServiceAction',
                'classMap'=>array(
                    'WsTask'=>'WsTask',  
                    'WsComment'=>'WsComment',
                ),
            ),
        );
    }
 
    /**
	 * @param int status
     * @param int project id
	 * @param int customer id
	 * @param int offset
	 * @param int limit
	 * @param string secret key
     * @return WsTask[]
     * @soap
     */
    public function getListTickets($status, $project_id, $customer_id, $offset, $limit, $secret_key)
    {
    	$list_tickets = new ArrayObject();
		if($status == 0)
			$max = 100;
		else 
			$max = 25;
    	for($i=0; $i<$max; $i++){
    		$wStask = new WsTask();

			$wStask->id = $i+1;
			$wStask->name = "Name ".$wStask->id;
			$wStask->created_time = time();
			$wStask->status = "DOING";
			$wStask->description = "Description ".$wStask->id;
					
			$comments = array();
			for($j=0; $j<100; $j++){
				$wScomment = new WsComment();
				$wScomment->id = 1;
				$wScomment->created_time = time();
				$wScomment->content = "Nội dung";
				$wScomment->author_name = "Comment";
				$comments[]=$wScomment;
			}
			$wStask->comments = $comments;

			$list_tickets[]= $wStask;
		}
		return $list_tickets;
    }
	
	 /**
     * @param int project id
	 * @param int customer id
	 * @param string name
	 * @param string description
	 * @param string secret key
     * @return boolean
     * @soap
     */
	public function createTicket($project_id, $customer_id, $name, $desciption, $secret_key){
		return true;
	}
	
	 /**
     * @param int task id
	 * @param string name
	 * @param string description
	 * @param string secret key
     * @return boolean
     * @soap
     */
	public function updateTicket($task_id, $name, $desciption, $secret_key){
		return true;
	}
	/**
     * @param int task id
	 * @param string secret key
     * @return WsTask
     * @soap
     */
	public function detailTicket($task_id, $secret_key){
		$task = new WsTask();
		$task->id = $task_id;
		$task->name = "Name ".$task->id;
		$task->created_time = time();
		$task->status = Task::STATUS_TODO;
		$task->description = "Description ".$task->id;
		return $task;
	}
	 /**
     * @param int task id
	 * @param int customer id
	 * @param string content
	 * @param string secret key
     * @return boolean
     * @soap
     */
	public function commentTicket($task_id, $customer_id, $content, $secret_key){
		return true;
	}
}
?>