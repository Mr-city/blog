<template>
<div class="layout">
	<Layout>
		<Sider breakpoint="md" ref="side1" hide-trigger collapsible :collapsed-width="78" v-model="isCollapsed">
			<!-- <h2 class="logo">
				<Icon type="md-headset" :class="isCollapsed ? 'ivu-iconb' : ''" /> <span>Admin</span></h2> -->
			<Menu :isCollapsed="isCollapsed"></Menu>
		</Sider>
		<Layout>
			<Header :style="{padding: 0,position: 'fixed', width: '100%',zIndex:999}" class="layout-header-bar">
				<Icon @click.native="collapsedSider" :class="rotateIcon" :style="{margin: '0 20px'}" type="md-menu" size="24"></Icon>
			</Header>
			<Content :style="{margin: '68px 20px 0', minHeight: '260px'}">
				<Breadcrumb :style="{margin: '16px 0'}">
					<BreadcrumbItem>Home</BreadcrumbItem>
					<BreadcrumbItem>Components</BreadcrumbItem>
					<BreadcrumbItem>Layout</BreadcrumbItem>
				</Breadcrumb>
				<div class="container" style="background:#fff;margin-bottom: 20px;min-height: 360px;">
					<transition :name="transitionName">
						<router-view class="child-view"></router-view>
					</transition>
				</div>

			</Content>
		</Layout>
	</Layout>
</div>
</template>
<script>
import Menu from '@/components/base/Menu'
export default {
	data() {
		return {
			isCollapsed: false,
			msg: [],
			transitionName: 'slide-left'
		}
	},
	watch: {
		'$route'(to, from) {
			if (to.path == '/') {
				this.transitionName = 'slide-right';
			} else {
				this.transitionName = 'slide-left';
			}
		}
	},
	components: {
		Menu
	},
	computed: {
		rotateIcon() {
			return [
				'menu-icon',
				this.isCollapsed ? 'rotate-icon' : ''
			];
		},

	},
	methods: {
		collapsedSider() {
			this.$refs.side1.toggleCollapse();
		}
	}
}
</script>

<style lang="less">


html {
    height: 100%;
    body {
        height: 100%;
    }
    .container {
        padding: 20px;
        height: 90%;
        position: relative;
    }
	.child-view {
	  position: absolute;
	  background: #fff;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  padding: 20px;
	  z-index: 99;
	  transition: all .5s cubic-bezier(.55,0,.1,1);
	}
	.slide-left-enter, .slide-right-leave-active {
	  opacity: 0;
	  -webkit-transform: translate(30px, 0);
	  transform: translate(30px, 0);
	}
	.slide-left-leave-active, .slide-right-enter {
	  opacity: 0;
	  -webkit-transform: translate(-30px, 0);
	  transform: translate(-30px, 0);
	}
}
.logo {
    height: 64px;
    color: #fff;
    line-height: 64px;
    padding-left: 24px;
    background: #2e3645;
    span {
        vertical-align: middle;
    }
    .ivu-icon {
        transition: 0.2s;
        margin-right: 3px;
        font-weight: bold;
    }
    .ivu-iconb {
        font-size: 22px;
        transform: translateX(5px);
        transition: font-size 0.2s ease 0.2s, transform 0.2s ease 0.2s;
    }
}
.layout {
    background: #f5f7f9;
    position: relative;
    overflow: hidden;
    height: 100%;
}
.ivu-layout {
    flex-direction: inherit;
}
.ivu-layout.ivu-layout-has-sider {
    height: 100%;
}

.layout-header-bar {
    background: #fff;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
}

.layout-logo-left {
    width: 90%;
    height: 30px;
    background: #5b6270;
    border-radius: 3px;
    margin: 15px auto;
}

.menu-icon {
    transition: all 0.3s;
}

.rotate-icon {
    transform: rotate(-90deg);
}

.menu-item span {
    display: inline-block;
    overflow: hidden;
    width: 69px;
    text-overflow: ellipsis;
    white-space: nowrap;
    vertical-align: middle;
    transition: width 0.2s ease 0.2s;
}

.menu-item i {
    transform: translateX(0px);
    transition: font-size 0.2s ease, transform 0.2s ease;
    vertical-align: middle;
    font-size: 16px;
}

.collapsed-menu span {
    width: 0;
    transition: width 0.2s ease;
}

.collapsed-menu i {
    transform: translateX(5px) translateY(10px);
    transition: font-size 0.2s ease 0.2s, transform 0.2s ease 0.2s;
    vertical-align: middle;
    font-size: 22px;
}
</style>
