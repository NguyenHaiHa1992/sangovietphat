<?php
class WsTask 
{
	/**
     * @var int task id
     * @soap
     */
    public $id;
	/**
     * @var string task name
     * @soap
     */
	public $name;
	/**
     * @var int created time
     * @soap
     */
	public $created_time;
	/**
     * @var int task status
     * @soap
     */
	public $status;
	/**
     * @var string task description
     * @soap
     */
	public $description;
	
	/**
     * @var WsComment[] comments
     * @soap
     */
	public $comments;
		
}
?>