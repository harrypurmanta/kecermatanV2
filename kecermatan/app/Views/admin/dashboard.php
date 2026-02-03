<?= $this->include('admin/template/head') ?>
<body>
    <div class="min-h-screen relative md:flex">

        <!-- sidebar -->
        <?= $this->include('admin/sidebar') ?>
    
    
    <!-- content -->
     <div class="flex-1 p-5 font-bold text-xl border">
        <h1 class="mt-4 md:mt-8 mb-8 font-bold text-two">Hai Admin BTP</h1>
        <div class="bg-three p-5 mb-8 rounded-md">
         <svg class="w-8 h-8 mb-2 text-four" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="size-6">
          <path fillRule="evenodd" d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z" clipRule="evenodd" />
          <path fillRule="evenodd" d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z" clipRule="evenodd" />
        </svg>

          <h1 class="text-two font-bold text-xl">Jumlah User Aktif</h1>
          <p class="text-four font-semibold"><?= $jumlah_user[0]->jumlah_user ?> </p>
        </div>

        <div class="bg-three p-5 mt-2">
            <h2>grafik goes here</h2>
            <div class='chart'>
                <canvas id='barChart' style='min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;'></canvas>
            </div>
        </div>
     </div>

    </div>
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var areaChartData = {
            labels  : ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
            datasets: [
                {
                  label               : "Jumlah Peserta",
                  backgroundColor     : "rgba(152,171,238,1)",
                  borderColor         : "rgba(60,141,188,0.8)",
                  pointRadius         : false,
                  pointColor          : "#00a65a",
                  pointStrokeColor    : "rgba(60,141,188,1)",
                  pointHighlightFill  : "#fff",
                  pointHighlightStroke: "rgba(60,141,188,1)",
                  data                : <?= json_encode($jumlah_user_perbulan) ?>,
                  bezierCurve : false
                },
              ]
          }
          
            
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

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