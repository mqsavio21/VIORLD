<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Welcome</h3>
                    <p>Welcome, {{ $user->name }}!</p>
                    @if ($user->role === 'player')
                        <p><strong>Rank:</strong> {{ $user->rank }}</p>
                        <p><strong>Main Role:</strong> {{ $user->main_role }}</p>
                        <p><strong>Notes from Coach:</strong> {{ $user->notes }}</p>
                    @endif
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Training Materials</h3>
                    <ul>
                        @foreach ($materials as $material)
                            <li>
                                <a href="{{ $material->link }}" target="_blank" class="text-blue-500 hover:underline">{{ $material->title }}</a>
                                <p>{{ $material->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
