<!-- Footer -->
<footer class="page-footer" id="footer">
    <div class="container">
        <div class="row">
            <!--First column-->
            <div class="col-sm-4">
                <span class="footer-heading-text">About</span>
                <ul class="footerLinks">
                    <li>
                        <p>EduConsultOrg offers professional custom essay writing, dissertation writing and coursework writing service. Our work is high quality, plagiarism-free and delivered on time.</p>
                    </li>
                </ul>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-sm-4">
                <span class="footer-heading-text">Useful Links</span>
                <ul class="footerLinks">
                    <li>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}">Terms and Conditions</a>
                    </li>
                    <li>
                        <a href="{{ route('sitemap') }}">Sitemap</a>
                    </li>
                </ul>
            </div>
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-sm-4">
                <span class="footer-heading-text">Contact</span>
                <ul class="footerLinks">
                    <li>
                        <i class="fab fa-whatsapp customFa"></i> <a href="https://api.whatsapp.com/send?phone=07770125434"> +44 7715 366349</a>
                    </li>
                    <li>
                        <i class="fas fa-phone customFa fa-rotate-90"></i> <a href="tel:+447715366349"> +44 7715 366349 </a>
                    </li>
                    <li>
                        <i class="fas fa-envelope-square customFa"></i> <a href="mailto:hello@educonsultorg.com"> hello@educonsultorg.com</a>
                    </li>
                </ul>
            </div>
            <!--/.Fourth column-->
        </div>
        <hr class="footer-eco">
    </div>
    <!--/.Footer Links-->


    <!--Call to action-->
    <div class="text-center py-2">
        <form action="{{ route('newsletter.store') }}" id="formNewsletter" method="POST">
            @csrf
            <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item">
                    <p>Sign Up on our newsletter</p>
                    <div id="news-feedback"></div>
                    <input required type="email" name="email" id="email-newsletter" class="form-control" placeholder="Enter you email address"/>
                </li>
                <li class="list-inline-item">
                    <button type="submit" class="btn btn-success">Sign up!</button>
                </li>
            </ul>
        </form>
    </div>
    <!--/.Call to action-->

    <hr class="footer-eco">

    <!--Social buttons-->
    <div class="text-center">
        <ul class="list-unstyled list-inline socislBtns">
            <li class="list-inline-item"><a href="http://facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="http://linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
            <li class="list-inline-item"><a href="http://twitter.com/"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        <p>Inovative Limited are registered in England and Wales with company number number. We are a fully bonded trading member </p>
        © Copyright 2018
        <a href="/"> educonsultorg.com </a>
        All rights reserved.
    </div>
    <!--/.Copyright-->

</footer>
