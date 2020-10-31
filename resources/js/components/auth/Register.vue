<template>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                    @click="$emit('toggleRegisterModal')"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               :class="{ 'is-invalid': errors.firstname || resultError }"
                               v-model="form.firstname"
                               required
                               autocomplete="firstname"
                               autofocus
                               placeholder="Firstname"
                               @keyup="errors.firstname = null"
                        >
                        <span v-if="errors" class="invalid-feedback" role="alert">
                            <strong v-if="errors.firstname">{{ errors.firstname }}</strong>
                            <strong v-if="resultError">{{resultErrorMessage}}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               v-model="form.lastname"
                               :class="{ 'is-invalid': errors.lastname || resultError }"
                               required
                               autocomplete="lastname"
                               autofocus
                               placeholder="Lastname"
                               @keyup="errors.lastname = null"
                        >
                        <span v-if="errors" class="invalid-feedback" role="alert">
                            <strong v-if="errors.lastname">{{ errors.lastname }}</strong>
                            <strong v-if="resultError">{{resultErrorMessage}}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="email"
                               class="form-control"
                               v-model="form.email"
                               :class="{ 'is-invalid': errors.email || resultError || emailExists }"
                               required
                               autocomplete="email"
                               placeholder="E-Mail Address"
                               @keyup="errors.email = null; emailExists = false"
                        >
                        <span v-if="errors || emailExists" class="invalid-feedback" role="alert">
                            <strong v-if="errors.email">{{ errors.email }}</strong>
                            <strong v-if="resultError">{{resultErrorMessage}}</strong>
                            <strong v-if="emailExists">E-mail already exists. Please login!</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               v-model="form.phone"
                               :class="{ 'is-invalid': errors.phone || resultError }"
                               required
                               autocomplete="phone"
                               autofocus
                               placeholder="Phone"
                               @keyup="errors.phone = null"
                        >
                        <span v-if="errors" class="invalid-feedback" role="alert">
                            <strong v-if="errors.phone">{{ errors.phone }}</strong>
                            <strong v-if="resultError">{{resultErrorMessage}}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="password"
                               class="form-control"
                               v-model="form.password"
                               :class="{ 'is-invalid': errors.password || resultError }"
                               required
                               autocomplete="new-password"
                               placeholder="Password"
                               @keyup="errors.password = null"
                        >
                        <span v-if="errors" class="invalid-feedback" role="alert">
                            <strong v-if="errors.password">{{ errors.password }}</strong>
                            <strong v-if="resultError">{{resultErrorMessage}}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="password"
                               class="form-control"
                               v-model="form.confirmPassword"
                               :class="{ 'is-invalid': (errors.confirmPassword && form.password) || resultError }"
                               required
                               autocomplete="new-password"
                               placeholder="Confirm Password"
                               @keyup="errors.confirmPassword = null"
                        >
                        <span v-if="errors" class="invalid-feedback" role="alert">
                            <strong v-if="errors.confirmPassword && form.password">{{ errors.confirmPassword }}</strong>
                            <strong v-if="resultError">{{resultErrorMessage}}</strong>
                        </span>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" @click="register">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import rules from "../mixins/rules";

    export default {
        name: "Register",
        mixins: [rules],
        data() {
            return {
                form: {
                    firstname: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    password: null,
                    confirmPassword: null,
                },
                errors: {
                    firstname: null,
                    lastname: null,
                    email: null,
                    phone: null,
                    password: null,
                    confirmPassword: null,
                },
                resultError: false,
                emailExists: false,
                resultErrorMessage: '',
            }
        },
        watch: {
            'form.email': function(val) {
                this.checkIfEmailExists(val);
            }
        },
        methods: {
            register(e) {
                this.errors = {};

                // Firstname
                if(!this.form.firstname) {
                    Object.assign(this.errors, {
                        firstname: 'Firstname required'
                    })
                }

                // Lastname
                if(!this.form.lastname) {
                    Object.assign(this.errors, {
                        lastname: 'Lastname required'
                    })
                }

                // Phone
                if(!this.form.phone) {
                    Object.assign(this.errors, {
                        phone: 'Phone required'
                    })
                }

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

                // Password
                if (!this.form.password) {
                    Object.assign(this.errors, {
                        password: 'Password required'
                    })
                } else if (!this.validPassword(this.form.password)) {
                    Object.assign(this.errors, {
                        password: 'Weak password. Please use at least 8 characters, 1 Uppercase, 1 Lowercase and 1 number.'
                    })
                }

                // Confirm Pass
                if (!this.form.confirmPassword) {
                    Object.assign(this.errors, {
                        confirmPassword: 'Please confirm your password'
                    })
                } else if (this.form.password !== this.form.confirmPassword) {
                    Object.assign(this.errors, {
                        confirmPassword: 'Passwords do not match'
                    })
                }

                if (Object.keys(this.errors).length === 0 && this.errors.constructor === Object) {
                    let data = {
                        firstname: this.form.firstname,
                        lastname: this.form.lastname,
                        email: this.form.email,
                        phone: this.form.phone,
                        password: this.form.password,
                        password_confirmation: this.form.confirmPassword
                    }

                    this.$store.dispatch('CustomerDetails/register', data).then((res) => {
                        if (!res || res.info) {
                            this.resultError = true
                            this.errors = {}
                        }
                    });
                }

                e.preventDefault();
            },
            checkIfEmailExists(val) {
                if (val.length && this.validEmail(val)){
                    this.$store.dispatch('CustomerDetails/checkUserEmail', val).then(res => {
                        if (res.info.data.count > 0) {
                            this.emailExists = true
                        }
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>
