<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white rounded-sm drop-shadow-lg text-center">

        <h1 class="text-blue-600 text-3xl my-10 font-bold">Sign in</h1>
        <form class="flex flex-col" method="POST" action="{{ route('admin.login') }}">
                @csrf
            <input type="email" placeholder="Email" class="border py-3 px-3 mx-10 my-6 rounded-sm
          placeholder:text-sm placeholder:text-slate-500 focus:outline-none focus:border-blue-700 duration-300" name="email"/>
            <input type="password" placeholder="Password" class="border py-3 px-3 mx-10 my-3 rounded-sm
          placeholder:text-sm placeholder:text-slate-500 focus:outline-none focus:border-blue-700 duration-300" name="password"/>
            @error('email')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <button class="mx-40 my-5 py-3 px-3 bg-blue-800 text-slate-50 rounded-sm text-sm font-normal hover:bg-blue-600 hover:bg-opacity-90 duration-200">
                Sign in
            </button>
        </form>
    </div>
</body>
</html>
