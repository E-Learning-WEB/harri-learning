<?php
	class fungsifoto
	{
	public function idanggota_to_foto($fid) 
		{
		$sql 		= "select * from tbanggota where id_anggota = '$fid'";
		$data		= mysql_query($sql);
		$parseuser 	= mysql_fetch_assoc($data);
		
		return $parseuser;
		}
	}

	$fungsifoto = new fungsifoto();
?>