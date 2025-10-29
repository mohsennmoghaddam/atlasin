@extends('Client.FA.layout.master')

@section('content')

    <!-- Page Header Start -->
    <div
        class="container-fluid page-header py-5 mb-5 wow fadeIn"
        data-wow-delay="0.1s"
    >
        <div class="container py-5" style="direction: rtl;!important;">
            <h1 class="display-4 animated slideInDown mb-4 text-white">در باره ی ما </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0 text-white" style="color: whitesmoke !important;">
                    <li class="text-white" style="color: whitesmoke !important;><a href=" #
                    "> خانه/</a></li>
                    <li class="text-white" style="color: whitesmoke !important;><a href=" #
                    "> صفحات/</a></li>
                    <li class="active text-white" style="color: whitesmoke !important;" aria-current="page">
                        درباره ی ما
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <style>
        .about-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 10%;
            font-family: IRANSansWeb, sans-serif;
            direction: rtl;
            gap: 40px;
            flex-wrap: wrap;
        }

        .about-container.rtl {
            direction: rtl;
        }

        .timeline {
            flex: 0 0 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .timeline::before {
            content: "";
            position: absolute;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, #ccc, #007BFF);
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline-item {
            background-color: white;
            z-index: 1;
            padding: 6px 10px;
            margin: 10px 0;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
            text-align: center;
        }

        .timeline-item::before {
            content: "";
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: #007BFF;
            position: absolute;
            left: 50%;
            top: -18px;
            transform: translateX(-50%);
        }

        .timeline-item.active {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        .about-animation {
            flex: 1;
            text-align: center;
        }

        .about-text {
            flex: 1;
            max-width: 500px;
        }

        .about-text h2 {
            font-size: 28px;
            color: #111;
            margin-bottom: 15px;
        }

        .about-text p {
            color: #444;
            font-size: 16px;
            line-height: 1.8;
        }

        @media (max-width: 992px) {
            .about-container {
                flex-direction: column-reverse;
                text-align: center;
            }

            .timeline {
                flex-direction: row;
                overflow-x: auto;
                width: 100%;
                justify-content: center;
            }

            .timeline::before {
                height: 4px;
                width: 100%;
                top: 50%;
                left: 0;
                transform: translateY(-50%);
            }

            .timeline-item {
                margin: 0 10px;
            }

            .timeline-item::before {
                top: auto;
                bottom: -18px;
            }
        }
    </style>

{{--    <div class="about-container rtl">--}}
{{--        <div class="timeline" id="timelineYearsFa">--}}
{{--            <div class="timeline-item active" data-id="y1368">۱۳۶۸</div>--}}
{{--            <div class="timeline-item" data-id="y1370">۱۳۷۰</div>--}}
{{--            <div class="timeline-item" data-id="y1391">۱۳۹۱</div>--}}
{{--            <div class="timeline-item" data-id="y1400">۱۴۰۰</div>--}}
{{--            <div class="timeline-item" data-id="today">امروز</div>--}}
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
{{--        <div class="about-text" id="aboutTextFa">--}}
{{--            <h2>درباره ما</h2>--}}
{{--            <p>تاسیس شرکت اطلسین و شروع همکاری با AirSep.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script>--}}
{{--        const yearDataFa = {--}}
{{--            y1368: "تاسیس شرکت اطلسین و شروع همکاری با AirSep شرکت اطلسين افتخار دارد که تکنولوژى توليد اکسیژن به روش PSA را براى اولين بار در ايران در سال ۱۳۶۸ معرفى و در همان سال اولين دستگاه مولد اکسيژن به روش PSA را با ظرفيت 120 متر مکعب در ساعت نصب و راه اندازى نموده است..",--}}
{{--            y1370: "راه‌اندازی سیستم اکسیژن‌ساز صنعتی بزرگ.",--}}
{{--            y1391: "تولید مستقل دستگاه اکسیژن‌ساز در ظرفیت‌های مختلف.",--}}
{{--            y1400: "تجهیز بیش از 150 مرکز درمانی در بحران کرونا.",--}}
{{--            today: "ارائه خدمات و محصولات گاز طبی در بیش از 500 مرکز درمانی."--}}
{{--        };--}}
{{--        document.querySelectorAll('#timelineYearsFa .timeline-item').forEach(el => {--}}
{{--            el.addEventListener('click', () => {--}}
{{--                document.querySelector('#timelineYearsFa .active')?.classList.remove('active');--}}
{{--                el.classList.add('active');--}}
{{--                const text = yearDataFa[el.dataset.id];--}}
{{--                document.querySelector("#aboutTextFa p").innerText = text;--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}



    <style>
        .cards-section {
            padding: 80px 10%;
            background: #f8f9fc;
            font-family: IRANSans, sans-serif;
        }

        .cards-title {
            font-size: 32px;
            margin-bottom: 40px;
            text-align: center;
            color: #1a1a1a;
            font-weight: bold;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .card {
            background: linear-gradient(145deg, #0e78ae, #38a7d4);
            color: white;
            padding: 25px;
            border-radius: 12px;
            transition: background 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            background: linear-gradient(145deg, #4ab9df, #73d1ef);
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .card-text {
            font-size: 15px;
            line-height: 1.8;
            text-align: justify;
        }

        .summary-box {
            background: #ffffff;
            border-radius: 12px;
            padding: 40px 30px;
            margin-top: 60px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.06);
        }

        .summary-item {
            flex: 1 1 200px;
            text-align: center;
            margin: 15px 10px;
        }

        .summary-item i {
            font-size: 36px;
            color: #0077b6;
            margin-bottom: 10px;
        }

        .summary-item h4 {
            font-size: 24px;
            margin-bottom: 5px;
            color: #111;
        }

        .summary-item p {
            font-size: 14px;
            color: #444;
        }
    </style>

{{--    <section class="timeline-section">--}}
{{--        <div class="container">--}}
{{--            <h2 class="timeline-title">تاریخچه ما</h2>--}}

{{--            <div class="timeline">--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۳۶۸</div>--}}
{{--                        <h4>تأسیس شرکت اطلسین</h4>--}}
{{--                        <p>شرکت اطلسین افتخار دارد که تکنولوژی تولید اکسیژن به روش PSA را برای اولین بار در ایران معرفی کرده و اولین دستگاه مولد اکسیژن را در همان سال نصب و راه‌اندازی نموده است.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۳۷۰</div>--}}
{{--                        <h4>نخستین اکسیژن‌ساز بیمارستانی</h4>--}}
{{--                        <p>اولین دستگاه تولید اکسیژن بیمارستانی در سال ۱۳۷۰ نصب شد که تاکنون با همان راندمان اولیه در حال کار است.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۳۸۸</div>--}}
{{--                        <h4>استقرار سیستم مدیریت کیفیت</h4>--}}
{{--                        <p>در سال ۱۳۸۸ شرکت اطلسین سیستم مدیریت کیفیت ISO9001 را از شرکت DQS آلمان دریافت نمود.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۳۹۰</div>--}}
{{--                        <h4>گواهی ISO10002 و ISO13485</h4>--}}
{{--                        <p>پیاده‌سازی سیستم‌های رضایتمندی مشتریان و مدیریت کیفیت تجهیزات پزشکی از شرکت DQS آلمان.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۳۹۴</div>--}}
{{--                        <h4>اکسیژن‌سازهای خانگی</h4>--}}
{{--                        <p>ارائه اکسیژن‌سازهای خانگی و قابل حمل برای بیماران تنفسی و جانبازان.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۳۹۸</div>--}}
{{--                        <h4>آغاز بحران کرونا</h4>--}}
{{--                        <p>افزایش تولید و تجهیز مراکز درمانی با اکسیژن‌سازهای مرکزی جهت مقابله با بحران کرونا.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="right">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">۱۴۰۰</div>--}}
{{--                        <h4>تجهیز گسترده مراکز درمانی</h4>--}}
{{--                        <p>تجهیز بیش از ۱۵۰ مرکز درمانی در سراسر ایران با تجهیزات گاز طبی اطلسین.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="timeline-item" data-aos="left">--}}
{{--                    <div class="timeline-content">--}}
{{--                        <div class="timeline-year">امروز</div>--}}
{{--                        <h4>بیش از ۵۰۰ مرکز فعال</h4>--}}
{{--                        <p>ارائه خدمات پس از فروش و پشتیبانی فنی به بیش از ۵۰۰ مرکز درمانی فعال در کشور.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--        <style>--}}
{{--            .timeline-section {--}}
{{--                padding: 60px 0;--}}
{{--                background: #fff;--}}
{{--                overflow-x: hidden;--}}
{{--            }--}}

{{--            .timeline-title {--}}
{{--                text-align: center;--}}
{{--                font-size: 28px;--}}
{{--                font-weight: 700;--}}
{{--                color: #222;--}}
{{--                margin-bottom: 60px;--}}
{{--            }--}}

{{--            .timeline {--}}
{{--                position: relative;--}}
{{--                max-width: 1000px;--}}
{{--                margin: 0 auto;--}}
{{--            }--}}

{{--            /* خط وسط */--}}
{{--            .timeline::before {--}}
{{--                content: "";--}}
{{--                position: absolute;--}}
{{--                top: 0;--}}
{{--                bottom: 0;--}}
{{--                left: 50%;--}}
{{--                width: 3px;--}}
{{--                background: #007bff;--}}
{{--                transform: translateX(-50%);--}}
{{--            }--}}

{{--            /* آیتم‌ها */--}}
{{--            .timeline-item {--}}
{{--                display: flex;--}}
{{--                justify-content: flex-end;--}}
{{--                padding: 30px 0;--}}
{{--                position: relative;--}}
{{--                opacity: 0;--}}
{{--                transform: translateX(100px);--}}
{{--                transition: all 0.8s ease;--}}
{{--            }--}}

{{--            .timeline-item[data-aos="left"] {--}}
{{--                justify-content: flex-start;--}}
{{--                transform: translateX(-100px);--}}
{{--            }--}}

{{--            /* فعال */--}}
{{--            .timeline-item.show {--}}
{{--                opacity: 1;--}}
{{--                transform: translateX(0);--}}
{{--            }--}}

{{--            /* کارت محتوا */--}}
{{--            .timeline-content {--}}
{{--                background: #fff;--}}
{{--                border-radius: 14px;--}}
{{--                padding: 22px 26px;--}}
{{--                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);--}}
{{--                width: 45%;--}}
{{--                border: 1px solid rgba(0, 123, 255, 0.15);--}}
{{--                position: relative;--}}
{{--                transition: all 0.4s ease;--}}
{{--            }--}}

{{--            .timeline-content:hover {--}}
{{--                transform: translateY(-5px);--}}
{{--                box-shadow: 0 6px 25px rgba(0, 123, 255, 0.15);--}}
{{--            }--}}

{{--            /* دایره سال */--}}
{{--            .timeline-year {--}}
{{--                position: absolute;--}}
{{--                top: -20px;--}}
{{--                right: -35px;--}}
{{--                background: #007bff;--}}
{{--                color: #fff;--}}
{{--                font-weight: bold;--}}
{{--                font-size: 17px;--}}
{{--                width: 70px;--}}
{{--                height: 70px;--}}
{{--                border-radius: 50%;--}}
{{--                display: flex;--}}
{{--                align-items: center;--}}
{{--                justify-content: center;--}}
{{--                box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);--}}
{{--            }--}}

{{--            .timeline-item[data-aos="left"] .timeline-year {--}}
{{--                left: -35px;--}}
{{--                right: auto;--}}
{{--            }--}}

{{--            /* متن */--}}
{{--            .timeline-content h4 {--}}
{{--                font-size: 16px;--}}
{{--                color: #003366;--}}
{{--                margin-bottom: 8px;--}}
{{--            }--}}
{{--            .timeline-content p {--}}
{{--                font-size: 14px;--}}
{{--                color: #444;--}}
{{--                line-height: 1.8;--}}
{{--                text-align: justify;--}}
{{--            }--}}

{{--            /* ✅ موبایل */--}}
{{--            @media (max-width: 992px) {--}}
{{--                .timeline::before {--}}
{{--                    left: 15px;--}}
{{--                }--}}

{{--                .timeline-item {--}}
{{--                    justify-content: flex-start !important;--}}
{{--                    transform: translateY(100px);--}}
{{--                }--}}

{{--                .timeline-content {--}}
{{--                    width: 100%;--}}
{{--                    margin-left: 60px;--}}
{{--                    padding: 18px 22px;--}}
{{--                }--}}

{{--                .timeline-year {--}}
{{--                    left: 0;--}}
{{--                    right: auto;--}}
{{--                    width: 55px;--}}
{{--                    height: 55px;--}}
{{--                    font-size: 15px;--}}
{{--                }--}}
{{--            }--}}

{{--        </style>--}}

    <div class="container-xxl py-5" dir="rtl">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold wow fadeIn" data-wow-delay="0.1s">
                تاریخچه ما
            </h2>

            <!-- بک‌گراند متحرک -->
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

                <!-- تایم‌لاین -->
                <div class="timeline position-relative" style="z-index: 2">
                    <!-- ۱۳۶۸ -->
                    <div class="timeline-item right" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۳۶۸</div>
                            <h4>تأسیس شرکت اطلسین</h4>
                            <p>
                                شرکت اطلسین افتخار دارد که تکنولوژی تولید اکسیژن به روش PSA را برای اولین بار در ایران معرفی کرده و در همان سال، اولین دستگاه مولد اکسیژن با ظرفیت ۱۲۰ متر مکعب در ساعت را نصب و راه‌اندازی نموده است.
                            </p>
                        </div>
                    </div>

                    <!-- ۱۳۷۰ -->
                    <div class="timeline-item left" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۳۷۰</div>
                            <h4>نخستین اکسیژن‌ساز بیمارستانی</h4>
                            <p>
                                اولین دستگاه تولید اکسیژن بیمارستانی در سال ۱۳۷۰ نصب شد که تاکنون با همان راندمان اولیه در حال کار است.
                            </p>
                        </div>
                    </div>

                    <!-- ۱۳۸۸ -->
                    <div class="timeline-item right" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۳۸۸</div>
                            <h4>دریافت گواهی ISO9001</h4>
                            <p>
                                استقرار سیستم مدیریت کیفیت و دریافت گواهی ISO9001 از شرکت DQS آلمان در سال ۱۳۸۸.
                            </p>
                        </div>
                    </div>

                    <!-- ۱۳۹۰ -->
                    <div class="timeline-item left" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۳۹۰</div>
                            <h4>استانداردهای ISO10002 و ISO13485</h4>
                            <p>
                                پیاده‌سازی سیستم مدیریت رضایتمندی مشتریان ISO10002 و کیفیت تجهیزات پزشکی ISO13485 از شرکت DQS آلمان.
                            </p>
                        </div>
                    </div>

                    <!-- ۱۳۹۴ -->
                    <div class="timeline-item right" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۳۹۴</div>
                            <h4>اکسیژن‌سازهای خانگی</h4>
                            <p>
                                ارائه دستگاه‌های اکسیژن‌ساز خانگی و پرتابل برای بیماران و جانبازان تنفسی جهت جایگزینی کپسول‌های سنگین و خطرناک.
                            </p>
                        </div>
                    </div>

                    <!-- ۱۳۹۸ -->
                    <div class="timeline-item left" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۳۹۸</div>
                            <h4>پاسخ به بحران کرونا</h4>
                            <p>
                                افزایش تولید و تجهیز مراکز درمانی در سراسر کشور به سیستم‌های اکسیژن در دوران بحران کرونا.
                            </p>
                        </div>
                    </div>

                    <!-- ۱۴۰۰ -->
                    <div class="timeline-item right" data-aos="right">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">۱۴۰۰</div>
                            <h4>تجهیز بیش از ۱۵۰ مرکز درمانی</h4>
                            <p>
                                تجهیز بیش از ۱۵۰ بیمارستان و مرکز درمانی به سیستم‌های گاز طبی پیشرفته در سراسر ایران.
                            </p>
                        </div>
                    </div>

                    <!-- امروز -->
                    <div class="timeline-item left" data-aos="left">
                        <div class="timeline-content bg-light">
                            <div class="timeline-year">امروز</div>
                            <h4>بیش از ۵۰۰ مرکز درمانی</h4>
                            <p>
                                ارائه خدمات پس از فروش و پشتیبانی فنی به بیش از ۵۰۰ بیمارستان و مرکز درمانی در سراسر کشور.
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
        .timeline {
            position: relative !important;
            max-width: 1100px !important;
            margin: 0 auto !important;
            padding: 50px 0 !important;
            direction: rtl !important;
        }

        /* خط وسط */
        .timeline::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            right: 50% !important; /* برعکس نسخه انگلیسی */
            width: 3px;
            background: #007bff;
            transform: translateX(50%);
            z-index: 1;
        }

        /* آیتم‌ها */
        .timeline-item {
            position: relative !important;
            width: 50% !important;
            padding: 22px 14px !important;
            box-sizing: border-box;
            opacity: 0;
            transition: all 0.8s ease;
            float: none !important;
            clear: both !important;
        }

        /* آینه‌ای: left یعنی ستون سمت راست */
        .timeline-item.left {
            float: right !important;
            text-align: right !important;
            transform: translateX(60px);
        }

        /* right یعنی ستون سمت چپ */
        .timeline-item.right {
            float: left !important;
            text-align: right !important;
            transform: translateX(-60px);
        }

        .timeline-item.show {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }

        /* باکس محتوا */
        .timeline-content {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 123, 255, 0.15);
            border-radius: 14px;
            padding: 20px;
            position: relative;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            width: 94% !important;
            min-height: 190px;
            backdrop-filter: blur(6px);
        }

        /* موقعیت دقیق‌تر نسبت به خط وسط */
        .timeline-item.left .timeline-content {
            margin-right: 8px !important; /* نزدیک به خط وسط */
            margin-left: auto !important;
        }

        .timeline-item.right .timeline-content {
            margin-left: 8px !important; /* نزدیک به خط وسط */
            margin-right: auto !important;
        }

        /* دایره سال */
        .timeline-year {
            position: absolute;
            top: -20px;
            background: #007bff;
            color: #fff;
            font-weight: bold;
            font-size: 15px;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
            z-index: 3;
        }

        /* برعکس نسخه انگلیسی */
        .timeline-item.left .timeline-year {
            left: -32px !important;
            right: auto !important;
        }
        .timeline-item.right .timeline-year {
            right: -32px !important;
            left: auto !important;
        }

        /* تیتر و متن */
        .timeline-content h4 {
            font-size: 16px !important;
            color: #003366 !important;
            margin-bottom: 8px !important;
            text-align: right !important;
        }

        .timeline-content p {
            font-size: 14px !important;
            color: #444 !important;
            line-height: 1.8 !important;
            text-align: justify !important;
        }

        /* Hover افکت */
        .timeline-content:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 25px rgba(0, 123, 255, 0.15);
        }

        /* 📱 واکنش‌گرا */
        @media (max-width: 992px) {
            .timeline::before {
                right: 20px !important;
                transform: none !important;
            }

            .timeline-item {
                width: 100% !important;
                float: none !important;
                clear: both !important;
                transform: translateY(60px);
            }

            .timeline-content {
                width: calc(100% - 80px) !important;
                margin: 0 60px 20px 0 !important;
            }

            .timeline-year {
                right: 0 !important;
                left: auto !important;
                width: 55px;
                height: 55px;
                font-size: 14px;
            }
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




    {{--    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">--}}
{{--    <<script>--}}
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








    <section class="cards-section">
        <div class="cards-title">دستاوردها و ارزش‌های ما</div>
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">🏭</div>
                <div class="card-title">شروع قدرتمند</div>
                <div class="card-text">
                    شرکت اطلسين در سال ۱۳۶۸ تکنولوژی تولید اکسیژن به روش PSA را برای اولین‌بار در ایران معرفی نمود. در
                    همان سال، اولین دستگاه اکسیژن‌ساز بیمارستانی با ظرفیت 120 متر مکعب در ساعت راه‌اندازی شد که نقطه
                    آغاز تحولی عظیم در حوزه گازهای طبی بود.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">⚙️</div>
                <div class="card-title">توسعه صنعتی گسترده</div>
                <div class="card-text">
                    با فعالیت بیش از دو دهه در حوزه PSA و VPSA و نصب بیش از 300 سیستم اکسیژن و نیتروژن، اطلسین سهم بزرگی
                    در کاهش هزینه‌های صنعت و پزشکی کشور و ارتقاء کیفیت خدمات درمانی ایفا کرده است.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🔧</div>
                <div class="card-title">استانداردها و کیفیت جهانی</div>
                <div class="card-text">
                    با دریافت گواهی‌نامه‌های ISO9001، ISO10002 و ISO13485 از شرکت DQS آلمان، ما سیستم‌های کیفیت را در
                    تولید و خدمات پیاده‌سازی کرده‌ایم تا محصولات ما با استانداردهای بین‌المللی منطبق باشند.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🫁</div>
                <div class="card-title">تجهیزات تنفسی پیشرفته</div>
                <div class="card-text">
                    ارائه اکسیژن‌سازهای خانگی و پرتابل طی 20 سال اخیر، جایگزینی امن و سبک برای کپسول‌های سنگین بوده و
                    آرامش و سلامت را به بیماران، مخصوصاً جانبازان تنفسی، بازگردانده است.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🏥</div>
                <div class="card-title">خدمات گسترده و پایدار</div>
                <div class="card-text">
                    نصب بیش از 250 سیستم گاز طبی در سراسر کشور و کسب رتبه اول خدمات پس از فروش از اداره کل تجهیزات
                    پزشکی، مهر تأییدی بر کیفیت خدمات شرکت اطلسین است.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🌐</div>
                <div class="card-title">نمایندگی‌های جهانی</div>
                <div class="card-text">
                    نماینده رسمی کمپانی‌های Airsep، MILS، AMICO، ACEM، HAUX و WEINMANN در ایران؛ همکاری با برندهای
                    بین‌المللی گواهی بر اعتماد جهانی به اطلسین است.
                </div>
            </div>
        </div>

        <div class="summary-box">
            <div class="summary-item">
                <i class="fas fa-project-diagram"></i>
                <h4>600+</h4>
                <p>پروژه موفق</p>
            </div>
            <div class="summary-item">
                <i class="fas fa-calendar-check"></i>
                <h4>36+</h4>
                <p>سال تجربه</p>
            </div>
            <div class="summary-item">
                <i class="fas fa-heart"></i>
                <h4>500+</h4>
                <p>رضایت مشتری</p>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


    <!-- Contact Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- نسخه فارسی - تماس با ما -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <div class="container-xxl py-5" style="direction: rtl">
        <div class="container">
            <div class="row g-5">
                <!-- اطلاعات تماس -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-3">شرکت اطلسین</h1>
                    <p class="mb-2"><i class="fas fa-map-marker-alt ms-2 text-primary"></i> تهران، خیابان شهید بهشتی</p>
                    <p class="mb-4"><i class="fas fa-phone-alt ms-2 text-primary"></i> ۰۲۱-۱۲۳۴۵۶۷۸</p>

                    <!-- باکس‌های اطلاعاتی -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-clock fa-2x text-primary ms-3"></i>
                                <div>
                                    <h6 class="mb-1">ساعات کاری</h6>
                                    <small>شنبه تا چهارشنبه: ۸ تا ۱۶</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-envelope fa-2x text-primary ms-3"></i>
                                <div>
                                    <h6 class="mb-1">ایمیل</h6>
                                    <small>info@atlasin.ir</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-headset fa-2x text-primary ms-3"></i>
                                <div>
                                    <h6 class="mb-1">پشتیبانی</h6>
                                    <small>پاسخگویی ۲۴ ساعته</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-globe fa-2x text-primary ms-3"></i>
                                <div>
                                    <h6 class="mb-1">وب‌سایت</h6>
                                    <small>www.atlasin.ir</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- نقشه گوگل -->
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



    <!-- Contact End -->

@endsection
