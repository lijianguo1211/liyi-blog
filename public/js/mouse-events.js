/******/ (() => { // webpackBootstrap
/*!**************************************!*\
  !*** ./resources/js/mouse-events.js ***!
  \**************************************/
var instance = axios.create({
  baseURL: 'http://127.0.0.1:8000',
  timeout: 1000
});
$(document).on('keyup', '#search-key-down', function (event) {
  var e = event || window.event || arguments.callee.caller.arguments[0];

  if (!e || e.keyCode !== 13) {
    return false;
  }

  var searchVal = $("#search-key-down").val();
  ajaxSearch(searchVal);
});
$(document).on('click', '#search-jay', function (event) {
  var searchVal = $("#search-key-down").val();
  ajaxSearch(searchVal);
});

function ajaxSearch(val) {
  if (!val.trim()) {
    return false;
  }

  console.log(val);
  instance.get('/search', {
    params: {
      keyWorld: val
    }
  }).then(function (response) {
    if (response.status !== 200) {}

    console.log('success');
    console.log(response);
  })["catch"](function (error) {
    swal({
      title: '网络错误，稍后重试',
      width: 300,
      padding: 100,
      timer: 1000
    }).then(function () {}, function (dismiss) {
      if (dismiss === 'timer') {
        console.log('I was closed by the timer');
      }
    });
    console.log(error);
  });
}
/******/ })()
;