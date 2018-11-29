<template>
<div id="test">
	<Drawer :title="title == 'add' ? '增加用户' : '修改用户'" v-model="value3" width="620" :closable="false" :styles="styles">
		<Form ref="formData" :model="formData" label-position="right" :label-width="100" method="post">
			<FormItem label="用户名" prop="name">
				<Input v-model="formData.name" style="width: 240px;"></Input>
			</FormItem>
			<FormItem label="密码" prop="password">
				<Input v-model="formData.password" type="password" style="width: 240px;"></Input>
			</FormItem>
			<FormItem label="所在城市">
				<Row>
					<Col span="12" style="padding-right:10px;width: 150px;">
					<FormItem prop="model11">
						<Select v-model="formData.model11" filterable>
							<Option v-for="item in cityList" :value="item.value" :key="item.value">{{ item.label }}</Option>
						</Select>
					</FormItem>
					</Col>
					<Col span="12" style="padding-right:10px;width: 150px;">
					<FormItem prop="model12">
						<Select v-model="formData.model12" filterable>
							<Option v-for="item in cityListTo" :value="item.value" :key="item.value">{{ item.label }}</Option>
						</Select>
					</FormItem>
					</Col>
					<Col span="12" style="width: 150px;">
					<FormItem prop="model13">
						<Select v-model="formData.model13" filterable>
							<Option v-for="item in cityListTob" :value="item.value" :key="item.value">{{ item.label }}</Option>
						</Select>
					</FormItem>
					</Col>
				</Row>
			</FormItem>
			<FormItem label="性别" prop="sex">
				<RadioGroup v-model="formData.sex">
					<Radio label="男"></Radio>
					<Radio label="女"></Radio>
				</RadioGroup>
			</FormItem>
			<FormItem label="邮箱" prop="email">
				<Input v-model="formData.email" style="width: 240px;"></Input>
			</FormItem>
			<FormItem label="个性签名" prop="signature">
				<Input v-model="formData.signature" type="textarea" :autosize="{minRows: 3,maxRows: 6}" placeholder="请输入修改签名"></Input>
			</FormItem>
		</Form>
		<div class="demo-drawer-footer">
            <Button type="primary" @click="handleAdd" v-if="title == 'add'">增加</Button>
            <Button type="primary" @click="handleEdit" v-else="title == 'edit'">修改</Button>
            <Button style="margin-left: 8px" @click="handleReset('formData')">重置</Button>
            <Button style="margin-left: 8px" @click="value3 = false">关闭</Button>
		</div>
	</Drawer>
</div>
</template>
<script>
import * as utils from '@/utils/utils'
import {USERADD,USEREDIT} from '@/utils/api'
import {mapState} from 'vuex' 
export default {
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
            console.log(this.formData,'222222');
			this.$emit("onResultChange", val); //③组件内对myResult变更后向外部发送事件通知
		}
	},
    created(){
        this.formData = this.dataShow;
    },
	computed:{
		...mapState(['userPage'])
	},
	methods: {
		handleReset(name) {
			this.$refs[name].resetFields();
		},
		handleClose() {
			this.$router.push({
				name: 'user'
			})
		},
		handleAdd() {
			if(this.formData.model11){
				this.formData.city = this.formData.model11 + ',' + this.formData.model12 + ',' + this.formData.model13
			}
			utils.forAjaxPost(USERADD, this.formData, (res) =>{
				console.log(this.formData);
                console.log(res.data)
                if(res.data.status == 1){
                    this.$Message.success(res.data.msg);
                    this.$refs['formData'].resetFields();
                }else{
                    this.$Message.error(res.data.msg);
                }
			})
		},
        handleEdit(){
            this.formData.city = this.formData.model11 + ',' + this.formData.model12 + ',' + this.formData.model13
            utils.forAjaxPost(USEREDIT, this.formData, (res) =>{
                if(res.data.status == 1){
                    this.$Message.success(res.data.msg);
                }else{
                    this.$Message.error(res.data.msg);
                }
			})
            console.log(this.formData);
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
