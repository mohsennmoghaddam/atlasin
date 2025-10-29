@extends('Admin.layout.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{--                        <div class="row"  >--}}
        {{--                            <div class="col-lg-12 mb-4 order-0">--}}
        {{--                                <div class="card">--}}
        {{--                                    <div class="d-flex align-items-end row">--}}
        {{--                                        <div class="col-sm-7">--}}
        {{--                                            <div class="card-body" style="direction: rtl">--}}
        {{--                                                <h5 class="card-title text-primary">{{$currentUser->name}} عزیز خوش امدید🎉</h5>--}}
        {{--                                                <p class="mb-4">--}}
        {{--                                                    پنل کاربری اطلسین <span class="fw-bold"></span>--}}
        {{--                                                </p>--}}

        {{--                                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-sm-5 text-center text-sm-left">--}}
        {{--                                            <div class="card-body pb-0 px-0 px-md-4">--}}
        {{--                                                <img--}}
        {{--                                                        src="/Admin/assets/img/illustrations/man-with-laptop-light.png"--}}
        {{--                                                        height="140"--}}
        {{--                                                        alt="View Badge User"--}}
        {{--                                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"--}}
        {{--                                                        data-app-light-img="illustrations/man-with-laptop-light.png"--}}
        {{--                                                />--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="col-lg-4 col-md-4 order-1">--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-lg-6 col-md-12 col-6 mb-4">--}}
        {{--                                        <div class="card">--}}
        {{--                                            <div class="card-body">--}}
        {{--                                                <div class="card-title d-flex align-items-start justify-content-between">--}}
        {{--                                                    <div class="avatar flex-shrink-0">--}}
        {{--                                                        <img--}}
        {{--                                                                src="/Admin/assets/img/icons/unicons/chart-success.png"--}}
        {{--                                                                alt="chart success"--}}
        {{--                                                                class="rounded"--}}
        {{--                                                        />--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="dropdown">--}}
        {{--                                                        <button--}}
        {{--                                                                class="btn p-0"--}}
        {{--                                                                type="button"--}}
        {{--                                                                id="cardOpt3"--}}
        {{--                                                                data-bs-toggle="dropdown"--}}
        {{--                                                                aria-haspopup="true"--}}
        {{--                                                                aria-expanded="false"--}}
        {{--                                                        >--}}
        {{--                                                            <i class="bx bx-dots-vertical-rounded"></i>--}}
        {{--                                                        </button>--}}
        {{--                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <span class="fw-semibold d-block mb-1">Profit</span>--}}
        {{--                                                <h3 class="card-title mb-2">$12,628</h3>--}}
        {{--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-lg-6 col-md-12 col-6 mb-4">--}}
        {{--                                        <div class="card">--}}
        {{--                                            <div class="card-body">--}}
        {{--                                                <div class="card-title d-flex align-items-start justify-content-between">--}}
        {{--                                                    <div class="avatar flex-shrink-0">--}}
        {{--                                                        <img--}}
        {{--                                                                src="/Admin/assets/img/icons/unicons/wallet-info.png"--}}
        {{--                                                                alt="Credit Card"--}}
        {{--                                                                class="rounded"--}}
        {{--                                                        />--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="dropdown">--}}
        {{--                                                        <button--}}
        {{--                                                                class="btn p-0"--}}
        {{--                                                                type="button"--}}
        {{--                                                                id="cardOpt6"--}}
        {{--                                                                data-bs-toggle="dropdown"--}}
        {{--                                                                aria-haspopup="true"--}}
        {{--                                                                aria-expanded="false"--}}
        {{--                                                        >--}}
        {{--                                                            <i class="bx bx-dots-vertical-rounded"></i>--}}
        {{--                                                        </button>--}}
        {{--                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <span>Sales</span>--}}
        {{--                                                <h3 class="card-title text-nowrap mb-1">$4,679</h3>--}}
        {{--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <!-- Total Revenue -->--}}
        {{--                            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">--}}
        {{--                                <div class="card">--}}
        {{--                                    <div class="row row-bordered g-0">--}}
        {{--                                        <div class="col-md-8">--}}
        {{--                                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>--}}
        {{--                                            <div id="totalRevenueChart" class="px-2"></div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="col-md-4">--}}
        {{--                                            <div class="card-body">--}}
        {{--                                                <div class="text-center">--}}
        {{--                                                    <div class="dropdown">--}}
        {{--                                                        <button--}}
        {{--                                                                class="btn btn-sm btn-outline-primary dropdown-toggle"--}}
        {{--                                                                type="button"--}}
        {{--                                                                id="growthReportId"--}}
        {{--                                                                data-bs-toggle="dropdown"--}}
        {{--                                                                aria-haspopup="true"--}}
        {{--                                                                aria-expanded="false"--}}
        {{--                                                        >--}}
        {{--                                                            2022--}}
        {{--                                                        </button>--}}
        {{--                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                            <div id="growthChart"></div>--}}
        {{--                                            <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>--}}

        {{--                                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">--}}
        {{--                                                <div class="d-flex">--}}
        {{--                                                    <div class="me-2">--}}
        {{--                                                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="d-flex flex-column">--}}
        {{--                                                        <small>2022</small>--}}
        {{--                                                        <h6 class="mb-0">$32.5k</h6>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="d-flex">--}}
        {{--                                                    <div class="me-2">--}}
        {{--                                                        <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="d-flex flex-column">--}}
        {{--                                                        <small>2021</small>--}}
        {{--                                                        <h6 class="mb-0">$41.2k</h6>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <!--/ Total Revenue -->--}}
        {{--                            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">--}}
        {{--                                <div class="row">--}}
        {{--                                    <div class="col-6 mb-4">--}}
        {{--                                        <div class="card">--}}
        {{--                                            <div class="card-body">--}}
        {{--                                                <div class="card-title d-flex align-items-start justify-content-between">--}}
        {{--                                                    <div class="avatar flex-shrink-0">--}}
        {{--                                                        <img src="/Admin/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="dropdown">--}}
        {{--                                                        <button--}}
        {{--                                                                class="btn p-0"--}}
        {{--                                                                type="button"--}}
        {{--                                                                id="cardOpt4"--}}
        {{--                                                                data-bs-toggle="dropdown"--}}
        {{--                                                                aria-haspopup="true"--}}
        {{--                                                                aria-expanded="false"--}}
        {{--                                                        >--}}
        {{--                                                            <i class="bx bx-dots-vertical-rounded"></i>--}}
        {{--                                                        </button>--}}
        {{--                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <span class="d-block mb-1">Payments</span>--}}
        {{--                                                <h3 class="card-title text-nowrap mb-2">$2,456</h3>--}}
        {{--                                                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="col-6 mb-4">--}}
        {{--                                        <div class="card">--}}
        {{--                                            <div class="card-body">--}}
        {{--                                                <div class="card-title d-flex align-items-start justify-content-between">--}}
        {{--                                                    <div class="avatar flex-shrink-0">--}}
        {{--                                                        <img src="/Admin/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />--}}
        {{--                                                    </div>--}}
        {{--                                                    <div class="dropdown">--}}
        {{--                                                        <button--}}
        {{--                                                                class="btn p-0"--}}
        {{--                                                                type="button"--}}
        {{--                                                                id="cardOpt1"--}}
        {{--                                                                data-bs-toggle="dropdown"--}}
        {{--                                                                aria-haspopup="true"--}}
        {{--                                                                aria-expanded="false"--}}
        {{--                                                        >--}}
        {{--                                                            <i class="bx bx-dots-vertical-rounded"></i>--}}
        {{--                                                        </button>--}}
        {{--                                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>--}}
        {{--                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <span class="fw-semibold d-block mb-1">Transactions</span>--}}
        {{--                                                <h3 class="card-title mb-2">$14,857</h3>--}}
        {{--                                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                    <!-- </div>--}}
        {{--                    <div class="row"> -->--}}
        {{--                                    <div class="col-12 mb-4">--}}
        {{--                                        <div class="card">--}}
        {{--                                            <div class="card-body">--}}
        {{--                                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">--}}
        {{--                                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">--}}
        {{--                                                        <div class="card-title">--}}
        {{--                                                            <h5 class="text-nowrap mb-2">Profile Report</h5>--}}
        {{--                                                            <span class="badge bg-label-warning rounded-pill">Year 2021</span>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="mt-sm-auto">--}}
        {{--                                                            <small class="text-success text-nowrap fw-semibold"--}}
        {{--                                                            ><i class="bx bx-chevron-up"></i> 68.2%</small--}}
        {{--                                                            >--}}
        {{--                                                            <h3 class="mb-0">$84,686k</h3>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div id="profileReportChart"></div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body d-flex align-items-center justify-content-between"
                                 style="direction: rtl">
                                <div>
                                    <h5 class="card-title text-primary">{{ $currentUser->name }} عزیز خوش آمدید 🎉</h5>
                                    <p class="mb-0">پنل کاربری اطلسین <span class="fw-bold"></span></p>
                                </div>
                                {{--                                <div style="margin-left: 100px">--}}
                                {{--                                    <img--}}
                                {{--                                        src="{{ auth()->user()->avatar ? asset('storage/users/'.auth()->user()->avatar) : asset('Admin/assets/img/avatars/default.png') }}"--}}
                                {{--                                        alt="پروفایل"--}}
                                {{--                                        width="80"--}}
                                {{--                                        height="80"--}}
                                {{--                                        class="rounded"--}}
                                {{--                                        style="object-fit: cover;"--}}
                                {{--                                    />--}}
                                {{--                                </div>--}}

                                <div class="mb-3">
                                    <img src="{{asset('Client/img/icon/logo1.png')}}" alt="لوگو"
                                         class="img-fluid mt-5 footer-logo"/>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                        src="/admin/assets/img/illustrations/man-with-laptop-light.png"
                                        height="140"
                                        alt="View Badge User"
                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png"
                                />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Order Statistics</h5>
                            <small class="text-muted">42.82k Total Sales</small>
                        </div>
                        <div class="dropdown">
                            <button
                                    class="btn p-0"
                                    type="button"
                                    id="orederStatistics"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                            >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">8,258</h2>
                                <span>Total Orders</span>
                            </div>
                            <div id="orderStatisticsChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"
                                ><i class="bx bx-mobile-alt"></i
                                    ></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Electronic</h6>
                                        <small class="text-muted">Mobile, Earbuds, TV</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">82.5k</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i
                                                class="bx bx-closet"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Fashion</h6>
                                        <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">23.8k</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i
                                                class="bx bx-home-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Decor</h6>
                                        <small class="text-muted">Fine Art, Dining</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">849k</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"
                                ><i class="bx bx-football"></i
                                    ></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Sports</h6>
                                        <small class="text-muted">Football, Cricket Kit</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">99</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Order Statistics -->

            <!-- Expense Overview -->
            {{--                            <div class="col-md-6 col-lg-4 order-1 mb-4">--}}
            {{--                                <div class="card h-100">--}}
            {{--                                    <div class="card-header">--}}
            {{--                                        <ul class="nav nav-pills" role="tablist">--}}
            {{--                                            <li class="nav-item">--}}
            {{--                                                <button--}}
            {{--                                                        type="button"--}}
            {{--                                                        class="nav-link active"--}}
            {{--                                                        role="tab"--}}
            {{--                                                        data-bs-toggle="tab"--}}
            {{--                                                        data-bs-target="#navs-tabs-line-card-income"--}}
            {{--                                                        aria-controls="navs-tabs-line-card-income"--}}
            {{--                                                        aria-selected="true"--}}
            {{--                                                >--}}
            {{--                                                    Income--}}
            {{--                                                </button>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="nav-item">--}}
            {{--                                                <button type="button" class="nav-link" role="tab">Expenses</button>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="nav-item">--}}
            {{--                                                <button type="button" class="nav-link" role="tab">Profit</button>--}}
            {{--                                            </li>--}}
            {{--                                        </ul>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="card-body px-0">--}}
            {{--                                        <div class="tab-content p-0">--}}
            {{--                                            <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">--}}
            {{--                                                <div class="d-flex p-4 pt-3">--}}
            {{--                                                    <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                        <img src="../assets/img/icons/unicons/wallet.png" alt="User" />--}}
            {{--                                                    </div>--}}
            {{--                                                    <div>--}}
            {{--                                                        <small class="text-muted d-block">Total Balance</small>--}}
            {{--                                                        <div class="d-flex align-items-center">--}}
            {{--                                                            <h6 class="mb-0 me-1">$459.10</h6>--}}
            {{--                                                            <small class="text-success fw-semibold">--}}
            {{--                                                                <i class="bx bx-chevron-up"></i>--}}
            {{--                                                                42.9%--}}
            {{--                                                            </small>--}}
            {{--                                                        </div>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                                <div id="incomeChart"></div>--}}
            {{--                                                <div class="d-flex justify-content-center pt-4 gap-2">--}}
            {{--                                                    <div class="flex-shrink-0">--}}
            {{--                                                        <div id="expensesOfWeek"></div>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div>--}}
            {{--                                                        <p class="mb-n1 mt-1">Expenses This Week</p>--}}
            {{--                                                        <small class="text-muted">$39 less than last week</small>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            <!--/ Expense Overview -->

            {{-- در صفحه‌ی Admin.index (یا داشبورد اصلی) --}}

            <div class="col-md-6 col-lg-4 order-1 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 text-center">آنالیز پیام‌های ارتباط با ما</h5>
                        <span class="badge bg-primary">کل: {{ $totalContacts }}</span>
                    </div>

                    <div class="card-body px-0 text-center" dir="rtl">
                        {{-- چیپ‌های آمار سریع --}}
                        <ul class="list-inline px-4 mb-2">
                            <li class="list-inline-item mb-2">
                                <span class="badge bg-warning text-dark">جدید: {{ $statusCounts['new'] }}</span>
                            </li>
                            <li class="list-inline-item mb-2">
                                <span class="badge bg-info text-dark">خوانده‌شده: {{ $statusCounts['read'] }}</span>
                            </li>
                            <li class="list-inline-item mb-2">
                                <span class="badge bg-success">پاسخ‌داده‌شده: {{ $statusCounts['answered'] }}</span>
                            </li>
                            @if(($statusCounts['other'] ?? 0) > 0)
                                <li class="list-inline-item mb-2">
                                    <span class="badge bg-secondary">سایر: {{ $statusCounts['other'] }}</span>
                                </li>
                            @endif
                        </ul>

                        {{-- تب‌ها: روند ۳۰ روزه / تفکیک وضعیت --}}
                        <ul class="nav nav-pills px-4" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab"
                                        data-bs-toggle="tab" data-bs-target="#tab-contacts-line">
                                    روند ۳۰ روزه
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab"
                                        data-bs-toggle="tab" data-bs-target="#tab-contacts-donut">
                                    تفکیک وضعیت
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content p-0">
                            {{-- خطی/مساحتی: تعداد پیام‌ها در ۳۰ روز گذشته --}}
                            <div class="tab-pane fade show active" id="tab-contacts-line" role="tabpanel">
                                <div class="d-flex p-4 pt-3 row">
                                    {{--                                    <div class="avatar flex-shrink-0 me-3">--}}
                                    {{--                                        <img src="{{ asset('assets/img/icons/unicons/wallet.png') }}" alt="chart" />--}}
                                    {{--                                    </div>--}}
                                    <small class="text-muted">هفته قبل: {{ $lastWeek }}</small>
                                    <div>
                                        <small class="text-muted d-block">
                                            پیام‌های این هفته
                                            <h6 class="mb-0 me-1">{{ $thisWeek }}</h6>
                                            @if(!is_null($weekDelta))
                                                <small class="{{ $weekDelta >= 0 ? 'text-success fw-semibold' : 'text-danger fw-semibold' }}">
                                                    <i class="bx {{ $weekDelta >= 0 ? 'bx-chevron-up' : 'bx-chevron-down' }}"></i>
                                                    {{ $weekDelta }}%
                                                </small>
                                            @endif

                                        </small>
                                        <div class="d-flex align-items-center">

                                        </div>
                                    </div>
                                </div>

                                <div id="contactsLineChart"></div>
                            </div>

                            {{-- دونات: تفکیک وضعیت --}}
                            <div class="tab-pane fade" id="tab-contacts-donut" role="tabpanel">
                                <div id="contactsStatusDonut"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- اسکریپت‌های چارت (اگر apexcharts قبلاً لود نشده، این اسکریپت را اضافه کن) --}}
            <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // داده‌های سرور
                    const labels = @json($labels);   // آرایه تاریخ‌های YYYY-MM-DD
                    const series = @json($series);   // آرایه تعداد در هر روز

                    // ===== نمودار روند ۳۰ روزه
                    const lineOptions = {
                        chart: {type: 'area', height: 260, toolbar: {show: false}},
                        series: [{name: 'تعداد پیام‌ها', data: series}],
                        dataLabels: {enabled: false},
                        stroke: {curve: 'smooth', width: 2},
                        fill: {type: 'gradient', gradient: {opacityFrom: 0.4, opacityTo: 0.1}},
                        xaxis: {
                            categories: labels,
                            labels: {
                                rotate: -45,
                                formatter: function (val) {
                                    // نمایش کوتاه تاریخ شمسی/میلادی
                                    try {
                                        return new Date(val).toLocaleDateString('fa-IR', {
                                            month: '2-digit',
                                            day: '2-digit'
                                        });
                                    } catch (e) {
                                        return val;
                                    }
                                }
                            },
                            tickAmount: 6
                        },
                        yaxis: {
                            labels: {
                                formatter: function (v) {
                                    return Math.round(v);
                                }
                            }
                        },
                        tooltip: {
                            x: {
                                formatter: function (val) {
                                    try {
                                        return new Date(val).toLocaleDateString('fa-IR', {
                                            year: 'numeric',
                                            month: '2-digit',
                                            day: '2-digit'
                                        });
                                    } catch (e) {
                                        return val;
                                    }
                                }
                            }
                        },
                        grid: {strokeDashArray: 4}
                    };
                    new ApexCharts(document.querySelector('#contactsLineChart'), lineOptions).render();

                    // ===== نمودار دوناتِ وضعیت
                    const donutSeries = [
                        {{ $statusCounts['new'] ?? 0 }},
                        {{ $statusCounts['read'] ?? 0 }},
                        {{ $statusCounts['answered'] ?? 0 }},
                        {{ $statusCounts['other'] ?? 0 }},
                    ];
                    const donutOptions = {
                        chart: {type: 'donut', height: 260},
                        labels: ['جدید', 'خوانده‌شده', 'پاسخ‌داده‌شده', 'سایر'],
                        series: donutSeries,
                        legend: {position: 'bottom'},
                        dataLabels: {enabled: true},
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '60%',
                                    labels: {
                                        show: true,
                                        total: {
                                            show: true,
                                            label: 'کل',
                                            formatter: function () {
                                                return donutSeries.reduce((a, b) => a + b, 0);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    };
                    new ApexCharts(document.querySelector('#contactsStatusDonut'), donutOptions).render();
                });
            </script>


            <!-- Transactions -->
            {{--                            <div class="col-md-6 col-lg-4 order-2 mb-4">--}}
            {{--                                <div class="card h-100">--}}
            {{--                                    <div class="card-header d-flex align-items-center justify-content-between">--}}
            {{--                                        <h5 class="card-title m-0 me-2">Transactions</h5>--}}
            {{--                                        <div class="dropdown">--}}
            {{--                                            <button--}}
            {{--                                                    class="btn p-0"--}}
            {{--                                                    type="button"--}}
            {{--                                                    id="transactionID"--}}
            {{--                                                    data-bs-toggle="dropdown"--}}
            {{--                                                    aria-haspopup="true"--}}
            {{--                                                    aria-expanded="false"--}}
            {{--                                            >--}}
            {{--                                                <i class="bx bx-dots-vertical-rounded"></i>--}}
            {{--                                            </button>--}}
            {{--                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">--}}
            {{--                                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
            {{--                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
            {{--                                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="card-body">--}}
            {{--                                        <ul class="p-0 m-0">--}}
            {{--                                            <li class="d-flex mb-4 pb-1">--}}
            {{--                                                <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                    <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />--}}
            {{--                                                </div>--}}
            {{--                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
            {{--                                                    <div class="me-2">--}}
            {{--                                                        <small class="text-muted d-block mb-1">Paypal</small>--}}
            {{--                                                        <h6 class="mb-0">Send money</h6>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div class="user-progress d-flex align-items-center gap-1">--}}
            {{--                                                        <h6 class="mb-0">+82.6</h6>--}}
            {{--                                                        <span class="text-muted">USD</span>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="d-flex mb-4 pb-1">--}}
            {{--                                                <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />--}}
            {{--                                                </div>--}}
            {{--                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
            {{--                                                    <div class="me-2">--}}
            {{--                                                        <small class="text-muted d-block mb-1">Wallet</small>--}}
            {{--                                                        <h6 class="mb-0">Mac'D</h6>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div class="user-progress d-flex align-items-center gap-1">--}}
            {{--                                                        <h6 class="mb-0">+270.69</h6>--}}
            {{--                                                        <span class="text-muted">USD</span>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="d-flex mb-4 pb-1">--}}
            {{--                                                <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                    <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded" />--}}
            {{--                                                </div>--}}
            {{--                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
            {{--                                                    <div class="me-2">--}}
            {{--                                                        <small class="text-muted d-block mb-1">Transfer</small>--}}
            {{--                                                        <h6 class="mb-0">Refund</h6>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div class="user-progress d-flex align-items-center gap-1">--}}
            {{--                                                        <h6 class="mb-0">+637.91</h6>--}}
            {{--                                                        <span class="text-muted">USD</span>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="d-flex mb-4 pb-1">--}}
            {{--                                                <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                    <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded" />--}}
            {{--                                                </div>--}}
            {{--                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
            {{--                                                    <div class="me-2">--}}
            {{--                                                        <small class="text-muted d-block mb-1">Credit Card</small>--}}
            {{--                                                        <h6 class="mb-0">Ordered Food</h6>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div class="user-progress d-flex align-items-center gap-1">--}}
            {{--                                                        <h6 class="mb-0">-838.71</h6>--}}
            {{--                                                        <span class="text-muted">USD</span>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="d-flex mb-4 pb-1">--}}
            {{--                                                <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />--}}
            {{--                                                </div>--}}
            {{--                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
            {{--                                                    <div class="me-2">--}}
            {{--                                                        <small class="text-muted d-block mb-1">Wallet</small>--}}
            {{--                                                        <h6 class="mb-0">Starbucks</h6>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div class="user-progress d-flex align-items-center gap-1">--}}
            {{--                                                        <h6 class="mb-0">+203.33</h6>--}}
            {{--                                                        <span class="text-muted">USD</span>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </li>--}}
            {{--                                            <li class="d-flex">--}}
            {{--                                                <div class="avatar flex-shrink-0 me-3">--}}
            {{--                                                    <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded" />--}}
            {{--                                                </div>--}}
            {{--                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
            {{--                                                    <div class="me-2">--}}
            {{--                                                        <small class="text-muted d-block mb-1">Mastercard</small>--}}
            {{--                                                        <h6 class="mb-0">Ordered Food</h6>--}}
            {{--                                                    </div>--}}
            {{--                                                    <div class="user-progress d-flex align-items-center gap-1">--}}
            {{--                                                        <h6 class="mb-0">-92.45</h6>--}}
            {{--                                                        <span class="text-muted">USD</span>--}}
            {{--                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </li>--}}
            {{--                                        </ul>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            @if(auth()->check() && auth()->user()->hasRole(['Real-Admin','Admin','manager-hospital','hospital-user']))
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">لیست بیمارستان‌ها</h5>
                            <div class="dropdown">
                                <button
                                        class="btn p-0"
                                        type="button"
                                        id="hospitalDropdown"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="hospitalDropdown">
                                    <a class="dropdown-item" href="{{ route('hospitals.create') }}">افزودن بیمارستان</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="max-height: 350px; overflow-y: auto;">
                            <ul class="p-0 m-0">
                                @forelse($hospitals as $hospital)
                                    <li class="d-flex mb-4 pb-1 border-bottom">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ asset('storage/' . $hospital->image) }}"
                                                 alt="{{ $hospital->name }}" class="rounded" width="40" height="40">
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <small class="text-muted d-block mb-1">{{ $hospital->website ? 'وب‌سایت دارد' : 'بدون وب‌سایت' }}</small>
                                                <h6 class="mb-0">{{ $hospital->name }}</h6>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <a href="{{ route('hospitals.edit', $hospital) }}"
                                                   class="btn btn-sm btn-primary">ویرایش</a>
                                                <form action="{{ route('hospitals.destroy', $hospital) }}" method="POST"
                                                      onsubmit="return confirm('حذف شود؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger ms-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center text-muted">هیچ بیمارستانی ثبت نشده است.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <!--/ Transactions -->
            @if(auth()->check() && auth()->user()->hasRole(['Real-Admin','moderator']))
                <div class="col-md-4 col-lg-4 order-2 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">لیست کاربران</h5>
                            <div class="dropdown">
                                <button
                                        class="btn p-0"
                                        type="button"
                                        id="usersDropdown"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="usersDropdown">
                                    <a class="dropdown-item" href="{{ route('users.create') }}">افزودن کاربر</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="max-height: 350px; overflow-y: auto;">
                            <ul class="p-0 m-0">
                                @forelse($users as $user)
                                    <li class="d-flex mb-4 pb-1 border-bottom">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <img src="{{ $user->avatar ? asset('storage/users/' . $user->avatar ) : asset('assets/img/avatars/default.png') }}"
                                                 alt="{{ $user->name }}"
                                                 class="rounded" width="40" height="40">

                                        </div>

                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                                <small class="text-primary">
                                                    نقش‌ها: {{ implode(', ', $user->roles->pluck('name')->toArray()) }}
                                                </small>
                                                <small class="text-muted d-block mb-1">
                                                    {{ $user->email }}
                                                </small>
                                            </div>

                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <a href="{{ route('users.edit', $user) }}"
                                                   class="btn btn-sm btn-primary">ویرایش</a>
                                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                                      onsubmit="return confirm('حذف شود؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger ms-1">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center text-muted">هیچ کاربری یافت نشد.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 order-1 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="card-title m-0">لیست پیام‌ها</h6>
                                <span class="badge bg-danger">{{ $contactsQuick->count() }}</span>
                            </div>

                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="contactsDropdown" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="contactsDropdown">
                                    <a class="dropdown-item" href="{{ route('contact.index') }}">مشاهده همه پیام‌ها</a>
                                    <a class="dropdown-item" href="{{ route('contact-services.index') }}">سرویس‌های تماس
                                        با ما</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="max-height: 350px; overflow-y: auto;" dir="rtl">
                            @php $locale = app()->getLocale(); @endphp
                            <ul class="p-0 m-0 list-unstyled">
                                @forelse($contactsQuick as $contact)
                                    <li class="d-flex mb-4 pb-3 border-bottom">
                                        {{-- آواتار ساده با حرف اول نام --}}
                                        <div class="avatar flex-shrink-0 me-3">
                                            <div class="bg-primary text-white rounded d-flex align-items-center justify-content-center"
                                                 style="width:40px;height:40px;">
                                <span style="font-weight:700;">
                                  {{ mb_substr($contact->name ?? '؟', 0, 1, 'UTF-8') }}
                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2" style="min-width:0;">
                                                <h6 class="mb-1 text-truncate" style="max-width:220px;">
                                                    {{ $contact->name ?? 'بدون‌نام' }}
                                                    <small class="text-muted">#{{ $contact->id }}</small>
                                                </h6>

                                                <small class="d-block text-primary text-truncate"
                                                       style="max-width:260px;">
                                                    موضوع: {{ $contact->contactService?->getTranslation('title', $locale) ?? '-' }}
                                                </small>

                                                <small class="text-muted d-block text-truncate"
                                                       style="max-width:260px;">
                                                    موبایل: <a
                                                            href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a>
                                                </small>
                                                <small class="text-muted d-block text-truncate"
                                                       style="max-width:260px;">
                                                    ایمیل: <a
                                                            href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                                </small>

                                                <div class="mt-1 d-flex align-items-center gap-2 flex-wrap">
                                                    @switch($contact->status)
                                                        @case('new')
                                                            <span class="badge bg-warning text-dark">جدید</span>
                                                            @break
                                                        @case('read')
                                                            <span class="badge bg-info text-dark">خوانده شده</span>
                                                            @break
                                                        @case('answered')
                                                            <span class="badge bg-success">پاسخ داده شده</span>
                                                            @break
                                                        @default
                                                            <span class="badge bg-secondary">نامشخص</span>
                                                    @endswitch

                                                    @if(!empty($contact->created_at))
                                                        <small class="text-muted">{{ $contact->created_at->diffForHumans() }}</small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center gap-1">
                                                <a href="{{ route('contact.show', $contact) }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="bx bx-show"></i> مشاهده
                                                </a>
                                                <form action="{{ route('contact.destroy', $contact) }}" method="POST"
                                                      onsubmit="return confirm('آیا مطمئن هستید که می‌خواهید حذف کنید؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="bx bx-trash"></i> حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center text-muted py-3">پیامی یافت نشد.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
