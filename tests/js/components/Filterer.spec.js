import Filterer from "../../../resources/js/components/product/Filterer";
import {mount, createLocalVue} from "@vue/test-utils";
import expect from 'expect';
import moxios from 'moxios'
import sinon from 'sinon';

describe('Filterer.vue', () => {
    it('component markup renders properly for a given set of props', () => {
        let propsData = {
            type: 'manufacturer',
            options: [
                {id: 1, name: "Acme"},
                {id: 2, name: "Virtucon"},
                {id: 3, name: "Soylent Industries"}
            ]
        };

        const wrapper = mount(Filterer, {
            propsData
        });

        expect(wrapper.find('#' + propsData.type + '-filter').exists()).toBeTruthy();
        expect(wrapper.find('option[value="' + propsData.options[0].id +'"]').exists()).toBeTruthy();
        expect(wrapper.find('option[value="' + propsData.options[1].id +'"]').exists()).toBeTruthy();
        expect(wrapper.find('option[value="' + propsData.options[2].id +'"]').exists()).toBeTruthy();
    });

    it('emits event when value changed', () => {
        let propsData = {
            type: 'manufacturer',
            options: [
                {id: 1, name: "Acme"},
                {id: 2, name: "Virtucon"},
                {id: 3, name: "Soylent Industries"}
            ]
        };

        let setValueSpy = sinon.spy(Filterer.methods, 'setValue');
        const wrapper = mount(Filterer, {
            propsData
        });

        let selectMenu = wrapper.find('#' + propsData.type + '-filter');
        selectMenu.element.value = 2;
        selectMenu.trigger('change');

        expect(setValueSpy.callCount).toEqual(1);
        expect(wrapper.emitted().manufacturerSelected).toHaveLength(1);
        expect(wrapper.emitted().manufacturerSelected[0][0]).toEqual(2);
    });
});