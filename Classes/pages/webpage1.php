<?php
namespace Classes\pages;

class webpage1 extends mainpage
{
	public function ConstructPage()
	{
		$query = new \Classes\db\DBquery();
		$fetch_query = $query->Query1();

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