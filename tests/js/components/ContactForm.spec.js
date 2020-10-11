import ContactForm from "../../../resources/js/components/ContactForm";
import {mount, createLocalVue} from "@vue/test-utils";
import expect from 'expect';
import moxios from 'moxios'
import contactFormSnapshot from "../../../resources/js/stubs/ContactFormSnapshot";

describe('ContactForm.vue', () => {

    let data = {
        fields: {},
        success: false,
        errors: {}
    };

    let errorResponse = {
        "status": "error",
        "errors": {
            "name": ["The name field is required."],
            "email": ["The email field is required."],
            "phone": ["The phone field is required."],
            "message": ["The message field is required."]
        }
    };

    let successResponse = {
        "status":"success"
    };

    it('it renders form properly', () => {
        const wrapper = mount(ContactForm);

        let html = wrapper.html();

        expect(html).toEqual(contactFormSnapshot);
    });

    it('it renders error messages', () => {
        let dataCopy = Object.assign({}, data);
        dataCopy.errors = errorResponse.errors;

        const wrapper = mount(ContactForm, {
            data() {
                return dataCopy
            }
        });

        expect(wrapper.find('#contact-name-error').isVisible()).toBeTruthy();
        expect(wrapper.find('#contact-name-error').text()).toEqual(dataCopy.errors.name[0]);
        expect(wrapper.find('#contact-email-error').isVisible()).toBeTruthy();
        expect(wrapper.find('#contact-email-error').text()).toEqual(dataCopy.errors.email[0]);
        expect(wrapper.find('#contact-phone-error').isVisible()).toBeTruthy();
        expect(wrapper.find('#contact-phone-error').text()).toEqual(dataCopy.errors.phone[0]);
        expect(wrapper.find('#contact-message-error').isVisible()).toBeTruthy();
        expect(wrapper.find('#contact-message-error').text()).toEqual(dataCopy.errors.message[0]);
    });

    it('it shows success message', () => {
        let dataCopy = Object.assign({}, data);
        dataCopy.success = true;

        const wrapper = mount(ContactForm, {
            data() {
                return dataCopy
            }
        });

        expect(wrapper.find('#contact-success').isVisible()).toBeTruthy();
    });

    it('successful HTTP response is handled properly', () => {
        moxios.install();
        const wrapper = mount(ContactForm);

        wrapper.find('input#name').setValue('Test User');
        wrapper.find('input#email').setValue('foo@bar.com');
        wrapper.find('input#phone').setValue('123-456-7890');
        wrapper.find('textarea#message').setValue('This app rocks!');
        wrapper.find('button.btn-primary').trigger('click');
        moxios.wait(() => {
            let request = moxios.requests.mostRecent()
            request.respondWith({
                status: 200,
                response: successResponse
            }).then(function () {
                expect(wrapper.find('#contact-success').isVisible()).toBeTruthy();
                expect(wrapper.find('name').text()).toEqual('');
                expect(wrapper.find('email').text()).toEqual('');
                expect(wrapper.find('phone').text()).toEqual('');
                expect(wrapper.find('message').text()).toEqual('');
            });
        });

        moxios.uninstall();
    });

    it('errors in HTTP response are displayed properly', () => {
        moxios.install();
        const wrapper = mount(ContactForm);

        wrapper.find('button.btn-primary').trigger('click');
        moxios.wait(() => {
            let request = moxios.requests.mostRecent()
            request.respondWith({
                status: 422,
                response: errorResponse
            }).then(function () {
                expect(wrapper.find('#contact-success').isVisible()).toBeFalsy();
                expect(wrapper.find('#contact-name-error').isVisible()).toBeTruthy();
                expect(wrapper.find('#contact-name-error').text()).toEqual(errorResponse.errors.name[0]);
                expect(wrapper.find('#contact-email-error').isVisible()).toBeTruthy();
                expect(wrapper.find('#contact-email-error').text()).toEqual(errorResponse.errors.email[0]);
                expect(wrapper.find('#contact-phone-error').isVisible()).toBeTruthy();
                expect(wrapper.find('#contact-phone-error').text()).toEqual(errorResponse.errors.phone[0]);
                expect(wrapper.find('#contact-message-error').isVisible()).toBeTruthy();
                expect(wrapper.find('#contact-message-error').text()).toEqual(errorResponse.errors.message[0]);
            });
        });

        moxios.uninstall();
    });

    it('errors are cleared after successful HTTP response', () => {
        moxios.install();
        const wrapper = mount(ContactForm);

        wrapper.find('button.btn-primary').trigger('click');
        moxios.wait(() => {
            let request = moxios.requests.mostRecent()
            request.respondWith({
                status: 422,
                response: errorResponse
            }).then(function () {
                expect(wrapper.find('#contact-success').isVisible()).toBeFalsy();
            });
        });

        wrapper.find('button.btn-primary').trigger('click');
        moxios.wait(() => {
            let request = moxios.requests.mostRecent()
            request.respondWith({
                status: 200,
                response: successResponse
            }).then(function () {
                expect(wrapper.find('#contact-success').isVisible()).toBeTruthy();
                expect(wrapper.find('#contact-name-error').isVisible()).toBeFalsy();
                expect(wrapper.find('#contact-name-error').text()).toEqual('');
                expect(wrapper.find('#contact-email-error').isVisible()).toBeFalsy();
                expect(wrapper.find('#contact-email-error').text()).toEqual('');
                expect(wrapper.find('#contact-phone-error').isVisible()).toBeFalsy();
                expect(wrapper.find('#contact-phone-error').text()).toEqual('');
                expect(wrapper.find('#contact-message-error').isVisible()).toBeFalsy();
                expect(wrapper.find('#contact-message-error').text()).toEqual('');
            });
        });

        moxios.uninstall();
    });
});