<?php
class CommentController extends Controller
{
	/**
	 * Add comment
	 */
	public function actionAddAjax(){
		$result = array();
		
		$comment_new = new Comment();
		$comment_new->parent_id = $_POST['parent_id'];
		$comment_new->parent_class = $_POST['parent_class'];
		$comment_new->name = $_POST['name'];
		$comment_new->title = $_POST['title'];
		$comment_new->content = $_POST['content'];
		$comment_new->email = $_POST['email'];
		
		if ($comment_new->save())
			$result['success'] = true;
		else 
		{
			$result['success'] = false;
			var_dump($comment_new->getErrors());
			exit;
		}

		echo json_encode($result);
	}

	public function actionVote($id){
		$comment = Comment::model()->findbyPk($id);
		if(isset($comment)){
			$vote = $comment->vote;
			if($comment->saveAttributes(array('vote'=> $vote + 1))) echo $comment->vote;
			else echo $vote;
		}
	}
}