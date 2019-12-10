/* comnon.qs */
//params.noFrame=1;// for test only

/*
	PublishType:
	#define PUBLISH_TOFILE	"file"
	#define PUBLISH_TOFTP	"ftp"
	#define PUBLISH_TOPAGE	"page"
	#define PUBLISH_TOJOOMLA "joomla"
	#define PUBLISH_TOWORDPRESS "wordpress"
	
	CssPath=engine1
	ImgPath=engine1
	JsPath=engine1
	ImageTemplate = d:/Project/wowslider/Debug/templates/backgnd/noir/
	ImageTemplateName=Noir
	ImageEffect=blinds
	TemplateName=noir
*/
var backMargins = { 'top': 0, 'right': 0, 'bottom': 0, 'left': 0 };
params.backMarginsLeft = 0;
params.backMarginsTop = 0;
params.backMarginsRight = 0;
params.backMarginsBottom = 0;
params.Border='none';
params.addCss=''; // additional css params (will added to begin of css file)

params.prevCaption = '';
params.nextCaption = '';
imageW = params.ImageWidth*1;
imageH = params.ImageHeight*1;

if (imageW==0) {
	imageW = 640;
	params.ThumbWidth = 120;
}
if (imageH==0) {
	imageH = 480;
	params.ThumbHeight = 90;
}
params.ImageWidth = imageW;
params.ImageHeight = imageH;

// use in iframe
params.fullHeight = imageH;
params.fullWidth = imageW;

if (params.ThumbWidth==0)
	params.ThumbWidth =Math.floor(params.ThumbHeight*imageW/imageH);
if (params.ThumbHeight==0)
	params.ThumbHeight=Math.floor(params.ThumbWidth*imageH/imageW);

// prepare fonts
params.fontFamily = 'Arial';
if(this['fonts'] && params.font && fonts[params.font]) {
	params.fontFamily = fonts[params.font].family || params.fontFamily;
	
	// import google font
	if(fonts[params.font]['import']) {
		params.addCss += '@import url(' + fonts[params.font]['import'] + ');';
	}
}

params.bodyMargin = 'auto';
params.contMaxWidth = params.ImageWidth+'px';
params.contMaxHeight = params.ImageHeight+'px';

// full width/page params
if(params.SizeStyle > 1) {
	params.bodyMargin = 0;
	params.contMaxWidth = '100%';

	// when full page
	if(params.SizeStyle == 3)
		params.contMaxHeight = 'none';
}


//params.ImageFillColor = params.ImageFillColor || '#FFFFFF';
params.TooltipPos = params.TooltipPos || 'top';
if (params.OrderRandom) params.OnBeforeStep = "function(i,c){return (i+1 + Math.floor((c-1)*Math.random()))}";
else params.OnBeforeStep = 0;


var preloader = params.Preloader || params.ImageCount>100;

/*
if (preloader){
	// use only whole persent
	var enPercent = [1,2,4,5,10,20,50,100];
	var liWidth   = 100/params.ImageCount;
	var i=0;
	while(i<enPercent.length && liWidth>enPercent[i])
		i++
	liWidth = enPercent[Math.max(i,enPercent.length-1)];
	
	params.liWidth = liWidth; 
	params.ulWidth = 100/liWidth preloader? "100%": params.ImageCount + "00%";
}
else{
	params.liWidth = 100; 
	params.ulWidth = "100%";
}*/

// flies to export
var files = [];
files.push({ src: 'common/common.css', 												dest: '$CssPath$style.css', 'filters': ['params'] });
if(params.FullScreen) {
	files.push({ src: 'common/fullscreen/fullscreen.css',dest: '$CssPath$style.css', 'filters': ['params'] });
	files.push(	{ 'src': 'common/fullscreen/fullscreen.eot', 'dest': '$CssPath$fullscreen.eot' } );
	files.push(	{ 'src': 'common/fullscreen/fullscreen.svg', 'dest': '$CssPath$fullscreen.svg' } );
	files.push(	{ 'src': 'common/fullscreen/fullscreen.ttf', 'dest': '$CssPath$fullscreen.ttf' } );
	files.push(	{ 'src': 'common/fullscreen/fullscreen.woff', 'dest': '$CssPath$fullscreen.woff' } );
}

files.push({ src: 'backgnd/'+params.TemplateName+'/style.css', 						dest: '$CssPath$style.css', 'filters': ['params'] });
files.push({ src: 'backgnd/'+params.TemplateName+'/style-'+params.TooltipPos+'.css',dest: '$CssPath$style.css', 'filters': ['params'] });
files.push({ src: 'backgnd/'+params.TemplateName+'/style-descr-'+(params.CaptionsEffect=='move'||params.CaptionsEffect=='parallax'||params.CaptionsEffect=='traces'?'separate.css':'default.css'), 
																					dest: '$CssPath$style.css', 'filters': ['params'] });

