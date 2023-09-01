<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Data</title>
</head>
<body>
    <div class="container mt-5">
        <h2>User Data</h2>
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
        <div class="card">
            <div class="card-body">
                @foreach ($data as $id=>$singleUser )

                <img src="/products/{{ $singleUser->img }}" class="my-1" width="300px">
                <h4 class="card-title">{{$singleUser->name}}</h4>
                <p class="card-text"><strong>Email:</strong> {{$singleUser->email}}</p>
                <p class="card-text"><strong>Address:</strong> {{$singleUser->address}}</p>
                <p class="card-text"><strong>City:</strong> {{$singleUser->city}}</p>
                <p class="card-text"><strong>Age:</strong> {{$singleUser->number}}</p>
                <a href="{{route('updetData',$singleUser->id)}}"class="btn btn-primary">Update</a>
                <a href="{{route('alldata')}}"class="btn btn-danger">Back</a>

                @endforeach

            </div>
        </div>
    </div>
</body>
</html>
