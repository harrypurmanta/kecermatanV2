<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include('front/title') ?>
     <!-- <script src="https://cdn.tailwindcss.com"></script> -->

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/styles.css">
</head>
<body>
    <div class="min-h-screen relative md:flex bg-slate-100">
<!-- sidebar -->
  <?= $this->include('front/sidebar') ?>
        <!-- content -->
        <div class="flex-1 items-center p-3 text-xl bg-slate-100" >
          <h1  class="bg-orange-200 p-3 mb-4 rounded-md text-center shadow-lg">
          <p style='margin:10px;font-size:18px;'>Nilai yang tampil merupakan hasil dari jumlah soal yang terjawab, dan bukan merupakan bobot penilaian seperti saat tes sesungguhnya.</p>
          </h1>
          <div>
          </div>
            <?php
                $kolom_nm = [];
                $soal_terjawab_chart = [];
                $jawaban_benar_chart = [];
            ?>
          <div class=" flex-1 p-2 font-bold text-lg">
                <h1 class="mb-4 font-bold bg-three px-4 py-4 rounded-lg shadow-md text-two">HASIL PENILAIAN</h1>
                <!--DATA TABLE -->
                <div class="overflow-x-auto p-2">
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            Kolom
                            </th>
                            <th scope="col" class="px-6 py-3">
                            Soal Terjawab
                            </th>
                            <th scope="col" class="px-6 py-3">
                               Benar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Salah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // echo $used[0]->maxused;exit;
                        $db = db_connect();
                        $request = \Config\Services::request();
                        $this->session = \Config\Services::session();
                        foreach ($kolom as $kkolom) {
                            $kolom_nm[] = $kkolom->kolom_nm;
                            $benar = 0;
                            $salah = 0;
                            $soal_terjawab = 0;
                            $query = $db->query("SELECT *,a.pilihan_nm AS pilihan_respon FROM respon a LEFT JOIN soal b ON b.soal_id = a.soal_id LEFT JOIN jawaban c ON c.jawaban_id = a.jawaban_id WHERE a.materi = 98 AND b.sk_group_id = ".$request->uri->getSegment(3)." AND a.created_user_id = ".$this->session->user_id." AND a.used = ".$used[0]->maxused." AND a.kolom_id = $kkolom->kolom_id AND a.group_id = ".$request->uri->getSegment(4)." AND a.user_group = '".$request->uri->getSegment(5)."'")->getResult();

                                if (count($query)>0) {
                                    $soal_terjawab = count($query);
                                    foreach ($query as $rSK) {
                                        if ($rSK->pilihan_respon == $rSK->kunci) {
                                            $benar = $benar + 1;
                                        } else {
                                            $salah = $salah + 1;
                                        }
                                    }
                                } else {
                                    $soal_terjawab = $soal_terjawab;
                                }

                                $soal_terjawab_chart[] =  $soal_terjawab;
                                $jawaban_benar_chart[] = $benar;  
                        ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                            <td>
                            <?= $kkolom->kolom_nm ?>
                            </td>
                            <td class="px-6 py-4">
                            <?= $soal_terjawab ?>
                            </td>
                            <td class="px-12 py-4">
                            <?= $benar ?>
                            </td>
                            <td class="px-6 py-4">
                            <?= $salah ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>

                <div class="bg-three mt-2 rounded-md">
                    <div class='chart'>
                        <canvas id='barChart' style='min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;'></canvas>
                    </div>
                </div>
        </div>
      </div>
    </div>
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/dist/js/sweetalert2.js"></script>
    <script src="<?= base_url() ?>/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var areaChartData = {
            labels  : <?= json_encode($kolom_nm) ?>,
            datasets: [
                {
                  label               : "Jawaban Benar",
                  backgroundColor     : "rgba(40,167,69,1)",
                  borderColor         : "rgba(60,141,188,0.8)",
                  pointRadius         : false,
                  pointColor          : "#00a65a",
                  pointStrokeColor    : "rgba(60,141,188,1)",
                  pointHighlightFill  : "#fff",
                  pointHighlightStroke: "rgba(60,141,188,1)",
                  data                : <?= json_encode($jawaban_benar_chart) ?>,
                  bezierCurve : false
                },
                {
                  label               : "Soal Terjawab",
                  backgroundColor     : "rgba(60,141,188,0.9)",
                  borderColor         : "rgba(60,141,188,0.8)",
                  pointRadius         : false,
                  pointColor          : "#3b8bba",
                  pointStrokeColor    : "rgba(60,141,188,1)",
                  pointHighlightFill  : "#fff",
                  pointHighlightStroke: "rgba(60,141,188,1)",
                  data                : <?= json_encode($soal_terjawab_chart) ?>
                },
              ]
          }
          
            
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
              responsive              : true,
              maintainAspectRatio     : false,
              datasetFill             : false,
            }

            new Chart(barChartCanvas, {
              type: "bar",
              data: barChartData,
              options: barChartOptions
            })
        });

      
    </script>

    <script>
    

      // MODAL
       
      // button humberger
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");

        btn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
        })

        // dropdown
        function dropDown() {
            document.querySelector('#submenu').classList.toggle('hidden')
            document.querySelector('#arrow').classList.toggle('rotate-0')
        }
        dropDown()
    </script>
</body>
</html>