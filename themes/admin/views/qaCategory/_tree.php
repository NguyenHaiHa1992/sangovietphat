<div class="fr menu-tree" style="width: 400px;">
<ul>
	<li><label><b>QA Answer categories tree</b></label></li>
	<li>
		<?php 
		$list_style=array('color:red','color:blue','color:black','color:green');
		$list_disable_nodes=array();
		foreach ($list_nodes as $id=>$level){
			$node=QaCategory::model()->findByPk($id);
			if($node->status == QaCategory::STATUS_DISABLE){
				$list_disable_nodes[]=$id;
				foreach($node->child_nodes as $id_child=>$level){
					$list_disable_nodes[]=$id_child;	
				}
			}	
		}	
		foreach ($list_nodes as $id=>$level){
			$node=QaCategory::model()->findByPk($id);
			$blank = "&nbsp";
			$prefix = "--";
			if(in_array($id, $list_disable_nodes))
				$style='color:grey';
			else 
				$style = $list_style[$level-1];
			for($i=1;$i<$level;$i++){
				$blank .= "&nbsp &nbsp &nbsp";
				$prefix .= "---";
			}
			$view =$blank."|".$prefix;
			echo "<div><label style=".$style.">".$view." ".$node->name."<a alt='Copy to clipboard' href='".$node->detail_url."' id='".$id."'class='clipboard i16 i16-clipboard' style='display:inline-block'></a></label><a id='".$id."' class='i16 i16-statustext'></a><a id='".$id."'class='i16 i16-trashgray'></a></div>";
		}
		?>           
		</li>
</ul>
</div>