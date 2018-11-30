<template lang="html">

<div class="blog">
  <div class="row justify-content-center">
      <LeftArticle></LeftArticle>
      <div class="col-lg-8 col-md-12 col-12" v-html="dataList">
      </div>
  </div>
</div>

</template>

<script>
import * as utils from '@/utils/utils'
import {ARTICLEINDEX} from '@/utils/api'
import LeftArticle from '@/components/base/leftArticle'
export default {
    components:{
        LeftArticle
    },
    data:()=>({
        dataList:[],
        imgUrl:'http://localhost/blog/public/static/uploads/',
    }),
    created(){
        this.dataList = this.$route.params.content;
        console.log(this.dataList);
    },
    methods:{
        init(){
            utils.forAjaxPost(ARTICLEINDEX,{},(res)=>{
                this.dataList = res.data.data;
            })
        },
        handleItem(item){
            console.log(item);
        }
    }
}
</script>

<style lang="css">
</style>
