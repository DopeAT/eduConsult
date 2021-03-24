<form method="POST" action="{{ route('profile.settings.update', $user->id) }}" class="pt-3" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="row align-items-center mb-3">
        <div class="col-8">
            <h3 class="mb-0">My account</h3>
        </div>
        <div class="col-4 text-right">
            <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
        </div>
    </div>

    <h6 class="heading-small text-muted mb-4">User information</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="firstname">First name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="First name" value="{{$user->firstname}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="lastname">Last name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Last name" value="{{$user->lastname}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="email">Email address</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="phone">Telephone</label>
                    <input type="phone" name="phone" class="form-control" value="{{$user->phone}}">
                </div>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <!-- Address -->
    <h6 class="heading-small text-muted mb-4">Contact information</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-weight-bold" for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Home Address" value="{{ $user->address ? $user->address->fullAddress() : '' }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="city">City</label>
                    <input type="text" name="city" class="form-control" placeholder="City" value="{{ $user->address->city }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="country">Country</label>
                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{ $user->address->city }}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="font-weight-bold" for="postcode">Postcode</label>
                    <input type="text" name="postcode" class="form-control" placeholder="Postal code" value="{{ $user->address->postcode }}">
                </div>
            </div>
        </div>
    </div>
</form>
