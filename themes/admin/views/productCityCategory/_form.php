<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'category-form', 'enableAjaxValidation' => true, 'clientOptions' => array('validationUrl' => $this -> createUrl('productCityCategory/validate')))); ?>
<input type="hidden" name="id" id="current_id" value="<?php echo isset($model -> id) ? $model -> id : '0'; ?>" />
<div class="fl" style="width:500px; overflow: visible">
	<ul>
		<?php if($model->id > 0):?>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'id'); ?>
				<?php echo $model -> id; ?>
			</li>
		</div>
		<?php endif; ?>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'name'); ?>
				<?php echo $form -> textField($model, 'name', array('style' => 'width:300px;', 'maxlength' => '256')); ?>
				<?php echo $form -> error($model, 'name'); ?>
			</li>
		</div>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'introimage_id'); ?>
				<?php echo $this -> renderPartial('/image/_signupload', array('model' => $model, 'attribute' => 'introimage_id', 'h' => 225, 'w' => 210)); ?>
				<?php echo $form -> error($model, 'introimage_id'); ?>
			</li>
		</div>

		<div class="row" <?php if(ProductCityCategory::MAX_RANK == 1) echo'style="display:none"'?>>
			<li>
				<?php echo $form -> labelEx($model, 'parent_id'); ?>
				<?php $view_parent_nodes = array('0' => 'Original');
				foreach ($model->list_nodes as $id => $level) {
					$node = ProductCityCategory::model() -> findByPk($id);
					$view = "";
					for ($i = 1; $i < $level; $i++) {
						$view .= "--";
					}
					$view_parent_nodes[$id] = $view . " " . $node -> name . " " . $view;
				}
				echo $form -> dropDownList($model, 'parent_id', $view_parent_nodes, array('style' => 'width:200px'));
				?>
				<?php echo $form -> error($model, 'parent_id'); ?>
			</li>
		</div>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'status'); ?>
				<?php $list = array(ProductCityCategory::STATUS_ENABLE => 'Hiện', ProductCityCategory::STATUS_DISABLE => 'Ẩn');
				echo $form -> dropDownList($model, 'status', $list, array('style' => 'width:200px'));
				?>
				<?php echo $form -> error($model, 'status'); ?>
			</li>
		</div>
		<?php if(!$model->isNewRecord):?>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'order_view'); ?>
				<?php $list_order = array();
				$max_order = $model -> list_order_view;
				for ($i = 1; $i <= sizeof($max_order); $i++) {
					$list_order[$i] = $i;
				}
				echo $form -> dropDownList($model, 'order_view', $list_order, array('style' => 'width:300px'));
				?>
				<?php echo $form -> error($model, 'order_view'); ?>
			</li>
		</div>
		<?php endif; ?>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'meta_title'); ?>
				<?php echo $form -> textArea($model, 'meta_title', array('style' => 'width:300px; height:80px', 'maxlength' => '256')); ?>
				<?php echo $form -> error($model, 'meta_title'); ?>
			</li>
		</div>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'meta_keyword'); ?>
				<?php echo $form -> textArea($model, 'meta_keyword', array('style' => 'width:300px; height:80px', 'maxlength' => '256')); ?>
				<?php echo $form -> error($model, 'meta_keyword'); ?>
			</li>
		</div>
		<div class="row">
			<li>
				<?php echo $form -> labelEx($model, 'meta_description'); ?>
				<?php echo $form -> textArea($model, 'meta_description', array('style' => 'width:300px; height:80px', 'maxlength' => '256')); ?>
				<?php echo $form -> error($model, 'meta_description'); ?>
			</li>
		</div>
		<div class="row">
			<div id="tabContainer">
				<div id="tabMenu">
					<ul class="menu">
						<li><a id="select1" class="active"><span>Introduction</span></a></li>
						<li><a id="select2"><span>Product city details</span></a></li>
					</ul>
				</div>
				<div id="tabContent" style="overflow: visible; width: 803px;">
					<div id="tab1" class="content active">
						<div class="clear"></div>
						<?php echo $form -> textArea($model, 'description', array('style' => 'width:300px; height:80px')); ?>
						<?php echo $form -> error($model, 'description'); ?>
					</div>
					<div id="tab2" class="content">
						<div class="clear"></div>
						<?php echo $form -> textArea($model, 'extra', array('style' => 'width:300px; height:80px')); ?>
						<?php echo $form -> error($model, 'extra'); ?>
					</div>
				</div>
			</div><!--end tabContainer-->
		</div>
		<li>
			<?php
			if ($action == "update") {
				$label_button = "Update";
			} else
				$label_button = "Add";

			echo '<input type="submit" value="' . $label_button . '" style="width:125px;" id="write-category" class="button">';
			if ($action == "update") {
				echo '<input type="submit" value="Add" style="margin-left:10px; width:125px;" id="create-category" class="button">';
			}
			?>
		</li>
	</ul>
</div>
<?php $this -> endWidget(); ?>
<script type="text/javascript">
$(document).ready(function(){
	tinyMCE.init({
		mode : "exact",
		elements : "ProductCityCategory_description, ProductCityCategory_extra",
		theme : "advanced",
		skin : "bootstrap",
		width: "800",
		height: "500",
		language : "vi",
		theme_advanced_buttons1 : "formatselect,fontselect,fontsizeselect,image,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		});

	$('#select1').click(function () {
		$("#select1").attr("class","active");	
		$("#select2").attr("class","");	
		$("#select3").attr("class","");	
		$("#select4").attr("class","");
		$("#select5").attr("class","");
		$("#select6").attr("class","");
	
	    $('#tab1').attr("class","content active");	
	    $('#tab2').attr("class","content");	
	    $('#tab3').attr("class","content");	
	    $('#tab4').attr("class","content");
	    $('#tab5').attr("class","content");
	    $('#tab6').attr("class","content");	
	});
	$('#select2').click(function () {
		$("#select2").attr("class","active");	
		$("#select1").attr("class","");	
		$("#select3").attr("class","");	
		$("#select4").attr("class","");
		$("#select5").attr("class","");
		$("#select6").attr("class","");
	
	    $('#tab2').attr("class","content active");	
	    $('#tab1').attr("class","content");	
	    $('#tab3').attr("class","content");	
	    $('#tab4').attr("class","content");	
	    $('#tab5').attr("class","content");	
	    $('#tab6').attr("class","content");
	});
})
</script>