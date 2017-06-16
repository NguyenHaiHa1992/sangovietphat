<?php
class wPager extends CLinkPager
{
	/**
	 * class="current"
	 * Executes the widget.
	 * This overrides the parent implementation by displaying the generated page buttons.
	 */
	public function run()
	{
		$this->registerClientScript();
		$buttons=$this->createPageButtons();
		if(empty($buttons))
			return;
		echo ($this->header == '')?'<ul class="pager">':$this->header;
		echo implode(" ",$buttons);
		echo ($this->footer == '')?'</ul>':$this->footer;
	}
	
	/**
	 * Creates the page buttons.
	 * @return array a list of page buttons (in HTML code).
	 */
	protected function createPageButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();
	
		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();
	
		// first page
		if ($currentPage!=0){
			$this->firstPageLabel = "Đầu";
			$buttons[]=$this->createPageButton($this->firstPageLabel,0,$this->firstPageCssClass,$currentPage<=0,false);
		}
		
		// prev page
		if(($page=$currentPage-1)<0)
			$page=0;
	
		if ($currentPage!=0)
		{
			$this->prevPageLabel = "Trang trước";
			$buttons[]=$this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0,false);
		}

		// internal pages
		for($i=$beginPage;$i<=$endPage;++$i)
		{
			if ($i==$endPage)
			{
				if ($i == $currentPage)
					$label = '<li class="active"><a class="disable">'.($i+1).'</a></li>';
				else
					$label = $i+1;
	
			}
			else
			{
				if ($i == $currentPage)
					$label = '<li class="active"><a class="disable">'.($i+1).'</a></li>';
				else
					$label = $i+1;
			}
			$buttons[]=$this->createPageButton($label,$i,$this->internalPageCssClass,false,$i==$currentPage);
		}
		
		// next page
		if(($page=$currentPage+1)>=$pageCount-1)
			$page=$pageCount-1;
	
		if ($currentPage!=$pageCount-1)
		{
			$this->nextPageLabel = "Trang sau";
			$buttons[]=$this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false);
		}

	
		if ($currentPage!=$pageCount-1)
		{
			// last page
			$this->lastPageLabel = "Cuối";
			$buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false);
		}

		return $buttons;
	}
	
	/**
	 * Creates a page button.
	 * You may override this method to customize the page buttons.
	 * @param string $label the text label for the button
	 * @param integer $page the page number
	 * @param string $class the CSS class for the page button.
	 * @param boolean $hidden whether this page button is visible
	 * @param boolean $selected whether this page button is selected
	 * @return string the generated button
	 */
	protected function createPageButton($label,$page,$class,$hidden,$selected)
	{
		if($hidden || $selected)
			$link = $label;
		else
			$link = '<li><a href="'.$this->createPageUrl($page).'">'.$label.'</a></li>';
		return $link; 
	}
}