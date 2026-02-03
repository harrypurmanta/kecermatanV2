<?php

namespace App\Controllers;
use App\Models\Usersmodel;
use App\Models\Soalmodel;
class Soal extends BaseController
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

    public function getsoalbyskgroup() {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        $sk_group_id = $this->request->getPost('sk_group_id');
        $group_id = $this->request->getPost('group_id');
        $user_group = $this->request->getPost('user_group');

        $res = $this->soalmodel->getSoalByUser($group_id,$this->session->user_id,$user_group)->getResult();
        if (count($res)>0) {
            $ret = $res;
        } else {
            $ret = null;
        }
        echo json_encode($ret);
    }
   
    public function simpansoal() {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        $sk_group_id = $this->request->getPost('sk_group_id');
        $group_id = $this->request->getPost('group_id');
        $user_group = $this->request->getPost('user_group');
        $kolom1 = $this->request->getPost('kolom1');
        $kolom2 = $this->request->getPost('kolom2');
        $kolom3 = $this->request->getPost('kolom3');
        $kolom4 = $this->request->getPost('kolom4');
        $kolom5 = $this->request->getPost('kolom5');
        $kolom6 = $this->request->getPost('kolom6');
        $kolom7 = $this->request->getPost('kolom7');
        $kolom8 = $this->request->getPost('kolom8');
        $kolom9 = $this->request->getPost('kolom9');
        $kolom10 = $this->request->getPost('kolom10');
        

        $res = $this->randomchar($kolom1,1,98,$sk_group_id,$group_id,$user_group);
        if ($res == "finish") {
            $res = $this->randomchar($kolom2,2,98,$sk_group_id,$group_id,$user_group);
            if ($res == "finish") {
                $res = $this->randomchar($kolom3,3,98,$sk_group_id,$group_id,$user_group);
                if ($res == "finish") {
                    $res = $this->randomchar($kolom4,4,98,$sk_group_id,$group_id,$user_group);
                    if ($res == "finish") {
                        $res = $this->randomchar($kolom5,5,98,$sk_group_id,$group_id,$user_group);
                        if ($res == "finish") {
                            $res = $this->randomchar($kolom6,6,98,$sk_group_id,$group_id,$user_group);
                            if ($res == "finish") {
                                $res = $this->randomchar($kolom7,7,98,$sk_group_id,$group_id,$user_group);
                                if ($res == "finish") {
                                    $res = $this->randomchar($kolom8,8,98,$sk_group_id,$group_id,$user_group);
                                    if ($res == "finish") {
                                        $res = $this->randomchar($kolom9,9,98,$sk_group_id,$group_id,$user_group);
                                        if ($res == "finish") {
                                            $res = $this->randomchar($kolom10,10,98,$sk_group_id,$group_id,$user_group);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } 
        
        echo json_encode("sukses");
    }

    public function updatesoal() {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 
        $sk_group_id = $this->request->getPost('sk_group_id');
        $group_id = $this->request->getPost('group_id');
        $user_group = $this->request->getPost('user_group');
        $kolom1 = $this->request->getPost('kolom1');
        $kolom2 = $this->request->getPost('kolom2');
        $kolom3 = $this->request->getPost('kolom3');
        $kolom4 = $this->request->getPost('kolom4');
        $kolom5 = $this->request->getPost('kolom5');
        $kolom6 = $this->request->getPost('kolom6');
        $kolom7 = $this->request->getPost('kolom7');
        $kolom8 = $this->request->getPost('kolom8');
        $kolom9 = $this->request->getPost('kolom9');
        $kolom10 = $this->request->getPost('kolom10');
        
        if ($this->request->getPost('kolom1_lama') == $kolom1 = $this->request->getPost('kolom1')) {
            $res = "finish";
        } else {
            $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom1_lama'),$group_id,$sk_group_id,1,$this->session->user_id)->getResult();
            $res = $this->randomcharUpdate($kolom1,1,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom1_lama'),$user_group);
        }
        
        if ($res == "finish") {
            if ($this->request->getPost('kolom2_lama') == $kolom1 = $this->request->getPost('kolom2')) {
                $res = "finish";
            } else {
                $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom2_lama'),$group_id,$sk_group_id,2,$this->session->user_id)->getResult();
                $res = $this->randomcharUpdate($kolom2,2,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom2_lama'),$user_group);
            }

            if ($res == "finish") {
                if ($this->request->getPost('kolom3_lama') == $kolom1 = $this->request->getPost('kolom3')) {
                    $res = "finish";
                } else {
                    $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom3_lama'),$group_id,$sk_group_id,3,$this->session->user_id)->getResult();
                    $res = $this->randomcharUpdate($kolom3,3,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom3_lama'),$user_group);
                }

                if ($res == "finish") {
                    if ($this->request->getPost('kolom4_lama') == $kolom1 = $this->request->getPost('kolom4')) {
                        $res = "finish";
                    } else {
                        $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom4_lama'),$group_id,$sk_group_id,4,$this->session->user_id)->getResult();
                        $res = $this->randomcharUpdate($kolom4,4,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom4_lama'),$user_group);
                    }
                    
                    if ($res == "finish") {
                        if ($this->request->getPost('kolom5_lama') == $kolom1 = $this->request->getPost('kolom5')) {
                            $res = "finish";
                        } else {
                            $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom5_lama'),$group_id,$sk_group_id,5,$this->session->user_id)->getResult();
                            $res = $this->randomcharUpdate($kolom5,5,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom5_lama'),$user_group);
                        }
                        
                        if ($res == "finish") {
                            if ($this->request->getPost('kolom6_lama') == $kolom1 = $this->request->getPost('kolom6')) {
                                $res = "finish";
                            } else {
                                $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom6_lama'),$group_id,$sk_group_id,6,$this->session->user_id)->getResult();
                                $res = $this->randomcharUpdate($kolom6,6,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom6_lama'),$user_group);
                            }
                            
                            if ($res == "finish") {
                                if ($this->request->getPost('kolom7_lama') == $kolom1 = $this->request->getPost('kolom7')) {
                                    $res = "finish";
                                } else {
                                    $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom7_lama'),$group_id,$sk_group_id,7,$this->session->user_id)->getResult();
                                    $res = $this->randomcharUpdate($kolom7,7,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom7_lama'),$user_group);
                                }
                                
                                if ($res == "finish") {
                                    if ($this->request->getPost('kolom8_lama') == $kolom1 = $this->request->getPost('kolom8')) {
                                        $res = "finish";
                                    } else {
                                        $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom8_lama'),$group_id,$sk_group_id,8,$this->session->user_id)->getResult();
                                        $res = $this->randomcharUpdate($kolom8,8,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom8_lama'),$user_group);
                                    }
                                    
                                    if ($res == "finish") {
                                        if ($this->request->getPost('kolom9_lama') == $kolom1 = $this->request->getPost('kolom9')) {
                                            $res = "finish";
                                        } else {
                                            $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom9_lama'),$group_id,$sk_group_id,9,$this->session->user_id)->getResult();
                                            $res = $this->randomcharUpdate($kolom9,9,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom9_lama'),$user_group);
                                        }
                                        
                                        if ($res == "finish") {
                                            if ($this->request->getPost('kolom10_lama') == $kolom1 = $this->request->getPost('kolom10')) {
                                                $res = "finish";
                                            } else {
                                                $soal_id = $this->soalmodel->getSoalIdByClueUser($this->request->getPost('kolom10_lama'),$group_id,$sk_group_id,10,$this->session->user_id)->getResult();
                                                $res = $this->randomcharUpdate($kolom10,10,98,$sk_group_id,$group_id,$soal_id,$this->request->getPost('kolom10_lama'),$user_group);
                                            }
                                            
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } 
        
        echo json_encode("sukses");
    }

    public function randsoal($characters,$randSoal) {
        $randomString = $randSoal;
        for ($s = 0; $s < 5; $s++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        
        $randSoal = count_chars($randomString,3);
        if (strlen($randSoal) == 5) {
            $soal_nm = str_shuffle($randSoal);
        } else {
            $soal_nm = $this->randsoal($characters,$randSoal);
        }

        return $soal_nm;
    }

    public function randomchar($char,$kolom,$materi_id,$sk_group_id,$group_id,$user_group) {
        $characters = $char; 
        $pilihan = "ABCDE";
        $kunci = "";
        $no = 1;
        for ($i = 0; $i < 50; $i++) {
            $indexs = rand(0, strlen($pilihan) - 1);
            $kunci = $pilihan[$indexs];
            if ($kunci == "A") {
                $hilang = $characters[0];
            } else if ($kunci == "B") {
                $hilang = $characters[1];
            } else if ($kunci == "C") {
                $hilang = $characters[2];
            } else if ($kunci == "D") {
                $hilang = $characters[3];
            } else if ($kunci == "E") {
                $hilang = $characters[4];
            }
            
            $soal_txt = $this->randsoal($characters,"");
           
            if (strlen($soal_txt) === 5) {
                $soal_nm = str_replace($hilang,"",$soal_txt);
            } else {
                $soal_nm = $soal_txt;
            }

            $data = [
                'soal_nm' => $soal_nm,
                'group_id' => $group_id,
                'no_soal' => $no,
                'kunci' => $kunci,
                'materi' => $materi_id,
                'status_cd' => 'normal',
                'kolom_id' => $kolom,
                'clue' => $characters,
                'sk_group_id' => $sk_group_id,
                'user_group' => $user_group,
                "created_user" => $this->session->user_id
            ];

            $soal_id = $this->soalmodel->insertsoal($data);

            $dataJawaban = [
                "soal_id" => $soal_id,
                "pilihan_nm" => $pilihan,
                "jawaban_nm" => $characters,
                "status_cd" => "normal"
            ];

            $this->soalmodel->insertjawaban($dataJawaban);
            $no++;
        }
        return "finish";
    }

    public function randomcharUpdate($char,$kolom,$materi_id,$sk_group_id,$group_id,$soal_id,$jawaban_nm_lama,$user_group) {
        // echo json_encode($soal_id);exit;
        $characters = $char; 
        $pilihan = "ABCDE";
        $kunci = "";
        $no = 1;
        $index = 0;
        for ($i = 0; $i < 50; $i++) {
            $indexs = rand(0, strlen($pilihan) - 1);
            $kunci = $pilihan[$indexs];
            if ($kunci == "A") {
                $hilang = $characters[0];
            } else if ($kunci == "B") {
                $hilang = $characters[1];
            } else if ($kunci == "C") {
                $hilang = $characters[2];
            } else if ($kunci == "D") {
                $hilang = $characters[3];
            } else if ($kunci == "E") {
                $hilang = $characters[4];
            }
            
            $soal_txt = $this->randsoal($characters,"");
           
            if (strlen($soal_txt) === 5) {
                $soal_nm = str_replace($hilang,"",$soal_txt);
            } else {
                $soal_nm = $soal_txt;
            }

            $data = [
                'soal_nm' => $soal_nm,
                'group_id' => $group_id,
                'no_soal' => $no,
                'kunci' => $kunci,
                'materi' => $materi_id,
                'status_cd' => 'normal',
                'kolom_id' => $kolom,
                'clue' => $characters,
                'sk_group_id' => $sk_group_id,
                'user_group' => $user_group
            ];

            $updatesoal = $this->soalmodel->updatesoal($group_id,$sk_group_id,$kolom,$data,$soal_id[$index]->soal_id,$jawaban_nm_lama);

            if ($updatesoal) {
                $dataJawaban = [
                    "pilihan_nm" => $pilihan,
                    "jawaban_nm" => $characters,
                    "status_cd" => "normal"
                ];
    
                $updatejawaban = $this->soalmodel->updatejawaban($characters,$dataJawaban,$soal_id[$index]->soal_id,$jawaban_nm_lama);
                if ($updatejawaban) {
                    $ret = "finish";
                } else {
                    $ret = "gagaljwb";
                }
                
            } else {
                $ret = "gagalsoal";
            }
            
            $no++;
            $index++;
        }
        return $ret;
    }
    
}
