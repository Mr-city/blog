<template>
<div id="user">
	<Button type="primary" icon="md-add" @click="handleAdd">新增</Button>
	<Button type="error" icon="ios-remove" @click="handleSeRemove">批量删除</Button>
	<Table stripe :columns="columns1" :data="data1" @on-selection-change="changeSeRem"></Table>
	<Page v-show="flag" :total="pageLIst.total" :page-size-opts="pageSizeOpts" :page-size="pageLIst.listrows" show-sizer @on-change="changepage" @on-page-size-change="changePageSize" />

	<AddArticle :value="value" :titleTop="titleTop" @onResultChange="onResultChange" :dataShow="dataShow"></AddArticle>

	<Modal v-model="modal" :title="modelMsg.title" @on-ok="ok" :width="modelMsg.width">
		<p v-html="modelMsg.msg" style="text-align:center;"></p>
	</Modal>
	<transition :name="transitionName">
		<router-view class="child-view"></router-view>
	</transition>
</div>
</template>
<script>
import * as utils from '@/utils/utils'
import AddArticle from '@/components/add/AddArticle'
import {
	ARTICLEINDEX,
	ARTICLEDEL
} from '@/utils/api'
import {
	mapState,
	mapMutations
} from 'vuex'
export default {
	components: {
		AddArticle,
	},
	data() {
		return {
			modal: false,
			value: false,
			flag: false,
			titleTop: '',
			transitionName: 'slide-left',
			imgUrl: 'http://localhost/blog/public/static/uploads/',
			columns1: [{
					type: 'selection',
					width: 60,
					align: 'center'
				},
				{
					title: '#',
					key: 'id',
					width: 50,
				},
				{
					title: '缩略图',
					key: 'pic',
					align: 'center',
					render: (h, params) => {
						return h('img', {
							attrs: {
								src: this.imgUrl + params.row.pic,
								style: 'width: 100px;border-radius: 2px;margin-top:5px;',
								class: 'imgStyle'
							},
							on: {
								click: () => {
									this.imgShow(params.index, this.imgUrl + params.row.pic)
								},
								mouseover: () => {
									// this.imgStyle()
								}
							}
						})

					}
				},
				{
					title: '文章标题',
					key: 'title',
					align: 'center',
				},
				{
					title: '作者',
					key: 'author',
					align: 'center',
				},
				{
					title: '是否推荐',
					key: 'state',
					align: 'center',
					render: (h, params) => {
						return h('span', params.row.state ? "已推荐" : "未推荐")
					}
				},
				{
					title: '所属栏目',
					key: 'columnname',
					align: 'center',
				},
				{
					title: '操作',
					key: 'action',
					width: 150,
					align: 'center',
					render: (h, params) => {
						return h('div', [
							h('Button', {
								props: {
									type: 'primary',
									size: 'small'
								},
								style: {
									marginRight: '5px'
								},
								on: {
									click: () => {
										this.show(params.index)
									}
								}
							}, '编辑'),
							h('Button', {
								props: {
									type: 'error',
									size: 'small'
								},
								on: {
									click: () => {
										this.remove(params.index)
									}
								}
							}, '删除')
						]);
					}
				}
			],
			data1: [],
			dataShow: {},
			formData: {},
			delIndex: 0,
			pageLIst: {
				currpage: 1,
				listrows: 3,
				total: 0
			},
			modelMsg: {
				title: '',
				msg: '',
				width: ''
			},
			delwatch: 0,
			remSelectId:[],
			delflag:false
		}
	},
	watch: {
		'$route'(to, from) {
			if (to.path == '/') {
				this.transitionName = 'slide-right';
			} else {
				this.transitionName = 'slide-left';
			}
		},
		value() { //当关闭右侧弹出更新界面
			this.handleList()
		},
		delwatch() { //删除一条数据更新界面
			this.handleList()
		},
	},
	created() {
		this.handleList()
		this.pageLIst.listrows = this.listrows
	},
	computed: {
		...mapState(['listrows', 'pageSizeOpts'])
	},
	methods: {
		...mapMutations(['userChangeData']),
		show(index) { //编辑
			this.dataShow = this.data1[index];
			console.log(this.dataShow);
			this.userChangeData(this.dataShow)
			this.value = true;
			this.titleTop = 'edit';
		},
		ok() {
			this.delwatch = this.delflag ? this.remSelectId : this.data1[this.delIndex].id
			console.log(this.delwatch,'watch');
			utils.forAjaxPost(ARTICLEDEL, {
				id: this.delwatch
			}, (res) => {
				if (res.data.status == 1) {
					this.$Message.success(res.data.msg)
					this.data1.splice(this.delIndex, 1);
				} else {
					this.$Message.error(res.data.msg)
				}
			})
			this.remSelectId = []

		},
		remove(index) { //删除一条数据
			this.modal = true;
			this.delIndex = index;
			this.modelMsg.title = '提示？'
			this.modelMsg.msg = '确定删除吗？'
			this.modelMsg.width = '260px'
			this.delflag = false
		},
		imgShow(index, url) {
			this.modal = true;
			this.modelMsg.title = '图片预览'
			this.modelMsg.msg = '<img width="100%" src=' + url + ' alt="" />'
			this.modelMsg.width = '520px'
		},
		imgStyle() {
			alert(1)
		},
		onResultChange(val) { //添加用户，子组件状态改变，
			this.value = val;
		},
		changeSeRem(selection){//checkbox 选中项
			selection.filter((item)=>{
				this.remSelectId.push(item.id)
			});
			this.remSelectId = Array.from(new Set(this.remSelectId))
		},
		handleSeRemove(){ //批量删除
			if(this.remSelectId.length == 0){
				this.$Message.error('请选择一项')
			}else{
				this.modal = true;
				this.delIndex = this.remSelectId;
				this.modelMsg.title = '提示？'
				this.modelMsg.msg = '确定删除吗？'
				this.modelMsg.width = '300px'
				this.delflag = true
			}
		},
		handleAdd() { //显示添加页面
			this.formData = {}
			this.value = true;
			this.dataShow = this.formData;
			this.dataShow.columnid = 13
			this.dataShow.state = 0;
			this.titleTop = 'add';
		},
		handleList() { //更新列表
			utils.forAjaxPost(ARTICLEINDEX, this.pageLIst, (res) => {
				if (res.data.data.length != 0) {
					this.flag = true;
					this.data1 = res.data.data;
					this.pageLIst.total = res.data.total;
				} else {
					this.flag = false;
				}
			})
		},
		changepage(cur) { //切换分页
			this.pageLIst.currpage = cur
			utils.forAjaxPost(ARTICLEINDEX, this.pageLIst, (res) => {
				this.data1 = res.data.data;
			})
		},
		changePageSize(size) { //每页显示多少条
			this.pageLIst.listrows = size;
			utils.forAjaxPost(ARTICLEINDEX, this.pageLIst, (res) => {
				this.data1 = res.data.data;
			})
		}
	}
}
</script>
<style scoped lang="less">
#user {
    .ivu-btn-primary {
        margin-bottom: 10px;
		vertical-align: top;
    }
    .ivu-page {
        margin-top: 20px;
        text-align: center;
    }
    .imgStyle:hover {
        background: #000;
        transform: scale(1.2,1.2);
    }
}
</style>
