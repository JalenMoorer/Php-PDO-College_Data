<?php
namespace Classes\db;

class DBquery extends DBconnect
{
	public $content;
	public $HTML;

	public function Test()
	{
		$this->sth = $this->dbh->query("SHOW TABLES");
		$this->sth->setFetchMode(\PDO::FETCH_OBJ);

		print_r($this->sth);
	}

	public function Query1()
	{
		$this->sth = $this->dbh->query
		(
			'SELECT hd2011.hd2011_id, hd2011.UNITID, hd2011.INSTNM, effy2011.EFYTOTLT 
			from hd2011 INNER JOIN effy2011 ON hd2011.UNITID=effy2011.UNITID
			GROUP BY hd2011.hd2011_id ORDER BY effy2011.EFYTOTLT DESC;'
		);

		$this->sth->setFetchMode(\PDO::FETCH_OBJ);

		$content = "<table class=\"table\">
						<tr>
							<th>Id</th>
							<th>Unit ID</th>
							<th>Institution Name</th>
							<th>Total Enrollement</th>
						</tr>					
					";
		$HTML = "";
		while($Row = $this->sth->fetch()) //Gets executed and loops data into HTML View
		{
				$content .= "
					
					<tr>
						<td>".$Row->hd2011_id."</td>
					    <td>".$Row->UNITID."</td>
					    <td>".$Row->INSTNM."</td>
					    <td>".$Row->EFYTOTLT."</td>
					</tr>    
					";

		}
		$content .= "</table>";

		return $content; 
	}

	public function Query2()
	{
		$this->sth = $this->dbh->query
		(
			'SELECT hd2011.INSTNM , f1011.F1A09  from hd2011 
			LEFT JOIN f1011 ON hd2011.UNITID=f1011.UNITID 
			ORDER BY f1011.F1A09 DESC;'
		);

		$this->sth->setFetchMode(\PDO::FETCH_OBJ);

		$content = "<table class=\"table\">
						<tr>
							<th>Instiution Name</th>
							<th>Total Liabilities</th>
						</tr>					
					";
		$HTML = "";
		while($Row = $this->sth->fetch()) //Gets executed and loops data into HTML View
		{
				$content .= "
					
					<tr>
					    <td>".$Row->INSTNM."</td>";

					    if($Row->F1A09 == '')
					    	$content .= "<td>N/A</td>";
					    else
					    	$content .= "<td>".$Row->F1A09."</td>
					</tr>    
					";
		}

		$content .= "</table>";

		return $content; 
	}

	public function Query3()
	{
		$this->sth = $this->dbh->query
		(
			'SELECT hd2011.INSTNM , f1011.F1A18 from hd2011 
			LEFT JOIN f1011 ON hd2011.UNITID=f1011.UNITID 
			ORDER BY f1011.F1A18 DESC;'
		);

		$this->sth->setFetchMode(\PDO::FETCH_OBJ);

		$content = "<table class=\"table\">
						<tr>
							<th>Institution Name</th>
							<th>Total Net Assets</th>
						</tr>					
					";
		$HTML = "";
		while($Row = $this->sth->fetch()) //Gets executed and loops data into HTML View
		{
				$content .= "
					
					<tr>
					    <td>".$Row->INSTNM."</td>";

					    if($Row->F1A18 == NULL)
					    	$content .= "<td>N/A</td>";
					    else
					    	$content .= "<td>".$Row->F1A18."</td>
					</tr>    
					";

		}
		$content .= "</table>";

		return $content; 
	}

	public function Query4()
	{
		$this->sth = $this->dbh->query
		(
			'SELECT hd2011.UNITID , hd2011.INSTNM , (f1011.F1A18/SUM(effy2011.EFYTOTLT)) AS \'Total_asset_per_Student\' 
			from hd2011 INNER JOIN f1011 ON hd2011.UNITID=f1011.UNITID INNER JOIN effy2011 ON hd2011.UNITID=effy2011.UNITID 
			GROUP BY hd2011.UNITID ORDER BY `Total_asset_per_Student` DESC;'
		);

		$this->sth->setFetchMode(\PDO::FETCH_OBJ);

		$content = "<table class=\"table\">
						<tr>
							<th>Institution Id</th>
							<th>Institution Name</th>
							<th>Total Assets per Student</th>
						</tr>					
					";
		$HTML = "";
		while($Row = $this->sth->fetch()) //Gets executed and loops data into HTML View
		{
				$content .= "
					
					<tr>
						<td>".$Row->UNITID."</td>
					    <td>".$Row->INSTNM."</td>
					    ";


					    if($Row->Total_asset_per_Student == NULL)
					    	$content .= "<td>N/A</td>";
					    else
					    	$content .= "<td>".$Row->Total_asset_per_Student."</td>
					</tr>    
					";

		}
		$content .= "</table>";

		return $content; 
	}

	public function Query5()
	{
		$this->sth = $this->dbh->query
		(
			'SELECT hd2011.UNITID, hd2011.INSTNM, ((SUM(effy2011.EFYTOTLT) - SUM(effy2010.EFYTOTLT))/SUM(effy2010.EFYTOTLT)) AS \'Percent_Change\' FROM hd2011 
			INNER JOIN effy2011 ON hd2011.UNITID=effy2011.UNITID INNER JOIN effy2010 ON hd2011.UNITID=effy2010.UNITID 
			GROUP BY hd2011.UNITID ORDER BY `Percent_Change` DESC;'
		);

		$this->sth->setFetchMode(\PDO::FETCH_OBJ);

		$content = "<table class=\"table\">
						<tr>
							<th>Institution Id</th>
							<th>Institution Name</th>
							<th>Percent Change between 2011-2010</th>
						</tr>					
					";
		$HTML = "";
		while($Row = $this->sth->fetch()) //Gets executed and loops data into HTML View
		{
				$content .= "
					
					<tr>
						<td>".$Row->UNITID."</td>
					    <td>".$Row->INSTNM."</td>
					    ";


					    if($Row->Percent_Change == NULL)
					    	$content .= "<td>N/A</td>";
					    else
					    	$content .= "<td>".round((float)$Row->Percent_Change * 100 ) .'%'."</td>
					</tr>    
					";

		}
		$content .= "</table>";

		return $content; 
	}
}
?>