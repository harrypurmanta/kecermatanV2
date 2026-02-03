<?php

namespace App\Controllers;
use App\Models\Usersmodel;
class Login extends BaseController
{
    protected $usersmodel;
    protected $session;
    public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->usersmodel = new Usersmodel();
	}
    public function index()
    {
        if ($this->session->get("user_nm") != "") {
			if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else {
				return redirect('admin/dashboard');
			}
		} else {
			return view('login');
		}
    }

    public function checklogin() {
		$u = $this->request->getPost('username');
		$p = $this->request->getPost('password');
		$pwd0 = md5($p);
    	// print_r($p);exit;
		$res = $this->usersmodel->checklogin($u,$pwd0)->getResultArray();
		// var_dump($res);exit;
			if (count($res) > 0) {
			  foreach ($res as $k) {
			  	$this->session->set($k);
			  }
				if ($this->session->user_group == "siswa") {
				$ressession = $this->usersmodel->getMaxSessionUser($this->session->user_id)->getResultArray();
				if (count($ressession) > 0) {
					foreach ($ressession as $sess) {
						$session = $sess['session_soal_nm'] + 1;
						$newdata = [
							'session'  => $session,
						];
						$this->session->set($newdata);
					}
				} else {
					$session = 1;
					$newdata = [
						'session'  => $session,
					];
					$this->session->set($newdata);
				}
			$date = date("Y-m-d H:i:s");
			$data = [
				"session_soal_nm" => $session,
				"user_id" => $this->session->user_id,
				"created_dttm" => $date
			];
			$this->usersmodel->simpanSessionUser($data);
			// echo $this->session->session;
		  	return redirect('home');
		  } else if ($this->session->user_group == 'owner') {
		  	return redirect('admin');
		  } else if ($this->session->user_group == 'kasir') {
		  	return redirect('kasir');
		  } else if ($this->session->user_group == 'manajer') {
		  	return redirect('dashboard');
		  } else {
		  	return redirect('/');
		  }
        } else {
          return redirect('/');
        } 
	}
    
    public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');

		// $this->session->destroy();
		// return redirect()->to(site_url('/'));
	}

}

