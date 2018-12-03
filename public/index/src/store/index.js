import Vue from 'vue'
import Vuex from 'vuex'
import state from './state'
import mutations from './mutations'
import getters from './getters'
import actions from './actions'
import blogArticle from './modules/blogArticle'

Vue.use(Vuex)

export default new Vuex.Store({
    state,
    actions,
    mutations,
    modules:{
        blogArticle
    }
})
