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
      <span class="modal-name">{{source.source_name}}</span>
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
      modalData: state => state.modalData
    }),

    trailerSrc() {
      return `https://www.youtube.com/embed/${this.modalData.youtubeKey}`;
    }
  },

  methods: {
    ...mapMutations([ 'CLOSE_MODAL' ])
  }
}
</script>
