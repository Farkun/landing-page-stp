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
            display: flex;
            flex-direction: column;
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
        #color-btn:hover {
            background-color: #fffffa22;
        }
        input,
        textarea {
            background: none;
            padding: 5px;
            border: 1px solid #fffffa;
            outline: none;
            color: #fffffa;
            border-radius: 5px;
        }
        input[type='color'] {
            padding: 0;
            border: none;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 0 10px 10px 10px;
            border: 1px solid #888;
            width: 30%; /* Could be more or less, depending on screen size */
            display: flex;
            flex-direction: column;
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
                padding: 5px 8px;
                border-radius: 5px;
                color: #fffffa;
                font-weight: 600;
                font-size: medium;
                display: flex;
                align-items: center;
                gap: 5px;
            " onclick="toggleColorSetup()" id="color-btn"><span>Colors</span><span style="font-size: x-small;">&#11206;</span></button></div>
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
                    <input type="text" name="app_name" id="app_name" value="{{ $app_setting->app_name }}" onchange="handleChangeAppName()">
                </div>

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)"><span>Hero Section</span><span>&#11207;</span></button>
                    <div style="display: none; flex-direction: column;">

                        <div class="sidebar-subitem">
                            <label for="hero-heading">Heading</label>
                            <input type="text" name="hero-heading" id="hero-heading" value="{{ $hero->heading }}" onchange="handleChangeGeneral(this)">
                        </div>
                        <div class="sidebar-subitem">
                            <label for="hero-body">Body</label>
                            <textarea name="hero-body" id="hero-body" onchange="handleChangeGeneral(this)" onkeydown="tabTextarea(this)">{{ $hero->body }}</textarea>
                        </div>
                        <div class="sidebar-subitem">
                            <label for="hero-button_label">Button Label</label>
                            <input type="text" name="hero-button_label" id="hero-button_label" value="{{ $hero->button_label }}" onchange="handleChangeGeneral(this)">
                        </div>
                        <div class="sidebar-subitem">
                            <label for="hero-button_url">Button URL</label>
                            <input type="text" name="hero-button_url" id="hero-button_url" value="{{ $hero->button_url }}" onchange="handleChangeGeneral(this)">
                        </div>
                        <div class="sidebar-subitem">
                            <label for="hero-animo">Animo</label>
                            <input type="number" name="hero-animo" id="hero-animo" value="{{ $hero->animo }}" onchange="handleChangeGeneral(this)">
                        </div>
                        <div class="sidebar-subitem">
                            <label for="hero-selected">Selected</label>
                            <input type="number" name="hero-selected" id="hero-selected" value="{{ $hero->selected }}" onchange="handleChangeGeneral(this)">
                        </div>
                        <div class="sidebar-subitem">
                            <label for="">Carousel Images</label>
                            <div style="width: 100%;padding-bottom: 5px;">
                                <button style="background-color: #fffffa;width:100%;" id="myBtn">+</button>
                            </div>
                            <div class="w-full">
                                @foreach ($carousel_image as $image)
                                    <img src="{{ $image->url }}" alt="" style="
                                        width: 100%;
                                    ">
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)"><span>Document Section</span><span>&#11207;</span></button>
                    <div style="display: none; flex-direction: column;">

                        @foreach ($documents as $index => $document)
                        <div class="sidebar-subitem">
                            <label for="document-title{{ $document->id }}">Text Title{{ $index + 1 }}</label>
                            <input type="text"
                                name="document-title{{ $document->id }}"
                                id="document-title{{ $document->id }}"
                                value="{{ $document->title }}"
                                data-id="{{ $document->id }}"
                                onchange="handleChangeDocument(this)">
                        </div>

                        <div class="sidebar-subitem">
                            <label for="document-description{{ $document->id }}">Text Description{{ $index + 1 }}</label>
                            <textarea name="document-description{{ $document->id }}"
                                    id="document-description{{ $document->id }}"
                                    data-id="{{ $document->id }}"
                                    onchange="handleChangeDocument(this)"
                                    onkeydown="tabTextarea(this)">{{ $document->description }}</textarea>
                        </div>

                        <div class="sidebar-subitem">
                            <label for="document-url{{ $document->id }}">Text URL{{ $index + 1 }}</label>
                            <input type="text"
                                name="document-url{{ $document->id }}"
                                id="document-url{{ $document->id }}"
                                value="{{ $document->url }}"
                                data-id="{{ $document->id }}"
                                onchange="handleChangeDocument(this)">
                        </div>
                    @endforeach
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

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div>
                <div class="close">&times;</div>
            </div>
            <div style="display:flex;flex-direction:column;color:#2a2a2a">
                <img src="" alt="" id="preview-add-carousel" style="display: none;">
                <input type="file" name="file" id="add-carousel" onchange="previewImage(this)" accept="image/*" style="color: #2a2a2a;">
                <div style="display:flex;justify-content:flex-end;">
                    <button class="btn" style="background-color: #22aa2a;color:#fffffa;" onclick="addCarousel()">Submit</button>
                </div>
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

        const handleChangeGeneral = async (e) => {
            const url = `/api/update-${e.name.replaceAll('_', '-')}`
            const column = e.name.split('-')[1]
            const value = e.value.replaceAll('\n', '<br>').replaceAll('\t', '&emsp;')
            try {
                const response = await fetch(url, {
                    method: 'PUT',
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Content-Type": 'application/json',
                        "Accept": 'application/json',
                    },
                    body: JSON.stringify({[column]: value})
                })
                const data = await response.json()
                if (data?.payload) refreshIframe()
            } catch (err) {
                console.error(err.message)
            }
        }

        const addCarousel = async () => {
            const file = document.getElementById('add-carousel').files[0]
            const formData = new FormData()
            formData.append('file', file)
            try {
                const response = await fetch('/api/add-carousel', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                const data = await response.json()
                if (data?.payload) refreshIframe()
            } catch (err) {
                console.error(err.message)
            }
        }

        const handleChangeDocument = async (e) => {
        const id = e.dataset.id; // ID document
        const parts = e.name.split('-');
        const field = parts[1].replace(/\d+$/, ''); // hapus angka di akhir

        const value = e.value.replaceAll('\n', '<br>').replaceAll('\t', '&emsp;');

        try {
            const response = await fetch(`/api/update-document/${id}`, {
                method: 'PUT',
                headers: {
                    "Authorization": `Bearer ${apiToken}`,
                    "Content-Type": 'application/json',
                    "Accept": 'application/json',
                },
                body: JSON.stringify({ [field]: value })
            });

            const data = await response.json();
            if (data?.payload) refreshIframe();
        } catch (err) {
            console.error(err.message);
        }
    }



        const refreshIframe = () => {
            const iframe = document.getElementById('iframe')
            iframe.src = iframe.src
        }

        const tabTextarea = (e) => {
            if (e.key === 'Tab') {
                e.preventDefault();
                const textarea = this;
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;

                textarea.value = textarea.value.substring(0, start) + '\t' + textarea.value.substring(end);
                textarea.selectionStart = textarea.selectionEnd = start + 1;
            }
        }

        const previewImage = (e) => {
            const preview = document.getElementById('preview-add-carousel')
            const file = e.files[0]
            if (file) {
                const url = URL.createObjectURL(file)
                preview.src = url
                preview.style.display = ''
            }
        }

        load()
    </script>
    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>

</body>
</html>