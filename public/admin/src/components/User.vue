<template>
<div id="user">
	<Button type="primary" icon="md-add" @click="handleAdd">新增</Button>
	<Table stripe :columns="columns1" :data="data1"></Table>
	<Page v-show="flag" :total="pageLIst.total" :page-size-opts="pageSizeOpts" :page-size="pageLIst.listrows" show-sizer @on-change="changepage" @on-page-size-change="changePageSize" />
	<AddUser :value="value" :title="title" @onResultChange="onResultChange" :dataShow="dataShow"></AddUser>
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
import AddUser from '@/components/add/AddUser'
import {
	USERINDEX,
	USEREDIT,
	USERADD,
	USERDEL
} from '@/utils/api'
import {
	mapState,
	mapMutations
} from 'vuex'
export default {
	components: {
		AddUser
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
					key: 'id',
					width: 50,
				},
				{
					title: '账户',
					key: 'name',
					width: 120,
					align: 'center',
				},
				{
					title: '邮箱',
					key: 'email',
					width: 150,
					align: 'center',
				},
				{
					title: '性别',
					key: 'sex',
					width: 60,
					align: 'center',
				},
				{
					title: '城市',
					key: 'city',
					width: 180,
					align: 'center',
				},
				{
					title: '个性签名',
					key: 'signature',

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
			formData: {
				name:"",
				city:""
			},
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
			
		},
		data1(){
			console.log("1");
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
		...mapMutations(['changePageList']),
		show(index) {
			this.dataShow = this.data1[index];
			let city = this.dataShow.city.split(',')
			this.dataShow.model11 = city[0]
			this.dataShow.model12 = city[1]
			this.dataShow.model13 = city[2]
			this.changePageList(this.dataShow)

			this.value = true;
			this.title = 'edit';
		},
		ok() {
			this.delwatch = this.data1[this.delIndex].id
			utils.forAjaxPost(USERDEL, {
				id: this.data1[this.delIndex].id
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
			console.log(index);
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
			utils.forAjaxPost(USERINDEX, this.pageLIst, (res) => {
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
			utils.forAjaxPost(USERINDEX, this.pageLIst, (res) => {
				this.data1 = res.data.data;
			})
		},
		changePageSize(size) { //每页显示多少条
			this.pageLIst.listrows = size;
			utils.forAjaxPost(USERINDEX, this.pageLIst, (res) => {
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
