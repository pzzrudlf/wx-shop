// components/hot-list/index.js
Component({
  /**
   * 组件的属性列表
   */
  properties: {
      banner: Object
  },

  //设置监听器
  // banner参数指的是properties中的banner
  observers: {
      'banner': function(banner){
          if(!banner)
          {
              return
          }
      }
  },

  /**
   * 组件的初始数据
   */
  data: {

  },

  /**
   * 组件的方法列表
   */
  methods: {

  }
})
