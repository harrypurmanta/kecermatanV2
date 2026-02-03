<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include('front/title') ?>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/styles.css">
</head>
<body>

    <!-- Section SING IN -->
<section>
    <!-- Container -->
    <div class="grid md:h-screen md:grid-cols-2">
      <!-- Component -->
      <div class="flex flex-col items-center justify-center bg-[#f2f2f7]">
        <!-- Wrapper -->
        <div class="max-w-lg px-5 py-16 md:px-10 md:py-24 lg:py-32">
          <div class="mb-6 ml-2 flex h-14 w-14 items-center justify-center bg-orange-400 [box-shadow:rgb(252,206,121)_-8px_8px]">
            <img src="https://assets.website-files.com/6357722e2a5f19121d37f84d/6358f5ec37c8c32b17d1c725_Vector-9.svg" alt="" class="inline-block" />
          </div>
          <p class="mb-8 text-[#647084] md:mb-12 md:text-xl lg:mb-16 lg:text-2xl">Bersemangatlah kepada apa saja yang bermanfaat untukmu, <span class="font-bold text-black">Minta tolonglah kepada Allah SWT </span> dan Jangan malas (Patah Semangat).</p>
          <!-- <p class="font-bold">Dari Abu Hurairah</p>
          <p class="text-sm">Senior Webflow Developer</p> -->
        </div>
      </div>
      <!-- Component -->
      <div class="flex flex-col items-center justify-center bg-sla">
        <!-- Wrapper -->
        <div class="max-w-lg px-5 py-16 text-center md:px-10 md:py-24 lg:py-32">
          <!-- Title -->
          <h2 class="mb-8 text-3xl font-bold md:mb-12 md:text-2xl">Welcome to Bintang Timur Prestasi</h2>
          <!-- Form -->
          <form action="<?= base_url() ?>/belakang/checklogin" method="post" class="mx-auto mb-4 max-w-sm pb-4" name="wf-form-password">
            <div class="relative">
              <img alt="" src="https://assets.website-files.com/6357722e2a5f19121d37f84d/6357722e2a5f190b7e37f878_EnvelopeSimple.svg" class="absolute bottom-0 left-[5%] right-auto top-[26%] inline-block" />
              <input type="email" class="mb-4 block h-9 w-full border border-black bg-[#f2f2f7] px-3 py-6 pl-14 text-sm text-[#333333]" maxlength="256" name="username" placeholder="Email Address" required="" />
            </div>
            <div class="relative mb-4">
              <img alt="" src="https://assets.website-files.com/6357722e2a5f19121d37f84d/6357722e2a5f19601037f879_Lock-2.svg" class="absolute bottom-0 left-[5%] right-auto top-[26%] inline-block" />
              <input type="password" class="mb-4 block h-9 w-full border border-black bg-[#f2f2f7] px-3 py-6 pl-14 text-sm text-[#333333]" placeholder="Password" required="" name="password"/>
            </div>
            <!-- Button -->
            <button type="submit" class="flex items-center justify-center bg-orange-400 px-8 py-4 text-center font-semibold text-white transition [box-shadow:rgb(252,206,121)_-8px_8px] hover:[box-shadow:rgb(252,206,121)_0px_0px]">
              <p class="mr-6 font-bold">Masuk</p>
              <svg class="h-4 w-4 flex-none" fill="currentColor" viewBox="0 0 20 21" xmlns="http://www.w3.org/2000/svg">
                <title>Arrow Right</title>
                <polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9"></polygon>
              </svg>
            </button>
          </form>
        </div>
      </div>
      
    </div>
  </section>
      
</body>
</html>