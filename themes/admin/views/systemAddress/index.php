<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.jeditable.mini.js');
?>
<!--begin inside content-->
<div id="main-content" class="folder top">
    <!--begin name-->
    <div class="folder-header">
        <h1><?php echo iPhoenixLang::admin_t('System Address Management'); ?></h1>
        <div class="header-menu">
            <ul>
                <li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('List System Address'); ?></span></a></li>
            </ul>
        </div>
    </div>
    <!--end name-->
    <div class="folder-content">
        <div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('Add new system Address'); ?>" style="width:180px;" onClick="parent.location = '<?php echo iPhoenixUrl::createUrl('admin/systemAddress/create') ?>'"/>
            <div class="line top bottom"></div>	
        </div>
        <!--begin box search-->
        <?php
        Yii::app()->clientScript->registerScript('search', "
			$('#systemAddress-search').submit(function(){
			$.fn.yiiGridView.update('system-address-list', {
				data: $(this).serialize()});
				return false;
			});");
        ?>
        <div class="box-search">            
            <h2><?php echo iPhoenixLang::admin_t('Search', 'main'); ?></h2>
            <?php $form = $this->beginWidget('CActiveForm', array('method' => 'get', 'id' => 'systemAddress-search')); ?>
            <!--begin left content-->
            <div class="fl" style="width:600px;">
                <ul>
                    <li>
                        <?php echo $form->label($model, 'name', array('style' => 'width:200px')); ?>
                        <?php
                        $this->widget('CAutoComplete', array(
                            'model' => $model,
                            'attribute' => 'name',
                            'url' => array('systemAddress/suggestName'),
                            'htmlOptions' => array(
                                'style' => 'width:230px;',
                            ),
                        ));
                        ?>		
                    </li>  
                </ul>
            </div>
            <!--end left content-->
            <!--begin right content-->
            <div class="fr" style="width:600px;">
                <ul>      
                    <li>
                        <?php echo $form->label($model, 'status', array('style' => 'width:200px')); ?>
                        <?php echo $form->dropDownList($model, 'status', array('' => iPhoenixLang::admin_t('All', 'main'), 0 => iPhoenixLang::admin_t('Hide', 'main'), 1 => iPhoenixLang::admin_t('Show', 'main')), array('style' => 'width:200px')); ?>
                    </li> 	             
                </ul>
                <ul>
                    <?php $list_systemStore = array_merge(array('' => iPhoenixLang::admin_t('All', 'main')) ,$list_systemStore)?>
                    <li>
                        <?php echo $form->label($model, 'parent_id', array('style' => 'width:200px')); ?>
                        <?php echo $form->dropDownList($model, 'parent_id', $list_systemStore, array('style' => 'width:200px')); ?>
                    </li>
                </ul>
            </div>
            <div>
                <div class="row"></div>
                <?php
                echo CHtml::submitButton(iPhoenixLang::admin_t('Filter', 'main'), array(
                    'class' => 'button',
                    ''
                ));
                ?>   
            </div>
<?php $this->endWidget(); ?>
            <div class="clear"></div>
            <div class="line top bottom"></div>
        </div>
        <!--end box search-->		
        <?php
        $this->widget('iPhoenixGridView', array(
            'iclass' => 'SystemAddress',
            'id' => 'system-address-list',
            'dataProvider' => $model->search(),
            'columns' => array(
                array(
                    'class' => 'CCheckBoxColumn',
                    'selectableRows' => 2,
                    'headerHtmlOptions' => array('width' => '2%', 'class' => 'table-title'),
//                    'checked' => 'in_array($data->id,Yii::app()->session["checked-product-list"])'
                ),
                array(
                    'name' => 'name',
                    'headerHtmlOptions' => array('width' => '10%', 'class' => 'table-title'),
                ),
                array(
                    'name' => 'parent_id',
                    'header' => iPhoenixLang::admin_t('SystemStore' , 'systemStore'),
                    'value' => function($data) use($list_systemStore){
                        return isset($list_systemStore[$data['parent_id']]) ? $list_systemStore[$data['parent_id']] : '';
                    },
                ),
                array(
                    'name' => 'mobile',
                    'type' => 'html',
                    'headerHtmlOptions' => array('class' => 'table-title'),
                    
                ),
                array(
                    'name' => 'address',
                    'type' => 'html',
                    'headerHtmlOptions' => array('class' => 'table-title'),
                ),
                array(
                    'name' => 'order_view',
                    'type' => 'html',
                    'value' => '"<a class=\'edit-order-view-".$data->id."\'>$data->order_view</a>"',
                    'headerHtmlOptions' => array('width' => '6%', 'class' => 'table-title'),
                ),
                array(
                    'header' => iPhoenixLang::admin_t('Function', 'main'),
                    'class' => 'iPhoenixToolButtonColumn',
                    'template' => '{update}{delete}',
                    'deleteConfirmation' => iPhoenixLang::admin_t('Are you sure you want to delete this item?', 'main'),
                    'afterDelete' => 'function(link,success,data){ if(success) jAlert("' . iPhoenixLang::admin_t("Delete successfully", "main") . '"); }',
                    'buttons' => array
                        (
                        'update' => array(
                            'label' => iPhoenixLang::admin_t('Update', 'main'),
                            'url' => 'iPhoenixUrl::createUrl("admin/systemAddress/update",array("id"=>$data->id))'
                        ),
                        'delete' => array(
                            'label' => iPhoenixLang::admin_t('Delete', 'main'),
                            'url' => 'iPhoenixUrl::createUrl("admin/systemAddress/delete",array("id"=>$data->id))'
                        ),
                        'copy' => array
                            (
                            'label' => iPhoenixLang::admin_t('Copy', 'main'),
                            'imageUrl' => Yii::app()->theme->baseUrl . '/images/copy.png',
                            'url' => 'iPhoenixUrl::createUrl("admin/systemAddress/copy", array("id"=>$data->id))',
                        ),
                    ),
                    'headerHtmlOptions' => array('width' => '10%', 'class' => 'table-title'),
                ),
            ),
            'template' => '{displaybox}{checkbox}{summary}{items}{pager}',
            'summaryText' => '{count} ' . iPhoenixLang::admin_t('SystemAddress'),
            'pager' => array('class' => 'CLinkPager', 'header' => '', 'prevPageLabel' => '< ' . iPhoenixLang::admin_t('Previous'), 'nextPageLabel' => iPhoenixLang::admin_t('Next') . ' >', 'htmlOptions' => array('class' => 'pages fr')),
            'actions' => array(
                'delete' => array(
                    'action' => 'delete',
                    'label' => iPhoenixLang::admin_t('Delete', 'main'),
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/delete.png',
                    'url' => 'admin/systemAddress/checkbox'
                ),
                'copy' => array(
                    'action' => 'copy',
                    'label' => iPhoenixLang::admin_t('Copy', 'main'),
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/copy.png',
                    'url' => 'admin/systemAddress/checkbox'
                )
            ),
        ));
        ?>
    </div>
</div>
<!--end inside content-->
<script type="text/javascript">
    $("body").ajaxComplete(function () {
        $("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/systemAddress/edit') ?>", {
            submitdata: function (value, settings) {
                return {"id": $(this).attr("class").substr("16"), "attribute": "order_view"};
            },
            indicator: "<?php echo iPhoenixLang::admin_t('Saving...', 'main'); ?>",
            width: '20%',
            tooltip: "<?php echo iPhoenixLang::admin_t('Click to edit...', 'main'); ?>",
            type: "text",
            submit: "<?php echo iPhoenixLang::admin_t('Save', 'main'); ?>",
            name: "value",
            ajaxoptions: {"type": "GET"}
        });
    });

    $("a[class^=edit-order-view-]").editable("<?php echo iPhoenixUrl::createUrl('admin/systemAddress/edit') ?>", {
        submitdata: function (value, settings) {
            return {"id": $(this).attr("class").substr("16"), "attribute": "order_view"};
        },
        indicator: "<?php echo iPhoenixLang::admin_t('Saving...', 'main'); ?>",
        width: '20%',
        tooltip: "<?php echo iPhoenixLang::admin_t('Click to edit...', 'main'); ?>",
        type: "text",
        submit: "<?php echo iPhoenixLang::admin_t('Save', 'main'); ?>",
        name: "value",
        ajaxoptions: {"type": "GET"}
    });
</script>	