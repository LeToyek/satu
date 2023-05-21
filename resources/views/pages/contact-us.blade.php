@extends('layouts.index')
@section('container')
    <!--====== Page Title Start ======-->
    <section class="page-title-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h1 class="page-title">Hubungi Kami</h1>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Hubungi Kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Contact Section Start ======-->
    <section class="contact-section section-gap-extra-bottom">
        <div class="container">
            <!-- Contact Info Start -->
            <div class="row align-items-center justify-content-center">
                <div class="col-lx-4 col-lg-5 col-sm-10">
                    <div class="contact-info-text mb-md-70">
                        <div class="common-heading mb-30">
                            <span class="tagline">
                                <i class="fas fa-plus"></i> Dari Kami
                                <span class="heading-shadow-text">Hubungi Kami</span>
                            </span>
                            <h2 class="title">Siap Mendapatkan Informasi Lebih Lanjut</h2>
                        </div>
                        <p>
                            Kami sangat ingin mendengar dari Anda! Jika Anda memiliki pertanyaan, saran, atau ingin
                            berbicara dengan tim kami, silakan hubungi kami melalui formulir
                            kontak di samping ini.

                            Kami berkomitmen untuk menjawab setiap pertanyaan dengan cepat dan memberikan dukungan penuh
                            kepada para pengguna Saling Bantu. Terima kasih atas dukungan Anda dan semangat berbagi pada
                            platform kami.
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 offset-xl-1">
                    <div class="contact-info-boxes">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-6 col-sm-10">
                                <div class="info-box text-center wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="icon">
                                        <i class="flaticon-place"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Lokasi</h5>
                                        <p>
                                            Malang, Jawa Timur, Indonesia
                                        </p>
                                    </div>
                                </div>
                                <div class="info-box text-center mt-30 mb-sm-30 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="icon">
                                        <i class="flaticon-envelope"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Alamat Email</h5>
                                        <p>
                                            salingbantu@gmail.com <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-10">
                                <div class="info-box text-center wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="icon">
                                        <i class="flaticon-phone-call-1"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5>Nomor Telepon</h5>
                                        <p>
                                            +6281679246178 <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Info End -->
            <div class="contact-from-area">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="contact-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15814.990497476976!2d112.6142844!3d-7.952551399999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1fd2e53a9af1d4e6!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sen!2sid!4v1652231149276!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>                        
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <form id="contactForm" action="assets/php/form-process.php" name="contactForm" method="post">
                                <h3 class="form-title">Kirim Pesan Kepada Kami</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-field form-group mb-25">
                                            <label for="name">Nama</label>
                                            <input type="text" placeholder="Masukkan nama anda" name="name"
                                                id="name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-field form-group mb-25">
                                            <label for="phone-number">Nomor Telepon</label>
                                            <input type="text" placeholder="Masukkan nomor telepon anda" id="phone-number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-field form-group mb-25">
                                            <label for="email">Alamat Email</label>
                                            <input type="text" placeholder="Masukkan alamat email anda" id="email"
                                                name="email" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-field form-group mb-25">
                                            <label for="subject">Subjek</label>
                                            <input type="text" placeholder="Masukkan subjek pesan anda" id="subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-field form-group mb-30">
                                            <label for="message">Pesan</label>
                                            <textarea id="message" placeholder="Masukkan pesan anda" required name="message" data-error="Please enter your name"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-field form-group">
                                            <button type="submit" class="main-btn">Kirim <i
                                                    class="far fa-arrow-right"></i></button>
                                            <div id="msgSubmit" class="hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Section End ======-->
@endsection
