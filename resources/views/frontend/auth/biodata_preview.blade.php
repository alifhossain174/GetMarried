@extends('frontend.master')

@section('content')
    <section class="user-dashboard-area">
        <div class="user-d-container">
            <div class="user-d-row">
                <a href="#" class="sidebar-trigger trigger-fixed"></a>

                @include('frontend.auth.sideMenu')

                <!-- Dashboard Content -->
                <div class="user-d-content">
                    <div class="preview-biodata-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="preview-biodata-head">
                                        <h3>Preview Biodata</h3>
                                        <a href="{{url('user/edit/biodata')}}" class="theme-btn secondary">Edit More</a>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-8 col-12">
                                        <div class="biodata-general-widget" style="position: relative; top: 0">
                                            <div class="biodata-general-widget-box">
                                                <div class="biodata-general-head">
                                                    <div class="biodata-general-img">
                                                        <img src="{{url('frontend_assets')}}/assets/images/icons/man.svg" alt="#" />
                                                    </div>
                                                    <div class="biodata-general-head-info">
                                                        <h4>Biodata No: <span>ODF-10772</span></h4>
                                                    </div>
                                                </div>
                                                <div class="biodata-general-content">
                                                    <div class="biodata-general-each-item">
                                                        <label>বায়োডাটার ধরন</label>
                                                        <p>পাত্রীর বায়োডাটা</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>বৈবাহিক অবস্থা</label>
                                                        <p>অবিবাহিত</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>জন্মসন</label>
                                                        <p>September, 2001</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>উচ্চতা</label>
                                                        <p>৫′ ১″</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>গাত্রবর্ণ</label>
                                                        <p>ফর্সা</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>ওজন</label>
                                                        <p>৫৪ কেজি</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>রক্তের গ্রুপ</label>
                                                        <p>B+</p>
                                                    </div>
                                                    <div class="biodata-general-each-item">
                                                        <label>জাতীয়তা</label>
                                                        <p>বাংলাদেশী</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="biodata-general-links">
                                                <a href="#" class="theme-btn copy-btn">
                                                    <i class="fi fi-rr-duplicate"></i>Copy Biodata
                                                    Link</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="biodata-details-main">
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>ঠিকানা</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>স্থায়ী ঠিকানা</label>
                                                        <p>
                                                            <span>বগুড়া সদর, বগুড়া, রাজশাহী, বাংলাদেশ</span><br />
                                                            <b>এলাকার নাম:</b><span>মালতি নগর, </span>
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বর্তমান ঠিকানা</label>
                                                        <p>
                                                            <span>বগুড়া সদর, বগুড়া, রাজশাহী, বাংলাদেশ</span><br />
                                                            <b>এলাকার নাম:</b><span>মালতি নগর, </span>
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>কোথায় বড় হয়েছেন?</label>
                                                        <p>ঢাকা এবং বগুড়া</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>শিক্ষাগত যোগ্যতা</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার শিক্ষা মাধ্যম</label>
                                                        <p>জেনারেল</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>এস.এস.সি / দাখিল / সমমান পাসের সন</label>
                                                        <p>২০১৯</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বিভাগ</label>
                                                        <p>ব্যবসা বিভাগ</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>ফলাফল</label>
                                                        <p>A</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>এইচ.এস.সি / আলিম / সমমান পাসের সন</label>
                                                        <p>২০২১</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বিভাগ</label>
                                                        <p>ব্যবসা বিভাগ</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>ফলাফল</label>
                                                        <p>A</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>পারিবারিক তথ্য</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার পিতা কি জীবিত?</label>
                                                        <p>জী, জীবিত</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পিতার পেশার বিবরণ</label>
                                                        <p>টেক্সটাইল কোম্পানী, চাকুরীজীবি</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার মাতা কি জীবিত?</label>
                                                        <p>জী, জীবিত</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>মাতার পেশার বিবরণ</label>
                                                        <p>গৃহীনি</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার কতজন ভাই আছে?</label>
                                                        <p>২</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>ভাইদের তথ্য</label>
                                                        <p>
                                                            বড় ভাই ম্যাকানিক,বিবাহিত। ছোট ভাই শিক্ষার্থী,
                                                            ৪র্থ শ্রেনী
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার কতজন বোন আছে?</label>
                                                        <p>বোন নেই</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>চাচা মামাদের পেশা</label>
                                                        <p>চাচা:ড্রাইভার মামা: ড্রাইভার</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পারিবারিক অর্থনৈতিক অবস্থা</label>
                                                        <p>মধ্যবিত্ত</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>অর্থনৈতিক অবস্থার বর্ণনা</label>
                                                        <p>আলহামদুলিল্লাহ ভালো।</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পারিবারিক দ্বীনি পরিবেশ কেমন?</label>
                                                        <p>পর্দা করার পরিবেশ আছে আলহামদুলিল্লাহ।</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>ব্যক্তিগত তথ্য</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>ঘরের বাহিরে সাধারণত কি ধরণের পোষাক পরেন?</label>
                                                        <p>কালো বোরখা, নিকাব, হাত মুজা, পা মুজা</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>কবে থেকে নিকাব সহ পর্দা করছেন?</label>
                                                        <p>আলহামদুলিল্লাহ ৭ শ্রেণী থেকে</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>প্রতিদিন পাঁচ ওয়াক্ত নামাজ পড়েন কি? কবে থেকে
                                                            পড়ছেন?</label>
                                                        <p>
                                                            জ্বী আলহামদুলিল্লাহ। ৭ম শ্রেনী শেষের দিক থেকে
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>সাধারণত সপ্তাহে কত ওয়াক্ত নামায আপনার কাযা
                                                            হয়?</label>
                                                        <p>
                                                            আলহামদুলিল্লাহ সহজে হয় না, যেন না হয় সে চেষ্টা
                                                            রাখি।
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>মাহরাম/নন-মাহরাম মেনে চলেন কি?</label>
                                                        <p>জ্বী আলহামদুলিল্লাহ</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>শুদ্ধভাবে কুরআন তিলওয়াত করতে পারেন?</label>
                                                        <p>নাহ, আমপাড়া পড়ছি।</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>নাটক / সিনেমা / সিরিয়াল / গান এসব দেখেন বা
                                                            শুনেন?</label>
                                                        <p>না</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার মানসিক বা শারীরিক কোনো রোগ আছে?</label>
                                                        <p>না আলহামদুলিল্লাহ</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>দ্বীনের কোন বিশেষ মেহনতে যুক্ত আছেন?</label>
                                                        <p>না</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>মাজার সম্পর্কে আপনার ধারণা বা বিশ্বাস
                                                            কি?</label>
                                                        <p>মাজারে বিশ্বাস করা শিরক।</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার পড়া হয়েছে এমন অন্তত ৩ টি ইসলামি বই এর নাম
                                                            লিখুন</label>
                                                        <p>
                                                            মুন্তাখাব হাদিস, নফসের বিরুদ্ধে লড়াই, জীবন
                                                            যেখানে যেমন৷
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনার পছন্দের অন্তত ৩ জন আলেমের নাম
                                                            লিখুন</label>
                                                        <p>
                                                            শায়েখ আহমাদুল্লাহ, মিজানুর রহমান আজহারী, আবু
                                                            ত্বহা মোহাম্মাদ আদনান
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>নিজের শখ, পছন্দ-অপছন্দ, রুচিবোধ, স্বপ্ন ইত্যাদি
                                                            বিষয়ে লিখুন</label>
                                                        <p>
                                                            শখ বলতে জীবনের সবচেয়ে বড় শখ আর ইচ্ছা হলো হজ্জ
                                                            করা। জানিনা তকদিরে আছে কিনা। এছাড়াও জীবনের ছোট
                                                            খাট শখের মধ্যে গাছ লাগানো, বই পড়া, সেলাই করতে
                                                            ভালো লাগে। অন্যের সাথে কড়া ভাষায় কথা ও কটু আচরণ
                                                            একদম অপছন্দনীয়৷ এছাড়াও এখনকার সময় ফ্রী মিক্সিং
                                                            যে ছেলে মেয়েরা করে মাহরাম ননমাহরাম মানে না
                                                            এগুলোর প্রতি ঘৃণা আসে। যেহেতু আমি জন্মের পর
                                                            দ্বীনী পরিবেশ পাই নি তেমন, দ্বীনের পথে আশার পর
                                                            থেকেই আমার স্বপ্ন একটা দ্বীনি পরিবারের। আমার
                                                            ইচ্ছা আমি যেহেতু ছোট থেকে দ্বীনি পরিবার পাইনি,
                                                            কিন্ত আমার বিয়ের পরের সংসারটা যেন দ্বীনদার হয়।
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>পেশাগত তথ্য</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পেশা</label>
                                                        <p>পেশা নেই</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পেশার বিস্তারিত বিবরণ</label>
                                                        <p>পেশা নেই</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>মাসিক আয়</label>
                                                        <p>০০</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>বিবাহ সম্পর্কিত তথ্য</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>অভিভাবক আপনার বিয়েতে রাজি কি না?</label>
                                                        <p>জ্বী</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আপনি কি বিয়ের পর চাকরি করতে ইচ্ছুক?</label>
                                                        <p>না</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বিয়ের পর পড়াশোনা চালিয়ে যেতে চান?</label>
                                                        <p>না</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>কেন বিয়ে করছেন? বিয়ে সম্পর্কে আপনার ধারণা
                                                            কি?</label>
                                                        <p>
                                                            বিয়ের মাধ্যমে মানুষের সাদিকরুন পুরণ হয়। বিয়ের
                                                            মাধ্যমে হালাল ভালোবাসার সম্পর্ক তৈরী হয় যা
                                                            আল্লাহর পক্ষ থেকক আসে। আর এখনকার জেনেরেশনে
                                                            নিজেকে সংযত রেখেছি কোন হারাম রিলেশনে নাই
                                                            আলহামদুলিল্লাহ, একটি হালাল সম্পর্ক ও পবিত্র
                                                            ভালোবাসার জন্যই বিয়ে করা।
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>প্রত্যাশিত জীবনসঙ্গী</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বয়স</label>
                                                        <p>18-31</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>গাত্রবর্ণ</label>
                                                        <p>উজ্জল শ্যামলা, ফর্সা</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>উচ্চতা</label>
                                                        <p>৫'৪-৫'১০</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>শিক্ষাগত যোগ্যতা</label>
                                                        <p>
                                                            জেনারেল হলে, অনার্স পাশ, মাস্টার্স পাশ, আর
                                                            মাদ্রাসা লাইনে হলে হাফেজ, আলেম
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>জেলা</label>
                                                        <p>
                                                            বগুড়া, এছাড়াও এর আশে পাশে উত্তরবঙ্গের যে কোন
                                                            জেলা।
                                                        </p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বৈবাহিক অবস্থা</label>
                                                        <p>অবিবাহিত</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পেশা</label>
                                                        <p>ব্যবসায়ী, চাকুরীজীবি</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>অর্থনৈতিক অবস্থা</label>
                                                        <p>মধ্যবিত্ত</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>জীবনসঙ্গীর যেসব বৈশিষ্ট্য বা গুণাবলী প্রত্যাশা
                                                            করেন</label>
                                                        <p>
                                                            বিয়ের ক্ষেত্রে রাসুল (সঃ) বলেছেন, দ্বিনদ্বারিতা
                                                            কে প্রাধান্য দিতে। তাই আমি চাই আমার জীবন সঙ্গী
                                                            একজন দ্বীনদ্বার ও উত্তম আখলাখের অধিকারী হোক। যার
                                                            মধ্যে সৎ সাহস আছে, উত্তম চরিত্রবান, দ্বীনী কাজে
                                                            মেহনত করে, এবং একজন দায়িত্বশীল। মাহরাম নন মাহরাম
                                                            মেনে চলা। এখনকার সময়ে নিজের নজরের হেফাযত করা,
                                                            ফেতনা থেকে বেঁচে চলার চেষ্টা করবে। যে আমাকে
                                                            আল্লাহর জন্য ভালোবাসবে, আর এ ভালোবাসায় সে আমাকে
                                                            আল্লাহর পথে চলতে সাহায্য করবে, আর জান্নাতেও যেন
                                                            একসাথে থাকতে পারি এভাবে জীবন যাপনে উৎসাহিত করবে।
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>অঙ্গীকারনামা</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>ShadiKorun.com ওয়েবসাইটে বায়োডাটা জমা দিচ্ছেন,
                                                            তা আপনার অভিভাবক জানেন?</label>
                                                        <p>হ্যাঁ</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>আল্লাহ'র শপথ করে সাক্ষ্য দিন, যে তথ্যগুলো
                                                            দিয়েছেন সব সত্য?</label>
                                                        <p>হ্যাঁ</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>কোনো মিথ্যা তথ্য প্রদান করলে দুনিয়াবী আইনগত এবং
                                                            আখিরাতের দায়ভার ShadiKorun.com কর্তৃপক্ষ নিবে
                                                            না। আপনি কি সম্মত?</label>
                                                        <p>হ্যাঁ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Biodata Details -->
                                            <div class="single-biodata-details">
                                                <h4>যোগাযোগ</h4>
                                                <div class="biodata-details-info-group">
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>পাত্রীর নাম</label>
                                                        <p>নাহার সুজানা</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>অভিভাবকের মোবাইল নাম্বার</label>
                                                        <p>01611945650</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>অভিভাবকের সাথে সম্পর্ক</label>
                                                        <p>মা</p>
                                                    </div>
                                                    <!-- Single Bio Info Item -->
                                                    <div class="biodata-details-info-item">
                                                        <label>বায়োডাটা গ্রহণের ই-মেইল</label>
                                                        <p>
                                                            <a
                                                                href="mailto:dinmohammadfoundation@gmail.com">examlple@gmail.com</a>
                                                        </p>
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

            </div>
        </div>
    </section>
@endsection
