<!-- wCarouselSlider -->

<?php 
    if($template == null || strlen($template) == 0){
        $template = '<a href="{detail_url}"><img src="[getIntroimage_thumb(120,90)]" width="120px" height="90px" alt="{title_text}" title="{title_text}" class="img-responsive" style="width:120px;height:90px;"><span class="title">{title_text}</span> </a>';
    }
?>
<div id="<?php echo $id;?>" class="carousel <?php echo $class;?>" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php if($row > 1) : ?>
        <div class="item active">
            <?php $i=0;
            foreach($data as $model):?>
                <?php if($i<=3):?>
                    <?php
                        $this->widget('wItem', array(
                            'data'=>$model,
                            'template'=>$template,
                        ));
                    ?>
                <?php endif; $i++;?>
            <?php endforeach;?>
        </div>
        <div class="item">
            <?php $i=0;
            foreach($data as $model):?>
                <?php if($i>3 && $i<=7):?>
                    <?php
                    $this->widget('wItem', array(
                        'data'=>$model,
                        'template'=> $template,
                    ));
                    ?>
                <?php endif; $i++;?>
            <?php endforeach;?>
        </div>
        <div class="item">
            <?php $i=0;foreach($data as $model):?>
                <?php if($i>7):?>
                    <?php
                    $this->widget('wItem', array(
                        'data'=>$model,
                        'template'=>$template,
                    ));
                    ?>
                <?php endif; $i++;?>
            <?php endforeach;?>
        </div>
        <?php else:
            $maxItem = iPhoenixUtility::isMobile() ? 2 : 5;
            ?>
            <?php foreach($data as $key => $model):?>
                <?php if($key % $maxItem == 0):?>
                    <div class="item <?php if($key == 0){echo 'active';}?>">
                        <?php
                        for($j = $key ; $j < $key+$maxItem;$j++){
                            if(isset($data[$j])){
                                $this->widget('wItem', array(
                                    'data'=>$data[$j],
                                    'template'=> $template,
                                ));
                            }
                        }
                        ?>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#<?php echo $id;?>" role="button" data-slide="prev">
        <span class="left"></span>
    </a>
    <a class="right carousel-control" href="#<?php echo $id;?>" role="button" data-slide="next">
        <span class="right"></span>
    </a>
</div>
<!-- end of wCarouselSlider -->