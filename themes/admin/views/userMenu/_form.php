<?php $form=$this->beginWidget('CActiveForm', array('id'=>'menu-form','enableAjaxValidation'=>true,'clientOptions'=>array('validationUrl'=>$this->createUrl('userMenu/validate')))); ?>	
<input type="hidden" name="id" id="current_id" value="<?php echo isset($model->id)?$model->id:'0';?>" /> 
<div class="fl" style="width:500px;">
	<ul>
		<?php if($model->id > 0):?>
        <div class="row">
			<li>
           		<?php echo $form->labelEx($model,'id'); ?>
           		<?php echo $model->id;?>
        	</li>
        </div>
        <?php endif;?>
		<div class="row">
			<li>
           		<?php echo $form->labelEx($model,'name'); ?>
            	<?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>
       			<?php echo $form->error($model, 'name'); ?>
        	</li>
        </div>                                                
        <div class="row">
        <li>
            <?php echo $form->labelEx($model,'parent_id'); ?>
            <?php
            	$view_parent_nodes=array('0'=>'Original');
            	foreach ($model->list_nodes as $id=>$level){
            	 	$node=UserMenu::model()->findByPk($id);
					$view = "";
					for($i=1;$i<$level;$i++){
						$view .="--";
					}
					$view_parent_nodes[$id]=$view." ".$node->name." ".$view;
				}
            	echo $form->dropDownList($model,'parent_id',$view_parent_nodes,array('style'=>'width:300px'));
            ?>
      		<?php echo $form->error($model, 'parent_id'); ?>
		</li>
        </div>
        <div class="row">
        <li>
            <?php echo $form->labelEx($model,'status'); ?>
            <?php
            	$list=array(UserMenu::STATUS_ENABLE=>iPhoenixLang::admin_t('Show','main'),UserMenu::STATUS_DISABLE=>iPhoenixLang::admin_t('Hide','main'));
            	echo $form->dropDownList($model,'status',$list,array('style'=>'width:300px'));
            ?>
      		<?php echo $form->error($model, 'status'); ?>
		</li>
        </div>
        <div class="row">
			<li>
           		<?php echo $form->labelEx($model,'url'); ?>
            	<?php echo $form->textField($model,'url',array('style'=>'width:300px;','maxlength'=>'256')); ?>
       			<?php echo $form->error($model, 'url'); ?>
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
           		<?php echo $form->labelEx($model,'target'); ?>
           		<?php $list=array(''=>'Default','_blank'=>'Open new tab/window');?>
            	<?php echo $form->dropDownList($model,'target',$list,array('style'=>'width:300px'));?>
       			<?php echo $form->error($model, 'target'); ?>
        	</li>
        </div>
		<div class="row">
			<li>
           		<?php echo $form->labelEx($model,'rel'); ?>
           		<?php $list=array(''=>'Default','nofollow'=>'No follow');?>
            	<?php echo $form->dropDownList($model,'rel',$list,array('style'=>'width:300px'));?>
       			<?php echo $form->error($model, 'rel'); ?>
        	</li>
        </div>  
        <?php if(!$model->isNewRecord):?>
        <div class="row">
            <li>
                <?php echo $form->labelEx($model,'order_view'); ?>
                <?php 
                   	$list_order=array(); 
                   	$max_order=$model->list_order_view;  
                	for($i=1;$i<=sizeof($max_order);$i++){
                		$list_order[$i]=$i;
                	}                
                	echo $form->dropDownList($model,'order_view',$list_order,array('style'=>'width:300px')); 
                ?>
          		<?php echo $form->error($model, 'order_view'); ?>
			</li>
		</div>
		<?php endif;?>  		         
       	<li>
        	<?php 
        	if($action=="update") 
        	{ 
        		$label_button=iPhoenixLang::admin_t('Update menu');
        	}
        	else $label_button=iPhoenixLang::admin_t('Add menu');
        	
			echo '<input type="submit" value="'.$label_button.'" style="margin-left:153px; width:125px;" id="write-menu" class="button">';  
			if($action=="update") 
        	{   
				echo '<input type="submit" value="'.iPhoenixLang::admin_t('Add menu').'" style="margin-left:10px; width:125px;" id="create-menu" class="button">'; 
        	}
			?>  
        </li>
	</ul>
</div>
<?php $this->endWidget(); ?>