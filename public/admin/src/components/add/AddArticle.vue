<template>
<div id="test">
	<Drawer :title="title == 'add' ? '新增文章' : '修改文章'" v-model="value3" width="820" :closable="false" :styles="styles">
		<Form ref="formData" :model="formData" label-position="right" :label-width="100" method="post">
			<FormItem label="文章标题" prop="title">
				<Input v-model="formData.title" style="width: 340px;"></Input>
			</FormItem>
			<FormItem label="文章作者" prop="author">
				<Input v-model="formData.author" style="width: 240px;"></Input>
			</FormItem>
			<FormItem label="关键字" prop="keywords">
				<Input v-model="formData.keywords" style="width: 240px;"></Input>
			</FormItem>
			<FormItem label="文章摘要" prop="desc">
				<Input v-model="formData.desc" type="textarea" :autosize="{minRows: 3,maxRows: 6}" placeholder="请输入文章摘要"></Input>
			</FormItem>
			<FormItem label="缩略图" prop="pic">
				<Upload action="//jsonplaceholder.typicode.com/posts/">
					<Button icon="ios-cloud-upload-outline">上传图片</Button>
				</Upload>
			</FormItem>
			<FormItem label="是否推荐" prop="state">
				<!-- <Switch v-model="formData.state" @on-change="change" /> -->
				<i-switch v-model="formData.state" size="large" @on-change="change">
		            <span slot="open">开启</span>
		            <span slot="close">关闭</span>
		        </i-switch>
			</FormItem>
			<Switch v-model="switch1" @on-change="change" />
			<FormItem label="文章内容">
				<VueUeditorWrap :config="myConfig"></VueUeditorWrap>
			</FormItem>

		</Form>
		<div class="demo-drawer-footer">
			<Button type="primary" @click="handleAdd" @keyup.enter.native="handleAdd" v-if="title == 'add'">增加</Button>
			<Button type="primary" @click="handleEdit" v-else="title == 'edit'">修改</Button>
			<Button style="margin-left: 8px" @click="handleReset('formData')">重置</Button>
			<Button style="margin-left: 8px" @click="value3 = false">关闭</Button>
		</div>
	</Drawer>
</div>
</template>
<script>
import * as utils from '@/utils/utils'
import {
	COLUMNADD,
	COLUMNEDIT
} from '@/utils/api'
import {
	mapState
} from 'vuex'
import VueUeditorWrap from 'vue-ueditor-wrap'
export default {
	components: {
		VueUeditorWrap
	},
	props: {
		value: {
			type: Boolean,
		},
		dataShow: {
			type: Object,
		},
		title: String
	},
	data: () => ({
		value3: false,
		switch1:true,
		myConfig: {
			// 如果需要上传功能,找后端小伙伴要服务器接口地址
			// serverUrl: 'http://api.demo.com/ueditor/upload',
			// 你的UEditor资源存放的路径,相对于打包后的index.html(路由使用history模式注意使用绝对路径或者填写正确的相对路径)
			UEDITOR_HOME_URL: './static/UEditor/',
			// 编辑器不自动被内容撑高
			autoHeightEnabled: false,
			// 初始容器高度
			initialFrameHeight: 240,
			// 初始容器宽度
			initialFrameWidth: '100%',
			// 关闭自动保存
			enableAutoSave: false
		},
		styles: {
			height: 'calc(100% - 55px)',
			overflow: 'auto',
			paddingBottom: '53px',
			position: 'static'
		},
		cityList: [{
			value: '四川',
			label: '四川'
		}, ],
		cityListTo: [{
			value: '成都',
			label: '成都'
		}, ],
		cityListTob: [{
			value: '武侯',
			label: '武侯'
		}, ],

	}),
	watch: {
		value(val) {
			this.value3 = val

		},
		value3(val) {
			this.formData = this.dataShow;
			this.$emit("onResultChange", val); //③组件内对myResult变更后向外部发送事件通知
		}
	},
	created() {
		this.formData = this.dataShow;

	},
	computed: {
		...mapState(['userPage'])
	},
	methods: {
		change(status) {
			if(status){
				this.$Message.info('已开启推荐');
			}else{
				this.$Message.info('已关闭推荐');
			}
			
		},
		handleReset(name) {
			this.$refs[name].resetFields();
		},
		handleClose() {
			this.$router.push({
				name: 'user'
			})
		},
		handleAdd() {
			utils.forAjaxPost(COLUMNADD, this.formData, (res) => {
				console.log(res.data)
				if (res.data.status == 1) {
					this.$Message.success(res.data.msg);
					this.$refs['formData'].resetFields();
				} else {
					this.$Message.error(res.data.msg);
				}
			})
		},
		handleEdit() {
			console.log(this.formData, '222222');
			utils.forAjaxPost(COLUMNEDIT, this.formData, (res) => {
				if (res.data.status == 1) {
					this.$Message.success(res.data.msg);
				} else {
					this.$Message.error(res.data.msg);
				}
			})
		}
	}
}
</script>

<style lang="less">
.demo-drawer-footer {
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    border-top: 1px solid #e8e8e8;
    padding: 10px 16px;
    text-align: right;
    background: #fff;
    z-index: 999;
}
.edui-default .edui-toolbar {
    line-height: 20px;
}
</style>
