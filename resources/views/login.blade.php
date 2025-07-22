<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            width: 100dvw;
            height: 100dvh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        form {
            width: 25rem;
            max-width: calc(100% - 50px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px 0 #aaa;
            border-radius: 5px;
            padding: 20px;
        }
        input {
            width: 100%;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #2a2a2a;
        }
    </style>
</head>
<body>
    
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div>LOGIN</div>
        <input type="text" name="name" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">
        <div style="width: 100%;">
            <button type="button" style="border:none;background:none;cursor:pointer;" onclick="showPassword(this)">show password</button>
        </div>
        <button type="submit">Login</button>
    </form>


    <script>
        const showPassword = (e) => {
            const input = document.getElementById('password')
            input.type = input.type == 'password' ? 'text' : 'password'
            e.innerHTML = input.type == 'password' ? 'show password' : 'hide password'
        }
    </script>

</body>
</html>