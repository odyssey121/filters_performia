
export default {
    namespaced: true,
    state: {
        housesList: [],
        loading: false,
        pagination: {links: []},
        filtersApplied: 0
    },
    getters: {
        getHousesList(state) {
            return state.housesList
        },
        getFiltersApplied(state) {
            return state.filtersApplied
        },
        getPaginationLinks(state) {
            return state.pagination?.links?.filter(({label}) => !isNaN(label)) || []
        },
        getPaginationCurrentPage(state) {
            return state.pagination?.current_page
        },
        getPaginationLastPage(state) {
            return state.pagination?.last_page
        },
        getLoading(state) {
            return state.loading
        }
    },
    mutations: {
        SET_FILTERS_APPLIED(state, value) {
            state.filtersApplied = value
        },
        SET_LOADING(state, value) {
            state.loading = !!value
        },
        SET_HOUSES_LIST(state, value) {
            state.housesList = value
        },
        SET_PAGINATION(state, value) {
            state.pagination = value
        }
    },
    actions: {
        setFiltersApplied({commit}, value) {
            commit('SET_FILTERS_APPLIED', value);
        },
        fetchHousesList({commit}, params = {}) {
            commit('SET_LOADING', true);
            return window.axios.get('/houses', {params}).then(({data: fetched}) => {
                commit('SET_HOUSES_LIST', fetched.data);
                commit('SET_PAGINATION', fetched.meta)
            }).catch(err => {
                console.log('err', err)
            }).finally(() => commit('SET_LOADING', false))
        }
    }
}
