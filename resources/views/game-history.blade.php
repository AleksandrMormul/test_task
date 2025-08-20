@if(isset($history) && $history->count())
    <div class="mt-6">
        <h2 class="text-lg font-bold mb-2">Game History</h2>
        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
            <tr class="bg-gray-200">
                <th class="px-2 py-1 border">Date</th>
                <th class="px-2 py-1 border">Game Result Number</th>
                <th class="px-2 py-1 border">Result</th>
                <th class="px-2 py-1 border">Win Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($history as $g)
                <tr>
                    <td class="border px-2 py-1">{{ $g->created_at }}</td>
                    <td class="border px-2 py-1">{{ $g->game_result }}</td>
                    <td class="border px-2 py-1">{{ $g->result }}</td>
                    <td class="border px-2 py-1">${{ $g->win_amount }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
