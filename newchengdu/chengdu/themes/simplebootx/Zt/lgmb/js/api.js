/* eslint-disable */
!function(e){function t(e){var t=!0;return/^\d{11,12}$/.test(e)||(t=!1,alert(y.ERROR_PHONE)),t}function n(e){alert(e)}function o(e){var t=e.msg||y.ERROR_FAIL;alert(t+" ( code: "+e.status+" )")}function i(e,t){var n="_lxb_jsonp_"+(new Date).getTime()+"_",o=document.getElementsByTagName("head")[0];window[n]=function(){window[n]=null;try{delete window[n]}catch(e){}t.apply(null,Array.prototype.slice.call(arguments));var e=document.getElementById(n);e&&e.parentNode.removeChild(e)};var i=document.createElement("script");i.setAttribute("type","text/javascript"),i.setAttribute("id",n),i.setAttribute("charset","utf-8"),e+=e.indexOf("?")>=0?"&":"?",e+="callback="+n,i.setAttribute("src",e),o.appendChild(i)}function r(e,t,n,o){var i=e+"="+t;if(n&&(i+="; path="+n),o){var r=new Date;r.setTime(r.getTime()+24*o*3600*1e3),i+="; expires="+r.toGMTString()}document.cookie=i}function a(e){var t=new RegExp("(^| )"+e+"=([^;]*)(;|$)"),n=t.exec(document.cookie);return n?n[2]||null:null}function d(e){return e=e.replace(/^https?:\/\//,"").split("/"),e[0].replace(/:.*$/,"")}function l(e){e=e.replace(/\r\n/g,"\n");for(var t="",n=0;n<e.length;n++){var o=e.charCodeAt(n);o<128?t+=String.fromCharCode(o):o>127&&o<2048?(t+=String.fromCharCode(o>>6|192),t+=String.fromCharCode(63&o|128)):(t+=String.fromCharCode(o>>12|224),t+=String.fromCharCode(o>>6&63|128),t+=String.fromCharCode(63&o|128))}return t}function c(e){var t,n,o,i,r,a,d,c="",s=0;for(e=l(e);s<e.length;)t=e.charCodeAt(s++),n=e.charCodeAt(s++),o=e.charCodeAt(s++),i=t>>2,r=(3&t)<<4|n>>4,a=(15&n)<<2|o>>6,d=63&o,isNaN(n)?a=d=64:isNaN(o)&&(d=64),c=c+_keyStr.charAt(i)+_keyStr.charAt(r)+_keyStr.charAt(a)+_keyStr.charAt(d);return c}function s(){if(k!==-1)return k;var e=d(window.location.href),t=d(document.referrer);return document.referrer?k=e!==t:"loaded"===a("isLoadPage")?k=!1:(r("isLoadPage","loaded","/"),k=!0)}function u(e,t){var n=512,o=x+"/vt/lxb.gif",i=(document.title||"").substr(0,n),r=(document.referrer||"").substr(0,n),a=(document.URL||"").substr(0,n),d=b.BDCBID,l=[];l.push(encodeURIComponent(e||"")),l.push(encodeURIComponent(i||"")),l.push(encodeURIComponent(r||"")),l.push(encodeURIComponent(a||"")),l.push(+s());var u=c(l.join(",")),p=function(){if(T||(T=document.createElement("div"),T.style.display="none"),T.innerHTML='<form action="'+o+'" method="post" target="lxbHideIframe"><input name="p" value="'+u+'"/><input name="uid" value="'+t+'"/><input name="bdcbid" value="'+d+'"/><input name="t" value="'+(new Date).valueOf()+'"/></form><iframe id="lxbHideIframe" name="lxbHideIframe" src="about:blank"></iframe>',document.body){document.body.appendChild(T);var e=T.getElementsByTagName("form")[0];e.submit()}};document.body?p():window.onload=p}function p(e){var t=[];for(var n in e)t.push(n+"="+encodeURIComponent(e[n]));return t.join("&")}function m(e,r,a){if("[object String]"!=Object.prototype.toString.call(e)&&(e=e.value),!h.status&&t(e)&&h.uid){var d={uid:h.uid,g:h.gid,t:(new Date).getTime(),f:4,r:document.referrer,bdcbid:b.BDCBID};i(C.GET_TOKEN+"?"+p(d),function(t){if(t&&0==t.status&&t.data.tk){var d={uid:h.uid,g:h.gid,tk:t.data.tk,vtel:e,bdcbid:b.BDCBID};h.sCode&&(d.scode=h.sCode),h.status=1;var l=setTimeout(function(){h.status=0},5e3);i(C.CALL+"?"+p(d),function(e){l&&clearTimeout(l),h.status=0,e.status?(a=a||o,a.call(null,e)):(r=r||n,r.call(null,e.msg||y.SUCCESS))}),"1"==b.LXBVT&&u(2,h.uid)}})}}function g(){if(!document.getElementById("sCodeCon")){var e=document.createElement("ins"),t=document.createElement("ins"),n=document.createElement("ins"),o=document.createElement("ins"),i=document.createElement("input"),r=document.createElement("ins"),a=document.createElement("ins"),d=document.createElement("img"),l=document.createElement("ins");d.id="sCodeImg",e.id="sCodeCon",e.style.cssText="width: 330px;height: 230px;background-color: rgb(250, 250, 250);border: 1px solid rgb(235,235,235);position: absolute;left: 50%;top: 50%;margin-left: -165px;margin-top: -115px;z-index: 9999;display: block;text-decoration: none;",t.style.cssText='height: 50px;background-color: rgb(63,178,232);color: rgb(255,255,255);font-size: 18px;letter-spacing: 2px;font-family:"Microsoft YaHei",\u5fae\u8f6f\u96c5\u9ed1;line-height: 50px;text-align: center;display: block;text-decoration: none;',n.style.cssText="height: 75px;display: block;text-decoration: none;",o.style.cssText="height: 75px;display: block;text-decoration: none;",i.maxLength=4,i.style.cssText="width: 185px;height: 45px;border: 1px solid rgb(235,235,235);background-color: rgb(255,255,255);float: left;font-size: 30px;line-height: 45px;margin-top: 30px;margin-left: 30px;_margin-left: 20px;display: block;text-decoration: none;",d.style.cssText="width: 80px;height: 45px;float: left;margin-top: 30px;cursor: pointer;",r.style.cssText='width: 100px;height: 35px;float: left;margin-top: 30px;margin-left: 20px;border: 1px solid rgb(63,178,232);background-color: rgb(63,178,232);color: rgb(255,255,255);font-size: 16px;font-family:"Microsoft YaHei",\u5fae\u8f6f\u96c5\u9ed1;line-height: 35px;text-align: center;cursor: pointer;display: block;text-decoration: none;',a.style.cssText='width: 100px;height: 35px;float: left;margin-top: 30px;margin-left: 50px;_margin-left: 25px;border: 1px solid rgb(63,178,232);color: rgb(63,178,232);font-size: 16px;font-family:"Microsoft YaHei",\u5fae\u8f6f\u96c5\u9ed1;line-height: 35px;text-align: center;cursor: pointer;display: block;text-decoration: none;',l.style.cssText='position: absolute;width: 42px;height: 34px;right: 0;bottom: 0;background: url("http://lxb.baidu.com/lxb/pic/api/corner.png") no-repeat!important;_background: none;_filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=noscale, src="http://lxb.baidu.com/lxb/pic/api/corner.png")',t.innerHTML="\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801",r.innerHTML="\u786e \u8ba4",a.innerHTML="\u53d6 \u6d88",d.onclick=function(){d.src=C.imagePath+(new Date).getTime()},r.onclick=function(){h.sCode=i.value,h.sCode?(i.value="",e.style.display="none",m(h.tel)):alert("\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801\uff01")},a.onclick=function(){i.value="",e.style.display="none"},n.appendChild(i),n.appendChild(d),o.appendChild(a),o.appendChild(r),e.appendChild(t),e.appendChild(n),e.appendChild(o),e.appendChild(l),document.body.appendChild(e)}document.getElementById("sCodeImg").src=C.imagePath+(new Date).getTime(),document.getElementById("sCodeCon").style.display="block"}function f(e){h.tel=e;var t={uid:h.uid};i(C.SCODEON+"?"+p(t),function(e){e.scodeOn?g():m(h.tel)})}var h={status:0},b={BDCBID:'930bb90b-d37f-4e46-97ee-8ef328b6f743',LXBVT:1},x="//lxbjs.baidu.com",C={GET_TOKEN:x+"/cb/user/check",CALL:x+"/cb/call",SCODEON:x+"/cb/call/getScode",imagePath:x+"/cb/scode?t="},y={SUCCESS:"\u56de\u547c\u6210\u529f\uff01",ERROR_FAIL:"\u7cfb\u7edf\u7e41\u5fd9\uff0c\u8bf7\u7a0d\u540e\u91cd\u8bd5",ERROR_PHONE:"\u8bf7\u60a8\u8f93\u5165\u6b63\u786e\u7684\u53f7\u7801\uff0c\u624b\u673a\u53f7\u7801\u8bf7\u76f4\u63a5\u8f93\u5165\uff0c\u5ea7\u673a\u8bf7\u52a0\u533a\u53f7"};_keyStr="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";var v=e.lxb||{};if(!v.call){v.call=f,e.lxb=v;for(var E,T=null,k=-1,w=document.getElementsByTagName("script"),S=0;E=w[S];S++){var A=E.getAttribute("data-lxb-gid");if(E=E.getAttribute("data-lxb-uid"),A&&!h.gid&&(h.gid=A),E&&!h.uid){h.uid=E;break}}h.uid&&"1"==b.LXBVT&&u(1,h.uid)}}(window);
/* eslint-enable */
