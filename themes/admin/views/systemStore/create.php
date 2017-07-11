<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin name-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('System Store Management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon"><span><?php echo iPhoenixLang::admin_t('Add System Store');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end name-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('List system store');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('systemStore/index')?>'"/>
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
                        <?php echo $form->labelEx($model,'status'); ?>
                        <?php echo $form->checkbox($model,'status'); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </li>
                </div>
            </ul>
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
              url: "<?php echo Yii :: app () -> createUrl ('admin/systemStore/autoSave',array('id'=>$model->id))?>", // ​​call a function to autosave
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