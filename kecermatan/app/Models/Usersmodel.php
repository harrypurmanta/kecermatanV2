<?php namespace App\Models;

use CodeIgniter\Model;

class Usersmodel extends Model
{
    protected $table      = 'users';
    // protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_nm', 'pwd0','user_group','person_id','status_cd', 'created_dttm','created_user','update_dttm','update_user','nullified_dttm','nullified_user'];


    public function checklogin($u,$p) {
        return $this->db->table('users a')
                        ->join('person b','b.person_id = a.person_id','left')
                        ->where('a.user_nm', $u)
                        ->where('a.pwd0',$p)
                        ->where('a.user_group','siswa')
                        ->where('a.status_cd','normal')
                        ->get();
    }

    public function getMaxSessionUser($user_id) {
        return $this->db->table('session_soal')
                        ->select('session_soal_nm')
                        ->where('user_id',$user_id)
                        ->orderby('session_soal_id','desc')
                        ->limit(1)
                        ->get();
    }
    public function simpanSessionUser($data) {
        $this->db->table('session_soal')
                 ->insert($data);
    }

    public function checkloginadmin($u,$p) {
        return $this->db->table('users a')
                        ->join('person b','b.person_id = a.person_id','left')
                        ->where('b.email', $u)
                        ->where('a.pwd0',$p)
                        ->where('a.user_group','owner')
                        ->get();
    }

    public function getUsers() {
        return $this->db->table('users a')
                        ->join('person b','b.person_id = a.person_id','left')
                        ->join('billing c','c.member_id = a.user_id','left')
                        ->join('billing_item d','d.billing_id = c.billing_id','left')
                        ->where('a.status_cd', 'normal')
                        ->where('a.user_group','siswa')
                        ->get();
    }

    public function getUsersById($user_id) {
        return $this->db->table('users a')
                        ->join('person b','b.person_id = a.person_id','left')
                        ->join('billing c','c.member_id = a.user_id','left')
                        ->join('billing_item d','d.billing_id = c.billing_id','left')
                        ->where('a.status_cd', 'normal')
                        ->where('c.status_cd', 'normal')
                        ->where('d.status_cd', 'normal')
                        ->where('a.user_group','siswa')
                        ->where('a.user_id',$user_id)
                        ->get();
    }

    public function getProduk() {
        return $this->db->table('produk')
                        ->select('*')
                        ->where('status_cd','normal')
                        ->get();
    }

    public function simpanperson($data) {
        $this->db->table('person')
                 ->insert($data);
        return $this->db->insertID();
    }

    public function simpanuser($data) {
        $this->db->table('users')
                 ->insert($data);
        return $this->db->insertID();
    }

    public function simpanbill($data) {
        $this->db->table('billing')
                 ->insert($data);
        return $this->db->insertID();
    }

    public function simpanbill_item($data) {
        return $this->db->table('billing_item')
                 ->insert($data);
    }

    public function updateperson($person_id,$dataperson) {
        return $this->db->table('person')
                        ->set($dataperson)
                        ->where('person_id',$person_id)
                        ->update();
    }

    public function updateuser($user_id,$data) {
        return $this->db->table('users')
                        ->set($data)
                        ->where('user_id',$user_id)
                        ->update();
    }

    public function updatebill_item($billing_item_id,$data) {
        return $this->db->table('billing_item')
                        ->set($data)
                        ->where('billing_item_id',$billing_item_id)
                        ->update();
    }

    public function hapususer($user_id,$data) {
        return $this->db->table('users')
                        ->set($data)
                        ->where('user_id',$user_id)
                        ->update();
    }

    public function hapusperson($person_id,$data) {
        return $this->db->table('person')
                        ->set($data)
                        ->where('person_id',$person_id)
                        ->update();
    }

    public function hapusbilling($billing_id,$data) {
        return $this->db->table('billing')
                        ->set($data)
                        ->where('billing_id',$billing_id)
                        ->update();
    }

    public function hapusbillitem($billing_item_id,$data) {
        return $this->db->table('billing_item')
                        ->set($data)
                        ->where('billing_item_id',$billing_item_id)
                        ->update();
    }

    public function jumlahUser() {
        return $this->db->table('users a')
                        ->select('COUNT(user_id) as jumlah_user')
                        ->join('person b','b.person_id = a.person_id','left')
                        ->where('a.status_cd', 'normal')
                        ->where('a.user_group','siswa')
                        ->get();
    }

    public function jumlahUserPerbulan() {
        return $this->db->table('users a')
                        ->select('COUNT(user_id) as jumlah_user')
                        ->join('person b','b.person_id = a.person_id','left')
                        ->where('a.status_cd', 'normal')
                        ->where('a.user_group','siswa')
                        ->groupBy('MONTH(a.created_dttm)')
                        ->get();
    }

    public function checkemail($email) {
        return $this->db->table('users')
                        ->where('user_nm', $email)
                        ->get();
    }
}