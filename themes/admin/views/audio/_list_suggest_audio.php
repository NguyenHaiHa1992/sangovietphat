<!-- Main popup -->
<div class="bg-overlay"></div>
<div class="<?php echo $class;?> popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('<?php echo $class?>');return false;"></a>
		<div class="content-popup">
			<div class="popup_title"><?php echo iPhoenixLang::admin_t('List audios');?></div>
			<div class="folder-content">
				<ul>
					<?php 
						Yii::app()->clientScript->registerScript('search-audio-suggest', "
							$('#audio-search').submit(function(){
							$.fn.yiiGridView.update('audio-list', {
								data: $(this).serialize()});
								return false;
							});");
					?>
					 <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'audio-search')); ?>
					 <li>
				     	<?php echo $form->label($suggest,'name'); ?>
				       	<?php $this->widget('CAutoComplete', array(
				        	            	'model'=>$suggest,
				                         	'attribute'=>'name',
											'url'=>array('audio/suggestName'),
											'htmlOptions'=>array(
												'style'=>'width:230px;',
				       							'name'=>'SuggestAudio[name]'
												),
										)); ?>								
				      </li>
					  <?php 
						$list=array(''=>iPhoenixLang::admin_t('All audio categories'));
									foreach ($list_category as $id=>$level){
										$cat=AudioCategory::model()->findByPk($id);
										$view = "";
										for($i=1;$i<$level;$i++){
											$view .="---";
										}
										$list[$id]=$view." ".$cat->name." ".$view;
									}
					?>
					<li>
						<label><?php echo iPhoenixLang::admin_t('Category');?></label>
						<?php echo $form->dropDownList($suggest,'cat_id',$list,array('style'=>'width:200px','name'=>'SuggestAudio[cat_id]')); ?>
					</li>            
					<li>
					<label>&nbsp;</label> 
					<input type="submit" class="button" value="<?php echo iPhoenixLang::admin_t('Filter','main');?>">
					</li>
					<?php $this->endWidget(); ?>	
					<li>
					  <?php 
							$this->widget('iPhoenixGridView', array(
				  				'id'=>'audio-list',
				  				'iclass'=>$class_checkbox,
				  				'dataProvider'=>$suggest->search($condition_search),		
				  				'columns'=>array(
									array(
				      					'class'=>'CCheckBoxColumn',
										'selectableRows'=>2,
										'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
										'checked'=>'in_array($data->id,Yii::app()->session["checked-suggest-list"])'
				    				),			
				    				array(
										'name'=>'name',
										'headerHtmlOptions'=>array('width'=>'20%','class'=>'table-title'),		
									),
									array(
										'name'=>'cat_id',
										'value'=>'$data->category->name',
										'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),		
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
								),			
				 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
				  				'summaryText'=>'Có {count} bài viết',
				 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< Trước','nextPageLabel'=>'Sau >','htmlOptions'=>array('class'=>'pages fr')),
				 	 			)); ?>
					</li>
					<li>
					<input class="fr button" id="update_suggest" type="submit" value="<?php echo iPhoenixLang::admin_t('Update','main');?>" style="width:100px; margin-top:10px; margin-right:5px;" />
					<input type="reset" class="fr button p-close" value="<?php echo iPhoenixLang::admin_t('Cancel','main');?>" style="width:100px; margin-top:10px; margin-right:5px;" onclick="hidenPopUp('<?php echo $class?>');return false;"/>
				</li>
				</ul>
			</div>
		</div>
	<!--content-popup-->
	</div>
</div><!--main-popup-->
<script type="text/javascript">
jQuery(window).load(function() {
	$("#update_suggest").click(
  		function(){  	
  			name=$("thead :checkbox").attr("name");
			name=name.substring(0, name.length - 4) + "[]";	
  			list_checked=new Array();
			$('input[name="'+name+'"]:checked').each(function(i){
				list_checked[i] = $(this).val();
			});	
			list_unchecked = new Array();
            $('input[name="'+name+'"]').not(':checked').each(function(i){
            	list_unchecked[i]=$(this).val();
			});	
			jQuery.ajax({
				data: {'<?php echo $class_checkbox?>[list-checked]':list_checked.toString(), '<?php echo $class_checkbox?>[list-unchecked]':list_unchecked.toString(),},
				success:function(data){
					$('#<?php echo get_class($suggest).'_'.$attribute?>').val(data);
					hidenPopUp('<?php echo $class?>');
				},
				type:'POST',
				url:'<?php echo iPhoenixUrl::createUrl('admin/audio/updateSuggest');?>',
				});
			return false;
		});
});
</script>