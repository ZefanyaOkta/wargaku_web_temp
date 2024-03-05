<x-app-layout page="Beranda">
    <div>
        <div class="p-5">
            <span class=" text-3xl text-graytitle font-medium">Layanan WargaKu</span>
        </div>
    </div>

    {{-- <div class="flex">
        <div class="flex w-60 h-30 items-center bg-white shadow-md rounded-md m-3">
            <img class="w-20 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
    <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    <div class="flex w-60 h-30 items-center bg-white shadow-md rounded-md m-3">
        <img class="w-20 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
        <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    <div class="flex w-60 h-30 items-center bg-white shadow-md rounded-md m-3">
        <img class="w-20 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
        <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    </div> --}}

    <div class="grid grid-cols-3 gap-4 p-4">
        @for ($i = 1; $i <= 9; $i++) <div class="flex bg-white p-4 shadow-md rounded-md items-center">
            {{-- Cell {{ $i }} --}}
            <img class="w-20 ml-2 mr-3" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo" />
            <div class="text-lg">Pengaduan Masyarakat</div>
    </div>
    @endfor
    </div>

    </div>
</x-app-layout>
