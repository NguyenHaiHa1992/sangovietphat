<!-- Main popup -->
<div class="form-component popup-wrapper _popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-component');return false;"></a>
		<div class="content-popup">
			<div class="popup_title">Product ingredients</div>
			<div class="folder-content" style="overflow-y: scroll">
				<div class="_component" style="text-align: left">
					<ul>
						<?php if($model->component == ''):?>
						<li>
							<input class="n" type="text" value="" placeholder="Ingredient name" style="width: 150px; vertical-align: top" />
							<input class="_n" type="text" value="" placeholder="Percent %" style="width: 50px; vertical-align: top" />
							<textarea placeholder="Introducing ingredient" style="width: 380px; height: 80px;" ></textarea>
							<img style="cursor: pointer" class="erase" src="<?php echo Yii::app()->theme->baseUrl;?>/images/erase.png" style="vertical-align: top;"/>
						</li>
						<?php else:?>
						<?php 
							$list_component = explode('[component]', $model->component);
							foreach ($list_component as $component):
								$list_item = explode('[item]', $component);
						?>
						<?php if ($component != ''):?>
						<li>
							<input class="n" type="text" value="<?php echo isset($list_item[0])?$list_item[0]:'';?>" placeholder="Ingredient name" style="width: 150px; vertical-align: top" />
							<input class="_n" type="text" value="<?php echo isset($list_item[1])?$list_item[1]:'';?>" placeholder="Percent %" style="width: 50px; vertical-align: top" />
							<textarea placeholder="Introducing ingredients" style="width: 380px; height: 80px;" ><?php echo isset($list_item[2])?$list_item[2]:'';?></textarea>
							<img style="cursor: pointer" class="erase" src="<?php echo Yii::app()->theme->baseUrl;?>/images/erase.png" style="vertical-align: top;"/>
						</li>
						<?php endif;?>
						<?php endforeach;?>
						<?php endif;?>
					</ul>
				</div>
				<div class="clear"></div>
				<div>
					<ul>
				        <li>		
							<input type="submit" class="button update" value="Update" style="margin-left:20px; width:125px;" />
							<input type="button" class="button add" value="Add" style="margin-left:20px; width:150px;" />
						</li>
					</ul>
				</div>
				<!--end left content-->
				
			</div>
		</div>
	<!--content-popup-->
	</div>
</div>
<!--main-popup-->
<script type="text/jscript">
	jQuery(document).ready(function(){
		$('.update').click(function(){
			var component = '';
			$('._component ul li').each(function(){
				if ($('.n',this).val() != '' && $('._n',this).val() != '')
					component += $('.n',this).val()+"[item]"+$('._n',this).val()+"[item]"+$('textarea',this).val()+"[component]";
			});
			$('#Product_component').text(component);
		});
		
		$('.reset').click(function(){
			$('._component ul li').each(function(){
				$('.n',this).val('');
				$('.n',this).attr('value','');
				$('._n',this).val('');
				$('._n',this).attr('value','');
			});
		});
		
		$('.erase').live("click",function(){
			$(this).parent().hide();
			$('.n',$(this).parent()).val('');
			$('._n',$(this).parent()).val('');
		});
		
		$('.add').live("click",function(){
			var content = '	<li> <input class="n" type="text" value="" placeholder="Ingredient name" style="width: 150px; vertical-align: top" /> <input class="_n" type="text" value="" placeholder="Percent %" style="width: 50px; vertical-align: top" /> 
				<textarea placeholder="Introducing ingredient" style="width: 380px; height: 80px;" ></textarea> <img style="cursor: pointer" class="erase" src="<?php echo Yii::app()->theme->baseUrl;?>/images/erase.png" style="vertical-align: top;"/> </li>';
			$('._component ul').append(content);
		});
		
		$('._component input[type="text"]').live("blur",function(){
			$(this).attr('value',this.value)
		});
	})
</script>