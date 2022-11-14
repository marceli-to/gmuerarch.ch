<template>
<div v-if="isFetched">
  <page-header>
    <h1>Bildraster Projekt</h1>
    <a href="" class="btn-add has-icon" @click.prevent="toggleGridSelector()">
      <plus-icon size="16"></plus-icon>
      <span>Zeile</span>
    </a>
  </page-header>

  <grid-layout-selector 
    @select="addRow($event)" 
    v-if="hasGridSelector">
  </grid-layout-selector>

  <grid-image-selector
   :images="$props.images"
   @close="toggleImageSelector()"
   @select="addImage($event)"
   v-if="hasImageSelector">
  </grid-image-selector>

  <grid-row 
    :key="grid.id" 
    v-for="grid in $props.grids" 
    :class="`grid-layout grid-layout--${grid.layout}`">
    <a 
      href="javascript:;" 
      class="btn-delete has-icon"
      @click.prevent="deleteRow(grid.id)">
      <trash-2-icon size="16"></trash-2-icon>
      <span>Löschen</span>
    </a>
    <div>

      <template v-if="grid.layout == '1'">
        <grid-row-item
          v-for="item in grid.image_grid_items"
          :key="item.id"
          :item="item"
          @showImages="showImageSelector($event)">
        </grid-row-item>  
      </template>

      <template v-if="grid.layout == '1:1'">
        <grid-row-item
          v-for="item in grid.image_grid_items"
          :key="item.id"
          :item="item"
          @showImages="showImageSelector($event)">
        </grid-row-item>  
      </template>

      <template v-if="grid.layout == '1:2'">
        <grid-row-item 
          :item="grid.image_grid_items[0] ? grid.image_grid_items[0] : null"
          @showImages="showImageSelector($event)">
        </grid-row-item>
        <div class="grid-stack">
          <grid-row-item 
            :item="grid.image_grid_items[1] ? grid.image_grid_items[1] : null"
            @showImages="showImageSelector($event)">
          </grid-row-item>
          <grid-row-item 
            :item="grid.image_grid_items[2] ? grid.image_grid_items[2] : null"
            @showImages="showImageSelector($event)">
          </grid-row-item>
        </div>
      </template>

      <template v-if="grid.layout == '2:1'">
        <div class="grid-stack">
          <grid-row-item 
            :item="grid.image_grid_items[0] ? grid.image_grid_items[0] : null"
            @showImages="showImageSelector($event)">
          </grid-row-item>
          <grid-row-item 
            :item="grid.image_grid_items[1] ? grid.image_grid_items[1] : null"
            @showImages="showImageSelector($event)">
          </grid-row-item>
        </div>
        <grid-row-item
          :item="grid.image_grid_items[2] ? grid.image_grid_items[2] : null"
          @showImages="showImageSelector($event)">
        </grid-row-item>
      </template>

    </div>
  </grid-row>

</div>
</template>
<script>
import ErrorHandling from "@/mixins/ErrorHandling";
import { PlusIcon, Trash2Icon } from 'vue-feather-icons';
import GridLayoutSelector from "@/modules/grid/components/GridLayoutSelector.vue";
import GridImageSelector from "@/modules/grid/components/GridImageSelector.vue";
import GridRow from "@/modules/grid/components/GridRow.vue";
import GridRowItem from "@/modules/grid/components/GridRowItem.vue";
import PageHeader from "@/components/ui/PageHeader.vue";

export default {

  components: {
    GridLayoutSelector,
    GridImageSelector,
    GridRow,
    GridRowItem,
    PageHeader,
    PlusIcon,
    Trash2Icon
  },

  mixins: [ErrorHandling],

  props: {

    grids: {
      type: Array,
      default: null,
    },

    images: {
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
      currentItemId: 0,
      currentPos: 0,

      // Routes
      routes: {
        store: '/api/image-grid',
        order: '/api/image-grid/order',
        delete: '/api/image-grid',

        storeItem: '/api/image-grid-item',

      },

      // States
      isLoading: false,
      isFetched: true,
      hasGridSelector: false,
      hasImageSelector: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        confirm: 'Bitte löschen bestätigen!',
        updated: 'Daten aktualisiert',
        stored: 'Daten gespeichert',
        deleted: 'Daten gelöscht',
      }
    }
  },

  methods: {

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
        this.$emit('addedRow');
      });
    },

    deleteRow(id) {
      if (confirm(this.messages.confirm)) {
        this.isLoading = true;
        this.axios.delete(`${this.routes.delete}/${id}`).then(response => {
          this.$notify({ type: "success", text: this.messages.deleted });
          this.isLoading = false;
          this.$emit('deletedRow');
        });
      }
    },

    addImage(image) {
      const item = {
        id: this.currentItemId,
        position: this.currentPos,
        image_id: image
      }
      this.isLoading = true;
      this.axios.post(this.routes.storeItem, item).then(response => {
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
        this.hideImageSelector();
        this.$emit('addedRowItem');
      });
    },

    toggleGridSelector() {
      this.hasGridSelector = this.hasGridSelector ? false : true;
    },

    toggleImageSelector() {
      this.hasImageSelector = this.hasImageSelector ? false : true;
    },

    showImageSelector(data) {
      this.currentItemId = data.id;
      this.currentPos = data.position;
      this.hasImageSelector = true;
    },

    hideImageSelector() {
      this.currentItemId = null;
      this.currentPos = null;
      this.hasImageSelector = false;
    }
  }
}
</script>