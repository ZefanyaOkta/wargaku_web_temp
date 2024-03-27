<x-app-layout page="Panduan">
    <div>
        <div class="mb-6 flex flex-row gap-3 items-center justify-between">
            <h2 class="text-xl font-bold text-graytitle dark:text-white">DAFTAR PENGADUAN</h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li>
                        <a class="font-medium" href="index.html">Beranda /</a>
                    </li>
                    <li class="font-medium text-primary">Pengaduan</li>
                </ol>
            </nav>
        </div>

        <div class="col-span-5 xl:col-span-3">
            <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
                <h3 class=" font-light pt-5 pl-5 pr-5 text-lg text-graytitle dark:text-white">Berikut daftar pengaduan yang telah Anda sampaikan.</h3>
                <div class="text-center pb-10">
                    <div class="flex items-center justify-center">
                        <img class="w-100" src="{{ url('images/categories/Media Center.jpg') }}" alt="Pengaduan" />
                    </div>
                    <h3 class=" font-extralight p-2 text-sm text-graytitle dark:text-white">Belum ada data riwayat pengaduan.</h3>
                    <button class="bg-primaryRed text-white rounded-md shadow-md w-90 h-10 hover:font-medium">
                        Tambah Pengaduan</button>
                </div>
            </div>
        </div>
</x-app-layout>
