const mutations = {
    
    changePageCur:function(state,cur){
        state.pageList.currpage = cur;
    },
    
    add1:function(state){
        state.count += 1;
    },
    
    minus:function(state){
        state.count -= 1;
    }
    
}

export default mutations
