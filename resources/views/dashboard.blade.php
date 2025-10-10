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

            @if ($user->role === 'player' && $playerStat)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg border-b border-gray-200 pb-4">
                            Latest Player Stats ({{ $playerStat->month }} - {{ $playerStat->episode }} / {{ $playerStat->act }})
                        </h3>
                        <div class="flex space-x-6 mt-4">
                            <div class="w-1/2 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Peak Rating</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->peak_rating }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Playtime (hours)</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->playtime }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Wins</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->wins }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Win %</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->win_percentage }}%</p>
                                </div>
                            </div>
                            <div class="w-1/2 space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Top Agent</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->top_agent }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">K/D Ratio</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->kd_ratio }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Headshot %</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->hs_percentage }}%</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Recorded</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $playerStat->recorded_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Schedules</h3>
                    <ul>
                        @foreach ($schedules as $schedule)
                            <li>
                                <p><strong>{{ $schedule->title }}</strong></p>
                                <p>{{ $schedule->date_start->format('d M Y') }} at {{ $schedule->time_start }}</p>
                                <p>{{ $schedule->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg">Tasks</h3>
                    <ul>
                        @foreach ($tasks as $task)
                            <li>
                                <p><strong>{{ $task->title }}</strong></p>
                                <p>Due: {{ $task->due_date }}</p>
                                <p>{{ $task->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
