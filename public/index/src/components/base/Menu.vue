<template lang="html">

<div class="fixed-group">
    <div class="logo_box">
        <a href="#">
            <img src="../../assets/img/logo.png" alt="cocoon">
        </a>
    </div>
    <div class="side_menu_section">
        <ul class="menu_nav">
            <li class="active">
                <router-link to="/home">首页</router-link>
            </li>
            <li v-for="item in dataList">
                <router-link :to="'/'+item.columnurl">{{item.columnname}}</router-link>
            </li>
            <!-- <li>
                <router-link to="/blog">个人博客</router-link>
            </li>
            <li>
                <router-link to="/Services">服务</router-link>
            </li>
            <li>
                <router-link to="/Services">记事</router-link>
            </li>
            
            <li>
                <router-link to="/contact">联系</router-link>
            </li> -->
        </ul>
    </div>
    <!-- <div class="side_menu_section">
        <h4 class="side_title">filter by:</h4>
        <ul  id="filtr-container"  class="filter_nav">
            <li  data-filter="*" class="active"><a href="javascript:void(0)" >all</a></li>
            <li data-filter=".branding"> <a href="javascript:void(0)">branding</a></li>
            <li data-filter=".design"><a href="javascript:void(0)">design</a></li>
            <li data-filter=".photography"><a href="javascript:void(0)">photography</a></li>
            <li data-filter=".architecture"><a href="javascript:void(0)">architecture</a></li>
        </ul>
    </div> -->
</div>
        

</template>

<script>
import * as utils from '@/utils/utils'
import {COLUMNINDEX} from '@/utils/api'
export default {
    data:()=>({
        dataList:null
    }),
    created(){
        this.init()
    },
    methods:{
        init(){
            utils.forAjaxPost(COLUMNINDEX,{},(res)=>{
                this.dataList = res.data.data;
            })
        }    
    },
}
</script>

<style scoped lang="less">
.fixed-group {
    position: fixed;
    top: 0;
    flex: 0 0 16.666667%;
    max-width: 250px;
    .router-link-active {
        background-color: #99896e;
        color: #ffffff;
    }
}
</style>
