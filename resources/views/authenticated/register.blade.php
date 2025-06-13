<!DOCTYPE html>
<html>
<head>
    @extends('layout')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body class="main-bg ">

    <div class="card-color flex flex-row min-w-[400px] h-auto rounded-3xl overflow-hidden pb-3" >
        <div class="flex flex-1 flex-col p-5 items-center">
             <h1 class="text-2xl font-extrabold mb-2 text-blue-500">Register</h1>

            @if ($errors->any())
               <div x-data="{ show: true }" 
                    x-show="show" 
                    x-init="setTimeout(() => show = false, 3000)"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    class="fixed top-[5vh] left-auto right-auto justify-center bg-red-100 border border-red-400 text-red-800 
                    px-6 py-3 rounded-lg shadow-lg z-50">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                        {{ $error }}
                        </li> 
                    @endforeach
                </ul>
            </div>

            @endif

            <form method="POST" action="{{ route('register') }}" class="flex flex-col w-full ">
                @csrf 
                <div class="flex flex-col justify-between text-left">
                <label>Name:</label>
                <input type="text" name="name" required class="p-1 border-2 border-gray-300 rounded-xl 
                focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"/><br>              
                </div>

                <div class="flex flex-col justify-between text-left">                
                <label>Email:</label>
                <input type="email" name="email" required class="p-1  border-2 border-gray-300 rounded-xl 
                focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"><br>
                </div>
               
                <div class="flex flex-col justify-between text-left ">
                <label>Password:</label>
                <input type="password" name="password" required class="p-1  border-2 border-gray-300 rounded-xl 
                focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"><br>
                </div>
                
                <div class="flex flex-col justify-between text-left">
                <label >Confirm Password:</label>
                <input type="password" name="password_confirmation" required class="p-1 border-2 border-gray-300 rounded-xl 
                focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500"><br>
                </div>

                <div class="flex justify-center mb-4">
                <button type="submit" class="custom-button ">Register</button>
                </div>
            </form>

            <p class="text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login here</a>.</p>
        </div>
           
    </div>        
</body>
</html>
