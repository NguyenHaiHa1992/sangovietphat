
<?php
Yii::app() -> clientScript -> registerScriptFile(Yii::app() -> theme -> baseUrl . '/js/jquery.jeditable.mini.js');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Quản trị Ticket'); ?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('Thông tin Ticket'); ?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<a href="<?php echo Yii::app() -> createAbsoluteUrl('admin/issue/index'); ?>" class="button" style="width:180px;">Danh sách Ticket</a>
            	<a href="<?php echo Yii::app() -> createAbsoluteUrl('admin/issue/create'); ?>" class="button" style="width:180px;">Tạo Ticket</a>
            </div>
         	<div class="folder-content form">
			    <div class="ticket-wrapper">
					<div>Ticket cho dự án <a href="http://projects.ihbvietnam.com/project/14">biofood.vn</a></div>
					<div class="line top bottom"></div>
				    <div class="ticket-info">
						<div class="boxsup corner_81">
			            	<div class="top"></div>
			            	<div class="heading">NỘI DUNG YÊU CẦU - <?php echo $result->name; ?></div>
			                <div class="middle">
			                	<p>
			                		<span style="font-family: arial; font-size: medium;"><?php echo $result->description; ?></span>
			                	</p>
			                </div>
			            </div>
			            <div class="clear10"></div>
				    	<div class="comment-list">
							<div class="boxsub ">
								<div class="heading">Phản hồi</div>
								<div class="clear"></div>
								<div class="middle">
									<?php if(!empty($result->comments)): ?>
									<?php foreach($result->comments as $commentItem): ?>
									<p>
										<span style="font-weight: bold"><?php echo $commentItem->author_name." [".date('d/m/Y H:i',$commentItem->created_time)."]: "; ?></span> <?php echo strip_tags($commentItem->content); ?>
									</p>
									<?php endforeach; ?>
									<?php else: ?>
									<p>Chưa có phản hồi nào cho Ticket này!</p>
									<?php endif; ?>
								</div>
							</div>
							<div class="clear10"></div>
						</div>
						<div class="chat-box">
							<?php 
								$form = $this->beginWidget('CActiveForm',array('method'=>'post'));
							?>
				                <div id="tabMenu">
									<ul class="menu">
										<li><a id="select1" class="active"><span><?php echo $form->label($model, 'content',array('style'=>'vertical-align: middle')); ?></span></a></li>
									</ul>
								</div>
								<div id="tabContent">
									<div id="tab1" class="content active">
										<div class="clear"></div>
							            <?php $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'content','language'=>Yii::app()->params['admin_lang'],'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
										<?php echo $form->error($model, 'content'); ?>
									</div>
								</div>
								<div class="clear10"></div>
								<div class="clear10"></div>
								<input data-parent="55" type="submit" value="Gửi phản hồi" style="width:125px;" id="btn-send" class="button">
							<?php $this->endWidget(); ?>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	