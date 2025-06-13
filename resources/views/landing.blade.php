<!DOCTYPE html>
<html>
<head>
        @extends('layout')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Re : Note</title>
</head>
<body >
<div class="main-bg w-full h-full">
    <div class="flex justify-center mt-[30vh]">

    <div class="card-color flex flex-row w-[500px] h-[300px] rounded-3xl overflow-hidden pb-3" >
            <div class="flex flex-1 flex-col p-5 items-center mt-16">
        <h1 class="text-4xl font-extrabold bg-gradient-to-r from-pink-500 via-blue-500 to-yellow-500 bg-clip-text text-transparent custom-animate"
          >    Re:Note౨
            </h1>

           <h2 class=" italic text-lg font-lg text-pink-500">Notes worth remembering</h2>


                <div class="flex justify-center mb-4 gap-5 mt-auto">
                <button class="custom-button"><a  href="{{ route('login') }}">Login</a></button>
                <button class="custom-button-2"><a  href="{{ route('register') }}">Register</a></button>
                </div>

           <h2 class=" italic text-md font-lg text-gray-500">NOTE : Finals Practical | Ortega Jeremy</h2>

    </div>  
    </div>
    </div>     
</body>
</html>
