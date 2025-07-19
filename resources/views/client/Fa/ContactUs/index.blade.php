@extends('client.En.layout.master')

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
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="container py-5">
                    <div class="row g-5">
                        <div
                            class="col-lg-6 wow fadeIn"
                            data-wow-delay="0.5s"
                            style="min-height: 450px"
                        >
                            <div class="position-relative rounded overflow-hidden h-100">
                                <iframe
                                    class="position-relative w-100 h-100"
                                    src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.41490430824564!2d51.41366731754857!3d35.735108904550856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e014b3f50bceb%3A0x9738e156a73cb02b!2sTehran%20Province%2C%20Tehran%2C%20Shafaq%2017th%20St%2C%20SGC%20Building%2C%20Iran!5e0!3m2!1sen!2s!4v1752392752442!5m2!1sen!2s"

                                    frameborder="0"
                                    style="min-height: 450px; border: 0"
                                    allowfullscreen=""
                                    aria-hidden="false"
                                    tabindex="0"
                                ></iframe>

                                {{--                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.41490430824564!2d51.41366731754857!3d35.735108904550856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e014b3f50bceb%3A0x9738e156a73cb02b!2sTehran%20Province%2C%20Tehran%2C%20Shafaq%2017th%20St%2C%20SGC%20Building%2C%20Iran!5e0!3m2!1sen!2s!4v1752392752442!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

                            </div>
                        </div>

                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="bg-white rounded p-5">
                                <form action="{{ route('clients.contact.store') }}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required />
                                                <label for="name">{{ $locale == 'fa' ? 'نام شما' : 'Your Name' }}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required />
                                                <label for="email">{{ $locale == 'fa' ? 'ایمیل شما' : 'Your Email' }}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" required />
                                                <label for="mobile">{{ $locale == 'fa' ? 'شماره تماس' : 'Your Mobile' }}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <select class="form-select" name="contact_service_id" id="contact_service_id" required>
                                                    <option disabled selected>{{ $locale == 'fa' ? 'انتخاب نوع سرویس' : 'Select Service' }}</option>
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->id }}">
                                                            {{ $locale == 'fa' ? $service->getTranslation('title', 'fa') : $service->getTranslation('title', 'en') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="contact_service_id">{{ $locale == 'fa' ? 'نوع سرویس' : 'Service Type' }}</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating" >
                                                <textarea class="form-control" name="message" id="message" placeholder="Message" style="height: 80px"></textarea>
                                                <label for="message">{{ $locale == 'fa' ? 'پیام شما' : 'Your Message' }}</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary py-3 px-5" type="submit">
                                                {{ $locale == 'fa' ? 'ارسال پیام' : 'Send Message' }}
                                            </button>
                                        </div>
                                        <div class="bg-white rounded p-3">
                                            <div class="d-flex align-items-center bg-primary rounded p-3">
                                                <img class="flex-shrink-0 rounded-circle me-3" src="client/img/profile.jpg" alt="" />
                                                <h5 class="text-white mb-0">
                                                    @if($locale == 'fa')
                                                        تماس با ما: ۰۲۱-۱۲۳۴۵۶۷۸
                                                    @else
                                                        Call Us: +98 21 12345678
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
