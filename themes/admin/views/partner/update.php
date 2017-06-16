<!--begin inside content-->
<div class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>Partner management</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Update partner</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="List partners" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/partner')?>'"/>
            <input type="button" class="button" value="Add partner" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/partner/create')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:480px; min-height: 180px">
			<ul>
				<?php 
				$list=array();
				foreach ($list_category as $id=>$level){
					$cat=PartnerCategory::model()->findByPk($id);
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
						<?php echo $form->labelEx($model,'alias'); ?>
						<?php echo $form->textField($model,'alias',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'alias'); ?>				
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
						<?php echo $form->labelEx($model,'order_view'); ?>
						<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>					
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'tmp_suggest_ids'); ?>
						<?php echo $form->textField($model,'tmp_suggest_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
						<?php echo $form->error($model,'tmp_suggest_ids'); ?>
						<a title="Chọn Đối tác" onclick="showPopUp('list_suggest_partner');return false;" id="btn-add-product" class="button" style="width: 100px;text-decoration: none;">Chọn</a>			
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
                    $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'content','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:950px;height:500px'))); 
                    ?>
                    <?php echo $form->error($model,'content'); ?>
                	</li>
                </div>
                <li>
					<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />
					<input type="submit" class="button" value="Update" style="margin-left:20px; width:125px;" />	
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
		<option value="off" selected="selected">Not auto save</option>
		<option value="on">Auto save (every 60s)</option>
	</select>
</div>
<?php	echo $this->renderPartial('_list_suggest_partner', 
								array(
									'class_checkbox'=>'SuggestPartner',
									'class'=>'list_suggest_partner',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									'list_category'=>$list_category,
									'condition_search'=> 'id <> '.$model->id
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
              url: "<?php echo Yii :: app () -> createUrl ('admin/partner/autoSave',array('id'=>$model->id))?>", // ​​call a function to autosave
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
//Convert signed string to unsigned string
$('#Partner_title').blur(function(){
	var name = $(this).val();
	$('#Partner_alias').val(createAlias(name));
});

function createAlias(string) {
	// First, remove any multi space with single space
	string = string.replace(/ +(?= )/g,'');

	// Second, remove first and last space if had
	string = string.trim();

	// Sigend to un-signed 
    var signedChars     = "àảãáạăằẳẵắặâầẩẫấậđèẻẽéẹêềểễếệìỉĩíịòỏõóọôồổỗốộơờởỡớợùủũúụưừửữứựỳỷỹýỵÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬĐÈẺẼÉẸÊỀỂỄẾỆÌỈĨÍỊÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢÙỦŨÚỤƯỪỬỮỨỰỲỶỸÝỴ";
    var unsignedChars   = "aaaaaaaaaaaaaaaaadeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyAAAAAAAAAAAAAAAAADEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYY";
    var pattern = new RegExp("[" + signedChars + "]", "g");
    var output = string.replace(pattern, function (m, key, input) {
        return unsignedChars.charAt(signedChars.indexOf(m));
    });

	// Remove all special characters
	output = output.replace(/[^a-z0-9\s]/gi, '');

	// Replace white space with dash, and lowercase all characters
	output = output.replace(/\s+/g, '-').toLowerCase();

	return output;
}
</script>