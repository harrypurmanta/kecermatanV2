<?php
$request = \Config\Services::request();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- <script src="https://cdn.tailwindcss.com"></script> -->

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/styles.css">
</head>
<body>
    <div class="min-h-screen relative md:flex">
<!-- sidebar -->
<?= $this->include('front/sidebar') ?>
    
    <!-- content -->
     <div class="flex-1 p-3 font-bold text-xl border">
        <!-- <h1 class="mt-4 md:mt-8 mb-8 font-bold text-two">Create Soal</h1> -->
        <div class="bg-three p-3 mb-8 rounded-md transition-opacity">
          <h2 class="font-bold text-two">Latihan Soal <?= $group[0]->group_nm ?></h2>
        </div>

        <!-- FORM START -->
        <div class="bg-three mt-2 rounded-md">
            <form action="#" class="p-4 md:p-5">
                <div class="p-2 grid gap-2 lg:grid-cols-2 md:grid-cols-2">
                    <?php
                        $db = db_connect();
                        $request = \Config\Services::request();
                        $this->session = \Config\Services::session();
                        foreach ($sk_group as $key) {
                    ?>
                        <div class="md:max-w-full lg:max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <p class="mb-3 font-bold text-white"><?= $key->sk_group_nm ?></p>
                            <?php
                                $query = $db->query("SELECT soal_id FROM soal WHERE group_id = ".$request->uri->getSegment(3)." AND sk_group_id = $key->sk_group_id AND user_group = 'global'")->getResult();

                                if (count($query)>0) {
                                    echo "<a href='".base_url()."/home/latihan/".$key->sk_group_id."/".$request->uri->getSegment(3)."/global' class='inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
                                            Mainkan
                                        <svg class='rtl:rotate-180 w-3.5 h-3.5 ms-2' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 14 10'>
                                            <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M1 5h12m0 0L9 1m4 4L9 9'/>
                                        </svg>
                                    </a>";
                                } else {
                                    echo "<h4 style='color:gray;'>Belum Ada Soal</h4>";
                                }
                            ?>
                            
                            <?php ?>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
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