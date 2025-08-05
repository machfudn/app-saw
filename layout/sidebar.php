<!-- Sidebar -->
<aside
    id="sidebar"
    class="fixed top-0 left-0 z-50 h-auto w-64 bg-gradient-to-b from-blue-600 to-blue-800 shadow-xl transform transition-transform duration-300 ease-in-out -translate-x-full md:translate-x-0 md:relative">
    <div class="flex flex-col h-full p-4">
        <!-- Logo + Close -->
        <div class="flex items-center justify-center mb-8">
            <a href="./" class="text-2xl font-bold text-white hover:text-blue-100 transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                APP SAW
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto">
            <ul class="space-y-2">
                <li class="text-xs font-semibold uppercase tracking-wider text-blue-200 px-3 py-2">Menu Navigation</li>
                <li>
                    <a href="./" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-500 transition-all duration-200 text-white group">
                        <span class="bg-blue-500 group-hover:bg-blue-400 p-2 rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <button onclick="toggleSubMenu()" class="flex w-full items-center justify-between px-4 py-3 rounded-lg hover:bg-blue-500 transition-all duration-200 text-white group focus:outline-none">
                        <span class="flex items-center space-x-3">
                            <span class="bg-blue-500 group-hover:bg-blue-400 p-2 rounded-lg transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </span>
                            <span>Data</span>
                        </span>
                        <svg id="arrowIcon" class="w-5 h-5 transition-transform duration-200 text-blue-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="submenu" class="ml-10 mt-1 space-y-1 hidden">
                        <li>
                            <a href="alternatif.php" class="block px-4 py-2 rounded-lg hover:bg-blue-500 transition-all duration-200 text-blue-100 hover:text-white pl-8">Alternatif</a>
                        </li>
                        <li>
                            <a href="bobot.php" class="block px-4 py-2 rounded-lg hover:bg-blue-500 transition-all duration-200 text-blue-100 hover:text-white pl-8">Bobot & Kriteria</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="matrik.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-500 transition-all duration-200 text-white group">
                        <span class="bg-blue-500 group-hover:bg-blue-400 p-2 rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </span>
                        <span>Matrik</span>
                    </a>
                </li>

                <li>
                    <a href="preferensi.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-blue-500 transition-all duration-200 text-white group">
                        <span class="bg-blue-500 group-hover:bg-blue-400 p-2 rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </span>
                        <span>Nilai Preferensi</span>
                    </a>
                </li>

                <li class="mt-8 border-t border-blue-500 pt-4">
                    <a href="logout.php" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-500/20 transition-all duration-200 text-red-100 hover:text-white group">
                        <span class="bg-red-500/30 group-hover:bg-red-500/40 p-2 rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php require "layout/js.php"; ?>