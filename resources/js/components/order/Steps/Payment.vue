<template>
    <div class="container" style="padding: 2rem 3.5rem 2rem 6rem; text-align: left;">
        <div class="row">
            <div class="col-md-12">
                <PaymentForm @can-continue="emitCanContinue"></PaymentForm>
            </div>
        </div>
    </div>
</template>

<script>
    import PaymentForm from "../GUI/Payments/PaymentForm";

    export default {
        components: {PaymentForm},
        methods: {
            emitCanContinue() {
                this.$emit('can-continue', {value: true});
            }
        },
        mounted() {

        }
    }
</script>

<style lang="scss">
#payment-form {

    .StripeElement {
        box-sizing: border-box;
        padding: 20px 15px;
        width: 100%;
        margin: 0 0 5px 0;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        border: 2px solid #e1e1e1;
        border-radius: 4px;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
        border-color: #a1cbef;
        outline: 0;
    }

    .StripeElement--invalid {
        border-color: #e3342f;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

}
</style>
