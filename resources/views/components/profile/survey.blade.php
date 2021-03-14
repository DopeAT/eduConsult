<div class="row align-items-center mb-3">
    <div class="col-8">
        <h3 class="mb-0">My account</h3>
    </div>
    <div class="col-4 text-right">
        <span class="btn btn-sm btn-success">Save Changes</span>
    </div>
</div>

<h6 class="heading-small text-muted mb-4">Survey information</h6>

<div class="row">
    <div class="col-sm-12">
        <h6 class="text-center">
            <a href="{{ route('survey', $activeSurvey->order->payment_id) }}" class="font-weight-bold">
                Continue with your survey
            </a>
        </h6>
    </div>
</div>
