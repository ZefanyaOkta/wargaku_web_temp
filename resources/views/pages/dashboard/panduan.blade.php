<x-app-layout page="Panduan">
    {{-- === TITLE === --}}
    <div class="mx-auto max-w-270">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-graytitle dark:text-white">Petunjuk Penggunaan</h2>
        </div>

        <div class="col-span-5 xl:col-span-3">
            <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
                <div class="text-center pb-10">
                    <div class="flex items-center justify-center">
                        <img class="w-100" src="{{ url('images/illustration/guidance.png') }}" alt="Guidance" />
                    </div>
                    <button class="bg-primaryRed text-buttoncol rounded-md shadow-md w-90 h-9 hover:font-medium">Unduh
                        Panduan</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
