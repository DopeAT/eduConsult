<!-- partners -->
<section id="logos-section" class="py-4 bg-white">
    <div class="container text-center">

        <ul class="list-inline row">
            @foreach($partners as $partner)
                <li class="col-lg-3 col-6 mb-3">
                    <img class="img-fluid" src="/images/logos/{{$partner->image}}" alt="{{$partner->name}}" title="{{$partner->name}}">
                </li>
            @endforeach
        </ul>
    </div>
</section>
