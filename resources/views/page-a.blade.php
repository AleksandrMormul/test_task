<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Special Page A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="w-full max-w-md">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 text-center">
        <h1 class="text-2xl font-bold mb-6">Welcome to Page A</h1>


        <div class="space-y-4">
            <form method="POST" action="{{ route('link.regenerate', ['token' => $link->link]) }}">
                @csrf
                <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Generate New Link
                </button>
            </form>

            <form method="POST" action="{{ route('link.deactivate', ['token' => $link->link]) }}">
                @csrf
                <button class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Deactivate Link
                </button>
            </form>

            <form method="POST" action="{{ route('game.feeling-lucky', ['token' => $link->link]) }}">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full">
                    ImFeelingLucky
                </button>
            </form>
            <!-- Результат последней игры -->
            @if(isset($game))
                <div class="mt-4 p-4 bg-green-100 rounded">
                    <p><strong>Random Number:</strong> {{ $game->game_result }}</p>
                    <p><strong>Result:</strong> {{ $game->result }}</p>
                    <p><strong>Win Amount:</strong> ${{ $game->win_amount }}</p>
                </div>
            @endif
            <form method="POST" action="{{ route('game.history',  ['token' => $link->link]) }}">
                @csrf
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded w-full mt-2">
                    History
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
