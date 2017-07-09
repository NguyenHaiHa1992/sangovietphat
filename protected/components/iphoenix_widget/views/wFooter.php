<?php
$countMenu = count($menus);
if($countMenu){
    $tdWid = 100 / $countMenu . '%';
}else{
    $tdWid = '100%';
}
?>
<div class="footer-top " id="pavo-footer-top">
    <div class="inner">	
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-line ">
                <div class="widget-html">
                    <div class="widget-inner">
                        <div class="col-lg-12 footer-nm">
                            <div id="accordion" class="panel-group">
                                <p style="text-align: center;color: #666;font-weight: 600;font-size: 20px;">
                                    HỆ THỐNG BÁN HÀNG<br>
                                </p>
                                <div class="panel panel-default" style="border: none;background:#ffffff;">
                                    <div class="panel-heading">
                                        <div class="table-responsive mb-no-border">
                                            <table width="100%">
                                                <tbody>
                                                    <?php if($isMobile) :?>
                                                        <?php for($i = 0 ; $i < count($menus) ; $i+=2): ?>
                                                           <tr>
                                                               <?php if($menus[$i]):?>
                                                               <td width="50%"> 
                                                                    <a href="#<?php echo $menus[$i]['hashtag'] ?>" data-parent="#accordion" data-toggle="collapse" <?php if ($i == 0) {
                                                                        echo 'aria-expanded="true"';
                                                                    } ?>style="color: #ffffff;text-transform: uppercase;" class="<?php if($i !== 0){echo 'collapsed';}?>">
                                                                        <?php echo $menus[$i]['name']; ?>
                                                                    </a>
                                                                </td> 
                                                               <?php endif;?>
                                                                <?php if($menus[$i+1]):?>
                                                                <td> 
                                                                    <a href="#<?php echo $menus[$i+1]['hashtag'] ?>" data-parent="#accordion" data-toggle="collapse" style="color: #ffffff;text-transform: uppercase;" class="collapsed">
                                                                        <?php echo $menus[$i+1]['name']; ?>
                                                                    </a>
                                                                </td> 
                                                               <?php endif;?>
                                                           </tr>
                                                        <?php endfor;?>
                                                    <?php else:?>
                                                    <tr>
                                                        <?php foreach ($menus as $key => $menu): ?>
                                                        <td width="<?php echo $tdWid; ?>"> 
                                                                <a href="#<?php echo $menu['hashtag'] ?>" data-parent="#accordion" data-toggle="collapse" <?php if ($key == 0) {
                                                            echo 'aria-expanded="true"';
                                                        } ?>style="color: #ffffff;text-transform: uppercase;" class="<?php if($key !== 0){echo 'collapsed';}?>">
                                                            <?php echo $menu['name']; ?>
                                                                </a>
                                                            </td> 
                                                        <?php endforeach; ?>
                                                    </tr>     
                                                    <?php endif;?>
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div>
                                    <!-- panel collapse -->  
                                    <?php foreach ($childs as $parent => $child) : ?>
                                        <div class="panel-collapse collapse <?php if ($parent === $menus[0]['hashtag']) {
                                            echo 'in';
                                        } ?>" id="<?php echo $parent; ?>">
                                            <div class="panel-body"> 
                                                <div class="table-responsive mb-no-border">
                                                    <table class="table">
                                                        <tbody>
                                                            <?php if($isMobile) :?>
                                                                <?php foreach ($child as $c): ?>
                                                                    <tr>
                                                                        <td class="border-rb no-border-top">
                                                                            <?php if (isset($c->name) && $c->name) : ?>
                                                                                <div class="tit-mart"><?php echo $c->name; ?></div>
                                                                            <?php endif; ?>
                                                                                <?php if (isset($c->address) && $c->address) : ?>
                                                                                <div class="address"><?php echo $c->address; ?></div>
                                                                            <?php endif; ?>
                                                                                 <?php if (isset($c->mobile) && $c->mobile) : ?>
                                                                                <div class="mobile"><?php echo $c->mobile; ?></div>
                                                                            <?php endif; ?>
                                                                                <?php if (isset($c->content) && $c->content) : ?>
                                                                                <div class="content"><?php echo $c->content; ?></div>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach;?>
                                                            <?php else :?>
                                                            <tr>
                                                            <?php foreach ($child as $c): ?>
                                                                <td class="border-rb no-border-top">
                                                                <?php if (isset($c->name) && $c->name) : ?>
                                                                    <div class="tit-mart"><?php echo $c->name; ?></div>
                                                                <?php endif; ?>
                                                                <?php if (isset($c->address) && $c->address) : ?>
                                                                    <div class="address"><?php echo $c->address; ?></div>
                                                                <?php endif; ?>
                                                                <?php if (isset($c->mobile) && $c->mobile) : ?>
                                                                    <div class="mobile"><?php echo $c->mobile; ?></div>
                                                                <?php endif; ?>
                                                                <?php if (isset($c->content) && $c->content) : ?>
                                                                    <div class="tit-content"><?php echo $c->content; ?></div>
                                                                <?php endif; ?>
                                                                </td>
                                                            <?php endforeach; ?>                                                                                                
                                                            </tr>
                                                            <?php endif;?>
                                                        </tbody>
                                                    </table>  
                                                </div> 
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


