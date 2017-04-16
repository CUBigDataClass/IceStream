/* Copyright (c) 2014 by Jean-Marc.Viglino [at]ign.fr
* Dual-licensed under the CeCILL-B Licence (http://www.cecill.info/)
* and the Beerware license (http://en.wikipedia.org/wiki/Beerware),
* feel free to use and abuse it in your projects (the code, not the beer ;-).
*/

/**
 *
 * @requires OpenLayers/SingleFile.js
 * @requires OpenLayers/Util/vendorPrefix.js
 */

/**
 * Function: OpenLayers.Feature.Vector.bounce
 * Animate a point feature width drop and bounce effect.
 *
 * Parameters:
 *	mode - {OpenLayers.BounceEffect} bounce | shake | drop | fall | slide | slip | throw
 *	options
 *	{	render <String> default : 'default'
 *		bounce <Integer> default : 3
 *		amplitude <Integer> default : 40
 *		duration <Integer> default : 40(bounce)
 *	}
 */
 OpenLayers.BounceEffect =  (function()
 {	// Animation function
	function bouncingMarker (feature, options)
	{	if (!feature || !feature.geometry || feature.geometry.CLASS_NAME!="OpenLayers.Geometry.Point") return;
		if (!options) options = {};
		var render = options.render ||'default';
		var duration = options.duration || 40;
		var bounce = options.bounce || 3;
		var amplitude = options.amplitude || 40;
		var layer = feature.layer;
		var animationTween = new OpenLayers.Tween(OpenLayers.Easing.Linear.easeIn);
		var ll = new OpenLayers.LonLat(feature.geometry.x, feature.geometry.y);
		var pt = layer.map.getPixelFromLonLat(ll);
		var dx = pt.x;
		var dy = pt.y;
		// Animation style (based on the graphicYOffset)
		var i=0;
		while (layer.styleMap.styles['anim'+i]) i++;
		var animStyle = 'anim'+i;
		layer.styleMap.styles[animStyle] = layer.styleMap.styles[render].clone();
		var style = layer.styleMap.styles[animStyle].defaultStyle;
		var goffsetx = style.graphicXOffset==null ? -style.pointRadius : style.graphicXOffset;
		var goffsety = style.graphicYOffset==null ? -style.pointRadius : style.graphicYOffset;
		var bgoffsetx = style.backgroundXOffset==null ? -style.pointRadius : style.backgroundXOffset;
		var bgoffsety = style.backgroundYOffset==null ? -style.pointRadius : style.backgroundYOffset;
		var start = 0;
		switch (options.mode)
		{	case 'drop':
			case 'fall':
			case 'slide':
			case 'slip':
				if (options.mode=='drop' || options.mode=='fall') dx = 0;
				else dy = 0;
			case 'throw':
				start = -Math.sqrt(dx*dx+dy*dy)/500;
				dx /= start;
				dy /= start;
				break;
			case 'bounce':
			case 'shake':
			default:
				start = 0;
				break;
		}
		duration -= duration * start;

		animationTween.start ( { pos:start }, {pos:1.0}, duration,
		{	callbacks:
			{	eachStep: function (delta)
				{	if (!feature.layer) return;
					if (feature.renderIntent != animStyle)
					{	render = feature.renderIntent;
						feature.renderIntent = animStyle;
					}
					// Drop the marker
					if (delta.pos <= 0)
					{	if (dx)
						{	if (options.mode=='throw')
							{	style.graphicXOffset = goffsetx + dx*delta.pos*delta.pos;
								style.backgroundXOffset = bgoffsetx + dx*delta.pos*delta.pos;
							}
							else
							{	style.graphicXOffset = goffsetx - dx*delta.pos;
								style.backgroundXOffset = bgoffsetx - dx*delta.pos;
							}
						}
						if (options.mode!='slide')
						{	style.graphicYOffset = goffsety - 2*dy*delta.pos;
						}
					}
					// Bounce
					else
					{	var t ;
						if (options.mode=='slip')
						{	t = Math.sin(bounce*Math.PI*delta.pos);
							style.graphicXOffset = goffsetx +amplitude * t *(1-delta.pos);;
							style.backgroundXOffset = bgoffsetx +amplitude * t *(1-delta.pos);;
							style.graphicYOffset = goffsety
						}
						else
						{	style.graphicXOffset = goffsetx;
							style.backgroundXOffset = bgoffsetx;
							if (options.mode == 'shake') t = Math.sin(bounce*Math.PI*delta.pos);
							else if (options.mode == 'fall') t = - Math.sin(bounce*Math.PI*delta.pos);
							else t = Math.abs( Math.sin(bounce*Math.PI*delta.pos) );
							style.graphicYOffset = goffsety -amplitude * t *(1-delta.pos);
						}
					}
					layer.redraw()
				},
				done: function (delta)
				{	delete layer.styleMap.styles[animStyle];
					if (!feature.layer) return;
					if (feature.renderIntent == animStyle) feature.renderIntent = render;
					layer.redraw();
				}
			}
		});
	}

	// Extend vector feature
	OpenLayers.Feature.Vector.prototype.bounce = function(mode, options)
	{	if (!options) options = { mode : OpenLayers.BounceEffect.BOUNCE };
		if (mode) options.mode = mode;
		bouncingMarker(this, options);
	}

	// List of effects
	return { 'DROP':"drop", 'FALL':"fall", 'SLIDE':"slide", 'SLIP':"slip", 'THROW':"throw", 'BOUNCE':"bounce", 'SHAKE':"shake" };

 })();
