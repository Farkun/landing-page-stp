<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        nav {
            position: sticky;
            background-color: white;
            width: calc(100% - 10px);
            padding: 5px;
            z-index: 10;
        }
        nav>div {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: #962F33;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        button {
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            margin: 0;
        }
        .btn {
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            border: none;
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

        .color-setup {
            position: absolute;
            top: 5px;
            left: 50%;
            background-color: #848484aa;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 0 0 20px 1px #999 inset;
            border-radius: 10px;
            color: #fffffa;
            padding: 20px;
            translate: -100px 0;
            transition: translate 0.3s;
        }
        .sidebar {
            position: absolute;
            top: 5px;
            left: 8px;
            padding: 0 0 5px 5px;
            width: 350px;
            transition: translate 0.3s;
        }
        .sidebar>div {
            background-color: #848484aa;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 0 0 20px 1px #999 inset;
            border-radius: 10px;
            color: #fffffa;
            padding: 20px;
            height: calc(90dvh - 50px);
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .sidebar-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px 5px;
            text-align: start;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            color: #fffffa;
        }
        .sidebar-item:hover {
            background-color: #ddd4;
        }
        .sidebar-subitem {
            text-align: start;
            color: #fffffa;
            padding: 5px 10px;
        }
        .sidebar-subitem:hover {
            background-color: #ccc4;
        }
        .content {
            padding: 0 5px 5px 5px;
            width: calc(100% - 10px);
            height: 100%;
        }
        .content>div {
            height: 100%;
            width: 100%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
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
            <div>
                <button class="btn" onclick="togglSidebar()">&#9776;</button>
            </div>
            <div><button style="
                color: #fffffa;
                font-weight: 600;
                font-size: medium;
                display: flex;
                align-items: center;
                gap: 5px;
            " onclick="toggleColorSetup()"><span>Colors</span><span style="font-size: x-small;">&#11206;</span></button></div>
            <a href="{{ route('logout') }}" class="btn btn-logout">Logout</a>
        </div>
    </nav>


    <div style="
        position: relative;
        height: 90%;
    ">
        <div class="color-setup" id="color-setup">
            <table>
                <tbody>
                    <tr>
                        <td>Primary:&emsp;</td>
                        <td><input type="color" name="" id="input_primary_color" value="{{ $app_setting->primary_color }}" onchange="handleChangeColor()"></td>
                    </tr>
                    <tr>
                        <td>Primary Content:&emsp;</td>
                        <td><input type="color" name="" id="input_primary_content_color" value="{{ $app_setting->primary_content_color }}" onchange="handleChangeColor()"></td>
                    </tr>
                    <tr>
                        <td>Secondary:&emsp;</td>
                        <td><input type="color" name="" id="input_secondary_color" value="{{ $app_setting->secondary_color }}" onchange="handleChangeColor()"></td>
                    </tr>
                    <tr>
                        <td>Secondary Content:&emsp;</td>
                        <td><input type="color" name="" id="input_secondary_content_color" value="{{ $app_setting->secondary_content_color }}" onchange="handleChangeColor()"></td>
                    </tr>
                    <tr>
                        <td>Accent:&emsp;</td>
                        <td><input type="color" name="" id="input_accent_color" value="{{ $app_setting->accent_color }}" onchange="handleChangeColor()"></td>
                    </tr>
                </tbody>
            </table>
            {{-- <div style="display: flex; justify-content: flex-end; margin-top: 20px;"><button type="submit" class="btn">Apply</button></div> --}}
        </div>

        <div class="sidebar" id="sidebar" style="display: none;">
            <div>

                <div style="
                    margin-bottom: 20px;
                    display: flex;
                    flex-direction: column;
                    gap: 5px;
                ">
                    <label for="app_name">App Name</label>
                    <input type="text" name="app_name" id="app_name" value="{{ $app_setting->app_name }}" style="
                        background: none;
                        padding: 5px;
                        border: 1px solid #fffffa;
                        outline: none;
                        color: #fffffa;
                        border-radius: 5px;
                    " onchange="handleChangeAppName()">
                </div>

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)"><span>Hero Section</span><span>&#11207;</span></button>
                    <div style="display: none; flex-direction: column;">
                        <button class="sidebar-subitem">aaaaaaa</button>
                        <button class="sidebar-subitem" onclick="refreshIframe()">address</button>
                        <button class="sidebar-subitem">aaaaaaa</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="content">
            <div>
                <iframe src="/landingPage" frameborder="0" style="
                    height: 100%;
                    width: calc(100% - 5px);
                " id="iframe"></iframe>
            </div>
        </div>
    </div>

    <script>
        const apiToken = @json(session('api_token'))
        
        const load = () => {
            const sidebarMemory = sessionStorage.getItem('sidebar')
            const colorSetupMemory = sessionStorage.getItem('colorOverlay')
            const sidebar = document.getElementById('sidebar') 
            const colorSetup = document.getElementById('color-setup') 
            if (sidebarMemory == 'none') sidebar.style.display = 'none'
            else sidebar.style.display = ''
            if (colorSetupMemory == 'none') colorSetup.style.display = 'none'
            else colorSetup.style.display = ''
        }
        
        const save = () => {
            const sidebar = document.getElementById('sidebar')
            const colorSetup = document.getElementById('color-setup')
            sessionStorage.setItem('sidebar', sidebar.style.display)
            sessionStorage.setItem('colorOverlay', colorSetup.style.display)
        }

        const toggleColorSetup = () => {
            const overlay = document.getElementById('color-setup')
            if (overlay.style.display == 'none') {
                overlay.style.display = ''
                setTimeout(() => overlay.style.translate = '-100px 0', 1)
            } else {
                overlay.style.translate = '-100px -110%'
                setTimeout(() => overlay.style.display = 'none', 300)
            }
            setTimeout(() => save(), 300)
        }

        const togglSidebar = () => {
            const sidebar = document.getElementById('sidebar')
            if (sidebar.style.display == 'none') {
                sidebar.style.display = ''
                setTimeout(() => sidebar.style.translate = '0 0', 1)
            } else {
                sidebar.style.translate = '-110% 0'
                setTimeout(() => sidebar.style.display = 'none', 300)
            }
            setTimeout(() => save(), 300)
        }

        const toggleSidebarItem = (e) => {
            const sub = e.parentElement.children[e.parentElement.children.length - 1]
            sub.style.display = sub.style.display == 'flex' ? 'none' : 'flex'
            e.children[e.children.length - 1].innerHTML = sub.style.display == 'flex' ? '&#11206;' : '&#11207;'
        }

        const handleChangeColor = async () => {
            const primary = document.getElementById('input_primary_color').value
            const primaryContent = document.getElementById('input_primary_content_color').value
            const secondary = document.getElementById('input_secondary_color').value
            const secondaryContent = document.getElementById('input_secondary_content_color').value
            const accent = document.getElementById('input_accent_color').value
            try {
                const response = await fetch('/api/update-color', {
                    method: "PUT",
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Content-Type": 'application/json',
                        "Accept": 'application/json'
                    },
                    body: JSON.stringify({
                        primary_color: primary,
                        primary_content_color: primaryContent,
                        secondary_color: secondary,
                        secondary_content_color: secondaryContent,
                        accent_color: accent,
                    })
                })
                const data = await response.json()
                if (data?.payload) refreshIframe()
            } catch (err) {
                console.error(err.message)
            }
        }

        const handleChangeAppName = async () => {
            const appName = document.getElementById('app_name').value
            try {
                const response = await fetch('/api/update-app-name', {
                    method: 'PUT',
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Content-Type": 'application/json',
                        "Accept": 'application/json'
                    },
                    body: JSON.stringify({app_name: appName})
                })
                const data = await response.json()
                if (data?.payload) refreshIframe()
            } catch (err) {
                console.error(err.message)
            }
        }

        const refreshIframe = () => {
            const iframe = document.getElementById('iframe')
            iframe.src = iframe.src
        }

        load()
    </script>

</body>
</html>