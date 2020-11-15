import ProductList from "../../../resources/js/components/product/ProductList";
import {mount, createLocalVue} from "@vue/test-utils";
import products from "../stubs/products";
import expect from 'expect';
import moxios from 'moxios'
//todo: create a snapshot once we have dev'd the productlist component
//todo: create a dummy list of the product JSON data

describe('ProductList.vue', () => {
    it('manufacturers method returns expected results', () => {
        let manufacturers = [
            {id: 0, name: "Manufacturer"},
            {id: 1, name: "Acme"},
            {id: 2, name: "Soylent Industries"},
            {id: 3, name: "Virtucon"},
            {id: 4, name: "Initech"},
            {id: 5, name: "Techniholdings"},
            {id: 6, name: "Rekall"},
        ];
        window.products = products;

        let result = ProductList.methods.getManufacturers();

        expect(result).toEqual(manufacturers);
    });
});