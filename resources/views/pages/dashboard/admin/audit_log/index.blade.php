@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    @include('components.sidebar')

    <main class="flex-1 p-4 md:p-8">
        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-[#1c3f31] mb-5">Audit Logs</h1>

        <div class="bg-white p-4 md:p-6 rounded-lg shadow-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($activities as $activity)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $activity->causer?->name ?? 'System' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $activity->description }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $activity->created_at->format('d M Y, H:i:s') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No activities recorded yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $activities->links() }}
            </div>
        </div>
    </main>

</div>

@endsection

@push('scripts')
@endpush