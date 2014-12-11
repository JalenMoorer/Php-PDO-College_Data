<?php
namespace Classes\pages;

	class home extends mainpage
	{
		function ConstructPage()
		{	
			$tweet = "";
			$this->Header = "";
			$this->Title = "\t\t<title>College Data Project</title>\n";
			$this->Header .= "
				<div class=\"jumbotron\">
		            <section class=\"container\">
		                <div class=\"row\">
		                    <h3>Each link leads to a webpage that displays specific data depending on the query.</3>
		                </div>
		                <div class=\"row\">
		                    
		                </div>
		                <div class=\"row\">
		                    <div class=\"col-sm-12\">
		                        <div class=\"row\" id=\"Quote\">
		                            <a href=\"http://web.njit.edu/~jmm77/is218/Twitter/index.php?page=printtimeline\" class=\"btn btn-lg btn-block btn-success\">Colleges that have the highest enrollment</a>
		                            <a href=\"http://web.njit.edu/~jmm77/is218/Twitter/index.php?page=printfollowers\" class=\"btn btn-md btn-block btn-success\">Colleges with the largest amount of total liabilities</a>
		                            <a href=\"http://web.njit.edu/~jmm77/is218/Twitter/index.php?page=printprofile\" class=\"btn btn-md btn-block btn-success\">Colleges with the largest amount of net assets</a>
		                            <a href=\"http://web.njit.edu/~jmm77/is218/Twitter/index.php?page=printprofile\" class=\"btn btn-md btn-block btn-success\">Colleges with the largest amount of net assets</a>
		                            <a href=\"http://web.njit.edu/~jmm77/is218/Twitter/index.php?page=printtweets\" class=\"btn btn-md btn-block btn-success\">Web page that shows the colleges with the largest percentage increase in enrollment between the years of 2011 and 2010</a>
		                          </div>
		                    </div>
		                </div>
		            </section>
		        </div>
			";		
		}
	}
?>