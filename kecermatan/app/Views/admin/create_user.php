<?= $this->include('admin/template/head') ?>
<body>
<div class="min-h-screen relative md:flex">
        <!-- sidebar -->
        <?= $this->include('admin/sidebar') ?>

    <!-- content -->
    <div class="flex-1 p-5 font-bold text-lg">
      <h1 class="mt-4 md:mt-8 mb-4 font-bold text-two">Tabel Data User</h1> 
      <button data-modal-target="modal-user" data-modal-toggle="modal-user" class="font-semibold text-sm px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
          Tambah User
      </button>
  
<!--DATA TABLE -->
        <div class="overflow-x-auto py-3">
        <table id="table_user" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>
    
  <!-- Main modal -->
    <div id="modal-user" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-50 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah User
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-user">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama" required="">
                        </div>

                        <div class="col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                        </div>

                        <div class="col-span-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" required="">
                        </div>
            
                        <div class="col-span-2">
                            <label for="kota_asal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota Asal</label>
                            <input type="text" name="kota_asal" id="kota_asal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kota Asal" required="">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Handphone</label>
                            <input type="number" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Handphone" required="">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Pilih Level</option>
                                <?php
                                        foreach ($produk as $key) {
                                            # code...
                                    
                                ?>
                                <option value="<?= $key->produk_id ?>"><?= $key->produk_nm ?></option>
                                <?php  } ?>
                            </select>
                        </div>

                        <button onclick="simpanuser()" type="button" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div> 


    <div id="modal-edit" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-50 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit User
                </h3>
                <button onclick="closemodaledit()" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name_edit" id="name_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama" required="">
                        </div>

                        <div class="col-span-2">
                            <label for="email_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email_edit" id="email_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                        </div>

                        <div class="col-span-2">
                            <label for="password_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="hidden" id="password_lama">
                            <input type="password" name="password_edit" id="password_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" required="">
                        </div>
            
                        <div class="col-span-2">
                            <label for="kota_asal_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota Asal</label>
                            <input type="text" name="kota_asal_edit" id="kota_asal_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Kota Asal" required="">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="no_hp_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Handphone</label>
                            <input type="number" name="no_hp_edit" id="no_hp_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="No Handphone" required="">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="category_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level</label>
                            <select id="category_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Pilih Level</option>
                                <?php
                                        foreach ($produk as $key) {
                                            # code...
                                    
                                ?>
                                <option value="<?= $key->produk_id ?>"><?= $key->produk_nm ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <input type="hidden" id="user_id_edit">
                        <input type="hidden" id="person_id_edit">
                        <input type="hidden" id="billing_item_id">
                        <button onclick="updateuser()" type="button" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
  


<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="<?= base_url() ?>/dist/js/sweetalert2.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.tailwindcss.js"></script>
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
  <script>
    $(document).ready(function() {
        loadtable();
    });

        function simpanuser() {
            const modalEdit = new Modal(document.getElementById('modal-edit'));
            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var kota_asal = $("#kota_asal").val();
            var no_hp = $("#no_hp").val();
            var category = $("#category").val();

            $.ajax({
                url: "<?= base_url('admin/users/simpanuser') ?>",
                type: "post",
                dataType: "json",
                data: {
                    "name" : name,
                    "email" : email,
                    "password" : password,
                    "kota_asal" : kota_asal,
                    "no_hp" : no_hp,
                    "category" : category
                },
                beforeSend: function() {
                    $("#loader-wrapper").removeClass("d-none")
                },
                success: function(data) {
                    if (data == "berhasil") {
                        Swal.fire("Data berhasil disimpan", "", "success");
                    } else if (data == "emailsudahada") {
                        Swal.fire("Email sudah digunakan", "", "warning");
                    } else {
                        Swal.fire("Data gagal disimpan", "", "warning");
                    }
                    $("#loader-wrapper").addClass("d-none");
                    loadtable();
                    modalEdit.hide();
                },
                error: function() {
                    alert("error");
                }
            });
        }

        let = tabel_user = "";
        const loadtable = () => {
            tabel_user = $('#table_user').DataTable({
            "destroy": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            ajax: {
                url: '<?= base_url('admin/users/showuser') ?>',
                method: "POST",
                dataType: "json",
                dataSrc: (json) => {
                    let nomor = 1;
                    json.forEach((row, idx) => {
                        row.nomor = nomor++;
                    });
                    return json;
                }
            },
            columns: [{
                    data: "nomor",
                    className: 'text-center'
                },
                {
                    data: "person_nm",
                    
                },
                {
                    data: "user_nm",
                },
                {
                    data: "user_group",
                    className: 'text-center'
                },
                {
                    data: null,
                    className: 'text-center ',
                    render: function(data, type, row) {
                        return `
						<button onclick="edituser(${data.user_id})"
      class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs border border-gray-900 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
      type="button">
      <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"><i class="fas fa-edit"
          aria-hidden="true"></i></span></button>
          <button onclick="hapususer(${data.user_id},${data.person_id},${data.billing_id},${data.billing_item_id})"
      class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs border border-gray-900 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
      type="button">
      <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"><i class="fas fa-trash"
          aria-hidden="true"></i></span></button>
						`;
                    }
                }
            ]
        });
    }

    function edituser(user_id) {
        const modalEdit = new Modal(document.getElementById('modal-edit'));
        $.ajax({
                url: "<?= base_url('admin/users/edituser') ?>",
                type: "post",
                dataType: "json",
                data: {
                    "user_id" : user_id
                },
                beforeSend: function() {
                    $("#loader-wrapper").removeClass("d-none")
                },
                success: function(data) {
                    $("#user_id_edit").val(data[0].user_id);
                    $("#person_id_edit").val(data[0].person_id);
                    $("#billing_item_id").val(data[0].billing_item_id);
                    $("#name_edit").val(data[0].person_nm);
                    $("#email_edit").val(data[0].user_nm);
                    $("#password_edit").val(data[0].pwd0);
                    $("#password_lama").val(data[0].pwd0);
                    $("#kota_asal_edit").val(data[0].kota_asal);
                    $("#no_hp_edit").val(data[0].cellphone);
                    $("#category_edit").val(data[0].produk_id).trigger("change");
                    $("#loader-wrapper").addClass("d-none")
                    modalEdit.show();
                },
                error: function() {
                    alert("error");
                }
            });
    }

    function updateuser() {
        const modalEdit = new Modal(document.getElementById('modal-edit'));
            var name = $("#name_edit").val();
            var email = $("#email_edit").val();
            var password = $("#password_edit").val();
            var password_lama = $("#password_lama").val();
            var kota_asal = $("#kota_asal_edit").val();
            var no_hp = $("#no_hp_edit").val();
            var category = $("#category_edit").val();
            var user_id = $("#user_id_edit").val();
            var person_id = $("#person_id_edit").val();
            var billing_item_id = $("#billing_item_id").val();

            $.ajax({
                url: "<?= base_url('admin/users/updateuser') ?>",
                type: "post",
                dataType: "json",
                data: {
                    "name" : name,
                    "email" : email,
                    "password" : password,
                    "password_lama" : password_lama,
                    "kota_asal" : kota_asal,
                    "no_hp" : no_hp,
                    "category" : category,
                    "user_id" : user_id,
                    "person_id" : person_id,
                    "billing_item_id" : billing_item_id,
                },
                beforeSend: function() {
                    $("#loader-wrapper").removeClass("d-none")
                },
                success: function(data) {
                    if (data == "berhasil") {
                        Swal.fire("Data berhasil disimpan", "", "success");
                    } else if (data == "emailsudahada") {
                        Swal.fire("Email sudah digunakan", "", "warning");
                    } else {
                        Swal.fire("Data gagal disimpan", "", "warning");
                    }
                    loadtable();
                    modalEdit.hide();
                    $("#loader-wrapper").addClass("d-none")
                },
                error: function() {
                    alert("error");
                }
            });
        }
    
    function hapususer(user_id,person_id,billing_id,billing_item_id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data yang dihapus tidak bisa di kembalikan lagi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/users/hapususer') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        "user_id": user_id,
                        "person_id": person_id,
                        "billing_id": billing_id,
                        "billing_item_id": billing_item_id
                    },
                    success: function(data) {
                        if (data == "berhasil") {
                            Swal.fire("Data berhasil dihapus", "", "success");
                        } else {
                            Swal.fire("Data gagal dihapus", "", "warning");
                        }

                        loadtable();
                    },
                    error: function() {
                        alert("error");
                    }
                });
            }
        });
    }

    function closemodaledit() {
        const modalEdit = new Modal(document.getElementById('modal-edit'));
        modalEdit.hide();
    }

    const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");

        btn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    })

    function dropDown() {
            document.querySelector('#submenu').classList.toggle('hidden')
            document.querySelector('#arrow').classList.toggle('rotate-0')
        }
        dropDown()
  </script>
</body>
</html>