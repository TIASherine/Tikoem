@extends('layouts.admin.app')

@section('content')

<!-- Main Content -->
 
<header class="container pt-4 pb-3">
    <h1 class="h2">Selamat datang, {{ session('name') }} !</h1>
</header>

<div id="dashboard-content" class="container py-4">
    <div class="row g-4">

        <div class="col-lg-8 d-flex align-items-stretch">
            <section class="card w-100">
                <div class="card-body">
                    <header class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="card-title h5 fw-semibold">Pemasukan & Pengeluaran</h2>
                    </header>
                    <canvas id="earning"></canvas>
                </div>
            </section>
        </div>

        <div class="col-lg-4 d-flex align-items-stretch">

            <!-- Aktivitas Terbaru Card -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold"> Aktivitas Terbaru </h5>
                    <ul class="timeline-widget mb-0 position-relative mb-n5"
                        style="list-style: none; padding-left: 0;">
                        <li class="timeline-item d-flex position-relative overflow-hidden mb-3">
                            <div class="timeline-time text-dark flex-shrink-0 text-end" style="width: 60px;">09:30
                            </div>
                            <div class="timeline-badge-wrap d-flex flex-column align-items-center mx-2">
                                <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-2"
                                    style="width: 12px; height: 12px; border-radius: 50%;"></span>
                                <span class="timeline-badge-border d-block flex-shrink-0"
                                    style="width: 2px; background-color: var(--primary-color); flex-grow: 1;"></span>
                            </div>
                            <div class="timeline-desc fs-6 text-dark mt-n1 flex-grow-1">Payment received from John
                                Doe of $385.90
                            </div>
                        </li>
                        <li class="timeline-item d-flex position-relative overflow-hidden mb-3">
                            <div class="timeline-time text-dark flex-shrink-0 text-end" style="width: 60px;">10:00
                                am</div>
                            <div class="timeline-badge-wrap d-flex flex-column align-items-center mx-2">
                                <span class="timeline-badge border-2 border flex-shrink-0 my-2"
                                    style="width: 12px; height: 12px; border-radius: 50%; border-color: var(--tertiary-color) !important;"></span>
                                <span class="timeline-badge-border d-block flex-shrink-0"
                                    style="width: 2px; background-color: var(--tertiary-color); flex-grow: 1;"></span>
                            </div>
                            <div class="timeline-desc fs-6 text-dark mt-n1 fw-semibold flex-grow-1">New sale
                                recorded <a href="javascript:void(0)" class="d-block fw-normal"
                                    style="color: var(--primary-color);">#ML-3467</a>
                            </div>
                        </li>
                        <li class="timeline-item d-flex position-relative overflow-hidden mb-3">
                            <div class="timeline-time text-dark flex-shrink-0 text-end" style="width: 60px;">12:00
                                am</div>
                            <div class="timeline-badge-wrap d-flex flex-column align-items-center mx-2">
                                <span class="timeline-badge border-2 border border-success flex-shrink-0 my-2"
                                    style="width: 12px; height: 12px; border-radius: 50%;"></span>
                                <span class="timeline-badge-border d-block flex-shrink-0"
                                    style="width: 2px; background-color: #28a745; flex-grow: 1;"></span>
                            </div>
                            <div class="timeline-desc fs-6 text-dark mt-n1 flex-grow-1">Payment was made of $64.95
                                to Michael
                            </div>
                        </li>
                        <!-- Add more timeline items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection