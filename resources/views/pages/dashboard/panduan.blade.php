<x-app-layout page="Panduan">
    <div>
        <div class="mb-6 flex flex-row gap-3 items-center justify-between">
            <h2 class="text-xl font-bold text-graytitle dark:text-white">Petunjuk Penggunaan</h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">Petunjuk Penggunaan</li>
                </ol>
            </nav>
        </div>

        <div class="col-span-5 xl:col-span-3">
            <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
                <div class="text-center pb-10">
                    <div class="flex items-center justify-center">
                        <img class="w-100" src="{{ url('images/illustration/guidance.png') }}" alt="Guidance" />
                    </div>
                    <button class="bg-primaryRed text-white rounded-md shadow-md w-90 h-10 hover:font-medium">Unduh
                        Panduan</button>
                </div>
            </div>
        </div>
</x-app-layout>
