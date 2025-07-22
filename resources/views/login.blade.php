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
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #FFFBF5;
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
            background-color: #ffffff;
        }

        input {
            width: 100%;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #2a2a2a;
        }

        .logo-img {
            width: 120px;
            height: auto;
            margin-bottom: 10px;
            object-fit: contain;
        }

        .input-group {
            width: 90%;
            position: relative;
        }

        .input-group input {
            width: 90%;
            padding: 10px 40px 10px 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .password-group .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
            font-size: 1.1rem;
        }

        .btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <img src="{{ asset('img/logo-bhs (2).png') }}" alt="" class="logo-img">
        <div>LOGIN</div>
        <div class="input-group">
            <input type="text" name="name" placeholder="Username" required>
        </div>

        <div class="input-group password-group">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <span class="toggle-password" onclick="togglePassword(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15">
                    <path
                        d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                </svg>
            </span>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>


    <script>
        function togglePassword(el) {
            const input = document.getElementById('password');
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            el.innerHTML = isPassword 
            ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15"><path d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80l0 48c0 17.7 14.3 32 32 32s32-14.3 32-32l0-48C576 64.5 511.5 0 432 0S288 64.5 288 144l0 48L64 192c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-192c0-35.3-28.7-64-64-64l-32 0 0-48z"/></svg>' 
            : '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="15"><path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/></svg>';
        }
    </script>

</body>

</html>