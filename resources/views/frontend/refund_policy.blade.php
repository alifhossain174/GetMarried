@extends('frontend.master')

@push('site-seo')
    @php
        $homePageSeo = App\Models\Seo::where('id', 1)->first();
    @endphp
    <meta name="title" content="{{$homePageSeo->meta_title}}" />
    <meta name="description" content="{{$homePageSeo->meta_description}}" />
    <meta name="keywords" content="{{str_replace(",",", ",$homePageSeo->meta_keywords)}}" />
@endpush

@section('content')
    <!-- Breadcrumbs Area -->
    <section class="breadcrumbs-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="breadcrumbs-content">
                        <h3 class="breadcrumbs-title">Refund Policy</h3>
                        <ul class="breadcrumbs-menu">
                            <li>
                                <a href="{{url('/')}}">হোম</a><i class="fi fi-rs-angle-small-right"></i>
                            </li>
                            <li class="active">
                                <a href="{{url('refund-policy')}}">Refund Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Area -->

    <!-- Privacy Policy  Area -->
    <section class="policy-terms-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 col-12">
                    <div class="policy-terms-content">
                        <div class="policy-terms-content-widget">
                            <h3>Consent</h3>
                            <p>
                                By using our website, you hereby consent to our Privacy Policy
                                and agree to its terms.
                            </p>
                            <p>
                                At ISP Digital, accessible from
                                <a href="#" target="_blank">Xpeed</a>
                                one of our main priorities is the privacy of our visitors.
                                This Privacy Policy document contains types of information
                                that is collected and recorded by Edufy and how we use it. If
                                you have additional questions or require more information
                                about our Privacy Policy, do not hesitate to contact us. This
                                Privacy Policy applies only to our online activities and is
                                valid for visitors to our website, software and mobile app
                                with regards to the information that they shared and/or
                                collect in Edufy. This policy is not applicable to any
                                information collected offline or via channels other than this
                                website.
                            </p>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>How we use your information</h3>
                            <p>
                                We use the information we collect in various ways, including
                                to:
                            </p>
                            <ul>
                                <li>Provide, operate, and maintain our website</li>
                                <li>Improve, personalize, and expand our website</li>
                                <li>Understand and analyze how you use our website</li>
                                <li>
                                    Develop new products, services, features, and functionality
                                </li>
                                <li>
                                    Communicate with you, either directly or through one of our
                                    partners, including for customer service, to provide you
                                    with updates and other information relating to the website,
                                    and for marketing and promotional purposes
                                </li>
                                <li>Send you emails</li>
                                <li>Find and prevent fraud</li>
                                <li>Log Files</li>
                            </ul>
                            <p>
                                Edufy follows a standard procedure of using log files. These
                                files log visitors when they visit websites. All hosting
                                companies do this and a part of hosting services' analytics.
                                The information collected by log files include internet
                                protocol (IP) addresses, browser type, Internet Service
                                Provider (ISP), date and time stamp, referring/exit pages, and
                                possibly the number of clicks. These are not linked to any
                                information that is personally identifiable. The purpose of
                                the information is for analyzing trends, administering the
                                site, tracking users' movement on the website, and gathering
                                demographic information.
                            </p>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>Cookies and Web Beacons</h3>
                            <p>
                                Like any other website, Edufy uses 'cookies'. These cookies
                                are used to store information including visitors' preferences,
                                and the pages on the website that the visitor accessed or
                                visited. The information is used to optimize the users'
                                experience by customizing our web page content based on
                                visitors' browser type and/or other information.
                            </p>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>Advertising Partners Privacy Policies</h3>
                            <p>
                                You may consult this list to find the Privacy Policy for each
                                of the advertising partners of Edufy. Third-party ad servers
                                or ad networks uses technologies like cookies, JavaScript, or
                                Web Beacons that are used in their respective advertisements
                                and links that appear on Edufy, which are sent directly to
                                users' browser. They automatically receive your IP address
                                when this occurs. These technologies are used to measure the
                                effectiveness of their advertising campaigns and/or to
                                personalize the advertising content that you see on websites
                                that you visit. Note that Edufy has no access to or control
                                over these cookies that are used by third-party advertisers.
                            </p>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>Mobile Application Usage Privacy Policy</h3>
                            <p>
                                All the information collected or tracked on this app are
                                solely for the purpose of seamless management of the education
                                institutes of Bangladesh only. There are no adult content or
                                sensitive content on this app that may harm any children. The
                                content of this app does not portray anything that violates
                                cultural norms of Bangladesh. The data in this app will never
                                be used for any business purpose. The app is safe for its
                                intended users, is compliant with Google Play Policies 2, and
                                satisfies legal requirements.
                            </p>
                            <ul>
                                <li>
                                    Sensitive users can only input data that is mandated by
                                    their respective institute or their legal guardians.
                                </li>
                                <li>
                                    The app does not contain any advertisement of third party or
                                    external entity. There is no internal ad running system.
                                </li>
                                <li>
                                    The device data will not be shared to any third party and
                                    only be used for the convenience of the intended user.
                                </li>
                                <li>
                                    The app access is restricted by user credentials. The
                                    credentials are provided by the respective educational
                                    institute’s super admin for their stakeholders.
                                </li>
                                <li>
                                    The app is intended to be used by education institutes of
                                    Bangladesh and its concerning stakeholders. Three different
                                    stakeholders of schools, college and madrassas will be using
                                    this app. Those are the school authority/administration,
                                    teachers and guardians/students. The student panel is mostly
                                    for viewing purpose except a very minimal data input like
                                    request for leave. The teachers panel is where data input is
                                    given regarding activities and performance of students.
                                    Admin panel where most data input occurs which is not
                                    included in the application.
                                </li>
                                <li>
                                    This application does not require any input for high risk
                                    information signatures. No information is gathered without
                                    the full disclosure for the purpose of the data. The app
                                    does not require any call log or sms log data from the
                                    device. Data input is taken with full consent of the user.
                                </li>
                                <li>
                                    Provide details about your app's target audience and
                                    contentDescribe how you intend to use any high-risk or
                                    sensitive permissions @ such as SMS/CallLog
                                    permissionsReceive content ratings from official rating
                                    authorities
                                </li>
                            </ul>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>Third Party Privacy Policies</h3>
                            <p>
                                Edufy's Privacy Policy does not apply to other advertisers or
                                websites. Thus, we are advising you to consult the respective
                                Privacy Policies of these third-party ad servers for more
                                detailed information. It may include their practices and
                                instructions about how to opt-out of certain options. You can
                                choose to disable cookies through your individual browser
                                options. To know more detailed information about cookie
                                management with specific web browsers, it can be found at the
                                browsers' respective websites.
                            </p>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>
                                CCPA Privacy Rights (Do Not Sell My Personal Information)
                            </h3>
                            <p>
                                Under the CCPA, among other rights, Bangladesh consumers have
                                the right to:
                            </p>
                            <ul>
                                <li>
                                    Request that a business that collects a consumer's personal
                                    data disclose the categories and specific pieces of personal
                                    data that a business has collected about consumers.
                                </li>
                                <li>
                                    Request that a business delete any personal data about the
                                    consumer that a business has collected.
                                </li>
                                <li>
                                    Request that a business that sells a consumer's personal
                                    data, not sell the consumer's personal data.
                                </li>
                                <li>
                                    If you make a request, we have one month to respond to you.
                                    If you would like to exercise any of these rights, please
                                    contact us.
                                </li>
                            </ul>
                        </div>
                        <div class="policy-terms-content-widget">
                            <h3>Children's Information</h3>
                            <p>
                                Another part of our priority is adding protection for children
                                while using the internet. We encourage parents and guardians
                                to observe, participate in, and/or monitor and guide their
                                online activity.
                            </p>
                            <p>
                                Edufy does not knowingly collect any Personal Identifiable
                                Information from children under the age of 13 without the
                                consent of their parents. If you think that your child
                                provided this kind of information on our website, software or
                                app, we strongly encourage you to contact us immediately and
                                we will do our best efforts to promptly remove such
                                information from our records.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Privacy Policy  Area -->
@endsection
