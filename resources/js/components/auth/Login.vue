<template>
    <div>
        <h5 class="card-title text-center">Sign In</h5>

        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="email" type="email"
                       class="form-control" placeholder="E-Mail Address"
                       v-model="email" required
                       autocomplete="email" autofocus
                       :class="{ 'is-invalid': errors.email || resultError }"
                >
                <span v-if="errors" class="invalid-feedback" role="alert">
                    <strong v-if="errors.email">{{ errors.email }}</strong>
                    <strong v-if="resultError">{{resultErrorMessage}}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="password" type="password"
                       class="form-control" v-model="password"
                       placeholder="Password" required
                       autocomplete="current-password"
                       :class="{ 'is-invalid': errors.password }"
                >
                <span class="invalid-feedback" role="alert">
                    <strong>{{ errors.password }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row text-center">
            <label for="password" class="col-md-3 col-form-label text-md-right"></label>
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-success btn-sm" @click="submit">
                    Login
                </button>

                <a class="btn btn-link" href="/password/reset">
                    Forgot Your Password?
                </a>
            </div>
        </div>

        <hr>

        <div class="form-group row mt-3">
            <div class="col-md-8 offset-md-4">
                <span>
                    Don't have an account? <a href="#" @click="$emit('toggleRegisterModal')">Sign up</a>
                </span>
            </div>
        </div>
    </div>
</template>

<script>

    import rules from "../mixins/rules";

    export default {
        name: "Login",
        mixins: [rules],
        data() {
            return {
                errors: {
                    email: null,
                    password: null
                },
                email: null,
                password: null,
                resultError: false,
                resultErrorMessage: '',
            }
        },
        methods: {
            submit(e) {
                this.errors = {};
                this.resultError = false;

                if (!this.email) {
                    Object.assign(this.errors, {
                        email: 'Email required'
                    })
                } else if (!this.validEmail(this.email)) {
                    Object.assign(this.errors, {
                        email: 'Valid email required'
                    })
                }

                if (!this.password) {
                    Object.assign(this.errors, {
                        password: 'Password required'
                    })
                }

                if (!this.errors.email && !this.errors.password) {

                    let data = {
                        email: this.email,
                        password: this.password
                    };

                    this.$store.dispatch('CustomerDetails/login', data).then((res) => {
                        if (!res || res.info) {
                            this.resultError = true
                            this.errors = {}
                            this.resultErrorMessage = 'These credentials do not match our records.';
                        }
                    });
                }

                e.preventDefault();
            },
        }
    }
</script>
