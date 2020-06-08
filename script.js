	function oncreate () {

    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light1", // "light2", "dark1", "dark2"
        animationEnabled: false, // change to true
        title:{
            text: "Temperaturen"
        },
        axisY:{
            title: "Celsius"
        },
        axisX:{
            title: "Tijd"
        },
        data: [{
            // Change type to "bar", "area", "spline", "pie",etc.
            type: "column",
            dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
},{
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "column",
            dataPoints: <?php echo json_encode($data2, JSON_NUMERIC_CHECK); ?>
    }]
});
    chart.render();

}