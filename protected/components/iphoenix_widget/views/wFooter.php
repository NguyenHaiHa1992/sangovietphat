<?php
	$countMenu = count($menus);
	$tdWid = 100 / $countMenu .'%';
?>
<div class="footer-top " id="pavo-footer-top">
	<div class="container">
		<div class="inner">
			<div class="row">	
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-line ">
					<div class="widget-html">
						<div class="widget-inner">
							<div class="col-lg-12  listmap hidden-xs footer-nm">
								<div id="accordion" class="panel-group">
									<p style="text-align: center;color: #2957a4;font-weight: 600;font-size: 20px;">
										HỆ THỐNG BÁN HÀNG<br>
									</p>
									<div class="panel panel-default" style="background:#ffffff">
										<div class="panel-heading" style="background:#f26b35">
											<div class="table-responsive">
												<table width="100%" height="25">
													<tbody>
														<tr>
														<?php foreach($menus as $menu): ?>
															<td width="<?php echo $tdWid;?>"> 
																<a href="#<?php echo $menu['hashtag']?>" data-parent="#accordion" data-toggle="collapse" style="color: #ffffff;" class="">
																	<?php echo $menu['name'];?>
																</a>
															</td> 
														<?php endforeach;?>
														</tr>     
													</tbody>
												</table>
											</div>   
										</div>
										<!-- panel collapse -->  
										<?php foreach($childs as $parent => $child) :?>
											<div class="panel-collapse collapse" id="<?php echo $parent;?>">
												<div class="panel-body"> 
													<div class="table-responsive">
														<table class="table">
															<tbody>   
																<tr>
																	<?php foreach($child as $c):?>
																	<td class="border-rb no-border-top"> 
																		<div class="tit-mart"><?php echo $c->name;?></div>
																		<div class="tit-content"><?php echo $c->content;?></div>
																	</td>
																	<?php endforeach;?>                                                                                                
																</tr>
															</tbody>
														</table>  
													</div> 
												</div>
											</div>
										<?php endforeach;?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
