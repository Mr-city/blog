<template>
<div id="test">
	<Drawer :title="titleTop == 'add' ? '新增文章' : '修改文章'" v-model="value3" width="820" :closable="false" :styles="styles">
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
				<Upload action="/api/blog/public/apia/article/upload" name="files" :on-success="fileSuccess" :on-remove="removeFile">
					<Button icon="ios-cloud-upload-outline">上传图片</Button>
				</Upload>
			</FormItem>
			<FormItem label="是否推荐" prop="state">
				<i-switch v-model="formData.state" size="large" :true-value="1" :false-value="0" @on-change="change">
					<span slot="open">开启</span>
					<span slot="close">关闭</span>
				</i-switch>
			</FormItem>
			<FormItem label="所属栏目" prop="columnid">
				<Select v-model="formData.columnid" style="width:200px">
					<Option v-for="item in columnList" :value="item.cid" :key="item.cid">{{ item.columnname }}</Option>
				</Select>
			</FormItem>
			<FormItem label="文章内容" prop="content">
				<RadioGroup v-model="animal">
			        <Radio label="副文本"></Radio>
			        <Radio label="markdown"></Radio>
			    </RadioGroup>
				<mavon-editor v-model="formData.content" v-show="animal == 'markdown'"/>
				<!-- <div v-show="animal != 'markdown'">
					<VueUeditorWrap v-model="formData.content" :config="myConfig" :destroy="false" ></VueUeditorWrap>
				</div> -->
			</FormItem>

		</Form>
		<div class="demo-drawer-footer">
			<Button type="primary" @click="handleAdd" @keyup.enter="handleAdd" v-if="titleTop == 'add'">增加</Button>
			<Button type="primary" @click="handleEdit" @keyup.enter="handleEdit" v-else="titleTop == 'edit'">修改</Button>
			<Button style="margin-left: 8px" @click="handleReset('formData')">重置</Button>
			<Button style="margin-left: 8px" @click="value3 = false">关闭</Button>
		</div>
	</Drawer>
</div>
</template>
<script>
import * as utils from '@/utils/utils'
import {
	ARTICLEEDIT,
	ARTICLEADD
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
		titleTop: String
	},
	data: () => ({
		decontent:'',
		animal:'markdown',
		value3: false,
		switch1: true,
		myConfig: {
			// 如果需要上传功能,找后端小伙伴要服务器接口地址
			serverUrl: 'http://localhost/blog/public/apia/article/upload',
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
		columnList: [],
		file: null

	}),
	watch: {
		value(val) {
			this.value3 = val
			console.log(val,'val');
		},
		value3(val) {
			this.formData = this.dataShow;
			this.$emit("onResultChange", val); //③组件内对myResult变更后向外部发送事件通知
		}
	},
	created() {
		this.formData = this.dataShow;
		this.handleColumnList();
		// this.keyupEnter()
	},
	computed: {
		...mapState(['userPage'])
	},
	methods: {
		change(status) {
			if (status) {
				this.$Message.info('已开启推荐');
			} else {
				this.$Message.info('已关闭推荐');
			}
		},
		fileSuccess(response, file, fileList) {
			this.formData.pic = response;
		},
		removeFile() {
			this.formData.pic = "";
		},
		handleUpload(file) {
			this.formData.pic = file;
			return false;
		},
		handleColumnList() { //栏目列表
			utils.forAjaxGet(ARTICLEADD, {}, (res) => {
				this.columnList = res.data;
			})
		},
		handleReset(name) {
			this.$refs[name].resetFields();
		},
		keyupEnter() {
			document.onkeydown = e => {
				var key = window.event.keyCode;
				e.stopPropagation();
				if (key == 13) {
					this.titleTop == 'add' ? this.handleAdd() : this.handleEdit()
					// console.log(this.titleTop);
				}
			}
		},
		handleAdd() {
			utils.forAjaxPost(ARTICLEADD, this.formData, (res) => {
				if (res.data.status == 1) {
					this.$Message.success(res.data.msg);
					// this.$refs['formData'].resetFields();
				} else {
					this.$Message.error(res.data.msg);
				}
			})
		},
		handleEdit() {

			utils.forAjaxPost(ARTICLEEDIT, this.formData, (res) => {
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
.v-note-wrapper{
	z-index: 102 !important;
}
.ivu-select .ivu-select-dropdown {
    z-index: 102px;
}
.edui-default .edui-editor {
    z-index: 100 !important;
}
.edui-default .edui-editor-toolbarboxinner,
.edui-default .edui-toolbar {
    line-height: 20px;

}

.ivu-form-item {
    margin-bottom: 15px;
}
</style>
