<template>
  <main>
   <div class="wrap-content" v-show=" !loading">
     <div class="resp-container">
       <iframe class="resp-iframe" :src="this.source.src" gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
     </div>
   </div>

    <div class="subpage-content" v-show=" ! loading">
      <div class="wrap">
        <div class="episode-overview">
          <h2>{{ lang('overview-episode') }}</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

      </div>
    </div>

    <span class="loader-old fullsize-loader" v-show="loading"><i></i></span>
  </main>
</template>

<script>

import Rating from '../Rating.vue';
import {mapActions, mapMutations, mapState} from 'vuex'
import MiscHelper from '../../helpers/misc';
import ItemHelper from '../../helpers/item';

import http from 'axios';


export default {
  mixins: [MiscHelper, ItemHelper],
  props: ['source'],


  computed: {
    ...mapState({
      loading: state => state.loading,
      playingShow:state => state.playingShow,
      playingSeason:state => state.playingSeason,
      playingEpisode:state => state.playingEpisode,

    }),
    shows() {
      return this.modalData.shows;
    },
  },

  methods:{
    ...mapMutations(['SET_PLAYING_SHOW','SET_PLAYING_SEASON','SET_PLAYING_EPISODE']),
  },

}
</script>
