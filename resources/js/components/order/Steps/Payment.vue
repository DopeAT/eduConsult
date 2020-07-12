<template>
    <div class="container" style="padding: 2rem 3.5rem 2rem 6rem; text-align: left;">
        <div class="row">
            <div class="col-md-12">

<!--                <div class="card">-->
<!--                    &lt;!&ndash; Card body &ndash;&gt;-->
<!--                    <div class="card-body">-->
<!--                        <div class="mt-4">-->
<!--                            <form role="form" class="form-primary">-->
<!--                                <div class="form-group">-->
<!--                                    <div class="input-group input-group-alternative mb-3">-->
<!--                                        <div class="input-group-prepend">-->
<!--                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>-->
<!--                                        </div>-->
<!--                                        <input class="form-control" placeholder="Name on card" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <div class="input-group input-group-alternative mb-3">-->
<!--                                        <div class="input-group-prepend">-->
<!--                                            <span class="input-group-text"><i class="ni ni-credit-card"></i></span>-->
<!--                                        </div>-->
<!--                                        <input class="form-control" placeholder="Card number" type="text">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <div class="input-group input-group-alternative mb-3">-->
<!--                                                <div class="input-group-prepend">-->
<!--                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>-->
<!--                                                </div>-->
<!--                                                <input class="form-control" placeholder="MM/YY" type="text">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-6">-->
<!--                                        <div class="form-group">-->
<!--                                            <div class="input-group input-group-alternative">-->
<!--                                                <div class="input-group-prepend">-->
<!--                                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>-->
<!--                                                </div>-->
<!--                                                <input class="form-control" placeholder="CCV" type="text">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <button type="button" class="btn btn-block btn-info">Save new card</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->



                <form action="/charge" method="post" id="payment-form">
                    <div class="form-row">
                        <input type="hidden" name="_token" value="u4P2441oyIX9XoNNZ41apJb3Dz9qoQTQIaJzxyGA">
                        <p><input type="text" name="amount" placeholder="Enter Amount" /></p>
                        <p><input type="email" name="email" placeholder="Enter Email" /></p>
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <button>Submit Payment</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>



    export default {
        name: "Payment",
        data() {
            return {
                error: "",
                stripe: null,
                card: null,
            }
        },
        methods: {
            // async onPurchase() {
            //     try {
            //
            //         let token = await this.stripe.createToken(this.card);
            //
            //         let res = await axios.post("/charge", {
            //             stripeToken: token,
            //             amount: 25,
            //             email: 'alextser@yahoo.co.uk'
            //         });
            //
            //         // if(res.success) {
            //         //     this.$store.commit('clearCart');
            //         //     this.$router.push("/");
            //         // }
            //
            //         console.log(res)
            //
            //     } catch (err) {
            //         console.log(err)
            //     }
            // }
        },
        mounted() {
            // this.stripe = Stripe("pk_test_f79MYDiik2IQXp7kH1N7OIkO")
            //
            // let elements = this.stripe.elements();
            // this.card = elements.create("card");
            // this.card.mount(this.$refs.card);


            // Create a Stripe client.
            var stripe = Stripe("pk_test_f79MYDiik2IQXp7kH1N7OIkO");

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

        }
    }
</script>

<style lang="scss">
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
