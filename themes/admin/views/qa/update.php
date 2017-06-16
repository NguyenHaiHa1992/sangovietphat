<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>QAs management</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Update QA</span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="List QAs" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/qa')?>'"/>
            <input type="button" class="button" value="Add QA" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/qa/create')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:480px; min-height: 180px">
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
						<?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'email'); ?>				
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
						<?php echo $form->labelEx($model,'product_id'); ?>
						<?php echo $form->dropDownList($model,'product_id', $list_product,array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'product_id'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'status'); ?>
						<?php echo $form->checkbox($model,'status'); ?>	
						<?php echo $form->error($model, 'status'); ?>				
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
						<?php echo $form->labelEx($model,'question'); ?>
						<?php echo $form->TextArea($model,'question',array('rows'=>5,'cols'=>44,'style'=>'width:300px;'));?>
						<?php echo $form->error($model, 'question'); ?>				
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
						<a title="Chọn Hỏi đáp" onclick="showPopUp('list_suggest_qa');return false;" id="btn-add-product" class="button" style="width: 100px;text-decoration: none;">Chọn</a>			
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
		<div class="clear"></div>
		<div>
			<ul>
                <li>
					<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />	
					<input type="submit" class="button" value="Update" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>
		<div class="line top bottom"></div>
		<br />
		<?php $qa_answer = new QaAnswer();?>
		<form id="qa-answer-form">
			<div class="row">
                <?php  
                $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$qa_answer,'attribute'=>'content','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:300px'))); 
                ?>
            </div>
			<input type="button" class="button" value="Add Answer" style="width:150px;" id="add-qa-answer"/>
		</form>
		<br />
		<h2>List Answer</h2>
		<br />
		<?php 
		$this->widget('iPhoenixGridView', array(
			'iclass'=>'QaAnswer',
			'id'=>'qa-answer-list',
			'dataProvider'=>$list_qa_answer->search(),		
			'columns'=>array(
				array(
					'name'=>'content',
					'type'=>'raw',
					'headerHtmlOptions'=>array('width'=>'30%','class'=>'table-title'),		
				),
				array(
					'name'=>'created_by',
					'value'=>'isset($data->author)?$data->author->fullname:""',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				), 						
				array(
					'name'=>'created_time',
					'value'=>'date("H:i d/m/Y",$data->created_time)',
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
				),
				array(
					'header'=>'Status',
					'class'=>'iPhoenixStatusButtonColumn',
					'template'=>'{reverse_status}',
					'buttons'=>array
					(
						'reverse_status' => array
						(
							'label'=>$list_qa_answer->getAttributeLabel('status'),
							'imageUrl'=>'$data->imageStatus',
							'url'=>'iPhoenixUrl::createUrl("admin/qaAnswer/reverseStatus", array("id"=>$data->id))',
							'click'=>'function(){
								var th=this;									
								jQuery.ajax({
									type:"POST",
									dataType:"json",
									url:$(this).attr("href"),
									success:function(data) {
										if(data.success){
											$(th).find("img").attr("src",data.src);
											}
									},
									error: function (request, status, error) {
											jAlert(request.responseText);
									}
									});
							return false;}',
						),
					),
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-qa'),
				),    	   										   	   
				array(
					'header'=>'Tools',
					'class'=>'iPhoenixToolButtonColumn',
					'template'=>'{update}{delete}',
					'deleteConfirmation'=>'Bạn muốn xóa Hỏi đáp này?',
					'afterDelete'=>'function(link,success,data){ if(success) jAlert("Bạn đã xóa thành công"); }',
					'buttons'=>array
					(
						'update' => array(
							'label'=>'Update',
							'url'=>'iPhoenixUrl::createUrl("admin/qaAnswer/update",array("id"=>$data->id))'
						),
						'delete' => array(
							'label'=>'Delete',
							'url'=>'iPhoenixUrl::createUrl("admin/qaAnswer/delete",array("id"=>$data->id))'
						),
					),
					'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
				),    				
			),
			'template'=>'{displaybox}{summary}{items}{pager}',
			'summaryText'=>'{count} Answers',
			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Previous','nextPageLabel'=>'Sau >','htmlOptions'=>array('class'=>'pages fr')),
			'actions'=>array(
				'delete'=>array(
					'action'=>'delete',
					'label'=>'Xóa',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
					'url'=>'admin/qa/checkbox'
				),
				'copy'=>array(
					'action'=>'copy',
					'label'=>'Copy',
					'imageUrl' => Yii::app()->theme->baseUrl.'/images/copy.png',
					'url'=>'admin/qa/checkbox'					)
			),
			)); ?>
	</div>
</div>
<!--end inside content-->
<?php	echo $this->renderPartial('_list_suggest_qa', 
								array(
									'class_checkbox'=>'SuggestQa',
									'class'=>'list_suggest_qa',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									//'list_category'=>$list_category,
									'condition_search'=> 'id <> '.$model->id
								));?>
<script type="text/javascript">
$(document).ready(function(){
	$('#add-qa-answer').click(function(){
		var content = $('#QaAnswer_content').val();
		var qa_id = <?php echo $model->id;?>;

		$.ajax({
		    url : "<?php echo iPhoenixUrl::createUrl('admin/qaAnswer/addAnswer');?>",
		    type: "POST",
		    data : {content:content, qa_id:qa_id},
		    success: function(data){
		    	if(data)
		        	$.fn.yiiGridView.update('qa-answer-list');
		    }
		});
	});
});
</script>