if (params.Thumbnails){
	files.push( { 'src': 'common/style-thumb.css', 							'dest': '$CssPath$style.css', 'filters': ['params'] } );
	files.push( { 'src': 'common/style-thumb-'+params.ThumbAlign+'.css', 	'dest': '$CssPath$style.css', 'filters': ['params'] } );
	files.push( { 'src': 'backgnd/'+params.TemplateName+'/style-thumb.css', 'dest': '$CssPath$style.css', 'filters': ['params'] } );
}

// iframe
if (params.PublishType != "facebook")
	files.push({ src: 'common/iframe.html', 											dest: 'iframe_'+params.PublishIndex, 'filters': ['params'] });


// css3 effects
// reinit params
if (params.AutoPlay){
	params.FullDur = (params.ImageCount * (parseFloat(params.SlideshowDuration) + parseFloat(params.SlideshowDelay)))/10;// in sec
	params.keyframes = ''
	for (var i=0; i<params.ImageCount; i++){
		params.keyframes += Math.round((params.SlideshowDuration*i + params.SlideshowDelay*i    )*1000/params.FullDur)/100 + "%{left:-"+i*100+"%} "
						+	Math.round((params.SlideshowDuration*i + params.SlideshowDelay*(i+1))*1000/params.FullDur)/100 + "%{left:-"+i*100+"%} ";
	}
	if(!preloader) files.push({ 'src': 'common/noscript.css', 'dest': '$CssPath$style.css', 'filters': ['params'] });
}


var scriptOut = '$JsPath$script.js';
var wowsliderJs='$JsPath$wowslider.js';
var indexHTML = params.PublishIndex;
if (params.PublishType == "wordpress"){
	files.push({ 'src': 'wordpress/wowslider', dest: 'wowslider' });
	files.push({ 'src': 'wordpress/slider.html',	'dest': 'wowslider/install/slider.html', 'filters': ['params'] });
	//scriptOut = 'install/script.js';
	wowsliderJs = scriptOut;
}
else{
	files.push({ 'src': 'common/js/jquery.js' });
}

// copy engine
files.push({ 'src': 'common/js/wowslider.js', dest: wowsliderJs, 'filters': ['params'] });

// extensions
files.push({ 'src': 'common/js/wowslider.mod.js', dest: '$JsPath$wowslider.mod.js'});
files.push({ 'src': 'common/mod/style.mod.css', 'dest': '$CssPath$style.mod.css', 'filters': ['params'] } );

if (params.PublishType == "joomla"){
	var jooFolder = (params.JoomlaType=="1.5"? "joomla": "joomla25");
	files.push({ src: jooFolder + "/index.html",		dest: "tmpl/index.html" });
	files.push({ src: jooFolder + "/index.html", 		dest: "index.html" });
	files.push({ src: jooFolder + "/default.php", 		dest: "tmpl/default.php", 'filters': ['params'] });
	files.push({ src: jooFolder + "/mod_wowslider.xml", dest: "mod_wowslider"+params.GallerySuffix+".xml", 'filters': ['params'] });
	files.push({ src: jooFolder + "/mod_wowslider.php", dest: "mod_wowslider"+params.GallerySuffix+".php", 'filters': ['params'] });
}

// video
if (params.Video) {
	files.push({ 'src': 'common/js/wowslider.video.js', dest: (params.PublishType == "wordpress"? scriptOut: wowsliderJs) });
	files.push({ 'src': 'common/playvideo.png' });
}


// preloader
if (preloader){
	files.push({ 'src': 'common/js/wowslider.preloader.js', dest: (params.PublishType == "wordpress"? scriptOut: wowsliderJs) });
	files.push(	{ 'src': 'common/loading.gif', dest: '$ImgPath$loading.gif' } );
	
	params.loadingMargin = ((params.ThumbHeight-11)>>1) + 'px ' + ((params.ThumbWidth-43)>>1) + 'px'  //43*11 - size of loading.gif
	files.push({ 'src': 'common/loading.css', 'dest': '$CssPath$style.css', 'filters': ['params'] });
}

// caption effects
if (params.Captions && params.CaptionsEffect) {
	files.push({ 'src': 'captions/'+params.CaptionsEffect+'.js', dest: (params.PublishType == "wordpress"? scriptOut: wowsliderJs) });
}

