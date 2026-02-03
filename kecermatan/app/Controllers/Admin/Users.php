<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Usersmodel;
use App\Models\Soalmodel;
class Users extends BaseController
{
   
    protected $usersmodel;
    protected $soalmodel;
    protected $session;

    public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->usersmodel = new Usersmodel();
		$this->soalmodel = new Soalmodel();
	}

    public function index()
    {
        return view ('admin/dashboard');
    }

    public function showuser() {
        $ret = $this->usersmodel->getUsers()->getResult();
        echo json_encode($ret);
    }

    public function simpanuser() {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $kota_asal = $this->request->getPost('kota_asal');
        $no_hp = $this->request->getPost('no_hp');
        $produk_id = $this->request->getPost('category');

        $cekemail = $this->usersmodel->checkemail($email)->getResult();
        if (count($cekemail)>0) {
            $ret = "emailsudahada";
        } else {
            $dataperson = [
                "person_nm" => $name,
                "email" => $email,
                "kota_asal" => $kota_asal,
                "cellphone" => $no_hp,
            ];
    
            $insert_person = $this->usersmodel->simpanperson($dataperson);
            if ($insert_person) {
                $datausers = [
                    "pwd0" => md5($password),
                    "user_nm" => $email,
                    "user_group" => "siswa",
                    "person_id" => $insert_person
                ];
                $insert_user = $this->usersmodel->simpanuser($datausers);
    
                $databill = [
                    "member_id" => $insert_user,
                    "created_user" => $this->session->user_id,
                    "created_dttm" => $date = date("Y-m-d H:i:s"),
                    "status_cd" => "normal"
    
                ];
    
                $insert_bill = $this->usersmodel->simpanbill($databill);
    
                $databill_item = [
                    "billing_id" => $insert_bill,
                    "produk_id" => $produk_id,
                    "created_user" => $this->session->user_id,
                    "created_dttm" => $date = date("Y-m-d H:i:s"),
                    "status_cd" => "normal"
                ];
                $insert_bill_item = $this->usersmodel->simpanbill_item($databill_item);
    
                $ret = "berhasil";
            } else {
                $ret = "gagal";
            }
        }
        echo json_encode($ret);
    }

    

    public function edituser() {
        $user_id = $this->request->getPost('user_id');
        $ret = $this->usersmodel->getUsersById($user_id)->getResult();
        echo json_encode($ret);
    }
    public function updateuser() {
        $person_id = $this->request->getPost('person_id');
        $user_id = $this->request->getPost('user_id');
        $billing_item_id = $this->request->getPost('billing_item_id');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password_lama = $this->request->getPost('password_lama');
        $kota_asal = $this->request->getPost('kota_asal');
        $no_hp = $this->request->getPost('no_hp');
        $produk_id = $this->request->getPost('category');

        $cekemail = $this->usersmodel->checkemail($email)->getResult();
        if (count($cekemail)>0) {
            $ret = "emailsudahada";
        } else {
            $dataperson = [
                "person_nm" => $name,
                "email" => $email,
                "kota_asal" => $kota_asal,
                "cellphone" => $no_hp,
            ];
    
            $update_person = $this->usersmodel->updateperson($person_id,$dataperson);
            if ($update_person) {
                if ($password_lama == md5($password)) {
                    $datausers = [
                        "user_nm" => $email,
                        "user_group" => "siswa",
                    ];
                } else {
                    $datausers = [
                        "pwd0" => md5($password),
                        "user_nm" => $email,
                        "user_group" => "siswa",
                    ];
                }
                $update_user = $this->usersmodel->updateuser($user_id,$datausers);
    
                // $databill = [
                //     "member_id" => $insert_user,
                //     "created_user" => $this->session->user_id,
                //     "created_dttm" => $date = date("Y-m-d H:i:s"),
                //     "status_cd" => "normal"
    
                // ];
    
                // $insert_bill = $this->usersmodel->simpanbill($databill);
    
                $databill_item = [
                    "produk_id" => $produk_id,
                    "update_user" => $this->session->user_id,
                    "update_dttm" => $date = date("Y-m-d H:i:s"),
                    "status_cd" => "normal"
                ];
                $update_bill_item = $this->usersmodel->updatebill_item($billing_item_id,$databill_item);
    
                $ret = "berhasil";
            } else {
                $ret = "gagal";
            }
        }
        echo json_encode($ret);
    }

    public function hapususer() {
        $user_id = $this->request->getPost('user_id');
        $person_id = $this->request->getPost('person_id');
        $billing_id = $this->request->getPost('billing_id');
        $billing_item_id = $this->request->getPost('billing_item_id');

        $data = [
            "status_cd" => "nullified"
        ];

        $this->usersmodel->hapususer($user_id,$data);
        $this->usersmodel->hapusperson($person_id,$data);
        $this->usersmodel->hapusbilling($billing_id,$data);
        $res = $this->usersmodel->hapusbillitem($billing_item_id,$data);
        if ($res) {
            $ret = "berhasil";
        } else {
            $ret = "gagal";
        }
        echo json_encode($ret);
    }
    
}
