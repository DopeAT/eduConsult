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

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$('#formNewsletter').on('submit', function(e){
    e.preventDefault();
    let email_newsletter = $('#email-newsletter').val();
    if(email_newsletter == ''){
        $('#news-feedback').html('<div class="alert alert-danger alert-dismissible" id="alert-danger">\n' +
            '  <button type="button" class="close" data-dismiss="alert" id="alert-btn">&times;</button>\n' +
            '  <strong>Please enter your email address</strong>.\n' +
            '</div>');
    } else {
        $.ajax({
            method: 'POST',
            url: '/newsletter/store',
            data: $(this).serialize(),
            success:function(data){
                $('#news-feedback').html('<div class="alert alert-success alert-dismissible" id="alert-danger">\n' +
                    '  <button type="button" class="close" data-dismiss="alert" id="alert-btn">&times;</button>\n' +
                    '  <strong> '+data+ '</strong>.\n' +
                    '</div>');
                $('#email-newsletter').val('');
            },
            error: function(data){
                var errors = data.responseJSON;
                $('#news-feedback').html('<div class="alert alert-danger alert-dismissible" id="alert-danger">\n' +
                    '  <button type="button" class="close" data-dismiss="alert" id="alert-btn">&times;</button>\n' +
                    '  <strong> '+errors.errors.email+ '</strong>.\n' +
                    '</div>');
            }
        });
    }

});
