<template>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <filterer @categorySelected="setCategory" :options="categories" type="category"></filterer>
      </div>
      <div class="col-sm">
        <filterer @manufacturerSelected="setManufacturer" :options="manufacturers" type="manufacturer"></filterer>
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
      categories: window.categories,
      products: window.products,
    }
  },
  computed: {
    manufacturers() {
      let manufacturers = this.products.map(function (p) {
        return {id: p.manufacturer.id, name: p.manufacturer.name};
      });

      let uniqueManufacturers = Array.from(new Set(manufacturers.map(s => s.id)))
        .map(id => {
          return {
            id: id,
            name: manufacturers.find(s => s.id === id).name
          }
        });
      return uniqueManufacturers;
    }
  },
  methods: {
    setManufacturer(manId) {

    },
    setCategory(catId) {

    },
  }, components: {
    Filterer
  }
}
</script>
