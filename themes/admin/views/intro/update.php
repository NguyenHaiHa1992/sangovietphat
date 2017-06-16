<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('Introduction management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon"><span><?php echo iPhoenixLang::admin_t('Update introduction');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('List introductions');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/intro')?>'"/>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('Add introduction');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/intro/create')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:550px; min-height: 180px">
			<ul>
				<?php 
				$list=array();
				foreach ($list_category as $id=>$level){
					$cat=IntroCategory::model()->findByPk($id);
					$view = "";
					for($i=1;$i<$level;$i++){
						$view .="---";
					}
					$list[$id]=$view." ".$cat->name." ".$view;
				}
				?>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'cat_id'); ?>
						<?php echo $form->dropDownList($model,'cat_id',$list,array('style'=>'width:300px')); ?>
						<?php echo $form->error($model, 'cat_id'); ?>
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'title'); ?>
						<?php echo $form->textField($model,'title',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'title'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'home'); ?>
						<?php echo $form->checkbox($model,'home'); ?>	
						<?php echo $form->error($model, 'home'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'new'); ?>
						<?php echo $form->checkbox($model,'new'); ?>	
						<?php echo $form->error($model, 'new'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'footer'); ?>
						<?php echo $form->checkbox($model,'footer'); ?>	
						<?php echo $form->error($model, 'footer'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'order_view'); ?>
						<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>					
				<div class="row none">
					<li>
						<?php echo $form->labelEx($model,'tmp_suggest_ids'); ?>
						<?php echo $form->textField($model,'tmp_suggest_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
						<?php echo $form->error($model,'tmp_suggest_ids'); ?>
						<a title="Chọn Giới thiệu" onclick="showPopUp('list_suggest_intro');return false;" id="btn-add-product" class="button" style="width: 50px;text-decoration: none;">Chọn</a>			
					</li>
				</div>
				<div class="row none">
					<li>
						<?php echo $form->labelEx($model,'tmp_suggest_video'); ?>
						<?php echo $form->textField($model,'tmp_suggest_video',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
						<?php echo $form->error($model,'tmp_suggest_video'); ?>
						<a title="Chọn Video" onclick="showPopUp('list_suggest_video');return false;" id="btn-add-video" class="button" style="width: 50px;text-decoration: none;">Chọn</a>			
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'introimage_id'); ?>
						<?php echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'introimage_id','h'=>60,'w'=>60)); ?>		
						<?php echo $form->error($model, 'introimage_id'); ?>
					</li>
				</div>
			</ul>
		</div>
		<div style="width:480px;" class="fr">
			<ul>	
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'meta_title'); ?>
							<?php echo $form->textArea($model,'meta_title',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
							<?php echo $form->error($model, 'meta_title'); ?>
						</li>
				</div>		
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'meta_keyword'); ?>
							<?php echo $form->textArea($model,'meta_keyword',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
							<?php echo $form->error($model, 'meta_keyword'); ?>
						</li>
				</div>	
				<div class="row">
						<li>
							<?php echo $form->labelEx($model,'meta_description'); ?>
							<?php echo $form->textArea($model,'meta_description',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
							<?php echo $form->error($model, 'meta_description'); ?>
						</li>
				</div>		
			</ul>
		</div>
		<div>
			<ul>
				<div class="row">
                	<li>
                	<?php echo $form->labelEx($model,'content'); ?>
                    <?php  
                    $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'content','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); 
                    ?>
                    <?php echo $form->error($model,'content'); ?>
                	</li>
                </div>
                <li>
					<input type="reset" class="button" value="<?php echo iPhoenixLang::admin_t('Cancel','main');?>" style="margin-left:15px; width:125px;" />
					<input type="submit" class="button" value="<?php echo iPhoenixLang::admin_t('Update','main');?>" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<!-- Auto save selection button -->
<div class="toolbar">
	<?php echo CHtml :: HiddenField ('status','');?>
	<select id="autoSave">
		<option value="off" selected="selected"><?php echo iPhoenixLang::admin_t('Not auto save','main');?>Not auto save</option>
		<option value="on"><?php echo iPhoenixLang::admin_t('Auto save (every 60s)','main');?></option>
	</select>
</div>
<?php echo $this->renderPartial('_list_suggest_intro', 
								array(
									'class_checkbox'=>'SuggestIntro',
									'class'=>'list_suggest_intro',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									'list_category'=>$list_category,
									'condition_search'=> 'id <> '.$model->id
								));?>
<?php echo $this->renderPartial('_list_suggest_video', 
								array(
									'class_checkbox'=>'SuggestVideo',
									'class'=>'list_suggest_video',
									'attribute'=>'tmp_suggest_video',
									'suggest'=>$video,
									'list_category_video'=>$list_category_video,
									'condition_search'=> null
								));?>
<script type="text/javascript">
/*** Auto save model after 1 minute script ***/
setInterval (
     function () {
        var status = $ ("#status"). val (); // determine whether the status of being no autosave function is running
        var autosave = $("#autoSave option:selected").val(); // determine whether the autosave function is on of off
        if (status != "on" && autosave == "on") // if no function is running, then run the function
        {
           $ ("#btn-save").attr ("disabled", true); // for the function is running, the user can not press the save button
           $.ajax ({
              url: "<?php echo Yii :: app () -> createUrl ('admin/intro/autoSave',array('id'=>$model->id))?>", // ​​call a function to autosave
              type: "post",
              dataType: "json",
              data: $('form',$('.folder-content')).serialize(),
              beforeSend: function () {
                    $ ("#status").val ("on");
              },
              success: function (data) {
                    $ ("#status").val("off");
                    if (data.success) {
						console.log('auto save success');
                    }
                    else {
                       $ ("#btn-save").attr("disabled", false);
                    }
              },
          });
       }
    }, 
    60000 // auto save operation performed 1 minute once
);
</script>