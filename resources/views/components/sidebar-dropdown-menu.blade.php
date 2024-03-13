<li>
                        <a class="group relative flex flex-row items-center gap-4 px-4 py-2 text-md font-light text-gray-200 duration-300 ease-in-out hover:bg-white hover:text-primaryRed rounded-lg hover:shadow-md dark:hover:bg-meta-4"
                            href="#" @click="selected = (selected === '{{ $title }}' ? '':'{{ $title }}')"
                            >

                            <i class="{{ $icon ?? "" }}"></i>

                            {{ $title }}


                            <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180 delay-100 transition-transform': (selected === '{{ $title }}')  }"></i>

                        </a>

                        <!-- Dropdown Menu Start -->
                        <div class="translate transform overflow-hidden"
                            :class="(selected === '{{ $title }}') ? 'block' : 'hidden'">

                            <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                {{$menu}}
                            </ul>

                        </div>
                    </li>
