<?php
namespace Classes\pages;

class webpage3 extends mainpage
{
	public function ConstructPage()
	{
		$query = new \Classes\db\DBquery();
		$fetch_query = $query->Query3();

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