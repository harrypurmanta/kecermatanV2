<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
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

    public function create_user()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $data = [
                    "produk" => $this->usersmodel->getProduk()->getResult()
                ];
                return view('admin/create_user',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }
    
    public function main()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        return view('admin/main');
    }

    public function riwayat()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $data = [
                    "log" => $this->soalmodel->getloguserAdmin($this->session->user_id)->getResult()
                ];
                return view('admin/riwayat',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    public function soalumum()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(1)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalumum',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    public function soalhuruf()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(2)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalhuruf',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    public function soalangka()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(3)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalangka',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    public function soalsimbol()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(4)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalsimbol',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }
    public function soalhurufangka()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(5)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalhurufangka',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }
    public function soalangkasimbol()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(6)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalangkasimbol',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }
    public function soalhurufsimbol()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(7)->getResult();
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }
                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal
                ];
                return view('admin/soalhurufsimbol',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    public function soalgambar()
    {
        if ($this->session->get("user_nm") == "") {
            return view('login');
		} else {
            if ($this->session->get("user_group") == "siswa") {
				return redirect('home');
			} else if ($this->session->get("user_group") == "owner") {
                $ressoal = $this->soalmodel->getSoal(8)->getResult();
                // echo json_encode($ressoal);exit;
                if (count($ressoal)>0) {
                    $soal = $ressoal;
                } else {
                    $soal = null;
                }

                $data = [
                    "skgroup" => $this->soalmodel->getSkGroup()->getResult(),
                    "soal" => $soal,
                    "session" => $this->session
                ];
                return view('admin/soalgambar',$data);
            } else {
				return redirect('admin/dashboard');
			}
        }
    }

    // public function admin_dashboard()
    // {
    //     return view ('admin_dashboard');
    // }

}

