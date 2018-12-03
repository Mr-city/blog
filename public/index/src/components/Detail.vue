<template lang="html">

<div class="blog">
  <div class="row justify-content-center">
      
      <div class="col-lg-8 col-md-12 col-12">
          <article class="blog_card">
              <div class="blog_card_top">
                  <img :src="imgUrl+blogArticle.artList.pic" alt="blog title " />
                  <div class="blog_date">
                      31
                      <span>
                          october 2017
                      </span>
                  </div>
              </div>
              <div class="blog_card_bottom">
                  <h4>
                      <a href="javascript:void(0);">

                      </a>
                  </h4>
                  <div class="meta_data">
                      <span>灰色调博客</span>
                      <span>vue react</span>
                      <span>3 评论</span>
                  </div>
                  <p v-html="content"></p>
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
	breaks: false,
	pedantic: false,
	sanitize: false,
	smartLists: true,
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
	}),
	created() {
		this.init()
	},
	computed: {
		...mapState(['blogArticle']),
		content() {
			// return this.blogArticle.artList.content;
			return marked(this.blogArticle.artList.content || '', {
				sanitize: true
			});
		}
	},
	methods: {

		init() {
			// this.content()
		}
	},
}
</script>

<style lang="less">
pre {
    display: block;
    margin-top: 0;
    margin-bottom: 1rem;
    font-size: 68%;
    white-space: pre-wrap;
    word-wrap: break-word;
    color: #A2A2AE; 
    background: #F8F8F8;
    padding: 10px 20px;
}
</style>
