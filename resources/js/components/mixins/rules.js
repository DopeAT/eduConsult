export default {
    methods: {
        validPassword(pass) {
            let passReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/
            return passReg.test(pass);
        },
        validEmail(email) {
            let emailReg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return emailReg.test(email);
        },
    }
}
