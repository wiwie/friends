!function(){"use strict";var e=window.wp.element,n=window.wp.i18n,i=window.wp.hooks,t=window.wp.compose,l=window.wp.blockEditor,s=window.wp.components,r=(0,t.createHigherOrderComponent)((function(i){return function(t){var r=t.attributes,o=t.setAttributes,a="";return void 0!==r.className&&(/\bonly-friends\b/.test(r.className)?a="only-friends":/\bnot-friends\b/.test(r.className)&&(a="not-friends")),(0,e.createElement)(e.Fragment,null,(0,e.createElement)(i,t),(0,e.createElement)(l.InspectorControls,null,(0,e.createElement)(s.PanelBody,{className:"friends-block-visibility",title:(0,n.__)("Friends Visibility","friends")},(0,e.createElement)(s.SelectControl,{label:(0,n.__)("Block visibility","friends"),onChange:function(e){var n=((r.className||"").replace(/\b(only|not)-friends\b/g,"")+" "+e).replace(/^\s+|\s+$/,"");o({className:n})},value:a,options:[{label:(0,n.__)("For everyone","friends"),value:""},{label:(0,n.__)("Only friends","friends"),value:"only-friends"},{label:(0,n.__)("Everyone except friends","friends"),value:"not-friends"}]}))))}}),"withFriendsBlockVisibility");(0,i.addFilter)("editor.BlockEdit","friends/block-visibility",r)}();