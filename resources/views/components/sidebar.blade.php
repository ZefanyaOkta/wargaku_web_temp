<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-primaryRed  duration-300 ease-linear dark:bg-black lg:static lg:translate-x-0 rounded-tr-xl rounded-br-lg"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="index.html" class="flex items-center">
            <img src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo"/>
            <h1 class="text-4xl font-semibold text-gray-200">WargaKu</h1>
        </a>

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill="" />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{ selected: $persist('Dashboard') }">
            <!-- Menu Group -->
            <div>

                <ul class="mb-6 flex flex-col gap-1.5">

                    <x-sidebar-menu title="Beranda" icon="fa-solid fa-home" href="dashboard.index" />
                    <x-sidebar-menu title="Panduan" icon="fa-solid fa-book" href="dashboard.panduan" />

                    @foreach ($menus as $menu)
                        <x-sidebar-menu title="{{ $menu['title'] }}" icon="{{ $menu['icon'] }}"
                            href="{{ $menu['href'] }}" />
                    @endforeach
                    {{-- <x-sidebar-menu title="Profil" icon="fa-solid fa-user" href="dashboard.account" /> --}}
                        {{-- <x-sidebar-dropdown-menu title="Roles & Permission"  icon="fa-solid fa-shield-halved">
                            <x-slot:menu>
                                <x-sidebar-menu title="Roles" icon="" href="dashboard.admin.roles.index" />
                                <x-sidebar-menu title="Permission" icon="" href="dashboard.admin.permissions.index" />
                            </x-slot:menu>
                        </x-sidebar-dropdown-menu>

                        <x-sidebar-menu title="OAuth" icon="fa-solid fa-cog" href="dashboard.admin.oauth.index" /> --}}
                </ul>
            </div>

            <!-- Others Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-white">OTHERS</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <x-sidebar-menu title="Akun" icon="fa-solid fa-user" href="dashboard.account" />
                    <x-sidebar-menu title="Pengumuman" icon="fa-solid fa-bullhorn" href="dashboard.index" />
                    <!-- Menu Item Auth Pages -->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
