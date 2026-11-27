<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h4>{{ $pageTitle }}</h4>
        <hr>

        {{-- Tampilkan pesan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <!-- UBAH JADI TEXT -->
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="age" class="form-label">Age</label>
                    <!-- SUDAH TEXT, BERARTI BENAR -->
                    <input type="text" class="form-control" id="age" name="age" value="{{ old('age') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select name="position" id="position" class="form-select">
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}"
                                {{ old('position') == $position->id ? 'selected' : '' }}>
                                {{ $position->code . ' - ' . $position->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('position')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Employee</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
