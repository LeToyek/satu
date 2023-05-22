@extends('layouts.index')
@section('container')
    <!--====== Page Title Start ======-->
    <section class="page-title-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h1 class="page-title">Cara Kerja Mitra</h1>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Cara Kerja Mitra</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Event area Start ======-->
    <section class="event-area section-gap-extra-bottom" style="padding-bottom: 110px";>
        <div class="container">
            <div class="event-items">
                <div class="single-event-item mb-30 wow fadeInUp" data-wow-delay="0s">
                    <div class="event-thumb">
                        <img src="../assets/img/event/daftar.png" alt="Image">
                    </div>
                    <div class="event-content">
                        <h4 class="event-title"><a href="#">Pendaftaran Mitra UMKM</a></h4>
                        <p>
                            Mitra UMKM yang ingin menggunakan layanan SaTu harus mendaftar terlebih dahulu. Pendaftaran ini
                            meliputi pengisian profil usaha, produk yang dijual, dan jumlah dana yang dibutuhkan. Selain
                            itu, UMKM juga harus menyertakan dokumen pendukung seperti izin usaha, laporan keuangan, dan
                            gambar produk.
                        </p>
                    </div>
                </div>
                <div class="single-event-item mb-30 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="event-thumb">
                        <img src="../assets/img/event/verifikasi.png" alt="Image">
                    </div>
                    <div class="event-content">
                        <h4 class="event-title"><a href="#">Pengecekan dan Verifikasi</a></h4>
                        <p>
                            Setelah pendaftaran, tim SaTu akan melakukan pengecekan dan verifikasi terhadap profil usaha dan
                            dokumen pendukung yang disertakan. Jika dinyatakan lulus verifikasi, UMKM akan diterima sebagai
                            calon penerima dana.
                        </p>
                    </div>
                </div>
                <div class="single-event-item mb-30 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="event-thumb">
                        <img src="../assets/img/event/campaign.png" alt="Image">
                    </div>
                    <div class="event-content">
                        <h4 class="event-title"><a href="#">Kampanye Crowdfunding</a></h4>
                        <p>
                            Setelah lulus verifikasi, UMKM akan membuat kampanye crowdfunding di platform SaTu. Kampanye ini
                            harus menarik minat potensial donatur dan menjelaskan tujuan penggalangan dana, penggunaan dana,
                            dan memberikan informasi terperinci tentang usaha yang mereka ppromosikan untuk didanai.
                    </div>
                </div>
                <div class="single-event-item mb-30 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="event-thumb">
                        <img src="../assets/img/event/crowdfunding.png" alt="Image">
                    </div>
                    <div class="event-content">
                        <h4 class="event-title"><a href="#">Donasi</a></h4>
                        <p>
                            Setiap orang yang tertarik dengan kampanye penggalangan dana dapat memberikan donasi melalui
                            aplikasi SaTu dengan cara melakukan transfer uang melalui rekening bank yang telah disediakan
                            oleh SaTu. Setelah berhasil melakukan donasi, donatur akan mendapatkan notifikasi bahwa donasi
                            mereka telah berhasil terkirim.
                        </p>
                    </div>
                </div>
                <div class="single-event-item mb-30 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="event-thumb">
                        <img src="../assets/img/event/dana.png" alt="Image">
                    </div>
                    <div class="event-content">
                        <h4 class="event-title"><a href="#">Pencairan Dana</a></h4>
                        <p>
                            Jika UMKM berhasil mencapai target dana yang ditentukan dalam jangka waktu yang telah
                            ditentukan, maka tim SaTu akan mencairkan dana kepada UMKM sesuai dengan jumlah yang terkumpul.
                            UMKM juga harus memberikan laporan penggunaan dana kepada SaTu dan donatur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Event area End ======-->
@endsection
