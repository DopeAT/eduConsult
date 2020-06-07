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
                                       :id="level.id"
                                       :value="level.value"
                                       @change="updateField($event, 'academic_level')"
                                       :checked="Order.academic_level == level.value"
                                >
                                <label class="form-check-label" :for="level.id">
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
                                       :id="product.id"
                                       :value="product.value"
                                       @change="updateField($event, 'product')"
                                       :checked="Order.product == product.value"
                                >
                                <label class="form-check-label" :for="product.id">
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
                            <select id="level" class="form-control" @change="updateField($event, 'level')">
                                <option v-for="(item, key) in levels" :value="key" :selected="Order.level === item">
                                    {{item}}
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
                            <select id="type_of_service" class="form-control" @change="updateField($event, 'type_of_service')">
                                <option v-for="(item, key) in type_of_services" :value="key" :selected="Order.type_of_service === item">
                                    {{item}}
                                </option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group mb-3">
                    <div class="row">
                        <legend class="col-form-label font-weight-bold col-sm-4 pt-0">
                            Product
                            <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Product"></i>
                        </legend>
                        <div class="col-sm-8">
                            <div class="form-check" v-for="(additional, index) in additional_services" :key="index">
                                <input class="form-check-input"
                                       type="checkbox"
                                       :id="additional.id"
                                       :value="additional.value"
                                       v-model="add_services"
                                >
                                <label class="form-check-label" :for="additional.id">
                                    {{ additional.label }}
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
                                <option v-for="(item, key) in delivery" :value="key" :selected="Order.delivery === key">
                                    {{item}}
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
                    {id: 'student',value: 'student',label: 'Student',},
                    {id: 'professional',value: 'professional',label: 'Professional',}
                ],
                products: [
                    {id: 'personal_statement',value: 'personal_statement',label: 'Personal Statement',},
                    {id: 'additional_services_only',value: 'additional_services_only',label: 'Additional Services Only',}
                ],
                levels: {
                    "ucas": "Ucas",
                    "oxbridge": "Oxbridge",
                    "postgraduate": "Postgraduate",
                    "specialist": "Specialist"
                },
                type_of_services: {
                    "new": "New",
                    "edit": "Edit"
                },
                additional_services: [
                    {id: 'career_questions',value: 'career_questions',label: 'Career Questions'},
                    {id: 'letters_of_recommendation',value: 'letters_of_recommendation',label: 'Letters of Recommendation'},
                    {id: 'references',value: 'references',label: 'References'},
                    {id: 'cover_letter',value: 'cover_letter',label: 'Cover Letter'},
                    {id: 'cv_editing',value: 'cv_editing',label: 'CV Editing'}
                ],
                delivery: {
                    "1": "24 hours",
                    "3": "3 days",
                    "7": "7 days",
                }
            }
        },
        computed: {
            ...mapGetters({
                Order: 'OrderDetails/getOrder'
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
                this.$store.commit('OrderDetails/updateOrder', {['additional_services']: val});
            }
        },
        methods: {
            updateField(event, fieldName) {
                this.$store.commit('OrderDetails/updateOrder', {[fieldName]: event.target.value});
            }
        },
        mounted() {
            this.$emit('can-continue', {value: true});
        },
        updated() {
            this.$emit('can-continue', {value: true});
        }
    }
</script>

<style lang="scss">
    .step-subtitle {
        font-size: 12px!important;
    }
</style>
