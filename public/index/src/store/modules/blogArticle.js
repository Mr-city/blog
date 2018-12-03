export default {
    state:{
        artList:null
    },
    mutations:{
        changeArtList:function(state,artList){
            state.artList = artList;
        },
        changeRefData:function(state,obj){
            console.log(obj.artList,'9999999999999')
            state.artList =  obj.artList
        }
    },
    getters:{
        
    },
    actions:{
        
    }
}
