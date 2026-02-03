<?php namespace App\Models;

use CodeIgniter\Model;

class Soalmodel extends Model
{
    protected $table      = 'soal';
    protected $primaryKey = 'soal_id ';
    protected $allowedFields = ['soal_id','no_soal','soal_nm','soal_img','kunci','status_cd','group_id','materi'];

    public function getSoalIdByClueSKGambar($clue,$group_id,$sk_group_id,$kolom_id, $materi) {
        return $this->db->table('soal')
                        ->select('soal_id')
                        ->where('clue',$clue)
                        ->where('group_id',$group_id)
                        ->where('sk_group_id',$sk_group_id)
                        ->where('kolom_id',$kolom_id)
                        ->where('materi',$materi)
                        ->orderby('soal_id', 'ASC')
                        ->get();
    }
    
    public function updatejawabansk($jawaban_nm,$data,$soal_id,$jawaban_nm_lama) {
        return $this->db->table('jawaban')
                        ->set($data)
                        ->where('jawaban_nm',$jawaban_nm_lama)
                        ->where('soal_id',$soal_id)
                        ->update();
    }
    
    public function updatesoalsk($group_id,$sk_group_id,$kolom,$data,$soal_id,$jawaban_nm_lama) {
        return $this->db->table('soal')
                        ->set($data)
                        ->where('group_id',$group_id)
                        ->where('sk_group_id',$sk_group_id)
                        ->where('kolom_id',$kolom)
                        ->where('soal_id',$soal_id)
                        ->where('clue',$jawaban_nm_lama)
                        ->update();
    }
    
    public function insertsoalSKlatihan($data) {
        $this->db->table('soal')
                 ->insert($data);
        return $this->db->insertID();
    }

    public function insertjawabanSKlatihan($datax) {
        $this->db->table('jawaban')
                 ->insert($datax);
    }

    public function getGroup() {
        return $this->db->table('group_soal')
                        ->select('group_soal_id,group_nm')
                        ->get();
    }

    public function getGroupById($group_id) {
        return $this->db->table('group_soal')
                        ->select('group_soal_id,group_nm')
                        ->where('group_soal_id',$group_id)
                        ->get();
    }

    public function getSkGroup() {
        return $this->db->table('sk_group')
                        ->select('sk_group_id ,sk_group_nm')
                        ->get();
    }

    public function getSoalByUser($group_id,$user_id,$user_group) {
        return $this->db->table('soal')
                        ->select('clue,sk_group_id')
                        ->where('group_id',$group_id)
                        ->where('created_user',$user_id)
                        ->where('user_group',$user_group)
                        ->groupby('clue')
                        ->orderby('kolom_id')
                        ->get();
    }

