@extends('Client.EN.layout.master')

@section('content')

    <!-- Page Header Start -->
    <div
            class="container-fluid page-header py-5 mb-5 wow fadeIn"
            data-wow-delay="0.1s"
    >
        <div class="container py-5">
            <h1 class="display-4 animated slideInDown mb-4">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Contact Us
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5" style="direction: ltr">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-3 fw-bold text-primary">Atlasin Co.</h1>
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Tehran, Shahid Beheshti St., SGC Building, Iran</p>
                    <p class="mb-4"><i class="fas fa-phone-alt me-2 text-primary"></i> +98 21 88725434</p>

                    <!-- Info Boxes -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="bg-light rounded p-4 h-100 d-flex align-items-start">
                                <i class="fas fa-clock fa-2x text-primary me-3"></i>
                                <div>
                                    <h6 class="mb-1">Working Hours</h6>
                                    <small>Saturday – Wednesday: 8 AM – 4 PM</small>
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
                                    <small>24/7 Available</small>
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

                <!-- Google Map -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px">
                    <div class="position-relative rounded overflow-hidden h-100 shadow">
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

    <!-- Contact Form + Lottie Animation -->
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Lottie Animation -->
                <div class="col-lg-5 text-center wow fadeIn" data-wow-delay="0.1s">
                    <dotlottie-wc
                        src="https://lottie.host/dd717337-73bf-4543-b732-e77d006cfab5/vQPmNanrNO.lottie"
                        style="width: 100%; height: 300px"
                        autoplay
                        loop
                    ></dotlottie-wc>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow p-4 p-md-5">
                        <h3 class="text-center mb-4 text-primary">Send Us a Message</h3>
                        <form action="{{ route('clients.contact.store') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Your Mobile" required>
                                        <label for="mobile">Your Mobile</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="contact_service_id" id="contact_service_id" required>
                                            <option disabled selected>Select a Service</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->getTranslation('title', 'en') }}</option>
                                            @endforeach
                                        </select>
                                        <label for="contact_service_id">Service Type</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" id="message" placeholder="Your Message" style="height: 100px"></textarea>
                                        <label for="message">Your Message</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button class="btn btn-primary px-5 py-3" type="submit">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lottie Script -->
    <script
        src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js"
        type="module"
    ></script>

    <!-- Contact End -->

@endsection
