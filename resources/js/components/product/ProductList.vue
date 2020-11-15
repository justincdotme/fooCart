<template>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <filterer @categorySelected="setCategory" :options="categories" type="category"></filterer>
      </div>
      <div class="col-sm">
        <filterer @manufacturerSelected="setManufacturer" :options="getManufacturers()" type="manufacturer"></filterer>
      </div>
      <div class="col-sm">
        <div class="btn-group btn-group-sm pull-right">
          <button id="list" class="btn btn-outline-dark"><i aria-hidden="true" class="fa fa-list"></i> List</button>
          <button id="grid" class="btn btn-outline-dark"><i aria-hidden="true" class="fa fa-th"></i> Grid</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm">
        One of three columns
      </div>
    </div>
  </div>
</template>

<script>
  import Filterer from "./Filterer";
export default {
  data() {
    return {
      categories: window.categories
    }
  },
  methods: {
    setManufacturer(manId) {

    },
    setCategory(catId) {

    },
    getManufacturers() {
      let manufacturers = window.products.map(function (p) {
        return {
          id: p.manufacturer.id,
          name: p.manufacturer.name
        };
      });

      manufacturers.unshift({
        id: 0,
        name: "Manufacturer"
      });

      return Array.from(new Set(manufacturers.map(m => m.id)))
          .map(id => {
            return {
              id: id,
              name: manufacturers.find(m => m.id === id).name
            }
          });
    }
  }, components: {
    Filterer
  }
}
</script>
