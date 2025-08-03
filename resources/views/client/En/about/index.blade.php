@extends('client.En.layout.master')

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
        .about-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 10%;
            font-family: sans-serif;
            direction: ltr;
            gap: 40px;
            flex-wrap: wrap;
        }

        .about-container.ltr { direction: ltr; }

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
    <div class="about-container ltr">
        <div class="timeline" id="timelineYearsEn">
            <div class="timeline-item active" data-id="y1989">1989</div>
            <div class="timeline-item" data-id="y1991">1991</div>
            <div class="timeline-item" data-id="y2012">2012</div>
            <div class="timeline-item" data-id="y2021">2021</div>
            <div class="timeline-item" data-id="today">Today</div>
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
        <div class="about-text" id="aboutTextEn">
            <h2>About Us</h2>
            <p>Founded in 1989, Atlasin started its journey in medical gas systems with AirSep.</p>
        </div>
    </div>
    <script>
        const yearDataEn = {
            y1989: "Founded in 1989, Atlasin started its journey in medical gas systems with AirSep.",
            y1991: "Launched a large-scale industrial oxygen system.",
            y2012: "Independently manufactured oxygen systems in multiple capacities.",
            y2021: "Supplied over 150 healthcare centers during the COVID-19 pandemic.",
            today: "Providing full medical gas system services to over 500 hospitals across Iran."
        };
        document.querySelectorAll('#timelineYearsEn .timeline-item').forEach(el => {
            el.addEventListener('click', () => {
                document.querySelector('#timelineYearsEn .active')?.classList.remove('active');
                el.classList.add('active');
                const text = yearDataEn[el.dataset.id];
                document.querySelector("#aboutTextEn p").innerText = text;
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
                <p>Atlasin proudly introduced PSA oxygen generation technology to Iran in 1989 and installed the first 120 m³/h PSA oxygen generator that same year. In 1991, the first hospital oxygen generator was also installed and is still operating efficiently today.</p>
            </div>
            <div class="card-en">
                <h4>Growth in Production</h4>
                <p>With over 23 years of experience in PSA and VPSA systems, and more than 300 oxygen and nitrogen generation units installed, Atlasin has significantly reduced healthcare and industrial costs while offering tailored solutions.</p>
            </div>
            <div class="card-en">
                <h4>International Certifications</h4>
                <p>Atlasin implemented a quality management system in 2009 and received ISO9001 from DQS Germany. In 2011, we implemented ISO10002 (Customer Satisfaction) and ISO13485 (Medical Devices) systems and received their certifications.</p>
            </div>
            <div class="card-en">
                <h4>Portable Oxygen Solutions</h4>
                <p>For over 20 years, Atlasin has provided home and portable oxygen generators for patients and veterans, replacing bulky oxygen cylinders with reliable, accessible solutions for peace of mind.</p>
            </div>
            <div class="card-en">
                <h4>National Medical Support</h4>
                <p>With over 24 years of experience, Atlasin has installed over 250 oxygen, compressed air, and vacuum systems across hospitals and medical centers nationwide, earning top rankings in customer service.</p>
            </div>
            <div class="card-en">
                <h4>Our Partnerships</h4>
                <p>Atlasin is the exclusive distributor of renowned global brands such as AIRSEP (USA), MILS (France), AMICO (Canada), ACEM (Italy), HAUX (Germany), and WEINMANN (Germany), providing cutting-edge medical systems and solutions.</p>
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
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Tehran, Shahid Beheshti St, Iran</p>
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
