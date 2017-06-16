<a id="feed"><b><?php echo iPhoenixLang::admin_t('Notifications','main');?></b> <span>(<?php echo count($list_contact)+count($list_comment)?>)</span></a>
<div id="feed-inner">
	<?php if(count($list_contact)):?>
	<p>
		<span> <?php echo iPhoenixLang::admin_t('New contacts','main');?> (<?php echo count($list_contact);?>)</span>
		<?php foreach($list_contact as $contact){
			echo '<a href="'.Yii::app()->createUrl('admin/contact/index',array('filter'=>'status_pending')).'">'.iPhoenixString::createIntrotext($contact->content,6).'</a>';
		}
		?>	
	</p>
	<?php endif;?>
	<?php if(count($list_comment)):?>
	<p>
		<span> <?php echo iPhoenixLang::admin_t('New comments','main');?> (<?php echo count($list_comment);?>)</span>
		<?php foreach($list_comment as $comment){
			echo '<a href="'.$comment->Parent_url.'">'.iPhoenixString::createIntrotext($comment->content,6).'</a>';
		}
		?>	
	</p>
	<?php endif;?>
</div>