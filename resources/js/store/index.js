import { createStore } from 'vuex'
import home from "./modules/home";
const store = createStore({
    plugins:[
    ],
    modules:{
        home
    }
})
export default store
