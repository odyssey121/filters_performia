<template>
    <transition-root as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="$emit('handleFilters')">
            <transition-child as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                              leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"/>
            </transition-child>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <transition-child as="template" enter="ease-out duration-300"
                                      enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                      enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                                      leave-from="opacity-100 translate-y-0 sm:scale-100"
                                      leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <dialog-panel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start flex-col">
                                    <div class="mt-3 text-center sm:mt-0 sm:text-left mb-4">
                                        <dialog-title as="h3" class="text-lg font-medium leading-6 text-gray-900">
                                            Filters
                                        </dialog-title>
                                    </div>
                                    <div class="modal-filters-content w-full">
                                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bedrooms</label>
                                                <input type="number"
                                                       v-model="filters.bedrooms.val"
                                                       min="1"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="">
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bathrooms</label>
                                                <input type="number"
                                                       min="1"
                                                       v-model="filters.bathrooms.val"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="">
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Storeys</label>
                                                <input type="number"
                                                       min="1"
                                                       v-model="filters.stores.val"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="">
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Garages</label>
                                                <input type="number"
                                                       min="1"
                                                       v-model="filters.garages.val"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="">
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price
                                                    min</label>
                                                <input type="number"
                                                       min="1"
                                                       v-model="filters.priceMin.val"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="">
                                            </div>
                                            <div>
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price
                                                    max</label>
                                                <input type="number"
                                                       min="1"
                                                       v-model="filters.priceMax.val"
                                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button"
                                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="applyFilters">Apply
                                </button>
                                <button type="button"
                                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="$emit('handleFilters')" ref="cancelButtonRef">Cancel
                                </button>
                                <button type="button"
                                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        @click="resetFiltersApplied" ref="cancelButtonRef">Reset
                                </button>
                            </div>
                        </dialog-panel>
                    </transition-child>
                </div>
            </div>
        </Dialog>
    </transition-root>
</template>

<script>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'
import {getQuerySearchParam, removeUrlParameter, updateQueryStringParameter} from "../../util";
import {mapActions} from "vuex";

export default {
    name: "FiltersModal",
    emits: ['handleFilters'],
    components: {
        TransitionChild,
        TransitionRoot,
        Dialog,
        DialogPanel,
        DialogTitle
    },
    mounted() {
        this.emitter.on("resetFiltersAppliedEmmit", this.resetFiltersApplied);
        this.setFiltersApplied(Object.values(this.filters).filter(({val}) => val).length);
    },
    data() {
        return {
            filters: {
                bedrooms: {val: (getQuerySearchParam(window.location.search)['bedrooms[eq]'] || null), operator: 'eq'},
                bathrooms: {val: (getQuerySearchParam(window.location.search)['bathrooms[eq]'] || null), operator: 'eq'},
                stores: {val: (getQuerySearchParam(window.location.search)['stores[eq]'] || null), operator: 'eq'},
                garages: {val: (getQuerySearchParam(window.location.search)['garages[eq]'] || null), operator: 'eq'},
                priceMin: {val: (getQuerySearchParam(window.location.search)['priceMin[eq]'] || null), operator: 'gte'},
                priceMax: {val: (getQuerySearchParam(window.location.search)['priceMax[eq]'] || null), operator: 'lte'}
            },
        }
    },
    props: {
        open: {type: Boolean, default: true, required: false}
    },
    methods: {
        ...mapActions('home', ['setFiltersApplied']),
        resetFilters() {
            Object.keys(this.filters).forEach(key => this.filters[key].val = null)
            this.setFiltersApplied(0);
        },
        getFiltersData() {
            return Object.keys(this.filters).map(key => ({name: key, ...this.filters[key]}))
        },
        resetFiltersApplied() {
            const deletedQuery = this.getFiltersData().reduce((delParamQuery, r) => {
                const paramName = `${r.name}[${r.operator}]`;
                return removeUrlParameter(delParamQuery, paramName, false)
            }, window.location.href);

            window.history.pushState('', '', deletedQuery);

            this.resetFilters();
            this.emitter.emit("fetchHousesEmmit");

        },
        applyFilters() {
            const filtersDataApplied = [];
            const deletedQuery = this.getFiltersData().reduce((delParamQuery, r) => {
                const paramName = `${r.name}[${r.operator}]`;
                if (r.val) {
                    filtersDataApplied.push({paramName, ...r});
                    return delParamQuery
                }
                return removeUrlParameter(delParamQuery, paramName, false)
            }, window.location.href);
            const query = filtersDataApplied.reduce((accQuery, {
                paramName,
                val
            }) => updateQueryStringParameter(accQuery, paramName, val), deletedQuery);
            const resultQuery = removeUrlParameter(query, 'page', query);
            window.history.pushState('', '', resultQuery);

            this.setFiltersApplied(filtersDataApplied.length);
            this.emitter.emit("fetchHousesEmmit");
            this.$emit('handleFilters');

        }
    }
}
</script>
