<template lang="html">
  <div>
      <button type="button" name="button" @click="add2">+</button>
      <span>{{userPage.count}}</span>
      <button type="button" name="button" @click="min">-</button>
  </div>
</template>

<script>
import {mapState,mapMutations} from 'vuex'
export default {
    data:()=>({
        
    }),
    computed:{
        ...mapState(['userPage'])
    },
    methods:{
        ...mapMutations(['add','minus']),
        add2(){
            this.add()
        },
        min(){
            this.minus()
        }
    }
}
</script>

<style lang="css">
</style>