    public function getSoal($group_id)
    {
        return $this->db->table('kolom_soal b')
                        ->select('
                            b.kolom_id,
                            b.kolom_nm,
                            a.clue,
                            a.sk_group_id
                        ')
                        ->join(
                            'soal a',
                            'a.kolom_id = b.kolom_id AND a.group_id = '.$this->db->escape($group_id),
                            'left'
                        )
                        ->groupBy('b.kolom_id, a.clue, a.sk_group_id')
                        ->orderBy('b.kolom_id','asc')
                        ->get();
    }


    // public function getSoal($group_id) {
    //     return $this->db->table('soal')
    //                     ->select('clue, sk_group_id')
    //                     ->where('group_id', $group_id)
    //                     ->groupby('clue, sk_group_id')
    //                     ->orderby('kolom_id')
    //                     ->get();
    // }

    public function getsoalbyskgroup($sk_group_id, $group_id)
    {
        return $this->db->table('soal')
            ->select('clue, MIN(kolom_id) AS kolom_id')
            ->where('group_id', $group_id)
            ->where('sk_group_id', $sk_group_id)
            ->groupBy('clue')
            ->orderBy('kolom_id')
            ->get();
    }


    // public function getsoalbyskgroup($sk_group_id,$group_id) {
    //     return $this->db->table('soal')
    //                     ->select('clue')
    //                     ->where('group_id', $group_id)
    //                     ->where('sk_group_id', $sk_group_id)
    //                     ->groupby('clue')
    //                     ->orderby('kolom_id')
    //                     ->get();
    // }

    public function getSoalIdByClue($clue,$group_id,$sk_group_id,$kolom_id) {
        return $this->db->table('soal')
                        ->select('soal_id')
                        ->where('clue',$clue)
                        ->where('group_id',$group_id)
                        ->where('sk_group_id',$sk_group_id)
                        ->where('kolom_id',$kolom_id)
                        ->orderby('soal_id', 'ASC')
                        ->get();
    }

    public function getSoalIdByClueUser($clue,$group_id,$sk_group_id,$kolom_id,$user_id) {
        return $this->db->table('soal')
                        ->select('soal_id')
                        ->where('clue',$clue)
                        ->where('group_id',$group_id)
                        ->where('sk_group_id',$sk_group_id)
                        ->where('kolom_id',$kolom_id)
                        ->where('user_id',$user_id)
                        ->where('user_group','private')
                        ->orderby('soal_id', 'ASC')
                        ->get();
    }

    public function insertsoal($data) {
        $this->db->table('soal')
                 ->insert($data);
        return $this->db->insertID();
    }

    public function insertjawaban($data) {
        $this->db->table('jawaban')
                 ->insert($data);
    }

    public function updatesoal($group_id,$sk_group_id,$kolom,$data,$soal_id,$jawaban_nm_lama) {
        return $this->db->table('soal')
                        ->set($data)
                        ->where('group_id',$group_id)
                        ->where('sk_group_id',$sk_group_id)
                        ->where('kolom_id',$kolom)
                        ->where('soal_id',$soal_id)
                        ->where('clue',$jawaban_nm_lama)
                        ->update();
    }

    public function updatejawaban($jawaban_nm,$data,$soal_id,$jawaban_nm_lama) {
        return $this->db->table('jawaban')
                        ->set($data)
                        ->where('jawaban_nm',$jawaban_nm_lama)
                        ->where('soal_id',$soal_id)
                        ->update();
    }

    public function getResponByMateriId($user_id,$sk_group_id,$group_id,$user_group) {
        return $this->db->table('respon a')
                        ->select('*')
                        ->join('soal b','b.soal_id=a.soal_id','left')
                        ->where('a.created_user_id',$user_id)
                        ->where('a.materi',98)
                        ->where('a.group_id',$group_id)
                        ->where('b.sk_group_id',$sk_group_id)
                        ->where('b.user_group',$user_group)
                        ->orderBy('a.used','DESC')
                        ->limit(1)
                        ->get();
    }

    public function simpanRespon($data) {
        $this->db->table('respon')
                 ->insert($data);
        return $this->db->insertID();
    }

    public function getSoalSKUser($no_soal,$group_id,$materi,$kolom_id,$sk_group_id,$user_group,$user_id) {
        return $this->db->table('soal a')
                        ->select('*')
                        ->join('group_soal b','b.group_soal_id=a.group_id','left')
                        ->where('a.no_soal',$no_soal)
                        ->where('a.group_id',$group_id)
                        ->where('a.materi',$materi)
                        ->where('a.kolom_id',$kolom_id)
                        ->where('a.sk_group_id',$sk_group_id)
                        ->where('a.sk_group_id',$sk_group_id)
                        ->where('a.user_group',$user_group)
                        ->where('a.created_user',$user_id)
                        ->where('a.status_cd','normal')
                        ->get();
    }

    public function getSoalSK($no_soal,$group_id,$materi,$kolom_id,$sk_group_id,$user_group) {
        return $this->db->table('soal a')
                        ->select('*')
                        ->join('group_soal b','b.group_soal_id=a.group_id','left')
                        ->where('a.no_soal',$no_soal)
                        ->where('a.group_id',$group_id)
                        ->where('a.materi',$materi)
                        ->where('a.kolom_id',$kolom_id)
                        ->where('a.sk_group_id',$sk_group_id)
                        ->where('a.user_group',$user_group)
                        ->where('a.status_cd','normal')
                        ->get();
    }

    public function getjawaban($soal_id) {
        return $this->db->table('jawaban')
                        ->select('*')
                        ->where('soal_id',$soal_id)
                        ->where('status_cd','normal')
                        ->get();
    }

    public function getKolomSoal() {
        return $this->db->table('kolom_soal')
                        ->select('*')
                        ->where('status_cd','normal')
                        ->get();
    }

    public function getMaxUsed($user_id,$group_id,$sk_group_id,$user_group) {
        return $this->db->table('respon')
                        ->select('MAX(used) as maxused')
                        ->where('created_user_id',$user_id)
                        ->where('materi',98)
                        ->where('group_id',$group_id)
                        ->where('user_group',$user_group)
                        ->where('sk_group_id',$sk_group_id)
                        ->get();
    }

    public function simpanLog($data_log) {
        return $this->db->table('log_activity_user')
                        ->insert($data_log);
    }

    public function checkExistSoal($sk_group_id,$group_id) {
        return $this->db->table('soal a')
                        ->select('*')
                        ->where('a.group_id',$group_id)
                        ->where('a.sk_group_id',$sk_group_id)
                        ->where('a.status_cd','normal')
                        ->get();
    }

    public function getloguser($user_id) {
        return $this->db->table('log_activity_user a')
                        ->select('*,a.created_dttm as tanggal_tes,a.user_group as tipe_soal')
                        ->join('users b','b.user_id=a.created_user_id ','left')
                        ->join('person c','c.person_id=b.person_id ','left')
                        ->where('a.created_user_id',$user_id)
                        ->orderBy('a.log_activity_id', 'desc')
                        ->get();

    }

    public function getloguserAdmin($user_id) {
        return $this->db->table('log_activity_user a')
                        ->select('*,a.created_dttm as tanggal_tes,a.user_group as tipe_soal')
                        ->join('users b','b.user_id=a.created_user_id ','left')
                        ->join('person c','c.person_id=b.person_id ','left')
                        ->orderBy('a.log_activity_id', 'desc')
                        ->get();

    }

    public function getlogplay($user_id) {
        return $this->db->table('log_activity_user a')
                        ->select('MAX(a.play) as ujike')
                        ->where('a.created_user_id',$user_id)
                        ->get();
    }
}
