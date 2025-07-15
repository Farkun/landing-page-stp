<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        nav {
            width: calc(100% - 10px);
            padding: 5px;
        }
        nav div {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #962F33;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .btn {
            text-decoration: none;
            border-radius: 5px;
            padding: 5px 10px;
            background-color: white;
            font-weight: 600;
            color: black;
        }
        .btn:hover {
            background-color: #eee;
        }
        .btn-logout {
            color: #B64F53;
        }
        .btn-logout:hover {
            color: white;
            background-color: #ca2323;
        }

        .sidebar {
            padding: 0 5px 5px 5px;
            width: 350px;
        }
        .sidebar>div {
            background-color: #962F33;
            border-radius: 10px;
            color: #FAE2A2;
            padding: 20px;
            height: calc(100% - 33px);
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .content {
            padding: 0 5px 5px 0;
            width: 100%;
        }
        .content>div {
            height: calc(100% - 33px);
            overflow-y: scroll;
            overflow-x: hidden;
        }
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-thumb {
            background: gray; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #525252; 
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100dvw; height: 100dvh; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    
    <nav>
        <div>
            <a href="{{ route('logout') }}" class="btn btn-logout">Logout</a>
        </div>
    </nav>


    <div style="
        display: flex;
        height: 90dvh;
    ">
        <div class="sidebar">
            <div>
                kjznckjvnz 
            </div>
        </div>
        <div class="content">
            <div>
                <iframe src="/landingPage" frameborder="0" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>

</body>
</html>