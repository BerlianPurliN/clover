<aside id="left-sidebar" class="w-12 md:w-64 bg-white md:p-6 shadow-lg transition-all duration-300">
    <h2 class="text-xl font-bold mb-8 text-[#1c3f31] hidden md:block">
        @if(Auth::user()->role == 'admin')
        Admin Panel
        @else
        My Profile
        @endif
    </h2>

    <nav class="md:space-y-3 space-y-5">
        @auth
        @if (Auth::user()->role == 'admin')

        <a href="{{ route('admin.manage.appointments.index') }}" class="data-[state=active]:bg-[#1c3f31] data-[state=active]:text-white data-[state=active]:pointer-events-none flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800 md:py-2 md:px-3 py-0.5 px-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span class="hidden md:inline">Manage Appointments</span>
        </a>
        <a href="{{ route('admin.manage.users.index') }}" class="data-[state=active]:bg-[#1c3f31] data-[state=active]:text-white data-[state=active]:pointer-events-none flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800 md:py-2 md:px-3 py-0.5 px-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="hidden md:inline">Manage Users</span>
        </a>
        <a href="{{ route('admin.audit_logs') }}" class="data-[state=active]:bg-[#1c3f31] data-[state=active]:text-white data-[state=active]:pointer-events-none flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800 md:py-2 md:px-3 py-0.5 px-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.173-5.973" />
            </svg>
            <span class="hidden md:inline">Audit Log</span>
        </a>

        @else

        <a href="{{ route('customer.dashboard') }}" class="data-[state=active]:bg-[#1c3f31] data-[state=active]:text-white data-[state=active]:pointer-events-none flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800  md:py-2 md:px-3 py-0.5 px-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="hidden md:inline">Profile Info</span>
        </a>
        <a href="{{ route('questionnaire.index') }}" class="data-[state=active]:bg-[#1c3f31] data-[state=active]:text-white data-[state=active]:pointer-events-none flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800 md:py-2 md:px-3 py-0.5 px-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.546-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="hidden md:inline">Additional Questions (Optional)</span>
        </a>
        <a href="{{route('appointment.index')}}" class="data-[state=active]:bg-[#1c3f31] data-[state=active]:text-white data-[state=active]:pointer-events-none flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800 md:py-2 md:px-3 py-0.5 px-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1h4v1m-4 10v1h4v-1m-4-10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="hidden md:inline">Appointment</span>
        </a>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center justify-center md:justify-start space-x-3 text-black hover:bg-gray-100 hover:text-gray-800 md:py-2 md:px-3 py-0.5 px-2 rounded-lg w-full" title="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
                <span class="hidden md:inline">Logout</span>
            </button>
        </form>
        @endauth
    </nav>
</aside>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentUrl = window.location.href;
        const sidebarLinks = document.querySelectorAll('#left-sidebar nav a');

        sidebarLinks.forEach(link => {
            if (link.href === currentUrl) {

                link.dataset.state = 'active';
            }
        });
    });
</script>
@endpush