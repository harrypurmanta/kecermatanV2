<?= $this->include('admin/template/head') ?>
<body>
    <div class="min-h-screen relative md:flex">
<!-- sidebar -->
<?= $this->include('admin/sidebar') ?>
    <!-- content -->
      <div class="flex-1 p-3 border">
        <h1 class="mt-4 md:mt-8 text-xl font-bold text-two">Hai Admin BTP</h1>
        <p class="mb-8">Soal Gambar</p>
        <div class="bg-three p-5 mb-8 rounded-md">
          <form class="md:max-w-full lg:max-w-full max-w-full mx-auto">
            <div class="col-span-2 sm:col-span-1">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pilih Latihan Soal</label>
                <select onchange="selectcategory()" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="0">Pilih Latihan</option>
                    <?php
                        foreach ($skgroup as $key) { 
                    ?>
                    <option <?= ($key->sk_group_id == $session->get("sk_group_id_sess") ? "selected" : "") ?> value="<?= $key->sk_group_id ?>"><?= $key->sk_group_nm ?></option>
                    <?php } ?>
                </select>
            </div>
          </form>
        </div>

        <div class="bg-three mt-2">
          <form class="p-4 md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <?php
                    foreach ($soal as $key) {
                ?>
                <div class="col-span-2 sm:col-span-1">
                    <label for="kolom<?= $key->kolom_id ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                        <?= $key->kolom_nm ?>
                    </label>
                    <div id="soal_gambar_<?= $key->kolom_id ?>" class="flex gap-2 flex-wrap">
                    </div>
                    <input type="hidden" value="<?= ($key->clue != null ? $key->clue:"") ?>" id="kolom<?= $key->kolom_id ?>_lama">
                    <div class="flex items-center gap-2">
                        <input
                            type="file"
                            name="kolom<?= $key->kolom_id ?>"
                            id="kolom<?= $key->kolom_id ?>"
                            class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                  focus:ring-primary-600 focus:border-primary-600 p-2.5
                                  dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            multiple
                        >

                        <button
                            type="button"
                            onclick="<?= ($key->clue != null ? 'updatesoal('.$key->kolom_id.')' : 'simpansoal('.$key->kolom_id.')') ?>"
                            class="whitespace-nowrap text-white bg-blue-700 hover:bg-blue-800
                                  focus:ring-4 focus:outline-none focus:ring-blue-300
                                  font-medium rounded-lg text-sm px-4 py-2.5
                                  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <?= ($key->clue != null ? 'Update' : 'Simpan') ?>
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>
          </form>
        </div>
            <div style="display: none;" id='loader-wrapper'>
                <div class="loader"></div>
            </div>
      </div>
    </div>
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/dist/js/sweetalert2.js"></script>
    <script>
        $(document).ready(function() {
            selectcategory()
        });
        
        function selectcategory() {
            var sk_group_id = $("#category").val();
            $.ajax({
                url: "<?= base_url('admin/soal/getsoalbyskgroup') ?>",
                type: "post",
                dataType: "json",
                data: {
                    "sk_group_id" : sk_group_id,
                    "group_id" : 8
                },
                beforeSend: function() {
                    $("#loader-wrapper").css('display','block');
                },
                success: function(data) {
                    
                    $("#loader-wrapper").css('display','none');
                    for (let i = 1; i <= 10; i++) {
                        $("#soal_gambar_" + i).html("");
                        $("#kolom" + i + "_lama").val("");
                    }

                    if (!data || data.length === 0) return;

                    data.forEach(function(item) {

                        let kolom = item.kolom_id;
                        let clue  = item.clue;

                        // simpan ke hidden lama
                        $("#kolom" + kolom + "_lama").val(clue);

                        let images = clue.split("|");
                        let html = "";

                        images.forEach(function(img){
                            html += `
                                <img
                                    src="<?= base_url('img/soalskgambar/kolom') ?>/${kolom}/sk_group/${$("#category").val()}/${img}"
                                    class="border rounded p-1"
                                    style="height:50px;width:50px;object-fit:contain"
                                >
                            `;
                        });

                        $("#soal_gambar_" + kolom).html(html);
                    });
                },
                error: function() {
                    $("#loader-wrapper").css('display','none');
                    Swal.fire("Error", "", "error");
                }
                });
        }

    function simpansoal(kolom) {
        var kolom_lama = $("#kolom"+kolom+"_lama").val();
        var sk_group_id = $("#category").val();
        if (sk_group_id == 0) {
            Swal.fire("Gagal", "Latihan Soal belum di pilih", "warning");
            document.getElementById("category").focus();
            return;
        }

          let inputFile = document.getElementById("kolom" + kolom);
          let files = inputFile.files;

          if (files.length < 5) {
              Swal.fire("Gagal", "Minimal harus upload 5 file", "warning");
              return;
          }

          if (files.length > 5) {
              Swal.fire("Gagal", "Maksimal hanya boleh 5 file", "warning");
              return;
          }

          if (files.length === 0) {
              Swal.fire("Pilih file terlebih dahulu", "", "warning");
              return;
          }

          let formData = new FormData();

          for (let i = 0; i < files.length; i++) {
              formData.append("gambar[]", files[i]);
          }

          formData.append("kolom", kolom);
          formData.append("kolom_lama", kolom_lama);
          formData.append("user_group", "global");
          formData.append("sk_group_id", sk_group_id);
          formData.append("group_id", 8);

          $.ajax({
              url: "<?= base_url('admin/soal/simpansoalgambar') ?>",
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              dataType: "json",

              beforeSend: function () {
                  $("#loader-wrapper").show();
              },

              success: function (res) {
                  $("#loader-wrapper").hide();

                  if (res == "sukses") {
                      Swal.fire("Berhasil", "Soal berhasil disimpan", "success")
                            .then(() => {
                                location.reload();
                            });
                  } else {
                      Swal.fire("Gagal", res.message, "error");
                  }
              },

              error: function () {
                  $("#loader-wrapper").hide();
                  Swal.fire("Error", "Upload gagal", "error");
              }
          });
      }

      function updatesoal(kolom) {
        var kolom_lama = $("#kolom"+kolom+"_lama").val();
        var sk_group_id = $("#category").val();
        if (sk_group_id == 0) {
            Swal.fire("Gagal", "Latihan Soal belum di pilih", "warning");
            document.getElementById("category").focus();
            return;
        }

          let inputFile = document.getElementById("kolom" + kolom);
          let files = inputFile.files;

          if (files.length < 5) {
              Swal.fire("Gagal", "Minimal harus upload 5 file", "warning");
              return;
          }

          if (files.length > 5) {
              Swal.fire("Gagal", "Maksimal hanya boleh 5 file", "warning");
              return;
          }

          if (files.length === 0) {
              Swal.fire("Pilih file terlebih dahulu", "", "warning");
              return;
          }

          let formData = new FormData();

          for (let i = 0; i < files.length; i++) {
              formData.append("gambar[]", files[i]);
          }

          formData.append("kolom", kolom);
          formData.append("kolom_lama", kolom_lama);
          formData.append("user_group", "global");
          formData.append("sk_group_id", sk_group_id);
          formData.append("group_id", 8);

          $.ajax({
              url: "<?= base_url('admin/soal/updatesoalgambar') ?>",
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              dataType: "json",

              beforeSend: function () {
                  $("#loader-wrapper").show();
              },

              success: function (res) {
                  $("#loader-wrapper").hide();

                  if (res == "sukses") {
                      Swal.fire("Berhasil", "Soal berhasil disimpan", "success")
                            .then(() => {
                                location.reload();
                            });
                  } else {
                      Swal.fire("Gagal", res.message, "error");
                  }
              },

              error: function () {
                  $("#loader-wrapper").hide();
                  Swal.fire("Error", "Upload gagal", "error");
              }
          });
      }

      function checkdupe(kolom) {
          var char = document.getElementById(kolom).value;
          for (i = 0; i < char.length; i++) {
            for (j = i + 1; j < char.length; j++) {
                if (char[i] == char[j]) {
                  alert("Karakter tidak boleh sama !");
                  var val = char.substr(0, char.length - 1);
                  document.getElementById(kolom).value = val;
                }
            }
          }
        }
        
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