<x-app-layout page="Beranda">

    {{-- === TITLE === --}}
    <div class="mx-auto max-w-270">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-graytitle dark:text-white">Layanan WargaKu</h2>
        </div>

        <div class="col-span-5 xl:col-span-3">
            <div class="rounded-lg shadow-md bg-white dark:border-strokedark dark:bg-boxdark">
                <div class="grid grid-cols-3 gap-4 p-4">
                    @for ($i = 1; $i <= 9; $i++) <div class="flex bg-white p-4 shadow-md rounded-md items-center">
                        {{-- Cell {{ $i }} --}}
                        <img class="w-20 ml-2 mr-3" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
                        <div class="text-lg">Pengaduan Masyarakat</div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</x-app-layout>
