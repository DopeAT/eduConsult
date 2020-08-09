<template>
    <form id="payment-form" @submit.prevent="purchase">

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" placeholder="Email Address" v-model="email">
        </div>

        <div class="form-group">
            <label for="cardName">Cardholder Name</label>
            <input type="text" class="form-control" id="cardName" placeholder="Cardholder Name" v-model="cardName">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Mobile Phone" name="phone">
        </div>

        <div class="form-group">
            <label for="postCode">Postal Code</label>
            <input type="text" class="form-control" id="postCode" placeholder="Postcode" name="postCode">
        </div>

        <div class="form-group">
            <label for="card-element">Credit Card</label>
            <CreditCard />
        </div>

        <div class="row">

            <div class="col-12 mt-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck" v-model="agree">
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback" v-if="agreeError">
                        {{ agreeErrorText }}
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2 mx-0">
                <button class="btn btn-md btn-success">Proceed Payment</button>
            </div>
        </div>
    </form>
</template>

<script>
    import { createToken } from 'vue-stripe-elements-plus'
    import CreditCard from "./CreditCard";

    export default {
        name: "PaymentForm",
        components: {
            CreditCard
        },
        data() {
            return {
                stripeToken: null,
                cardName: null,
                phone: null,
                email: null,
                postCode: null,
                agree: false,
                agreeError: false,
                agreeErrorText: null
            }
        },
        methods: {
            purchase() {

                if(!this.agree) {
                    this.agreeError = true;
                    this.agreeErrorText = "You must agree before proceed to payment.";
                    return;
                }

                try {

                    createToken().then(res => {

                        if(!res.token.id) return;

                        this.stripeToken = res.token.id

                        let data = {
                            stripeToken: this.stripeToken,
                            cardName: this.cardName,
                            phone: this.phone,
                            email: this.email,
                            postCode: this.postCode,
                            amount: 135
                        }

                        axios.post("/charge", data).then(result => {

                            if(result.data.success) {
                                // this.$store.commit('clearCart');
                                // this.$router.push("/");
                                alert(result.data.message)
                            }
                        });
                    });

                } catch (err) {

                }

            }
        }
    }
</script>

<style scoped>

</style>
