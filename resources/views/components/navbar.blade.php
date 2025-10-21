<nav class="bg-deepwhite">
    <div class="max-w-full flex flex-wrap items-center justify-between px-6 py-4">
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/img/logoclover.png') }}" class="h-20" alt="CLOVER" />
        </a>
        <div class="flex-row">

            @stack('button-login')
            @stack('button-logout')

            <button id="menuToggle" type="button" class="cursor-pointer inline-flex items-center justify-center p-2 w-10 h-10 text-black">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </div>
</nav>

<aside id="right-sidebar"
    class="fixed top-0 right-0 w-64 h-screen transition-transform translate-x-full bg-deepgreen border-l border-gray-200 z-50 ">

    <div class="flex w-full justify-between items-center px-3 py-4 border-gray-300">
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="cursor-pointer text-white rounded-xl p-3 transition-colors flex items-center justify-center" title="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
            </button>
        </form>
        @endauth

        <button id="sidebarClose" type="button" class="cursor-pointer p-2 text-white hover:text-gray-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
    </div>

    <div class="h-full px-3 py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ url('/') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-green-700">
                    <span class="ml-3">Home</span>
                </a>
            <li>
                <a href="{{ url('/about-us') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-green-700">
                    <span class="ml-3">About Us</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/services') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-green-700">
                    <span class="ml-3">Services</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/membership') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-green-700">
                    <span class="ml-3">Membership</span>
                </a>
            </li>

            @guest
            <li>
                <a href="{{ route('login') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-green-700">
                    <span class="ml-3">Login</span>
                </a>
            </li>
            @endguest

            @auth
            <li>
                <a href="{{ Auth::user()->role == 'admin' ? route('admin.manage.appointments.index') : route('customer.dashboard') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-green-700">
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            @endauth

        </ul>
    </div>
</aside>

<script>
    const sidebar = document.getElementById('right-sidebar');
    const toggleBtn = document.getElementById('menuToggle');
    const closeBtn = document.getElementById('sidebarClose');

    toggleBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        sidebar.classList.toggle('translate-x-full');
        sidebar.classList.toggle('translate-x-0');
    });

    closeBtn.addEventListener('click', () => {
        sidebar.classList.add('translate-x-full');
        sidebar.classList.remove('translate-x-0');
    });

    document.addEventListener("click", function(event) {
        if (
            sidebar.classList.contains("translate-x-0") &&
            !sidebar.contains(event.target) &&
            !toggleBtn.contains(event.target)
        ) {
            sidebar.classList.add("translate-x-full");
            sidebar.classList.remove("translate-x-0");
        }
    });
</script>