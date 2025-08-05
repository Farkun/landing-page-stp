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
            margin: 10% auto 5% auto; /* 15% from the top and centered */
            padding: 0 10px 10px 10px;
            border: 1px solid #888;
            width: 70%; /* Could be more or less, depending on screen size */
            height: fit-content;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .modal-review {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);

            /* Flex center */
            justify-content: center;
            align-items: center;
        }

        /* Konten modal review */
        .modal-review .modal-content {
            background: #fefefe;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            position: relative;
            color: #2a2a2a
        }

        /* Tombol close di pojok kanan atas */
        .modal-review .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Form styling sederhana */
        .modal-review form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal-review input, 
        .modal-review textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #2a2a2a; 
            background-color: #fff; 
        }

        .modal-review button {
            background-color: #22aa2a;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
        #carousels-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            width: 100%;
            border: 1px solid #fffffa;
            border-radius:5px;
            padding: 3px 5px;
        }
        #carousels-btn:hover {
            color: #2a2a2a;
            background-color: #fffffa;
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
                            <div style="width: 100%;padding-bottom: 5px;">
                                <button id="carousels-btn"><label style="font-size: 16px;">Carousel Images</label><span>&#11208;</span></button>
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

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)">
                        <span>Review Section</span><span>&#11207;</span>
                    </button>

                    <div style="display: none; flex-direction: column;">

                        {{-- Dropdown untuk pilih Review berdasarkan ID --}}
                        <div class="sidebar-subitem">
                            <label for="review-select">Pilih Review</label>
                            <select id="review-select" onchange="handleSelectReview(this)">
                                @foreach ($reviews as $review)
                                    <option value="{{ $review->id }}">
                                        #{{ $loop->iteration }} - {{ $review->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Form Edit Review --}}
                        <div id="review-form">
                            <div class="sidebar-subitem">
                                <label>Nama Alumni</label>
                                <input 
                                    type="text" 
                                    id="review-name" 
                                    name="review-name" 
                                    data-id="" 
                                    onchange="handleChangeReview(this)">
                            </div>

                            <div class="sidebar-subitem">
                                <label>Angkatan</label>
                                <input 
                                    type="text" 
                                    id="review-batch" 
                                    name="review-batch" 
                                    data-id="" 
                                    onchange="handleChangeReview(this)">
                            </div>

                            <div class="sidebar-subitem">
                                <label>Message</label>
                                <textarea 
                                    id="review-message" 
                                    name="review-message" 
                                    data-id="" 
                                    onchange="handleChangeReview(this)" 
                                    onkeydown="tabTextarea(this)"></textarea>
                            </div>
                            <div class="sidebar-subitem">
                                <!-- Tombol untuk buka modal -->
                                <button id="btnAddReview" class="btn-add-review">+ Tambah Review</button>
                            </div>

                            <!-- Tombol Delete -->
                            <div class="sidebar-subitem" id="delete-review-wrapper" style="display:none;">
                                <button onclick="deleteReview()" class="btn-delete-review" style="background-color:red;color:white;">
                                    Hapus Review
                                </button>
                            </div>
                        </div>
                        
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

    <div id="carousels-modal" class="modal">
        <div class="modal-content">
            <div>
                <div class="close">&times;</div>
            </div>
            <div style="
                width: 100%;
                max-height: 80%;
                overflow-y: scroll;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            " id="carousel-item-container">
                @foreach ($carousel_image as $image)
                    <div style="width: 200px;position: relative;">
                        <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                            <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">{{ $loop->iteration }}</div>
                            <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deleteCarousel(this, '/api/delete-carousel/{{ Crypt::encryptString($image->id) }}')">🗑️</button>
                        </div>
                        <img src="{{ $image->url }}" alt="" style="width: 100%;">
                    </div>
                @endforeach
                <button id="add-carousel-btn" style="width:100px;height:100px;background-color:#888;border-radius:10px;font-size:24px;color:white;" onclick="toggleAddCarousel(true)">
                    +
                </button>
            </div>
            <br>
            <div style="display:flex;justify-content:center;">
                <div style="width:50%;display:none;flex-direction:column;color:#2a2a2a" id="add-carousel-form">
                    <div style="display:flex;justify-content:center;padding:10px;border-radius:10px;background-color:#888;">
                        <img src="" alt="" id="preview-add-carousel" style="display: none;width:250px;">
                    </div>
                    <input type="file" name="file" id="add-carousel" onchange="previewImage(this)" accept="image/*" style="color: #2a2a2a;">
                    <div style="display:flex;justify-content:flex-end; gap: 5px;">
                        <button class="btn" style="background-color: #22aa2a;color:#fffffa;" onclick="addCarousel()">Submit</button>
                        <button class="btn" style="background-color:#888;color:#fffffa;" onclick="toggleAddCarousel(false)">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalAddReview" class="modal-review">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 style="text-align:center; margin-bottom: 15px;">Tambah Review Alumni</h3>

            <form id="addReviewForm">
                <div class="form-group">
                    <label for="add-review-name">Nama Alumni</label>
                    <input type="text" name="name" id="add-review-name" required>
                </div>

                <div class="form-group">
                    <label for="add-review-image">Foto Alumni</label>
                    <input type="file" name="image" id="add-review-image" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="add-review-batch">Angkatan</label>
                    <input type="text" name="graduated_at" id="add-review-batch" required>
                </div>

                <div class="form-group">
                    <label for="add-review-message">Pesan</label>
                    <textarea name="message" id="add-review-message" rows="4" required></textarea>
                </div>

                <button type="submit">Simpan</button>
            </form>
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
            if (!file) {
                alert('Pilih file gambar terlebih dahulu');
                return;
            }
            try {
                const formData = new FormData();
                formData.append('file', file)
                const response = await fetch('/api/add-carousel', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                const data = await response.json()
                if (data?.payload) {
                    refreshIframe()
                    document.getElementById('add-carousel').value = ''
                    document.getElementById('preview-add-carousel').style.display = 'none'
                    const container = document.getElementById("carousel-item-container")
                    const btn = document.getElementById("add-carousel-btn")
                    const count = container.children.length
                    const newElement = document.createElement('div')
                    newElement.style.width = '200px'
                    newElement.style.position = 'relative'
                    newElement.innerHTML = `
                    <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                        <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">${count}</div>
                        <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deleteCarousel(this, '/api/delete-carousel/${data.payload.encrypted_id}')">🗑️</button>
                    </div>
                    <img src="${data.payload.url}" alt="" style="width: 100%;">
                    `
                    btn.before(newElement)
                    newElement.append()
                }
            } catch (err) {
                console.error(err.message)
            }
        }

        let reviews = @json($reviews);

        function handleSelectReview(select) {
            const id = parseInt(select.value);
            const review = reviews.find(r => r.id === id);

            if (review) {
                // Isi form dengan data review
                document.getElementById('review-name').value = review.name ?? '';
                document.getElementById('review-batch').value = review.graduated_at ?? '';
                document.getElementById('review-message').value = review.message ?? '';

                // Set data-id agar handleChangeReview & delete tahu review mana yang diupdate
                document.getElementById('review-name').dataset.id = id;
                document.getElementById('review-batch').dataset.id = id;
                document.getElementById('review-message').dataset.id = id;

                // Tampilkan tombol delete
                document.getElementById('delete-review-wrapper').style.display = 'block';
            } else {
                // Kosongkan form
                document.getElementById('review-name').value = '';
                document.getElementById('review-batch').value = '';
                document.getElementById('review-message').value = '';

                // Kosongkan data-id
                document.getElementById('review-name').dataset.id = '';
                document.getElementById('review-batch').dataset.id = '';
                document.getElementById('review-message').dataset.id = '';

                // Sembunyikan tombol delete
                document.getElementById('delete-review-wrapper').style.display = 'none';
            }
        }


        async function handleChangeReview(input) {
            const id = input.dataset.id;
            if (!id) return; // kalau belum pilih review, jangan kirim

            let field = input.id.replace('review-', '');
            if (field === 'batch') field = 'graduated_at'; // mapping

            const value = input.value;

            try {
                const response = await fetch(`/api/update-reviews/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ [field]: value })
                });

                const data = await response.json();
                if (data?.payload) refreshIframe();
            } catch (err) {
                console.error(err.message);
            }
        }

        document.getElementById('addReviewForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('name', document.getElementById('add-review-name').value);
            formData.append('image', document.getElementById('add-review-image').files[0]);
            formData.append('graduated_at', document.getElementById('add-review-batch').value);
            formData.append('message', document.getElementById('add-review-message').value);

            try {
                const response = await fetch('/api/add-reviews', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();
                console.log('Add Review Response:', data);

                if (data?.payload) {
                    alert('Review berhasil ditambahkan!');
                    refreshIframe();
                    modal.style.display = "none";
                    this.reset(); // reset form setelah submit
                } else {
                    alert('Gagal menambah review.');
                }

            } catch (err) {
                console.error(err.message);
                alert('Terjadi kesalahan.');
            }
        });

        async function deleteReview() {
            const id = document.getElementById('review-name').dataset.id;
            if (!id) return;

            if (!confirm('Yakin ingin menghapus review ini?')) return;

            try {
                const response = await fetch(`/api/delete-reviews/${id}`, {
                    method: 'DELETE',
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Accept": "application/json",
                    },
                });

                if (response.ok) {
                    alert('Review berhasil dihapus');
                    refreshIframe(); // supaya UI diperbarui
                } else {
                    alert('Gagal menghapus review');
                }
            } catch (err) {
                console.error(err.message);
            }
        }
        const toggleAddCarousel = (state) => {
            const form = document.getElementById('add-carousel-form')
            form.style.display = state ? 'flex' : 'none'
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

        const deleteCarousel = async (e, route) => {
            try {
                const response = await fetch(route, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json'
                    }
                })
                const data = await response.json()
                if (data?.payload) {
                    refreshIframe()
                    e.parentElement.parentElement.remove()
                }
            } catch (err) {
                console.error(err.message)
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
        var modal = document.getElementById("carousels-modal")
        var btn = document.getElementById("carousels-btn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = () => modal.style.display = "block"
        span.onclick = () => modal.style.display = "none"

        var modalReview = document.getElementById("modalAddReview");
        var btnAddReview = document.getElementById("btnAddReview");
        var spanReview = modalReview.getElementsByClassName("close")[0];

        btnAddReview.onclick = () => modalReview.style.display = "block"
        spanReview.onclick = () => modalReview.style.display = "none"

        window.onclick = function(event) {
            if (event.target == modal) modal.style.display = "none";
            if (event.target == modalReview) modalReview.style.display = "none";
        }
    </script>

</body>
</html>