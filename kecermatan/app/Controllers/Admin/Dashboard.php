<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Usersmodel;
use App\Models\Soalmodel;
class Dashboard extends BaseController
{

    protected $usersmodel;
    protected $soalmodel;
    protected $session;
    public function __construct()
	{
        $this->session = \Config\Services::session();
		$this->usersmodel = new Usersmodel();
        $this->soalmodel = new Soalmodel();
	}
   
    public function index()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $jumlah_perbulan = $this->usersmodel->jumlahUserPerbulan()->getResult();
                foreach ($jumlah_perbulan as $key) {
                    $jumlah_user[] = $key->jumlah_user;
                }
                $data = [
                    "jumlah_user" => $this->usersmodel->jumlahUser()->getResult(),
                    "jumlah_user_perbulan" => $jumlah_user
                ];
                return view ('admin/dashboard',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    public function hasiltryout() {
        $request = \Config\Services::request();
        
        $sk_group_id = $request->uri->getSegment(4);
        $group_id = $request->uri->getSegment(5);
        $user_group = $request->uri->getSegment(6);
        $user_id = $request->uri->getSegment(7);
        $play = $request->uri->getSegment(8);
        // print_r($user_group);exit;
        // $used = $this->soalmodel->getMaxUsed($user_id,$group_id,$sk_group_id,$user_group)->getResult();
        $infoPeserta = $this->usersmodel->getUsersById($user_id)->getResult();
        // print_r($infoPeserta);exit;
        $klm = $this->soalmodel->getKolomSoal()->getResult();
 
                $data = [
                    "kolom" => $klm,
                    "used" => $play,
                    "infoPeserta" => $infoPeserta
                ];
        return view('admin/hasiltryout',$data);
    }
    
}
