<!-- resources/views/admin/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        @error('password')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>
