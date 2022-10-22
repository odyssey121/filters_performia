<template>
    <div class="container mx-auto mt-4">
        <search-panel @handleFilters="handleFilters"/>
        <main-table :housesList="getHousesList"/>
        <table-pagination/>
    </div>
    <filters-modal :open="openFilterModal" @handleFilters="handleFilters"/>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import MainTable from "../components/Home/MainTable.vue";
import FiltersModal from "../components/Home/FiltersModal.vue";
import SearchPanel from "../components/Home/SearchPanel.vue";
import TablePagination from "../components/Home/TablePagination.vue";
import {getQuerySearchParam} from "../util";

export default {
    name: "Home",
    components: {
        TablePagination,
        SearchPanel,
        FiltersModal,
        MainTable,
    },
    created() {
        this.fetchHousesHandler()
    },
    mounted() {
        this.emitter.on("fetchHousesEmmit", this.fetchHousesHandler);
    },
    computed: {
        ...mapGetters('home', ['getHousesList']),
    },
    data() {
        return {
            openFilterModal: false
        }
    },
    methods: {
        ...mapActions('home', ['fetchHousesList']),
        fetchHousesHandler() {
            this.fetchHousesList(getQuerySearchParam(window.location.search));
        },
        handleFilters() {
            this.openFilterModal = !this.openFilterModal
        }
    }
}
</script>
