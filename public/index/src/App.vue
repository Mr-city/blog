<template>
<div id="app">
	<div class="body-container container-fluid">
		<a class="menu-btn" href="javascript:void(0)" @click="handleWapMenu">
			<i class="ion ion-grid"></i>
		</a>
		<div class="row justify-content-center">
			<div class="col-lg-2 col-md-3 col-12 menu_block" :class="wapMenu ? 'wapMenu' : ''">
				<Menu></Menu>
			</div>
			<div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
				<router-view></router-view>
			</div>
		</div>
	</div>
</div>
</template>

<script>
import Menu from '@/components/base/Menu'
import {
	mapMutations
} from 'vuex'
export default {
	components: {
		Menu
	},
	data: () => ({
		flag: false,
		wapMenu:false
	}),
	updated() {
		// 存储本地数据
		let state = this.$store.state;
		state = JSON.stringify(state);
		sessionStorage.state = state;
		// console.log(state,'state');
	},
	created() {
		this.flag = true;
		this.init()
	},
	methods: {
		...mapMutations(['getSaveSession', 'changeRefData', 'changeaad']),
		init() {
			let obj = sessionStorage.state;
			obj = JSON.parse(obj);
			this.changeRefData(obj.blogArticle);
		},
		handleWapMenu(){
			this.wapMenu = !this.wapMenu
		}
	}
}
</script>

<style lang="less">
#app {
    .swiper-pagination-bullet-active{
    	background: #99896F !important;
    }
	.swiper-pagination-bullet{
		cursor: pointer;
	}
	@media (max-width: 768px){
		.wapMenu {
    		margin-left: 0px;
    	}
	}
}
</style>
