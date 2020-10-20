<template>

    <div class="container" style="padding: 2rem 3.5rem 2rem 6rem; text-align: left;">
        <div class="row">
            <div class="col-md-9">
                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Academic Level
                            <i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="right" title="Are you seeking to continue your education (Student) or heading out into the world of work (Professional)?"></i>
                        </legend>
                        <div class="col-sm-8">
                            <div class="form-check" v-for="level in academic_levels">
                                <input class="form-check-input"
                                       type="radio"
                                       :id="'academic' + level.id"
                                       :value="level.id"
                                       @change="updateField($event, 'academic_level')"
                                       :checked="parseInt(Order.academic_level) === parseInt(level.id)"
                                >
                                <label class="form-check-label" :for="'academic' + level.id">
                                    {{ level.label }}
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Product
                            <i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="right" title="Which of our services do you wish to order? Do you require help with a personal statement or something else (CV editing, for instance)? If you select ‘Additional Services’, please head directly to step five (‘Additional Services’ checkboxes below)."></i>
                        </legend>
                        <div class="col-sm-8">
                            <div class="form-check" v-for="product in products">
                                <input class="form-check-input"
                                       type="radio"
                                       :id="'product' + product.id"
                                       :value="product.id"
                                       @change="updateField($event, 'product')"
                                       :checked="parseInt(Order.product) === parseInt(product.id)"
                                >
                                <label class="form-check-label" :for="'product' + product.id">
                                    {{ product.label }}
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Level
                            <i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="right" title="Level"></i>
                        </legend>
                        <div class="col-sm-8">
                            <select :disabled="Order.product == 2" id="level" class="form-control" @change="updateField($event, 'level')">
                                <option v-for="item in Levels" :value="item.id" :selected="Order.name === item.name">
                                    {{item.name}}
                                </option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Type of Service
                            <i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="right" title="Type of service"></i>
                        </legend>
                        <div class="col-sm-8">
                            <select :disabled="Order.product == 2" id="type_of_service" class="form-control" @change="updateField($event, 'type_of_service')">
                                <option v-for="item in type_of_services" :value="item.id" :selected="Order.type_of_service === parseInt(item.id)">
                                    {{item.label}}
                                </option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Additional Services
                            <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Product"></i>
                        </legend>
                        <div class="col-sm-8">
                            <div class="form-check" v-for="(additional, index) in AdditionalServices" :key="index">
                                <input class="form-check-input"
                                       type="checkbox"
                                       :id="additional.id"
                                       :value="additional.id"
                                       v-model="add_services"
                                >
                                <label class="form-check-label" :for="additional.id">
                                    {{ additional.name }}
                                    <span class="text-muted small">(£{{ +additional.rates[0].total }})</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Delivery
                            <i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="right" title="Delivery"></i>
                        </legend>
                        <div class="col-sm-8">
                            <select id="delivery" class="form-control" @change="updateField($event, 'delivery')">
                                <option v-for="item in delivery" :value="item.value" :selected="Order.delivery == parseInt(item.value)">
                                    {{item.label}}
                                </option>
                            </select>
                        </div>
                    </div>
                </fieldset>

            </div>

            <div class="col-md-3 grey p-3" style="background-color: #f5f5f5;">
                <Cart/>
            </div>
        </div>
    </div>
</template>

<script>
    import {validationMixin} from 'vuelidate'
    import {required, email} from 'vuelidate/lib/validators'
    import Cart from "../GUI/Cart";

    import { mapGetters } from 'vuex'

    export default {
        components: {Cart},
        props: ['clickedNext', 'currentStep'],
        data() {
            return {
                add_services: [],
                academic_levels: [
                    {id: 1, label: 'Student',},
                    {id: 2, label: 'Professional',}
                ],
                products: [
                    {id: 1, label: 'Personal Statement',},
                    {id: 2, label: 'Additional Services Only',}
                ],
                type_of_services: [
                    {id: 1, label: "New"},
                    {id: 2, label: "Edit"}
                ],
                delivery: [
                    {id: 1, value: 1, label: "24 hours"},
                    {id: 2, value: 5, label: "5 days"}
                ]
            }
        },
        computed: {
            ...mapGetters({
                Order: 'OrderDetails/getOrder',
                Levels: 'OrderLevels/get',
                AdditionalServices: 'Services/getAdditionalServices'
            })
        },
        watch: {
            $v: {
                handler: function (val) {
                    this.$emit('can-continue', {value: true});
                },
                deep: true
            },
            clickedNext(val) {

            },
            currentStep(val){
                if(val.index === 0) {
                    this.$emit('can-continue', {value: true});
                }
            },
            add_services(val) {
                this.$store.dispatch('OrderDetails/updateOrder', {['additional_services']: val}).then(() => {
                    this.$store.dispatch('OrderDetails/fetchTotal', val);

                    if(this.Order.product == 2) {
                        this.$emit('can-continue', {value: val.length});
                    }


                });
            }
        },
        methods: {
            updateField(event, fieldName) {
                this.$store.dispatch('OrderDetails/updateOrder', {[fieldName]: event.target.value}).then(() => {
                    this.$store.dispatch('OrderDetails/fetchTotal', this.add_services);

                    if (fieldName === 'product' && event.target.value == 2 && !this.add_services.length) {
                        this.$emit('can-continue', {value: false});
                    }

                    if(fieldName === 'product' && event.target.value == 1) {
                        this.$emit('can-continue', {value: true});
                    }

                    if(this.add_services.length && this.Order.product != 2) {
                        this.$emit('can-continue', {value: true});
                    }
                });
            }
        },
        mounted() {
            this.$store.dispatch('OrderLevels/getLevels');
            this.$store.dispatch('Services/getAdditionalServices').then(() => {
                this.$store.dispatch('OrderDetails/fetchTotal', this.add_services);
            });

            this.$emit('can-continue', {value: true});
        }
    }
</script>

<style lang="scss">
    .step-subtitle {
        font-size: 12px!important;
    }
</style>
