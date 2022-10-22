<template>

    <nav aria-label="Page navigation example" class="justify-center flex mt-4">
        <ul class="inline-flex items-center -space-x-px justify-center">
            <li v-show="getPaginationCurrentPage > 1">
                <a href="#"
                   @click.prevent="fetchPage(--getPaginationCurrentPage)"
                   class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            <li v-for="(link) in this.getPaginationLinks" :key="link.label">
                <a @click.prevent="fetchPage(link.label)" href="#" :aria-current="link.active ? 'page' : ''"
                   :class="getLinkClasses(link.active)">{{ link.label }}
                </a>
            </li>
            <li v-show="getPaginationCurrentPage < getPaginationLastPage">
                <a href="#"
                   @click.prevent="fetchPage(++getPaginationCurrentPage)"
                   class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import {removeUrlParameter, updateQueryStringParameter} from "../../util";

export default {
    name: "TablePagination",
    computed: {
        ...mapGetters('home', ['getPaginationLinks', 'getPaginationCurrentPage', 'getPaginationLastPage']),
    },
    data() {
        return {}
    },
    created() {
    },
    methods: {
        ...mapActions('home', ['fetchHousesList']),
        getLinkClasses(active) {
            return active ?
                "z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white" :
                "py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
        },
        fetchPage(page) {
            if (+page === 1) {
                window.history.pushState(
                    '', '', removeUrlParameter(
                        window.location.href, 'page'
                    )
                );
            } else {
                window.history.pushState(
                    '', '', updateQueryStringParameter(window.location.href, 'page', page)
                );
            }

            this.emitter.emit("fetchHousesEmmit");
        }
    }
}

</script>
