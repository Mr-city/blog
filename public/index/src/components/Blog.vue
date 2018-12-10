<template lang="html">

<div class="blog">
  <div class="row justify-content-center">
      <div class="col-lg-8 col-md-12 col-12">
          <article class="blog_card" v-for="item in dataList">
              <div class="blog_card_top">
                  <div class="blog_card_img">
                      <a href="javascript:void(0);" @click="handleItem(item)">
                          <img v-lazy="imgUrl+item.pic" alt="blog title " />
                      </a>
                  </div>
                  <div class="blog_date">
                      {{item.time.split('-')[2]}}
                      <p>
                         {{monthsInEng[item.time.split('-')[1]]}} 
                     </p>
                     <p>
                         {{item.time.split('-')[0]}}
                     </p>
                  </div>
              </div>
              <div class="blog_card_bottom">
                  <h4>
                      <!-- <router-link :to="{ name: 'detail', params: {id:item.id,content:item} }">{{item.title}}</router-link> -->
                      <a href="javascript:void(0);" @click="handleItem(item)">
                          {{item.title}}
                      </a>
                  </h4>
                  <div class="meta_data">
                      <span>作者：{{item.author}}</span>
                      <span>{{item.keywords}}</span>
                      <span>3 评论</span>
                  </div>
                  <p>
                      {{item.desc}}
                  </p>
              </div>
          </article>
      </div>
      <LeftArticle></LeftArticle>
  </div>
</div>

</template>

<script>
import * as utils from '@/utils/utils'
import {ARTICLEINDEX} from '@/utils/api'
import LeftArticle from '@/components/base/leftArticle'
import {mapState,mapMutations} from 'vuex'
export default {
    components:{
        LeftArticle
    },
    data:()=>({
        dataList:[],
        monthsInEng:['January','February','March','April','May','June','July','Aguest','September','October','November','December'],
        imgUrl:'http://localhost/blog/public/static/uploads/',
    }),
    created(){
        this.init()
    },
    methods:{
        ...mapMutations(['changeArtList','getSaveSession','changeRefData']),
        init(){
            utils.forAjaxPost(ARTICLEINDEX,{},(res)=>{
                this.dataList = res.data.data;
                
                this.dataList.filter(function(item,i){
                    item.time = utils.formatDate(item.time,'Y-M-D');
                    // console.log(utils.formatDate(item.time,'Y-M-D'));
                });
                console.log(this.dataList);
                // console.log(this.dataList,this.dataList.time,);
            })
        },
        handleItem(item){
            this.changeArtList(item)
            this.$router.push({
                name:'detail',
                params: {id:item.id,}
            })
        }
    }
}
</script>

<style scoped lang="less">
.blog{
    .blog_date p{
        font-size: 12px;
        margin: 0;
        margin-top: 3px;
        line-height: 1.8;
    }
    .blog_date p:nth-child(1){
        margin-top: 10px;
    }
    .blog_card .blog_card_top .blog_date{
        width: auto;
        padding: 8px 3px;
    }
    .blog_card .blog_card_top .blog_card_img{
        overflow: hidden;
    }
    .blog_card .blog_card_top img{
        transition: .2s;
    }
    .blog_card .blog_card_top img:hover{
        transform: scale(1.1);
    }
}

</style>
