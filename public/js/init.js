function setCookie(name, value, days) {
    var d = new Date;
    d.setTime(d.getTime() + 24*60*60*1000*days);
    document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
  }

  function getCookie(name) {
    var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return v ? v[2] : null;
  }

  var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  };
  
  /**
   *  set cookie token
   */

  if (document.cookie.indexOf('g_token') == -1 ) {
    console.log('set cookie');
    var g_token = "{!! Session::get('g_token') !!}";
    if(g_token != '')
      setCookie('g_token', g_token, 1);

    /**
     *  set locals
     */
    var g_permission = "{!! Session::get('g_permission') !!}";
    localStorage.setItem('g_permission', JSON.stringify(g_permission));
  }
  else console.log('k set cookie');