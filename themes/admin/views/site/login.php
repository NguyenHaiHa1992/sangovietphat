<div class="login-wrapper">
	<!--begin admin list-->
	<div id="adminBox" class="fl">
		<div class="icon fl" style="background-position:-46px -92px;"></div>
		<div class="listContent fr">
			<h1><?php echo iPhoenixLang::admin_t('LOGIN PANEL');?></h1>				
		</div>
		<?php
		foreach(Yii::app()->user->getFlashes() as $key => $message) {
    		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
		}
		?>
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
			'htmlOptions'=>array(
				'name'=>'login_form',		
			),
			)); ?>
        	<div class="row fl">
        		<label>Email</label><?php echo $form->textField($model,'email',array('style'=>'width:150px;')); ?>
        	</div>
        	<div class="row fl">
        		<label>Password</label><?php echo $form->passwordField($model,'password',array('style'=>'width:150px;')); ?>
        	</div>
        	<div class="row fl">
        		<label>Remember</label>
        		<?php echo $form->checkBox($model,'rememberMe',array('style'=>'margin-top:6px')); ?>
        	</div>
        	<div class="row fl">
        		<input name="login_submit" type="submit" value="Login" class="button btn-login"/>
        	</div>
        <?php $this->endWidget(); ?>
        </div>
	</div>
	<!--end admin list-->
</div>
<!--end login-wrapper-->