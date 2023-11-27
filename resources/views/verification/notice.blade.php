@extends('frontend.master')

@section('content')
    <!-- Auth Page  Area -->
    <section class="auth-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 col-md-8 col-12">
                    <div class="auth-card verifyOTP-card">
                        <div class="auth-card-head">
                            <div class="auth-card-head-icon">
                                <img src="{{url('frontend_assets')}}/assets/images/icons/edit.svg" alt="Image" />
                            </div>
                            <h4 class="auth-card-head-title">Verify OTP</h4>
                            <p class="auth-card-head-title-text">
                                A 6-digit verification code was sent to
                                <span class="otp-number d-block">"{{Auth::user()->email ? Auth::user()->email : Auth::user()->contact}}"</span>
                                Enter the code to verify.
                            </p>
                        </div>
                        <form class="auth-card-form" action="{{url('user/verify/check')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Enter code</label>
                                <div class="otp-input" id="otp-input">
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required/>
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required/>
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required/>
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required/>
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required/>
                                    <input type="text" name="code[]" maxlength="1" class="otp-input-field is-invalid" value="" required/>
                                </div>
                            </div>
                            <div class="auth-form-btn mt-20">
                                <button id="verify-btn" class="theme-btn" type="submit" style="cursor: no-drop;">
                                    Verify
                                </button>
                                <p id="verification-result"></p>
                            </div>
                        </form>
                        <div class="auth-card-bottom">
                            <p class="OTP-send-again m-0">
                                Didn’t receive an SMS? <a href="{{url('user/verification/resend')}}">Send again</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Auth Page  Area -->
@endsection

@section('footer_js')
    <script>
        document.addEventListener("paste", function(e) {
            // if the target is a text input
            if (e.target.type === "text") {
            var data = e.clipboardData.getData('Text');
            // split clipboard text into single characters
            data = data.split('');
            // find all other text inputs
            [].forEach.call(document.querySelectorAll("input[type=text]"), (node, index) => {
                // And set input value to the relative character
                    node.value = data[index];
                    checkFilled();
                });
            }
        });

        $('input.otp-input-field').on('keyup', function() {
            if ($(this).val()) {
                $(this).next().focus();
                checkFilled();
            }
        });

        function checkFilled()  {
            var interests = document.getElementsByClassName("otp-input-field");
            var emptyBoxCount = 0;
            for (var i = 0; i<interests.length; i++)  {
                if (interests[i].value == '')  {
                    interests[i].style.borderColor = 'red';
                } else {
                    interests[i].style.borderColor = 'green';
                    emptyBoxCount = emptyBoxCount + 1
                }
            }

            if(emptyBoxCount == 6){
                document.getElementById("verify-btn").style.cursor = "pointer";
                document.getElementById("verify-btn").click();
            } else {
                document.getElementById("verify-btn").style.cursor = "no-drop";
            }
        }
    </script>
@endsection
