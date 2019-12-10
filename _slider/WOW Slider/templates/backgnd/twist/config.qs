/* config.js */
params.PageBgColor = params.PageBgColor||"#d7d7d7";

slideshow_css = '$CssPath$style.css';
thumbs = {margin: 3, padding: 1};

params.addCss += '@font-face {\n'
+ '	font-family: "fontello";\n'
+ '	src: url("fontello.eot");\n'
+ '	src: url("fontello.eot#iefix") format("embedded-opentype"),\n'
+ '			url("fontello.woff") format("woff"),\n'
+ '			url("fontello.tt?") format("truetype"),\n'
+ '			url("fontello.svg") format("svg");\n'
+ '	font-weight: normal;\n'
+ '	font-style: normal;\n'
+ '}\n';

files.push({ 'src': 'common/index.html', 'filters': ['params'] });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/fontello.eot', dest: '$CssPath$fontello.eot' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/fontello.svg', dest: '$CssPath$fontello.svg' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/fontello.ttf', dest: '$CssPath$fontello.ttf' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/fontello.woff', dest: '$CssPath$fontello.woff' });


if (params.ShowTooltips){
	params.ThumbWidthHalf = Math.round(params.ThumbWidth/2);
	files.push( { 'src': 'backgnd/'+params.TemplateName+'/style-tooltip.css', 'dest': slideshow_css, 'filters': ['params'] } );
}


// call this function at the end of each template
finalize();