import Dashboard from '@/views/pages/discourse/Index.vue';
import TopicIndex from '@/views/pages/discourse/topic/Index.vue';
import TopicCreate from '@/views/pages/discourse/topic/partials/Create.vue';
import TopicEdit from '@/views/pages/discourse/topic/partials/Edit.vue';

const routes = [
  {
    name: 'discourse',
    path: '/administration/discourse',
    component: Dashboard,
  },
  {
    name: 'topics',
    path: '/administration/discourse/topics',
    component: TopicIndex,
  },
  {
    name: 'topic-create',
    path: '/administration/discourse/topic/create',
    component: TopicCreate,
  },
  {
    name: 'topic-edit',
    path: '/administration/discourse/topic/edit/:id',
    component: TopicEdit,
  },

];

export default routes;