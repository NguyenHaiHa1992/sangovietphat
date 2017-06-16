<div class="comment-outer">
	<div class="comment-terms">Bình luận của bạn sẽ được kiểm duyệt bởi quản trị viên trước khi hiển thị</div>
    <div class="comment-inner">
    	<div class="comment-title">Bình luận khách hàng</div>
        <div class="comment-text">
            <div class="comment-avatar"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/avatar-default.png"></div>
            <div class="comment-content">
				<div id="tks" class="flash-success" style="display: none; padding: 5px; font-size: 14px; color: red">Cảm ơn bạn đã viết bình luận cho chúng tôi. Bình luận của bạn sẽ được duyệt trước khi được hiển thị!</div>
				<form id="comment_form">
	                <div class="sf-row">
	                    <textarea id="content" class="form-control" name="content" cols="" rows="" placeholder="Viết bình luận..." required ="required "></textarea>
						<input type="text" id="name" class="form-control" name="name" required="required" placeholder="Họ và tên" style="display: inline-block;width: 48%;margin-top: 10px;"/>
						<input type="email" id="email" class="form-control" name="email" required="required" placeholder="Email" style="display: inline-block;width: 48%;margin-top: 10px;float: right;"/>
	                </div>
	                <div class="sf-row text-right">
	                	<input id="send" type="submit" class="btn btn-default" value="Bình luận" />
	                </div>
				</form>
            </div>
        </div><!-- comment-text -->
        <div class="comment-status">
        	<?php echo count($list_comment);?> bình luận
        </div><!-- comment-status -->
        <div class="comment-list">
			<?php if (sizeof($data) != 0): ?>
			<?php foreach($data as $comment):?>
        	<div class="comment-item">
            	<div class="comment-avatar"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/avatar-default.png"></div>
                <div class="comment-content">
                	<div class="sf-row"><span class="comment-author"><?php echo $comment->name;?></span></div>
                    <div class="sf-row"><span class="comment-time"><?php echo date('h:i A - d/m/Y', $comment->created_time);?></span></div>
                    <div class="sf-row"><?php echo $comment->content;?></div>
                    <div class="sf-row text-right">
                    	<span class="comment-like"><span class="icon16-like" id="<?php echo $comment->id;?>"></span><span class="comment-vote"><?php echo $comment->vote;?></span></span>
                    </div>
                </div>
            </div><!-- comment-item -->
			<?php endforeach;?>
            <?php else: ?>
            	<div style="padding: 5px;"><em>Chưa có bình luận cho nội dung này...</em></div>
            <?php endif;?>
        </div><!-- comment-list -->
        <div class="comment-botton"></div>
    </div><!-- comment-inner -->
</div><!-- comment-outer -->

<script type="text/javascript">
$(document).ready(function(){
	// Comment box
	$('#send').click(function() {
		var name = $('#name').val();
		var email = $('#email').val();
		var content = $('#content').val();
		var parent_class = '<?php echo $class;?>';
		var parent_id = <?php echo $parent_id;?>;

		if(name == "") {
		    $("#name_errors").slideDown('slow').delay(1000).slideUp('slow');
		    $("#name").focus();
		    return false;
		}

		if(email == "") {
		    $("#email_errors_1").slideDown('slow').delay(1000).slideUp('slow');
		    $("#email").focus();
		    return false;
		}

		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if(!email_regex.test(email) || email == "") {
	           $("#email_errors_2").slideDown('slow').delay(1000).slideUp('slow');
	           $("#email").focus();
	           return false;
		}

		if(content == "") {
		    $("#content_errors").slideDown('slow').delay(1000).slideUp('slow');
		    $("#content").focus();
		    return false;
		}

		var _data = $('#comment_form').serialize()+'&parent_id='+parent_id+'&parent_class='+parent_class;

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo Yii::app()->createUrl('comment/addAjax');?>',
			data: _data,
			success: function(data){
				if (data.success == true){
					$('#tks').slideDown('slow').delay(5000).slideUp('slow');
					clear();
				}				
			}
		});
		
		return false;
	});	

	function clear()
	{
		$('#name').val('');
		$('#content').val('');
		$('#email').val('');
	}

	$('.icon16-like', $('.comment-like')).click(function(){
		var th = this;
		var parent = $(this).parent();
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: '<?php echo Yii::app()->createUrl('comment/vote');?>',
			data: {id: th.id},
			success: function(data){
				$('.comment-vote', $(parent)).html(data);
			}
		});
	});
});
</script>