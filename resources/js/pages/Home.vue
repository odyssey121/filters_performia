<template>
    <div class="container mx-auto mt-4">
        <search-panel @handleFilters="handleFilters"/>
        <main-table/>
    </div>
    <filters-modal :open="openFilterModal" @handleFilters="handleFilters"/>
</template>

<script>
import MainTable from "../components/Home/MainTable.vue";
import FiltersModal from "../components/Home/FiltersModal.vue";
import SearchPanel from "../components/Home/SearchPanel.vue";

export default {
    name: "Home",
    components: {
        SearchPanel,
        FiltersModal,
        MainTable,
    },
    data() {
        return {
            openFilterModal: false
        }
    },
    created() {
    },
    methods: {
        handleFilters() {
            this.openFilterModal = !this.openFilterModal
        }
    }
}
</script>
