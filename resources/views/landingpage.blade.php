<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jherom & Nicole</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hina+Mincho&family=Imperial+Script&family=Italianno&family=Luxurious+Script&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: "Tinos", serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            overflow-x: hidden;
            margin: 0;
            color: #000;
            min-height: 100vh;
        }
        
        a {
            text-decoration: none;
            color: #000;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-40px) rotate(0deg); }
            to { opacity: 1; transform: translateX(0) rotate(var(--rotation, 0deg)); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(40px) rotate(0deg); }
            to { opacity: 1; transform: translateX(0) rotate(var(--rotation, 0deg)); }
        }

        /* Main Container - Relative positioning for overlapping effect */
        .wedding-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            padding: 0px 40px 40px 40px;
        }

        /* Top Envelope - Centered */
        .top-section {
            width: 100%;
            display: flex;
            justify-content: center;
            animation: fadeIn 1.5s ease;
            position: relative;
            z-index: 5;
            padding-top: 50px;
        }

        .top-image {
            width: 70%;
            max-width: 400px;
            height: auto;
            filter: drop-shadow(0 8px 20px rgba(0,0,0,0.4));
        }

        /* Artistically Arranged Cards */
        .cards-arranged {
            position: relative;
            width: 100%;
            height: 450px;
        }

        /* Left Join Card - Tilted left */
        .left-card {
            position: absolute;
            left: -5%;
            top: 5px;
            width: 70%;
            max-width: 280px;
            height: 280px;
            background-image: url("{{ asset('res/join.png') }}");
            background-size: cover;
            background-position: center;
            background-color: rgba(0, 0, 0, 0.4);
            background-blend-mode: overlay;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-transform: uppercase;
            animation: fadeInLeft 1.5s ease;
            z-index: 3;
            padding: 20px;
        }

        .left-text {
            text-align: center;
            text-shadow: 3px 3px 5px rgb(0 0 0);
        }

        .left-text .small-text {
            font-size: clamp(12px, 2.4vw, 20px);
            margin-bottom: 55px;
            line-height: 1.3;
        }

        .left-text .big-text {
            font-size: clamp(20px, 5vw, 55px);
            line-height: .8;
            margin: 0;
        }

        .s-text {
            font-family: "Imperial Script", cursive;
            font-size: clamp(35px, 7vw, 50px);
        }

        .s-text1 {
            font-family: "Luxurious Script", cursive;
            font-size: clamp(34px, 8vw, 60px);
        }

        .left-text .and {
            font-family: "Imperial Script", cursive;
            text-transform: lowercase;
            font-size: clamp(16px, 3.5vw, 30px);
            display: block;
            margin: 3px 0;
        }

        /* Date Card - Tilted right, overlapping */
        .date-card {
            position: absolute;
            right: -5%;
            top: -30px;
            width: 55%;
            max-width: 260px;
            height: 240px;
            background: #f9f9f9;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
            padding: 30px 20px;
            text-align: center;
            animation: fadeInRight 1.5s ease;
            z-index: 5;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .date-day {
            font-family: "Hina Mincho", serif;
            text-transform: uppercase;
            font-size: clamp(20px, 6vw, 40px);
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .date-month {
            font-family: "Italianno", cursive;
            font-size: clamp(43px, 9vw, 80px);
            margin-bottom: 0;
            line-height: 1;
        }

        .date-year {
            font-family: "Hina Mincho", serif;
            text-transform: uppercase;
            font-size: clamp(20px, 6vw, 40px);
            margin-bottom: 40px;
            line-height: 1.3;
        }

        .date-details {
            text-transform: uppercase;
            font-size: clamp(11px, 2.4vw, 20px);
            line-height: 1.4;
            margin-bottom: 0;
        }

        /* RSVP Card - Bottom left, tilted */
        .rsvp-card {
            position: absolute;
            left: 5%;
            bottom: 6px;
            width: 75%;
            max-width: 340px;
            height: 140px;
            background: #000;
            color: #fff;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6);
            display: flex;
            animation: fadeInLeft 1.8s ease;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .rsvp-card:hover {
            transform: rotate(-4deg) scale(1.03);
        }

        .rsvp-text {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .rsvp-text .rsvp-small {
            font-size: clamp(12px, 2.2vw, 18px);
            margin: 0;
        }

        .rsvp-text .rsvp-script {
            font-size: clamp(23px, 5.5vw, 32px);
            margin: -4px 0;
            line-height: 1;
        }

        .rsvp-photo {
            width: 45%;
        }

        .rsvp-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%) brightness(0.8);
        }

        /* Details Button - Overlapping on right */
        .details-button {
            position: absolute;
            right: -5%;
            bottom: 110px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 50%;
            width: clamp(120px, 25vw, 280px);
            height: clamp(120px, 25vw, 280px);
            cursor: pointer;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1.8s ease;
            z-index: 6;
            transition: transform 0.3s ease;
            text-align-last: center;
        }

        .details-button:hover {
            transform: scale(1.08);
        }

        .details-button .small-text {
            font-size: clamp(11px, 2vw, 17px);
            line-height: 1;
        }

        .details-button .script-text {
            text-transform: uppercase;
            font-size: clamp(18px, 4.5vw, 28px);
            line-height: .7;
            margin-top: 3px;
        }

        /* Polaroid Section - Scattered */
        .polaroid-section {
            position: relative;
            width: 100%;
            height: 310px;
        }

        .polaroid {
            position: absolute;
            background-color: #f9f9f9;
            padding: 10px;
            padding-bottom: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.5);
            cursor: pointer;
            transition: transform 0.3s ease, z-index 0.3s ease;
            animation: fadeIn 1.5s ease-out;
        }

        .polaroid:hover {
            transform: scale(1.08) !important;
            z-index: 20 !important;
        }

        .polaroid img {
            width: 100%;
            height: auto;
            aspect-ratio: 3/4;
            object-fit: cover;
            filter: drop-shadow(0 3px 8px rgba(0,0,0,0.3));
        }

        .polaroid-caption {
            text-align: center;
            font-size: clamp(10px, 2vw, 18px);
            margin-top: 10px;
            font-weight: 500;
        }

        .polaroid-1 {
            width: 40%;
            max-width: 180px;
            left: 0;
            top: 20px;
            transform: rotate(-12deg);
            z-index: 6;
            animation-delay: 0.3s;
        }

        .polaroid-2 {
            width: 42%;
            max-width: 190px;
            left: 28%;
            top: 60px;
            transform: rotate(5deg);
            z-index: 5;
            animation-delay: 0.5s;
        }

        .polaroid-3 {
            width: 40%;
            max-width: 180px;
            right: 0;
            top: 0;
            transform: rotate(9deg);
            z-index: 3;
            animation-delay: 0.7s;
        }

        /* Decorative leaf images */
        .leaf-decoration {
            position: absolute;
            width: 80px;
            opacity: 0.6;
            z-index: 1;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }

        .leaf-left {
            left: -10px;
            top: 250px;
            transform: rotate(-25deg);
        }

        .leaf-right {
            right: -15px;
            top: 300px;
            transform: rotate(35deg) scaleX(-1);
        }

        /* Decorative Flower - Overlapping RSVP and Polaroids */
        .flower-decoration {
            position: absolute;
            left: 39%;
            bottom: -35px;
            z-index: 10;
            animation: fadeIn 2s ease;
        }

        .flower-decoration img {
            width: clamp(200px, 40vw, 500px);
            height: auto;
            filter: drop-shadow(0 6px 15px rgba(0,0,0,0.4));
        }

        /* Countdown - Centered */
        .countdown-container {
            width: 100%;
            text-align: center;
            animation: fadeIn 1.2s ease;
            padding: 0 15px;
        }

        .countdown-title {
            text-transform: uppercase;
            margin: 0 0 25px;
            font-size: clamp(15px, 3.8vw, 24px);
            font-weight: 500;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: clamp(8px, 2.5vw, 20px);
            flex-wrap: wrap;
        }

        .time-box {
            padding: clamp(8px, 2vw, 15px);
        }

        .time-box span {
            font-size: clamp(24px, 6vw, 48px);
            font-weight: 600;
            display: block;
        }

        .time-box p {
            margin: 0;
            font-size: clamp(9px, 2.2vw, 16px);
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        .bottom-banner .couple-names {
            font-size: clamp(16px, 4.2vw, 28px);
            text-transform: uppercase;
            margin: 10px 0;
        }

        .bottom-banner .date {
            font-size: clamp(11px, 3.1vw, 20px);
        }

        /* Tablet and Desktop */
        @media (min-width: 768px) {
            .wedding-container {
                max-width: 660px;
            }
            
            .cards-arranged {
                height: 730px;
            }
            
            .left-card {
                max-width: 360px;
                height: 490px;
            }
            
            .date-card {
                max-width: 340px;
                height: 470px;
                top: -60px;
            }
            
            .rsvp-card {
                max-width: 400px;
                height: 210px;
            }

            .details-button {
                right: 0%;
                bottom: 100px;
            }

            .flower-decoration {
                left: 35%;
                bottom: -115px;
            }
            
            .polaroid-section {
                height: 450px;
            }
            
            .polaroid-1, .polaroid-2, .polaroid-3 {
                max-width: 240px;
            }
        }

        @media (min-width: 1024px) {
            .wedding-container {
                max-width: 900px;
            }

            .top-image {
                max-width: 600px;
            }

            .left-card {
                max-width: 470px;
                height: 600px;
            }

            .date-card {
                max-width: 400px;
                height: 530px;
                top: -90px;
            }

            .cards-arranged {
                height: 880px;
            }

            .rsvp-card {
                max-width: 700px;
                height: 240px;
            }

            .details-button {
                right: 0%;
                bottom: 140px;
            }

            .polaroid-section {
                height: 600px;
            }
            
            .polaroid-1, .polaroid-2, .polaroid-3 {
                max-width: 310px;
            }
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
    </style>
</head>
<body>

    <!-- Back Button -->
    <a href="{{ route('index') }}" class="back-button">←</a>

    <!-- Top Envelope -->
    <div class="top-section">
        <img src="{{ asset('res/envelopeopen.png') }}" alt="Envelope" class="top-image">
    </div>

    <div class="wedding-container">
        <!-- Artistically Arranged Cards -->
        <div class="cards-arranged">
            <!-- Left Join Card -->
            <div class="left-card">
                <div class="left-text">
                    <p class="small-text">PLEASE JOIN US<br>FOR THE<br>WEDDING OF</p>
                    <p class="big-text">
                        <span class="s-text1">J</span>HEROM
                        <span class="and">and</span>
                        <span class="s-text1">N</span>ICOLE
                    </p>
                </div>
            </div>

            <!-- Date Card -->
            <div class="date-card">
                <p class="date-day">22nd</p>
                <p class="date-month"><span>February</span></p>
                <p class="date-year">2026</p>
                <p class="date-details">AT 3PM<br>Jardin de Milagros<br>Tagaytay Rd, Silang, Cavite</p>
            </div>

            <!-- RSVP Card -->
            <a href="{{ route('rsvp') }}" id="rsvpLink">
                <div class="rsvp-card">
                    <div class="rsvp-text">
                        <p class="rsvp-small">KINDLY</p>
                        <p class="rsvp-script"><span class="s-text">R</span>SVP</p>
                        <p class="rsvp-small">HERE</p>
                    </div>
                    <div class="rsvp-photo">
                        <img src="{{ asset('res/rsvp.jpg') }}" alt="Couple Photo">
                    </div>
                </div>
            </a>

            <!-- Details Button -->
            <a href="{{ route('details') }}" class="details-button" id="detailsLink">
                <span class="small-text">CLICK<br>FOR THE</span>
                <span class="script-text"><span class="s-text">D</span>etails</span>
            </a>

            <!-- Decorative Flower - Overlapping -->
            <div class="flower-decoration">
                <img src="{{ asset('res/flower.png') }}" alt="Decorative Flower">
            </div>
        </div>

        <!-- Polaroid Photos Scattered -->
        <div class="polaroid-section">
            <a href="{{ route('story') }}" id="storyLink1">
                <div class="polaroid polaroid-1">
                    <img src="{{ asset('res/1.png') }}" alt="Couple Photo">
                    <div class="polaroid-caption">CLICK FOR</div>
                </div>
            </a>

            <a href="{{ route('story') }}" id="storyLink2">
                <div class="polaroid polaroid-2">
                    <img src="{{ asset('res/3.jpg') }}" alt="Couple Silhouette">
                    <div class="polaroid-caption">OUR PRENUP</div>
                </div>
            </a>

            <a href="{{ route('story') }}" id="storyLink3">
                <div class="polaroid polaroid-3">
                    <img src="{{ asset('res/2.png') }}" alt="Wedding Venue">
                    <div class="polaroid-caption">PHOTOS</div>
                </div>
            </a>
        </div>

        <!-- Countdown Timer -->
        <div class="countdown-container">
            <h2 class="countdown-title">Countdown to Our Wedding Day</h2>
            <div class="countdown">
                <div class="time-box">
                    <span id="days">00</span>
                    <p>Days</p>
                </div>
                <div class="time-box">
                    <span id="hours">00</span>
                    <p>Hours</p>
                </div>
                <div class="time-box">
                    <span id="minutes">00</span>
                    <p>Minutes</p>
                </div>
                <div class="time-box">
                    <span id="seconds">00</span>
                    <p>Seconds</p>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Bottom Banner -->
    <div class="bottom-banner">
        <div class="message">
            WITH Love & Gratitude
        </div>
        <div class="couple-names">
            <span class="s-text1">J</span>herom 
            <span style="text-transform:lowercase; font-size: 0.6em;">and</span> 
            <span class="s-text1">N</span>icole
        </div>
        <div class="date">02.22.26</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const weddingDate = new Date("February 22, 2026 00:00:00").getTime();
        
        const countdown = setInterval(() => {
            const now = new Date().getTime();
            const distance = weddingDate - now;
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById("days").innerText = days;
            document.getElementById("hours").innerText = hours;
            document.getElementById("minutes").innerText = minutes;
            document.getElementById("seconds").innerText = seconds;
            
            if (distance < 0) {
                clearInterval(countdown);
                document.querySelector(".countdown").innerHTML = "<p style='font-size: clamp(16px, 4vw, 24px); font-weight: bold;'>The Big Day Has Arrived! 💍</p>";
            }
        }, 1000);

        document.getElementById('detailsLink').addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation
            const href = this.getAttribute('href');

            // Optional: add a visual effect here before redirecting

            setTimeout(function() {
                window.location.href = href; // redirect after delay
            }, 1500); // delay in milliseconds (500ms = 1.5 seconds)
        });

        document.getElementById('rsvpLink').addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation
            const href = this.getAttribute('href');

            // Optional: add a visual effect here before redirecting

            setTimeout(function() {
                window.location.href = href; // redirect after delay
            }, 1500); // delay in milliseconds (500ms = 1.5 seconds)
        });

        document.getElementById('storyLink1').addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation
            const href = this.getAttribute('href');

            // Optional: add a visual effect here before redirecting

            setTimeout(function() {
                window.location.href = href; // redirect after delay
            }, 1500); // delay in milliseconds (500ms = 1.5 seconds)
        });
        document.getElementById('storyLink2').addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation
            const href = this.getAttribute('href');

            // Optional: add a visual effect here before redirecting

            setTimeout(function() {
                window.location.href = href; // redirect after delay
            }, 1500); // delay in milliseconds (500ms = 1.5 seconds)
        });
        document.getElementById('storyLink3').addEventListener('click', function(e) {
            e.preventDefault(); // prevent immediate navigation
            const href = this.getAttribute('href');

            // Optional: add a visual effect here before redirecting

            setTimeout(function() {
                window.location.href = href; // redirect after delay
            }, 1500); // delay in milliseconds (500ms = 1.5 seconds)
        });
    </script>
</body>
</html>