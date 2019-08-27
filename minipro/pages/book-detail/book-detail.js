// pages/book-detail/book-detail.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    detail: {},
    name: '',
    phone: '',
  },
  onPullDownRefresh: function(){
    wx.stopPullDownRefresh()
  },
  submitBtn: function(e) {
    var self = this;
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;
    if(self.data.name == '' || self.data.phone == '') {
      wx.showModal({
        title: '请输入姓名和手机号码',
      })
    }
    else if(self.data.phone.length < 11) {
      wx.showModal({
        title: '手机号长度有误',
      })
    }
    else if(!myreg.test(self.data.phone)) {
      wx.showModal({
        title: '手机号码有误',
      })
    }
    else {
      var name = self.data.name;
      var phone = self.data.phone;
      var id = this.data.detail.id;
      var date = this.data.detail.date + ' ' + this.data.detail.time;
      // console.log(date)
      wx.request({
        url: 'https://api.cdddkqyy.com/api/wechat/register',
        data:{
          name: name,
          phone: phone,
          id: id,
          date: date
        },
        success: function (res) {
          if(res.data.status == 1) {
            wx.switchTab({
              url: '../booking/booking',
            })
            setTimeout(function() {
              wx.showToast({
                title: res.data.info,
                icon: 'success',
              })
            }, 250)
          }
        }
      })
    }
  },
  name: function(e) {
    this.setData({
      name: e.detail.value
    })
  },
  phone: function(e) {
    this.setData({
      phone: e.detail.value
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var detail = JSON.parse(options.detail);
    this.setData({
      detail: detail
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})