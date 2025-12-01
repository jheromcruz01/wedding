<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Gallery - Jherom & Nicole</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Luxurious+Script&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Tinos", serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            color: #333;
            overflow-x: hidden;
        }

        /* Header Banner */
        .header-banner {
            width: 100%;
            height: clamp(180px, 35vw, 320px);
            background-image: url("{{ asset('res/sample.jpg') }}");
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .header-content {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .header-title {
            font-family: "Italianno", cursive;
            font-size: clamp(40px, 9vw, 75px);
            margin-bottom: 8px;
            line-height: 1;
        }

        .header-subtitle {
            font-size: clamp(13px, 2.8vw, 18px);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Upload Section */
        .upload-section {
            max-width: 800px;
            margin: clamp(30px, 6vw, 50px) auto;
            padding: 0 clamp(15px, 3vw, 25px);
            text-align: center;
        }

        .upload-message {
            font-size: clamp(14px, 2.8vw, 17px);
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .upload-card {
            background: #fff;
            padding: clamp(20px, 4vw, 30px);
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .file-input-wrapper {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .file-input {
            width: 100%;
            padding: 12px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            background: #fafafa;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: "Tinos", serif;
            font-size: 14px;
        }

        .file-input:hover {
            border-color: #000;
            background: #f0f0f0;
        }

        .upload-btn {
            background: #000;
            color: #fff;
            padding: 12px 35px;
            border: none;
            border-radius: 8px;
            font-family: "Tinos", serif;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .upload-btn:hover {
            background: #333;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 6px;
            font-size: 14px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Gallery Grid */
        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: clamp(20px, 4vw, 40px) clamp(15px, 3vw, 25px);
        }

        .gallery-title {
            font-family: "Italianno", cursive;
            font-size: clamp(32px, 7vw, 55px);
            text-align: center;
            margin-bottom: clamp(30px, 6vw, 50px);
            color: #000;
        }

        .polaroid-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: clamp(25px, 5vw, 40px);
            padding: 0 clamp(10px, 2vw, 20px);
        }

        .polaroid {
            background: linear-gradient(to right, #1a1a1a, #434343);
            padding: 10px;
            padding-bottom: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            animation: fadeIn 0.6s ease;
            position: relative;
            border-radius: 2px;
        }

        /* Realistic tape effect */
        .polaroid::before {
            content: '';
            position: absolute;
            top: var(--tape-top, -10px);
            left: var(--tape-left, 50%);
            transform: translateX(-50%) rotate(var(--tape-rotation, 0deg));
            width: var(--tape-width, 50px);
            height: 23px;
            background: rgb(235 229 206 / 90%);
            border-top: 1px solid rgba(210, 180, 140, 0.3);
            border-bottom: 1px solid rgba(210, 180, 140, 0.3);
            box-shadow: 
                0 1px 3px rgba(0, 0, 0, 0.1),
                inset 0 0 10px rgba(255, 255, 255, 0.5);
            z-index: 10;
            clip-path: polygon(
                2% 0%, 5% 20%, 3% 40%, 6% 60%, 4% 80%, 2% 100%,
                98% 100%, 96% 80%, 97% 60%, 95% 40%, 96% 20%, 98% 0%
            );
        }

        /* Random tape positions */
        .polaroid:nth-child(6n+1) { 
            --tape-width: 45px;
            --tape-rotation: -13deg;
            --tape-left: 20%;
        }
        .polaroid:nth-child(6n+2) { 
            --tape-width: 55px;
            --tape-rotation: 25deg;
            --tape-left: 85%;
        }
        .polaroid:nth-child(6n+3) { 
            --tape-width: 60px;
            --tape-rotation: -3deg;
            --tape-left: 50%;
        }
        .polaroid:nth-child(6n+4) { 
            --tape-width: 52px;
            --tape-rotation: 7deg;
            --tape-left: 25%;
        }
        .polaroid:nth-child(6n+5) { 
            --tape-width: 53px;
            --tape-rotation: 18deg;
            --tape-left: 75%;
        }
        .polaroid:nth-child(6n) { 
            --tape-width: 55px;
            --tape-rotation: -5deg;
            --tape-left: 65%;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .polaroid:nth-child(odd) {
            transform: rotate(-3deg);
        }

        .polaroid:nth-child(even) {
            transform: rotate(3deg);
        }

        .polaroid:nth-child(3n) {
            transform: rotate(-2deg);
        }

        .polaroid:hover {
            transform: rotate(0deg) scale(1.15);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
            z-index: 10;
        }

        .polaroid img {
            width: 100%;
            height: auto;
            aspect-ratio: 3/4;
            object-fit: cover;
            display: block;
            filter: drop-shadow(0 3px 8px rgba(0, 0, 0, 0.5));
        }

        .polaroid-caption {
            text-align: center;
            font-size: clamp(11px, 2.3vw, 13px);
            margin-top: 15px;
            color: #fff;
            font-style: italic;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .lightbox.active {
            opacity: 1;
            pointer-events: all;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
            border: 5px solid #fff;
            box-shadow: 0 0 25px rgba(255,255,255,0.3);
            border-radius: 8px;
        }

        .lightbox-close {
            position: absolute;
            top: 25px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
            transition: 0.3s;
        }

        .lightbox-close:hover {
            color: #ccc;
        }

        /* Footer */
        .footer-banner {
            width: 100%;
            background-image: url("{{ asset('res/sample.jpg') }}");
            background-size: cover;
            background-position: center;
            color: white;
            padding: clamp(30px, 6vw, 50px) 20px;
            text-align: center;
            margin-top: clamp(50px, 10vw, 80px);
            box-shadow: 0px -3px 20px 0px rgba(0, 0, 0, 0.3);
        }

        .footer-text {
            font-size: clamp(14px, 3vw, 18px);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .couple-names {
            font-size: clamp(16px, 4vw, 26px);
            margin: 10px 0;
        }

        .s-text1 {
            font-family: "Luxurious Script", cursive;
            font-size: clamp(34px, 7vw, 55px);
        }

        .footer-date {
            font-size: clamp(13px, 3vw, 18px);
            letter-spacing: 2px;
        }

        /* Back Button */
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #000;
            color: #fff;
            width: clamp(45px, 10vw, 60px);
            height: clamp(45px, 10vw, 60px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: clamp(20px, 5vw, 28px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .back-button:hover {
            transform: scale(1.1);
            color: #fff;
        }

        @media (max-width: 768px) {
            .polaroid-gallery {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .upload-form {
                gap: 12px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Banner -->
    <div class="header-banner">
        <div class="header-content">
            <h1 class="header-title">Guest Gallery</h1>
            <div class="header-subtitle">Share Your Moments With Us</div>
        </div>
    </div>

    <!-- Upload Section -->
    <div class="upload-section">
        <p class="upload-message">
            Capture and share the magic! Upload your favorite moments from our special day.
        </p>

        <div class="upload-card">
            <form class="upload-form" id="uploadForm">
                <div class="file-input-wrapper">
                    <input type="file" name="photo" accept="image/*" required class="file-input" id="photoInput">
                </div>
                <button type="submit" class="upload-btn">Upload Photo</button>
            </form>
        </div>

        <div id="messageArea"></div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-container">
        <h2 class="gallery-title">Memories From Our Guests</h2>
        
        <div class="polaroid-gallery" id="gallery">
            <!-- Sample photos - replace with your dynamic content -->
            <div class="polaroid">
                <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?w=400" alt="Guest photo 1">
                <div class="polaroid-caption">Beautiful ceremony</div>
            </div>
            <div class="polaroid">
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400" alt="Guest photo 2">
                <div class="polaroid-caption">First dance</div>
            </div>
            <div class="polaroid">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=400" alt="Guest photo 3">
                <div class="polaroid-caption">Reception fun</div>
            </div>
            <div class="polaroid">
                <img src="https://images.unsplash.com/photo-1469371670807-013ccf25f16a?w=400" alt="Guest photo 4">
                <div class="polaroid-caption">Amazing venue</div>
            </div>
            <div class="polaroid">
                <img src="https://images.unsplash.com/photo-1460978812857-470ed1c77af0?w=400" alt="Guest photo 5">
                <div class="polaroid-caption">Special moments</div>
            </div>
            <div class="polaroid">
                <img src="https://images.unsplash.com/photo-1594735135953-04cd6e25a16d?w=400" alt="Guest photo 6">
                <div class="polaroid-caption">Pure joy</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-banner">
        <div class="footer-text">Together Forever</div>
        <div class="couple-names">
            <span class="s-text1">J</span>herom 
            <span style="text-transform:lowercase; font-size: 0.6em;">and</span> 
            <span class="s-text1">N</span>icole
        </div>
        <div class="footer-date">02.22.26</div>
    </div>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="lightbox-close" id="lightboxClose">&times;</span>
        <img src="" alt="Expanded Image">
    </div>

    <script>
        // Lightbox functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = lightbox.querySelector('img');
        const lightboxClose = document.getElementById('lightboxClose');

        document.querySelectorAll('.polaroid img').forEach(img => {
            img.addEventListener('click', () => {
                lightboxImg.src = img.src;
                lightbox.classList.add('active');
            });
        });

        lightboxClose.addEventListener('click', () => {
            lightbox.classList.remove('active');
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });

        // Upload form handling (demo)
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const fileInput = document.getElementById('photoInput');
            const messageArea = document.getElementById('messageArea');
            
            if (fileInput.files.length > 0) {
                // In production, this would actually upload to your server
                messageArea.innerHTML = '<div class="message success">Photo uploaded successfully! Thank you for sharing.</div>';
                fileInput.value = '';
                
                setTimeout(() => {
                    messageArea.innerHTML = '';
                }, 3000);
            } else {
                messageArea.innerHTML = '<div class="message error">Please select a photo to upload.</div>';
            }
        });

        // Stagger polaroid animations
        document.querySelectorAll('.polaroid').forEach((polaroid, index) => {
            polaroid.style.animationDelay = `${index * 0.1}s`;
        });
    </script>
</body>
</html>