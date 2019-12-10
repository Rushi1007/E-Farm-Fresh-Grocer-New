/* config.js */
params.PageBgColor = params.PageBgColor||"#d7d7d7";

slideshow_css = '$CssPath$style.css';
thumbs = {margin: 3, padding: 1};

params.addCss += '@font-face {\n'
+ '	font-family: "controls";\n'
+ '	src: url("controls.eot");\n'
+ '	src: url("controls.eot#iefix") format("embedded-opentype"),\n'
+ '			url("controls.woff") format("woff"),\n'
+ '			url("controls.tt?") format("truetype"),\n'
+ '			url("controls.svg") format("svg");\n'
+ '	font-weight: normal;\n'
+ '	font-style: normal;\n'
+ '}\n';

files.push({ 'src': 'common/index.html', 'filters': ['params'] });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/controls.eot', dest: '$CssPath$controls.eot' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/controls.svg', dest: '$CssPath$controls.svg' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/controls.ttf', dest: '$CssPath$controls.ttf' });
files.push({ 'src': 'backgnd/'+params.TemplateName+'/fonts/controls.woff', dest: '$CssPath$controls.woff' });


if (params.ShowTooltips){
	params.ThumbWidthHalf = Math.round(params.ThumbWidth/2);
	files.push( { 'src': 'backgnd/'+params.TemplateName+'/style-tooltip.css', 'dest': slideshow_css, 'filters': ['params'] } );
}


// call this function at the end of each template
finalize();