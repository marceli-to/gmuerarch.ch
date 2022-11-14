<template>
  <div v-if="isFetched">
    <loading-indicator v-if="isLoading"></loading-indicator>
    <grid 
      :grids="project.image_grids" 
      :images="project.images"
      :model="project" :type="'Project'"
      @addedRowItem="fetch()"
      @addedRow="fetch()"
      @deletedRow="fetch()">
    </grid>
  </div>
</template>
<script>
import { PlusIcon, EditIcon, Trash2Icon } from 'vue-feather-icons';
import draggable from 'vuedraggable';
import Grid from "@/modules/grid/Index.vue";

export default {

  components: {
    Grid
  },

  data() {
    return {

      project: {},

      // Routes
      routes: {
        get: '/api/project',
      },

      // States
      isLoading: false,
      isFetched: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        confirm: 'Bitte löschen bestätigen!',
        updated: 'Daten aktualisiert',
      }
    };
  },


  created() {
    this.fetch();
  },

  methods: {
    fetch() {
      this.isLoading = true;
      this.axios.get(`${this.routes.get}/${this.$route.params.id}`).then(response => {
        this.project = response.data.project;
        this.isFetched = true;
        this.isLoading = false;
      });
    },
  }

};
</script>