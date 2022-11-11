<template>
<div v-if="isFetched">
  
  <page-header>
    <h1>Bildraster Projekt</h1>
    <a href="" class="btn-add has-icon">
      <plus-icon size="16"></plus-icon>
      <span>Hinzufügen</span>
    </a>
  </page-header>

  <grid-layout-selector @select="addRow($event)" />

  <grid-row 
    :key="grid.id" 
    v-for="grid in $props.grids" 
    @deleteRow="deleteRow(grid.id)"
    :class="`grid-layout grid-layout--${grid.layout}`"
  >

    <template v-if="grid.layout == '1'">
      <grid-row-item
        v-for="item in grid.image_grid_items"
        :key="item.id"
        :image="item.image">
      </grid-row-item>  
    </template>

    <template v-if="grid.layout == '1:1'">
      <grid-row-item
        v-for="item in grid.image_grid_items"
        :key="item.id"
        :image="item.image">
      </grid-row-item>  
    </template>

    <template v-if="grid.layout == '1:2'">
      <grid-row-item :image="grid.image_grid_items[0] ? grid.image_grid_items[0].image : null" />
      <div class="grid-stack">
        <grid-row-item :image="grid.image_grid_items[1] ? grid.image_grid_items[1].image : null" />
        <grid-row-item :image="grid.image_grid_items[2] ? grid.image_grid_items[2].image : null" />
      </div>
    </template>

    <template v-if="grid.layout == '2:1'">
      <div class="grid-stack">
        <grid-row-item :image="grid.image_grid_items[0] ? grid.image_grid_items[0].image : null" />
        <grid-row-item :image="grid.image_grid_items[1] ? grid.image_grid_items[1].image : null" />
      </div>
      <grid-row-item :image="grid.image_grid_items[2] ? grid.image_grid_items[2].image : null" />
    </template>


  </grid-row>

</div>
</template>
<script>
import ErrorHandling from "@/mixins/ErrorHandling";
import { PlusIcon } from 'vue-feather-icons';
import GridLayoutSelector from "@/modules/grid/components/GridLayoutSelector.vue";
import GridRow from "@/modules/grid/components/GridRow.vue";
import GridRowItem from "@/modules/grid/components/GridRowItem.vue";
import PageHeader from "@/components/ui/PageHeader.vue";

export default {

  components: {
    GridLayoutSelector,
    GridRow,
    GridRowItem,
    PageHeader,
    PlusIcon
  },

  mixins: [ErrorHandling],

  props: {

    grids: {
      type: Array,
      default: null,
    },

    model: {
      type: Object,
      default: null
    },
    
    type: {
      type: String,
      default: null
    }
  },

  data() {
    return {

      grid: [],

      currentRow: 0,

      // Routes
      routes: {
        store: '/api/image-grid',
        order: '/api/image-grid/order',
        delete: '/api/image-grid/row',
      },

      // States
      isLoading: false,
      isFetched: true,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        confirm: 'Bitte löschen bestätigen!',
        updated: 'Daten aktualisiert',
        stored: 'Daten gespeichert'
      }
    }
  },

  methods: {

    destroy(id) {
      if (confirm(this.messages.confirm)) {
        this.axios.delete(`${this.routes.delete}/${id}`).then(response => {
          this.fetch();
        });
      }
    },

    order(data) {
      let events = data.map(function(event, index) {
        event.order = index;
        return event;
      });
      if (this.debounce) return;
      this.debounce = setTimeout(function() {
        this.debounce = false;
        this.axios.post(`${this.routes.order}`, {items: events}).then((response) => {
        });
      }.bind(this, events), 500);
    },

    addRow(data) {

      let grid = {
        layout: data.layout,
        items: data.items,
        model: {
          id: this.$props.model.id,
          type: this.$props.type
        },
      };

      this.isLoading = true;
      this.axios.post(this.routes.store, grid).then(response => {
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
      });

      // // Get the last row to determine its layout and order
      // const lastRow = this.grid[this.grid.length - 1];

      // // Build next row
      // const nextRow = {
      //   layout: lastRow && lastRow.layout == '1-2' ? '2-1' : '1-2',
      //   order: lastRow ? lastRow.order + 1 : 0
      // };

      // this.axios.post(this.routes.store, nextRow).then(response => {
      //   this.fetch();
      // });
    },

    deleteRow(id) {
      this.axios.delete(`${this.routes.delete}/${id}`).then(response => {
        const index = this.grid.findIndex(x => x.id == id);
        this.grid.splice(index, 1);
      });
    },

    resetItem(id) {
      this.axios.get(`${this.routes.resetItem}/${id}`).then(response => {
        this.fetch();
      });
    },

    isEmpty(item) {
      return false;
    }
  }
}
</script>
<style scoped>
.grid-buttons {
  min-height: inherit;
}

.btn-primary {
  max-width: 240px;
  margin: 4px 0;
}

.btn-danger {
  bottom: 4px;
  max-width: 120px;
  right: 4px;
  position: absolute;
}
</style>