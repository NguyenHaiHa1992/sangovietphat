<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-line">
    <div class="<?php echo $class;?>">
        <div class="title_dt cufon_b">
            <?php echo $title;?>
        </div>
        <?php $this->widget('wCarouselSlider',array(
            'data'=>$data,
            'row' => 1,
            'class' => 'slide',
            'id' => $id,
            'template' => $template,
        ));?>
    </div>
</div>