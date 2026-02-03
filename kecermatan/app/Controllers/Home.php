<?php

namespace App\Controllers;
use App\Models\Usersmodel;
use App\Models\Soalmodel;
class Home extends BaseController
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
        return view('front/dashboard');
    }

    public function main()
    {
        return view('front/main');
    }
    
    public function latihan()
    {
        if ($this->session->get("user_nm") == "") {
			return view('login');
		} 

        $request = \Config\Services::request();

        if ($request->uri->getSegment(4) == 8) {
            return view('front/maingambar');
        }

        return view ('front/main');
    }

    public function startujian() {
        $request = \Config\Services::request();
        $proc = $this->request->getPost("proc");
        $soal_id = $this->request->getPost("soal_id");
        $jawaban_id = $this->request->getPost("jawaban_id");
        $group_id = $this->request->getPost("group_id");
        $no_soal = $this->request->getPost("no_soal");
        $pilihan_nm = $this->request->getPost("pilihan_nm");
        $kolom_id = $this->request->getPost("kolom_id");
        $materi = $this->request->getPost("materi");
        $sk_group_id = $this->request->getPost("sk_group_id");
        $user_group = $this->request->getPost("user_group");
        $date = date("Y-m-d H:i:s");
        
        if ($proc == "start") {
            $getUsed = $this->soalmodel->getResponByMateriId($this->session->user_id,$sk_group_id,$group_id,$user_group)->getResult();
            if (count($getUsed)>0) {
                $used = $getUsed[0]->used + 1;
                $this->session->set("used",$used);
              } else {
                $used = 1;
                $this->session->set("used",$used);
              }
        }
        
        if ($jawaban_id != "") {
            if ($no_soal == 1 && $kolom_id == 1) {
                $playke = 0;
                $log = $this->soalmodel->getlogplay($this->session->user_id)->getResult();
                // echo json_encode($log);exit;
                if ($log[0]->ujike == null) {
                    $playke = 1;
                } else {
                    $playke = $log[0]->ujike + 1;
                }

                $data_log = [
                    "group_id" => $group_id,
                    "sk_group_id" => $sk_group_id,
                    "materi_id" => $materi,
                    "used" => $this->session->used,
                    "created_user_id" => $this->session->user_id,
                    "created_dttm" => $date,
                    "user_group" => $user_group,
                    "play" => $playke
                ];
                $this->soalmodel->simpanLog($data_log);
            }

            $data = [
                "jawaban_id" => $jawaban_id,
                "pilihan_nm" => $pilihan_nm,
                "soal_id" => $soal_id,
                "no_soal" => $no_soal,
                "group_id" => $group_id,
                "sk_group_id" => $sk_group_id,
                "materi" => $materi,
                "used" => $this->session->used,
                "kolom_id" => $kolom_id,
                "created_user_id" => $this->session->user_id,
                "created_dttm" => $date,
                "session" => $this->session->session,
                "user_group" => $user_group
            ];
            $respon_id = $this->soalmodel->simpanRespon($data);
        }
        $no_soal = $no_soal + 1;
        // if ($proc == "start") {
        //     $kolom_id = $kolom_id + 1;
        // } 
       
        if ($proc == "persiapan") {
            echo json_encode(array("ret"=>"persiapan", "kolom"=>$kolom_id));
        } else if ($no_soal == 51 && $kolom_id <= 10) {
            echo json_encode(array("ret"=>"persiapan", "kolom"=>$kolom_id));
        } else if ($kolom_id == 11) {
            echo json_encode(array("ret"=>"selesai"));
        } else {
            // print_r($request->uri->getSegment(2));exit;
            if ($user_group == "private") {
                $res = $this->soalmodel->getSoalSKUser($no_soal,$group_id,98,$kolom_id,$sk_group_id,$user_group,$this->session->user_id)->getResult();
            } else {
                $res = $this->soalmodel->getSoalSK($no_soal,$group_id,98,$kolom_id,$sk_group_id,$user_group)->getResult();
            }
            
            if (count($res)>0) {
                $dv_jawaban = "<table>
                            <thead>
                                <tr>";
                                $getjawaban = $this->soalmodel->getjawaban($res[0]->soal_id)->getResult();
                                foreach ($getjawaban as $key) {
                                    $jawaban_nm = str_split($key->jawaban_nm,1);
                                    foreach ($jawaban_nm as $jwb_nm) {
                                        $dv_jawaban .= "<th class='px-2 text-5xl lg:text-8xl lg:px-4'>$jwb_nm</th>";
                                    }
                                }
                            $dv_jawaban .= "</tr>
                            </thead>
                            <tbody class=''>
                                <tr>
                                <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>A</td>
                                <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>B</td>
                                <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>C</td>
                                <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>D</td>
                                <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>E</td>
                                </tr>
                            </tbody>
                        </table>";

                $dv_soal = "<h1 class='mt-5 font-bold text-two bg-three px-6 py-2 rounded-lg shadow-md w-[150px] text-center'>Soal $no_soal</h1>
                                <table>
                                    <thead>
                                        <tr>";
                                        foreach ($res as $keySoal) {
                                            $soal_nm = str_split($keySoal->soal_nm,1);
                                            foreach ($soal_nm as $jwb_nm) {
                                                $dv_soal .= "<th class='text-3xl py-3 px-3 lg:text-5xl'>".$jwb_nm."</th>";
                                            }
                                        }
                            $dv_soal .= "</tr>
                                    </thead>
                                </table>
                                <div class='flex justify-center mt-6 items-center space-x-3'>";
                                foreach ($getjawaban as $k) {
                                    $jawaban_id = $k->jawaban_id;
                                    $dv_soal .= "<button onclick='startujian(\"next\",\"A\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>A</button>
                                    <button onclick='startujian(\"next\",\"B\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>B</button>
                                    <button onclick='startujian(\"next\",\"C\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>C</button>
                                    <button onclick='startujian(\"next\",\"D\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>D</button>
                                    <button onclick='startujian(\"next\",\"E\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>E</button>";
                                }
                                    
                            $dv_soal .= "</div>";
                           
                echo json_encode(array("kolom"=>$kolom_id,"group_id"=>$group_id,"no_soal"=>$no_soal,"dv_jawaban"=>$dv_jawaban,"dv_soal"=>$dv_soal));
            } else {
                $ret = "soal_tidak_ada";
                echo json_encode(array("ret"=>$ret));
            }
        }
    }

    public function startujiangambar() {
        $request = \Config\Services::request();
        $proc = $this->request->getPost("proc");
        $soal_id = $this->request->getPost("soal_id");
        $jawaban_id = $this->request->getPost("jawaban_id");
        $group_id = $this->request->getPost("group_id");
        $no_soal = $this->request->getPost("no_soal");
        $pilihan_nm = $this->request->getPost("pilihan_nm");
        $kolom_id = $this->request->getPost("kolom_id");
        $materi = $this->request->getPost("materi");
        $sk_group_id = $this->request->getPost("sk_group_id");
        $user_group = $this->request->getPost("user_group");
        $date = date("Y-m-d H:i:s");
        
        if ($proc == "start") {
            $getUsed = $this->soalmodel->getResponByMateriId($this->session->user_id,$sk_group_id,$group_id,$user_group)->getResult();
            if (count($getUsed)>0) {
                $used = $getUsed[0]->used + 1;
                $this->session->set("used",$used);
              } else {
                $used = 1;
                $this->session->set("used",$used);
              }
        }
        
        if ($jawaban_id != "") {
            if ($no_soal == 1 && $kolom_id == 1) {
                $playke = 0;
                $log = $this->soalmodel->getlogplay($this->session->user_id)->getResult();
                // echo json_encode($log);exit;
                if ($log[0]->ujike == null) {
                    $playke = 1;
                } else {
                    $playke = $log[0]->ujike + 1;
                }

                $data_log = [
                    "group_id" => $group_id,
                    "sk_group_id" => $sk_group_id,
                    "materi_id" => $materi,
                    "used" => $this->session->used,
                    "created_user_id" => $this->session->user_id,
                    "created_dttm" => $date,
                    "user_group" => $user_group,
                    "play" => $playke
                ];
                $this->soalmodel->simpanLog($data_log);
            }

            $data = [
                "jawaban_id" => $jawaban_id,
                "pilihan_nm" => $pilihan_nm,
                "soal_id" => $soal_id,
                "no_soal" => $no_soal,
                "group_id" => $group_id,
                "sk_group_id" => $sk_group_id,
                "materi" => $materi,
                "used" => $this->session->used,
                "kolom_id" => $kolom_id,
                "created_user_id" => $this->session->user_id,
                "created_dttm" => $date,
                "session" => $this->session->session,
                "user_group" => $user_group
            ];
            $respon_id = $this->soalmodel->simpanRespon($data);
        }
        $no_soal = $no_soal + 1;
        // if ($proc == "start") {
        //     $kolom_id = $kolom_id + 1;
        // } 
       
        if ($proc == "persiapan") {
            echo json_encode(array("ret"=>"persiapan", "kolom"=>$kolom_id));
        } else if ($no_soal == 51 && $kolom_id <= 10) {
            echo json_encode(array("ret"=>"persiapan", "kolom"=>$kolom_id));
        } else if ($kolom_id == 11) {
            echo json_encode(array("ret"=>"selesai"));
        } else {
            // print_r($request->uri->getSegment(2));exit;
            if ($user_group == "private") {
                $res = $this->soalmodel->getSoalSKUser($no_soal,$group_id,98,$kolom_id,$sk_group_id,$user_group,$this->session->user_id)->getResult();
            } else {
                $res = $this->soalmodel->getSoalSK($no_soal,$group_id,98,$kolom_id,$sk_group_id,$user_group)->getResult();
            }
            
            if (count($res)>0) {
                $dv_jawaban = "<table>
                            <thead>
                                <tr>";
                                $getjawaban = $this->soalmodel->getjawaban($res[0]->soal_id)->getResult();
                                foreach ($getjawaban as $key) {
                                    $jawaban_nm = explode('|', $key->jawaban_nm);
                                    foreach ($jawaban_nm as $jwb_nm) {
                                        $src = base_url("img/soalskgambar/kolom/$kolom_id/sk_group/$sk_group_id/$jwb_nm");
                                        $dv_jawaban .= "<th class='px-2 text-5xl lg:text-8xl lg:px-4'><img src='$src' style='height: 80px; width: 100px;'></th>";
                                    }
                                }
                            $dv_jawaban .= "</tr>
                            </thead>
                            <tbody>
                                <tr class='text-center'>
                                    <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>A</td>
                                    <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>B</td>
                                    <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>C</td>
                                    <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>D</td>
                                    <td class='py-2 px-3 font-thin text-2xl lg:text-4xl lg:px-7'>E</td>
                                </tr>
                            </tbody>
                        </table>";

                $dv_soal = "<h1 class='mt-5 font-bold text-two bg-three px-6 py-2 rounded-lg shadow-md w-[150px] text-center'>Soal $no_soal</h1>
                                <table>
                                    <thead>
                                        <tr>";
                                        foreach ($res as $keySoal) {
                                            $soal_nm = explode('|', $keySoal->soal_nm);
                                            foreach ($soal_nm as $jwb_nm) {
                                                $src = base_url("img/soalskgambar/kolom/$kolom_id/sk_group/$sk_group_id/$jwb_nm");
                                                $dv_soal .= "<th class='text-3xl py-3 px-3 lg:text-5xl'><img src='$src' style='height: 100px; width: 100px; margin: 5px;'></th>";
                                            }
                                        }
                                        
                            $dv_soal .= "</tr>
                                    </thead>
                                </table>
                                <div class='flex justify-center mt-6 items-center space-x-3'>";
                                foreach ($getjawaban as $k) {
                                    $jawaban_id = $k->jawaban_id;
                                    $dv_soal .= "
                                    <button onclick='startujian(\"next\",\"A\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>A</button>
                                    <button onclick='startujian(\"next\",\"B\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>B</button>
                                    <button onclick='startujian(\"next\",\"C\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>C</button>
                                    <button onclick='startujian(\"next\",\"D\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>D</button>
                                    <button onclick='startujian(\"next\",\"E\",".$jawaban_id.",".$res[0]->soal_id.",$group_id,$no_soal,$kolom_id,$materi)' class='btn_jawaban font-bold px-5 py-1 md:px-10 lg:px-14 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200'>E</button>";
                                }
                                    
                            $dv_soal .= "</div>";
                           
                echo json_encode(array("kolom"=>$kolom_id,"group_id"=>$group_id,"no_soal"=>$no_soal,"dv_jawaban"=>$dv_jawaban,"dv_soal"=>$dv_soal));
            } else {
                $ret = "soal_tidak_ada";
                echo json_encode(array("ret"=>$ret));
            }
        }
    }

    public function hasiltryout() {
        $request = \Config\Services::request();
        $user_id = $this->session->user_id;
        $sk_group_id = $request->uri->getSegment(3);
        $group_id = $request->uri->getSegment(4);
        $user_group = $request->uri->getSegment(5);
        // print_r($user_group);exit;
        $used = $this->soalmodel->getMaxUsed($user_id,$group_id,$sk_group_id,$user_group)->getResult();
        $klm = $this->soalmodel->getKolomSoal()->getResult();
 
                $data = [
                    "kolom" => $klm,
                    "used" => $used
                ];
        return view('front/hasiltryout',$data);
    }

    public function hasiltryoutRiwayat() {
        $request = \Config\Services::request();
        $user_id = $this->session->user_id;
        $sk_group_id = $request->uri->getSegment(3);
        $group_id = $request->uri->getSegment(4);
        $user_group = $request->uri->getSegment(5);
        // print_r($user_group);exit;
        $used = $this->soalmodel->getMaxUsed($user_id,$group_id,$sk_group_id,$user_group)->getResult();
        $klm = $this->soalmodel->getKolomSoal()->getResult();
 
                $data = [
                    "kolom" => $klm,
                    "used" => $used
                ];
        return view('front/hasiltryout',$data);
    }

}

