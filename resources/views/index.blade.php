<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Invitation - Jherom & Nicole</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hina+Mincho&family=Imperial+Script&family=Italianno&family=Luxurious+Script&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Tinos", serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .envelope-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .envelope {
            position: relative;
            cursor: pointer;
            transition: transform 0.5s ease, filter 0.3s ease;
            animation: gentle-float 3s ease-in-out infinite;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.3));
        }

        @keyframes gentle-float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }

        .envelope:hover {
            transform: scale(1.08) translateY(-10px);
            filter: drop-shadow(0 15px 40px rgba(0, 0, 0, 0.4));
            animation: none;
        }

        .envelope img {
            width: 100%;
            max-width: clamp(300px, 70vw, 600px);
            height: auto;
            display: block;
        }

        /* Click animation */
        .envelope.clicked {
            animation: envelope-open 0.8s ease-out forwards;
        }

        @keyframes envelope-open {
            0% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
            50% {
                transform: scale(1.15) rotate(5deg);
                opacity: 0.8;
            }
            100% {
                transform: scale(0.9) rotate(0deg);
                opacity: 0;
            }
        }

        /* Text overlay */
        .invitation-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            pointer-events: none;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.9;
            }
            50% {
                opacity: 1;
            }
        }

        .invitation-text h1 {
            font-family: "Italianno", cursive;
            font-size: clamp(35px, 8vw, 70px);
            margin-bottom: 10px;
            line-height: 1;
        }

        .invitation-text p {
            font-size: clamp(12px, 3vw, 18px);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-top: 10px;
        }

        .s-text1 {
            font-family: "Luxurious Script", cursive;
            font-size: clamp(40px, 9vw, 80px);
        }

        /* Click instruction */
        .click-instruction {
            position: absolute;
            bottom: clamp(30px, 45vw, 170px);
            left: 50%;
            transform: translateX(-50%);
            font-size: clamp(13px, 3vw, 16px);
            color: #666;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        /* Loading transition overlay */
        .transition-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.5s ease;
        }

        .transition-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .envelope img {
                max-width: 90vw;
            }
        }
    </style>
</head>
<body>
    <div class="envelope-container">
        <div class="envelope" id="envelope">
            <img src="{{ asset('res/envelope.png') }}" alt="Wedding Invitation Envelope">
        </div>
    </div>

    <div class="click-instruction">Click to Open</div>

    <div class="transition-overlay" id="transitionOverlay"></div>

    <script>
        const envelope = document.getElementById('envelope');
        const transitionOverlay = document.getElementById('transitionOverlay');

        envelope.addEventListener('click', function() {
            // Add clicked animation
            envelope.classList.add('clicked');
            
            // Activate transition overlay
            setTimeout(function() {
                transitionOverlay.classList.add('active');
            }, 400);

            // Redirect to landing page
            setTimeout(function() {
                window.location.href = '{{ route('landing') }}';
            }, 300);
        });

        // Prevent double-click issues
        envelope.addEventListener('dblclick', function(e) {
            e.preventDefault();
        });
    </script>
</body>
</html>