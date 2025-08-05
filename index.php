<!DOCTYPE html>
<html lang="en">
<?php require "layout/head.php"; ?>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <div id="app" class="flex min-h-screen">

        <!-- Sidebar -->
        <?php require "layout/sidebar.php"; ?>

        <!-- Main Content -->
        <div id="main" class="flex-1 flex flex-col overflow-hidden">

            <!-- Header -->
            <header class="bg-white shadow-sm py-4 px-6 flex justify-between items-center sticky top-0 z-10">
                <h1 class="text-xl font-bold text-blue-800">Sistem Penunjang Keputusan - Simple Additive Weighting</h1>
                <div class="md:hidden">
                    <button id="openSidebar" class="text-2xl text-black focus:outline-none hover:text-blue-500 transition-colors">☰</button>
                    <button id="closeSidebar" class="text-xl hidden ml-2 text-white focus:outline-none hover:text-blue-200 transition-colors">✖</button>
                </div>
            </header>

            <!-- Page Heading -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-white">
                <div class="max-w-6xl mx-auto">
                    <h1 class="text-2xl font-bold text-blue-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard Overview
                    </h1>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <div class="max-w-6xl mx-auto">
                    <section>
                        <div class="bg-white shadow-md rounded-xl overflow-hidden">
                            <div class="bg-blue-700 px-6 py-4">
                                <h2 class="text-xl font-semibold text-white">
                                    Sistem Pendukung Keputusan Pemilihan Manajer IT Terbaik
                                </h2>
                            </div>

                            <div class="p-6">
                                <p class="text-gray-700 leading-relaxed mb-6">
                                    Metode <strong class="text-blue-600">Simple Additive Weighting (SAW)</strong> sering juga dikenal dengan istilah metode penjumlahan terbobot.
                                    Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif
                                    pada semua atribut (Fishburn 1967). SAW dapat dianggap sebagai cara yang paling mudah dan intuitif untuk
                                    menangani masalah <em>Multiple Criteria Decision-Making (MCDM)</em>, karena fungsi linear additive dapat mewakili
                                    preferensi pembuat keputusan (Decision-Making, DM). Hal tersebut dapat dibenarkan, namun hanya ketika
                                    asumsi <em class="font-medium">preference independence</em> (Keeney & Raiffa 1976) atau <em class="font-medium">preference separability</em>
                                    (Gorman 1968) terpenuhi.
                                </p>

                                <div class="border-t border-gray-200 my-6"></div>

                                <h3 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    Langkah Penyelesaian Simple Additive Weighting (SAW):
                                </h3>
                                <ol class="space-y-3 pl-5">
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 font-medium rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">1</span>
                                        <span class="text-gray-700">Menentukan kriteria-kriteria yang akan dijadikan acuan dalam pengambilan keputusan, yaitu <strong class="text-blue-600">Ci</strong>.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 font-medium rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">2</span>
                                        <span class="text-gray-700">Menentukan rating kecocokan setiap alternatif pada setiap kriteria (<strong class="text-blue-600">X</strong>).</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 font-medium rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">3</span>
                                        <span class="text-gray-700">Membuat matriks keputusan berdasarkan kriteria (<strong class="text-blue-600">Ci</strong>), kemudian melakukan normalisasi matriks berdasarkan persamaan yang disesuaikan dengan jenis atribut (keuntungan/biaya) sehingga diperoleh matriks ternormalisasi <strong class="text-blue-600">R</strong>.</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="bg-blue-100 text-blue-800 font-medium rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">4</span>
                                        <span class="text-gray-700">Hasil akhir diperoleh dari proses perankingan, yaitu penjumlahan dari perkalian matriks ternormalisasi <strong class="text-blue-600">R</strong> dengan vektor bobot sehingga diperoleh nilai terbesar yang dipilih sebagai alternatif terbaik (<strong class="text-blue-600">Ai</strong>).</span>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </section>
                </div>
            </main>

            <!-- Footer -->
            <?php require "layout/footer.php"; ?>

        </div>
    </div>

    <?php require "layout/js.php"; ?>

</body>

</html>