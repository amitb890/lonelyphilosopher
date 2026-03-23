<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Accept-CH" content="DPR, Viewport-Width, Width">
<link rel="icon" sizes="16x16 32x32" href="https://www.lonelyphilosopher.in/wp-content/themes/newyork/assets/img/favicon.png" />
<?php if (is_user_logged_in()){ ?>
<!-- Do not Trigger Google Analytics For Logged In users -->
<?php } else { ?>
<!-- Start Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-65724879-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-65724879-1');
</script>

<!-- End Google Analytics -->

<?php }; ?>


<script>
/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-csstransforms3d-flexbox-flexboxlegacy-setclasses !*/
!function(e,n,t){function r(e,n){return typeof e===n}function s(){var e,n,t,s,o,i,a;for(var f in x)if(x.hasOwnProperty(f)){if(e=[],n=x[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(s=r(n.fn,"function")?n.fn():n.fn,o=0;o<e.length;o++)i=e[o],a=i.split("."),1===a.length?Modernizr[a[0]]=s:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=s),y.push((s?"":"no-")+a.join("-"))}}function o(e){var n=w.className,t=Modernizr._config.classPrefix||"";if(S&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),S?w.className.baseVal=n:w.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):S?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function a(){var e=n.body;return e||(e=i(S?"svg":"body"),e.fake=!0),e}function f(e,t,r,s){var o,f,l,u,p="modernizr",d=i("div"),c=a();if(parseInt(r,10))for(;r--;)l=i("div"),l.id=s?s[r]:p+(r+1),d.appendChild(l);return o=i("style"),o.type="text/css",o.id="s"+p,(c.fake?c:d).appendChild(o),c.appendChild(d),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(n.createTextNode(e)),d.id=p,c.fake&&(c.style.background="",c.style.overflow="hidden",u=w.style.overflow,w.style.overflow="hidden",w.appendChild(c)),f=t(d,e),c.fake?(c.parentNode.removeChild(c),w.style.overflow=u,w.offsetHeight):d.parentNode.removeChild(d),!!f}function l(e,n){return!!~(""+e).indexOf(n)}function u(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function p(e,n){return function(){return e.apply(n,arguments)}}function d(e,n,t){var s;for(var o in e)if(e[o]in n)return t===!1?e[o]:(s=n[e[o]],r(s,"function")?p(s,t||n):s);return!1}function c(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(n,r){var s=n.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(c(n[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+c(n[s])+":"+r+")");return o=o.join(" or "),f("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return t}function h(e,n,s,o){function a(){p&&(delete k.style,delete k.modElem)}if(o=r(o,"undefined")?!1:o,!r(s,"undefined")){var f=m(e,s);if(!r(f,"undefined"))return f}for(var p,d,c,h,v,g=["modernizr","tspan","samp"];!k.style&&g.length;)p=!0,k.modElem=i(g.shift()),k.style=k.modElem.style;for(c=e.length,d=0;c>d;d++)if(h=e[d],v=k.style[h],l(h,"-")&&(h=u(h)),k.style[h]!==t){if(o||r(s,"undefined"))return a(),"pfx"==n?h:!0;try{k.style[h]=s}catch(y){}if(k.style[h]!=v)return a(),"pfx"==n?h:!0}return a(),!1}function v(e,n,t,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+T.join(i+" ")+i).split(" ");return r(n,"string")||r(n,"undefined")?h(a,n,s,o):(a=(e+" "+E.join(i+" ")+i).split(" "),d(a,n,t))}function g(e,n,r){return v(e,t,t,n,r)}var y=[],x=[],C={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){x.push({name:e,fn:n,options:t})},addAsyncTest:function(e){x.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=C,Modernizr=new Modernizr;var w=n.documentElement,S="svg"===w.nodeName.toLowerCase(),_="CSS"in e&&"supports"in e.CSS,b="supportsCSS"in e;Modernizr.addTest("supports",_||b);var P=C.testStyles=f,z="Moz O ms Webkit",T=C._config.usePrefixes?z.split(" "):[];C._cssomPrefixes=T;var E=C._config.usePrefixes?z.toLowerCase().split(" "):[];C._domPrefixes=E;var N={elem:i("modernizr")};Modernizr._q.push(function(){delete N.elem});var k={style:N.elem.style};Modernizr._q.unshift(function(){delete k.style}),C.testAllProps=v,C.testAllProps=g,Modernizr.addTest("flexbox",g("flexBasis","1px",!0)),Modernizr.addTest("flexboxlegacy",g("boxDirection","reverse",!0)),Modernizr.addTest("csstransforms3d",function(){var e=!!g("perspective","1px",!0),n=Modernizr._config.usePrefixes;if(e&&(!n||"webkitPerspective"in w.style)){var t,r="#modernizr{width:0;height:0}";Modernizr.supports?t="@supports (perspective: 1px)":(t="@media (transform-3d)",n&&(t+=",(-webkit-transform-3d)")),t+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",P(r+t,function(n){e=7===n.offsetWidth&&18===n.offsetHeight})}return e}),s(),o(y),delete C.addTest,delete C.addAsyncTest;for(var j=0;j<Modernizr._q.length;j++)Modernizr._q[j]();e.Modernizr=Modernizr}(window,document);
</script>
<title><?php the_title(); ?></title>
<?php wp_head(); ?>
<link rel='stylesheet' id='main-css-css'  href='https://www.lonelyphilosopher.in/wp-content/themes/newyork/assets/css/style.min.css' type='text/css' media='all' />
<link href="https://www.lonelyphilosopher.in/wp-content/themes/newyork/assets/css/print.css" rel="stylesheet" type="text/css" media="print" />
</head>
<body <?php body_class(); ?>>
<div class="site-wrapper" data-site-wrapper>
<div class="max--desktop">
<header class="site-header site-header--static site-header--signed-out"
  >
  <div class="site-header__inner1" style="min-height:350px;">
     <div class="site-header__inner2"
        >
        <div class="site-header__item site-header__item--left-oc-trigger"
           ><button
           class="site-header__left-oc-trigger"
           type="button"
           data-oc-trigger="left"
           ></button></div
           >
        <div class="site-header__item site-header__item--branding" style="margin:0 auto;">
           <a class="site-header__site-logo" href="https://www.lonelyphilosopher.in" title="Lonely Philosopher"
              >
              <div class="site-header__site-logo__image" aria-label="Cult Of Web"
                 >
                 <img style="max-width: none;"src="https://www.lonelyphilosopher.in/wp-content/uploads/2019/08/lplogo.png">
                
              </div>
           </a>
        </div
           >
        
       
     </div
        >
  </div
     >
</header
  >

