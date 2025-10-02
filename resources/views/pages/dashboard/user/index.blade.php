<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-gray-500 hover:text-gray-700 hover:underline font-medium">
            Logout
        </button>
    </form>
</body>

</html>