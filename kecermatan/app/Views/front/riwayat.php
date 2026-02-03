<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
     <!-- <script src="https://cdn.tailwindcss.com"></script> -->

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/styles.css">
</head>
<body>
    <div class="min-h-screen relative md:flex">

       <!-- sidebar -->
       <?= $this->include('front/sidebar') ?>
    
        <!-- content -->
        <div class=" flex-1 p-2 font-bold text-lg">
        <h1 class="mt-4 md:mt-8 mb-4 font-bold bg-three px-4 py-4 rounded-lg shadow-md text-two">Riwayat User</h1>
    
                <!--DATA TABLE -->
                <div class="overflow-x-auto p-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Tes 
                            </th>
                            <th scope="col" class="px-6 py-3">
                            Uji coba ke
                            </th>
                            <th scope="col" class="px-6 py-3">
                            Hasil
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($log as $key) {
                        ?>

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $no++ ?>
                            </td>
                            <td class="px-6 py-4">
                            <?= $key->tanggal_tes ?>
                            </td>
                            <td class="px-12 py-4">
                            <?= $key->play ?>
                            </td>
                            <td class="px-12 py-4 text-center">
                            <a class="font-bold px-5 py-1 md:px-10 lg:px-5 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200" target="_blank" href="<?= base_url() ?>/home/hasiltryout/<?= $key->sk_group_id ?>/<?= $key->group_id ?>/<?= $key->tipe_soal ?>/<?= $key->created_user_id ?>/<?= $key->play ?>">Lihat</a>
                            </td>
                        </tr>

                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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