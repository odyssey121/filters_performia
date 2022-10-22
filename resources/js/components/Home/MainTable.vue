<template>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden min-h-[50%]">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Price
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Bedrooms
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Bathrooms
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Stores
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Garages
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Created
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <th v-if="this.getLoading" class="spinner-tr" colspan="7">
                            <spinner/>
                        </th>
                        <th v-else-if="!this.housesList.length" class="spinner-tr" colspan="7">
                            Data not Found
                        </th>
                        <tr v-else v-for="(item, index) in housesList"
                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                            :key="index">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ item.name }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ item.price }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ item.bedrooms }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ item.bathrooms }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ item.stores }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ item.garages }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ getDateReadable(item.created_at) }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";
import Spinner from "../Spinner.vue";

export default {
    name: "MainTable",
    components: {Spinner},
    props: {
        housesList: {
            type: Array,
            required: true
        }
    },
    computed: {
        ...mapGetters('home', ['getLoading']),
    },
    data() {
        return {}
    },
    methods: {
        getDateReadable(isoString) {
            return isoString.slice(0, 19).replace('T', ' ')
        }
    }
}
</script>
<style>
.spinner-tr {
    height: 56vh;
}
</style>
