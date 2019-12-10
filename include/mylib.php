<?php
class mylib
{
	public $con=null;
	public function mylib()//__construct()
	{
		$this->con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
	}
	
	public function sql_array_insert($table_name, $data, $flag=false)
	{
		$column = '';
		$values = '';
		foreach($data as $k=>$v)
		{
			$column = $column."`$k`,";
			$values = $values."'".trim($v)."',";
		}
		if($flag){
			$column = $column."`insertedon`,`insertedby`";
			$values = $values."NOW(),'".$_SESSION['id']."'";	
		}
		else{
			$column = substr($column, 0, -1);  
			$values = substr($values, 0, -1); 
		}
		$values=str_ireplace("'now()'","now()",$values);
		$values=str_ireplace("'true'","true",$values);
		$values=str_ireplace("'false'","false",$values);
		$qry = "insert into $table_name($column) values($values)";
		//echo $qry;
		if(mysqli_query($this->con,$qry)==1)
		{
			//$this->system_log($table_name, 'Inserted', $qry);
			return true;
		}
		else
		{
			echo mysqli_error();
			return false;
		}
	}
	public function sql_array_update($table_name, $data, $where, $flag=false)
	{
		$column_values = '';
		foreach($data as $k=>$v)
		{
			$column_values = $column_values."`$k`='".trim($v)."',";
		}
		if($flag){
			$column_values = $column_values."`updatedon`=NOW(),`updatedby`='".$_SESSION['id']."' ";
		}
		else{
			$column_values = substr($column_values, 0, -1);   
		}
		$column_values=str_ireplace("'now()'","now()",$column_values);
		$column_values=str_ireplace("'true'","true",$column_values);
		$column_values=str_ireplace("'false'","false",$column_values);
		$qry = "update $table_name set $column_values where $where";
		//echo $qry;
		if(mysqli_query($this->con,$qry)==1)
		{
			//$this->system_log($table_name, 'Updated', $qry);
			return true;
		}
		else
		{
			echo mysqli_error();
			return false;
		}
	}
	public function sql_array_delete($table_name, $where)
	{
		//$column_values = "`isdeleted`=true, `deletedon`=NOW(),`deletedby`='".$_SESSION['id']."' ";
		$column_values=str_replace("'now()'","now()",$column_values);
		$qry = "update $table_name set $column_values where $where";
		//echo $qry;
		if(mysqli_query($this->con,$qry)==1)
		{
			//$this->system_log($table_name, 'Deleted', $qry);
			return true;
		}
		else
		{
			echo mysqli_error();
			return false;
		}
	}
	
	
	public function curPageURL() {
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") 
		{$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	public function showError($title,$content)
	{
		echo "<div class='alert alert-danger'>";
		echo "<h4>$title</h4>";
		echo "$content";
		echo "</div>";
	}
	public function showInfo($title,$content)
	{
		echo "<div class='alert alert-success'>";
		echo "<h4>$title</h4>";
		echo "$content";
		echo "</div>";
	}
		public function pageHeader($title, $desc=null)
	{
		echo "<br /><div class='well'>";
		echo '<center>';
		echo "<h3>$title</h3>";
		echo "$desc";
		echo '</center>';
		echo "</div>";
	}
	public function sticky($name)
	{
		if(isset($_GET[$name]))
			return trim($_GET[$name]);
		else if(isset($_POST[$name]))
			return trim($_POST[$name]);
		else 
			return null;
	}

}
?>