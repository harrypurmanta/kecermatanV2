<?= $this->include('admin/template/head') ?>
<body>
    <div class="min-h-screen relative md:flex">
<!-- sidebar -->
<?= $this->include('admin/sidebar') ?>
    <!-- content -->
     <div class="flex-1 p-3 border">
        <h1 class="mt-4 md:mt-8 text-xl font-bold text-two">Hai Admin BTP</h1>
        <p class="mb-8">Soal Huruf Angka</p>
        <div class="bg-three p-5 mb-8 rounded-md">
          <form class="md:max-w-full lg:max-w-full max-w-full mx-auto">
            <div class="col-span-2 sm:col-span-1">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Latihan Soal</label>
                <select onchange="selectcategory()" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="0">Pilih Latihan</option>
                  <?php
                      foreach ($skgroup as $key) {
                        if ($soal == null) {
                          $sk_group_id = null;
                        } else {
                          $sk_group_id = $soal[0]->sk_group_id;
                        }
                        
                      
                  ?>
                  <option <?= ($key->sk_group_id == $sk_group_id ? "selected" : "") ?> value="<?= $key->sk_group_id ?>"><?= $key->sk_group_nm ?></option>
                 <?php } ?>
                    </select>
            </div>
            </form>
        </div>

        <div class="bg-three mt-2">
          <form class="p-4 md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="kolom1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 1</label>
                    <input type="hidden" value="<?= ($soal != null ? $soal[0]->clue:"") ?>" id="kolom1_lama">
                    <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom1')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[0]->clue:"") ?>" type="text" name="kolom1" id="kolom1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
                </div>

                <div class="col-span-2 sm:col-span-1">
                    <label for="kolom2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 2</label>
                    <input type="hidden" value="<?= ($soal != null ? $soal[1]->clue:"") ?>" id="kolom2_lama">
                    <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom2')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[1]->clue:"") ?>" type="text" name="kolom2" id="kolom2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
                </div>

                <div class="col-span-2 sm:col-span-1">
                  <label for="kolom3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 3</label>
                  <input type="hidden" value="<?= ($soal != null ? $soal[2]->clue:"") ?>" id="kolom3_lama">
                  <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom3')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[2]->clue:"") ?>" type="text" name="kolom3" id="kolom3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
              </div>

              <div class="col-span-2 sm:col-span-1">
                <label for="kolom4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 4</label>
                <input type="hidden" value="<?= ($soal != null ? $soal[3]->clue:"") ?>" id="kolom4_lama">
                <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom4')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[3]->clue:"") ?>" type="text" name="kolom4" id="kolom4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
            </div>

            <div class="col-span-2 sm:col-span-1">
              <label for="kolom5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 5</label>
              <input type="hidden" value="<?= ($soal != null ? $soal[4]->clue:"") ?>" id="kolom5_lama">
              <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom5')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[4]->clue:"") ?>" type="text" name="kolom5" id="kolom5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
          </div>

          <div class="col-span-2 sm:col-span-1">
            <label for="kolom6" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 6</label>
            <input type="hidden" value="<?= ($soal != null ? $soal[5]->clue:"") ?>" id="kolom6_lama">
            <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom6')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[5]->clue:"") ?>" type="text" name="kolom6" id="kolom6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
        </div>

        <div class="col-span-2 sm:col-span-1">
          <label for="kolom7" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 7</label>
          <input type="hidden" value="<?= ($soal != null ? $soal[6]->clue:"") ?>" id="kolom7_lama">
          <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom7')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[6]->clue:"") ?>" type="text" name="kolom7" id="kolom7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
      </div>

      <div class="col-span-2 sm:col-span-1">
        <label for="kolom8" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 8</label>
        <input type="hidden" value="<?= ($soal != null ? $soal[7]->clue:"") ?>" id="kolom8_lama">
        <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom8')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[7]->clue:"") ?>" type="text" name="kolom8" id="kolom8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
    </div>

    <div class="col-span-2 sm:col-span-1">
      <label for="kolom9" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 9</label>
      <input type="hidden" value="<?= ($soal != null ? $soal[8]->clue:"") ?>" id="kolom9_lama">
      <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom9')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[8]->clue:"") ?>" type="text" name="kolom9" id="kolom9" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
    </div>
      <div class="col-span-2 sm:col-span-1">
          <label for="kolom10" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kolom 10</label>
          <input type="hidden" value="<?= ($soal != null ? $soal[9]->clue:"") ?>" id="kolom10_lama">
          <input onkeydown="return /[a-zA-Z0-9]/i.test(event.key)" maxlength='5' onkeyup="checkdupe('kolom10')" oninput="this.value = this.value.toUpperCase()" value="<?= ($soal != null ? $soal[9]->clue:"") ?>" type="text" name="kolom10" id="kolom10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Soal" required="">
      </div>

      <div class="flex space-x-2">
        <button id="btn_simpan" style="<?= ($soal != null ? "display: none;":"display: block;") ?>" onclick="simpansoal()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        <button id="btn_update" style="<?= ($soal != null ? "display: block;":"display: none;") ?>" onclick="updatesoal()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
      </div>
  </div>
            <div style="display: none;" id='loader-wrapper'>
                <div class="loader"></div>
            </div>
    </div>

    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/dist/js/sweetalert2.js"></script>
    <script>
      function selectcategory() {
        var sk_group_id = $("#category").val();
        $.ajax({
              url: "<?= base_url('admin/soal/getsoalbyskgroup') ?>",
              type: "post",
              dataType: "json",
              data: {
                "sk_group_id" : sk_group_id,
                "group_id" : 5
              },
              beforeSend: function() {
                $("#loader-wrapper").css('display','block');
              },
              success: function(data) {
                $("#loader-wrapper").css('display','none');
                if (data != null) {
                  var kolom1 = $("#kolom1").val(data[0].clue);
                  var kolom2 = $("#kolom2").val(data[1].clue);
                  var kolom3 = $("#kolom3").val(data[2].clue);
                  var kolom4 = $("#kolom4").val(data[3].clue);
                  var kolom5 = $("#kolom5").val(data[4].clue);
                  var kolom6 = $("#kolom6").val(data[5].clue);
                  var kolom7 = $("#kolom7").val(data[6].clue);
                  var kolom8 = $("#kolom8").val(data[7].clue);
                  var kolom9 = $("#kolom9").val(data[8].clue);
                  var kolom10 = $("#kolom10").val(data[9].clue);

                  var kolom1_lama = $("#kolom1_lama").val(data[0].clue);
                  var kolom2_lama = $("#kolom2_lama").val(data[1].clue);
                  var kolom3_lama = $("#kolom3_lama").val(data[2].clue);
                  var kolom4_lama = $("#kolom4_lama").val(data[3].clue);
                  var kolom5_lama = $("#kolom5_lama").val(data[4].clue);
                  var kolom6_lama = $("#kolom6_lama").val(data[5].clue);
                  var kolom7_lama = $("#kolom7_lama").val(data[6].clue);
                  var kolom8_lama = $("#kolom8_lama").val(data[7].clue);
                  var kolom9_lama = $("#kolom9_lama").val(data[8].clue);
                  var kolom10_lama = $("#kolom10_lama").val(data[9].clue);

                  $("#btn_simpan").css('display','none');
                  $("#btn_update").css('display','block');
                } else {
                  var kolom1 = $("#kolom1").val("");
                  var kolom2 = $("#kolom2").val("");
                  var kolom3 = $("#kolom3").val("");
                  var kolom4 = $("#kolom4").val("");
                  var kolom5 = $("#kolom5").val("");
                  var kolom6 = $("#kolom6").val("");
                  var kolom7 = $("#kolom7").val("");
                  var kolom8 = $("#kolom8").val("");
                  var kolom9 = $("#kolom9").val("");
                  var kolom10 = $("#kolom10").val("");

                  var kolom1_lama = $("#kolom1_lama").val("");
                  var kolom2_lama = $("#kolom2_lama").val("");
                  var kolom3_lama = $("#kolom3_lama").val("");
                  var kolom4_lama = $("#kolom4_lama").val("");
                  var kolom5_lama = $("#kolom5_lama").val("");
                  var kolom6_lama = $("#kolom6_lama").val("");
                  var kolom7_lama = $("#kolom7_lama").val("");
                  var kolom8_lama = $("#kolom8_lama").val("");
                  var kolom9_lama = $("#kolom9_lama").val("");
                  var kolom10_lama = $("#kolom10_lama").val("");

                  $("#btn_simpan").css('display','block');
                  $("#btn_update").css('display','none');
                }
              },
              error: function() {
                $("#loader-wrapper").css('display','none');
                Swal.fire("Error", "", "error");
              }
            });
      }

        function simpansoal() {
          var kolom1 = $("#kolom1").val();
          var kolom2 = $("#kolom2").val();
          var kolom3 = $("#kolom3").val();
          var kolom4 = $("#kolom4").val();
          var kolom5 = $("#kolom5").val();
          var kolom6 = $("#kolom6").val();
          var kolom7 = $("#kolom7").val();
          var kolom8 = $("#kolom8").val();
          var kolom9 = $("#kolom9").val();
          var kolom10 = $("#kolom10").val();
          var sk_group_id = $("#category").val();

          var kolom1_lama = $("#kolom1_lama").val();
          var kolom2_lama = $("#kolom2_lama").val();
          var kolom3_lama = $("#kolom3_lama").val();
          var kolom4_lama = $("#kolom4_lama").val();
          var kolom5_lama = $("#kolom5_lama").val();
          var kolom6_lama = $("#kolom6_lama").val();
          var kolom7_lama = $("#kolom7_lama").val();
          var kolom8_lama = $("#kolom8_lama").val();
          var kolom9_lama = $("#kolom9_lama").val();
          var kolom10_lama = $("#kolom10_lama").val();
       
          if (sk_group_id == 0) {
              alert("Latihan Soal belum di pilih");
              document.getElementById("category").focus();
              return;
            }

          if ($("#kolom1").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 1 kurang dari 5");
              document.getElementById("kolom1").focus();
              return;
            } 
            
            if ($("#kolom2").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 2 kurang dari 5");
              document.getElementById("kolom2").focus();
              return;
            }

            if ($("#kolom3").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 3 kurang dari 5");
              document.getElementById("kolom3").focus();
              return;
            }

            if ($("#kolom4").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 4 kurang dari 5");
              document.getElementById("kolom4").focus();
              return;
            }

            if ($("#kolom5").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 5 kurang dari 5");
              document.getElementById("kolom5").focus();
              return;
            }

            if ($("#kolom6").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 6 kurang dari 5");
              kdocument.getElementById("kolom6").focus();
              return;
            }

            if ($("#kolom7").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 7 kurang dari 5");
              document.getElementById("kolom7").focus();
              return;
            }

            if ($("#kolom8").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 8 kurang dari 5");
              document.getElementById("kolom8").focus();
              return;
            }

            if ($("#kolom9").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 9 kurang dari 5");
              document.getElementById("kolom9").focus();
              return;
            }

            if ($("#kolom10").val().length < 5) {
              alert("Jumlah karakter pada KOLOM 10 kurang dari 5");
              document.getElementById("kolom10").focus();
              return;
            }  

            $.ajax({
              url: "<?= base_url('admin/soal/simpansoal') ?>",
              type: "post",
              dataType: "json",
              data: {
                "kolom1" : $("#kolom1").val(),
                "kolom2" : $("#kolom2").val(),
                "kolom3" : $("#kolom3").val(),
                "kolom4" : $("#kolom4").val(),
                "kolom5" : $("#kolom5").val(),
                "kolom6" : $("#kolom6").val(),
                "kolom7" : $("#kolom7").val(),
                "kolom8" : $("#kolom8").val(),
                "kolom9" : $("#kolom9").val(),
                "kolom10" : $("#kolom10").val(),
                "user_group" : "global",
                "sk_group_id" : sk_group_id,
                "group_id" : 5, //umum
                "kolom1_lama" : kolom1_lama,
                "kolom2_lama" : kolom2_lama,
                "kolom3_lama" : kolom3_lama,
                "kolom4_lama" : kolom4_lama,
                "kolom5_lama" : kolom5_lama,
                "kolom6_lama" : kolom6_lama,
                "kolom7_lama" : kolom7_lama,
                "kolom8_lama" : kolom8_lama,
                "kolom9_lama" : kolom9_lama,
                "kolom10_lama" : kolom10_lama
              },
              beforeSend: function() {
                // $("#loader-wrapper").removeClass("d-none")
                $("#loader-wrapper").css('display','block');
              },
              success: function(data) {
                // $("#loader-wrapper").addClass("d-none");
                $("#loader-wrapper").css('display','none');
                Swal.fire("Soal berhasil di disimpan", "", "success");
                $("#btn_simpan").css('display','none');
                $("#btn_update").css('display','block');
              },
              error: function() {
                // $("#loader-wrapper").addClass("d-none");
                $("#loader-wrapper").css('display','none');
                Swal.fire("Soal gagal di disimpan", "", "error");
              }
            });
      }

      function updatesoal() {
          var kolom1 = $("#kolom1").val();
          var kolom2 = $("#kolom2").val();
          var kolom3 = $("#kolom3").val();
          var kolom4 = $("#kolom4").val();
          var kolom5 = $("#kolom5").val();
          var kolom6 = $("#kolom6").val();
          var kolom7 = $("#kolom7").val();
          var kolom8 = $("#kolom8").val();
          var kolom9 = $("#kolom9").val();
          var kolom10 = $("#kolom10").val();
          var kolom1_lama = $("#kolom1_lama").val();
          var kolom2_lama = $("#kolom2_lama").val();
          var kolom3_lama = $("#kolom3_lama").val();
          var kolom4_lama = $("#kolom4_lama").val();
          var kolom5_lama = $("#kolom5_lama").val();
          var kolom6_lama = $("#kolom6_lama").val();
          var kolom7_lama = $("#kolom7_lama").val();
          var kolom8_lama = $("#kolom8_lama").val();
          var kolom9_lama = $("#kolom9_lama").val();
          var kolom10_lama = $("#kolom10_lama").val();
          var sk_group_id = $("#category").val();
       
          if (sk_group_id == 0) {
              alert("Latihan Soal belum di pilih");
              document.getElementById("category").focus();
              return;
            }

          if (kolom1.length < 5) {
              alert("Jumlah karakter pada KOLOM 1 kurang dari 5");
              document.getElementById("kolom1").focus();
              return;
            } 
            
            if (kolom2.length < 5) {
              alert("Jumlah karakter pada KOLOM 2 kurang dari 5");
              document.getElementById("kolom2").focus();
              return;
            }

            if (kolom3.length < 5) {
              alert("Jumlah karakter pada KOLOM 3 kurang dari 5");
              document.getElementById("kolom3").focus();
              return;
            }

            if (kolom4.length < 5) {
              alert("Jumlah karakter pada KOLOM 4 kurang dari 5");
              document.getElementById("kolom4").focus();
              return;
            }

            if (kolom5.length < 5) {
              alert("Jumlah karakter pada KOLOM 5 kurang dari 5");
              document.getElementById("kolom5").focus();
              return;
            }

            if (kolom6.length < 5) {
              alert("Jumlah karakter pada KOLOM 6 kurang dari 5");
              kdocument.getElementById("kolom6").focus();
              return;
            }

            if (kolom7.length < 5) {
              alert("Jumlah karakter pada KOLOM 7 kurang dari 5");
              document.getElementById("kolom7").focus();
              return;
            }

            if (kolom8.length < 5) {
              alert("Jumlah karakter pada KOLOM 8 kurang dari 5");
              document.getElementById("kolom8").focus();
              return;
            }

            if (kolom9.length < 5) {
              alert("Jumlah karakter pada KOLOM 9 kurang dari 5");
              document.getElementById("kolom9").focus();
              return;
            }

            if (kolom10.length < 5) {
              alert("Jumlah karakter pada KOLOM 10 kurang dari 5");
              document.getElementById("kolom10").focus();
              return;
            }  

            $.ajax({
              url: "<?= base_url('admin/soal/updatesoal') ?>",
              type: "post",
              dataType: "json",
              data: {
                "kolom1" : kolom1,
                "kolom2" : kolom2,
                "kolom3" : kolom3,
                "kolom4" : kolom4,
                "kolom5" : kolom5,
                "kolom6" : kolom6,
                "kolom7" : kolom7,
                "kolom8" : kolom8,
                "kolom9" : kolom9,
                "kolom10" : kolom10,
                "user_group" : "global",
                "sk_group_id" : sk_group_id,
                "group_id" : 5, //umum
                "kolom1_lama" : kolom1_lama,
                "kolom2_lama" : kolom2_lama,
                "kolom3_lama" : kolom3_lama,
                "kolom4_lama" : kolom4_lama,
                "kolom5_lama" : kolom5_lama,
                "kolom6_lama" : kolom6_lama,
                "kolom7_lama" : kolom7_lama,
                "kolom8_lama" : kolom8_lama,
                "kolom9_lama" : kolom9_lama,
                "kolom10_lama" : kolom10_lama
              },
              beforeSend: function() {
                // $("#loader-wrapper").removeClass("d-none")
                $("#loader-wrapper").css('display','block');
              },
              success: function(data) {
                // $("#loader-wrapper").addClass("d-none");
                $("#loader-wrapper").css('display','none');
                Swal.fire("Soal berhasil di disimpan", "", "success");
                
              },
              error: function() {
                // $("#loader-wrapper").addClass("d-none");
                $("#loader-wrapper").css('display','none');
                Swal.fire("Soal gagal di disimpan", "", "error");
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