<?php

namespace App\Controllers;
use App\Models\Usersmodel;
use App\Models\Soalmodel;
class Menu extends BaseController
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
    public function create_soal()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        
        $ressoal = $this->soalmodel->getSoalByUser(90,$this->session->user_id,"private")->getResult();
        if (count($ressoal)>0) {
            $soal = $ressoal;
        } else {
            $soal = null;
        }
        $data = [
            "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
            "soal" => $soal
        ];
        return view('front/create_soal',$data);
    }

    public function dashboard()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        return view('front/dashboard');
    }
    
    public function main()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        return view('front/main');
    }

    public function riwayat()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        $data = [
            "log" =>$log = $this->soalmodel->getloguser($this->session->user_id)->getResult()
        ];
        
        
        return view('front/riwayat',$data);
    }

    public function soal()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        $request = \Config\Services::request();
        $group_id = $request->uri->getSegment(3);
        $sk_group = $this->soalmodel->getSkGroup()->getResult();
        foreach ($sk_group as $key) {
            $checksoal = $this->soalmodel->checkExistSoal($sk_group[0]->sk_group_id,$group_id)->getResult();
        }
       
        $data = [
            "sk_group" => $this->soalmodel->getSkGroup()->getResult(),
            "group" => $this->soalmodel->getGroupById($group_id)->getResult()
        ];

        return view('front/soal',$data);
    }

}

