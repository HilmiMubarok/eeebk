<?php

function countNotifPelanggaranSiswa($siswa_id)
{
	$CI =& get_instance();

	$where = array(
		'status'   => 'unread',
		'siswa_id' => $siswa_id
	);

	$CI->db->where($where);
	return $CI->db->get('notifikasi', 3);
	
}