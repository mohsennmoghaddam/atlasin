@extends('client.Fa.layout.master')

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
                    <li class="text-white" style="color: whitesmoke !important;><a href="#"> خانه/</a></li>
                    <li class="text-white" style="color: whitesmoke !important;><a href="#"> صفحات/</a></li>
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

        .about-container.rtl { direction: rtl; }

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
    <div class="about-container rtl">
        <div class="timeline" id="timelineYearsFa">
            <div class="timeline-item active" data-id="y1368">۱۳۶۸</div>
            <div class="timeline-item" data-id="y1370">۱۳۷۰</div>
            <div class="timeline-item" data-id="y1391">۱۳۹۱</div>
            <div class="timeline-item" data-id="y1400">۱۴۰۰</div>
            <div class="timeline-item" data-id="today">امروز</div>
        </div>
        <script
            src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js"
            type="module"
        ></script>

        <dotlottie-wc
            src="https://lottie.host/bc103f48-ccac-48c1-81ce-3b3970bbb48d/725VzZnA5P.lottie"
            style="width: 500px;height: 500px"
            speed="1"
            autoplay
            loop
        ></dotlottie-wc>
        <div class="about-text" id="aboutTextFa">
            <h2>درباره ما</h2>
            <p>تاسیس شرکت اطلسین و شروع همکاری با AirSep.</p>
        </div>
    </div>
    <script>
        const yearDataFa = {
            y1368: "تاسیس شرکت اطلسین و شروع همکاری با AirSep.",
            y1370: "راه‌اندازی سیستم اکسیژن‌ساز صنعتی بزرگ.",
            y1391: "تولید مستقل دستگاه اکسیژن‌ساز در ظرفیت‌های مختلف.",
            y1400: "تجهیز بیش از 150 مرکز درمانی در بحران کرونا.",
            today: "ارائه خدمات و محصولات گاز طبی در بیش از 500 مرکز درمانی."
        };
        document.querySelectorAll('#timelineYearsFa .timeline-item').forEach(el => {
            el.addEventListener('click', () => {
                document.querySelector('#timelineYearsFa .active')?.classList.remove('active');
                el.classList.add('active');
                const text = yearDataFa[el.dataset.id];
                document.querySelector("#aboutTextFa p").innerText = text;
            });
        });
    </script>



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
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
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
            box-shadow: 0 8px 16px rgba(0,0,0,0.06);
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

    <section class="cards-section">
        <div class="cards-title">دستاوردها و ارزش‌های ما</div>
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">🏭</div>
                <div class="card-title">شروع قدرتمند</div>
                <div class="card-text">
                    شرکت اطلسين در سال ۱۳۶۸ تکنولوژی تولید اکسیژن به روش PSA را برای اولین‌بار در ایران معرفی نمود. در همان سال، اولین دستگاه اکسیژن‌ساز بیمارستانی با ظرفیت 120 متر مکعب در ساعت راه‌اندازی شد که نقطه آغاز تحولی عظیم در حوزه گازهای طبی بود.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">⚙️</div>
                <div class="card-title">توسعه صنعتی گسترده</div>
                <div class="card-text">
                    با فعالیت بیش از دو دهه در حوزه PSA و VPSA و نصب بیش از 300 سیستم اکسیژن و نیتروژن، اطلسین سهم بزرگی در کاهش هزینه‌های صنعت و پزشکی کشور و ارتقاء کیفیت خدمات درمانی ایفا کرده است.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🔧</div>
                <div class="card-title">استانداردها و کیفیت جهانی</div>
                <div class="card-text">
                    با دریافت گواهی‌نامه‌های ISO9001، ISO10002 و ISO13485 از شرکت DQS آلمان، ما سیستم‌های کیفیت را در تولید و خدمات پیاده‌سازی کرده‌ایم تا محصولات ما با استانداردهای بین‌المللی منطبق باشند.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🫁</div>
                <div class="card-title">تجهیزات تنفسی پیشرفته</div>
                <div class="card-text">
                    ارائه اکسیژن‌سازهای خانگی و پرتابل طی 20 سال اخیر، جایگزینی امن و سبک برای کپسول‌های سنگین بوده و آرامش و سلامت را به بیماران، مخصوصاً جانبازان تنفسی، بازگردانده است.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🏥</div>
                <div class="card-title">خدمات گسترده و پایدار</div>
                <div class="card-text">
                    نصب بیش از 250 سیستم گاز طبی در سراسر کشور و کسب رتبه اول خدمات پس از فروش از اداره کل تجهیزات پزشکی، مهر تأییدی بر کیفیت خدمات شرکت اطلسین است.
                </div>
            </div>
            <div class="card">
                <div class="card-icon">🌐</div>
                <div class="card-title">نمایندگی‌های جهانی</div>
                <div class="card-text">
                    نماینده رسمی کمپانی‌های Airsep، MILS، AMICO، ACEM، HAUX و WEINMANN در ایران؛ همکاری با برندهای بین‌المللی گواهی بر اعتماد جهانی به اطلسین است.
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <!-- Contact Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- نسخه فارسی - تماس با ما -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

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
