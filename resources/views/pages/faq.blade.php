@extends('layouts.index')
@section('container')
    <section class="page-title-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h1 class="page-title">FAQ</h1>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== FAQ Area Start ======-->
    <section class="faq-section section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="faq-accordion-tab">
                        <div class="tab-nav-area text-center">
                            <ul class="nav nav-tabs" id="faqTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#speakers" role="tab">Crowdfunding</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#pricing" role="tab">Pendana</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#support" role="tab">Mitra</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#history" role="tab">Keamanan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="faqTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="accordion" id="accordionFaqOne">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-1-1">
                                            Bagaimana SaTu menyimpan data yang telah saya berikan?
                                        </h5>
                                        <div id="accordion-1-1" class="collapse show" data-parent="#accordionFaqOne">
                                            <div class="accordion-content">
                                                SaTu mempertahankan dokumen yang terkait dengan Dokumentasi Identifikasi
                                                Pelanggan (CID) minimal selama lima tahun. Namun, jika Anda ingin
                                                menghapus
                                                data Anda sesuai dengan peraturan hukum yang berlaku, Anda dapat meminta
                                                bantuan dari tim dukungan pelanggan kami.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-1-2">
                                            Apakah keunikan SaTu?
                                        </h5>
                                        <div id="accordion-1-2" class="collapse" data-parent="#accordionFaqOne">
                                            <div class="accordion-content">
                                                <b>Pertama,</b> pendana di SaTu, baik itu individu maupun institusional
                                                (perusahaan), melakukan pendanaan dengan tujuan sosial. Artinya, mereka
                                                mendanai usaha Mikro serta Usaha Kecil dan Menengah (UMKM)
                                                untuk membantu kemajuan dan meningkatkan daya saing bisnis tersebut.
                                                <br>
                                                <b>Kedua,</b> pendanaan SaTu disalurkan kepada pihak penerima pinjaman
                                                setelah melewati
                                                seleksi ketat menggunakan credit scoring dan analisis risiko menyeluruh
                                                untuk memilih calon penerima pinjaman yang memenuhi kriteria
                                                (credit-worthy
                                                borrowers). Selama lebih dari 5 tahun, kami telah berpengalaman dalam
                                                memberikan pendampingan dan pengelolaan pinjaman dengan tingkat gagal
                                                bayar
                                                (default atau NPL) yang sangat rendah, hampir mendekati 0%.
                                                <br>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-1-3">
                                            Apakah yang dimaksud dengan skor kredit penerima pinjaman?
                                        </h5>
                                        <div id="accordion-1-3" class="collapse" data-parent="#accordionFaqOne">
                                            <div class="accordion-content">
                                                Skor kredit adalah teknologi yang dibangun SaTu dan diterapkan untuk
                                                menyeleksi calon penerima pinjamanSkor kredit ini memberikan
                                                transparansi
                                                yang membantu para pendana dalam
                                                menentukan pilihan pendanaan dengan mempertimbangkan tingkat risiko dan
                                                imbal hasil yang sesuai.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-1-4">
                                            Apa itu Credit Scoring?
                                        </h5>
                                        <div id="accordion-1-4" class="collapse" data-parent="#accordionFaqOne">
                                            <div class="accordion-content">
                                                Skor kredit SaTu didasarkan pada kemampuan penerima pinjaman untuk
                                                mengembalikan pinjaman tepat waktu. Sebagai contoh, penerima pinjaman
                                                dengan
                                                skor kredit A memiliki probabilitas tinggi, antara 97,11% hingga 100%,
                                                untuk
                                                mengembalikan pinjaman tepat waktu. Skor kredit kami didesain untuk
                                                terus
                                                belajar dari data dan berkembang menjadi semakin akurat dan presisi
                                                seiring
                                                dengan bertambahnya jumlah penerima pinjaman di Amartha.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="speakers" role="tabpanel">
                                <div class="accordion" id="accordionFaqTwo">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-2-1">
                                            Apakah itu pendanaan Crowdfunding?
                                        </h5>
                                        <div id="accordion-2-1" class="collapse show" data-parent="#accordionFaqTwo">
                                            <div class="accordion-content">
                                                Pendanaan crowdfunding adalah suatu model pendanaan yang melibatkan
                                                sekelompok orang yang memberikan dana ke suatu proyek atau usaha,
                                                biasanya melalui platform online. Sehingga plafon lebih ringan dan
                                                pendana memiliki kesempatan untuk bisa melakukan diversifikasi
                                                investasi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-2-6">
                                            Apakah tersedia asuransi untuk pendanaan Crowdfunding?
                                        </h5>
                                        <div id="accordion-2-6" class="collapse" data-parent="#accordionFaqTwo">
                                            <div class="accordion-content">
                                                Produk penjaminan pendanaan/asuransi tidak tersedia untuk pendanaan
                                                Crowdfunding. Namun, Anda bisa menyesuaikan tingkat risiko portofolio
                                                pendanaan Anda dengan berbagai pilihan credit scoring yang tersedia di
                                                marketplace.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-2-2">
                                            Berapa dana yang dibutuhkan untuk melakukan pendanaan Crowdfunding?
                                        </h5>
                                        <div id="accordion-2-2" class="collapse" data-parent="#accordionFaqTwo">
                                            <div class="accordion-content">
                                                Untuk memulai melakukan pendanaan Crowdfunding, Anda bisa mendanai mulai
                                                dari 100 ribu rupiah dan berlaku kelipatan sesuai dengan jumlah total
                                                plafon yang tersedia di marketplace.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-2-4">
                                            Berapa tenor yang tersedia untuk pendanaan Crowdfunding?
                                        </h5>
                                        <div id="accordion-2-4" class="collapse" data-parent="#accordionFaqTwo">
                                            <div class="accordion-content">
                                                Tenor untuk produk pendanaan Crowdfunding ini adalah 4 pilihan yaitu
                                                20, 30, 40, 50 minggu yang mana tenor akan diatur oleh UMKM.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-2-3">
                                            Mengapa pencairan pendanaan Crowdfunding saya gagal?
                                        </h5>
                                        <div id="accordion-2-3" class="collapse" data-parent="#accordionFaqTwo">
                                            <div class="accordion-content">
                                                Kegagalan dalam pencairan pendanaan dapat disebabkan oleh dua hal: tidak
                                                terpenuhinya target pendanaan dalam waktu yang ditentukan atau mundurnya
                                                mitra dari proyek pendanaan. Jika kondisi ini terjadi, maka informasi
                                                terbaru tentang pendanaan Anda akan segera diperbarui dalam portofolio
                                                Anda.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-2-5">
                                            Berapa lama waktu pencairan pendanaan Crowdfunding?
                                        </h5>
                                        <div id="accordion-2-5" class="collapse" data-parent="#accordionFaqTwo">
                                            <div class="accordion-content">
                                                Pencairan dana kepada mitra pendanaan Crowdfunding dapat membutuhkan
                                                waktu sampai dengan 14 hari kerja setelah pendanaan tersebut terpenuhi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pricing" role="tabpanel">
                                <div class="accordion" id="accordionFaqThree">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-3-2">
                                            Bagaimana cara bergabung dengan SaTu sebagai pendana?
                                        </h5>
                                        <div id="accordion-3-2" class="collapse" data-parent="#accordionFaqThree">
                                            <div class="accordion-content">
                                                Anda dapat mengunjungi situs web SaTu dan memilih kampanye penggalangan dana
                                                yang ingin Anda dukung. Setelah itu, Anda dapat memberikan sumbangan
                                                berdasarkan jumlah yang Anda inginkan dengan cara yang mudah dan aman
                                                melalui SaTu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-3-1">
                                            Bagaimana jika proses verifikasi saya mengalami kegagalan?
                                        </h5>
                                        <div id="accordion-3-1" class="collapse show" data-parent="#accordionFaqThree">
                                            <div class="accordion-content">
                                                Anda bisa melakukan verifikasi ulang melalui aplikasi atau website Amartha.
                                                Pastikan bahwa foto EKTP dan selfie yang diunggah diambil secara langsung
                                                melalui kamera smartphone dan tidak melalui proses scan atau editing.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-3-3">
                                            Bagaimana cara mengetahui perkembangan proyek setelah didanai?
                                        </h5>
                                        <div id="accordion-3-3" class="collapse" data-parent="#accordionFaqThree">
                                            <div class="accordion-content">
                                                Setiap proyek yang didanai akan memberikan update secara berkala kepada
                                                pendana. Anda juga dapat melihat perkembangan proyek melalui dashboard di
                                                akun SaTu Anda.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-3-4">
                                            Dapatkah saya membatalkan pendanaan yang telah saya lakukan?
                                        </h5>
                                        <div id="accordion-3-4" class="collapse" data-parent="#accordionFaqThree">
                                            <div class="accordion-content">
                                                Komitmen antara pendana dan penerima pinjaman yang diatur dalam perjanjian
                                                harus dipertahankan hingga masa pinjaman berakhir. Oleh karena itu, tidak
                                                diperbolehkan untuk mengakhiri perjanjian dengan cara sepihak sebelum masa
                                                berakhir.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="support" role="tabpanel">
                                <div class="accordion" id="accordionFaqFour">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-4-1">
                                            Bagaimana cara mendaftar sebagai mitra UMKM di SaTu?
                                        </h5>
                                        <div id="accordion-4-1" class="collapse show" data-parent="#accordionFaqFour">
                                            <div class="accordion-content">
                                                Untuk mendaftar sebagai mitra UMKM di SaTu, Anda harus mengisi formulir
                                                pendaftaran dan mengunggah dokumen yang diperlukan. Tim SaTu akan meninjau
                                                dan memvalidasi dokumen Anda sebelum menyetujui pengajuan Anda.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-4-2">
                                            Apa yang harus saya lakukan setelah kampanye penggalangan dana selesai?
                                        </h5>
                                        <div id="accordion-4-2" class="collapse" data-parent="#accordionFaqFour">
                                            <div class="accordion-content">
                                                Setelah kampanye penggalangan dana selesai, mitra UMKM harus memberikan
                                                laporan yang jelas tentang penggunaan dana tersebut. Hal ini akan membantu
                                                meningkatkan kepercayaan penggalang dana untuk berpartisipasi dalam kampanye
                                                selanjutnya dan memastikan transparansi dalam penggunaan dana yang
                                                terkumpul.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-4-3">
                                            Apa yang terjadi jika kampanye saya tidak berhasil mencapai target dana?
                                        </h5>
                                        <div id="accordion-4-3" class="collapse" data-parent="#accordionFaqFour">
                                            <div class="accordion-content">
                                                Jika kampanye Anda tidak berhasil mencapai target dana, biasanya
                                                semua dana yang berhasil dikumpulkan dikembalikan kepada para pendana.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-4-4">
                                            Apakah saya dapat mengubah target penggalangan dana selama kampanye berlangsung?
                                        </h5>
                                        <div id="accordion-4-4" class="collapse" data-parent="#accordionFaqFour">
                                            <div class="accordion-content">
                                                Tidak, target penggalangan dana tidak dapat diubah setelah kampanye dimulai.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="history" role="tabpanel">
                                <div class="accordion" id="accordionFaqFive">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-5-1">
                                            Apakah SaTu aman untuk digunakan?
                                        </h5>
                                        <div id="accordion-5-1" class="collapse show" data-parent="#accordionFaqFive">
                                            <div class="accordion-content">
                                                Ya, SaTu sangat aman untuk digunakan. Platform ini dilengkapi dengan
                                                teknologi keamanan tinggi seperti enkripsi SSL dan pemrosesan pembayaran
                                                yang aman. Selain itu, SaTu juga menerapkan prosedur verifikasi identitas
                                                untuk menghindari penyalahgunaan dan memastikan bahwa hanya kampanye yang
                                                sah yang diunggulkan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-5-2">
                                            Apakah informasi saya aman di SaTu?
                                        </h5>
                                        <div id="accordion-5-2" class="collapse" data-parent="#accordionFaqFive">
                                            <div class="accordion-content">
                                                Ya, setiap data pada sistem akan memiliki identitas yang berupa kode unik
                                                sehingga data akan sulit diretas. Selain itu, data yang dibutuhkan untuk
                                                autentikasi akan
                                                memiliki validasi yang berlapis.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-5-3">
                                            Apakah SaTu menjamin keamanan pembayaran saya?
                                        </h5>
                                        <div id="accordion-5-3" class="collapse" data-parent="#accordionFaqFive">
                                            <div class="accordion-content">
                                                Ya, SaTu menjamin keamanan pembayaran Anda dengan menggunakan sistem
                                                pembayaran yang aman dan terpercaya. SaTu juga menawarkan berbagai pilihan
                                                pembayaran yang mudah dan aman seperti transfer bank, kartu kredit/debit,
                                                dan e-wallet. Selain itu, SaTu juga memiliki kebijakan pengembalian dana
                                                yang jelas dan transparan jika terjadi masalah dengan kampanye atau
                                                pembayaran.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="customers" role="tabpanel">
                                <div class="accordion" id="accordionFaqSix">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-6-1">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-6-1" class="collapse show" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-6-2">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-6-2" class="collapse" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-6-3">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-6-3" class="collapse" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-6-4">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-6-4" class="collapse" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-6-5">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-6-5" class="collapse" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-6-6">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-6-6" class="collapse" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="false"
                                            data-target="#accordion-6-7">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-6-7" class="collapse" data-parent="#accordionFaqSix">
                                            <div class="accordion-content">
                                                Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium
                                                dolore seyse
                                                mque laudantium totam rem aperiam, eaque ipsa quae ab illo inventore
                                                veritatis et
                                                quasi architecto beatae vitae dicta sunt explicabo.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== FAQ Area End ======-->

    <!--====== Feature Section Start ======-->
	<section class="feature-section primary-soft-bg section-gap">
		<div class="container">
			<div class="common-heading text-center mb-30">
				<span class="tagline">
					<i class="fas fa-plus"></i> Apa yang Kita Lakukan
					<span class="heading-shadow-text">Features</span>
				</span>
				<h2 class="title">Kenapa Memilih Kami</h2>
			</div>

			<div class="row icon-boxes justify-content-center">
				<div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.1s">
					<div class="icon-box mt-30">
						<div class="icon">
							<i class="flaticon-debit-card"></i>
						</div>
						<h5 class="title">Pembayaran Cepat dan Aman</h5>
						<p>Kami menawarkan solusi pembayaran yang efisien dan aman untuk pengguna kami. Dengan SaTu, pengguna dapat menerima pembayaran dengan cepat dan mudah melalui metode pembayaran yang berbeda.</p>
						<span class="box-index">01</span>

						<div class="box-img">
							<img src="assets/img/icon-box-bg.jpg" alt="image">
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.2s">
					<div class="icon-box mt-30">
						<div class="icon">
							<i class="flaticon-payment"></i>
						</div>
						<h5 class="title">Pemrosesan Pembayaran Global</h5>
						<p>Kami juga menyediakan layanan proses pembayaran global untuk memudahkan pengguna dalam melakukan transaksi bisnis di seluruh dunia. Kami menawarkan solusi pembayaran yang efektif dan terpercaya.</p>
						<span class="box-index">02</span>

						<div class="box-img">
							<img src="assets/img/icon-box-bg.jpg" alt="image">
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.3s">
					<div class="icon-box mt-30">
						<div class="icon">
							<i class="flaticon-wallet-1"></i>
						</div>
						<h5 class="title">Banyak Pilihan Pembayaran</h5>
						<p>Dengan banyaknya pilihan pembayaran, pengguna dapat memilih opsi yang paling nyaman dan sesuai dengan preferensi mereka. Kami berkomitmen untuk memberikan solusi pembayaran yang mudah, aman, dan terpercaya.</p>
						<span class="box-index">03</span>

						<div class="box-img">
							<img src="assets/img/icon-box-bg.jpg" alt="image">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--====== Feature Section End ======-->
@endsection
