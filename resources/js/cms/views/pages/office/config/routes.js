import Dashboard from '@/views/pages/office/Index.vue';
import TeamMemberIndex from '@/views/pages/office/team/Index.vue';
import TeamMemberCreate from '@/views/pages/office/team/partials/Create.vue';
import TeamMemberEdit from '@/views/pages/office/team/partials/Edit.vue';

const routes = [
  {
    name: 'office',
    path: '/administration/office',
    component: Dashboard,
  },
  {
    name: 'team-members',
    path: '/administration/office/team-members',
    component: TeamMemberIndex,
  },
  {
    name: 'team-member-create',
    path: '/administration/office/team-member/create',
    component: TeamMemberCreate,
  },
  {
    name: 'team-member-edit',
    path: '/administration/office/team-member/edit/:id',
    component: TeamMemberEdit,
  },

];

export default routes;