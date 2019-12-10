/* config.js */

slideshow_css = '$CssPath$style.css';

thumbs = {margin: 3, padding: 5};
if (!parseInt(params.noFrame)){
	params.ContaienerH = imageH + backMargins.top + backMargins.bottom;
	params.ShadowH = Math.round(params.ContaienerH*0.2);
	params.pShadowH = Math.round(100*params.ShadowH/params.ImageHeight);
	files.push( { 'src': 'backgnd/'+params.TemplateName+'/style-shadow.css', 'dest': '$CssPath$style.css', 'filters': ['params'] } );
	files.push({ 'src': 'backgnd/'+params.TemplateName+'/shadow.png', 'filters': [ { 'name': 'resize', 'width': params.ImageWidth, 'height': params.ShadowH } ] });
	
	params.BulletsBottom = -35;
}
else{
	params.BulletsBottom = 5;
}

params.decorW = params.ImageWidth - 8*2;
params.decorH = params.ImageHeight - 8*2;

files.push({ 'src': 'backgnd/'+params.TemplateName+'/bullet.png' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/arrows.png' });
files.push({ 'src': 'common/index.html', 'filters': ['params'] });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/play.png' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/pause.png' });


if (params.ShowTooltips){
	params.ThumbWidthHalf = Math.round(params.ThumbWidth/2);
	files.push(	{ 'src': 'backgnd/'+params.TemplateName+'/triangle-'+params.TooltipPos+'.png', dest: '$ImgPath$triangle.png' } );
	files.push( { 'src': 'backgnd/'+params.TemplateName+'/style-tooltip.css', 'dest': slideshow_css, 'filters': ['params'] } );
}


// call this function at the end of each template
finalize();