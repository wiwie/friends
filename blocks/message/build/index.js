!function(){"use strict";var e=window.wp.element,n=(window.wp.i18n,window.wp.blocks),t=window.wp.blockEditor;(0,n.registerBlockType)("friends/message",{apiVersion:2,edit:function(){return(0,e.createElement)("div",(0,t.useBlockProps)(),(0,e.createElement)(t.InnerBlocks,null))},save:function(){var n=t.useBlockProps.save();return(0,e.createElement)("div",n,(0,e.createElement)(t.InnerBlocks.Content,null))}})}();