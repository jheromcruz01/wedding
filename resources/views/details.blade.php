<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Details - Jherom & Nicole</title>
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
        .details-container {
            max-width: 900px;
            margin: 0 auto;
            padding: clamp(30px, 6vw, 60px) clamp(20px, 4vw, 40px);
        }

        /* Section Styling */
        .detail-section {
            margin-bottom: clamp(40px, 8vw, 80px);
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

        .section-title {
            font-family: "Italianno", cursive;
            font-size: clamp(35px, 8vw, 70px);
            text-align: center;
            margin-bottom: clamp(15px, 3vw, 30px);
            color: #000;
            line-height: 1;
        }

        .section-subtitle {
            font-size: clamp(12px, 2.5vw, 16px);
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: clamp(20px, 4vw, 40px);
            color: #666;
        }

        .section-content {
            text-align: center;
            font-size: clamp(13px, 2.8vw, 16px);
            line-height: 1.8;
            color: #555;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Timeline */
        .timeline {
            max-width: 600px;
            margin: 0 auto;
            justify-self: anchor-center;
        }

        .timeline-item {
            display: flex;
            gap: clamp(15px, 3vw, 25px);
            margin-bottom: clamp(20px, 4vw, 35px);
            align-items: flex-start;
        }

        .timeline-time {
            font-weight: bold;
            font-size: clamp(14px, 3vw, 18px);
            min-width: clamp(80px, 18vw, 120px);
            color: #000;
            text-align: right;
        }

        .timeline-content {
            flex: 1;
            padding-left: clamp(15px, 3vw, 25px);
            border-left: 2px solid #ddd;
        }

        .timeline-title {
            font-weight: bold;
            font-size: clamp(14px, 3vw, 17px);
            margin-bottom: 5px;
            text-transform: uppercase;
            color: #000;
        }

        .timeline-description {
            font-size: clamp(12px, 2.5vw, 14px);
            color: #666;
            line-height: 1.6;
        }

        /* Entourage - Two Column Layout */
        .entourage-section {
            text-align: center;
        }

        .parents-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(15px, 3vw, 30px);
            margin-bottom: clamp(30px, 6vw, 50px);
            text-align: center;
        }

        .parent-column h3 {
            font-weight: bold;
            font-size: clamp(11px, 2.3vw, 13px);
            text-transform: uppercase;
            margin-bottom: clamp(12px, 2.5vw, 15px);
            color: #000;
            letter-spacing: 1.5px;
        }

        .parent-column p {
            text-transform: uppercase;
            font-size: clamp(11px, 2.2vw, 12px);
            color: #333;
            line-height: 1.7;
            margin: 0;
        }

        .sponsors-title {
            font-family: "Italianno", cursive;
            font-size: clamp(30px, 8vw, 70px);
            text-align: center;
            margin: clamp(30px, 6vw, 50px) 0 clamp(25px, 5vw, 35px);
            color: #000;
            line-height: 1;
        }

        .two-column-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: clamp(15px, 3vw, 30px);
            margin-bottom: clamp(25px, 5vw, 40px);
        }

        .three-column-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: clamp(11px, 2vw, 30px);
            margin-bottom: clamp(25px, 5vw, 40px);
        }

        .sponsor-column {
            text-align: center;
        }

        .sponsor-role {
            font-weight: bold;
            font-size: clamp(11px, 2.3vw, 13px);
            text-transform: uppercase;
            margin-bottom: clamp(12px, 2.5vw, 18px);
            color: #000;
            letter-spacing: 1.5px;
        }

        .sponsor-names {
            text-transform: uppercase;
            font-size: clamp(10px, 2.2vw, 12px);
            color: #333;
            line-height: 1.8;
        }

        .single-row-roles {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: clamp(20px, 4vw, 35px);
            margin-top: clamp(25px, 5vw, 40px);
            text-align: center;
        }

        .single-role {
            flex: 0 1 auto;
            min-width: clamp(100px, 20vw, 150px);
        }

        .single-role-title {
            font-weight: bold;
            font-size: clamp(12px, 2.2vw, 12px);
            text-transform: uppercase;
            margin-bottom: clamp(8px, 1.5vw, 12px);
            color: #000;
            letter-spacing: 1.5px;
        }

        .single-role-names {
            font-size: clamp(10px, 2vw, 11px);
            color: #333;
            line-height: 1.7;
        }

        /* Dress Code */
        .dress-code-colors {
            display: flex;
            justify-content: center;
            gap: clamp(10px, 2vw, 20px);
            margin: clamp(20px, 4vw, 30px) 0;
            flex-wrap: wrap;
        }

        .color-circle {
            width: clamp(40px, 8vw, 60px);
            height: clamp(40px, 8vw, 60px);
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 3px solid #fff;
        }

        .color-black { background-color: #000; }

        /* Map Container */
        .map-container {
            width: 100%;
            height: clamp(300px, 60vw, 500px);
            margin: clamp(20px, 4vw, 30px) 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
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
            margin-top: clamp(40px, 8vw, 80px);
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

        .faq-answer {
            font-size: clamp(13px, 2.8vw, 16px);
            text-indent: 20px;
            padding: 5px;
            text-align: justify;
        }

        .faq-question {
            font-size: clamp(16px, 3vw, 17px);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner"></div>
            <div class="loading-text">Loading Details...</div>
        </div>
    </div>

    <!-- Back Button -->
    <a href="{{ route('landing') }}" class="back-button">←</a>

    <!-- Header Banner -->
    <div class="header-banner">
        <div class="header-content">
            <h1 class="header-title">Wedding Details</h1>
            <div class="couple-names">
                <span class="s-text1">J</span>herom 
                <span style="text-transform:lowercase; font-size: 0.6em;">and</span> 
                <span class="s-text1">N</span>icole
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="details-container">
        <!-- Ceremony & Dance -->
        <div class="detail-section">
            <h2 class="section-title">Ceremony of Love</h2>
            <p class="section-content">
                Join us as we exchange our vows and celebrate the beginning of our journey together.
                Your presence will make our day complete as we promise to love and cherish each other forever.
            </p>
        </div>

        <!-- Wedding Timeline -->
        <div class="detail-section">
            <h2 class="section-title">Wedding Timeline</h2>
       
            <p class="section-subtitle">Order of Events</p>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-time">2:30 PM</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Guest Arrival</div>
                        <div class="timeline-description">Please be seated before the ceremony begins</div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">3:00 PM</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Wedding Ceremony</div>
                        <div class="timeline-description">Exchange of vows and rings</div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">4:30 PM</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Cocktail Hour</div>
                        <div class="timeline-description">Refreshments and photo opportunities</div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">5:30 PM</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Reception</div>
                        <div class="timeline-description">Dinner, toasts, and celebration</div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">6:30 PM</div>
                    <div class="timeline-content">
                        <div class="timeline-title">First Dance</div>
                        <div class="timeline-description">Followed by open dancing</div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-time">9:30 PM</div>
                    <div class="timeline-content">
                        <div class="timeline-title">Send-Off</div>
                        <div class="timeline-description">Farewell and thank you</div>
                    </div>
                </div>
                    <p class="section-content">
                    Kindly arrive on time as the ceremony will begin promptly.
                     Our celebration will be held outdoors, so we recommend dressing comfortably and bringing anything you may need to stay cool and comfortable.
                    </p>
            </div>
        </div>

        <!-- Dress Code -->
        <div class="detail-section">
            <h2 class="section-title">Dress Code</h2>
            <p class="section-subtitle">Formal Attire</p>
            <p class="section-content" style="margin-bottom: 20px;">
                We kindly request our guests to dress in formal attire. Please refrain from wearing denim jeans, shorts, shirts and slippers.
                The only color we ask is <strong>black</strong>. No other color please.
            </p>
            <div class="dress-code-colors">
                <div class="color-circle" style="background-color: black;"></div>
            </div>
        </div>

        <!-- Wedding Wish -->
        <div class="detail-section">
            <h2 class="section-title">Wedding Wish</h2>
            <p class="section-content">
                Your presence is the greatest gift of all. However, if you wish to honor us with a gift,
                a monetary contribution towards our future together would be greatly appreciated.
            </p>
        </div>

        <!-- Entourage -->
        <div class="detail-section entourage-section">
            <h2 class="section-title">Entourage</h2>
            
            <!-- Parents -->
            <div class="parents-section">
                <div class="parent-column">
                    <h3>PARENTS OF THE GROOM</h3>
                    <p>
                        Mr. Joseph L. Cruz<br>
                        Mrs. Tina M. Cruz
                    </p>
                </div>
                <div class="parent-column">
                    <h3>PARENTS OF THE BRIDE</h3>
                    <p>
                        Mr. Marlon A. Arizabal<br>
                        Mrs. Fely F. Arizabal
                    </p>
                </div>
            </div>

            <!-- Principal Sponsors -->
            <h3 class="sponsors-title">Principal Sponsors</h3>
            <div class="two-column-grid">
                <div class="sponsor-column">
                    <div class="sponsor-role">NINONG</div>
                    <div class="sponsor-names">
                        PLT General Bernard M. Banac<br>
                        Kapt. Alfie O. Gawaran<br>
                        Mr. Gilbert G. Gawaran<br>
                        Mr. Ronaldo G. Franco<br>
                        Engr. Ronel C. Martin<br>
                        Engr. Bernardo A. Lagazo<br>
                        Mr. Cesar Cobero<br>
                        Mr. Joel Velasco
                    </div>
                </div>
                <div class="sponsor-column">
                    <div class="sponsor-role">NINANG</div>
                    <div class="sponsor-names">
                        MRS. Eloisa S. Banac<br>
                        Mrs. Edith L. Gawaran<br>
                        MRS. Julie N. Alamo<br>
                        MRS. Michelle K. Regpala<br>
                        MRS. Perlita A. Merceder<br>
                        MRS. Karen M. Miranda<br>
                        MRS. Irene M. Garcia<br>
                        MRS. Maureen G. Cuevas
                    </div>
                </div>
            </div>

            <!-- Best Man & Maid of Honor -->
            <div class="two-column-grid">
                <div class="sponsor-column">
                    <div class="sponsor-role">BEST MAN</div>
                    <div class="sponsor-names">Mr. Miguel Pedro Q. Nebalasca</div>
                </div>
                <div class="sponsor-column">
                    <div class="sponsor-role">MAID OF HONOR</div>
                    <div class="sponsor-names">Ms. Angel M. Manalo</div>
                </div>
            </div>

            <!-- Secondary Sponsors -->
            <h3 class="sponsors-title">Secondary Sponsors</h3>

            <!-- Groomsmen & Bridesmaids -->
            <div class="two-column-grid">
                <div class="sponsor-column">
                    <div class="sponsor-role">GROOMSMEN</div>
                    <div class="sponsor-names">
                        Mr. Mark Rhence Domingo<br>
                        Mr. Rodrick I. Saur<br>
                        Mr. Joemarie I. Saur
                    </div>
                </div>
                <div class="sponsor-column">
                    <div class="sponsor-role">BRIDESMAIDS</div>
                    <div class="sponsor-names">
                        Engr. Berlin B. Guerra<br>
                        Ms. Mae Anne L. Urdaneta<br>
                        Ms. Donalyn P. Daquel
                    </div>
                </div>
            </div>

            <!-- Candle, Veil, Cord Sponsors -->
            <div class="three-column-grid">
                <div class="sponsor-column">
                    <div class="sponsor-role">CANDLE<br>SPONSORS</div>
                    <div class="sponsor-names">
                        Mr. Kurt Daryl J. Albaniel<br>
                        Ms. Anne Claudine M. Cruz
                    </div>
                </div>
                <div class="sponsor-column">
                    <div class="sponsor-role">VEIL<br>SPONSORS</div>
                    <div class="sponsor-names">
                        Mr. Aeron M. Abellanosa<br>
                        Ms. Queennie Angeline F. Arizabal
                    </div>
                </div>
                <div class="sponsor-column">
                    <div class="sponsor-role">CORD<br>SPONSORS</div>
                    <div class="sponsor-names">
                        Mr. Ron M. Rivera <br>
                        Ms. Catherine A. Vallecera
                    </div>
                </div>
            </div>

            <!-- Single Row Roles -->
            <div class="single-row-roles">
                <div class="single-role">
                    <div class="single-role-title">RING BEARER</div>
                    <div class="single-role-names">
                        LIAM GABRIELLE A. CRUZ
                    </div>
                </div>
                <div class="single-role">
                    <div class="single-role-title">HERE COMES THE BRIDE</div>
                    <div class="single-role-names">
                        JAYDEN A. CRUZ
                    </div>
                </div>
                <div class="single-role">
                    <div class="single-role-title">COIN BEARER</div>
                    <div class="single-role-names">ALLYSSA MAE M. SORIANO</div>
                </div>
                <div class="single-role">
                    <div class="single-role-title">BIBLE BEARER</div>
                    <div class="single-role-names">CRYRILL JADE C. REGULACION</div>
                </div>
                <div class="single-role">
                    <div class="single-role-title">FLOWER GIRLS</div>
                    <div class="single-role-names">
                        FELICITY A. GOMEZ<br>
                        KAYLA M. MIRANDA<br>
                        LAIL AMARA A. AGPAOA
                    </div>
                </div>
            </div>
        </div>

        <!-- Travel & Accommodations -->
        <div class="detail-section">
            <h2 class="section-title">Travel & Accommodations</h2>
            <p class="section-content">
                For out-of-town guests, we recommend arriving a day early to enjoy the beauty of Tagaytay.
                Several hotels and resorts are available nearby for your convenience. Please let us know if you need assistance with accommodations.
            </p>
        </div>

        <!-- Wedding Venue -->
        <div class="detail-section">
            <h2 class="section-title">Wedding Venue</h2>
            <p class="section-subtitle">Jardin de Milagros</p>
            <p class="section-content" style="margin-bottom: 20px;">
                Tagaytay Road, Silang, Cavite<br>
                A picturesque venue featuring multiple beautiful gardens
            </p>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3868.8459845252996!2d120.98894927573595!3d14.145150788063756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd7b2cf18a29e1%3A0x99da89d2f3aad460!2sJardin%20de%20Milagros%20Events%20Place!5e0!3m2!1sen!2sph!4v1762583648276!5m2!1sen!2sph"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="detail-section">
            <h2 class="section-title">FAQ</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <h3 class="faq-question">Q: What time should we arrive at the venue?</h3>
                    <p class="faq-answer">We recommend arriving at least 30 minutes before the ceremony begins to give you enough time to find your seat and settle in. The ceremony will start promptly, so please don't be late!</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">Q: Can I bring a plus one?</h3>
                    <p class="faq-answer">We've reserved a specific number of seats to honor all our guests, so unfortunately, we're unable to accommodate plus ones. We hope you understand and still join us for our special day!</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">Q: When is the RSVP deadline?</h3>
                    <p class="faq-answer">The RSVP deadline is January 3, 2026. We kindly ask that you RSVP by this date to ensure we can make all the necessary arrangements for your presence.</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">Q: Can I bring my children?</h3>
                    <p class="faq-answer">As much as we adore children, we've planned an adult-only celebration to ensure everyone can fully enjoy the festivities. We appreciate your understanding and look forward to celebrating with you!</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">Q: Is the wedding indoors or outdoors?</h3>
                    <p class="faq-answer">Both the ceremony and reception will be held outdoors in a beautiful garden setting.</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">Q: Will there be enough parking space?</h3>
                    <p class="faq-answer">Yes, there will be ample parking available at our venues.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Bottom Banner -->
    <div class="bottom-banner">
        <div class="message">
            Looking Forward to Celebrating With You
        </div>
        <div class="couple-names">
            <span class="s-text1">J</span>herom 
            <span style="text-transform:lowercase; font-size: 0.6em;">and</span> 
            <span class="s-text1">N</span>icole
        </div>
        <div class="date">02.22.26</div>
    </div>

    <script>
        // Loading delay
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('loadingOverlay').classList.add('fade-out');
                setTimeout(function() {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }, 500);
            }, 500); // 1.5 second delay
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

        document.querySelectorAll('.detail-section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });
    </script>
</body>
</html>