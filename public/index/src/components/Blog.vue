<template lang="html">

<div class="blog">
  <div class="row justify-content-center">
      <LeftArticle></LeftArticle>
      <div class="col-lg-8 col-md-12 col-12">
          <article class="blog_card" v-for="item in dataList">
              <div class="blog_card_top">
                  <img :src="imgUrl+item.pic" alt="blog title " />
                  <div class="blog_date">
                      31
                      <span>
                          october 2017
                      </span>
                  </div>
              </div>
              <div class="blog_card_bottom">
                  <h4>
                      <router-link :to="{ name: 'article', params: {id:item.id,content:item.content} }">{{item.title}}</router-link>
                      <!-- <a href="javascirpt:;" @click="handleItem(item)">
                          {{item.title}}
                      </a> -->
                  </h4>
                  <div class="meta_data">
                      <span>灰色调博客</span>
                      <span>vue react</span>
                      <span>3 评论</span>
                  </div>
                  <p>
                      {{item.desc}}
                  </p>
              </div>
          </article>
          <!-- <article class="blog_card">
              <div class="blog_card_top">
                  <img src="../assets/img/blog/blog2.png" alt="blog title " />
                  <div class="blog_date">
                      31
                      <span>
                          october 2017
                      </span>
                  </div>
              </div>
              <div class="blog_card_bottom">
                  <h4>
                      <a href="#">
                          你的未来，统统要你自己负责
                      </a>
                  </h4>
                  <div class="meta_data">
                      <span>灰色调博客</span>
                      <span>vue react</span>
                      <span>3 评论</span>
                  </div>
                  <p>
                      我们活在浩瀚的宇宙里，漫天漂浮的宇宙尘埃和星河光尘，我们是比这些还要渺小的存在。你并不知道生活在什么时候突然改变方向，陷入墨水一般浓稠的黑暗里去。你被失望拖进深渊，你被疾病拉进坟墓，你被挫折践踏的体无完肤，你被嘲笑、被讽刺、被讨厌、被怨恨、被放弃。但是我们却总在内心里保留着希望保留着不甘心放弃跳动的心。我们依然在大大的绝望里小小的努力着。这种不想放弃的心情，它们变成无边黑暗的小小星辰。我们都是小小的星辰...
                  </p>
              </div>
          </article>
          <article class="blog_card">
              <div class="blog_card_top">
                  <img src="../assets/img/blog/blog3.png" alt="blog title " />
                  <div class="blog_date">
                      31
                      <span>
                          october 2017
                      </span>
                  </div>
              </div>
              <div class="blog_card_bottom">
                  <h4>
                      <a href="#">
                          你的未来，统统要你自己负责
                      </a>
                  </h4>
                  <div class="meta_data">
                      <span>灰色调博客</span>
                      <span>vue react</span>
                      <span>3 评论</span>
                  </div>
                  <p>
                      我们活在浩瀚的宇宙里，漫天漂浮的宇宙尘埃和星河光尘，我们是比这些还要渺小的存在。你并不知道生活在什么时候突然改变方向，陷入墨水一般浓稠的黑暗里去。你被失望拖进深渊，你被疾病拉进坟墓，你被挫折践踏的体无完肤，你被嘲笑、被讽刺、被讨厌、被怨恨、被放弃。但是我们却总在内心里保留着希望保留着不甘心放弃跳动的心。我们依然在大大的绝望里小小的努力着。这种不想放弃的心情，它们变成无边黑暗的小小星辰。我们都是小小的星辰...
                  </p>
              </div>
          </article> -->
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
        this.init()
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
