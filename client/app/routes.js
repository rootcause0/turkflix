import Vue from 'vue';
import Router from 'vue-router';

import config from './config';

import Content from './components/Content/Content.vue';
import SearchContent from './components/Content/SearchContent.vue';
import Settings from './components/Content/Settings/Index.vue';
import TMDBContent from './components/Content/TMDBContent.vue';
import Subpage from './components/Content/Subpage.vue';
import Watch from './components/Content/Watch.vue';
import Calendar from './components/Content/Calendar.vue';

Vue.use(Router);
export default new Router({
  mode: 'history',
  base: config.uri,
  routes: [
    { path: '/', component: Content, name: 'home' },

    // todo: use props for media type
    { path: '/watch/:show-episode-:episode', component: Watch, name: 'movie',props:true },
    { path: '/tv', component: Content, name: 'tv' },
    { path: '/watchlist/:type?', component: Content, name: 'watchlist' },
    
    { path: '/shows/:id?/:slug?', component: Subpage, name: 'subpage', props:true },

    { path: '/search', component: SearchContent, name: 'search' },
    { path: '/settings', component: Settings, name: 'settings' },
    { path: '/suggestions', component: TMDBContent, name: 'suggestions' },
    { path: '/trending', component: TMDBContent, name: 'trending' },
    { path: '/upcoming', component: TMDBContent, name: 'upcoming' },
    { path: '/now-playing', component: TMDBContent, name: 'now-playing' },
    { path: '/genre/:genre', component: TMDBContent, name: 'genre' },
    { path: '/calendar', component: Calendar, name: 'calendar' },

    { path: '*', redirect: '/' }
  ]
});
