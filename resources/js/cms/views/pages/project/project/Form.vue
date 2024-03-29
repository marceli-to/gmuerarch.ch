<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <form @submit.prevent="submit" v-if="isFetched">
    <header class="content-header">
      <h1>{{title}}</h1>
    </header>
    <tabs :tabs="tabs" :errors="errors"></tabs>
    
    <div v-show="tabs.data.active">
      <div>
        <div :class="[this.errors.title ? 'has-error' : '', 'form-row']">
          <label>Titel *</label>
          <input type="text" v-model="project.title.de">
          <label-required />
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="project.subtitle.de">
        </div>
        <div class="form-row">
          <label>Lead</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="project.abstract.de"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Text</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="project.text.de"
          ></tinymce-editor>
        </div>

        <div class="form-row">
          <label>Text Werkliste</label>
          <textarea v-model="project.text_worklist.de" />
        </div>

        <div :class="[this.errors.category_ids ? 'has-error' : '', 'form-row']">
          <label>Kategorie *</label>
          <div v-for="(category, index) in categories" :key="index" class="flex mb-2x">
            <input type="checkbox" :id="`category-${category.id}`" :name="`category-${category.id}`" :value="category.id" v-model="project.category_ids">
            <label :for="`category-${category.id}`" class="ml-3x">
              {{category.title.de}}
            </label>
          </div>
        </div>
      </div>
    </div>

    <div v-show="tabs.translation.active">
      <div>
        <div class="form-row">
          <label>Titel (en)</label>
          <input type="text" v-model="project.title.en">
        </div>
        <div class="form-row">
          <label>Subtitel</label>
          <input type="text" v-model="project.subtitle.en">
        </div>
        <div class="form-row">
          <label>Lead</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="project.abstract.en"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Text</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="project.text.en"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Text Werkliste</label>
          <textarea v-model="project.text_worklist.en" />
        </div>
      </div>
    </div>

    <div v-show="tabs.images.active">
      <images 
        :allowRatioSwitch="true"
        :imageRatioW="3" 
        :imageRatioH="4"
        :hasPreviewState="true"
        :ratioFormats="[{label: 'Hoch', w: 3, h: 4}, {label: 'Quer', w: 16, h: 9}]"
        :images="project.images">
      </images>
    </div>

    <div v-show="tabs.settings.active">
      <div>
        <div class="form-row">
          <radio-button 
            :label="'Publizieren?'"
            v-bind:publish.sync="project.publish"
            :model="project.publish"
            :name="'publish'">
          </radio-button>
        </div>
        <div class="form-row">
          <radio-button 
            :label="'In Werkliste anzeigen?'"
            v-bind:is_worklist.sync="project.is_worklist"
            :model="project.is_worklist"
            :name="'is_worklist'">
          </radio-button>
        </div>
        <div class="form-row">
          <radio-button 
            :label="'In Projekten anzeigen?'"
            v-bind:is_project.sync="project.is_project"
            :model="project.is_project"
            :name="'is_project'">
          </radio-button>
        </div>
      </div>
    </div>

    <page-footer>
      <button-back :route="'projects'">Zurück</button-back>
      <button-submit>Speichern</button-submit>
    </page-footer>
  </form>
</div>
</template>
<script>
import { PlusIcon } from 'vue-feather-icons';
import TinymceEditor from "@tinymce/tinymce-vue";
import tinyConfig from "@/config/tiny.js";
import ErrorHandling from "@/mixins/ErrorHandling";
import RadioButton from "@/components/ui/RadioButton.vue";
import ButtonBack from "@/components/ui/ButtonBack.vue";
import ButtonSubmit from "@/components/ui/ButtonSubmit.vue";
import LabelRequired from "@/components/ui/LabelRequired.vue";
import Tabs from "@/components/ui/Tabs.vue";
import tabsConfig from "@/views/pages/project/project/config/tabs.js";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import Files from "@/modules/files/Index.vue";
import Images from "@/modules/images/Index.vue";

export default {
  components: {
    PlusIcon,
    RadioButton,
    ButtonBack,
    ButtonSubmit,
    LabelRequired,
    Tabs,
    PageFooter,
    PageHeader,
    Files,
    Images,
    TinymceEditor
  },

  mixins: [ErrorHandling],

  props: {
    type: String
  },

  data() {
    return {
      
      // Model
      project: {
        id: null,
        title: {
          de: null,
          en: null,
        },
        subtitle: {
          de: null,
          en: null
        },
        abstract: {
          de: null,
          en: null
        },
        text: {
          de: null,
          en: null
        },
        text_worklist: {
          de: '',
          en: ''
        },
        category_ids: [],
        publish: 1,
        is_worklist: 1,
        is_project: 1,
        images: [],
        files: [],
      },

      categories: [],

      // Validation
      errors: {
        title: false,
        category_ids: false,
      },

      // Routes
      routes: {
        get: '/api/project',
        store: '/api/project',
        update: '/api/project',
        getCategories: '/api/categories',
      },

      // States
      isLoading: false,
      isFetched: true,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        stored: 'Daten erfasst!',
        updated: 'Daten aktualisiert!',
      },

      // Tabs config
      tabs: tabsConfig,

      // TinyMCE
      tinyConfig: tinyConfig,
      tinyApiKey: 'vuaywur9klvlt3excnrd9xki1a5lj25v18b2j0d0nu5tbwro',
    };
  },

  created() {
    if (this.$props.type == "edit") {
      this.fetch();
    }

    if (this.$props.type == "create") {
      this.fetchTopics();
    }
  },

  methods: {

    fetch() {
      this.isFetched = false;
      this.isLoading = true;
      this.axios.get(`${this.routes.get}/${this.$route.params.id}`).then(response => {
        this.project = response.data.project;
        this.categories = response.data.categories;
        this.isFetched = true;
        this.isLoading = false;
      });
    },

    fetchTopics() {
      this.axios.get(`${this.routes.getCategories}`).then(response => {
        this.categories = response.data.data;
        this.isFetched = true;
      });
    },

    submit() {
      if (this.$props.type == "edit") {
        this.update();
      }
      if (this.$props.type == "create") {
        this.store();
      }
    },

    store() {
      this.isLoading = true;
      this.axios.post(this.routes.store, this.project).then(response => {
        this.$router.push({ name: "projects"});
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
      });
    },

    update() {
      this.isLoading = true;
      this.axios.put(`${this.routes.update}/${this.$route.params.id}`, this.project).then(response => {
        this.$router.push({ name: "projects"});
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },
  },

  computed: {
    title() {
      return this.$props.type == "edit" 
        ? "Projekt bearbeiten" 
        : "Projekt hinzufügen";
    }
  }
};
</script>