// add effects and additional scripts for some effects
var effects = (params.ImageEffect||'blinds').split(",");
for (var ei=0; ei<effects.length; ei++)
{
	var effect = effects[ei];
	
	if (effect == 'squares')
		files.push(	{ 'src': 'effects/squares/coin-slider.js', dest: scriptOut } );
	if (effect == 'flip')
		files.push(	{ 'src': 'effects/flip/jquery.2dtransform.js', dest: scriptOut } );
	if (effect == 'rotate')
		files.push(	{ 'src': 'effects/rotate/jquery.2dtransform.js', dest: scriptOut } );
	if (effect == 'page')
		files.push(	{ 'src': 'effects/rotate/jquery.2dtransform.js', dest: scriptOut } );
		//files.push(	{ 'src': 'effects/page/jquery.transform2d.js', dest: scriptOut } );

	files.push(	{ 'src': 'effects/'+effect+'/script.js', dest: scriptOut, 'filters': ['params'] } );
}

files.push({ 'src': 'common/js/script_start.js', dest: scriptOut, 'filters': ['params'] });


// sound support
if (params.SoundEnable && params.SoundFileName){
	files.push({ 'src': params.SoundFileName,	'dest': '$JsPath$'+params.sound});
	files.push({ 'src': 'common/js/player_mp3_js.swf',	'dest': '$JsPath$player_mp3_js.swf' });
	files.push({ 'src': 'common/js/swfobject.js' });
}


// this function will called after template script
var border = {top: 0, right: 0, bottom: 0, left: 0 };
var thumbs = {margin: 0, padding: 0};
function finalize(){
	// correct margin with frame border
	if (!parseInt(params.noFrame)){
		params.backMarginsTop    += border.top;
		params.backMarginsBottom += border.bottom;
	}
	
	//correct margin with thumbnails height
	if (params.Thumbnails){
		thumbs.margin  = thumbs.margin  || 0;
		thumbs.padding = thumbs.padding || 0;
		var count = parseInt(params.ImageCount);
		var thumbFullWidth  = (thumbs.margin + thumbs.padding)*2+parseInt(params.ThumbWidth ); // in px
		var thumbFullHeight = (thumbs.margin + thumbs.padding)*2+parseInt(params.ThumbHeight);
		
		// thumb padding, margin in percent
		if (params.ThumbAlign=="top" || params.ThumbAlign=="bottom")
			params.thumbParentWidth = Math.ceil(thumbFullWidth*count);
		else 
			params.thumbParentWidth = Math.ceil(thumbFullWidth);
		
		params.thumbMargin = (100*thumbs.margin/params.thumbParentWidth).toFixed(2);
		params.thumbPadding = (100*thumbs.padding/params.thumbParentWidth).toFixed(2);

		if(params.ThumbAlign=="top" || params.ThumbAlign=="bottom")
			params.thumbOnePercent = 100/count-2*params.thumbMargin-2*params.thumbPadding; 
		else
			params.thumbOnePercent = 100-2*params.thumbMargin-2*params.thumbPadding;
	
		params.thumbFullWidthPercent  = (100*thumbFullWidth/params.fullWidth).toFixed(2);
		params.thumbFullHeightPercent = (100*thumbFullHeight/params.fullHeight).toFixed(2);
		
		params.thumbContWidthPercent  = (params.thumbFullWidthPercent*count).toFixed(2);
		params.thumbContHeightPercent = (params.thumbFullHeightPercent*count).toFixed(2);
		
		if (isNaN(params.thumbMarginWidth)){
			params.thumbMarginWidth   = thumbFullWidth + 5 + border.left;//+gap
			params.thumbMarginWidthPercent   = (100*params.thumbMarginWidth/params.fullWidth).toFixed(2);
		}
		if (isNaN(params.thumbMarginHeight)){
			params.thumbMarginHeight  = thumbFullHeight + 5 + border.top;
			params.thumbMarginHeightPercent   = (100*params.thumbMarginHeight/params.fullHeight).toFixed(2);
		}

		if (params.ThumbAlign=="top")
			params.backMarginsTop    += params.thumbMarginHeight;
		if (params.ThumbAlign=="bottom")
			params.backMarginsBottom += params.thumbMarginHeight;
	}
	
	params.bulframeImageWidth = 100/parseInt(params.ImageCount);
	
	params.fullHeight += Math.max(params.backMarginsBottom, Math.max(-params.BulletsBottom||0, params.ShadowH||0)) + params.backMarginsTop;
	params.fullWidth  += Math.max(Math.max((!parseInt(params.noFrame)? border.right:0) + (!parseInt(params.noFrame)? border.left:0), params.addWidth||0), params.ShadowW||0);
	if (/left|right/.test(params.ThumbAlign))
		params.fullWidth  += params.thumbMarginWidth;
	
	params.PageBgColor = params.PageBgColor || "transparent";
}