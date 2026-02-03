<?php
$this->session = \Config\Services::session();
?>
<div class="bg-one text-slate-800 flex justify-between md:hidden">
            <!-- logo -->
            <a href="" class="block p-4 text-black font-bold">Bintang Timur Prestasi</a>
            <!-- mobile menu button -->
             <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-200 hover:bg-orange-50 transition duration-300">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                  </svg>
                  
             </button>
         </div>

<div class="sidebar bg-gradient-to-r from-cyan-500 to-one text-two w-64 space-y-6 py-5 absolute inset-y-0 left-0 -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <!-- logo -->
            <a href="#" class="flex items-center py-6 px-3 mx-auto">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                  </svg>
                  <span class="text-sm font-bold text-slate-100">Latihan Kecermatan</span>
                  <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                  </svg>
            </a>
           
            
            <nav>
                    <div class="p-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-three">
                      <i class="bi bi-house-door-fill"></i>
                      <a href="<?= base_url() ?>/menu/dashboard"><span class="text-[18px] ml-4 text-two font-bold">Dashboard</span></a>
                    </div>

                    <div class="p-3 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-three">
                      <i class="bi bi-bookmark-fill"></i>
                      <a href="<?= base_url() ?>/menu/create_soal"><span class="text-[18px] ml-4 text-two font-bold">Create Soal</span></a>
                    </div>
            
                    <div class="p-3 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer ">
                      <i class="bi bi-chat-left-text-fill"></i>
                      <div class="flex justify-between w-full items-center" onclick="dropDown()">
                        <span class="text-[18px] ml-4 text-two font-bold">Soal</span>
                        <span class="text-sm rotate-180" id="arrow">
                          <i class="bi bi-chevron-down"></i>
                        </span>
                      </div>
                    </div>
                    
                    <!-- SOAL MAIN -->
                    <div class=" leading-7 text-left text-sm font-bold mt-2 w-4/5 mx-auto" id="submenu">
                    <!-- <a href="<?= base_url() ?>/menu/soal/1"><h1 class="cursor-pointer p-2 hover:bg-three rounded-md mt-1">Umum</h1></a> -->
                     
                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                    <a href="<?= base_url() ?>/menu/soal/2"><i class="bi bi-filter-circle"></i><span class="p-2">Huruf</span></a>
                    </div>
                    
                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                      <a href="<?= base_url() ?>/menu/soal/3"><i class="bi bi-filter-circle"></i><span class="p-2">Angka</span></a>
                    </div>

                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                      <a href="<?= base_url() ?>/menu/soal/4"><i class="bi bi-filter-circle"></i></i><span class="p-2">Simbol</span></a>
                    </div>

                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                      <a href="<?= base_url() ?>/menu/soal/5"><i class="bi bi-filter-circle"></i><span class="p-2">Huruf Angka</span></a>
                    </div>

                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                      <a href="<?= base_url() ?>/menu/soal/6"><i class="bi bi-filter-circle"></i><span class="p-2">Angka Simbol</span></a>
                    </div>

                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                      <a href="<?= base_url() ?>/menu/soal/7"><i class="bi bi-filter-circle"></i><span class="p-2">Huruf Simbol</sp></a>
                    </div>

                    <div class="cursor-pointer hover:bg-three duration-300 rounded-md mt-1 p-2">
                      <a href="<?= base_url() ?>/menu/soal/8"><i class="bi bi-filter-circle"></i><span class="p-2">Gambar</sp></a>
                    </div>
                  </div>
                  <!-- END SOAL MAIN  -->

                    <div class="p-3 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-three">
                      <i class="bi bi-bookmark-fill"></i>
                      <a href="<?= base_url() ?>/menu/riwayat"><span class="text-[18px] ml-4 text-two font-bold">Riwayat Latihan</span></a>
                    </div>

                    <a href="<?= base_url() ?>/login/logout">
                      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-three">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span class="text-[18px] ml-4 text-two font-bold">Logout</span>
                      </div>
                    </a>
            </nav>
        </div>