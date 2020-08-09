<template>
    <div>
        <card class='stripe-card'
              :class='{ complete }'
              stripe='pk_test_f79MYDiik2IQXp7kH1N7OIkO'
              :options='stripeOptions'
              @change='change($event)'
        />

        <div id="card-errors" role="alert" v-text="errorMessage"></div>
    </div>
</template>

<script>

    import { Card, createToken } from 'vue-stripe-elements-plus'

    export default {
        name: "CreditCard",
        components: { Card },
        data () {
            return {
                complete: false,
                errorMessage: '',
                stripeOptions: {
                    style: {
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
                        },
                    },
                    hidePostalCode: true
                }
            }
        },
        methods: {
            pay () {
                createToken().then(data => console.log(data.token))
            },
            change(event) {
                if (event.error) {
                    this.errorMessage = event.error.message;
                }
            }
        }
    }
</script>

<style>

</style>
