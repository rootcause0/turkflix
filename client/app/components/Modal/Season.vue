<template>
  <div class="modal-wrap">

    <div class="modal-header">
      <span>{{ modalData.title }}</span>
      <span class="close-modal" @click="CLOSE_MODAL()">
        <i class="icon-close"></i>
      </span>
    </div>

    <div class="modal-content modal-content-loading" v-if="loadingModalData">
      <span class="loader-old fullsize-loader"><i></i></span>
    </div>

    <div class="season-tabs" v-if=" ! loadingModalData">
      <span class="season-number no-select" @click="SET_SEASON_ACTIVE_MODAL(index); SET_PLAYING_SEASON(seasons.season_name)" v-for="(seasons, index) in shows.seasons" :class="{active: index == seasonActiveModal}">
        {{seasons.season_name}}
      </span>
    </div>

    <div class="item-header no-select" v-if=" ! loadingModalData">
      <span class="header-episode">#</span>
      <span class="header-name">Bölüm İsimleri</span>
    </div>

    <div class="modal-content" v-if=" ! loadingModalData">
      <div @click="openSource(episode); SET_PLAYING_EPISODE(episode.episode_number)"
           class="modal-item" v-for="(episode, index) in shows.seasons[seasonActiveModal].episodes"
           :data-episode="episode.name"
      >
        <span class="modal-episode no-select">B{{ addZero(episode.episode_number) }}</span>
        <span class="modal-name">{{ episode.name }}</span>
      </div>
    </div>

  </div>
</template>

<script>
import {mapState, mapMutations, mapActions} from 'vuex';
  import http from 'axios';

  import MiscHelper from '../../helpers/misc';
  import ItemHelper from '../../helpers/item';

  export default {
    mixins: [MiscHelper, ItemHelper],

    data() {
      return {
        auth: config.auth
      }
    },

    computed: {
      ...mapState({
        modalData: state => state.modalData,
        loadingModalData: state => state.loadingModalData,
        seasonActiveModal: state => state.seasonActiveModal
      }),

      shows() {
        return this.modalData.shows;
      },

      spoiler() {
        return this.modalData.spoiler;
      }
    },
    methods: {
      ...mapMutations([ 'SET_SEASON_ACTIVE_MODAL', 'CLOSE_MODAL', 'SET_LOADING_MODAL_DATA', 'SET_MODAL_DATA','OPEN_MODAL','SET_PLAYING_EPISODE','SET_PLAYING_SEASON']),
      openSource(episode) {
          const data = {
          id:episode.id,
          sources: episode.sources,
        };
        this.OPEN_MODAL({
          type: 'source',
          data,
        });
      },
      released(date) {
        const released = new Date(date * 1000);

        return this.formatLocaleDate(released);
      },

      toggleAll() {
        const season = this.seasonActiveModal;
        const tmdb_id = this.modalData.shows[1][0].tmdb_id;
        const seen = this.seasonCompleted(season);

        this.markAllEpisodes(season, seen);

        http.patch(`${config.api}/toggle-season`, {
          tmdb_id,
          season,
          seen: ! seen
        });
      },

      markAllEpisodes(season, seen) {
        const episodes = this.shows[season];

        for(let episode of episodes) {
          episode.seen = ! seen;
        }
      },

      toggleEpisode(episode) {
        this.openSourceModal(episode);
      },

      seasonCompleted(index) {
        const episodes = this.shows[index];

        for(let episode of episodes) {
          if( ! episode.seen) {
            return false;
          }
        }

        return true;
      }
    }
  }
</script>
