<x-app-layout page="Panduan">
    <div>
        <div class="mb-6 flex flex-row gap-3 items-center justify-between">
            <h2 class="text-xl font-bold text-graytitle dark:text-white">Daftar Puskesmas</h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li>
                        <a class="font-medium" href="index.html">Beranda /</a>
                    </li>
                    <li class="font-medium text-primary">Puskesmas</li>
                </ol>
            </nav>
        </div>

        <div class="col-span-5 xl:col-span-3">
            <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
                <h3 class=" font-light pt-5 pl-10 pr-5 text-lg text-graytitle dark:text-white">Berikut data lokasi
                    puskesmas di Kota Surabaya.</h3>
                <div class="pl-10 pr-10 pt-5 pb-10">

                    <div class="grid-cols-1">
                        <div class="grid-cols-1">
                            @for ($i = 0; $i < 5; $i++)
                                <div class="flex items-center justify-between bg-white shadow-md rounded-lg gap-15 mb-5">
                                    <div class="flex items-center">
                                        <img class="w-15 m-5" src="{{ url('images/icon/puskesmas.png') }}" alt="puskesmas">
                                        <div class="flex flex-col">
                                            <h3 class="font-semibold text-xl text-graytitle dark:text-white">Puskesmas Asemrowo</h3>
                                            <h3 class="font-normal text-lg text-graytitle dark:text-white">Jl. Asem Raya 8, Kec. Asemrowo</h3>
                                        </div>
                                    </div>
                                    <img class="w-10 mr-3" src="{{ url('images/icon/icon-arrow-right.svg') }}" alt="arrow">
                                </div>
                            @endfor
                        </div>
                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
