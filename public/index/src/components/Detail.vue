<template lang="html">

<div class="blog">
  <div class="row justify-content-center">
      
      <div class="col-lg-8 col-md-12 col-12">
          <article class="blog_card">
              <div class="blog_card_top">
                  <img v-lazy="imgUrl+blogArticle.artList.pic" alt="blog title " />
                  <div class="blog_date">
                      {{blogArticle.artList.time.split('-')[2]}}
                      <p>
                         {{monthsInEng[blogArticle.artList.time.split('-')[1]]}} 
                     </p>
                     <p>
                         {{blogArticle.artList.time.split('-')[0]}}
                     </p>
                  </div>
              </div>
              <div class="blog_card_bottom">
                  <h4>
                      <a href="javascript:void(0);">

                      </a>
                  </h4>
                  <div class="meta_data">
                      <span>作者：{{blogArticle.artList.author}}</span>
                      <span>{{blogArticle.artList.keywords}}</span>
                      <span>3 评论</span>
                  </div>
                  <div class="markdown-body">
                      <div v-html="content" ref="content"></div>
                  </div>
                  
              </div>
          </article>
      </div>
      <LeftArticle></LeftArticle>
  </div>
</div>

</template>

<script>
import * as utils from '@/utils/utils'
import {
	ARTICLEINDEX
} from '@/utils/api'
import LeftArticle from '@/components/base/leftArticle'
import {
	mapState,
	mapMutations
} from 'vuex'
import marked from 'marked'
import hljs from 'highlight.js'
import 'highlight.js/styles/atom-one-dark.css'

marked.setOptions({
	renderer: new marked.Renderer(),
	gfm: true,
	tables: true,
	breaks: true,
	pedantic: false,
	sanitize: false,
	smartLists: false,
	smartypants: false,
	highlight: function(code, lang) {
		if (lang && hljs.getLanguage(lang)) {
			return hljs.highlight(lang, code, true).value;
		} else {
			return hljs.highlightAuto(code).value;
		}
	}
});
export default {
	components: {
		LeftArticle
	},
	data: () => ({
		imgUrl: 'http://localhost/blog/public/static/uploads/',
        monthsInEng:['January','February','March','April','May','June','July','Aguest','September','October','November','December'],
	}),
	created() {
		this.init()
	},
	computed: {
		...mapState(['blogArticle']),
		content() {
			// return this.blogArticle.artList.content;
			return marked(this.blogArticle.artList.content || '');
		}
	},
	methods: {
		init() {
			// this.content()
		}
	},
    mounted(){
        console.log(this.$refs.content.getElementsByTagName('pre'),'1231231231231231');
        var elm = this.$refs.content.getElementsByTagName('pre')
        
        for(var i = 0; i<elm.length; i++){
            console.log(elm[i]);
            elm[i].innerHTML = elm[i].innerHTML+"<div>1231231212312312312312</div>"
        }
        
        
    }
}
</script>

<style scoped lang="less">
.blog_card .blog_card_top pre {
    display: block;
    margin-top: 0;
    margin-bottom: 1rem;
    font-size: 68%;
    white-space: pre-wrap;
    word-wrap: break-word;
    color: #A2A2AE; 
    background: #F8F8F8 !important;
    padding: 10px 20px;
}
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
</style>
