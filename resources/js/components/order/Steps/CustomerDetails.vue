<template>
    <div class="container mainContainer">
        <div class="row">
            <div class="col-md-9">
                <LoginForm @toggleRegisterModal="toggleRegisterModal"></LoginForm>
            </div>

            <div ref="modal"
                 class="modal fade"
                 :class="{show, 'd-block': modal.active}"
                 tabindex="-1"
                 role="dialog"
            >
                <RegisterForm @toggleRegisterModal="toggleRegisterModal"></RegisterForm>
            </div>
            <div v-if="modal.active" class="modal-backdrop fade show"></div>

            <div class="col-md-3 grey p-lg-3 py-md-3 px-md-0" style="background-color: #f5f5f5;">
                <Cart></Cart>
            </div>
        </div>
    </div>
</template>

<script>
    import Cart from "../GUI/Cart";
    import LoginForm from "../../auth/Login";
    import RegisterForm from "../../auth/Register";

    export default {
        name: "CustomerDetails",
        components: {RegisterForm, LoginForm, Cart},
        data() {
            return {
                modal: {
                    active: false,
                    show: false
                }
            }
        },
        computed: {
            show() {
                return this.modal.show
            }
        },
        methods: {
            toggleRegisterModal() {
                const body = document.querySelector("body");
                this.modal.active = !this.modal.active;
                this.modal.active
                    ? body.classList.add("modal-open")
                    : body.classList.remove("modal-open");
                setTimeout(() => (this.modal.show = !this.modal.show), 10);
            },
        },
        mounted() {
            window.scrollTo(0,0);
        }
    }
</script>

<style scoped>
    .mainContainer {
        padding: 2rem 3.5rem 2rem 6rem; text-align: left;
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 768px) {

    }

    /* Medium devices (tablets, 768px and up) */
    @media (max-width: 992px) {
        .mainContainer {
            padding: 2rem 0.5rem 1rem 0.5rem;text-align: left;
        }
    }
</style>
