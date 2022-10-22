<template>
    <div class="search-panel">
        <section>
            <label for="default-search"
                   class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input v-model="searchTxt" autocomplete="off" type="search" id="default-search"
                       class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search Mockups, Logos..." required>
                <button type="submit" @click="applySearch"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </section>
        <div v-show="getFiltersApplied" class="flex items-center">
            <span class="text-gray-800 font-semibold mr-4">Filters applied: {{ getFiltersApplied }}</span>
            <button @click="this.emitter.emit('resetFiltersAppliedEmmit')"
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Reset filters
            </button>
        </div>
        <button @click="$emit('handleFilters')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            Filters
        </button>
    </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import {getQuerySearchParam, removeUrlParameter, updateQueryStringParameter} from "../../util";

export default {
    name: "SearchPanel",
    components: {},
    emits: ['handleFilters'],
    computed: {
        ...mapGetters('home', ['getFiltersApplied']),
    },
    data() {
        return {
            searchTxt: getQuerySearchParam(window.location.search)?.search || '',
        }
    },
    methods: {
        ...mapActions('home', ['fetchHousesList']),
        applySearch() {
            if (this.searchTxt.trim()) {
                const query = updateQueryStringParameter(window.location.href, 'search', this.searchTxt)
                const resultQuery = removeUrlParameter(query, 'page', query);
                window.history.pushState('', '', resultQuery);
            } else {
                window.history.pushState(
                    '', '', removeUrlParameter(
                        window.location.href, 'search'
                    )
                );
            }

            this.emitter.emit("fetchHousesEmmit");
        }
    },
}
</script>
<style scoped>
.search-panel {
    display: flex;
    justify-content: space-between;
}

.search-panel > section {
    flex: 1;
    max-width: 512px;
}

</style>
