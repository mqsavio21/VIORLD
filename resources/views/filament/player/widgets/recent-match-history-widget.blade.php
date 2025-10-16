<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-semibold">Recent Match History</h2>

        <div class="mt-4">
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Opponent</th>
                        <th class="px-4 py-2">Result</th>
                        <th class="px-4 py-2">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getMatchHistories() as $match)
                        <tr>
                            <td class="border px-4 py-2">{{ $match->opponent }}</td>
                            <td class="border px-4 py-2">
                                <span @class([
                                    'px-2 py-1 rounded-full text-xs',
                                    'bg-green-200 text-green-800' => $match->result === 'Win',
                                    'bg-red-200 text-red-800' => $match->result === 'Lose',
                                    'bg-gray-200 text-gray-800' => $match->result === 'Draw',
                                ])>
                                    {{ $match->result }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">{{ $match->score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
