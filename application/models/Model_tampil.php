<?php
	class Model_tampil extends CI_Model{
		function datanya($dataemail){
			$sql_query=$this->db->query("SELECT *,`tbl_pelanggan_verifikasi`.`email` AS `email`,`tbl_pelanggan`.`nama_pelanggan` as `nama` FROM `tbl_pelanggan` INNER JOIN `tbl_pelanggan_verifikasi` ON `tbl_pelanggan_verifikasi`.`pic_email` = `tbl_pelanggan`.`pic_email` WHERE `tbl_pelanggan`.`pic_email` = '$dataemail'");
			if($sql_query->num_rows()>0){
				return $sql_query->result_array();
			}		
		}
	}
?>