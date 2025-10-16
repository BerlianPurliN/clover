@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    @include('components.sidebar')

    <main class="flex-1 p-4 md:p-8">
        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-[#1c3f31] mb-5">Manage Appointments</h1>

        <div x-data="{ showNotesModal: false, currentAppointmentId: null, currentNotes: '' }">

            <div class="bg-white md:p-6 p-1 rounded-lg shadow-lg">

                <form method="GET" action="{{ route('admin.manage.appointments.index') }}" class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                        <div>
                            <label for="status" class="text-sm font-medium text-gray-700">Filter by Status</label>
                            <select name="status" id="status" class="text-xs w-full mt-1 border border-gray-300 rounded-lg p-2.5">
                                <option value="">All Statuses</option>
                                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Under Review" {{ request('status') == 'Under Review' ? 'selected' : '' }}>Under Review</option>
                                <option value="Approved" {{ request('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div>
                            <label for="appointment_from" class="text-sm font-medium text-gray-700">Appointment Date (From)</label>
                            <input type="date" name="appointment_from" id="appointment_from" class="text-xs w-full mt-1 border border-gray-300 rounded-lg p-2.5" value="{{ request('appointment_from') }}">
                        </div>
                        <div>
                            <label for="appointment_to" class="text-sm font-medium text-gray-700">Appointment Date (To)</label>
                            <input type="date" name="appointment_to" id="appointment_to" class="text-xs w-full mt-1 border border-gray-300 rounded-lg p-2.5" value="{{ request('appointment_to') }}">
                        </div>
                    </div>
                    <div class="flex flex-wrap md:max-w-md items-center justify-center gap-2 mt-4">
                        <button type="submit" class="bg-[#1c3f31] hover:bg-white hover:text-[#1c3f31] hover:outline-2 text-white font-semibold py-2 px-4 rounded-lg text-xs md:text-sm transition duration-150 ease-in-out">
                            Filter
                        </button>
                        <a href="{{ route('admin.manage.appointments.index') }}" class="bg-gray-200 hover:bg-white hover:outline-2 font-semibold py-2 px-4 rounded-lg text-xs md:text-sm transition duration-150 ease-in-out">
                            Reset
                        </a>
                        <a href="{{ route('admin.manage.appointments.export', request()->query()) }}"
                            class="bg-green-600 hover:bg-white hover:outline-2 hover:text-black text-white font-semibold py-2 px-4 rounded-lg text-xs md:text-sm transition duration-150">
                            Export to Excel
                        </a>
                    </div>

                </form>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="md:px-6 md:py-3 px-1 py-0.5 text-left md:text-sm text-xs font-medium text-gray-500 uppercase">User</th>
                                <th class="md:px-6 md:py-3 px-1 py-0.5 text-left md:text-sm text-xs font-medium text-gray-500 uppercase">Appointment Date</th>
                                <th class="md:px-6 md:py-3 px-1 py-0.5 text-left md:text-sm text-xs font-medium text-gray-500 uppercase">Request Date</th>
                                <th class="md:px-6 md:py-3 px-1 py-0.5 text-center md:text-sm text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($appointments as $appointment)
                            <tr>
                                <td class="md:px-6 md:py-4 px-2 py-1 md:text-sm text-xs  font-medium text-gray-900">{{ $appointment->user->name }}</td>
                                <td class="md:px-6 md:py-4 px-2 py-1 md:text-sm text-xs  text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_date . ' ' . $appointment->appointment_time)->format('d F Y, H:i') }}</td>
                                <td class="md:px-6 md:py-4 px-2 py-1 md:text-sm text-xs  text-gray-500">{{ $appointment->created_at->format('d F Y') }}</td>

                                <td class="md:px-6 md:py-4 px-1 py-0.5 md:text-sm text-xs">
                                    <form method="POST" action="{{ route('admin.manage.appointments.update', $appointment->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        <div class="flex items-center justify-end gap-2">

                                            @php
                                            $selectClass = '';
                                            switch ($appointment->status) {
                                            case 'Approved':
                                            $selectClass = 'bg-green-100 text-green-800 border-green-300';
                                            break;
                                            case 'Pending':
                                            $selectClass = 'bg-yellow-100 text-yellow-800 border-yellow-300';
                                            break;
                                            case 'Rejected':
                                            $selectClass = 'bg-red-100 text-red-800 border-red-300';
                                            break;
                                            case 'Under Review':
                                            $selectClass = 'bg-blue-100 text-blue-800 border-blue-300';
                                            break;
                                            default:
                                            $selectClass = 'border-gray-300';
                                            }
                                            @endphp

                                            <select name="status" class="border border-gray-300 rounded-lg p-1 text-xs md:text-sm w-full max-w-[120px] {{ $selectClass }}"
                                                @change="
                                                const el = $event.target;
                                                const value = el.value;
                                                el.classList.remove('bg-green-100', 'text-green-800', 'border-green-300', 'bg-yellow-100', 'text-yellow-800', 'border-yellow-300', 'bg-red-100', 'text-red-800', 'border-red-300', 'bg-blue-100', 'text-blue-800', 'border-blue-300');
                                                switch (value) {
                                                    case 'Approved':
                                                        el.classList.add('bg-green-100', 'text-green-800', 'border-green-300');
                                                        break;
                                                    case 'Pending':
                                                        el.classList.add('bg-yellow-100', 'text-yellow-800', 'border-yellow-300');
                                                        break;
                                                    case 'Rejected':
                                                        el.classList.add('bg-red-100', 'text-red-800', 'border-red-300');
                                                        break;
                                                    case 'Under Review':
                                                        el.classList.add('bg-blue-100', 'text-blue-800', 'border-blue-300');
                                                        break;
                                                }
                                                ">
                                                <option value="Pending" {{ $appointment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Under Review" {{ $appointment->status == 'Under Review' ? 'selected' : '' }}>Under Review</option>
                                                <option value="Approved" {{ $appointment->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="Rejected" {{ $appointment->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>

                                            <input type="hidden" name="admin_notes" id="notes-{{ $appointment->id }}" value="{{ $appointment->admin_notes }}">

                                            <div class="hidden md:flex items-center gap-1.5">
                                                <button type="button" @click.prevent="saveStatus($event, {{ $appointment->id }})" class="cursor-pointer text-white bg-blue-500 hover:bg-blue-600 py-1 px-2 rounded-lg text-xs" title="Save Changes">
                                                    Save
                                                </button>

                                                <button type="button" @click="showNotesModal = true; currentAppointmentId = {{ $appointment->id }}; currentNotes = @js($appointment->admin_notes)" class="cursor-pointer text-black hover:text-blue-600 p-1 rounded-full hover:bg-gray-100" title="Add/Edit Notes">
                                                    <svg class="md:w-6 md:h-6 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                                    </svg>
                                                </button>
                                                <a href="{{ route('admin.manage.users.show', $appointment->user_id) }}" class="hover:text-gray-500 text-green-600 rounded-full hover:bg-gray-100 p-1" title="View User Detail">
                                                    <svg class="md:w-6 md:h-6 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                @if ($appointment->user->mobile_phone)
                                                @php
                                                $waNumber = '62' . ltrim($appointment->user->mobile_phone, '0');
                                                @endphp
                                                <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="text-green-600 hover:text-green-700 rounded-full hover:bg-gray-100 p-1" title="Chat on WhatsApp">
                                                    <svg class="md:w-6 md:h-6 w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01s-.521.074-.792.372c-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                                    </svg>
                                                </a>
                                                @endif

                                            </div>

                                            <div x-data="{ open: false }" class="abosolute md:hidden">
                                                <button @click="open = !open" type="button" class="p-1 text-gray-500 rounded-full hover:bg-gray-100 hover:text-gray-700">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                                    </svg>
                                                </button>

                                                <div x-show="open"
                                                    @click.away="open = false"
                                                    x-transition
                                                    class="absolute right-0 z-1 mt-2 w-48 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    style="display: none;">
                                                    <div class="py-1" role="none">
                                                        <button type="button" @click.prevent="saveStatus($event, {{ $appointment->id }}); open = false" class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Save Changes</button>
                                                        <button type="button" @click="showNotesModal = true; currentAppointmentId = {{ $appointment->id }}; currentNotes = @js($appointment->admin_notes); open = false" class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Add/Edit Notes</button>
                                                        <a href="{{ route('admin.manage.users.show', $appointment->user_id) }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100">View User</a>
                                                        @if ($appointment->user->mobile_phone)
                                                        @php
                                                        $waNumber = '62' . ltrim($appointment->user->mobile_phone, '0');
                                                        @endphp
                                                        <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="flex items-center gap-2 text-gray-700 px-4 py-2 text-sm hover:bg-gray-100">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01s-.521.074-.792.372c-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                                            </svg>
                                                            <span>Chat on WhatsApp</span>
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No appointments found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


                <div class="mt-6">
                    {{ $appointments->links() }}
                </div>

            </div>

            <div x-show="showNotesModal"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black-50 bg-opacity-50"
                @click.away="showNotesModal = false">

                <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
                    <h3 class="text-xl font-semibold mb-4">Admin Notes</h3>
                    <textarea x-model="currentNotes" rows="4" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Add notes for this appointment..."></textarea>
                    <div class="mt-4 flex justify-end gap-3">
                        <button type="button" @click="showNotesModal = false" class="cursor-pointer bg-gray-200 text-gray-700 py-2 px-4 rounded-lg">Cancel</button>
                        <button type="button" @click="document.getElementById('notes-' + currentAppointmentId).value = currentNotes; showNotesModal = false;" class="cursor-pointer bg-[#1c3f31] text-white py-2 px-4 rounded-lg">Set Notes</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    function saveStatus(event, appointmentId) {
        const form = event.target.closest('form');
        const formData = new FormData(form);

        event.target.textContent = 'Saving...';
        event.target.disabled = true;

        fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert('Status updated successfully!');
            })
            .catch(error => {
                // Tampilkan notifikasi error
                alert('Failed to update status.');
                console.error('Error:', error);
            })
            .finally(() => {
                // Kembalikan tombol ke state normal
                event.target.textContent = 'Save';
                event.target.disabled = false;
            });
    }
</script>
@endpush