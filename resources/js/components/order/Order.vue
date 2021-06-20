<template>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 my-3 py-3">
                    <horizontal-stepper
                        :steps="orderSteps"
                        @completed-step="completeStep"
                        @active-step="isStepActive"
                        @stepper-finished="alert"
                    >
                    </horizontal-stepper>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import HorizontalStepper from 'vue-stepper';

import OrderDetails from "./Steps/OrderDetails";
import CustomerDetails from "./Steps/CustomerDetails";
import Payment from "./Steps/Payment";
import OrderComplete from "./Steps/OrderComplete";
import {mapGetters} from "vuex";

export default {
    name: "Order",
    components: {
        HorizontalStepper
    },
    data(){
        return {
            demoSteps: [
                {
                    icon: 'book',
                    name: 'OrderDetails',
                    title: 'Order Details',
                    subtitle: 'Personalise your order',
                    component: OrderDetails,
                    completed: true

                },
                {
                    icon: 'perm_identity',
                    name: 'CustomerDetails',
                    title: 'Your Details',
                    subtitle: 'Tell us more about yourself',
                    component: CustomerDetails,
                    completed: false
                },
                {
                    icon: 'payment',
                    name: 'Payment',
                    title: 'Payment',
                    subtitle: 'Make payment',
                    component: Payment,
                    completed: false
                },
                {
                    icon: 'check',
                    name: 'OrderComplete',
                    title: 'Overview',
                    subtitle: 'Review your order',
                    component: OrderComplete,
                    completed: false
                },
            ]
        }
    },
    computed: {
        ...mapGetters({
            currentUser: 'CustomerDetails/getCurrentUser'
        }),
        orderSteps() {

            if(this.currentUser && this.currentUser.id) {
                return this.demoSteps.filter(step => {
                    return step.name != 'CustomerDetails';
                });
            }

            return this.demoSteps;
        }
    },
    methods: {
        // Executed when @completed-step event is triggered
        completeStep(payload) {
            this.demoSteps.forEach((step) => {
                if (step.name === payload.name || step.name === 'OrderDetails') {
                    step.completed = true;
                }
            })
        },
        // Executed when @active-step event is triggered
        isStepActive(payload) {
            this.demoSteps.forEach((step) => {
                if (step.name === payload.name) {
                    if(step.completed === true) {
                        step.completed = false;
                    }
                }
            })
        },
        // Executed when @stepper-finished event is triggered
        alert(payload) {
            window.location.href = '/';
        }
    },
    mounted() {
        this.$store.dispatch('CustomerDetails/getMe');
        this.$store.commit('OrderDetails/setDiscount', null);
    },
    beforeDestroy() {
        this.$store.commit('CustomerDetails/setCurrentUser', {});
    }
}
</script>

<style lang="scss">

    .stepper-box {
        box-shadow: none;
    }

    .stepper-box .content {
        margin: 1.5rem 0 0.5rem 0!important;
    }

    .stepper-box .bottom {
        padding: 1rem!important;
    }

</style>
