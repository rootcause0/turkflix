<template>
  <div class="modal-wrap">

    <div class="modal-header">
      <span>Bölümü izleyeceğiniz kaynağı seçiniz</span>
      <span class="close-modal" @click="CLOSE_MODAL()">
        <i class="icon-close"></i>
      </span>
    </div>

    <div class="modal-content">
      <div class="modal-item" v-for="(source, index) in modalData.sources">
        <router-link :to="{ name: `movie`, params: { source: source,showPlaying:slugify(playingShow),episodePlaying:playingEpisode,seasonPlaying:playingSeason }}">
      <span class="modal-name">{{source.source_name}}</span>
        </router-link>
      </div>
    </div>

  </div>
</template>

<script>
import { mapState, mapMutations } from 'vuex';
import MiscHelper from '../../helpers/misc';

export default {
  mixins: [MiscHelper],

  computed: {
    ...mapState({
      modalData: state => state.modalData,
      playingShow: state => state.playingShow,
      playingEpisode: state => state.playingEpisode,
      playingSeason: state => state.playingSeason
    }),


  },

  methods: {
    ...mapMutations([ 'CLOSE_MODAL' ]),

    slugify(string) {
  const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
  const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
  const p = new RegExp(a.split('').join('|'), 'g')

  return string.toString().toLowerCase()
      .replace(/\s+/g, '-') // Replace spaces with -
      .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
      .replace(/&/g, '-and-') // Replace & with 'and'
      .replace(/[^\w\-]+/g, '') // Remove all non-word characters
      .replace(/\-\-+/g, '-') // Replace multiple - with single -
      .replace(/^-+/, '') // Trim - from start of text
      .replace(/-+$/, '') // Trim - from end of text
}

  }
}
</script>
