@extends('Client.EN.layout.master')

@section('content')

    <!-- Page Header Start -->
    <div
            class="container-fluid page-header py-5 mb-5 wow fadeIn"
            data-wow-delay="0.1s"
    >
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <style>
        .timeline-item {
            position: relative;
            width: 50% !important;
            padding: 22px 14px !important;
            opacity: 0;
            transition: all 0.8s ease;
        }
        .timeline-item.left {
            left: 0 !important;
            transform: translateX(-60px);
        }
        .timeline-item.right {
            left: 50% !important;
            transform: translateX(60px);
        }
        .timeline-item.show {
            opacity: 1;
            transform: translateX(0);
        }

        /* باکس نزدیک به خط وسط */
        .timeline-content {
            background: rgba(255,255,255,.9);
            border: 1px solid rgba(0,123,255,.15);
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(0,0,0,.08);
            backdrop-filter: blur(6px);
            min-height: 190px;
            width: 94% !important;
            padding: 18px 20px !important;
        }
        .timeline-item.left  .timeline-content {
            margin-left: auto !important;
            margin-right: 8px !important;
        }
        .timeline-item.right .timeline-content {
            margin-right: auto !important;
            margin-left: 8px !important;
        }

        /* دایره‌ی سال چسبیده به خط */
        .timeline-year {
            position: absolute;
            top: -20px;
            background: #007bff;
            color: #fff;
            font-weight: 700;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px rgba(0,123,255,.3);
            font-size: 15px;
            z-index: 3;
        }
        .timeline-item.left  .timeline-year { right: -32px !important; left: auto !important; }
        .timeline-item.right .timeline-year { left: -32px !important;  right: auto !important; }

        /* واکنش‌گرا */
        @media (max-width:992px){
            .timeline::before{left:20px}
            .timeline-item{width:100%!important;left:0!important;transform:translateY(60px)}
            .timeline-content{width:calc(100% - 80px)!important;margin:0 0 0 60px!imp

    </style>
{{--    <div class="about-container ltr">--}}
{{--        <div class="timeline" id="timelineYearsEn">--}}
{{--            <div class="timeline-item active" data-id="y1989">1989</div>--}}
{{--            <div class="timeline-item" data-id="y1991">1991</div>--}}
{{--            <div class="timeline-item" data-id="y2012">2012</div>--}}
{{--            <div class="timeline-item" data-id="y2021">2021</div>--}}
{{--            <div class="timeline-item" data-id="today">Today</div>--}}
{{--        </div>--}}
{{--        <script--}}
{{--            src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js"--}}
{{--            type="module"--}}
{{--        ></script>--}}

{{--        <dotlottie-wc--}}
{{--            src="https://lottie.host/a7a855a3-5c13-4151-b414-afd871f7cfe2/t1BP0qpnQP.lottie"--}}
{{--            style="width: 800px;height: 800px"--}}
{{--            autoplay--}}
{{--            loop--}}
{{--        ></dotlottie-wc>--}}
{{--        <div class="about-text" id="aboutTextEn">--}}
{{--            <h2>About Us</h2>--}}
{{--            <p>Founded in 1989, Atlasin started its journey in medical gas systems with AirSep.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script>--}}
{{--        const yearDataEn = {--}}
{{--            y1989: "Founded in 1989, Atlasin started its journey in medical gas systems with AirSep.",--}}
{{--            y1991: "Launched a large-scale industrial oxygen system.",--}}
{{--            y2012: "Independently manufactured oxygen systems in multiple capacities.",--}}
{{--            y2021: "Supplied over 150 healthcare centers during the COVID-19 pandemic.",--}}
{{--            today: "Providing full medical gas system services to over 500 hospitals across Iran."--}}
{{--        };--}}
{{--        document.querySelectorAll('#timelineYearsEn .timeline-item').forEach(el => {--}}
{{--            el.addEventListener('click', () => {--}}
{{--                document.querySelector('#timelineYearsEn .active')?.classList.remove('active');--}}
{{--                el.classList.add('active');--}}
{{--                const text = yearDataEn[el.dataset.id];--}}
{{--                document.querySelector("#aboutTextEn p").innerText = text;--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}



{{--    <section class="timeline-section ltr">--}}
{{--        <div class="container-xxl py-5">--}}
{{--            <h2 class="timeline-title">Our History</h2>--}}

{{--            <div class="timeline">--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">1989</div>--}}
{{--                        <h4>Establishment of Atlasin Company</h4>--}}
{{--                        <p>--}}
{{--                            Atlasin introduced PSA oxygen generation technology for the first time in Iran--}}
{{--                            and successfully installed the first oxygen generator that same year.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">1991</div>--}}
{{--                        <h4>First Hospital Oxygen Generator</h4>--}}
{{--                        <p>--}}
{{--                            The first hospital oxygen generator was installed in 1991 and continues to operate efficiently to this day.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">2009</div>--}}
{{--                        <h4>Quality Management System</h4>--}}
{{--                        <p>--}}
{{--                            In 2009, Atlasin implemented ISO9001 Quality Management System and received certification from DQS Germany.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">2011</div>--}}
{{--                        <h4>ISO10002 & ISO13485 Certifications</h4>--}}
{{--                        <p>--}}
{{--                            Implementation of ISO10002 Customer Satisfaction and ISO13485 Medical Device Quality Systems.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">2015</div>--}}
{{--                        <h4>Home Oxygen Concentrators</h4>--}}
{{--                        <p>--}}
{{--                            Launch of home and portable oxygen concentrators for patients and respiratory veterans across Iran.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">2019</div>--}}
{{--                        <h4>COVID-19 Response</h4>--}}
{{--                        <p>--}}
{{--                            Increased production and installation of medical oxygen systems to support hospitals during the pandemic.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">2021</div>--}}
{{--                        <h4>Equipping Medical Centers Nationwide</h4>--}}
{{--                        <p>--}}
{{--                            Atlasin equipped over 150 hospitals and clinics across Iran with advanced medical gas systems.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">Today</div>--}}
{{--                        <h4>Trusted by Over 500 Hospitals</h4>--}}
{{--                        <p>--}}
{{--                            Atlasin now provides after-sales service and technical support to more than 500 active medical facilities nationwide.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <style>--}}
{{--        .ltr {--}}
{{--            direction: ltr;--}}
{{--            font-family: 'Poppins', 'Open Sans', sans-serif;--}}
{{--        }--}}

{{--        /* خط وسط */--}}
{{--        .ltr .timeline::before {--}}
{{--            left: 50%;--}}
{{--        }--}}

{{--        /* دایره‌ها */--}}
{{--        .ltr .timeline-year {--}}
{{--            left: -40px;--}}
{{--            right: auto;--}}
{{--        }--}}

{{--        .ltr .timeline-item[data-aos="left"] .timeline-year {--}}
{{--            right: -40px;--}}
{{--            left: auto;--}}
{{--        }--}}

{{--        /* متن */--}}
{{--        .ltr .timeline-content h4 {--}}
{{--            text-align: left;--}}
{{--        }--}}
{{--        .ltr .timeline-content p {--}}
{{--            text-align: left;--}}
{{--        }--}}

{{--        /* بقیه‌ی استایل‌ها (عرض، ارتفاع، افکت، ریسپانسیو) از همون نسخه فارسی */--}}
{{--        .timeline-section {--}}
{{--            padding: 60px 0;--}}
{{--            background: #fff;--}}
{{--            overflow-x: hidden;--}}
{{--        }--}}

{{--        .timeline-title {--}}
{{--            text-align: center;--}}
{{--            font-size: 28px;--}}
{{--            font-weight: 700;--}}
{{--            color: #222;--}}
{{--            margin-bottom: 60px;--}}
{{--        }--}}

{{--        .timeline {--}}
{{--            position: relative;--}}
{{--            max-width: 1000px;--}}
{{--            margin: 0 auto;--}}
{{--        }--}}

{{--        .timeline-item {--}}
{{--            display: flex;--}}
{{--            justify-content: flex-end;--}}
{{--            padding: 35px 0;--}}
{{--            position: relative;--}}
{{--            opacity: 0;--}}
{{--            transform: translateX(100px);--}}
{{--            transition: all 0.8s ease;--}}
{{--        }--}}

{{--        .timeline-item[data-aos="left"] {--}}
{{--            justify-content: flex-start;--}}
{{--            transform: translateX(-100px);--}}
{{--        }--}}

{{--        .timeline-item.show {--}}
{{--            opacity: 1;--}}
{{--            transform: translateX(0);--}}
{{--        }--}}

{{--        .timeline-content {--}}
{{--            background: #fff;--}}
{{--            border-radius: 16px;--}}
{{--            padding: 20px;--}}
{{--            width: 420px;--}}
{{--            height: 200px;--}}
{{--            box-shadow: 0 3px 18px rgba(0, 0, 0, 0.08);--}}
{{--            border: 1px solid rgba(0, 123, 255, 0.1);--}}
{{--            position: relative;--}}
{{--            transition: all 0.4s ease;--}}
{{--            display: flex;--}}
{{--            flex-direction: column;--}}
{{--            justify-content: center;--}}
{{--            text-align: justify;--}}
{{--        }--}}

{{--        .timeline-content:hover {--}}
{{--            transform: translateY(-4px);--}}
{{--            box-shadow: 0 6px 25px rgba(0, 123, 255, 0.15);--}}
{{--        }--}}

{{--        .timeline-year {--}}
{{--            position: absolute;--}}
{{--            top: -25px;--}}
{{--            background: #007bff;--}}
{{--            color: #fff;--}}
{{--            font-weight: bold;--}}
{{--            font-size: 17px;--}}
{{--            width: 70px;--}}
{{--            height: 70px;--}}
{{--            border-radius: 50%;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);--}}
{{--        }--}}

{{--        .timeline-content h4 {--}}
{{--            font-size: 16px;--}}
{{--            color: #003366;--}}
{{--            margin-bottom: 8px;--}}
{{--        }--}}
{{--        .timeline-content p {--}}
{{--            font-size: 14px;--}}
{{--            color: #444;--}}
{{--            line-height: 1.8;--}}
{{--        }--}}

{{--        /* 📱 Responsive */--}}
{{--        @media (max-width: 992px) {--}}
{{--            .timeline::before {--}}
{{--                left: 20px;--}}
{{--            }--}}
{{--            .timeline-item {--}}
{{--                justify-content: flex-start !important;--}}
{{--                transform: translateY(80px);--}}
{{--            }--}}
{{--            .timeline-content {--}}
{{--                width: calc(100% - 80px);--}}
{{--                height: 200px;--}}
{{--                margin-left: 70px;--}}
{{--            }--}}
{{--            .timeline-year {--}}
{{--                left: 0;--}}
{{--                width: 55px;--}}
{{--                height: 55px;--}}
{{--                font-size: 15px;--}}
{{--            }--}}
{{--        }--}}

{{--        @media (max-width: 576px) {--}}
{{--            .timeline-content {--}}
{{--                width: calc(100% - 60px);--}}
{{--                height: 190px;--}}
{{--                margin-left: 55px;--}}
{{--            }--}}
{{--            .timeline-year {--}}
{{--                width: 45px;--}}
{{--                height: 45px;--}}
{{--                font-size: 13px;--}}
{{--            }--}}
{{--        }--}}

{{--    </style>--}}

{{--    <script>--}}
{{--        window.addEventListener("scroll", () => {--}}
{{--            const items = document.querySelectorAll(".timeline-item");--}}
{{--            const trigger = window.innerHeight * 0.8;--}}

{{--            items.forEach(item => {--}}
{{--                const rect = item.getBoundingClientRect();--}}
{{--                if (rect.top < trigger) {--}}
{{--                    item.classList.add("show");--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

    <div class="container-xxl py-5" style="direction: ltr">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold wow fadeIn" data-wow-delay="0.1s">
                Our History
            </h2>

            <!-- Animated background -->
            <div class="position-relative">
                <dotlottie-wc
                    src="https://lottie.host/bf0c7d87-4f48-4e68-ac53-d3fc1942ee57/OC40NFqGj3.lottie"
                    style="
          position: absolute;
          inset: 0;
          width: 100%;
          height: 100%;
          opacity: 0.12;
          z-index: 0;
        "
                    autoplay
                    loop
                ></dotlottie-wc>

                <!-- Timeline -->
                <div class="timeline position-relative" style="z-index: 2">
                    <!-- 1989 -->
                    <div class="timeline-item left" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">1989</div>
                            <h4>Establishment of Atlasin Company</h4>
                            <p>
                                Atlasin introduced PSA oxygen generation technology for the first
                                time in Iran and successfully installed the first oxygen generator
                                with a capacity of 120 m³/h that same year.
                            </p>
                        </div>
                    </div>

                    <!-- 1991 -->
                    <div class="timeline-item right" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">1991</div>
                            <h4>First Hospital Oxygen Generator</h4>
                            <p>
                                The first hospital oxygen generator was installed in 1991 and
                                continues to operate efficiently to this day.
                            </p>
                        </div>
                    </div>

                    <!-- 2009 -->
                    <div class="timeline-item left" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">2009</div>
                            <h4>Quality Management System</h4>
                            <p>
                                Atlasin implemented ISO9001 Quality Management System and received
                                certification from DQS Germany in 2009.
                            </p>
                        </div>
                    </div>

                    <!-- 2011 -->
                    <div class="timeline-item right" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">2011</div>
                            <h4>ISO10002 & ISO13485 Certifications</h4>
                            <p>
                                Implementation of ISO10002 Customer Satisfaction and ISO13485
                                Medical Device Quality Systems from DQS Germany.
                            </p>
                        </div>
                    </div>

                    <!-- 2015 -->
                    <div class="timeline-item left" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">2015</div>
                            <h4>Home Oxygen Concentrators</h4>
                            <p>
                                Launch of home and portable oxygen concentrators for patients and
                                respiratory veterans across Iran.
                            </p>
                        </div>
                    </div>

                    <!-- 2019 -->
                    <div class="timeline-item right" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">2019</div>
                            <h4>COVID-19 Response</h4>
                            <p>
                                Increased production and installation of oxygen systems to support
                                hospitals during the COVID-19 pandemic.
                            </p>
                        </div>
                    </div>

                    <!-- 2021 -->
                    <div class="timeline-item left" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">2021</div>
                            <h4>Equipping Medical Centers</h4>
                            <p>
                                Atlasin equipped more than 150 hospitals and clinics across Iran
                                with advanced medical gas systems.
                            </p>
                        </div>
                    </div>

                    <!-- Today -->
                    <div class="timeline-item right" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">Today</div>
                            <h4>Trusted by 500+ Hospitals</h4>
                            <p>
                                Atlasin now provides after-sales service and technical support to
                                over 500 healthcare facilities nationwide.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lottie Import -->
    <script
        src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js"
        type="module"
    ></script>

    <style>
        /* خط وسط همان قبلی */
        .timeline{position:relative;max-width:1100px;margin:0 auto;padding:50px 0;}
        .timeline::before{content:"";position:absolute;width:3px;background:#007bff;top:0;bottom:0;left:50%;margin-left:-1.5px;z-index:1}

        /* ستون‌بندی اجباری */
        .timeline-item{position:relative;width:50% !important;padding:22px 14px !important;opacity:0;transition:all .8s ease}
        .timeline-item.left{left:0 !important;transform:translateX(-60px)}
        .timeline-item.right{left:50% !important;transform:translateX(60px)}
        .timeline-item.show{opacity:1;transform:translateX(0)}

        /* باکس‌ها: نزدیکِ خط وسط */
        .timeline-content{
            background:rgba(255,255,255,.9);
            border:1px solid rgba(0,123,255,.15);
            border-radius:14px;box-shadow:0 4px 16px rgba(0,0,0,.08);
            position:relative;backdrop-filter:blur(6px);
            min-height:190px;width:94% !important;   /* عرض بیشتر تا نزدیک خط شود */
            padding:18px 20px !important;
        }

        /* فاصلهٔ واقعی از خط: 8px */
        .timeline-item.left .timeline-content{margin-left:auto !important;margin-right:8px !important;text-align:left}
        .timeline-item.right .timeline-content{margin-right:auto !important;margin-left:8px !important;text-align:left}

        /* دایره سال: چسبیده‌تر به خط */
        .timeline-year{
            position:absolute;top:-20px;background:#007bff;color:#fff;font-weight:700;
            width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;
            box-shadow:0 0 10px rgba(0,123,255,.3);font-size:15px;z-index:3
        }
        .timeline-item.left  .timeline-year{right:-32px !important;left:auto !important}
        .timeline-item.right .timeline-year{left:-32px  !important;right:auto !important}

        /* عنوان/متن (در صورت override شدن) */
        .timeline-content h4{font-size:16px;margin-bottom:8px;color:#003366 !important}
        .timeline-content p{font-size:14px;line-height:1.7;color:#444 !important}

        /* 🟦 واکنش‌گرا: موبایل تک‌ستونه */
        @media (max-width:992px){
            .timeline::before{left:20px}
            .timeline-item{width:100% !important;left:0 !important;transform:translateY(60px)}
            .timeline-content{width:calc(100% - 80px) !important;margin:0 0 0 60px !important}
            .timeline-year{left:0 !important;right:auto !important;width:55px;height:55px;font-size:14px}
        }

    </style>


    <script>
        window.addEventListener("scroll", () => {
            const items = document.querySelectorAll(".timeline-item");
            const trigger = window.innerHeight * 0.8;
            items.forEach((item) => {
                const rect = item.getBoundingClientRect();
                if (rect.top < trigger) item.classList.add("show");
            });
        });
    </script>


    <!-- About Section in English -->
    <style>
        .about-section-en {
            direction: ltr;
            padding: 80px 10%;
            background: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .about-section-en h2 {
            font-size: 34px;
            color: #1b1b1b;
            margin-bottom: 30px;
            text-align: center;
        }

        .about-cards-en {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card-en {
            background: linear-gradient(to bottom right, #0056a1, #4c9be5);
            color: white;
            padding: 30px 25px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .card-en:hover {
            background: linear-gradient(to bottom right, #0074d9, #72b8f0);
        }

        .card-en h4 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .card-en p {
            font-size: 15px;
            line-height: 1.8;
        }

        .about-stats-en {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background: white;
            border-radius: 20px;
            margin-top: 80px;
            padding: 40px 30px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.05);
        }

        .about-stats-en .stat {
            text-align: center;
            margin: 20px;
        }

        .about-stats-en .stat i {
            font-size: 36px;
            color: #007BFF;
            margin-bottom: 10px;
        }

        .about-stats-en .stat h3 {
            font-size: 26px;
            font-weight: bold;
            color: #1b1b1b;
            margin-bottom: 10px;
        }

        .about-stats-en .stat span {
            font-size: 14px;
            color: #555;
        }
    </style>

    <div class="about-section-en">
        <h2>About Atlasin</h2>
        <div class="about-cards-en">
            <div class="card-en">
                <h4>Our Beginning</h4>
                <p>Atlasin proudly introduced PSA oxygen generation technology to Iran in 1989 and installed the first
                    120 m³/h PSA oxygen generator that same year. In 1991, the first hospital oxygen generator was also
                    installed and is still operating efficiently today.</p>
            </div>
            <div class="card-en">
                <h4>Growth in Production</h4>
                <p>With over 23 years of experience in PSA and VPSA systems, and more than 300 oxygen and nitrogen
                    generation units installed, Atlasin has significantly reduced healthcare and industrial costs while
                    offering tailored solutions.</p>
            </div>
            <div class="card-en">
                <h4>International Certifications</h4>
                <p>Atlasin implemented a quality management system in 2009 and received ISO9001 from DQS Germany. In
                    2011, we implemented ISO10002 (Customer Satisfaction) and ISO13485 (Medical Devices) systems and
                    received their certifications.</p>
            </div>
            <div class="card-en">
                <h4>Portable Oxygen Solutions</h4>
                <p>For over 20 years, Atlasin has provided home and portable oxygen generators for patients and
                    veterans, replacing bulky oxygen cylinders with reliable, accessible solutions for peace of
                    mind.</p>
            </div>
            <div class="card-en">
                <h4>National Medical Support</h4>
                <p>With over 24 years of experience, Atlasin has installed over 250 oxygen, compressed air, and vacuum
                    systems across hospitals and medical centers nationwide, earning top rankings in customer
                    service.</p>
            </div>
            <div class="card-en">
                <h4>Our Partnerships</h4>
                <p>Atlasin is the exclusive distributor of renowned global brands such as AIRSEP (USA), MILS (France),
                    AMICO (Canada), ACEM (Italy), HAUX (Germany), and WEINMANN (Germany), providing cutting-edge medical
                    systems and solutions.</p>
            </div>
        </div>

        <div class="about-stats-en">
            <div class="stat">
                <i class="fas fa-project-diagram"></i>
                <h3>250+</h3>
                <span>Projects Delivered</span>
            </div>
            <div class="stat">
                <i class="fas fa-calendar-alt"></i>
                <h3>24</h3>
                <span>Years of Service</span>
            </div>
            <div class="stat">
                <i class="fas fa-users"></i>
                <h3>500+</h3>
                <span>Satisfied Clients</span>
            </div>
        </div>
    </div>

    <!-- Load FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/8b345d6e46.js" crossorigin="anonymous"></script>

    <!-- نسخه انگلیسی - Contact Section -->
    <div class="container-xxl py-5" style="direction: ltr">
        <div class="container">
            <div class="row g-5">
                <!-- Info and address -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-3">Atlasin Co.</h1>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Tehran, Shahid Beheshti St,
                        Iran</p>
                    <p class="mb-4"><i class="fas fa-phone-alt me-2 text-primary"></i> +98 21 1234 5678</p>

                    <!-- Info Boxes -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-clock fa-2x text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">Working Hours</h6>
                                    <small>Sat - Wed: 8am - 4pm</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-envelope fa-2x text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">Email</h6>
                                    <small>info@atlasin.ir</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-headset fa-2x text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">Support</h6>
                                    <small>24/7 available</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-globe fa-2x text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">Website</h6>
                                    <small>www.atlasin.ir</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <iframe
                                class="position-relative w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d202.41469722423398!2d51.41399600650533!3d35.73519037385289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1753876431972!5m2!1sen!2s"
                                frameborder="0"
                                style="min-height: 450px; border: 0"
                                allowfullscreen=""
                                aria-hidden="false"
                                tabindex="0"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
