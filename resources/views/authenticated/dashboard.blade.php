<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            font-size: 12px;
            background-color: #2a2a2aaa;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
            top: 30px;
            left: 0;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }
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
            height: 5px;
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
        #carousels-btn,
        #partners-btn,
        #socials-btn,
        #quick-link-btn,
        #resource-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            width: 100%;
            border: 1px solid #fffffa;
            border-radius:5px;
            padding: 3px 5px;
        }
        #carousels-btn:hover,
        #partners-btn:hover,
        #socials-btn:hover,
        #quick-link-btn:hover,
        #resource-btn:hover {
            color: #2a2a2a;
            background-color: #fffffa;
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100dvw; height: 100dvh; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    
    <nav>
        <div>
            <div>
                <button class="btn" onclick="toggleSidebar()">&#9776;</button>
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

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)">
                        <span>Selection Step Section</span><span>&#11207;</span>
                    </button>

                    <div style="display: none; flex-direction: column;">

                        {{-- Dropdown untuk pilih Review berdasarkan ID --}}
                        <div class="sidebar-subitem">
                            <label for="review-select">Pilih Step</label>
                            <select id="review-select" onchange="handleSelectStep(this)">
                                @foreach ($selection_steps as $selection_step)
                                    <option value="{{ $selection_step->id }}">
                                        {{ $loop->first ? 'Title' : '#' . ($loop->iteration - 1) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Form Edit Review --}}
                        <div id="selection_step-form">
                            <div class="sidebar-subitem">
                                <label>Title</label>
                                <input 
                                    type="text" 
                                    id="selection_step-title" 
                                    name="selection_step-title" 
                                    data-id="" 
                                    onchange="handleChangeStep(this)">
                            </div>
                            <div class="sidebar-subitem">
                                <label>Description</label>
                                <input 
                                    type="text" 
                                    id="selection_step-description" 
                                    name="selection_step-description" 
                                    data-id="" 
                                    onchange="handleChangeStep(this)">
                            </div>

                            <div class="sidebar-subitem">
                                <label>Url</label>
                                <textarea 
                                    id="selection_step-url" 
                                    name="selection_step-url" 
                                    data-id="" 
                                    onchange="handleChangeStep(this)" 
                                    onkeydown="tabTextarea(this)"></textarea>
                            </div>
                            <div class="sidebar-subitem">
                                <!-- Tombol untuk buka modal -->
                                <button id="btnAddStep" class="btn-add-step">+ Tambah Step</button>
                            </div>

                            <!-- Tombol Delete -->
                            <div class="sidebar-subitem" id="delete-step-wrapper" style="display:none;">
                                <button onclick="deleteStep()" class="btn-delete-step" style="background-color:red;color:white;">
                                    Hapus Step
                                </button>
                            </div>
                        </div>
                        
                    </div>
    
                </div>

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)"><span>Partners Section</span><span>&#11207;</span></button>
                    <div style="display: none; flex-direction: column;">
                        <div class="sidebar-subitem">
                            <div style="width: 100%;padding-bottom: 5px;">
                                <button id="partners-btn"><label style="font-size: 16px;">Partners</label><span>&#11208;</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)"><span>Contact & Info</span><span>&#11207;</span></button>
                    <div style="display: none; flex-direction: column;">
                        <div id="contact-form">
                            <div class="sidebar-subitem">
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{ $app_setting->phone }}" onchange="updateContactAndAddress()">
                            </div>
                            <div class="sidebar-subitem">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $app_setting->email }}" onchange="updateContactAndAddress()">
                            </div>
                            <div class="sidebar-subitem">
                                <label>Address</label>
                                <textarea name="address" id="" cols="30" rows="5" onchange="updateContactAndAddress()">{{ $app_setting->address }}</textarea>
                            </div>
                        </div>
                        <div class="sidebar-subitem">
                            <div style="width: 100%;padding-bottom: 5px;">
                                <button id="socials-btn"><label style="font-size: 16px;">Socials</label><span>&#11208;</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="sidebar-item" onclick="toggleSidebarItem(this)"><span>Quick Links & Resources</span><span>&#11207;</span></button>
                    <div style="display: none; flex-direction: column;">
                        <div class="sidebar-subitem">
                            <div style="width: 100%;padding-bottom: 5px;">
                                <button id="quick-link-btn"><label style="font-size: 16px;">Quick Links</label><span>&#11208;</span></button>
                            </div>
                            <div style="width: 100%;padding-bottom: 5px;">
                                <button id="resource-btn"><label style="font-size: 16px;">Resources</label><span>&#11208;</span></button>
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
                    <div style="height: 120px; position: relative;">
                        <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                            <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">{{ $loop->iteration }}</div>
                            <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deleteCarousel(this, '/api/delete-carousel/{{ Crypt::encryptString($image->id) }}')">🗑️</button>
                        </div>
                        <img src="{{ $image->url }}" alt="" style="width: auto; height: 100px;">
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
                    <input type="file" name="file" id="add-carousel" onchange="previewImageCarousel(this)" accept=".png,.jpg,.jpeg,.webp" style="color: #2a2a2a;">
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
    <div id="modalAddStep" class="modal-review">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 style="text-align:center; margin-bottom: 15px;">Tambah Selection Step</h3>

            <form id="addStepForm">
                <div class="form-group">
                    <label for="add-selection_step-description">Description<span style="color:red;">*</span></label>
                    <input type="text" name="description" id="add-selection_step-description" required>
                </div>

                <div class="form-group">
                    <label for="add-selection_step-image">Image</label>
                    <input type="file" name="image" id="add-selection_step-image" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="add-selection_step-url">Url</label>
                    <input type="text" name="url" id="add-selection_step-url" required>
                </div>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
    <div id="partners-modal" class="modal">
        <div class="modal-content">
            <div>
                <div class="close" id="close-partners-modal">&times;</div>
            </div>
            <div style="
                width: 100%;
                max-height: 80%;
                overflow-y: scroll;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            " id="partner-item-container">
                @foreach ($partners as $partner)
                    <div class="tooltip" style="height: 120px;position: relative;">
                        <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                            <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">{{ $loop->iteration }}</div>
                            <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deletePartner(this, '/api/delete-partners/{{ Crypt::encryptString($partner->id) }}')">🗑️</button>
                        </div>
                        <img src="{{ $partner->logo }}" alt="" style="width: auto; height: 100px">
                        <span class="tooltiptext">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>:</th>
                                        <td style="text-align: start;">{{ $partner->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>URL</th>
                                        <th>:</th>
                                        <td style="text-align: start;">{{ $partner->url }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </span>
                    </div>
                @endforeach
                <button id="add-partner-btn" style="width:100px;height:100px;background-color:#888;border-radius:10px;font-size:24px;color:white;" onclick="toggleAddPartner(true)">
                    +
                </button>
            </div>
            <br>
            <div style="display:flex;justify-content:center;">
                <div style="width:50%;display:none;flex-direction:column;color:#2a2a2a" id="add-partner-form">
                    <label for="">Name</label>
                    <input type="text" name="name" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <div style="margin: 5px 0 0 0;display:flex;flex-direction:column;align-items:center;gap:10px;padding:10px;border-radius:10px;background-color:#888;color:#fffffa;">
                        Logo
                        <img src="" alt="" id="preview-add-partner" style="display: none;width:250px;">
                    </div>
                    <input type="file" name="logo" id="add-partner" onchange="previewImagePartner(this)" accept=".png,.jpg,.jpeg,.webp" style="color: #2a2a2a;">
                    <label for="">URL</label>
                    <input type="text" name="url" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <div style="margin: 10px 0 0 0;display:flex;justify-content:flex-end; gap: 5px;">
                        <button class="btn" style="background-color: #22aa2a;color:#fffffa;" onclick="addPartner()">Submit</button>
                        <button class="btn" style="background-color:#888;color:#fffffa;" onclick="toggleAddPartner(false)">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="socials-modal" class="modal">
        <div class="modal-content">
            <div>
                <div class="close" id="close-socials-modal">&times;</div>
            </div>
            <div style="
                width: 100%;
                max-height: 80%;
                overflow-y: scroll;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            " id="social-item-container">
                @foreach ($socials as $social)
                    <div class="tooltip" style="height: 120px;position: relative;">
                        <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                            <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">{{ $loop->iteration }}</div>
                            <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deleteSocial(this, '/api/delete-socials/{{ Crypt::encryptString($social->id) }}')">🗑️</button>
                        </div>
                        <img src="{{ $social->image }}" alt="" style="width: auto; height: 100px">
                        <span class="tooltiptext">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>:</th>
                                        <td style="text-align: start;">{{ $social->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>URL</th>
                                        <th>:</th>
                                        <td style="text-align: start;">{{ $social->url }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </span>
                    </div>
                @endforeach
                <button id="add-social-btn" style="width:100px;height:100px;background-color:#888;border-radius:10px;font-size:24px;color:white;" onclick="toggleAddSocial(true)">
                    +
                </button>
            </div>
            <br>
            <div style="display:flex;justify-content:center;">
                <div style="width:50%;display:none;flex-direction:column;color:#2a2a2a" id="add-social-form">
                    <label for="">Name</label>
                    <input type="text" name="name" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <div style="margin: 5px 0 0 0;display:flex;flex-direction:column;align-items:center;gap:10px;padding:10px;border-radius:10px;background-color:#888;color:#fffffa;">
                        Logo
                        <img src="" alt="" id="preview-add-social" style="display: none;width:250px;">
                    </div>
                    <input type="file" name="image" id="add-social" onchange="previewImageSocial(this)" accept=".png,.jpg,.jpeg,.webp" style="color: #2a2a2a;">
                    <label for="">URL</label>
                    <input type="text" name="url" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <div style="margin: 10px 0 0 0;display:flex;justify-content:flex-end; gap: 5px;">
                        <button class="btn" style="background-color: #22aa2a;color:#fffffa;" onclick="addSocial()">Submit</button>
                        <button class="btn" style="background-color:#888;color:#fffffa;" onclick="toggleAddSocial(false)">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="quick-link-modal" class="modal">
        <div class="modal-content">
            <div>
                <div class="close" id="close-quick-link-modal">&times;</div>
            </div>
            <div style="
                width: 100%;
                max-height: 80%;
                overflow-y: scroll;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            ">
                <table style="width: 100%;border-collapse: collapse;" id="quick-link-table">
                    <tbody id="quick-link-item-container">
                        @foreach ($quick_links as $ql)
                            <tr>
                                <td>
                                    <button class="btn" style="background-color:#dd0000;padding: 3px 6px;border-radius:5px;font-size:12px;color:white;" onclick="deleteQuickLink(this, '/api/delete-quick-link/{{ Crypt::encryptString($ql->id) }}')">x</button>
                                </td>
                                <td>
                                    <input type="text" value="{{ $ql->name }}" 
                                        data-id="{{ Crypt::encryptString($ql->id) }}" 
                                        data-field="name" style="width:100%;border:1px solid #ccc;padding:3px;color:white;background-color:#333;">
                                </td>
                                <td>
                                    <input type="text" value="{{ $ql->url }}" 
                                        data-id="{{ Crypt::encryptString($ql->id) }}" 
                                        data-field="url" style="width:100%;border:1px solid #ccc;padding:3px;color:white;background-color:#333;">
                                </td>
                                <td>
                                    <button class="btn" style="background-color:#22aa2a;padding: 3px 6px;border-radius:5px;font-size:12px;color:white;" 
                                            onclick="updateQuickLink(this)">Update</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="padding-top: 15px;">
                                <button id="add-quick-link-btn" style="width:100%;background-color:#888;border-radius:10px;font-size:24px;color:white;" onclick="toggleAddQuickLink(true)">
                                    +
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div style="display:flex;justify-content:center;">
                <div style="width:50%;display:none;flex-direction:column;color:#2a2a2a" id="add-quick-link-form">
                    <label for="">Name</label>
                    <input type="text" name="name" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <label for="">URL</label>
                    <input type="text" name="url" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <div style="margin: 10px 0 0 0;display:flex;justify-content:flex-end; gap: 5px;">
                        <button class="btn" style="background-color: #22aa2a;color:#fffffa;" onclick="addQuickLink()">Submit</button>
                        <button class="btn" style="background-color:#888;color:#fffffa;" onclick="toggleAddQuickLink(false)">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="resource-modal" class="modal">
        <div class="modal-content">
            <div>
                <div class="close" id="close-resource-modal">&times;</div>
            </div>
            <div style="
                width: 100%;
                max-height: 80%;
                overflow-y: scroll;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            ">
                <table style="width: 100%;border-collapse: collapse;" id="resource-table">
                    <tbody id="resource-item-container">
                        @foreach ($resources as $rs)
                            <tr>
                                <td>
                                    <button class="btn" style="background-color:#dd0000;padding: 3px 6px;border-radius:5px;font-size:12px;color:white;" onclick="deleteResource(this, '/api/delete-resource/{{ Crypt::encryptString($rs->id) }}')">x</button>
                                </td>
                                <td>
                                    <input type="text" value="{{ $rs->name }}" 
                                        data-id="{{ Crypt::encryptString($rs->id) }}" 
                                        data-field="name" style="width:100%;border:1px solid #ccc;padding:3px;color:white;background-color:#333;">
                                </td>
                                <td>
                                    <input type="text" value="{{ $rs->url }}" 
                                        data-id="{{ Crypt::encryptString($rs->id) }}" 
                                        data-field="url" style="width:100%;border:1px solid #ccc;padding:3px;color:white;background-color:#333;">
                                </td>
                                <td>
                                    <button class="btn" style="background-color:#22aa2a;padding: 3px 6px;border-radius:5px;font-size:12px;color:white;" 
                                            onclick="updateResource(this)">Update</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="padding-top: 15px;">
                                <button id="add-resource-btn" style="width:100%;background-color:#888;border-radius:10px;font-size:24px;color:white;" onclick="toggleAddResource(true)">
                                    +
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div style="display:flex;justify-content:center;">
                <div style="width:50%;display:none;flex-direction:column;color:#2a2a2a" id="add-resource-form">
                    <label for="">Name</label>
                    <input type="text" name="name" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <label for="">URL</label>
                    <input type="text" name="url" style="color: #2a2a2a;border: 1px solid #2a2a2a;">
                    <div style="margin: 10px 0 0 0;display:flex;justify-content:flex-end; gap: 5px;">
                        <button class="btn" style="background-color: #22aa2a;color:#fffffa;" onclick="addResource()">Submit</button>
                        <button class="btn" style="background-color:#888;color:#fffffa;" onclick="toggleAddResource(false)">Cancel</button>
                    </div>
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

        const toggleSidebar = () => {
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
                    newElement.style.height = '120px'
                    newElement.style.position = 'relative'
                    newElement.innerHTML = `
                    <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                        <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">${count}</div>
                        <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deleteCarousel(this, '/api/delete-carousel/${data.payload.encrypted_id}')">🗑️</button>
                    </div>
                    <img src="${data.payload.url}" alt="" style="width: auto; height: 100px">
                    `
                    btn.before(newElement)
                    newElement.append()
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const toggleAddCarousel = (state) => {
            const form = document.getElementById('add-carousel-form')
            form.style.display = state ? 'flex' : 'none'
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
                    const items = [...document.getElementById('carousel-item-container').children]
                    items.forEach((e, i) => {
                        if (i + 1 < items.length) e.children[0].children[0].innerHTML = `${i+1}`
                    })
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const previewImageCarousel = (e) => {
            const preview = document.getElementById('preview-add-carousel')
            const file = e.files[0]
            if (file) {
                const url = URL.createObjectURL(file)
                preview.src = url
                preview.style.display = ''
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

        let selection_steps = @json($selection_steps);

        function handleSelectStep(select) {
            const id = parseInt(select.value);
            const selection_step = selection_steps.find(r => r.id === id);

            if (selection_step) {
                // Isi form dengan data review
                document.getElementById('selection_step-title').value = selection_step.title ?? '';
                document.getElementById('selection_step-description').value = selection_step.description ?? '';
                // document.getElementById('selection_step-image').value = selection_step.image ?? '';
                document.getElementById('selection_step-url').value = selection_step.url ?? '';

                // Set data-id agar handleChangeReview & delete tahu review mana yang diupdate
                document.getElementById('selection_step-title').dataset.id = id;
                document.getElementById('selection_step-description').dataset.id = id;
                document.getElementById('selection_step-url').dataset.id = id;

                // Tampilkan tombol delete
                document.getElementById('delete-step-wrapper').style.display = 'block';
            } else {
                // Kosongkan form
                // document.getElementById('selection_step-title').value = '';
                document.getElementById('selection_step-description').value = '';
                document.getElementById('selection_step-image').value = '';
                document.getElementById('selection_step-url').value = '';

                // Kosongkan data-id
                // document.getElementById('selection_step-title').dataset.id = '';
                document.getElementById('selection_step-description').dataset.id = '';
                document.getElementById('selection_step-image').dataset.id = '';
                document.getElementById('selection_step-url').dataset.id = '';

                // Sembunyikan tombol delete
                document.getElementById('delete-step-wrapper').style.display = 'none';
            }
        }


        async function handleChangeStep(input) {
            const id = input.dataset.id;
            if (!id) return; // kalau belum pilih review, jangan kirim

            let field = input.id.replace('selection_step-', '');

            const value = input.value;

            try {
                const response = await fetch(`/api/update-step/${id}`, {
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

        document.getElementById('addStepForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData();
            formData.append('description', document.getElementById('add-selection_step-description').value);
            formData.append('image', document.getElementById('add-selection_step-image').files[0]);
            formData.append('url', document.getElementById('add-selection_step-url').value);

            try {
                const response = await fetch('/api/add-step', {
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
                    alert('Step berhasil ditambahkan!');
                    refreshIframe();
                    modal.style.display = "none";
                    this.reset(); // reset form setelah submit
                } else {
                    alert('Gagal menambah step.');
                }

            } catch (err) {
                console.error(err.message);
                alert('Terjadi kesalahan.');
            }
        });

        async function deleteStep() {
            const id = document.getElementById('selection_step-description').dataset.id;
            if (!id) return;

            if (!confirm('Yakin ingin menghapus step ini?')) return;

            try {
                const response = await fetch(`/api/delete-step/${id}`, {
                    method: 'DELETE',
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Accept": "application/json",
                    },
                });

                if (response.ok) {
                    alert('step berhasil dihapus');
                    refreshIframe(); // supaya UI diperbarui
                } else {
                    alert('Gagal menghapus step');
                }
            } catch (err) {
                console.error(err.message);
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
        

        const addPartner = async () => {
            const form = document.getElementById('add-partner-form')
            const inputs = new Array(...form.getElementsByTagName('input'))
            try {
                const formData = new FormData();
                inputs.forEach(e => {
                    if (e.type == 'file' && !e.files[0]) {
                        alert('Pilih file gambar terlebih dahulu');
                        return;
                    } else if (e.value == null || e.value == '') {
                        alert('Form belum lengkap');
                        return;
                    } else if (e.type == 'file') formData.append(e.name, e.files[0])
                    else formData.append(e.name, e.value)
                })
                const response = await fetch('/api/add-partners', {
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
                    inputs.forEach(e => {
                        if (e.type == 'files') e.files = []
                        else e.value = ''
                    });
                    document.getElementById('preview-add-partner').style.display = 'none'
                    const container = document.getElementById("partner-item-container")
                    const btn = document.getElementById("add-partner-btn")
                    const count = container.children.length
                    const newElement = document.createElement('div')
                    newElement.className = 'tooltip'
                    newElement.style.height = '120px'
                    newElement.style.position = 'relative'
                    newElement.innerHTML = `
                    <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                        <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">${count}</div>
                        <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deletePartner(this, '/api/delete-partners/${data.payload.encrypted_id}')">🗑️</button>
                    </div>
                    <img src="${data.payload.logo}" alt="" style="width: auto; height: 100px;">
                    <span class="tooltiptext">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>:</th>
                                    <td style="text-align: start;">${data.payload.name}</td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <th>:</th>
                                    <td style="text-align: start;">${data.payload.url}</td>
                                </tr>
                            </tbody>
                        </table>
                    </span>
                    `
                    btn.before(newElement)
                    newElement.append()
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const toggleAddPartner = (state) => {
            const form = document.getElementById('add-partner-form')
            form.style.display = state ? 'flex' : 'none'
        }
        const deletePartner = async (e, route) => {
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
                    const items = [...document.getElementById('partner-item-container').children]
                    items.forEach((e, i) => {
                        if (i+1 < items.length) e.children[0].children[0].innerHTML = `${i+1}`
                    })
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const previewImagePartner = (e) => {
            const preview = document.getElementById('preview-add-partner')
            const file = e.files[0]
            if (file) {
                const url = URL.createObjectURL(file)
                preview.src = url
                preview.style.display = ''
            }
        }

        const updateContactAndAddress = async () => {
            const form = document.getElementById('contact-form')
            let inputs = [...form.getElementsByTagName('input'), ...form.getElementsByTagName('textarea')]
            try {
                const formData = {}
                inputs.forEach(e => {
                    if (e.value != null || e.value != '') formData[e.name] = e.value
                })
                const response = await fetch('/api/update-contact-address', {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                const data = await response.json()
                if (data?.payload) refreshIframe()
            } catch (err) {
                console.error(err.message)
            }
        }
        const addSocial = async () => {
            const form = document.getElementById('add-social-form')
            const inputs = [...form.getElementsByTagName('input')]
            try {
                const formData = new FormData();
                inputs.forEach(e => {
                    if (e.type == 'file' && !e.files[0]) {
                        alert('Pilih file gambar terlebih dahulu');
                        return;
                    } else if (e.value == null || e.value == '') {
                        alert('Form belum lengkap');
                        return;
                    } else if (e.type == 'file') formData.append(e.name, e.files[0])
                    else formData.append(e.name, e.value)
                })
                const response = await fetch('/api/add-socials', {
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
                    inputs.forEach(e => {
                        if (e.type == 'files') e.files = []
                        else e.value = ''
                    });
                    document.getElementById('preview-add-social').style.display = 'none'
                    const container = document.getElementById("social-item-container")
                    const btn = document.getElementById("add-social-btn")
                    const count = container.children.length
                    const newElement = document.createElement('div')
                    newElement.className = 'tooltip'
                    newElement.style.height = '120px'
                    newElement.style.position = 'relative'
                    newElement.innerHTML = `
                    <div style="position:absolute;top:5px;left:5px;display:flex;align-items:center;gap:5px;">
                        <div style="background-color:#fffffa;padding: 0 5px;border-radius:5px;">${count}</div>
                        <button class="btn" style="background-color:#dd0000;padding: 3px;border-radius:5px;font-size:12px;" onclick="deleteSocial(this, '/api/delete-socials/${data.payload.encrypted_id}')">🗑️</button>
                    </div>
                    <img src="${data.payload.image}" alt="" style="width: auto; height: 100px;">
                    <span class="tooltiptext">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>:</th>
                                    <td style="text-align: start;">${data.payload.name}</td>
                                </tr>
                                <tr>
                                    <th>URL</th>
                                    <th>:</th>
                                    <td style="text-align: start;">${data.payload.url}</td>
                                </tr>
                            </tbody>
                        </table>
                    </span>
                    `
                    btn.before(newElement)
                    newElement.append()
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const deleteSocial = async (e, route) => {
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
                    const items = [...document.getElementById('social-item-container').children]
                    items.forEach((e, i) => {
                        if (i+1 < items.length) e.children[0].children[0].innerHTML = `${i+1}`
                    })
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const toggleAddSocial = (state) => {
            const form = document.getElementById('add-social-form')
            form.style.display = state ? 'flex' : 'none'
        }
        const previewImageSocial = (e) => {
            const preview = document.getElementById('preview-add-social')
            const file = e.files[0]
            if (file) {
                const url = URL.createObjectURL(file)
                preview.src = url
                preview.style.display = ''
            }
        }
        
        const toggleAddQuickLink = (state) => {
            const form = document.getElementById('add-quick-link-form')
            form.style.display = state ? 'flex' : 'none'
        }
        const addQuickLink = async () => {
            const form = document.getElementById('add-quick-link-form')
            const inputs = [...form.getElementsByTagName('input')]
            try {
                const formData = {};
                inputs.forEach(e => {
                    if (e.value == null || e.value == '') {
                        alert('Form belum lengkap');
                        return;
                    } else formData[e.name] = e.value
                })
                const response = await fetch('/api/add-quick-link', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                const data = await response.json()
                if (data?.payload) {
                    refreshIframe()
                    inputs.forEach(e => {e.value = ''})
                    const container = document.getElementById("quick-link-item-container")
                    const btn = document.getElementById("add-quick-link-btn").parentElement.parentElement
                    const count = container.children.length
                    const newElement = document.createElement('tr')
                    newElement.innerHTML = `
                    <td>
                        <button class="btn" style="background-color:#dd0000;padding: 3px 6px;border-radius:5px;font-size:12px;color:white;" onclick="deleteQuickLink(this, '/api/delete-quick-link/${data.payload.encrypted_id}')">x</button>
                    </td>
                    <td>${ data.payload.name }</td>
                    <td>${ data.payload.url }</td>
                    `
                    btn.before(newElement)
                    newElement.append()
                }
            } catch (err) {
                console.error(err.message)
            }
        }
        const updateQuickLink = async (btn) => {
            const row = btn.closest('tr');
            const nameInput = row.querySelector('input[data-field="name"]');
            const urlInput = row.querySelector('input[data-field="url"]');

            const payload = {
                name: nameInput.value.trim(),
                url: urlInput.value.trim()
            };

            if (!payload.name || !payload.url) {
                alert('Name dan URL tidak boleh kosong');
                return;
            }

            try {
                const response = await fetch(`/api/update-quick-link/${nameInput.dataset.id}`, {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();
                if (data?.payload) {
                    alert('Quick link berhasil diupdate');
                    refreshIframe();
                } else {
                    alert('Gagal update quick link');
                }
            } catch (err) {
                console.error(err.message);
            }
        };

        const deleteQuickLink = async (e, route) => {
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
        
        const toggleAddResource = (state) => {
            const form = document.getElementById('add-resource-form')
            form.style.display = state ? 'flex' : 'none'
        }
        const addResource = async () => {
            const form = document.getElementById('add-resource-form')
            const inputs = [...form.getElementsByTagName('input')]
            try {
                const formData = {};
                inputs.forEach(e => {
                    if (e.value == null || e.value == '') {
                        alert('Form belum lengkap');
                        return;
                    } else formData[e.name] = e.value
                })
                const response = await fetch('/api/add-resource', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${apiToken}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                const data = await response.json()
                if (data?.payload) {
                    refreshIframe()
                    inputs.forEach(e => {e.value = ''})
                    const container = document.getElementById("resource-item-container")
                    const btn = document.getElementById("add-resource-btn").parentElement.parentElement
                    const count = container.children.length
                    const newElement = document.createElement('tr')
                    newElement.innerHTML = `
                    <td>
                        <button class="btn" style="background-color:#dd0000;padding: 3px 6px;border-radius:5px;font-size:12px;color:white;" onclick="deleteResource(this, '/api/delete-resource/${data.payload.encrypted_id}')">x</button>
                    </td>
                    <td>${ data.payload.name }</td>
                    <td>${ data.payload.url }</td>
                    `
                    btn.before(newElement)
                    newElement.append()
                }
            } catch (err) {
                console.error(err.message)
            }
        }

        const updateResource = async (btn) => {
        const row = btn.closest('tr');
        const nameInput = row.querySelector('input[data-field="name"]');
        const urlInput = row.querySelector('input[data-field="url"]');

        const payload = {
            name: nameInput.value.trim(),
            url: urlInput.value.trim()
        };

        if (!payload.name || !payload.url) {
            alert('Name dan URL tidak boleh kosong');
            return;
        }

        try {
            const response = await fetch(`/api/update-resource/${nameInput.dataset.id}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${apiToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            const data = await response.json();
            if (data?.payload) {
                alert('Resource berhasil diupdate');
                refreshIframe();
            } else {
                alert('Gagal update Resource');
            }
        } catch (err) {
            console.error(err.message);
        }
    };

        const deleteResource = async (e, route) => {
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

        load()
    </script>
    <script>
        var modal = document.getElementById("carousels-modal")
        var btn = document.getElementById("carousels-btn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = () => {
            modal.style.display = "block"
            document.getElementById('add-carousel-form').style.display = 'none'
        }
        span.onclick = () => modal.style.display = "none"

        var modalReview = document.getElementById("modalAddReview");
        var btnAddReview = document.getElementById("btnAddReview");
        var spanReview = modalReview.getElementsByClassName("close")[0];
        btnAddReview.onclick = () => modalReview.style.display = "block"
        spanReview.onclick = () => modalReview.style.display = "none"

        var modalStep = document.getElementById("modalAddStep");
        var btnAddStep = document.getElementById("btnAddStep");
        var spanStep = modalStep.getElementsByClassName("close")[0];
        btnAddStep.onclick = () => modalStep.style.display = "block"
        spanStep.onclick = () => modalStep.style.display = "none"
        
        var modalPartner = document.getElementById("partners-modal")
        var btnPartner = document.getElementById("partners-btn");
        var spanPartner = document.getElementById("close-partners-modal");
        btnPartner.onclick = () => {
            modalPartner.style.display = "block"
            document.getElementById('add-partner-form').style.display = 'none'
        }
        spanPartner.onclick = () => modalPartner.style.display = "none"
        
        var modalSocial = document.getElementById("socials-modal")
        var btnSocial = document.getElementById("socials-btn");
        var spanSocial = document.getElementById("close-socials-modal");
        btnSocial.onclick = () => {
            modalSocial.style.display = "block"
            document.getElementById('add-social-form').style.display = 'none'
        }
        spanSocial.onclick = () => modalSocial.style.display = "none"
        
        var modalQuickLink = document.getElementById("quick-link-modal")
        var btnQuickLink = document.getElementById("quick-link-btn");
        var spanQuickLink = document.getElementById("close-quick-link-modal");
        btnQuickLink.onclick = () => {
            modalQuickLink.style.display = "block"
            document.getElementById('add-quick-link-form').style.display = 'none'
        }
        spanQuickLink.onclick = () => modalQuickLink.style.display = "none"
        
        var modalResource = document.getElementById("resource-modal")
        var btnResource = document.getElementById("resource-btn");
        var spanResource = document.getElementById("close-resource-modal");
        btnResource.onclick = () => {
            modalResource.style.display = "block"
            document.getElementById('add-resource-form').style.display = 'none'
        }
        spanResource.onclick = () => modalResource.style.display = "none"

        window.onclick = function(event) {
            if (event.target == modal) modal.style.display = "none";
            if (event.target == modalReview) modalReview.style.display = "none";
            if (event.target == modalStep) modalStep.style.display = "none";
            if (event.target == modalPartner) modalPartner.style.display = "none";
            if (event.target == modalSocial) modalSocial.style.display = "none";
            if (event.target == modalQuickLink) modalQuickLink.style.display = "none";
            if (event.target == modalResource) modalResource.style.display = "none";
        }
    </script>

</body>
</html>