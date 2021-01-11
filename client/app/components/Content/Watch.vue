<template>
  <main>
   <div class="wrap-content" v-show=" !loading">
     <div class="resp-container">
       <iframe class="resp-iframe" :src="this.playing.data.seasons[0].episodes[0].sources[0].src" gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
     </div>
   </div>

    <div class="subpage-content" v-show=" ! loading">
      <div class="wrap">
        <div class="episode-overview">
          <h2>{{ lang('overview-episode') }}</h2>
          <p>{{this.playing.data.seasons[0].episodes[0].episode_description}}</p>
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
  props: ['showPlaying','seasonPlaying','episodePlaying'],


  computed: {
    ...mapState({
      loading: state => state.loading,
      playing: state => state.playingData,

    }),
  },

  methods:{
    ...mapState(['playingData']),
    ...mapMutations(['SET_PLAYING_DATA']),
    ...mapActions(['fetchPlaying']),
     isEmpty(obj) {
  for(var key in obj) {
    if(obj.hasOwnProperty(key))
      return false;
  }
  return true;
}

  },
  created() {
    let data = {showPlaying:this.showPlaying,seasonPlaying:this.seasonPlaying,episodePlaying:this.episodePlaying}
    this.fetchPlaying(data);
    if(isEmpty(null)){ //EN SON BURADA KALDIN EMPTY Mİ ONA BAKACAKSIN,GELEN DATANIN Kİ YANLIŞ URL GİRİLMESİN (OLMAYAN SEZON V.B.)
      alert('test');
    }
  }

}
</script>
