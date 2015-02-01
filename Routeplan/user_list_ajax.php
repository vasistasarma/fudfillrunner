<?php
include("../includes/db_config.php");

$q=$_GET['q'];

$my_data=mysql_real_escape_string($q);

$sql="SELECT cust_fname FROM inventory.customer_book WHERE cust_fname LIKE '%$my_data%' ORDER BY cust_fname";
$result = mysql_query($sql) or die('error'.mysql_error());
	
if($result)
{
	while($row=mysql_fetch_array($result))
	{
		echo $row['cust_fname']."\n";
	}
}
?>