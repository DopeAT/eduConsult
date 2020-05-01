@extends('layouts.app')
@section('page_id', 'home')
@section('content')

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="intro-text">
                        <div class="intro-lead-in">Superior Academic Help at the Student's Disposal</div>
                        <p>Devoted in helping you overcome any difficult subject,  so you can focus on the ones that you are shining!</p>
                        <a class="btn btn-danger font-weight-bold" href="#">PLACE ORDER</a><br/>
                        <a class="page-scroll text-danger" href="#whyUseUs"><i class="fas fa-angle-down"></i></a>
                    </div>
                    <div class="icons">
                        <span class="f-w-500"> <i class="fas fa-graduation-cap"></i> Subject-matter Experts</span>
                        <span class="f-w-500"> <i class="fas fa-book-open"></i> Free of Plagiarism</span>
                        <span class="f-w-500"> <i class="far fa-clock"></i> Timely Turnaround</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="bg-white py-3" id="whyUseUs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1 class="text-center title">Why use EduConsult<span class="text-danger font-weight-bold">O</span>rg.com ?</h1>
                    <hr class="red-hr">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="non-icon text-danger">100%</strong>
                        <h4>Original Work</h4>
                        <p class="text-muted">Educonsultorg is 100% confidential, 100% on time and 100% guaranteed plagiarism-free.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="far fa-clock"></i></strong>
                        <h4>On Time Delivery</h4>
                        <p class="text-muted">Constantly striving to exceed your expectations, in essay writing, so you will never miss a deadline ever again.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 consultationediting">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="far fa-comments"></i></strong>
                        <h4>Consultation & Editing</h4>
                        <p class="text-muted">Essay, Assignment, Dissertation, Thesis, Term and Research papers.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="fas fa-calculator"></i></strong>
                        <h4>Instant Price Calculator</h4>
                        <p class="text-muted">Simply parametrise your order and get instant feedback on the price!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="fas fa-check"></i></strong>
                        <h4>Easy Checkout Process</h4>
                        <p class="text-muted">In four easy steps place your order, upload relevant documents, use our secure Pay Pal payment method and leave the rest with us!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="boxes">
                        <strong class="icon-field text-danger"><i class="fas fa-hands-helping"></i></strong>
                        <h4>Exceptional Customer Service</h4>
                        <p class="text-muted">A customer support team member is always available to assist you! Choose between online chat, email or a simple phone-call to ask as many questions about your order as you like.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="subjects" class="subjects-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <article class="subjects-boxes bg-dark">
                        <div class="course-title">
                            <span>Criminology</span>
                        </div>
                        <div class="icon-course">
                            <i class="fas fa-user-secret"></i>
                        </div>
                        <div class="course-title-inside">Criminology</div>
                        <div class="course-details">
                            Global Reconstructions of Justice, Judging Crime, Terror, Law and War, Research and Criminal Justice Governance, Indigenous Peoples in Global Context, History, Memory and Violence in Asia, Australian Politics: Democracy & Justice
                        </div>
                        <a class="btn btn-small btn-order full-width" href="#">ORDER NOW</a>
                    </article>
                </div>
                <div class="col-sm-4">
                    <article class="subjects-boxes bg-danger">
                        <div class="course-title">
                            <span class="text-danger">Education</span>
                        </div>
                        <div class="icon-course">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="course-title-inside">Education</div>
                        <div class="course-details">
                            English, Mathematics, Science, Visual Arts, Music, Health and Physical Education,History, Geography, Business/Economics, Modern Languages Other Than English, Drama, Society and Culture/Aboriginal Studies
                        </div>
                        <a class="btn btn-small btn-order full-width" href="#">ORDER NOW</a>
                    </article>
                </div>
                <div class="col-sm-4">
                    <article class="subjects-boxes bg-dark">
                        <div class="course-title">
                            <span>Finance</span>
                        </div>
                        <div class="icon-course">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="course-title-inside">Finance</div>
                        <div class="course-details">
                            Global Reconstructions of Justice, Judging Crime, Terror, Law and War, Research and Criminal Justice Governance, Indigenous Peoples in Global Context, History, Memory and Violence in Asia, Australian Politics: Democracy & Justice
                        </div>
                        <a class="btn btn-small btn-order full-width" href="#">ORDER NOW</a>
                    </article>
                </div>
                <div class="col-sm-4">
                    <article class="subjects-boxes bg-danger">
                        <div class="course-title">
                            <span class="text-danger">Management</span>
                        </div>
                        <div class="icon-course">
                            <i class="far fa-chart-bar"></i>
                        </div>
                        <div class="course-title-inside">Management</div>
                        <div class="course-details">
                            Researching Politics, Comparative Public Policy, Global Governance: Origins, Challenges and Trajectories, Politics of International Law, Security & Development,Philosophies and Practice of Nonviolence, Hybridity, China in a Changing World
                        </div>
                        <a class="btn btn-small btn-order full-width" href="#">ORDER NOW</a>
                    </article>
                </div>
                <div class="col-sm-4">
                    <article class="subjects-boxes bg-dark">
                        <div class="course-title">
                            <span>Marketing</span>
                        </div>
                        <div class="icon-course">
                            <i class="fas fa-ad"></i>
                        </div>
                        <div class="course-title-inside">Marketing</div>
                        <div class="course-details">
                            Management and Decision Making, Contemporary Issues in Entrepreneurship and Innovation, Integrative Business Practice, Organisational Behaviour, Accounting Information and Managerial Decision Making, Business Information Systems for a Rapidly Changing World
                        </div>
                        <a class="btn btn-small btn-order full-width" href="#">ORDER NOW</a>
                    </article>
                </div>
                <div class="col-sm-4">
                    <article class="subjects-boxes bg-danger">
                        <div class="course-title">
                            <span class="text-danger">Politics</span>
                        </div>
                        <div class="icon-course">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="course-title-inside">Politics</div>
                        <div class="course-details">
                            War and Peace, Social and Economic Justice, Poverty; Development; and Environmental Sustainability, National and Regional Security In Broad Contexts, Including Military, Politics and Economics, Political and Regional Globalisation
                        </div>
                        <a class="btn btn-small btn-order full-width" href="#">ORDER NOW</a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="about-us" class="about-us-section py-4 bg-white">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">About Us</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <h3 class="text-center">At your services</h3>
                    <p>EduConsultOrg is the #01 online platform where students can get in touch with the best academic consultants for just about every subject matter.<br/>We’ve started our online journey back at 2013.<br/>Backed by a carefully selected team of expert writers with vast academic experience, we complete essay writing projects for all levels and disciplines!</p>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <h3 class="text-center">Customer Satisfaction</h3>
                    <p>Keeping our clients satisfied is our primary focus, therefore we do not cut any corners. We put a tremendous amount of effort into each order to ensure that customer communication, project management and project quality assurance processes in all levels, are exceeding your expectations.<br/><b>We succeed when you succeed!</b></p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h3 class="text-center">What Our Customers Say About Us</h3>
                    <hr>
                </div>
            </div>
            <div class="row mt-3 testimonials">

                @foreach($testimonials as $member)
                    <div class="col-sm-4">
                        <div class="testimonial-user">
                            <!--Avatar-->
                            <div class="testimonial-user-avatar mx-auto">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" class="img-fluid rounded-circle" />
                            </div>
                            <!--Content-->
                            <h4 class="avatar-name">{{ $member->name }}</h4>
                            <h6 class="text-primary prof">{{ $member->role }}</h6>
                            <p class="text-center">{{ $member->message }}</p>
                            <!--Review-->
                            <div class="star-text">
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                                <i class="fas fa-star"> </i>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>

        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact" class="contact-section text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">Contact Us</h3>
                    <p>Stay in touch! We offer a variety of communication channels but you can always sent us an email and say: <a href="" class="blue-color">hello@educonsultorg.com</a></p>
                    <hr>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 col-sm-4 contact-boxes">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-map-marked text-danger"></i>
                            <h6 class="mt-2"><b>OUR OFFICE</b></h6>
                        </div>
                        <div class="description-text">
                            <p><br/>
                                Bute Mills<br/>
                                74 Bute Street, Luton<br/>
                                LU1 2EY
                            </p>
                        </div>
                        <a class="btn btn-eco pointer" data-toggle="modal" data-target="#mapModal">See on Map</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 contact-boxes">
                    <div class="content">
                        <div class="icon">
                            <i class="fas fa-info-circle text-danger"></i>
                            <h6 class="mt-2"><b>NEED HELP?</b></h6>
                        </div>
                        <div class="description-text">
                            <p><br/>
                                Visit our Help Center for<br/>
                                Frequently Asked Questions.<br/><br/>
                            </p>
                        </div>
                        <a href="#" class="btn btn-eco pointer">FAQ</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 contact-boxes">
                    <div class="content">
                        <div class="icon">
                            <i class="far fa-comments text-danger"></i>
                            <h6 class="mt-2"><b>NEED TO TALK?</b></h6>
                        </div>
                        <div class="description-text">
                            <p><br/>
                                You have a question that we hasn’t been answered yet?<br/>
                                Don’t hesitate to ask now!<br/>
                            </p>
                        </div>
                        <a class="btn btn-eco mt-2 pointer">CHAT</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="mapModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Our Office</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2449.3520105831217!2d-0.4205106842071379!3d52.12791797974188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4877b64261a52c9d%3A0x6af698b0216051fc!2sVijay+House+Limited!5e0!3m2!1sen!2suk!4v1529133945868" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection
