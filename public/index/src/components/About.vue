<template lang="html">
<div>
  <div class="img_card">
      <div class="row justify-content-center">
          <div class="col-md-6 col-7 content_section">
              <div class="content_box">
                  <div class="content_box_inner">
                      <div>
                          <h3>
                              Just a few words about us
                          </h3>
                          <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu. Aliquam elit nibh, finibus eget mauris non, pretium vehicula ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                          </p>
                          <!--=================== counter start====================-->
                          <div class="pt50">
                              <div class="row justify-content-center">
                                  <div class="col-12 col-md-4">
                                      <div class="counter_box">
                                          <div class="divider"></div>
                                          <span class="counter">
                                              <NumberGrow :value="720"></NumberGrow>
                                          </span>
                                          <h5>Years of experience</h5>
                                      </div>
                                  </div>
                                  <div class="col-12 col-md-4">
                                      <div class="counter_box">
                                          <div class="divider"></div>
                                          <span class="counter">
                                              <NumberGrow :value="12"></NumberGrow>
                                          </span>
                                          <h5>happy clients</h5>
                                      </div>
                                  </div>
                                  <div class="col-12 col-md-4">
                                      <div class="counter_box">
                                          <div class="divider"></div>
                                          <span class="counter">
                                              <NumberGrow :value="159"></NumberGrow>
                                          </span>
                                          <h5>projects completed</h5>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--=================== counter end====================-->
                      </div>
                      <!--===================testimonial start====================-->
                      <div class="testimonial_carousel mt50">

                          <swiper :options="swiperOption" ref="mySwiper">
                               <!-- slides -->
                               <swiper-slide>
                                   <div class="testimonial_box">
                                      <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus.
                                      </p>
                                      <div class="testimonial_author">
                                          <img src="../assets/img/user.png" alt="author">
                                          <h5>maria smith</h5>
                                          <p>project manager <span>company</span></p>
                                      </div>
                                  </div>    
                              </swiper-slide>
                               <swiper-slide>
                                   <div class="testimonial_box">
                                      <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus.
                                      </p>
                                      <div class="testimonial_author">
                                          <img src="../assets/img/user.png" alt="author">
                                          <h5>maria smith</h5>
                                          <p>project manager <span>company</span></p>
                                      </div>
                                  </div>    
                              </swiper-slide>
                               <swiper-slide>
                                   <div class="testimonial_box">
                                      <p>
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus.
                                      </p>
                                      <div class="testimonial_author">
                                          <img src="../assets/img/user.png" alt="author">
                                          <h5>maria smith</h5>
                                          <p>project manager <span>company</span></p>
                                      </div>
                                  </div>    
                              </swiper-slide>
                               <!-- Optional controls -->
                               <div class="swiper-pagination"  slot="pagination"></div>
                        </swiper>

                          
                      </div>
                      <!--===================testimonial end====================-->
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-5 img_section" :style="note"></div>
      </div>
  </div>
</div>
</template>

<script>
import {
	swiper,
	swiperSlide
} from 'vue-awesome-swiper'
import NumberGrow from '@/components/base/NumberGrow'
export default {
	components: {
		swiper,
		swiperSlide,
        NumberGrow
	},
	data: () => ({
		note: {
			backgroundImage: "url(" + require("../assets/img/bg/service_bg.png") + ")",
		},
		swiperOption: {
			// notNextTick是一个组件自有属性，如果notNextTick设置为true，组件则不会通过NextTick来实例化swiper，也就意味着你可以在第一时间获取到swiper对象，假如你需要刚加载遍使用获取swiper对象来做什么事，那么这个属性一定要是true
			notNextTick: true,
			// swiper configs 所有的配置同swiper官方api配置
			autoplay: {
				delay: 10000,
				stopOnLastSlide: false,
				disableOnInteraction: true,
			},
			loop: true,
			// direction : 'vertical',
			effect: "coverflow",
			grabCursor: true,
			setWrapperSize: true,
			// autoHeight: true,
			// paginationType:"bullets",
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
				clickableClass: 'my-swiper-pagination-bullet-active',
			},
			// scrollbar:'.swiper-scrollbar',
			mousewheelControl: true,
			observeParents: true,
			// if you need use plugins in the swiper, you can config in here like this
			// 如果自行设计了插件，那么插件的一些配置相关参数，也应该出现在这个对象中，如下debugger
			// debugger: true,
			// swiper callbacks
			// swiper的各种回调函数也可以出现在这个对象中，和swiper官方一样
			// onTransitionStart(swiper){
			//   console.log(swiper)
			// },
			// more Swiper configs and callbacks...
			// ...
		},
		// swiperSlides: [1, 2, 3, 4, 5]

	})


}
</script>

<style scoped lang="less">
.img_card {
    .swiper-container-horizontal > .swiper-pagination-bullets,
    .swiper-pagination-custom,
    .swiper-pagination-fraction {
        text-align: right;
    }

}
</style>
