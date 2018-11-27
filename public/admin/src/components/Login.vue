<template lang="html">
  <div id="login">
      <div class="container-group">
          <div class="login-container">
              <form class="login-form" method="post">
                  <h3>博客管理系统</h3>
                  <div class="input-group">
                      <input type="text" id="username" name="name"  v-model="op.name" placeholder="用户名" class="input-field">
                  </div>
                  <div class="input-group">
                      <input type="password" id="password" name="password" v-model="op.password" placeholder="密码" class="input-field">
                  </div>
                  <!-- <div class="input-group">
                      <input type="text" id="code" name="code" placeholder="验证码" class="input-field">
                      <img src="{:captcha_src()}" alt="captcha" onclick="this.src='{:captcha_src()}'"/>
                  </div> -->
                  <button type="button" class="login-button" @click="login">登录<Icon type="ios-arrow-dropright" /></button>
              </form>
          </div>
      </div>
  </div>
</template>

<script>
import * as utils from '@/utils/utils'
import {LOGIN} from '@/utils/api'
export default {
    data:()=>({
        op:{
            name:'',
            password:'',
        }
    }),
    methods:{
        login(){
            
            utils.forAjaxPost(LOGIN,this.op,(res)=>{
                if(res.data.status == '1'){
                    this.$Message.success({
                        content:res.data.msg,
                        onClose:()=>{
                            this.$router.push({
                                name:'home'
                            })
                        }
                    })
                    
                }else{
                    this.$Message.error(res.data.msg)
                }
                
            })
                        

        }
    }
}
</script>

<style scoped lang="less">
@import '../assets/css/login.css';
#login {
    position: fixed;
    top: 0;
    left: 0;
    background: #fff;
    width: 100%;
    height: 100%;
    z-index: 1001;
    background: url("../assets/images/login_bg.png") no-repeat 50%;
    background-size: cover;
    
    .container-group{
        display: table;
        width: 100%;
        height: 100%;
    }
    .login-container{
        display: table-cell;
        vertical-align: middle;
    }
    .login-form {
        width: 350px;
        padding: 20px 45px 40px;
        margin: 0 auto;
        background: rgba(255,255,255,0.5);
        box-sizing: border-box;
    }
}
</style>
