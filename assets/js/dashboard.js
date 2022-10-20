$(function() {
    $('.chart').easyPieChart({
        animate:{
            duration:1500,
            enabled:true
        },
        barColor:'#e74c3c',
        trackColor: '#eeeeee',
        scaleColor: '#666666',
      size:150,
        lineWidth:10,
        lineCap:'circle'
    });
});