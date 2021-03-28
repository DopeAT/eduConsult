<!-- Contact Section -->
<section id="contact" class="contact-section text-center py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">Contact Us</h3>
                <p>
                    Stay in touch! We offer a variety of communication channels but you can always sent us an email and say:
                    <a href="mailto:{{env('HELLO_EMAIL')}}" class="blue-color">{{env('HELLO_EMAIL')}}</a>
                </p>
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
                        <p>
                            <br/>{{ env('ADDRESS') }}
                            <br/>{{ env('CITY') }}, {{ env('POSTCODE') }}
                            <br/>{{ env('COUNTRY') }}
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
                        <p>
                            <br/>Visit our Help Center for
                            <br/>Frequently Asked Questions.
                            <br/><br/>
                        </p>
                    </div>
                    <a href="{{ route('faqs') }}" class="btn btn-eco pointer">FAQ</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 contact-boxes">
                <div class="content">
                    <div class="icon">
                        <i class="far fa-comments text-danger"></i>
                        <h6 class="mt-2"><b>NEED TO TALK?</b></h6>
                    </div>
                    <div class="description-text">
                        <p>
                            <br/> You have a question that we haven’t been answered yet?
                            <br/>Don’t hesitate to ask now!
                            <br/>
                        </p>
                    </div>
                    <a href="javascript:void(Tawk_API.toggle())" class="btn btn-eco mt-2 pointer">CHAT</a>
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
                    <iframe src="{{ env('MAP_ID') }}" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</section>
