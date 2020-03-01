// components/spu-preview/index.js
Component({
  /**
   * 组件的对外属性列表
   */

  properties: {
      //只能是data属性
      data: Object
  },

  /**
   * 组件的对内属性数据
   */
  data: {
      tags: Array
  },

  observers: {
      data: function(data) {
          if(!data) {
              return
          }
          if(!data.tags)
          {
              return
          }
          const tags = data.tags.split('$')
          this.setData({
              tags
          })
      }
  },

  /**
   * 组件的方法列表
   */
  methods: {
      onImageLoad: function(event)  {
          const {width, height} = event.detail
          this.setData({
              w: 340,
              h: 340*height/width
          })
      },
      onImageTap: function(event) {
          const pid = event.currentTarget.dataset.pid
          // console.log(`pid is ${pid}`)
          wx.navigateTo({
              url: `/pages/detail/detail?pid=${pid}`
          })
      }
  }
})
