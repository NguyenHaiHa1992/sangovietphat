<!-- Main popup -->
<div class="form-order popup-wrapper">
	<div class="main-popup">
		<a class="popup-close" onclick="hidenPopUp('form-order');return false;"></a>
		<div class="content-popup">
			<div class="popup_title">Order detail</div>
			<div class="folder-content">
			<!--begin left content-->
			<div>
				<ul>
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'name',array('style'=>'width:200px')); ?>
							<span id="Order_name"><?php echo $model->name;?></span>
						</li>
					</div>						
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'email',array('style'=>'width:200px')); ?>
							<span id="Order_email"><?php echo $model->email;?></span>
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'phone',array('style'=>'width:200px')); ?>
							<span id="Order_phone"><?php echo $model->phone;?></span>
						</li>
					</div>						
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'tel',array('style'=>'width:200px')); ?>
							<span id="Order_tel"><?php echo $model->tel;?></span>
						</li>
					</div>	
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'address',array('style'=>'width:200px')); ?>
							<span id="Order_address"><?php echo $model->address;?></span>
						</li>
					</div>	
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'note',array('style'=>'width:200px')); ?>
							<span id="Order_note"><?php echo $model->note;?></span>
						</li>
					</div>
					<div class="row">
						<li>
							<?php echo CHtml::activeLabel($model,'detail_order',array('style'=>'width:200px')); ?>
							<span id="Order_detail_order">
								<ul>
									<?php foreach($model->detail_order as $product_id => $detail):?>
									<?php $product=Product::model()->findByPk($product_id);?>
									<?php if(isset($product)):?>
									<li><?php echo $detail['quantity']?> <?php echo $product->name;?> (Price: $ <?php echo $detail['price']?>/product)</li>
									<?php endif;?>
									<?php endforeach;?>
								</ul>
							</span>
						</li>
					</div>
				</ul>
			</div>
			<!--end left content-->
			</div>
		</div>
		<!--content-popup-->
	</div>
	<!--main-popup-->
</div>