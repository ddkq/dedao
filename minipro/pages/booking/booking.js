// pages/booking/booking.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    calendar: [],
    pickDate: [],
    inx: '',
    doctorList: [],
    pickDate: '',
    pickWeek: '',
    record: '',
  },
  onPullDownRefresh: function(){
    wx.stopPullDownRefresh()
  },
  activeDate: function(e) {
    var _this = this;
    _this.setData({
      inx: e.currentTarget.dataset.key,
    })
    if(_this.data.record != _this.data.inx) {
      var date = e.currentTarget.dataset.date;
      var week = e.currentTarget.dataset.week;
      _this.setData({
        record: e.currentTarget.dataset.key,
      })
      wx.showLoading({
        title: '加载中',
      }),
      wx.request({
        url: 'https://api.cdddkqyy.com/api/wechat/getDoctorListByWeek',
        data: {
          week: date
        },
        success(res) {
          _this.setData({
            doctorList: res.data,
            pickDate: date,
            pickWeek: week,
          
          }),
            console.log(res.data)
            
          setTimeout(function () {
            wx.hideLoading()
            
          }, 100)
          console.log(res);
        }
      })
    }
  },
  goToDetail: function(e) {
    let data = JSON.stringify(e.currentTarget.dataset.data)
    wx.navigateTo({
      url:"../book-detail/book-detail?detail=" + data
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var today = date.getDate();
    var days = new Date(year, month, 0).getDate();
    var weeks_ch = ['日', '一', '二', '三', '四', '五', '六'];
    var weeks_num = new Date().getDay(); 
    var calendar = [];
    var _this = this;
    for(var i = 0; i < 7; i++) {
      calendar.push({'week': weeks_ch[weeks_num], 'date': month + '-' + today, 'week2': weeks_ch[weeks_num]});
      weeks_num++;
      today++;
      if(today > days) {
        today = 1;
        month++;
      }
      weeks_num == 7 ? weeks_num = 0 : '';
    }
    calendar[0].week = '今天';
    calendar[1].week = '后天';
    this.setData({
      calendar: calendar
    })
    
    wx.request({
      url: 'https://api.cdddkqyy.com/api/wechat/getDoctorListByWeek',
      data: {
        week: calendar[0].date
      },
      success(res) {
        _this.setData({
          doctorList: res.data,
          pickDate: calendar[0].date,
          pickWeek: calendar[0].week2
        })
        console.log(res.data)
      }
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