<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio - Rezky</title>
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css')}}">
    <link href="{{url('https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css')}}">
    <link rel="stylesheet" href="{{url('https://unpkg.com/aos@next/dist/aos.css)')}}" />
    <link rel="stylesheet" href="{{url('landingpage_template/css/style.css')}}" />

    @if ($homes->isNotEmpty())
    @foreach($homes as $home)
    <style>
        html {
            scroll-behavior: smooth;
        }


        /* HERO */
        #hero {
            background: linear-gradient(rgba(128, 128, 128, 0.5), rgba(0, 0, 0, 0.3)),
            url("{{ asset('storage/' . $home->photo) }}");
            background-position: center;
            background-size: cover;
        }

        .center-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            /* Set ukuran minimal kartu */
            gap: 20px;
            /* Jarak antar kartu */
            justify-content: center;
            /* Untuk menengahkan item */
        }

        /* style untuk certificates */
        .certificate-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
            background: #fff;
        }

        .certificate-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .certificate-title {
            font-weight: bold;
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .certificate-item p {
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #555;
        }

        .certificate-item .btn {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        /* css untuk projects */
        .project-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            background-color: #8d8d8d;
            color: #fff;
        }

        .project-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .project-item .image-zoom-wrapper img {
            border-radius: 10px 10px 0 0;
            max-width: 100%;
            height: auto;
        }

        .project-content {
            text-align: left;
        }

        .project-content h4 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .project-content p {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .project-content .btn {
            margin-top: 10px;
            font-size: 0.85rem;
        }

        .project-image {
            width: 100%;
            /* Full width */
            padding-top: 56.25%;
            /* 16:9 aspect ratio */
            position: relative;
            overflow: hidden;
            background: #000;
            /* Background in case of missing image */
        }

        /* Image settings */
        .project-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Fill the container while maintaining aspect ratio */
        }

        /* Project Content Styling */
        .project-content {
            background-color: #1c1c1c;
            /* Dark background for content */
            border-radius: 10px;
            /* Rounded corners */
            color: #fff;
            /* White text */
        }

        .project-content h4 {
            font-size: 1.25rem;
            /* Adjust heading size */
        }

        .project-content p {
            font-size: 0.9rem;
            /* Adjust text size */
        }

        .project-content .btn {
            margin-top: 10px;
        }

        /* style untuk skills */
        .center-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Untuk memusatkan secara horizontal */
            gap: 20px;
            /* Jarak antar item */
        }

        .service {
            flex: 0 0 calc(25% - 20px);
            /* 25% lebar dengan margin antar item */
            max-width: calc(25% - 20px);
            text-align: center;
            /* Untuk memusatkan teks */
        }

        @media (max-width: 768px) {
            .service {
                flex: 0 0 calc(50% - 20px);
                /* 2 item per baris */
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .service {
                flex: 0 0 100%;
                /* 1 item per baris */
                max-width: 100%;
            }
        }

        /* style untuk navbar */
        .navbar {
            transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            display: flex;
            justify-content: center;
            /* Pusatkan elemen navbar */
            align-items: center;
            /* Pastikan vertikal terpusat */
            height: 70px;
            /* Sesuaikan tinggi navbar */
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            /* Tambahkan jarak antar item */
        }

        .navbar.transparent {
            background-color: transparent;
            box-shadow: none;
        }

        .navbar.scrolled {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: 500;
            color: var(--c-dark);
            /* Gunakan variabel warna atau nilai hex */
        }

        .navbar-nav .nav-link:hover {
            color: var(--c-brand);
            /* Warna hover */
        }

        .container {
            background-color: transparent;
        }

        /* Warna link default (saat di atas) */
        .navbar.transparent .nav-link {
            color: white;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
            transition: color 0.3s ease;
        }

        /* Warna link saat digulir */
        .navbar.scrolled .nav-link {
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            color: black;
        }

        .iconbox img {
            max-width: 100px;
            /* Atur ukuran maksimum */
            max-height: 100px;
            width: auto;
            /* Biarkan gambar menyesuaikan */
            height: auto;
            border-radius: 10px;
        }

        .service {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        footer {
            background: #333;
            /* Warna abu gelap */
            color: #ddd;
            /* Warna teks yang lembut */
            font-size: 0.9rem;
        }

        footer p {
            margin: 0;
            color: #aaa;
        }

        footer a {
            color: #aaa;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #fff;
            /* Warna putih saat hover */
            text-decoration: underline;
        }

        footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        footer .list-inline-item {
            display: inline;
            margin-right: 10px;
        }

        footer .list-inline-item:last-child {
            margin-right: 0;
        }

        /* style untuk about */
        .section-padding {
            padding: 60px 15px;
            /* Memberi padding atas dan bawah */
        }

        .section-title .line {
            width: 60px;
            height: 4px;
            margin: 10px auto;
            background-color: #007bff;
            /* Ubah warna sesuai tema Anda */
            border-radius: 4px;
        }

        #about img {
            max-width: 100%;
            /* Supaya gambar tidak melebihi lebar kontainer */
            border-radius: 10px;
            /* Beri sudut melengkung agar terlihat lebih halus */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan */
        }

        #about h1 {
            font-size: 2rem;
            /* Ukuran font untuk heading */
        }

        #about p {
            color: #6c757d;
            /* Warna teks abu-abu untuk subtitle */
            font-size: 1.1rem;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            #about img {
                margin-bottom: 20px;
                /* Beri jarak antara gambar dan teks */
            }

            #about h1 {
                font-size: 1.5rem;
                /* Perkecil heading pada layar kecil */
            }

            #about p {
                font-size: 1rem;
                /* Perkecil subtitle pada layar kecil */
            }
        }
    </style>
    @endforeach
    @else
    <p>No content available at the moment. Please check back later.</p>
    @endif

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top transparent">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#certificates">Certificates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($homes->isNotEmpty())
                    @foreach($homes as $home)
                    <h1 data-aos="fade-left" class="text-uppercase text-white fw-semibold display-1">{{$home->tagline}}</h1>
                    <h5 class="text-white mt-3 mb-4" data-aos="fade-right">{{$home->description}}</h5>
                    <div data-aos="fade-up" data-aos-delay="50">
                        <a href="#about" class="btn btn-brand me-2">Get Started</a>
                        <a href="#certificates" class="btn btn-light ms-2">My Certificates</a>
                    </div>
                    @endforeach
                    @else
                    <p>No content available at the moment. Please check back later.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="section-padding">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="50">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">About Me</h1>
                        <div class="line"></div>
                        <p>We love to craft digital experiences for brands rather than crap and more lorem ipsums and do crazy skills.</p>
                    </div>
                </div>
            </div>

            @if ($abouts->isNotEmpty())
            @foreach($abouts as $about)
            <!-- Content Rows -->
            <div class="row justify-content-between align-items-center mt-5">
                <!-- Image -->
                <div class="col-lg-6 col-md-12 mb-4" data-aos="fade-down" data-aos-delay="50">
                    <img src="{{asset('storage/' . $about->photo)}}" alt="About Image">
                </div>
                <!-- Text -->
                <div class="col-lg-5 col-md-12" data-aos="fade-down" data-aos-delay="150">
                    <h1>{{$about->title}}</h1>
                    <p class="mt-3 mb-4">{{$about->subtitle}}</p>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center mt-4">No content available at the moment. Please check back later.</p>
            @endif
        </div>
    </section>

    <section id="skills" class="section-padding border-top">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Skills</h1>
                        <div class="line"></div>
                        <p>We love to craft digital experiances for brands rather than crap and more lorem ipsums and do crazy skills</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                @if ($skills->isNotEmpty())
                <div class="center-content d-flex flex-wrap justify-content-center">
                    @foreach($skills as $skill)
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <img src="{{ asset('storage/' . $skill->photo) }}" alt="" class="img-fluid">
                        </div>
                        <h5 class="mt-4 mb-3">{{ $skill->title }}</h5>
                    </div>
                    @endforeach
                </div>
                @else
                <p>No skills available</p>
                @endif
            </div>
        </div>
    </section>


    <!-- CERTIFICATES -->
    <section id="certificates" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">My Certificates</h1>
                        <div class="line mx-auto"></div>
                        <p>Explore our achievements, verified certifications, and expertise in various fields.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center text-center">
                @foreach($certificates as $certificate)
                <div class="col-md-6 col-lg-4 mx-auto align-items-stretch" data-aos="fade-down" data-aos-delay="150">
                    <div class="certificate-item theme-shadow p-lg-4 p-3">
                        <h5 class="certificate-title">{{ $certificate->title }}</h5>
                        <p><strong>Issued At:</strong> {{ \Carbon\Carbon::parse($certificate->issued_at)->format('d M Y') }}</p>
                        <p><strong>Issued By:</strong> {{ $certificate->issued_by }}</p>
                        <p>{{ Str::limit($certificate->description, 100) }}</p>
                        <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank" class="btn btn-brand btn-sm">View Certificate (PDF)</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects" class="section-padding">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">My Projects</h1>
                        <div class="line"></div>
                        <p>Check out our amazing projects showcasing our expertise and creativity.</p>
                    </div>
                </div>
            </div>

            <!-- Project Items -->
            <div class="row g-4 justify-content-center text-center">
                @foreach($projects as $project)
                <div class="col-md-4 col-lg-4 mx-auto align-items-stretch" data-aos="fade-down" data-aos-delay="150">
                    <div class="project-item image-zoom">
                        <!-- Image Container with Fixed Ratio -->
                        <div class="project-image">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-fluid">
                        </div>

                        <!-- Project Content -->
                        <div class="project-content p-3">
                            <h4 class="text-white">{{ $project->title }}</h4>
                            <p class="mb-2 text-white">{{ Str::limit($project->description, 100) }}</p>
                            <p class="text-white small">
                                <strong>Date:</strong> {{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}
                            </p>
                            <a href="{{ $project->link }}" target="_blank" class="btn btn-brand btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="section-padding bg-light" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 text-white fw-semibold">Get in touch</h1>
                        <div class="line bg-white"></div>
                        <p class="text-white">I love to craft digital experiances for brands rather than crap and more lorem ipsums and do crazy skills</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="250">
                <div class="col-lg-8">
                    <form action="{{ route('admin.contact.store') }}" class="row g-3 p-lg-5 p-4 bg-white theme-shadow" method="POST">
                        @csrf
                        <div class="form-group col-lg-12">
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" rows="5" class="form-control" placeholder="Enter your message" required>{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="date" name="date" class="form-control" value="{{ old('date', now()->toDateString()) }}" required>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button type="submit" class="btn btn-brand">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4">
        <div class="footer-top">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row g-4 justify-content-between align-items-center">
                        <div class="col-auto">
                            <p class="mb-0 text-center text-md-start">© Copyright ReSky-07. All Rights Reserved</p>
                        </div>
                        <div class="col-auto">
                            <ul class="list-inline mb-0 text-center text-md-end">
                                <li class="list-inline-item">
                                    <a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a>
                                </li>
                                <li class="list-inline-item mx-3">|</li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-white-50 text-decoration-none">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.querySelector(".navbar");
            const changePoint = 120; // Ketinggian di mana navbar berubah, bisa diubah sesuai kebutuhan

            window.addEventListener("scroll", function() {
                if (window.scrollY > changePoint) {
                    navbar.classList.remove("transparent");
                    navbar.classList.add("scrolled");
                } else {
                    navbar.classList.remove("scrolled");
                    navbar.classList.add("transparent");
                }
            });
        });
    </script>

    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js')}}"></script>
    <script src="{{url('https://unpkg.com/aos@next/dist/aos.js')}}"></script>
    <script src="{{url('landingpage_template/js/main.js')}}"></script>
</body>

</html>