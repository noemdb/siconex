/*!
 * ChartFunction.js
 * http://noemdb.org/
 * Version: 1.0.0
 *
 * Copyright 2017 Noe Dominguez
 * Released under the MIT license
 * https://github.com/noemdb/ChartFunction.js/blob/master/LICENSE.md
 * Funciones para la realizacion de chart usando la libreria Chart.js
 */

//Evento clic para el panel de tab nav-tabs (menu con las opciones)
$('nav.ranges a').click(function(e){
    e.preventDefault();
    // Get the number of range from the data attribute
    var el = $(this);
    var range = $(this).data('range'); //console.log('range: '+range);
    var nav = $(this).parents('nav'); //console.log('nav: '+nav);
    var canvas = nav.data('canvas'); //console.log('canvas: '+canvas);
    var api = nav.data('urlapi'); //console.log('urlapi: '+api);
    var tipo = nav.data('tipo'); //console.log('tipo: '+tipo);
    var limit = nav.data('limit'); //console.log('limit: '+limit);
    var legend = nav.data('legend'); //console.log('legend: '+legend);

    // Request the data and render the chart using our handy function
    requestData(range,canvas,api,tipo,limit,legend);
    // Make things pretty to show which button/tab the user clicked
    el.parent().addClass('active');
    el.parent().siblings().removeClass('active');

});