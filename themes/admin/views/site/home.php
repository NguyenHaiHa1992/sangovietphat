<div style="width: 1008px; margin: auto auto; display: block;">
	<!--begin admin content-->
	<!--begin admin list-->
	<?php if(Yii::app ()->user->checkAccess('news_index')):?>
	<div id="adminBox" class="fl mLeft mTop">
		<div class="icon fl" style="background-position:-46px -92px;"></div>
		<div class="listContent fr">
			<h1><?php echo iPhoenixLang::admin_t('News information');?></h1>
			<ol>
				<li class="c-red"><span><?php echo iPhoenixLang::admin_t('Total news');?></span><a href="<?php echo Yii::app()->createUrl('admin/news/index')?>"><?php echo $news['total']?></a></li>
				<li class="c-red"><span><?php echo iPhoenixLang::admin_t('Active news');?></span><?php echo $news['active']?></li>
                <li class="c-blue"><span><?php echo iPhoenixLang::admin_t('News categories');?></span><?php echo $newsCategory['total']?></li>
			</ol>
		</div>
	</div>
	<!--end admin list-->
	<?php endif;?>
	<?php if(Yii::app ()->user->checkAccess('product_index')):?>
	<div id="adminBox" class="fl mLeft mTop">
		<div class="icon fl" style="background-position:-46px -92px;"></div>
		<div class="listContent fr">
			<h1><?php echo iPhoenixLang::admin_t('Product information');?></h1>
			<ol>
				<li class="c-red"><span><?php echo iPhoenixLang::admin_t('Total products');?></span><a href="<?php echo Yii::app()->createUrl('admin/product/index')?>"><?php echo $product['total']?></a></li>
				<li class="c-red"><span><?php echo iPhoenixLang::admin_t('Active products');?></span><?php echo $product['active']?></li>
                <li class="c-blue"><span><?php echo iPhoenixLang::admin_t('Product categories');?></span><?php echo $productCategory['total']?></li>
			</ol>
		</div>
	</div>
	<?php endif;?>
	<!--begin admin list-->
	<?php if(Yii::app ()->user->checkAccess('order_index')):?>
	<div id="adminBox" class="fl mLeft mTop">
		<div class="icon fl" style="background-position:-92px 0;"></div>
		<div class="listContent" style="width: 304px">
			<h1><?php echo iPhoenixLang::admin_t('New orders');?></h1>
			<br /> <br />
			<ol>
				<?php foreach($list_order as $order):?>
				<li><a href="<?php echo iPhoenixUrl::createUrl('admin/order');?>"><?php echo $order->name.' - '.$order->province->name.' - '.$order->value?></a></li>
				<?php endforeach; ?>
			</ol>
			</ol>
		</div>
	</div>
	<!--end admin list-->
	<?php endif;?>
	<?php if(Yii::app ()->user->checkAccess('comment_index')):?>
	<!--begin admin list-->
	<div id="adminBox" class="fl mLeft mTop">
		<div class="icon fl" style="background-position:-92px -46px;;"></div>
		<div class="listContent" style="width: 304px">
			<h1><?php echo iPhoenixLang::admin_t('New comments');?></h1>
			<br /> <br />
			<ol>
				<?php foreach($list_comment as $comment):?>
				<li><a href="<?php echo iPhoenixUrl::createUrl('admin/comment')?>"><?php echo iPhoenixString::createIntrotext($comment->content,10)?></a></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
	<!--end admin list-->
	<?php endif;?>
	<?php if(Yii::app ()->user->checkAccess('contact_index')):?>
	<!--begin admin list-->
	<div id="adminBox" class="fl mLeft mTop">
		<div class="icon fl" style="background-position:0 -92px;;"></div>
		<div class="listContent" style="width: 304px">
			<h1><?php echo iPhoenixLang::admin_t('New contacts');?></h1>
			<br /> <br />
			<ol>
				<?php foreach($list_contact as $contact):?>
				<li><a href="<?php echo Yii::app()->createUrl('admin/contact/index',array('filter'=>'status_ok'))?>"><?php echo iPhoenixString::createIntrotext($contact->content,10)?></a></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
	<!--end admin list-->
	<?php endif;?>
	<!--begin admin list-->
	<!-- <div id="adminBox" class="fl mLeft mTop">
		<div class="icon fl" style="background-position:0 -46px;"></div>
		<div class="listContent fr">
			<h1>Hướng dẫn mới nhất [IHB]</h1>
			<br /><br />
			<?php
			$check = @simplexml_load_file("http://ihbvietnam.com/help/latest?type=".Setting::s('TYPE_OF_WEB','ADMIN'), 'SimpleXMLElement', LIBXML_NOCDATA);
			if($check):
				$list_help = simplexml_load_file("http://ihbvietnam.com/help/latest?type=".Setting::s('TYPE_OF_WEB','ADMIN'));
			?>
			<ol style="width: 302px;margin-left: -70px">
				<?php foreach($list_help as $help):?>
				<li><a href="<?php echo Yii::app()->createUrl('admin/help/#'.$help->id)?>"><?php echo $help->title?></a> &nbsp; [<?php echo date("d/m/y",intval($help->date))?>]</li>
                <?php endforeach;?>
			</ol>
			<?php endif;?>
		</div>
	</div> -->
	<!--end admin list-->
	<!--end admin content-->
</div>