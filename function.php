<?php
	class fungsi
	{
	public function idanggota_to_username($uid) 
		{
		$sql 		= "select * from tbanggota where id_anggota = '$uid'";
		$data		= mysql_query($sql);
		$parseuser 	= mysql_fetch_assoc($data);
		
		return $parseuser;
		}
	}

	$fungsi = new fungsi();
?>