<!-- wFooterLink -->
<div id="<?php echo $id;?>" class="<?php echo $class;?>">
        <div class="inside space-padding-tb-40">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 column">
                    <div class="panel">
                        <div class="panel-body">
                            
                          <ul class="list-unstyled">
                              <?php foreach ($data as $id=>$item) {
                                $menu = $item['content'];
                                if(isset($menu->other['url'])){
                                    echo '<li><a id="'.$id. '" href="'.$menu->url.'" target='.$menu->target.'>'.$menu->name.'</a></li>';
                                }
                            }?>
                          </ul>
                            
                        </div>
                    </div>
                  </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6 column">
                    <div class="custom-logo" style="line-height: 1.4;">
                        <address class="space-top-10">
                            <span style="font-weight: bold; text-transform: uppercase; line-height: 1.42857;">
                                HỆ THỐNG BÁN LẺ VẬT LIỆU HOÀN THIỆN TẠI KHO<br>
                            </span>
                            <span style="font-weight: bold;">HOTLINE</span>
                            : <a href="tel:18000022">1800 0022</a>
                        </address>
                    </div>
                    <iframe width="100%" height="220" src="https://www.google.com/maps/d/embed?mid=1xHioeCHPf5Iaj6FQeLRtVjrfeX0"></iframe>
                </div>
            </div>
        </div>
</div>
<!-- end of wFooterLink -->