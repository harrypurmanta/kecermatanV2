<?php
$request = \Config\Services::request();
?>
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
          <h1  class="bg-orange-200 p-3 mb-4 rounded-md text-center shadow-lg"><span id="countdown"></span></h1>
          <div>
            <h1 id="lb_kolom" class="mb-4 font-semibold text-two bg-orange-200 text-center w-[128px] rounded-lg shadow-md px-4 py-2 mx-auto">Kolom 1</h1>
              <div id="dv_jawaban" class="flex justify-center">
                
              </div>
              <hr class="border-black border-1 shadow-lg opacity-50 mt-5">
              <div id="dv_soal" class="text-start">
                
              </div>
          </div>
      </div>
    </div>
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/dist/js/sweetalert2.js"></script>
    <script>
        var timers;
        $(document).ready(function() {
            setTimeout(() => {
                startujian("start","","","",<?= $request->uri->getSegment(3) ?>,0,1,98);
            }, 1000);
        });

        function startujian(proc,pilihan_nm,jawaban_id,soal_id,group_id,no_soal,kolom_id,materi) {
        $.ajax({
            url: "<?= base_url('home/startujiangambar') ?>",
            type: "post",
            dataType: "json",
            data: {
                "proc": proc,
                "jawaban_id": jawaban_id,
                "soal_id": soal_id,
                "no_soal": no_soal,
                "pilihan_nm": pilihan_nm,
                "group_id": <?= $request->uri->getSegment(4) ?>,
                "materi": materi,
                "kolom_id": kolom_id,
                "sk_group_id": <?= $request->uri->getSegment(3) ?>,
                "user_group" : "<?= $request->uri->getSegment(5) ?>"
            },
            beforeSend: function() {
                // $("#loader-wrapper").removeClass("d-none")
            },
            success: function(data) {
                if (data.no_soal == 1) {
                    window.clearInterval(timers);
                    $("#dv_jawaban").html(data.dv_jawaban);
                    $("#dv_soal").html(data.dv_soal);
                    $("#lb_kolom").text("Kolom "+data.kolom);
                    countdown(61,kolom_id);
                } else if (data.ret == "persiapan") {
                    window.clearInterval(timers);
                    $("#lb_kolom").text("Persiapan . . .");
                    $("#dv_soal").html("");
                    $("#dv_jawaban").html("");
                    countdown(6,kolom_id,data.ret);
                } else if (data.ret == "selesai") {
                    window.location.href = "<?= base_url() ?>/home/hasiltryout/" + <?= $request->uri->getSegment(3) ?> +"/<?= $request->uri->getSegment(4) ?>"+"/"+"<?= $request->uri->getSegment(5) ?>" ;
                } else if (data == "soal_tidak_ada") {
                    alert("Soal tidak ada");
                } else {
                    $("#dv_jawaban").html(data.dv_jawaban);
                    $("#dv_soal").html(data.dv_soal);
                    $("#lb_kolom").text("Kolom "+data.kolom);
                }
                
                // $("#loader-wrapper").addClass("d-none");
            },
            error: function() {
                alert("Error system");
            }
        });
    }

    function convertSeconds(s) {
        var min = Math.floor(s / 60);
        var sec = s % 60;
        if (sec < 10) {
            sec = "0"+sec;
        }

        if (min < 10) {
            min = "0"+min;
        }
        return min + ":" + sec;
    }


    function countdown(detik,kolom_id,proc) {
        var seconds = detik;
        timers = window.setInterval(function() {
            myFunction();
        }, 1000); // every second

        function myFunction() {
            seconds--;
            $("#countdown").text(convertSeconds(seconds));
            if (seconds === 0) {
                window.clearInterval(timers);
                if (proc == "persiapan") {
                    kolom_id = kolom_id + 1;
                    startujian("nextkolom","","","",<?= $request->uri->getSegment(4) ?>,0,kolom_id,98);
                } else {
                    startujian("persiapan","","","",<?= $request->uri->getSegment(4) ?>,0,kolom_id,98);
                }
            } else {
                //Do nothing
            }

        }
    }


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