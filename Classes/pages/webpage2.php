<?php
namespace Classes\pages;

class webpage2 extends mainpage
{
	public function ConstructPage()
	{
		$query = new \Classes\db\DBquery();
		$fetch_query = $query->Query2();

		$this->Section = "
		        <section class=\"container\">
		        	<div class=\"col-lg-12\" id=\"News\">
		        		".$fetch_query."
		        	</div>
		        </section>
		        ";
	}
} 
?>