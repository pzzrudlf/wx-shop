// pages/home/home.js
import {Theme} from "../../models/theme";
import {Banner} from "../../models/banner";
import {Category} from "../../models/category";
import {Activity} from "../../models/activity";
import {ProductPaging} from "../../models/product-paging";

Page({

  /**
   * 页面的初始数据
   */
  data: {
      themeA: null,
      bannerB: null,
      themeE: null,
      themeESpuList: [],
      grid: [],
      activityD: null,
      spuPaging: null,
      loadingType: 'loading'
  },

  /**
   * 生命周期函数--监听页面加载
   */
  async onLoad(options) {
      this.initAllData()
      this.initBottomSpuList()
  },

  async initBottomSpuList()
  {
      const paging = ProductPaging.getLatestPaging()
      this.data.spuPaging = paging
      const data = await paging.getMoreData()
      console.log(data.items)
      if(!data) return
      wx.lin.renderWaterFlow(data.items)
  },

  async initAllData() {
      const theme = new Theme()
      await theme.getThemes()
      const themeA = await theme.getHomeLocationA()
      const themeE = await theme.getHomeLocationE()
      const themeF = await theme.getHomeLocationF()
      let themeESpuList = [];
      if(themeE.online)
      {
          const data = await Theme.getHomeLocationESpu();
          if(data)
          {
               themeESpuList = data.spu_list
          }
      }
      const bannerB = await Banner.getHomeLocationB()
      const bannerG = await Banner.getHomeLocationG()
      const grid = await Category.getHomeLocationC()
      const activityD = await Activity.getHomeLocationD()
      this.setData({
          themeA,
          themeE,
          themeESpuList,
          themeF,
          bannerB,
          bannerG,
          grid,
          activityD
      })
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: async function () {
      const data = await this.data.spuPaging.getMoreData()
      if (!data) return
      wx.lin.renderWaterFlow(data.items)
      if(!data.moreData){
          this.setData({
              loadingType: 'end'
          })
      }
  },
})