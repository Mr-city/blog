<template>
<div id="test">
	<Drawer :title="title == 'add' ? '新增栏目' : '修改栏目'" v-model="value3" width="620" :closable="false" :styles="styles">
		<Form ref="formData" :model="formData" label-position="top"  method="post">
			<FormItem label="栏目名称" prop="columnname">
				<Input v-model="formData.columnname" style="width: 240px;"></Input>
			</FormItem>
			<FormItem label="链接地址" prop="columnurl">
				<Input v-model="formData.columnurl" style="width: 240px;"></Input>
			</FormItem>
		</Form>
		<div class="demo-drawer-footer">
            <Button type="primary" @click="handleAdd" @keyup.enter="handleAdd" v-if="title == 'add'">增加</Button>
            <Button type="primary" @click="handleEdit" @keyup.enter="handleEdit" v-else="title == 'edit'">修改</Button>
            <Button style="margin-left: 8px" @click="handleReset('formData')">重置</Button>
            <Button style="margin-left: 8px" @click="value3 = false">关闭</Button>
		</div>
	</Drawer>
</div>
</template>
<script>
import * as utils from '@/utils/utils'
import {COLUMNADD,COLUMNEDIT} from '@/utils/api'
import {mapState} from 'vuex' 
export default {
	components:{
	},
	props:{
        value:{
            type:Boolean,
        },
        dataShow:{
            type:Object,   
        },
        title:String
    },
	data: () => ({
		value3: false,
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
		},
		data1 : {
			handler(newValue, oldValue) {
				console.log(newValue,'1111')
			},
			deep: true
		}
	},
    created(){
        this.formData = this.dataShow;
        this.keyupEnter()
    },
	computed:{
		...mapState(['userPage'])
	},
	methods: {
		keyupEnter() {
			document.onkeydown = e => {
				var key = window.event.keyCode;
				if (key == 13) {
					this.title == 'add' ? this.handleAdd() : this.handleEdit()
				}
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
			console.log(this.formData);
			utils.forAjaxPost(COLUMNADD, this.formData, (res) =>{
                if(res.data.status == 1){
                    this.$Message.success(res.data.msg);
                    this.$refs['formData'].resetFields();
                }else{
                    this.$Message.error(res.data.msg);
                }
			})
		},
        handleEdit(){
            utils.forAjaxPost(COLUMNEDIT, this.formData, (res) =>{
                if(res.data.status == 1){
                    this.$Message.success(res.data.msg);
                }else{
                    this.$Message.error(res.data.msg);
                }
			})
        }
	}
}
</script>

<style>
.demo-drawer-footer {
	width: 100%;
	position: absolute;
	bottom: 0;
	left: 0;
	border-top: 1px solid #e8e8e8;
	padding: 10px 16px;
	text-align: right;
	background: #fff;
}
</style>
