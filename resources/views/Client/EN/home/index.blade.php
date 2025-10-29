@extends('Client.EN.layout.master')
@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $index => $slide)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        {{--                        <img class="w-100" src="{{ asset('storage/' . $slide->image) }}" alt="Image" />--}}
                        @if(app()->getLocale() === 'fa')
                            <img src="{{ asset('storage/'.$slide->image_fa) }}" alt="بنر فارسی">
                        @else
                            <img src="{{ asset('storage/'.$slide->image_en) }}" alt="English Banner">
                        @endif

                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        {{--                                        <h1 class="display-3 text-dark mb-4 animated slideInDown">--}}
                                        {{--                                            {{ $slide->getTranslation('title', app()->getLocale()) }}--}}
                                        {{--                                        </h1>--}}
                                        {{--                                        <p class="fs-5 text-body mb-5">--}}
                                        {{--                                            {{ $slide->getTranslation('description', app()->getLocale()) }}--}}
                                        {{--                                        </p>--}}
                                        {{--                                        @if($slide->getTranslation('button', app()->getLocale()))--}}
                                        {{--                                            <a href="#" class="btn btn-primary py-3 px-5">--}}
                                        {{--                                                {{ $slide->getTranslation('button', app()->getLocale()) }}--}}
                                        {{--                                            </a>--}}
                                        {{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Carousel End -->

    <!-- About Start -->
    {{--    <div class="container-xxl py-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row g-5">--}}
    {{--                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">--}}
    {{--                    <div--}}
    {{--                        class="position-relative overflow-hidden rounded ps-5 pt-5 h-100"--}}
    {{--                        style="min-height: 400px"--}}
    {{--                    >--}}
    {{--                        <img--}}
    {{--                            class="position-absolute w-100 h-100"--}}
    {{--                            src="Client/img/about.jpg"--}}
    {{--                            alt=""--}}
    {{--                            style="object-fit: cover"--}}
    {{--                        />--}}
    {{--                        <div--}}
    {{--                            class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"--}}
    {{--                            style="width: 200px; height: 200px"--}}
    {{--                        >--}}
    {{--                            <div--}}
    {{--                                class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3"--}}
    {{--                            >--}}
    {{--                                <h1 class="text-white mb-0">25</h1>--}}
    {{--                                <h2 class="text-white">Years</h2>--}}
    {{--                                <h5 class="text-white mb-0">Experience</h5>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">--}}
    {{--                    <div class="h-100">--}}
    {{--                        <h1 class="display-6 mb-5">--}}
    {{--                            We're Here To Assist You With Exploring Protection--}}
    {{--                        </h1>--}}
    {{--                        <p class="fs-5 text-primary mb-4">--}}
    {{--                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem sed stet--}}
    {{--                            lorem sit clita duo justo erat amet--}}
    {{--                        </p>--}}
    {{--                        <div class="row g-4 mb-4">--}}
    {{--                            <div class="col-sm-6">--}}
    {{--                                <div class="d-flex align-items-center">--}}
    {{--                                    <img--}}
    {{--                                        class="flex-shrink-0 me-3"--}}
    {{--                                        src="Client/img/icon/icon-04-primary.png"--}}
    {{--                                        alt=""--}}
    {{--                                    />--}}
    {{--                                    <h5 class="mb-0">Flexible Insurance Plans</h5>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-sm-6">--}}
    {{--                                <div class="d-flex align-items-center">--}}
    {{--                                    <img--}}
    {{--                                        class="flex-shrink-0 me-3"--}}
    {{--                                        src="Client/img/icon/icon-03-primary.png"--}}
    {{--                                        alt=""--}}
    {{--                                    />--}}
    {{--                                    <h5 class="mb-0">Money Back Guarantee</h5>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <p class="mb-4">--}}
    {{--                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.--}}
    {{--                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,--}}
    {{--                            sed stet lorem sit clita duo justo magna dolore erat amet--}}
    {{--                        </p>--}}
    {{--                        <div class="border-top mt-4 pt-4">--}}
    {{--                            <div class="d-flex align-items-center">--}}
    {{--                                <img--}}
    {{--                                    class="flex-shrink-0 rounded-circle me-3"--}}
    {{--                                    src="Client/img/profile.jpg"--}}
    {{--                                    alt=""--}}
    {{--                                />--}}
    {{--                                <h5 class="mb-0">Call Us: +012 345 6789</h5>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="container-xxl py-5" dir="ltr">
        <style>
            /* Font for icon titles (fallbacks included) */
            .iransans {
                font-family: 'Inter', 'Segoe UI', 'IRANSans', 'IRANSansX', sans-serif;
                font-weight: 500;
            }

            /* Icon cards */
            .icon-64 {
                width: 64px;
                height: 64px;
                object-fit: contain;
            }

            .icon-title-clamp {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: normal;
            }

            /* Phone icon */
            .phone-icon {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                border: 2px solid var(--bs-primary, #0d6efd);
                color: var(--bs-primary, #0d6efd);
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .phone-icon svg {
                width: 22px;
                height: 22px
            }

            /* Slight inward shift: left in RTL, right in LTR */
            [dir="rtl"] .img-shift {
                transform: translateX(-16px);
            }

            [dir="ltr"] .img-shift {
                transform: translateX(16px);
            }
        </style>

        @php
            $iconTitles = [
              '600+ installations',
              'ISO 9001 / 13485 / 10002 certified',
              'First hospital oxygen generator (1991)',
              'Free consulting & design'
            ];
        @endphp

        <div class="container">
            <div class="row g-5 align-items-center">

                {{-- Image column (right), slightly shifted inward --}}
                <div class="col-lg-5 order-lg-2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden rounded-4 h-100 img-shift" style="min-height: 500px;">
                        <img class="position-absolute w-100 h-100"
                             src="{{ asset('storage/' . $about->main_image) }}"
                             alt="about image" style="object-fit: cover;"/>
                        <div class="position-absolute top-0 end-0 bg-white rounded ps-3 pb-3"
                             style="width: 250px; height: 250px">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                                <h2 class="text-white mb-0">{{ json_decode($about->experience_text_top)->en ?? '' }}</h2>
                                <h1 class="text-white mb-0">{{ $about->experience_years }}</h1>
                                <h2 class="text-white">{{ json_decode($about->experience_text_bottom)->en ?? '' }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Text column (larger) --}}
                <div class="col-lg-7 order-lg-1 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h1 class="display-5 mb-4">{{ json_decode($about->title)->en ?? '' }}</h1>
                        <p class="fs-5 text-primary mb-4">{{ json_decode($about->subtitle)->en ?? '' }}</p>

                        {{-- Icons: icon on top, caption below (4 cards) --}}
                        <div class="row g-4 mb-4 text-center">
                            @foreach($about->icons->take(4) as $icon)
                                <div class="col-6 col-md-3">
                                    <div class="d-flex flex-column align-items-center">
                                        <img class="icon-64 mb-2" src="{{ asset('storage/'.$icon->icon_image) }}"
                                             alt="icon">
                                        <div class="iransans small icon-title-clamp">
                                            {{ $iconTitles[$loop->index] ?? (\Illuminate\Support\Str::limit(json_decode($icon->icon_title)->en ?? '', 50)) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <p class="mb-4">{{ json_decode($about->final_paragraph)->en ?? '' }}</p>

                        {{-- Call row aligned toward the image (right edge of text column in LTR) --}}
                        <style>
                            .contact-icon svg {
                                width: 25px;
                                height: 25px;
                                stroke: #0d6efd; /* رنگ دلخواه مثلا آبی */
                            }

                            .contact-item {
                                display: flex;
                                align-items: center;
                                gap: 6px;
                            }
                        </style>

                        <div class="border-top mt-4 pt-4">
                            <div class="d-flex align-items-center justify-content-start gap-4">
                                <!-- Phone -->
                                <div class="contact-item">
                                          <span class="contact-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                                                       19.79 19.79 0 0 1-8.63-3.07
                                                       19.5 19.5 0 0 1-6-6
                                                       19.79 19.79 0 0 1-3.11-8.67
                                                       2 2 0 0 1 1.98-2.18h3a2 2 0 0 1 2
                                                       1.72c.12.86.32 1.7.59 2.5a2 2 0 0 1-.45
                                                       2.11L8.09 9.91a16 16 0 0 0 6
                                                       6l1.58-1.58a2 2 0 0 1 2.11-.45c.8.27
                                                       1.64.47 2.5.59A2 2 0 0 1 22 16.92z"/>
                                            </svg>
                                          </span>
                                    <span>{{ json_decode($about->call_us_text)->en ?? '+9888776695' }}</span>
                                </div>

                                <!-- Email -->
                                <div class="contact-item">
                                      <span class="contact-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round">
                                          <rect x="3" y="5" width="18" height="14" rx="2" ry="2"></rect>
                                          <polyline points="3,7 12,13 21,7"></polyline>
                                        </svg>
                                      </span>
                                    <span>{{ json_decode($about->email_text)->fa ?? 'info@atlasin.ir' }}</span>
                                </div>

                                <!-- Location -->
                                <div class="contact-item">
                                      <span class="contact-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M21 10c0 6-9 13-9 13S3 16 3 10a9
                                                   9 0 0 1 18 0z"/>
                                          <circle cx="12" cy="10" r="3"/>
                                        </svg>
                                      </span>
                                    <span>{{ json_decode($about->location_text)->fa ?? 'SGC Building No.22 17 th St Ahmad Qasir Ave' }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- About End -->

    <!-- Facts Start -->
    <!-- Inter (Latin) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <style>
        :root {
            --block-h: 560px;
            --brand: #0d6efd;
        }

        body {
            font-family: Inter, system-ui, Arial, sans-serif;
        }

        /* Equal height for both columns */
        #installsMap, .info-panel {
            height: var(--block-h);
            border-radius: 20px;
            overflow: hidden;
        }

        /* Map */
        #installsMap {
            box-shadow: 0 10px 26px rgba(0, 0, 0, .08);
        }

        /* Blue info card (LTR) */
        .info-panel {
            padding: 18px;
            color: #fff;
            background: radial-gradient(rgba(255, 255, 255, .12) 1px, transparent 1px) 0 0/16px 16px,
            radial-gradient(rgba(255, 255, 255, .08) 1px, transparent 1px) 8px 8px/16px 16px,
            linear-gradient(180deg, #1570ef 0%, #0b5ed7 100%);
            box-shadow: 0 12px 28px rgba(13, 110, 253, .25);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .info-panel h2 {
            font-size: 1.1rem;
            margin: 0 0 .4rem;
        }

        .info-panel p.lead {
            font-size: .95rem;
            opacity: .9;
            margin: 0 0 10px;
        }

        .stat-mini {
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 12px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            background: rgba(255, 255, 255, .06)
        }

        .stat-mini .num {
            font-weight: 800;
            font-size: 1.4rem;
            color: #fff;
        }

        .progress {
            height: 8px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .25);
        }

        .progress-bar {
            background: #fff;
        }

        /* Chips (LTR) */
        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            overflow: auto;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .chip {
            border: 1px solid rgba(255, 255, 255, .28);
            border-radius: 999px;
            padding: 4px 10px 4px 22px;
            font-size: .86rem;
            background: rgba(255, 255, 255, .12);
            position: relative;
            color: #fff;
        }

        .chip::before {
            content: "✓";
            position: absolute;
            left: 8px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 700;
            color: #b6ffce;
        }

        .leaflet-control-layers {
            direction: ltr;
            font: inherit;
            font-size: .85rem;
        }

        @media (min-width: 992px) {
            .equal-cols {
                align-items: stretch;
            }
        }
    </style>
    <section id="atlasin-installs-en" class="container-fluid my-4 px-3 px-lg-4" dir="ltr">
        <div class="row g-4 equal-cols">

            <!-- Map: LEFT -->
            <div class="col-lg-6 order-1">
                <div id="installsMap" class="w-100"></div>
            </div>

            <!-- Info card: RIGHT -->
            <div class="col-lg-6 order-2">
                <aside class="info-panel">
                    <div>
                        <h2 class="text-center text-white">Atlasin Installations & Footprint</h2>
                        <p class="lead text-center">
                            With the trust of healthcare providers, Atlasin has delivered over <strong>600
                                installations</strong> nationwide,
                            covering almost all provinces.
                        </p>

                        <div class="stat-mini">
                            <span>Completed installations</span>
                            <span class="num" id="installNum">600+</span>
                        </div>

                        <div class="mb-1 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">Provincial coverage</span>
                            <small id="provCount">—</small>
                        </div>
                        <div class="progress mb-1">
                            <div id="provProgress" class="progress-bar" style="width:0%"></div>
                        </div>
                        <small id="provLabel">—</small>

                        <div class="mt-5">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-semibold">Sample provinces</span>
                                <small style="opacity:.85">example list</small>
                            </div>
                            <ul id="provinceList" class="chips"></ul>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <span class="">Anywhere in Iran, you’re less than 30 minutes from Atlasin</span>
                        {{--                        <a href="#" class="btn btn-light text-primary flex-grow-1">Clients list</a>--}}
                        {{--                        <a href="#" class="btn btn-outline-light flex-grow-1">Download company profile</a>--}}
                    </div>
                </aside>
            </div>

        </div>
    </section>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
    <script>
        // Optional: match height with your English hero section by giving it id="achievementsTopEn"
        (function syncWithTop() {
            const top = document.getElementById('achievementsTopEn');
            const setH = () => {
                if (top) {
                    const h = Math.max(500, Math.round(top.getBoundingClientRect().height));
                    document.documentElement.style.setProperty('--block-h', h + 'px');
                }
            };
            window.addEventListener('load', setH);
            window.addEventListener('resize', setH);
        })();

        /* Stats */
        const TOTAL_INSTALLS = 600;
        const TOTAL_PROVINCES = 31;
        const COVERED_PROVINCES = 30; // set to 31 if fully covered

        document.getElementById('installNum').textContent = `${TOTAL_INSTALLS}+`;
        const percent = Math.round((COVERED_PROVINCES / TOTAL_PROVINCES) * 100);
        document.getElementById('provCount').textContent = `${COVERED_PROVINCES} of ${TOTAL_PROVINCES} provinces`;
        document.getElementById('provProgress').style.width = percent + '%';
        document.getElementById('provLabel').textContent = `${percent}% provincial coverage`;

        /* Province chips (English) */
        const provincesEn = [
            "Tehran", "Alborz", "Isfahan", "Fars", "Razavi Khorasan", "East Azerbaijan", "West Azerbaijan", "Khuzestan",
            "Gilan", "Mazandaran", "Golestan", "Qazvin", "Qom", "Semnan", "Yazd", "Kerman", "Hormozgan", "Bushehr", "Kermanshah",
            "Kurdistan", "Hamedan", "Zanjan", "Markazi", "Ardabil", "Chaharmahal & Bakhtiari", "Kohgiluyeh & Boyer-Ahmad",
            "Ilam", "Lorestan", "North Khorasan", "South Khorasan", "Sistan & Baluchestan"
        ];
        const ul = document.getElementById('provinceList');
        provincesEn.forEach(n => {
            const li = document.createElement('li');
            li.className = 'chip';
            li.textContent = n;
            ul.appendChild(li);
        });

        /* Map: LEFT — English-labeled basemap (Carto Positron) */
        const map = L.map('installsMap', {scrollWheelZoom: false}).setView([32.4279, 53.6880], 5);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap, &copy; CARTO'
        }).addTo(map);

        // Replace with your real points: [lat, lng, weight?]
        const installPoints = [
            [35.6892, 51.3890, 1.00], // Tehran (Tehran)
            [35.8355, 50.9916, 0.75], // Karaj (Alborz)
            [32.6525, 51.6746, 0.90], // Isfahan (Isfahan)
            [29.5918, 52.5837, 0.80], // Shiraz (Fars)
            [36.2605, 59.6168, 0.90], // Mashhad (Razavi Khorasan)
            [38.0667, 46.2993, 0.70], // Tabriz (East Azerbaijan)
            [37.5527, 45.0760, 0.70], // Urmia (West Azerbaijan)
            [31.3183, 48.6706, 0.70], // Ahvaz (Khuzestan)
            [37.2808, 49.5832, 0.60], // Rasht (Gilan)
            [36.5633, 53.0601, 0.60], // Sari (Mazandaran)
            [36.8416, 54.4439, 0.60], // Gorgan (Golestan)
            [36.2688, 50.0041, 0.55], // Qazvin (Qazvin)
            [34.6401, 50.8764, 0.60], // Qom (Qom)
            [35.5729, 53.3976, 0.55], // Semnan (Semnan)
            [31.8974, 54.3569, 0.80], // Yazd (Yazd) ★
            [30.2839, 57.0788, 0.85], // Kerman (Kerman) ★
            [27.1833, 56.2667, 0.50], // Bandar Abbas (Hormozgan)
            [28.9234, 50.8203, 0.55], // Bushehr (Bushehr)
            [34.3142, 47.0650, 0.60], // Kermanshah (Kermanshah)
            [35.3219, 46.9910, 0.60], // Sanandaj (Kurdistan)
            [34.7992, 48.5146, 0.60], // Hamedan (Hamedan)
            [36.6736, 48.4787, 0.55], // Zanjan (Zanjan)
            [34.0917, 49.6892, 0.55], // Arak (Markazi)
            [38.2496, 48.2933, 0.55], // Ardabil (Ardabil)
            [32.3267, 50.8644, 0.55], // Shahrekord (Chaharmahal & Bakhtiari)
            [30.6684, 51.5876, 0.55], // Yasuj (Kohgiluyeh & Boyer-Ahmad)
            [33.6373, 46.4227, 0.55], // Ilam (Ilam)
            [33.4878, 48.3558, 0.60], // Khorramabad (Lorestan)
            [37.4747, 57.3290, 0.55], // Bojnurd (North Khorasan)
            [32.8710, 59.2211, 0.80], // Birjand (South Khorasan) ★
            [29.4963, 60.8629, 0.50]  // Zahedan (Sistan & Baluchestan)
        ];

        const heatLayer = L.heatLayer(installPoints, {radius: 22, blur: 16, maxZoom: 10, minOpacity: 0.4}).addTo(map);
        const dotsLayer = L.layerGroup();
        installPoints.forEach(([lat, lng]) => L.circleMarker([lat, lng], {
            radius: 4,
            weight: 0,
            fillOpacity: .9
        }).addTo(dotsLayer));
        L.control.layers(null, {'Heatmap': heatLayer, 'Points': dotsLayer}, {
            position: 'topright',
            collapsed: true
        }).addTo(map);

        if (installPoints.length) {
            const b = L.latLngBounds(installPoints.map(p => [p[0], p[1]]));
            map.fitBounds(b.pad(0.18));
            setTimeout(() => map.invalidateSize(), 0);
        }
    </script>

    <!-- Facts End -->

    <!-- Features Start -->
    @php
        $locale = app()->getLocale();
    @endphp

    @foreach(($whyUsSections ?? []) as $sIndex => $whyUs)
        @php
            // برای سکشن‌های زوج/فرد: فرد = برعکس‌کردن ستون‌ها
            $flip = $sIndex % 2 === 1; // 0,1,2,3,...
        @endphp

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center {{ $flip ? 'flex-lg-row-reverse' : '' }}">
                    {{-- ستون متن/آیتم‌ها --}}
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="display-6 mb-5">{{ $whyUs?->title[$locale] ?? '' }}</h1>
                        <p class="mb-4" style="text-align:justify">{{ $whyUs?->description[$locale] ?? '' }}</p>
                        <div class="row g-3">
                            @foreach(($whyUs?->items ?? []) as $index => $item)
                                <div class="col-sm-6 wow fadeIn" data-wow-delay="0.{{ ($index % 6) + 1 }}s">
                                    <div class="bg-light rounded h-100 p-3">
                                        <div class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3">
                                            @if($item->icon)
                                                <img class="align-self-center mb-3"
                                                     src="{{ asset('storage/' . $item->icon) }}"
                                                     alt="icon" style="width:150px;"/>
                                            @endif
                                            <span class="mb-0">{{ $item->title[$locale] ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- ستون تصویر --}}
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="position-relative rounded overflow-hidden h-100" style="min-height:400px;">
                            @if($whyUs?->image)
                                <img class="position-absolute w-100 h-100"
                                     src="{{ asset('storage/' . $whyUs->image) }}"
                                     alt="Why Us Image" style="object-fit:cover;"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    <!-- Features End -->


    {{-- ===== BLOGS SECTION (drop-in) ===== --}}
    @php
        $locale = app()->getLocale();
        $tr = function($value) use ($locale) {
            return is_array($value) ? ($value[$locale] ?? ($value['fa'] ?? ($value['en'] ?? ''))) : $value;
        };
    @endphp

    <style>
        .blog-item {
            transition: .3s ease;
            border-radius: 12px;
        }

        .blog-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .blog-item img {
            transition: transform .35s ease;
        }

        .blog-item:hover img {
            transform: scale(1.04);
        }

        .badge-soft-primary {
            background: rgba(13, 110, 253, .12);
            color: #0d6efd;
        }
    </style>

    <div class="container-xxl py-5" id="blogs-section">
        <div class="container">

            {{-- عنوان --}}
            <div class="text-center mx-auto mb-4" style="max-width: 520px">
                <h1 class="display-6 mb-3">{{ $locale=='fa' ? 'آخرین مقالات' : 'Latest Articles' }}</h1>
                <p class="text-muted">{{ $locale=='fa' ? 'اخبار و مطالب تخصصی حوزه محصولات ما' : 'News & insights about our products' }}</p>
            </div>

            {{-- فیلتر کتگوری --}}
            <div class="text-center mb-4">
                <form id="blogFilterForm" class="d-inline-flex" action="{{ url()->current() }}" method="GET">
                    <select name="category" id="categorySelect" class="form-select">
                        <option value="">{{ $locale=='fa' ? 'همه دسته‌ها' : 'All Categories' }}</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" {{ request('category')==$cat->slug?'selected':'' }}>
                                {{ $tr($cat->name) }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary ms-2" type="submit">
                        {{ $locale=='fa' ? 'اعمال' : 'Apply' }}
                    </button>
                    @if(request('category'))
                        <a href="{{ url()->current() }}" class="btn btn-outline-secondary ms-2" id="clearFilterBtn">
                            {{ $locale=='fa' ? 'حذف فیلتر' : 'Clear' }}
                        </a>
                    @endif
                </form>
            </div>

            {{-- گرید کارت‌ها --}}
            <div id="blog-grid">
                <div class="row g-4 justify-content-center">
                    @forelse($blogs as $i => $blog)
                        @php
                            $title = $tr($blog->title);
                            $short = $tr($blog->short_description);
                            $img   = $blog->image ? asset('storage/'.$blog->image) : asset('Client/img/icon/icon-01-light.png');
                            $delay = number_format(0.1 + 0.2*($i % 3), 1);
                        @endphp

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $delay }}s">
                            <div class="service-item rounded h-100 p-4 text-center shadow-sm blog-item">
                                <a href="{{ route('clients.blogs.show', $blog->slug) }}">
                                    <img src="{{ $img }}" alt="{{ strip_tags($title) }}" class="img-fluid rounded mb-3"
                                         style="height:150px;object-fit:cover;">
                                </a>

                                <div class="mb-2">
                                    @foreach($blog->categories as $c)
                                        <span class="badge badge-soft-primary me-1">{{ $tr($c->name) }}</span>
                                    @endforeach
                                </div>

                                <h5 class="mb-2">
                                    <a href="{{ route('clients.blogs.show', $blog->slug) }}"
                                       class="text-dark text-decoration-none">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($title), 60) }}
                                    </a>
                                </h5>

                                <p class="text-muted mb-3">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($short), 90) }}
                                </p>

                                <a href="{{ route('clients.blogs.show', $blog->slug) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    {{ $locale=='fa' ? 'ادامه مطلب' : 'Read More' }}
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-light text-center border">
                                {{ $locale=='fa' ? 'مقاله‌ای یافت نشد.' : 'No articles found.' }}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- صفحه‌بندی --}}
            <div id="blog-pager" class="mt-5 d-flex justify-content-center">
                {{ $blogs->links() }}
            </div>

        </div>
    </div>

    {{-- AJAX (بدون نیاز به ویوی اضافه)  --}}
    <script>
        (function () {
            const container = document.getElementById('blogs-section');
            const form = document.getElementById('blogFilterForm');
            const categorySel = document.getElementById('categorySelect');
            const grid = document.getElementById('blog-grid');
            const pager = document.getElementById('blog-pager');

            function ajaxLoad(url) {
                const u = new URL(url, window.location.origin);
                // همین صفحه را با X-Requested-With بار می‌زنیم، بعد بخش وبلاگ را از HTML پاسخ می‌کشیم
                fetch(u, {headers: {'X-Requested-With': 'XMLHttpRequest'}})
                    .then(r => r.text())
                    .then(html => {
                        // یک DOM موقتی بسازیم
                        const tmp = document.createElement('div');
                        tmp.innerHTML = html;

                        // از پاسخ، گرید و پیجرِ جدید را پیدا کن (با همین id ها)
                        const newGrid = tmp.querySelector('#blog-grid');
                        const newPager = tmp.querySelector('#blog-pager');

                        if (newGrid && newPager) {
                            grid.innerHTML = newGrid.innerHTML;
                            pager.innerHTML = newPager.innerHTML;
                            window.history.replaceState({}, '', u); // URL را آپدیت کن
                            attachPagerHandlers();
                        }
                    })
                    .catch(console.error);
            }

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const params = new URLSearchParams(new FormData(form));
                const url = form.getAttribute('action') + (params.toString() ? '?' + params.toString() : '');
                ajaxLoad(url);
            });

            // تغییر سلکت هم بلافاصله اعمال شود
            categorySel.addEventListener('change', () => form.requestSubmit());

            // هندل کلیک روی لینک‌های صفحه‌بندی
            function attachPagerHandlers() {
                pager.querySelectorAll('a').forEach(a => {
                    a.addEventListener('click', function (e) {
                        e.preventDefault();
                        const url = this.getAttribute('href');
                        if (url) ajaxLoad(url);
                    });
                });
            }

            attachPagerHandlers();

            // دکمه Clear (اگر رندر شده باشد)
            container.addEventListener('click', function (e) {
                const clearBtn = e.target.closest('#clearFilterBtn');
                if (clearBtn) {
                    e.preventDefault();
                    ajaxLoad(form.getAttribute('action')); // بدون فیلتر
                    if (categorySel) categorySel.value = '';
                }
            });
        })();
    </script>
    {{-- ===== /BLOGS SECTION ===== --}}

    <!-- Appointment Start -->
    {{--    @php $locale = app()->getLocale(); @endphp--}}
    {{--    <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s">--}}
    {{--        <div class="container py-5">--}}
    {{--            <div class="row g-5">--}}
    {{--                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">--}}
    {{--                    <h1 class="display-6 text-white mb-5">--}}
    {{--                        @if($locale == 'fa')--}}
    {{--                            ما تولیدکننده مولد اکسیژن بیمارستانی هستیم--}}
    {{--                        @else--}}
    {{--                            We're a Hospital Oxygen Generator Manufacturer--}}
    {{--                        @endif--}}
    {{--                    </h1>--}}
    {{--                    <p class="text-white mb-5">--}}
    {{--                        @if($locale == 'fa')--}}
    {{--                            شرکت اطلسین تولیدکننده‌ی تجهیزات پزشکی با تمرکز ویژه بر روی سیستم‌های مولد اکسیژن بیمارستانی است. این شرکت با بهره‌گیری از فناوری روز، راهکارهای نوین و مطابق با استانداردهای بین‌المللی، در راستای تأمین اکسیژن پایدار و مطمئن برای مراکز درمانی فعالیت می‌کند.--}}
    {{--                        @else--}}
    {{--                            Atlasin Company is a medical equipment manufacturer specializing in hospital oxygen generator systems. By utilizing cutting-edge technology and adhering to international standards, the company provides reliable and efficient oxygen solutions for healthcare facilities.--}}
    {{--                        @endif--}}
    {{--                    </p>--}}
    {{--                    <div class="bg-white rounded p-3" style="direction: rtl">--}}
    {{--                        <div class="d-flex align-items-center bg-primary rounded p-3">--}}
    {{--                            <h5 class="text-white ">--}}
    {{--                                @if($locale == 'fa')--}}
    {{--                                    تماس با ما :  02188725435--}}
    {{--                                @else--}}
    {{--                                    Call Us: +98 2188725435--}}
    {{--                                @endif--}}
    {{--                            </h5>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                --}}{{-- فرم --}}
    {{--                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">--}}
    {{--                    <div class="bg-white rounded p-5">--}}
    {{--                        <form action="{{ route('clients.contact.store') }}" method="post">--}}
    {{--                            @csrf--}}
    {{--                            <div class="row g-3">--}}
    {{--                                <div class="col-sm-6">--}}
    {{--                                    <div class="form-floating">--}}
    {{--                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required />--}}
    {{--                                        <label for="name">{{ $locale == 'fa' ? 'نام شما' : 'Your Name' }}</label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-sm-6">--}}
    {{--                                    <div class="form-floating">--}}
    {{--                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required />--}}
    {{--                                        <label for="email">{{ $locale == 'fa' ? 'ایمیل شما' : 'Your Email' }}</label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-sm-6">--}}
    {{--                                    <div class="form-floating">--}}
    {{--                                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required />--}}
    {{--                                        <label for="mobile">{{ $locale == 'fa' ? 'شماره تماس' : 'Your Mobile' }}</label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-sm-6">--}}
    {{--                                    <div class="form-floating">--}}
    {{--                                        <select class="form-select" name="contact_service_id" id="contact_service_id" required>--}}
    {{--                                            <option disabled selected>{{ $locale == 'fa' ? 'انتخاب نوع سرویس' : 'Select Service' }}</option>--}}
    {{--                                            @foreach($services as $service)--}}
    {{--                                                <option value="{{ $service->id }}">--}}
    {{--                                                    {{ $locale == 'fa' ? $service->getTranslation('title', 'fa') : $service->getTranslation('title', 'en') }}--}}
    {{--                                                </option>--}}
    {{--                                            @endforeach--}}
    {{--                                        </select>--}}
    {{--                                        <label for="contact_service_id">{{ $locale == 'fa' ? 'نوع سرویس' : 'Service Type' }}</label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-12">--}}
    {{--                                    <div class="form-floating" >--}}
    {{--                                        <textarea class="form-control" name="message" id="message" placeholder="Message" style="height: 80px"></textarea>--}}
    {{--                                        <label for="message">{{ $locale == 'fa' ? 'پیام شما' : 'Your Message' }}</label>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-12">--}}
    {{--                                    <button class="btn btn-primary py-3 px-5" type="submit">--}}
    {{--                                        {{ $locale == 'fa' ? 'ارسال پیام' : 'Send Message' }}--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Appointment End -->
    <!-- Appointment Start (Clean + Service field) -->
    @php $locale = app()->getLocale(); @endphp
    <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s"
         dir="{{ $locale=='fa' ? 'rtl' : 'ltr' }}">
        <style>
            .app-card {
                border: 1px solid rgba(255, 255, 255, .1);
            }

            .app-btn {
                min-width: 220px;
                border-radius: 9999px;
                box-shadow: 0 10px 20px rgba(13, 110, 253, .25);
            }

            .app-lead {
                opacity: .9;
                line-height: 1.9;
            }
        </style>

        <div class="container py-5">
            <div class="row g-5 align-items-center">

                {{-- ستون متن (وسط‌چین) --}}
                <div class="col-lg-6 order-lg-2">
                    <div class="text-center text-white px-lg-4">
                        <h1 class="display-6 fw-bold mb-3">
                            @if($locale=='fa')
                                مولدهای اکسیژن بیمارستانی اطلسین
                            @else
                                Service request form
                            @endif
                        </h1>
                        <p class="app-lead mb-0" style="text-align: justify">
                            @if($locale=='fa')
                                از سال ۱۳۶۸، اطلسین پیشروِ تولید اکسیژن در محل با فناوری <b>PSA</b> است. با بیش از <b>۳۰۰
                                    نصب موفق</b> در کشور و گواهی‌های <b>ISO 9001 / ISO 13485 / ISO 10002</b>، اکسیژن
                                درمانی را <b>پایدار، ایمن و اقتصادی</b> برای مراکز درمانی فراهم می‌کنیم.
                            @else
                                Since 1989, Atlasin has pioneered on-site oxygen generation using <b>PSA</b> technology.
                                With <b>300+ installations</b> and <b>ISO 9001 / ISO 13485 / ISO 10002</b>
                                certifications, we deliver <b>reliable, safe, and cost-effective</b> oxygen for
                                healthcare facilities.
                            @endif
                        </p>
                    </div>
                </div>

                {{-- ستون فرم (وسط‌چین) --}}
                <div class="col-lg-6 order-lg-1">
                    <div class="bg-white rounded-4 shadow-lg p-4 p-lg-5 app-card mx-auto">
                        <form action="{{ route('clients.contact.store') }}" method="post"
                              dir="{{ $locale=='fa' ? 'rtl' : 'ltr' }}">
                            @csrf
                            <div class="row g-3 text-center">

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="{{ $locale=='fa' ? 'نام شما' : 'Your Name' }}" required>
                                        <label for="name">{{ $locale=='fa' ? 'نام شما' : 'Your Name' }}</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                               placeholder="{{ $locale=='fa' ? 'ایمیل شما' : 'Your Email' }}" required>
                                        <label for="email">{{ $locale=='fa' ? 'ایمیل شما' : 'Your Email' }}</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="text" name="mobile" class="form-control" id="mobile"
                                               placeholder="{{ $locale=='fa' ? 'شماره تماس' : 'Your Mobile' }}"
                                               required>
                                        <label for="mobile">{{ $locale=='fa' ? 'شماره تماس' : 'Your Mobile' }}</label>
                                    </div>
                                </div>

                                {{-- فیلد «درخواست خدمات» (Service request) --}}
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <select class="form-select" name="contact_service_id" id="contact_service_id"
                                                required>
                                            <option value="" disabled selected>
                                                {{ $locale=='fa' ? 'انتخاب خدمت مورد نیاز' : 'Select the service you need' }}
                                            </option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">
                                                    {{ $locale=='fa' ? $service->getTranslation('title','fa') : $service->getTranslation('title','en') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="contact_service_id">
                                            {{ $locale=='fa' ? 'درخواست خدمات' : 'Service request' }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                  <textarea class="form-control" name="message" id="message"
                            placeholder="{{ $locale=='fa' ? 'پیام شما' : 'Your Message' }}"
                            style="height: 110px"></textarea>
                                        <label for="message">{{ $locale=='fa' ? 'پیام شما' : 'Your Message' }}</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary btn-lg app-btn" type="submit">
                                            {{ $locale=='fa' ? 'ارسال پیام' : 'Send Message' }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Team Start -->
    {{--    <div class="container-xxl py-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="text-center mx-auto" style="max-width: 500px">--}}
    {{--                <h1 class="display-6 mb-5">{{ $locale == 'fa' ? 'با اعضای تیم ما آشنا شوید' : 'Meet Our Professional Team Members' }}</h1>--}}
    {{--            </div>--}}
    {{--            <div class="row g-4">--}}
    {{--                @foreach($members as $member)--}}
    {{--                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s">--}}
    {{--                        <div class="team-item rounded">--}}
    {{--                            <img class="img-fluid" src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->getTranslation('name', $locale) }}" />--}}
    {{--                            <div class="text-center p-4">--}}
    {{--                                <h5>{{ $member->getTranslation('name', $locale) }}</h5>--}}
    {{--                                <span>{{ $member->getTranslation('position', $locale) }}</span>--}}
    {{--                            </div>--}}
    {{--                            <div class="team-text text-center bg-white p-4">--}}
    {{--                                <h5>{{ $member->getTranslation('name', $locale) }}</h5>--}}
    {{--                                <p>{{ $member->getTranslation('position', $locale) }}</p>--}}
    {{--                                <div class="d-flex justify-content-center">--}}
    {{--                                    @if($member->email)--}}
    {{--                                        <a class="btn btn-square btn-light m-1" href="mailto:{{ $member->email }}">--}}
    {{--                                            <i class="fas fa-envelope"></i>--}}
    {{--                                        </a>--}}
    {{--                                    @endif--}}
    {{--                                    @if($member->linkedin)--}}
    {{--                                        <a class="btn btn-square btn-light m-1" href="{{ $member->linkedin }}" target="_blank">--}}
    {{--                                            <i class="fab fa-linkedin-in"></i>--}}
    {{--                                        </a>--}}
    {{--                                    @endif--}}
    {{--                                    @if($member->mobile)--}}
    {{--                                        <a class="btn btn-square btn-light m-1" href="tel:{{ $member->mobile }}">--}}
    {{--                                            <i class="fas fa-phone"></i>--}}
    {{--                                        </a>--}}
    {{--                                    @endif--}}
    {{--                                    @if($member->internal_number)--}}
    {{--                                        <a class="btn btn-square btn-light m-1" href="tel:{{ $member->internal_number }}">--}}
    {{--                                            <i class="fas fa-building"></i>--}}
    {{--                                        </a>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- Team End -->

    <!-- Testimonial Start -->
    <style>
        .hospital-hover {
            transition: all 0.3s;
        }

        .hospital-hover:hover {
            background-color: #e8f0fe;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
    </style>
{{--    <div class="container-xxl py-5 bg-white">--}}
{{--        <div class="container">--}}
{{--            <div class="text-center mb-5">--}}
{{--                <h2 class="fw-bold">Our customers </h2>--}}
{{--                <p class="text-muted">Hospitals that have trusted us</p>--}}
{{--            </div>--}}

{{--            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center align-items-center">--}}
{{--                @foreach($hospitals as $hospital)--}}
{{--                    <div class="col text-center">--}}
{{--                        <a href="{{ $hospital->website }}" target="_blank" class="d-block">--}}
{{--                            <img src="{{ asset('storage/' . $hospital->image) }}"--}}
{{--                                 alt="{{ $hospital->name }}"--}}
{{--                                 class="img-fluid mx-auto d-block"--}}
{{--                                 style="max-height: 80px; object-fit: contain">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="clients-section py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-2" data-aos="fade-up">Our Clients</h2>
            <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
                Hospitals that have trusted us
            </p>

            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center align-items-center">
                @foreach($hospitals as $hospital)
                    <div class="col text-center" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 70 }}">
                        <div class="client-logo">
                            <img src="{{ asset('storage/' . $hospital->image) }}"
                                 alt="{{ $hospital->name_en ?? $hospital->name }}"
                                 class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .clients-section {
            background: linear-gradient(180deg, #f9fbff 0%, #ffffff 100%);
            font-family: 'Poppins', 'Open Sans', sans-serif;
        }

        .client-logo {
            background: #fff;
            border-radius: 14px;
            padding: 16px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.35s ease;
        }

        .client-logo img {
            max-height: 70px;
            width: auto;
            object-fit: contain;
            transition: all 0.35s ease;
        }

        .client-logo:hover {
            transform: translateY(-6px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
        }

        .client-logo:hover img {
            transform: scale(1.05);
        }

    </style>
    <!-- Testimonial End -->

    @if(isset($globalFaqs) ? $globalFaqs->count() : (isset($faqs) && $faqs->count()))
        @php
            $list = isset($globalFaqs) ? $globalFaqs : $faqs;
            $dir = $locale=='fa' ? 'rtl' : 'ltr';
            $alignQ = $locale=='fa' ? 'text-center' : 'text-center';
            $alignA = $alignQ;
        @endphp

        <section class="container my-5" dir="{{ $dir }}">
            <h3 class="fw-bold mb-4 {{ $alignQ }}" style="text-align:center;!important">
                {{ $locale=='fa' ? 'سؤالات متداول' : 'Frequently Asked Questions' }}
            </h3>

            <div class="accordion bg-primary" id="faqAccordion">
                @foreach($list as $i => $f)
                    @php
                        $q = $f->question[$locale] ?? ($f->question['fa'] ?? $f->question['en'] ?? '');
                        $a = $f->answer[$locale]   ?? ($f->answer['fa']   ?? $f->answer['en']   ?? '');
                    @endphp
                    <div class="accordion-item shadow-sm mb-2 rounded bg-primary">
                        <h2 class="accordion-header" id="faq-h-{{ $i }}">
                            <button class="accordion-button collapsed {{ $alignQ }}" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq-c-{{ $i }}"
                                    aria-expanded="false"
                                    aria-controls="faq-c-{{ $i }}">
                                {!! $q !!}
                            </button>
                        </h2>
                        <div id="faq-c-{{ $i }}" class="accordion-collapse collapse" aria-labelledby="faq-h-{{ $i }}"
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body  text-white {{ $alignA }}" style="line-height:1.9">
                                {!! $a !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <style>
            .accordion-button {
                font-weight: 600;
            }

            .accordion-button:focus {
                box-shadow: none;
            }

            .accordion-item {
                border: 1px solid #e9ecef;
            }
        </style>
    @endif


    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });
    </script>


@endsection
