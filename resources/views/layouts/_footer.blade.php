<!-- Footer -->
<footer class="page-footer" id="footer">
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                <span class="footer-heading-text">Useful Links</span>
                <ul class="footerLinks">
                    <li>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li>
                        <a href="/privacy-policy">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/cookie-policy">Cookies Policy</a>
                    </li>
                    <li>
                        <a href="/terms-conditions">Terms and Conditions</a>
                    </li>
                    <li>
                        <a href="{{ route('sitemap') }}">Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('survey.example') }}">Survey Example</a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-4 px-2">
                <div class="p-1">
                    <form action="{{ route('newsletter.store') }}" id="formNewsletter" method="POST">
                        @csrf
                        <ul class="list-unstyled list-inline mb-0">
                            <li class="list-inline-item">
                                <p>Sign Up on our newsletter</p>
                                <div id="news-feedback"></div>
                                <input required type="email" name="email" id="email-newsletter" class="form-control" placeholder="Enter you email address"/>
                            </li>
                            <li class="list-inline-item pt-1">
                                <button type="submit" class="btn btn-success btn-sm">Sign up!</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <span class="footer-heading-text">Contact</span>
                <ul class="footerLinks">
                    <li>
                        <i class="fab fa-whatsapp customFa"></i> <a href="https://api.whatsapp.com/send?phone={{ env('PHONE_NUM') }}"> +44 7715 366349</a>
                    </li>
                    <li>
                        <i class="fas fa-phone customFa fa-rotate-90"></i> <a href="tel:{{ env('PHONE_NUM') }}"> +44 7715 366349 </a>
                    </li>
                    <li>
                        <i class="fas fa-envelope-square customFa"></i> <a href="mailto:hello@educonsultorg.com"> hello@educonsultorg.com</a>
                    </li>
                </ul>
            </div>

        </div>
        <hr class="footer-eco">
    </div>

    <!--Social buttons-->
    <div class="text-center">
        <ul class="list-unstyled list-inline socislBtns">
            <li class="list-inline-item"><a href="https://www.facebook.com/{{ env('FACEBOOK_ID') }}"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="http://linkedin.com/{{ env('FACEBOOK_ID') }}"><i class="fab fa-linkedin-in"></i></a></li>
            <li class="list-inline-item"><a href="http://twitter.com/{{ env('FACEBOOK_ID') }}"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <p>{{ env('COMPANY') }} are registered in England and Wales with company number number {{ env('COMPANY_NUMBER') }}. </p>
        © Copyright 2018
        <a href="/"> {{ env('APP_NAME') }} </a>
        All rights reserved.
    </div>
    <!--/.Copyright-->

</footer>
