@extends('frontend.master')

@section('content')

    <!-- Breadcrumbs Area -->
    <section class="breadcrumbs-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">সাধারণ নির্দেশিকা</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">হোম</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="direction.html">নির্দেশনা</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->


    <!-- Faq Area -->
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8 col-12">
                    <div class="faq-inner accordion" id="accordionExample">
                        <!-- Single Faq -->
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h3>সাদিকরুন ডটকমে কিভাবে একাউন্ট তৈরি করবো?</h3>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    <div class="faq-inner-list">
                                        <ul>
                                            <li>
                                                ১) প্রথমে ShadiKorun.com প্রবেশ করুন এবং হোম পেজের
                                                উপরের ডান কোণে থাকা ইউজার আইকনে ক্লিক করুন।
                                            </li>
                                            <li>২) Create Account এ ক্লিক করুন।</li>
                                            <li>
                                                ৩) রেজিস্ট্রেশন ফর্ম প্রদর্শিত হবে। আপনার নাম লিখুন
                                                এবং জেন্ডার সিলেক্ট করুন।
                                            </li>
                                            <li>
                                                ৪) আপনার ইমেইল লিখে Verify বাটনে ক্লিক করুন। আপনার
                                                ইমেইল সঠিক হলে সেখানে একটি ভেরিফিকেশন কোড যাবে।
                                                নির্ধারিত স্থানে ভেরিফিকেশন কোড প্রবেশ করিয়ে Confirm
                                                বাটনে ক্লিক করে ইমেইল ভেরিফিকেশন সম্পন্ন করুন।
                                            </li>
                                            <li>
                                                ৫) আপনার মোবাইল নাম্বার লিখে Verify বাটনে ক্লিক করুন।
                                                আপনার মোবাইল নাম্বার সঠিক হলে সেখানে একটি ভেরিফিকেশন
                                                কোড যাবে। নির্ধারিত স্থানে ভেরিফিকেশন কোড প্রবেশ করিয়ে
                                                Confirm বাটনে ক্লিক করে মোবাইল নাম্বার ভেরিফিকেশন
                                                সম্পন্ন করুন।
                                            </li>
                                            <li>৬) একটি পাসওয়ার্ড নির্বাচন করুন।</li>
                                            <li>
                                                ৭) সাদিকরুনের
                                                <a href="#" target="_blank">Terms and Condition</a>
                                                এবং
                                                <a href="#" target="_blank">Privacy Policy</a> এর সাথে
                                                একমত হলে চেকবক্স চেক করুন।
                                            </li>
                                            <li>
                                                ৮) Create account বাটনে ক্লিক করে অ্যাকাউন্ট তৈরি
                                                সম্পন্ন করুন।
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Faq -->
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h3>বায়োডাটা জমা দিতে কত টাকা লাগে?</h3>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    <p class="faq-inner-body-text">
                                        সাদিকরুনে সম্পূর্ণ বিনামূল্যে বায়োডাটা জমা দেয়া যায়।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Faq -->
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h3>এই ওয়েবসাইট কি সবার জন্য উন্মুক্ত?</h3>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    <p class="faq-inner-body-text">
                                        না, এই ওয়েবসাইট সবার জন্য নয়, এই ওয়েবসাইট শুধুমাত্র
                                        প্রেক্টিসিং মুসলিমদের জন্য।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Faq -->
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h3>বায়োডাটা তৈরি করার কোনো বিশেষ শর্ত আছে?</h3>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    <p>
                                        আমাদের ওয়েবসাইটে বায়োডাটা  নূন্যতম আবশ্যকতা নিম্নরূপ:-
                                    </p>
                                    <div class="faq-inner-list">
                                        <span>পুরুষ:</span>
                                        <ul>
                                            <li>১/ ৫ ওয়াক্ত নামাযী হতে হবে।</li>
                                            <li>২/ ওয়াজিব দাড়ি সুন্নতি পদ্ধতিতে বড় থাকতে হবে।</li>
                                            <li>৩/ টাখনুর উপর কাপড় পরতে হবে।</li>
                                            <li>৪/ অভিভাবকের অনুমতি।</li>
                                            <li>৪/ অভিভাবকের অনুমতি।</li>
                                        </ul>
                                    </div>
                                    <div class="faq-inner-list">
                                        <span>নারী:</span>
                                        <ul>
                                            <li>১/ ৫ ওয়াক্ত নামাযী হতে হবে।</li>
                                            <li>২/ “নিকাব” সহ ফরজ পর্দানশীন হতে হবে।</li>
                                            <li>৩/ অভিভাবকের অনুমতি।</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Faq -->
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <h3>
                                        সাদিকরুনে বায়োডাটা জমা দিলে আমার তথ্য কতটুকু গোপন থাকবে?
                                        কতটুকু প্রকাশিত হবে?
                                    </h3>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    <p class="faq-inner-body-text">
                                        আপনার বায়োডাটা এপ্রুভ করা হলে আপনার ও আপনার পিতা-মাতার
                                        নাম, মোবাইল নাম্বার এবং ইমেইল এড্রেস গোপন রাখা হবে। বাকি
                                        সকল তথ্য সাধারণ ইউজাররা দেখতে পারবে। অর্থাৎ সাধারণ ইউজাররা
                                        আপনার বায়োডাটা পড়তে পারবে কিন্ত আপনার পরিচয় জানতে পারবে
                                        না।
                                        <br /><br />যদি কেউ বিয়ের জন্য যোগাযোগ করতে আগ্রহী হয়
                                        তাহলে কানেকশন ব্যবহার করে আপনার নাম, অভিভাবকের মোবাইল
                                        নাম্বার ও ইমেইল এড্রেস দেখতে পারবে এবং বিয়ের জন্য যোগাযোগ
                                        করতে পারবে। বিস্তারিত জানতে
                                        <a href="privacy-policy.html" target="_blank">Privacy Policy</a>
                                        পড়ুন।
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Faq -->
                        <div class="single-faq-widget">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <h3>আমার বায়োডাটা এপ্রুভ হয় নি কেন?</h3>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="faq-inner-body">
                                    <div class="faq-inner-list">
                                        <p>
                                            বিভিন্ন কারণে বায়োডাটা এপ্রুভ করা হয় না। তার মাঝে কয়েকটি
                                            কারণ উল্লেখ করা হলো।
                                        </p>
                                        <ul>
                                            <li>
                                                ১/ যদি অভিভাবককে না জানিয়ে আমাদের ওয়েবসাইটে বায়োডাটা
                                                জমা দেয়া হয়।
                                            </li>
                                            <li>
                                                ২/ অভিভাবকের নাম্বারের ঘরে নিজের নাম্বার লিখে রাখলে।
                                            </li>
                                            <li>৩/ ৫ ওয়াক্ত নামাযী না হলে।</li>
                                            <li>
                                                ৪/ পুরুষদের ক্ষেত্রে, ওয়াজিব দাঁড়ি সুন্নতি পদ্ধতীতে বড়
                                                না থাকলে। (প্রাকৃতিক কারণে যাদের দাঁড়ি বড় হয় না তারা
                                                ব্যতীত।)
                                            </li>
                                            <li>৫/ পুরুষদের ক্ষেত্রে, টাখনুর উপর কাপড় না পরলে।</li>
                                            <li>
                                                ৬/ নারীদের ক্ষেত্রে, নিকাব সহ ফরজ পর্দা না করলে।
                                            </li>
                                            <li>৭/ বায়োডাটাতে কোনো মিথ্যা তথ্য দিয়ে থাকলে।</li>
                                            <li>
                                                ৮/ বিশেষ প্রশ্নের উত্তর স্পষ্ট ভাবে না দিয়ে অন্য ভাবে
                                                দিলে। যেমনঃ অনেকেই শুধু “আলহামদুলিল্লাহ” বা “হুম”
                                                ইত্যাদি লিখেন, অথচ এটি দ্বারা হ্যাঁ/না স্পষ্টভাবে বোঝা
                                                যায় না ।
                                            </li>
                                            <li>৯/ ইসলামের সাথে সাংঘর্ষিক কোনো কিছু লিখলে।</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq Area -->
@endsection
