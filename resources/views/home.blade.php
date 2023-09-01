<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav d-flex  ">
                <li class="px-2 "><a href="#">Home</a></li>
                <li class="px-2 "><a href="#">Link</a></li>
                <li class="px-2 "><a href="#">Link</a></li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger navbar-btn text-white" type="submit">
                    Log Out </button>
            </form>
        </div>
    </nav>



    <div class="container mt-5">
        <div class="my-3 ">
            <h2>welcome <span class="text-success"> {{ Auth::user()->name }}</span></h2>
        </div>

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
          </div>
      
        @endif

        <div class="d-flex justify-content-between px-2 rounded text-white  m-2 align-items-center bg-secondary">
            <h2>Students Table</h2>
            <a href="{{ route('addUser') }}" class="btn btn-light text-black">Add User</a>
        </div>

        <tbody>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-3">Image</th>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-3">Email</th>
                        <th class="col-md-3">Action</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tr class="">
                        <td class="col-md-3"><img src="products/{{ $user->img }}" alt="User Image" width="100px">
                        </td>
                        <td class="col-md-3">{{ $user->name }}</td>
                        <td class="col-md-3">{{ $user->email }}</td>
                        <td class="col-md-3">
                            <a href="{{route('viewData', $user->id)}}"  class="btn btn-success">view</a>
                            <a href="{{route('updetData', $user->id)}}"  class="btn btn-primary">Updet</a>
                            <a href="{{ route('deleteData', $user->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </table>
        </tbody>
    </div>

    <!-- Add Bootstrap JS and jQuery scripts here -->
</body>

</html>
