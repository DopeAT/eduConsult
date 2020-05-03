/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$('#formNewsletter').on('submit', function (e) {

    e.preventDefault();

    let newsletterEmailAddress = $('#email-newsletter').val().trim();
    let emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(newsletterEmailAddress == '' || newsletterEmailAddress.length === 0){
        $('#news-feedback').html('<div class="alert alert-danger alert-dismissible" id="alert-danger">\n' +
            '  <button type="button" class="close" data-dismiss="alert" id="alert-btn">&times;</button>\n' +
            '  <strong>Please enter your email address</strong>.\n' +
            '</div>');
    } else if(!emailRegex.test(newsletterEmailAddress)) {
        $('#news-feedback').html('<div class="alert alert-danger alert-dismissible" id="alert-danger">\n' +
            '  <button type="button" class="close" data-dismiss="alert" id="alert-btn">&times;</button>\n' +
            '  <strong>Please enter a valid email address</strong>.\n' +
            '</div>');
    } else {

        axios.post('/api/newsletter/post', $(this).serialize()).then(res => {
            $('#news-feedback').html('<div class="alert alert-success alert-dismissible" id="alert-danger">\n' +
                '  <button type="button" class="close" data-dismiss="alert" id="alert-btn">&times;</button>\n' +
                '  <strong> '+res.data+ '</strong>.\n' +
                '</div>');
            $('#email-newsletter').val('');
        }).catch(err => {
            console.log(err);
        });

    }

})
