<?php
	/*$conn=mysql_connect("localhost","root","");
	if($conn){
		echo "Mysql Connected";
	}
	else{
		echo "Connection error";
	}
	mysql_select_db("invoice");
	echo "<hr/>";*/
		function dbe_engin($path){
		/*-------------------------------------*/
		//------Creating Table List start------//
		/*-------------------------------------*/
		$tb_name=mysql_query("show tables");
		$tables=array();
		while ($tb=mysql_fetch_row($tb_name)) {
			$tables[]=$tb[0] ;
		}
		//echo"<pre>";
		//print_r($tables);
		//echo"</pre>";
		/*-------------------------------------*/
		//-------Creating Table List end-------//
		/*-------------------------------------*/
		//echo "<hr/>";
		/*-------------------------------------*/
		//------Creating Table SQL start-------//
		/*-------------------------------------*/

		$table_sql=array();
		foreach ($tables as $key => $table) {

			$tbl_query=mysql_query("SHOW CREATE TABLE ".$table);
			$row2 = mysql_fetch_row($tbl_query);
			$table_sql[]=$row2[1];

		}
		$solid_tablecreate_sql=implode("; \n\n" , $table_sql);
		//echo "<hr/>";
		/*-------------------------------------*/
		//-------Creating Table SQL end--------//
		/*-------------------------------------*/


		/*-------------------------------------*/
		//------Inserting Data SQL Start-------//
		/*-------------------------------------*/
		$all_table_data=array();
		foreach ($tables as $key => $table) {
			$show_field=view_fields($table);
			$solid_field_name=implode(", ",$show_field);
			$create_field_sql="INSERT INTO `$table` ( ".$solid_field_name.") VALUES \n";

			$data_viewig=view_data($table);
			$solid_data_viewig=implode(", \n",$data_viewig)."; ";

			//Start checking data available
			$table_data=mysql_query("select*from ".$table);
			if(!$table_data){
				echo 'Could not run query: '. mysql_error();
			}
			
			if (mysql_num_rows($table_data) > 0) {
				$all_table_data[]=$create_field_sql.$solid_data_viewig;
			}
			else{
				$all_table_data[]=null;
			}
			//End checking data available
			
			
			
		}
		$entiar_table_data=implode(" \n\n\n\n",$all_table_data);
		/*-------------------------------------*/
		//-------Inserting Data SQL End--------//
		/*-------------------------------------*/
		$exported_database=$solid_tablecreate_sql."; \n \n".$entiar_table_data;

		//echo '<textarea cols="150" rows="30">';
		//echo $exported_database;
		//echo '</textarea>';


		//save file
		$file = fopen($path."backup ".date("Y-m-d").".sql","w+");
		fwrite($file,$exported_database);
		//$filename="backup ".date("Y-m-d").".sql";
		//Download file 
	}

	//Additional Functions
	/*-------------------------------------*/
	//--------Functions Start here---------//
	/*-------------------------------------*/
	function view_fields($tablename){
		$all_fields=array();
		$fields = mysql_query("SHOW COLUMNS FROM ".$tablename);
		if (!$fields) {
	   	 echo 'Could not run query: ' . mysql_error();
		}
		
		if (mysql_num_rows($fields) > 0) {
		    while ($field = mysql_fetch_assoc($fields)) {
		        $all_fields[]="`".$field["Field"]."`";
		    }
		}
		return $all_fields;
	}



	function view_data($tablename){
		$all_data=array();
		$table_data=mysql_query("select*from ".$tablename);
		if(!$table_data){
			echo 'Could not run query: '. mysql_error();
		}

		if(mysql_num_rows($table_data)>0){

			
			while ($t_data=mysql_fetch_row($table_data)) {

				$per_data=array();
				foreach ($t_data as $key => $tb_data) {
					$per_data[]= "'".str_replace("'","\'",$tb_data)."'";
				}
				$solid_data= "(".implode(", ",$per_data).")";
				$all_data[]=$solid_data;
			}
		}
			return $all_data;
	}

	/*-------------------------------------*/
	//---------Functions End here----------//
	/*-------------------------------------*/

	//Export End here==================================================================
	//Import Start here==================================================================

	function dbi_engin($file_path){
		/*-------------------------------------*/
		//------Creating Table List start------//
		/*-------------------------------------*/
		$tb_name=mysql_query("show tables");
		$tables=array();
		while ($tb=mysql_fetch_row($tb_name)) {
			$tables[]=$tb[0] ;
		}
		/*-------------------------------------*/
		//-------Creating Table List end-------//
		/*-------------------------------------*/
		$tbl_query=null;
		foreach ($tables as $key => $table) {
			$tbl_query=mysql_query("DROP TABLE IF EXISTS ".$table);
		}
		/*if ($tbl_query) {
			echo "All Table Deleted...! <br/>";
		}*/
	 
		//---------------------------------------------------------------------------
		//Forign code Start here
		//---------------------------------------------------------------------------
		$templine = '';
		// Read in entire file
		$lines = file($file_path);
		// Loop through each line
		foreach ($lines as $line)
		{
		// Skip it if it's a comment
			if (substr($line, 0, 2) == '--' || $line == '')
			    continue;

			// Add this line to the current segment
			$templine .= $line;
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';')
			{
			    // Perform the query
			    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			    // Reset temp variable to empty
			    $templine = '';
			}
		}

		 //echo "Database imported successfully <br/>";
		return true;
	}