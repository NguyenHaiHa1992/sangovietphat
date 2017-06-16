<?php
class WsComment
{
	/**
     * @var int comment id
     * @soap
     */
    public $id;
	/**
     * @var string author name
     * @soap
     */
	public $author_name;
	/**
     * @var int created time
     * @soap
     */
	public $created_time;
	/**
     * @var string content
     * @soap
     */
	public $content;
}
?>