<template>
<div id="user">
	<Button type="primary" icon="md-add" @click="handleAdd">新增</Button>
	<Table stripe :columns="columns1" :data="data1"></Table>
	<Page v-show="flag" :total="pageLIst.total" :page-size-opts="pageSizeOpts" :page-size="pageLIst.listrows" show-sizer @on-change="changepage" @on-page-size-change="changePageSize" />
	<AddColumn :value="value" :title="title" @onResultChange="onResultChange" :dataShow="dataShow"></AddColumn>
	<Modal v-model="modal" title="提示？" @on-ok="ok" style="width:280px;">
		<p>确定删除吗？</p>
	</Modal>
	<transition :name="transitionName">
		<router-view class="child-view"></router-view>
	</transition>
</div>
</template>
<script>
import * as utils from '@/utils/utils'
import AddColumn from '@/components/add/AddColumn'
import {
	COLUMNINDEX,
	COLUMNDEL
} from '@/utils/api'
import {
	mapState,
	mapMutations
} from 'vuex'
export default {
	components: {
		AddColumn,
	},
	data() {
		return {
			modal: false,
			value: false,
			flag: false,
			title: '',
			transitionName: 'slide-left',
			columns1: [{
					title: '#',
					key: 'cid',
					width: 50,
				},
				{
					title: '栏目名称',
					key: 'columnname',
					align: 'center',
				},
				{
					title: '链接地址',
					key: 'columnurl',
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
			delwatch: 0
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
		}
	},
	created() {
		this.handleList()
		this.pageLIst.listrows = this.listrows
	},
	computed: {
		...mapState(['listrows','pageSizeOpts'])
		
	},
	methods: {
		show(index) { //编辑
			this.dataShow = this.data1[index];

			this.value = true;
			this.title = 'edit';
		},
		ok() {
			this.delwatch = this.data1[this.delIndex].cid
			console.log(this.delwatch);
			utils.forAjaxPost(COLUMNDEL, {
				cid: this.data1[this.delIndex].cid
			}, (res) => {
				if (res.data.status == 1) {
					this.$Message.success(res.data.msg)
					this.data1.splice(this.delIndex, 1);
				} else {
					this.$Message.error(res.data.msg)
				}
			})

		},
		remove(index) { //删除一条数据
			this.modal = true;
			this.delIndex = index;
		},
		onResultChange(val) { //添加用户，子组件状态改变，
			this.value = val;
		},
		handleAdd() { //显示添加用户页面
			this.value = true;
			this.dataShow = this.formData;
			this.title = 'add';
		},
		handleList() { //更新列表
			utils.forAjaxPost(COLUMNINDEX, this.pageLIst, (res) => {
				if(res.data.data.length != 0){
					this.flag = true;
					this.data1 = res.data.data;
					this.pageLIst.total = res.data.total;
				}else{
					this.flag = false;
				}
				
			})
		},
		changepage(cur) { //切换分页
			this.pageLIst.currpage = cur
			utils.forAjaxPost(COLUMNINDEX, this.pageLIst, (res) => {
				this.data1 = res.data.data;
			})
		},
		changePageSize(size) { //每页显示多少条
			this.pageLIst.listrows = size;
			utils.forAjaxPost(COLUMNINDEX, this.pageLIst, (res) => {
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
    }
    .ivu-page {
        margin-top: 20px;
        text-align: center;
    }
}
</style>
