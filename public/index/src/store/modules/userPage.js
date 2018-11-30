export default {
    state:{
        count:5,
        userList:{}
    },
    mutations:{
        add(state){
            state.count += 1;
        },
        minus(state){
            state.count -= 1;
        },
        userChangeData(state,data){
            state.userList = data
        }
    },
    getters:{
        
    },
    actions:{
        
    }
}
