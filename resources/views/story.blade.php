<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story - Jherom & Nicole</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hina+Mincho&family=Imperial+Script&family=Italianno&family=Luxurious+Script&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
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

        /* Loading Overlay */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
        }

        .loading-overlay.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        .loading-content {
            text-align: center;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #000;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            font-size: clamp(14px, 3vw, 18px);
            color: #000;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Header Banner */
        .header-banner {
            width: 100%;
            height: clamp(200px, 40vw, 400px);
            background-image: url("{{ asset('res/sample.jpg') }}");
            background-size: cover;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: overlay;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .header-content {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .header-title {
            font-family: "Italianno", cursive;
            font-size: clamp(40px, 10vw, 90px);
            margin-bottom: 10px;
            line-height: 1;
        }

        .header-subtitle {
            font-size: clamp(14px, 3vw, 22px);
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* Main Container */
        .story-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: clamp(40px, 8vw, 80px) clamp(20px, 4vw, 40px);
        }

        /* Story Section */
        .story-section {
            margin-bottom: clamp(40px, 8vw, 60px);
            text-align: center;
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .story-title {
            font-family: "Italianno", cursive;
            font-size: clamp(35px, 8vw, 65px);
            margin-bottom: clamp(15px, 3vw, 25px);
            color: #000;
            line-height: 1;
        }

        .story-text {
            font-size: clamp(13px, 2.8vw, 16px);
            line-height: 1.8;
            color: #555;
            max-width: 700px;
            margin: 0 auto clamp(30px, 6vw, 50px);
        }

        /* Polaroid Gallery */
        .polaroid-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: clamp(25px, 5vw, 40px);
            margin: clamp(30px, 6vw, 50px) 0;
            padding: 0 clamp(10px, 2vw, 20px);
        }

        .polaroid {
            background: linear-gradient(to right, #1a1a1a, #434343);
            padding: 10px;
            padding-bottom: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            animation: fadeIn 1s ease;
            position: relative;
            border-radius: 2px;
        }

        /* Realistic tape effect with torn left/right edges */
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

        /* Second tape piece for some polaroids */
        .polaroid::after {
            content: '';
            position: absolute;
            top: var(--tape2-top, -10px);
            left: var(--tape2-left, 70%);
            transform: translateX(-50%) rotate(var(--tape2-rotation, 5deg));
            width: var(--tape2-width, 0px);
            height: 23px;
            background: rgb(235 229 206 / 90%);
            border-top: 1px solid rgba(210, 180, 140, 0.3);
            border-bottom: 1px solid rgba(210, 180, 140, 0.3);
            box-shadow: 
                0 1px 3px rgba(0, 0, 0, 0.1),
                inset 0 0 10px rgba(255, 255, 255, 0.5);
            z-index: 10;
            clip-path: polygon(
                3% 0%, 6% 25%, 4% 50%, 5% 75%, 3% 100%,
                97% 100%, 95% 75%, 96% 50%, 94% 25%, 97% 0%
            );
        }

        /* Random tape positions - corners and center */
        .polaroid:nth-child(1) { 
            --tape-width: 45px;
            --tape-rotation: -13deg;
            --tape-left: 20%;
            --tape-top: -10px;
        }
        .polaroid:nth-child(2) { 
            --tape-width: 55px;
            --tape-rotation: 25deg;
            --tape-left: 95%;
            --tape-top: -8px;
            --tape2-width: 42px;
            --tape2-left: 3%;
            --tape2-rotation: -37deg;
            --tape2-top: -8px;
        }
        .polaroid:nth-child(3) { 
            --tape-width: 81px;
            --tape-rotation: -3deg;
            --tape-left: 50%;
            --tape-top: -13px;
        }
        .polaroid:nth-child(4) { 
            --tape-width: 52px;
            --tape-rotation: 7deg;
            --tape-left: 25%;
            --tape-top: -13px;
            --tape2-width: 46px;
            --tape2-left: 78%;
            --tape2-rotation: -4deg;
            --tape2-top: -14px;
        }
        .polaroid:nth-child(5) { 
            --tape-width: 53px;
            --tape-rotation: 38deg;
            --tape-left: 98%;
            --tape-top: -7px;
            --tape2-width: 55px;
            --tape2-left: 2%;
            --tape2-rotation: 23deg;
            --tape2-top: 224px;
        }
        .polaroid:nth-child(6) { 
            --tape-width: 55px;
            --tape-rotation: -5deg;
            --tape-left: 75%;
            --tape-top: -13px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            transform: rotate(0deg) scale(1.3);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5);
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
        }

        /* Scattered Polaroid Layout */
        .scattered-gallery {
            position: relative;
            min-height: 800px;
            margin: clamp(40px, 8vw, 80px) 0;
        }

        .polaroid-scattered {
            position: absolute;
            background: linear-gradient(to right, #1a1a1a, #434343);;
            padding: 12px;
            padding-bottom: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease, z-index 0.3s ease;
            animation: fadeIn 1.2s ease;
        }

        .polaroid-scattered:hover {
            transform: rotate(0deg) scale(1.3);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        .polaroid-scattered img {
            width: 100%;
            height: auto;
            aspect-ratio: 3/4;
            object-fit: cover;
            filter: drop-shadow(0 3px 8px rgba(0, 0, 0, 0.5));
        }

        /* Specific positions for scattered polaroids */
        .p1 {
            width: clamp(160px, 28vw, 280px);
            left: 5%;
            top: 0;
            transform: rotate(-8deg);
            z-index: 5;
        }

        .p2 {
            width: clamp(170px, 30vw, 300px);
            left: 35%;
            top: 50px;
            transform: rotate(5deg);
            z-index: 6;
        }

        .p3 {
            width: clamp(160px, 28vw, 280px);
            right: 5%;
            top: 20px;
            transform: rotate(12deg);
            z-index: 6;
        }

        .p4 {
            width: clamp(170px, 30vw, 290px);
            left: 5%;
            top: clamp(280px, 50vw, 450px);
            transform: rotate(6deg);
            z-index: 3;
        }

        .p5 {
            width: clamp(165px, 29vw, 285px);
            right: 5%;
            top: clamp(300px, 52vw, 480px);
            transform: rotate(-10deg);
            z-index: 4;
        }

        .p6 {
            width: clamp(160px, 28vw, 280px);
            left: 50%;
            transform: translateX(-50%) rotate(3deg);
            top: clamp(240px, 45vw, 420px);
            z-index: 7;
        }

        /* Instagram-style Collage */
        .collage-section {
            margin: clamp(50px, 10vw, 100px) 0;
            animation: fadeInUp 0.8s ease;
        }

        .collage-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: clamp(8px, 1.5vw, 15px);
            max-width: 1000px;
            margin: 0 auto;
        }

        .collage-item {
            position: relative;
            overflow: hidden;
            aspect-ratio: 3/4;
            cursor: pointer;
            transition: transform 0.3s ease;
            background: #f0f0f0;
        }

        .collage-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .collage-item:hover img {
            transform: scale(1.5);
            filter: brightness(0.9);
        }

        .collage-item:hover {
            transform: scale(1.02);
            z-index: 5;
        }

        /* Large featured image (spans 2 columns on desktop) */
        .collage-item.featured {
            grid-column: span 2;
            grid-row: span 2;
            aspect-ratio: 3/4;
        }

        /* Footer Banner */
        .footer-banner {
            width: 100%;
            height: clamp(200px, 40vw, 350px);
            background-image: url("{{ asset('res/sample.jpg') }}");
            background-size: cover;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.4);
            background-blend-mode: overlay;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: clamp(60px, 12vw, 120px);
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
        }

        .footer-content {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .footer-text {
            font-size: clamp(14px, 3vw, 20px);
            text-transform: uppercase;
            margin-bottom: 15px;
            letter-spacing: 2px;
        }

        .footer-names {
            font-family: "Luxurious Script", cursive;
            font-size: clamp(35px, 8vw, 70px);
            margin-bottom: 10px;
            line-height: 1;
        }

        .footer-date {
            font-size: clamp(16px, 3.5vw, 24px);
            letter-spacing: 3px;
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .polaroid-gallery {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .scattered-gallery {
                min-height: 560px;
            }

            .collage-container {
                grid-template-columns: repeat(2, 1fr);
                gap: clamp(5px, 1vw, 8px);
            }

            .collage-item.featured {
                grid-column: span 2;
                grid-row: span 1;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .polaroid-gallery {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Bottom Banner */
        .bottom-banner {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            color: white;
            padding: 20px;
            text-align: center;
            background-image: url("{{ asset('res/sample.jpg') }}");
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            animation: fadeIn 1.5s ease;
            box-shadow: 0px -3px 20px 0px rgba(0, 0, 0, 0.5);
        }

        .bottom-banner .message {
            text-transform: uppercase;
            font-size: clamp(11px, 2.8vw, 16px);
            margin-bottom: 10px;
        }

        .bottom-banner .message .script {
            font-size: clamp(18px, 4.5vw, 28px);
        }

        .couple-names {
            text-transform: uppercase;
        }

        .bottom-banner .couple-names {
            font-size: clamp(16px, 4.2vw, 28px);
            text-transform: uppercase;
            margin: 10px 0;
        }

        .bottom-banner .date {
            font-size: clamp(11px, 3.1vw, 20px);
        }

        .s-text1 {
            font-family: "Luxurious Script", cursive;
            font-size: clamp(34px, 8vw, 60px);
        }

        @media (min-width: 1024px) {
            .scattered-gallery {
                min-height: 1000px;
            }
        }

        /* Lightbox Overlay */
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
            transition: transform 0.3s ease;
        }

        .lightbox img:hover {
            transform: scale(1.02);
        }

        .lightbox-close {
            position: absolute;
            top: 25px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
            transition: 0.3s;
            font-family: Arial, sans-serif;
        }

        .lightbox-close:hover {
            color: #ccc;
        }

    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner"></div>
            <div class="loading-text">Loading Our Story...</div>
        </div>
    </div>

    <!-- Back Button -->
    <a href="{{ route('landing') }}" class="back-button">←</a>

    <!-- Header Banner -->
    <div class="header-banner">
        <div class="header-content">
            <h1 class="header-title">Our Prenup Photos</h1>
            <div class="couple-names">
                <span class="s-text1">J</span>herom 
                <span style="text-transform:lowercase; font-size: 0.6em;">and</span> 
                <span class="s-text1">N</span>icole
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="story-container">
        <!-- How We Met -->
        <div class="story-section">
            <h2 class="story-title">A Paradise Made for Two</h2>
            <p class="story-text">
               Before the vows and the celebration, there’s this moment—just the two of us, pausing to take it all in.
               These photos reflect our story as it is now: comfortable, grounded, and full of quiet joy.
               No grand gestures, no perfect poses—just the two of us choosing each other in the most genuine way.
               We’re capturing this chapter not because it’s flawless, but because it’s real.
            </p>
        </div>

        <!-- Grid Gallery 1 -->
        <div class="polaroid-gallery">
            <div class="polaroid">
                <img src="{{ asset('res/4.webp') }}" alt="Our first meeting">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid">
                <img src="{{ asset('res/5.webp') }}" alt="First date">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid">
                <img src="{{ asset('res/6.webp') }}" alt="Early days">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid">
                <img src="{{ asset('res/7.webp') }}" alt="Happy moments">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid">
                <img src="{{ asset('res/8.webp') }}" alt="Getting to know">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid">
                <img src="{{ asset('res/9.webp') }}" alt="First adventure">
                <div class="polaroid-caption"><br></div>
            </div>
        </div>

        <!-- First Year -->
        <div class="story-section">
            <h2 class="story-title">Love Reaching New Heights</h2>
            <p class="story-text">
                There was a stillness on that mountain that made everything feel softer—like the world paused long enough for us to take it in.
                Surrounded by open sky and endless green, we felt present in a way we hadn’t in a long time.
                These photos remind us of that moment: calm, connected, and certain about the life we’re building together.
                A quiet place, just the two of us, with forever somehow feeling closer than before.
            </p>
        </div>

        <!-- Instagram-Style Collage -->
        <div class="collage-section">
            <div class="collage-container">
                <div class="collage-item featured">
                    <img src="{{ asset('res/10.webp') }}" alt="Featured Memory">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/11.webp') }}" alt="Memory 2">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/12.webp') }}" alt="Memory 3">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/13.webp') }}" alt="Memory 4">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/14.webp') }}" alt="Memory 5">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/15.webp') }}" alt="Memory 7">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/16.webp') }}" alt="Memory 8">
                </div>
                <div class="collage-item featured">
                    <img src="{{ asset('res/18.webp') }}" alt="Featured Memory 2">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/17.webp') }}" alt="Memory 9">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/19.webp') }}" alt="Memory 10">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/20.webp') }}" alt="Memory 11">
                </div>
                <div class="collage-item">
                    <img src="{{ asset('res/21.webp') }}" alt="Memory 12">
                </div>
            </div>
        </div>

        <!-- Looking Forward -->
        <div class="story-section">
            <h2 class="story-title">Where Forever Begins</h2>
            <p class="story-text">
                As we stand on the threshold of forever, we carry with us the memories, lessons, and laughter that have defined our journey so far.
                Our love story is still unfolding, and we are thrilled to share this moment with all of you who have supported, encouraged, and celebrated us along the way.
                Thank you for being part of our lives, and for helping us step into this new chapter with hope, joy, and hearts wide open.
                The adventure has only just begun, and we can’t wait to see where it takes us together.
            </p>
        </div>

        <!-- Scattered Gallery -->
        <div class="scattered-gallery">
            <div class="polaroid-scattered p1">
                <img src="{{ asset('res/22.webp') }}" alt="Adventure together">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid-scattered p2">
                <img src="{{ asset('res/23.webp') }}" alt="Travel memories">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid-scattered p3">
                <img src="{{ asset('res/24.webp') }}" alt="Celebrations">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid-scattered p4">
                <img src="{{ asset('res/25.webp') }}" alt="Quiet moments">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid-scattered p5">
                <img src="{{ asset('res/27.webp') }}" alt="Love grows">
                <div class="polaroid-caption"><br></div>
            </div>
            <div class="polaroid-scattered p6">
                <img src="{{ asset('res/26.webp') }}" alt="Forever love">
                <div class="polaroid-caption"><br></div>
            </div>
        </div>

        
    </div>

    <!-- Bottom Banner -->
    <div class="bottom-banner">
        <div class="message">
            Together Forever
        </div>
        <div class="couple-names">
            <span class="s-text1">J</span>herom 
            <span style="text-transform:lowercase; font-size: 0.6em;">and</span> 
            <span class="s-text1">N</span>icole
        </div>
        <div class="date">02.22.26</div>
    </div>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="lightbox-close" id="lightboxClose">&times;</span>
        <img src="" alt="Expanded Image">
    </div>

    <script>
        // Loading delay
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loadingOverlay').classList.add('fade-out');
                setTimeout(function() {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }, 500);
            }, 500);
        });

        // Animate sections on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.story-section, .polaroid-gallery, .scattered-gallery').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });

        // Stagger polaroid animations in galleries
        document.querySelectorAll('.polaroid').forEach((polaroid, index) => {
            polaroid.style.animationDelay = `${index * 0.1}s`;
        });

        document.querySelectorAll('.polaroid-scattered').forEach((polaroid, index) => {
            polaroid.style.animationDelay = `${index * 0.15}s`;
        });

        // Collage click to enlarge
        const collageItems = document.querySelectorAll('.collage-item img');
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = lightbox.querySelector('img');
        const lightboxClose = document.getElementById('lightboxClose');

        collageItems.forEach(item => {
            item.addEventListener('click', () => {
                lightboxImg.src = item.src;
                lightbox.classList.add('active');
            });
        });

        lightboxClose.addEventListener('click', () => {
            lightbox.classList.remove('active');
        });

        // Close when clicking outside the image
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });
    </script>
</body>
</html>