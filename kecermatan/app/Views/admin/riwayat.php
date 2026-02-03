<?= $this->include('admin/template/head') ?>
<body>
    <div class="min-h-screen relative md:flex">

       <!-- sidebar -->
       <?= $this->include('admin/sidebar') ?>
    
        <!-- content -->
        <div class=" flex-1 p-2 font-bold text-lg">
        <h1 class="mt-4 md:mt-8 mb-4 font-bold bg-three px-4 py-4 rounded-lg shadow-md text-two">Riwayat User</h1>
    
                <!--DATA TABLE -->
                <div class="overflow-x-auto p-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nama Peserta
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Tanggal Tes 
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Uji coba ke
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
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
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <?= $no++ ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                            <?= $key->person_nm ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                            <?=  date("d-m-Y H:i:s  ", strtotime($key->tanggal_tes)) ?>
                            </td>
                            <td class="px-12 py-4 text-center">
                            <?= $key->play ?>
                            </td>
                            <td class="px-12 py-4 text-center">
                            <a class="font-bold px-5 py-1 md:px-10 lg:px-5 lg:py-2 bg-three rounded-md shadow-md hover:bg-orange-200 animate duration-200" target="_blank" href="<?= base_url() ?>/admin/dashboard/hasiltryout/<?= $key->sk_group_id ?>/<?= $key->group_id ?>/<?= $key->tipe_soal ?>/<?= $key->created_user_id ?>/<?= $key->play ?>">Lihat</a>
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