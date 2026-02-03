<?php
$this->session = \Config\Services::session();
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
    <div class="min-h-screen relative md:flex">

        <!-- sidebar -->
        <?= $this->include('front/sidebar') ?>
    
    
    <!-- content -->
     <div class="flex-1 p-5 font-bold text-xl border">
        <h1 class="mt-4 md:mt-8 mb-8 font-bold text-two">Selamat Datang di Bintang Timur Prestasi</h1>
        <div class="bg-three p-5 mb-8 rounded-md">
          <div class="flex items-center">
          <!-- <svg class="w-8 h-8 mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
            <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
          </svg>
         -->
          <h1 class="text-two font-bold text-xl mb-2">Hallo <?= $this->session->person_nm?><br></h1>
        </div>
          
          <p class="font-semibold text-xl text-justify">Website ini merupakan tempat untuk mengasah kemampuan dalam menjawab tes Kecermatan dan juga dapat melatih Fokus, Ketelitian dan Kecepatan.<br> Pada Latihan Kecermatan ini, akan <i><u>ada 10 Kolom soal yang masing-masing pada kolom soal tersebut memiliki waktu 1 menit</i></u>.<br>Anda harus menjawab soal tersebut dengan tepat dan cepat secara konsisten.<br><br>

            <strong>Hal-hal yang perlu anda perhatikan dalam mengerjakan Latihan Kecermatan ini adalah:</strong><br>
            1. Setiap kolom soal memiliki waktu pengerjaan nya masing-masing dan jika waktu sudah habis maka secara otomatis akan berpindah ke kolom berikutnya.<br>
            2. Fokus sangat dibutuhkan dalam mengerjakan Latihan Kecermatan ini.<br>
            3. Tes ini mengharapakan anda bekerja dengan cepat, cermat dan tepat.</p><br>
            <br><br><p class="text-center"> Selamat Berlatih </p>
            <p class="text-center">😎😎😎</p>

      
        </div>

        <!-- <div class="bg-three p-5 mt-2">
            <h2>grafik goes here</h2>
        </div> -->
     </div>

    </div>

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