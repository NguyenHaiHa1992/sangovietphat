<!-- wFooterLink -->

<?php 
$count = count($data);
$row = 6;
$datas = array_chunk($data, $row);

?>
<div id="<?php echo $id;?>" class="<?php echo $class;?>">
        <div class="inside space-padding-tb-40">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-line bg-blur">
                <div class="widget-html">
                    <div class="widget-inner">
                            <?php foreach($datas as $key => $data) :?>
                            <div class="col-md-3 col-sm-6 col-xs-6 column">
                                <div class="panel none-shadow none-border">
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
                              <?php endforeach;?>

                            <div class="col-xs-12 col-sm-6 col-md-6 pull-right">
                                <?php $this->widget('wGooglemap');?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- end of wFooterLink -->