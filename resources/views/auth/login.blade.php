
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Georginatrading</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-359252c/tailwind.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.1.0/cdn.js"></script>
</head>
<body class="bg-gray-800 w-full">
<div class="w-10/12 md:w-6/12 xl:w-4/12 my-32 mx-auto rounded-lg shadow-xl border border-gray-700 bg-gray-800 min-h-64 p-10">
    <div class="text-center mb-5 pb-5 border-b border-gray-700">
        <p class="text-white font-extrabold text-3xl">Welcome to Georginatrading</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: #932424">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-12/12 my-5">
            <label class="mx-4 block text-white text-sm font-bold my-2">Email Address</label>
            <input type="text" name="email" class="bg-gray-900 w-full mx-4 p-2 border-2 border-gray-700 rounded text-gray-100"/>
        </div>
        <div class="w-12/12 my-5">
            <div class="flex justify-between items-center">
                <div>
                    <label class="mx-4 block text-white text-sm font-bold my-2">Password</label>
                </div>
                <div>
                    @if (Route::has('password.request'))
                        <a style="color:#09C6AB;" class="text-green-400 font-normal text-md" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <input type="password" name="password" class="bg-gray-900 w-full mx-4 p-2 border-2 border-gray-700 rounded text-gray-100"/>
        </div>
        <div class="w-12/12 my-10">
            <button type="submit" class="mx-4 bg-green-400 text-gray-900 font-bold p-3 rounded w-full">Login</button>
        </div>
        <p class="text-gray-100 m-5">
            Don't have an account?<a href="{{ route('register') }}" class="text-green-400 font-bold text-md"> Create account now</a>
        </p>
    </form>
</div>
</body>
</html>
