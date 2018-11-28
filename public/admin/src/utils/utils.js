import axios from "axios";
import router from '@/router'
// 请求ajax url 地址 data 参数 callback 回调 post
export const forAjaxPost = (url, data, callback, errCall) => {
  axios.post(url, data)
    .then((res) => {
      if (res.data.status == "-1") {
        router.push({
          name: 'login'
        })
        return false;
      } else {
          callback(res);
      }

    })
    .catch(function(err) {
      console.log(err);
      errCall && errCall(err);
    })
};

// 请求ajax url 地址 data 参数 callback 回调 post （无需跳转登录）
export const forAjaxPostNotJump = (url, data, callback, errCall) => {
  axios.post(url, data)
    .then(function(res) {
      let newRes = res.data,
        code = newRes.code,
        data = newRes.data,
        msg = newRes.msg,
        time = newRes.time;
      callback(data, msg, code, time);

    })
    .catch(function(err) {
      console.log(err);
      errCall && errCall(err);
    })
};

// 请求ajax url 地址 data 参数 callback 回调 get
export const forAjaxGet = (url, data, callback) => {
  url += "?";
  for (let key in data) {
    let value = data[key] !== undefined ? data[key] : "";
    url += `&${key}=${value}`;
  }
  axios.get(url, data)
    .then(function(res) {

        if (res.data.status == "-1") {
          router.push({
            name: 'login'
          })
          return false;
        } else {
            callback(res);
        }
      // callback(data,msg,code,time);
    }).catch(function(err) {
      console.log(err);
    })
};

/*
 *   倒计时
 *   time 时间戳  截止时间 - 当前时间
 *   cb   回调函数 得到 obj
 */
export const timeDown = (time, cb) => {
  clearTimeout(times);
  var times = setTimeout(() => {
    timeDown(time - 1000, cb);
  }, 1000)
  var days = parseInt(time / (1000 * 60 * 60 * 24)),
    hours = parseInt((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
    minutes = parseInt((time % (1000 * 60 * 60)) / (1000 * 60)),
    second = parseInt((time % (1000 * 60)) / 1000),
    obj = {
      days,
      hours: checkTime(hours),
      minutes: checkTime(minutes),
      second: checkTime(second)
    };
  cb(obj, times)
};
// 补0
export const checkTime = (num) => {
  (num < 10) && (num = "0" + num);
  return num;
}

//判断登录状态
export const isLogin = () => {
  let isLogin = sessionStorage.getItem('isLogin'),
    myphone = sessionStorage.getItem('myphone');
  console.log('isLogin：', isLogin);
  if (isLogin == 'false' || isLogin == null) {
    router.push({
      name: 'login'
    });
    return false;
  }
  return true;
}
//获取个人信息
export const myMsg = (callback) => {
  let myInfoStr = sessionStorage.getItem('myinfo');
  callback(myInfoStr);
}
//获取sessionStorage
export const getSessionStorage = (sname, callback) => {
  let data = sessionStorage.getItem(sname);
  callback(data);
}
//设置sessionStorage
export const setSessionStorage = (sname, sdata) => {
  let str = JSON.stringify(sdata);
  sessionStorage.setItem(sname, str);
}

//时间戳转换时间
export function formatDate(date, fmt) {
  if (/(y+)/.test(fmt)) {
    fmt = fmt.replace(RegExp.$1, (date.getFullYear() + '').substr(4 - RegExp.$1.length));
  }
  let o = {
    'M+': date.getMonth() + 1,
    'd+': date.getDate(),
    'h+': date.getHours(),
    'm+': date.getMinutes(),
    's+': date.getSeconds()
  };
  for (let k in o) {
    if (new RegExp(`(${k})`).test(fmt)) {
      let str = o[k] + '';
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length === 1) ? str : padLeftZero(str));
    }
  }
  return fmt;
};

function padLeftZero(str) {
  return ('00' + str).substr(str.length);
};

export function objectNull(obj) {
  for (var key in obj) {
    return true
  }
  return false;
}
