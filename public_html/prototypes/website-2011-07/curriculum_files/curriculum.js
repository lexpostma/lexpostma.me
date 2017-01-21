// Created by iWeb 3.0.3 local-build-20110718

setTransparentGifURL('Media/transparent.gif');function applyEffects()
{var registry=IWCreateEffectRegistry();registry.registerEffects({shadow_1:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,-0.0000),color:'#000000',opacity:0.500000}),shadow_6:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,0.0000),color:'#000000',opacity:0.500000}),shadow_3:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,-0.0000),color:'#000000',opacity:0.500000}),shadow_5:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,0.0000),color:'#000000',opacity:0.500000}),shadow_8:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,0.0000),color:'#000000',opacity:0.500000}),shadow_2:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,-0.0000),color:'#000000',opacity:0.500000}),shadow_9:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,0.0000),color:'#000000',opacity:0.500000}),shadow_4:new IWShadow({blurRadius:12,offset:new IWPoint(0.0000,-0.0000),color:'#000000',opacity:0.500000}),shadow_0:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,0.0000),color:'#000000',opacity:0.500000}),shadow_7:new IWShadow({blurRadius:12,offset:new IWPoint(-0.0000,0.0000),color:'#000000',opacity:0.500000})});registry.applyEffects();}
function hostedOnDM()
{return false;}
function onPageLoad()
{loadMozillaCSS('curriculum_files/curriculumMoz.css')
detectBrowser();adjustLineHeightIfTooBig('id1');adjustFontSizeIfTooBig('id1');adjustLineHeightIfTooBig('id2');adjustFontSizeIfTooBig('id2');fixAllIEPNGs('Media/transparent.gif');Widget.onload();applyEffects()}
function onPageUnload()
{Widget.onunload();}
