@extends('layouts.index')
@section('container')
    <!--[if lte IE 9]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>

    <--====== Page Title Start ======-->
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
                                    <a class="nav-link active" data-toggle="tab" href="#general"
                                        role="tab">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#speakers" role="tab">Speakers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#pricing" role="tab">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#support" role="tab">Support</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#history" role="tab">History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#customers" role="tab">Customers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="faqTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="accordion" id="accordionFaqOne">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-1-1">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-1-1" class="collapse show" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-2">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-1-2" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-3">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-1-3" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-4">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-1-4" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-5">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-1-5" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-6">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-1-6" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-7">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-1-7" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-8">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-1-8" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-9">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-1-9" class="collapse" data-parent="#accordionFaqOne">
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
                                            data-target="#accordion-1-10">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-1-10" class="collapse" data-parent="#accordionFaqOne">
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
                            <div class="tab-pane fade" id="speakers" role="tabpanel">
                                <div class="accordion" id="accordionFaqTwo">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-2-1">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-2-1" class="collapse show" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-2">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-2-2" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-3">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-2-3" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-4">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-2-4" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-5">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-2-5" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-6">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-2-6" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-7">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-2-7" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-8">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-2-8" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-9">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-2-9" class="collapse" data-parent="#accordionFaqTwo">
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
                                            data-target="#accordion-2-10">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-2-10" class="collapse" data-parent="#accordionFaqTwo">
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
                            <div class="tab-pane fade" id="pricing" role="tabpanel">
                                <div class="accordion" id="accordionFaqThree">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-3-1">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-3-1" class="collapse show" data-parent="#accordionFaqThree">
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
                                            data-target="#accordion-3-2">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-3-2" class="collapse" data-parent="#accordionFaqThree">
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
                                            data-target="#accordion-3-3">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-3-3" class="collapse" data-parent="#accordionFaqThree">
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
                                            data-target="#accordion-3-4">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-3-4" class="collapse" data-parent="#accordionFaqThree">
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
                                            data-target="#accordion-3-5">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-3-5" class="collapse" data-parent="#accordionFaqThree">
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
                                            data-target="#accordion-3-6">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-3-6" class="collapse" data-parent="#accordionFaqThree">
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
                            <div class="tab-pane fade" id="support" role="tabpanel">
                                <div class="accordion" id="accordionFaqFour">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-4-1">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-4-1" class="collapse show" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-2">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-4-2" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-3">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-4-3" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-4">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-4-4" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-5">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-4-5" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-6">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-4-6" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-7">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-4-7" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-8">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-4-8" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-9">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-4-9" class="collapse" data-parent="#accordionFaqFour">
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
                                            data-target="#accordion-4-10">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-4-10" class="collapse" data-parent="#accordionFaqFour">
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
                            <div class="tab-pane fade" id="history" role="tabpanel">
                                <div class="accordion" id="accordionFaqFive">
                                    <div class="accordion-item">
                                        <h5 class="accordion-title" data-toggle="collapse" aria-expanded="true"
                                            data-target="#accordion-5-1">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-5-1" class="collapse show" data-parent="#accordionFaqFive">
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
                                            data-target="#accordion-5-2">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-5-2" class="collapse" data-parent="#accordionFaqFive">
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
                                            data-target="#accordion-5-3">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-5-3" class="collapse" data-parent="#accordionFaqFive">
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
                                            data-target="#accordion-5-4">
                                            How To Improve Your Design Process With Data-Based Personas
                                        </h5>
                                        <div id="accordion-5-4" class="collapse" data-parent="#accordionFaqFive">
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
                                            data-target="#accordion-5-5">
                                            Better Research, Better Design, Better Results
                                        </h5>
                                        <div id="accordion-5-5" class="collapse" data-parent="#accordionFaqFive">
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
                                            data-target="#accordion-5-6">
                                            Smashing Book Excerpt Bringing Personality Back Web
                                        </h5>
                                        <div id="accordion-5-6" class="collapse" data-parent="#accordionFaqFive">
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
                                            data-target="#accordion-5-7">
                                            Using Low Vision As My Tool To Help Me Teach WordPress
                                        </h5>
                                        <div id="accordion-5-7" class="collapse" data-parent="#accordionFaqFive">
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
                    <i class="fas fa-plus"></i> What We Do
                    <span class="heading-shadow-text">Features</span>
                </span>
                <h2 class="title">Why choose us</h2>
            </div>

            <div class="row icon-boxes justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="icon-box mt-30">
                        <div class="icon">
                            <i class="flaticon-debit-card"></i>
                        </div>
                        <h5 class="title">Fast & Easy Payouts</h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam</p>
                        <a href="project-1.html" class="link"><i class="far fa-arrow-right"></i></a>
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
                        <h5 class="title">Global Payment Processing</h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam</p>
                        <a href="project-2.html" class="link"><i class="far fa-arrow-right"></i></a>
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
                        <h5 class="title">Many Payment Options</h5>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam</p>
                        <a href="project-1.html" class="link"><i class="far fa-arrow-right"></i></a>
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

    <!--====== Latest News Start ======-->
    <section class="latest-blog-section section-gap-extra-bottom">
        <div class="container">
            <div class="common-heading text-center mb-30">
                <span class="tagline">
                    <i class="fas fa-plus"></i> Latest News & Blog
                    <span class="heading-shadow-text">News Blog</span>
                </span>
                <h2 class="title">Get Every Single Update</h2>
            </div>
            <div class="row justify-content-center latest-blog-posts style-two">
                <div class="col-lg-4 col-md-6 col-sm-9 col-11 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="latest-post-box mt-30">
                        <div class="post-thumb">
                            <img src="assets/img/latest-news/01.jpg" alt="Image">
                        </div>
                        <div class="post-content">
                            <a href="#" class="post-date"><i class="far fa-calendar-alt"></i> 25 February 2021</a>
                            <h6 class="title">
                                <a href="news-details.html">Standing Out From Crowds mproving Mobile Experience</a>
                            </h6>
                            <a href="news-details.html" class="post-link">Read More <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9 col-11 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="latest-post-box mt-30">
                        <div class="post-thumb">
                            <img src="assets/img/latest-news/02.jpg" alt="Image">
                        </div>
                        <div class="post-content">
                            <a href="#" class="post-date"><i class="far fa-calendar-alt"></i> 25 February 2021</a>
                            <h6 class="title">
                                <a href="news-details.html">Five Rules Of App Localization China Money Dating And App
                                    Store</a>
                            </h6>
                            <a href="news-details.html" class="post-link">Read More <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9 col-11 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="latest-post-box mt-30">
                        <div class="post-thumb">
                            <img src="assets/img/latest-news/03.jpg" alt="Image">
                        </div>
                        <div class="post-content">
                            <a href="#" class="post-date"><i class="far fa-calendar-alt"></i> 25 February 2021</a>
                            <h6 class="title">
                                <a href="news-details.html">How To Use Underlined Text Improve User Experience</a>
                            </h6>
                            <a href="news-details.html" class="post-link">Read More <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Latest News End ======-->
@endsection
