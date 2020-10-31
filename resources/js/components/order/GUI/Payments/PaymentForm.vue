<template>
    <form id="payment-form" @submit.prevent="purchase">

        <template v-if="isLoading">
            <div class="loadContent">
                <div id="loader"></div>
            </div>
        </template>

        <template>
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email"
                       class="form-control"
                       :class="{ 'is-invalid': errors.email }"
                       id="email"
                       placeholder="Email Address"
                       v-model="form.email"
                       :readonly="paymentProceed"
                >
                <span v-if="errors || emailExists" class="invalid-feedback" role="alert">
                    <strong v-if="errors.email">{{ errors.email }}</strong>
                </span>
            </div>

            <div class="form-group">
                <label for="cardName">Cardholder Name *</label>
                <input type="text"
                       class="form-control"
                       :class="{ 'is-invalid': errors.cardName }"
                       id="cardName"
                       placeholder="Cardholder Name"
                       v-model="form.cardName"
                       :readonly="paymentProceed"
                >
                <span v-if="errors" class="invalid-feedback" role="alert">
                    <strong v-if="errors.cardName">{{ errors.cardName }}</strong>
                </span>
            </div>

            <div class="form-group">
                <label for="phone">Phone *</label>
                <input type="text"
                       class="form-control"
                       :class="{ 'is-invalid': errors.phone }"
                       id="phone"
                       placeholder="Mobile Phone"
                       name="phone"
                       v-model="form.phone"
                       :readonly="paymentProceed"
                >
                <span v-if="errors" class="invalid-feedback" role="alert">
                    <strong v-if="errors.phone">{{ errors.phone }}</strong>
                </span>
            </div>

            <div class="form-group">
                <label for="postCode">Post Code</label>
                <input type="text" class="form-control" id="postCode" placeholder="Postcode" name="postCode" v-model="form.postCode"
                       :readonly="paymentProceed">
            </div>

            <div class="form-group">
                <label for="card-element">Credit Card *</label>
                <CreditCard @errorCard="errors.errorCard = $event" @completeCard="completeCard = $event; errors.errorCard = false;"/>
            </div>
        </template>

        <div class="row">

            <div class="col-12 mt-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="invalidCheck" v-model="agree"
                           :readonly="paymentProceed">
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="text-danger" v-if="errors.agreeError && !agree">
                        {{ agreeErrorText }}
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2 mx-0">
                <button class="btn btn-md btn-success" :disabled="(errors.errorCard || !completeCard || !agree || paymentProceed)">Proceed Payment</button>
            </div>

            <div class="col-12 mt-2 mx-0" v-if="paymentProceed && paymentMessage.length">
                <div class="alert" :class="(paymentSuccess ? 'alert-success' : 'alert-danger')" role="alert">
                    {{paymentMessage}}
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import { createToken } from 'vue-stripe-elements-plus'
    import CreditCard from "./CreditCard";
    import {mapGetters} from "vuex";
    import rules from "../../../mixins/rules";

    export default {
        name: "PaymentForm",
        components: {
            CreditCard
        },
        mixins: [rules],
        data() {
            return {
                isLoading: false,
                completeCard: false,
                stripeToken: null,
                agree: false,
                paymentProceed: false,
                paymentSuccess: false,
                paymentMessage: '',
                form: {
                    cardName: null,
                    phone: null,
                    email: null,
                    postCode: null,
                },
                errors: {
                    agreeError: null,
                    agreeErrorText: null,
                    errorCard: null,
                    firstname: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    password: null,
                    confirmPassword: null,
                },
            }
        },
        computed: {
            ...mapGetters({
                CurrentUser: 'CustomerDetails/getCurrentUser',
                Order: 'OrderDetails/getOrder'
            })
        },
        methods: {
            setCustomerFields() {
                this.form.cardName = this.CurrentUser.firstname + ' ' + this.CurrentUser.lastname;
                this.form.phone = this.CurrentUser.phone;
                this.form.email = this.CurrentUser.email;
            },
            purchase() {
                this.errors = {};

                // Email
                if (!this.form.email) {
                    Object.assign(this.errors, {
                        email: 'Email required'
                    })
                } else if (!this.validEmail(this.form.email)) {
                    Object.assign(this.errors, {
                        email: 'Valid email required'
                    })
                }

                // Cardholder Name
                if(!this.form.cardName) {
                    Object.assign(this.errors, {
                        cardName: 'Please enter cardholder name'
                    })
                }

                // Phone
                if(!this.form.phone) {
                    Object.assign(this.errors, {
                        phone: 'Phone required'
                    })
                }

                // Agree
                if(!this.agree) {
                    Object.assign(this.errors, {
                        agree: "You must agree before proceed to payment."
                    })
                }

                if (Object.keys(this.errors).length === 0 && this.errors.constructor === Object) {
                    this.isLoading = true;
                    this.paymentProceed = true;

                    try {

                        createToken().then(res => {

                            if(!res.token.id) return;

                            this.stripeToken = res.token.id

                            let data = {
                                stripeToken: this.stripeToken,
                                cardName: this.form.cardName,
                                phone: this.form.phone,
                                email: this.form.email,
                                postCode: this.form.postCode,
                                amount: this.Order.total,
                                service_id: this.Order.product,
                                product_id: this.Order.level,
                                extra_services: this.Order.additional_services,
                                delivery_id: this.Order.delivery == 5 ? 2 : 1,
                                type_id: this.Order.type_of_service,
                                level_id: this.Order.level,
                            }

                            axios.post("/charge", data).then(result => {
                                this.isLoading = false;
                                this.paymentMessage = result.data.info.message
                                this.paymentSuccess = result.data.info.success;

                                if (result.data.info.success) {
                                    this.$emit('can-continue', {value: true})
                                    this.$store.dispatch('Payment/updateOrder', result.data.data.order);
                                    this.$store.dispatch('Payment/updatePayment', result.data.data.payment);
                                }
                            });
                        });

                    } catch (err) {

                    }
                }

            }
        },
        mounted() {
            if (Object.keys(this.CurrentUser).length === 0 && this.CurrentUser.constructor === Object) {
                window.location.href = '/';
            }
            this.setCustomerFields();
        }
    }
</script>

<style scoped>

    .loadContent {
        position: absolute;
        background: rgba(0, 0, 0, 0.35);
        z-index: 9999;
        height: 100%;
        width: 100%;
    }

    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
