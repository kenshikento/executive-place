<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <h1> Step 2</h1>
                    <form method="POST" action="{{route('user.store')}}">
                        @csrf 
                        <label for="name">name:</label><br>
                        <input type="text" name="name" value="{{old('name')}}"></input><br>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="email">email:</label><br>
                        <input type="email" name="email"></input><br>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <label for="hourly_rate">hourly rate:</label><br>
                        <input type="number" name="hourly_rate"></input><br>
                        @error('hourly_rate')
                            <div class="error">{{ $message }}</div>
                        @enderror                        
                        <label for="currency">currency:</label><br>
                        <input type="text" name="currency"></input><br>
                        @error('currency')
                            <div class="error">{{ $message }}</div>
                        @enderror                        
                        <input type="submit"/><br>
                    </form>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1>Step 3 [Just a example of user 1 output]</h1>
                    <form method="get" action="{{route('user.currency', ['user' => 1])}}">
                        <label for="exchange_to">Currency exchange to:</label><br>
                        <input type="text" name="exchange_to" value="{{old('name')}}"></input><br>
                        @error('exchange_to')
                            <div class="error">{{ $message }}</div>
                        @enderror                                               
                        <input type="submit"/><br>
                    </form>                    
                </div>
            </div>
        </div>
    </body>
</html>
