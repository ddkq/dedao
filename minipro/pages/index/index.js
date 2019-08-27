//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
    // motto: 'Hello World',
    // userInfo: {},
    // hasUserInfo: false,
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    bannerURL: {},
    indicatorDots: true,
    autoplay: true,
    interval: 3000,
    circular: true,
    url: app.data.url,
    Height: "",
    swiperCurrent: 0,
    caseList: {},
    newsList: {},
    hospitalAddressSlider: {}
  },

    gotoCd() {
    wx.navigateTo({
      url: '../guanwang/guanwang',
      success: function () {},        //成功后的回调；
      fail: function () { },          //失败后的回调；
      complete: function () { }      //结束后的回调(成功，失败都会执行)
    })
  },
  gotomagellan() {
    wx.navigateTo({
      url: '../magellan/magellan',
      success: function () { },        //成功后的回调；
      fail: function () { },          //失败后的回调；
      complete: function () { }      //结束后的回调(成功，失败都会执行)
    })
  },
  gotocorrect() {
    wx.navigateTo({
      url: '../correct/correct',
      success: function () { },        //成功后的回调；
      fail: function () { },          //失败后的回调；
      complete: function () { }      //结束后的回调(成功，失败都会执行)
    })
  },
  gotojkm() {
    wx.navigateTo({
      url: '../jkm/jkm',
      success: function () { },        //成功后的回调；
      fail: function () { },          //失败后的回调；
      complete: function () { }      //结束后的回调(成功，失败都会执行)
    })
  },
  gotoshuju() {
    wx.navigateTo({
      url: '../shuju/shuju',
      success: function () { },        //成功后的回调；
      fail: function () { },          //失败后的回调；
      complete: function () { }      //结束后的回调(成功，失败都会执行)
    })
  },
 
  
  changDot(e) {
    this.setData({
      swiperCurrent: e.detail.current
    });
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onLoad: function () {
    this.request();
  },
  // 下拉刷新
  onPullDownRefresh: function () {
    this.request('onPull');
  },
  request:function(type) {
    // 获取轮播图
    var self = this;
    wx.request({
      url: 'https://api.cdddkqyy.com/api/wechat/banner',
      success: function (res) {
        self.setData({
          bannerURL: res.data
        })
        // console.log(res.data)
      }
    })
    // 获取新闻
    wx.request({
      url: 'https://api.cdddkqyy.com/api/Wechat/news',
      success: function (res) {
        self.setData({
          newsList: res.data
        })
        // console.log(res.data)
      }
    })
    // 获取案例
    wx.request({
      url: 'https://api.cdddkqyy.com/api/Wechat/case1',
      success: function (res) {
        self.setData({
          caseList: res.data
        })
        // console.log(res.data)
        type == 'onPull' ? wx.stopPullDownRefresh() : '';
      }
    })
    // 获取医院环境banner
    wx.request({
      url: 'https://api.cdddkqyy.com/api/Wechat/environment',
      success: function (res) {
        self.setData({
          hospitalAddressSlider: res.data
        })
        // console.log(res.data)
      }
    })
  },
})
