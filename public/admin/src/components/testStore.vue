<template lang="html">
  <div>
      <button type="button" name="button" @click="add2">+</button>
      <span>{{$store.state.count}}</span>
      <button type="button" name="button" @click="min">-</button>
      <p></p>
  </div>
</template>

<script>
import {mapState,mapMutations} from 'vuex'
export default {
    data:()=>({
    }),
    computed:{
        ...mapState(['count'])
    },
    methods:{
        ...mapMutations(['add1','minus']),
        add2(){
            this.add1()
        },
        min(){
            this.minus()
        }
    }
}
</script>

<style lang="css">
</style>
