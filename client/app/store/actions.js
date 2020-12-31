import http from 'axios';

export function loadItems({state, commit}, response) {
  commit('SET_LOADING', true);
  http(`${config.api}/now-playing`).then(value => {
    const data = value.data;
    commit('SET_ITEMS', data);

    setTimeout(() => {
      commit('SET_LOADING', false);
    }, 500);
  }, error => {
    if(error.status === 404) {
      window.location.href = config.url;
    }
  });
}

export function loadMoreItems({commit}, next_page_url) {
  commit('SET_CLICKED_LOADING', true);
  http(next_page_url).then(value => {
    const {data, next_page_url} = value.data;

    commit('SET_PAGINATOR', next_page_url);

    setTimeout(() => {
      commit('PUSH_TO_ITEMS', data);
      commit('SET_CLICKED_LOADING', false);
    }, 500);
  });
}

export function setSearchTitle({commit}, title) {
  commit('SET_SEARCH_TITLE', title);
}

export function setColorScheme({commit}, color) {
  document.body.classList.remove('dark', 'light');

  localStorage.setItem('color', color);
  document.body.classList.add(color);

  commit('SET_COLOR_SCHEME', color);
}

export function setPageTitle({}, title = null) {
  if( ! title) {
    document.title = 'Turkflix';
  } else {
    document.title = `${title} - Turkflix`;
  }
}

export function fetchEpisodes({commit}, data) {
  commit('SET_LOADING_MODAL_DATA', true);
  http(`${config.api}/episodes/${data.id}`).then(response => {
    commit('SET_MODAL_DATA', {
      title: data.title,
      shows: response.data.shows,
      spoiler: response.data.spoiler
    });

    commit('SET_LOADING_MODAL_DATA', false);

  });
}