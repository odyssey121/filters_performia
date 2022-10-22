<template>
    <div id="mainSheet">
        <nav-bar/>
        <div class="flex-1">
            <router-view/>
        </div>
    </div>
</template>
<script>
import NavBar from "./components/NavBar.vue";

export default {
    name: "App",
    components: {NavBar},
    data() {
        return {}
    },
    created() {
    },
    methods: {},
}
</script>
