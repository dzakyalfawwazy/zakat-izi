<?php
class crud {
	function __construct()
	{
		$this->konn = new mysqli('localhost', 'root', '', 'db_zakatizi');
	}
	public function tampildata( $table ){
		$data=$this->konn->query("select * from $table");
		return $data;
	}
	public function tampildetail( $table, $cond){
		$data=$this->konn->query("select * from $table where $cond");
		return $data;
	}
	public function login( $user,$password){
		$data=$this->konn->query("select * from tb_user where nama_user='$user' and password = '$password'");
		return $data;
	}
	public function tampilcond($select, $table, $cond){
		$data=$this->konn->query("select $select from $table where $cond");
		return $data;
	}
	public function editdata( $table, $cond, $value ){
		$data=$this->konn->query("select * from $table where $cond = '$value'");
		return $data;
	}
	public function insert( $table, $value){
		$sql=$this->konn->query("insert into $table values($value)");
	}
	public function edit( $table, $value, $cond, $set){
		$sql=$this->konn->query("update $table  set $value where $cond  = '$set'");
	}
	public function edit2( $table, $value, $cond){
		$sql=$this->konn->query("update $table  set $value where $cond");
	}
	public function cek_kadaluarsa(){
		$sql=$this->konn->query("update tb_order set status='Kadaluarsa' where status='Belum Bayar' and waktu_kadaluarsa < now()");
	}
	public function delete( $table, $cond, $value){
		$sql=$this->konn->query("delete from $table where $cond = '$value'");
	}
}