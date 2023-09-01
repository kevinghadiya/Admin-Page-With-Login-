<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Form</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Updet User Form</h1>
        @foreach ($data as $id => $students)
            <form action="{{ route('updetUserData',$students->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                        value="{{ old('name', $students->name) }}"id="name" name="name">
                    <span class="text-danger my-1">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                        value="{{ old('email', $students->email) }}" id="email" name="email">
                    <span class="text-danger my-1">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Address: </label>
                    <textarea name="address" class="form-control  @error('address') is-invalid @enderror" cols="30" rows="10">{{ old('address', $students->address) }} </textarea>
                    <span class="text-danger my-1">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control  @error('city') is-invalid @enderror"
                        value="{{ old('city', $students->city) }}" id="city" name="city">
                    <span class="text-danger my-1">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="number" class="form-label">Phone Number:</label>
                    <input type="number" class="form-control  @error('number') is-invalid @enderror"
                        value="{{ old('number', $students->number) }}" id="number" name="number">
                    <span class="text-danger my-1">
                        @error('number')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror"
                           value="{{old('image', $students->img)}}"  id="image" name="image">

                           <img src="/products/{{ $students->img }}" class="my-1" width="300px">

                    <span class="text-danger my-1">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="btn btn-primary mb-5">Submit</button>
                <a href="{{ route('alldata') }}" class="btn btn-danger mb-5">Back</a>
            </form>
        @endforeach

    </div>

    <!-- Add Bootstrap JS and Popper.js links here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
