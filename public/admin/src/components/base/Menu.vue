<template lang="html">
    <Menu :active-name="activemenu" theme="dark" width="auto" :class="menuitemClasses" @on-select="routeName">
        <MenuItem name="home">
            <Icon type="ios-home" />
            <span>首页</span>
        </MenuItem>
        <MenuItem name="user">
            <Icon type="md-person" />
            <span>用户组</span>
        </MenuItem>
        <MenuItem name="column">
            <Icon type="md-list-box" />
            <span>栏目管理</span>
        </MenuItem>
        <MenuItem name="article">
            <Icon type="md-document" />
            <span>文章管理</span>
        </MenuItem>
    </Menu>
</template>

<script>
export default {
	props: {
		isCollapsed: Boolean
	},
    data:()=>({
        activemenu:'home'
    }),
	computed: {
		menuitemClasses() {
			return [
				'menu-item',
				this.isCollapsed ? 'collapsed-menu' : ''
			]
		}
	},
	methods: {
		routeName(name) {
			this.$router.push({
                name
            })
		},
		menuList() { // 刷新后当前栏目高亮
			let path = this.$route.path // 获取到地址拦上#号后面的url地址
            let a = path.split('/') //截取字段
            this.activemenu = a[1]
		}
	},
    mounted(){
        this.menuList()
    }
}
</script>

<style lang="css">
</style>
