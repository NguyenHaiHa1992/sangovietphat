<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin name-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('SystemAddress Management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon"><span><?php echo iPhoenixLang::admin_t('Add SystemAddress');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end name-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('List system address');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('systemAddress/index')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
        <div class="fl" style="width:580px; min-height: 180px">
            <ul>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </li>
                </div>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php
                        echo $form->dropDownList($model, 'status', 
                                array(0 => iPhoenixLang::admin_t('Hide', 'main'),
                                      1 => iPhoenixLang::admin_t('Show', 'main')), array('style' => 'width:300px'));
                        ?>	
                        <?php echo $form->error($model, 'status'); ?>				
                    </li>
                </div>
                <div class="row">
                    <li>
                        <?php echo $form->label($model, 'parent_id'); ?>
                        <?php echo $form->dropDownList($model, 'parent_id', $list_systemStore, array('style' => 'width:300px')); ?>
                    </li>  
                </div>
            </ul>
        </div>
        <div style="width:480px;" class="fr">
            <ul>	
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model, 'mobile'); ?>
                        <?php echo $form->textArea($model, 'mobile', array('style' => 'width:300px; height:80px', 'maxlength' => '256')); ?>		
                        <?php echo $form->error($model, 'mobile'); ?>
                    </li>
                </div>		
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model, 'address'); ?>
                        <?php echo $form->textArea($model, 'address', array('style' => 'width:300px; height:80px', 'maxlength' => '256')); ?>		
                        <?php echo $form->error($model, 'address'); ?>
                    </li>
                </div>	
            </ul>
        </div>
                
        <div class="row">
                <div id="tabContainer">
                        <div id="tabMenu active">
                            <ul class="menu">
                                <li><a id="select1" class="active"><span><?php echo $form->label($model, 'content'); ?></span></a></li>
                            </ul>
                        </div>
                        <div id="tabContent">
                                <div id="tab1" class="content active">
                                    <div class="clear"></div>
                                    <?php $this->widget('application.extensions.tinymce.ETinyMce',
                                            array('model'=>$model,'attribute'=>'content',
                                                    'language'=>Yii::app()->params['admin_lang'],
                                                    'editorTemplate'=>'full',
                                                    'htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
                                    <?php echo $form->error($model, 'content'); ?>
                                </div>
                        </div>
                </div><!--end tabContainer-->
        </div>
        
        <div class="clear"></div>
        <div style="clear: both; margin: 0 0 0 10px;">
                <ul>
                    <li>
                        <input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />
                        <input type="submit" class="button" value="Add" style="margin-left:20px; width:125px;" />
                    </li>
                </ul>
        </div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
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
              url: "<?php echo Yii :: app () -> createUrl ('admin/systemAddress/autoSave',array('id'=>$model->id))?>", // ​​call a function to autosave
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
              }
          });
       }
    }, 
    60000 // auto save operation performed 1 minute once
);
</script>