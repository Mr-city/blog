<template lang="html">
  <div>
      <button type="button" name="button" @click="add2">+</button>
      <span>{{pageList}}</span>
      <button type="button" name="button" @click="min">-</button>
  </div>
</template>

<script>
import {mapState,mapMutations} from 'vuex'
export default {
    data:()=>({
        
    }),
    computed:{
        ...mapState(['userPage','pageList'])
    },
    methods:{
        ...mapMutations(['add1','minus']),
        add2(){
            this.add1()
            console.log(this.pageList)
        },
        min(){
            this.minus()
        }
    }
}
</script>

<style lang="css">
</style>
