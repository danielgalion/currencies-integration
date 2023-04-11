<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Currencies</title>
    </head>
    <body>
        <!-- @todo currencies here -->
        <ul>
            @foreach ($currencies as $currency)
                <li>{{ $currency['currency'] }} {{ $currency['code'] }} {{ $currency['mid'] }}</li>
            @endforeach        
        </ul>
    </body>
</html>