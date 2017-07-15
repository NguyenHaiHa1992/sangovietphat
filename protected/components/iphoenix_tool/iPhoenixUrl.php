<?php
class iPhoenixUrl
{
    static function createUrl($route,$params=array(),$ampersand='&')
    {
        if (isset($_GET['iphoenix_language'])) {
            $params['iphoenix_language']=$_GET['iphoenix_language'];
        }
        return Yii::app()->createUrl($route, $params, $ampersand);
    }

    static function createBreadcrumb($model)
    {
//        $list = array('Trang chủ'=>Yii::app()->getBaseUrl(true));
        $list = array();

		switch (get_class($model)) {
			case 'News':
				$list['Tin tức'] = iPhoenixUrl::createUrl('news/index');
//				$category = $model->category;
//				if(isset($category)){
//					$list_ancestor = array_reverse($category->ancestor_nodes);
//					foreach($list_ancestor as $cat_id){
//						$cat = NewsCategory::model()->findByPk($cat_id);
//						$list[$cat->name] = $cat->detail_url;
//					}
//				}
				break;

			case 'NewsCategory':
				$list['Tin tức'] = iPhoenixUrl::createUrl('news/index');
//				$category = $model;
//				if(isset($category)){
//					$list_ancestor = array_reverse($category->ancestor_nodes);
//					foreach($list_ancestor as $cat_id){
//						$cat = NewsCategory::model()->findByPk($cat_id);
//						$list[$cat->name] = $cat->detail_url;
//					}
//
//				}
				break;

            case 'Product':
                $list['Sản phẩm'] = iPhoenixUrl::createUrl('product/list');
//                $category = $model->category;
//                if(isset($category)){
//                    $list_ancestor = array_reverse($category->ancestor_nodes);
//                    foreach($list_ancestor as $cat_id){
//                        $cat = ProductCategory::model()->findByPk($cat_id);
//                        $list[$cat->name] = $cat->detail_url;
//                    }
//                }
                break;

            case 'ProductCategory':
                $list['Sản phẩm'] = iPhoenixUrl::createUrl('product/index');
//                $category = $model;
//                if(isset($category)){
//                    $list_ancestor = array_reverse($category->ancestor_nodes);
//                    foreach($list_ancestor as $cat_id){
//                        $cat = ProductCategory::model()->findByPk($cat_id);
//                        $list[$cat->name] = $cat->detail_url;
//                    }
//
//                }
                break;

			case 'Qa':
				$list['Hỏi đáp'] = iPhoenixUrl::createUrl('qa/index');
//				$category = $model->category;
//				if(isset($category)){
//					$list_ancestor = array_reverse($category->ancestor_nodes);
//					foreach($list_ancestor as $cat_id){
//						$cat = QaCategory::model()->findByPk($cat_id);
//						$list[$cat->name] = $cat->detail_url;
//					}
//				}
				break;

			default:
				
				break;
		}
        return $list;
    }
}
?>