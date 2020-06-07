<template>
    <div class="container" style="padding: 2rem 3.5rem 2rem 6rem; text-align: left;">
        <div class="row">
            <div class="col-md-9">
                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">First Name *</legend>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">Last Name *</legend>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">Email Address *</legend>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">Phone</legend>
                        <div class="col-sm-8">
                            <input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">Password *</legend>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">Confirm Password *</legend>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-3 grey p-3" style="background-color: #f5f5f5;">
                <Cart></Cart>
            </div>
        </div>
    </div>
</template>

<script>
    import Cart from "../GUI/Cart";

    export default {
        name: "CustomerDetails",
        components: {Cart}
    }
</script>

<style scoped>

</style>
