window.onload = function ()
{

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: "Prevalence of different types of mental\n" +
                "disorders in the past 12 months in 4-17 year-olds",
            fontSize: 20,
        },
        axisY: {
            title: "Prevalence (%)",
        },
        data: [{
            type: "column",
            // showInLegend: true,
            // legendMarkerColor: "grey",
            // legendText: "MMbbl = one million barrels",
            dataPoints: [
                {y: 7.4, label: "ADHD" , indexLabel: " 7.4"},
                {y: 2.1, label: "Conduct Disorder" , indexLabel: " 2.1"},
                {y: 6.9, label: "Anxiety Disorder" , indexLabel: " 6.9"},
                {y: 2.8, label: "Major Depressive Disorder" , indexLabel: " 2.8"}
            ]
        }]
    });
    chart.render();

    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: " Prevalence of mental disorders in the\n" +
                "past 12 months in 4-17 year-olds by sex and age\n" +
                "group ",
            fontSize: 20,
        },
        axisY: {
            title: "Prevalence (%)",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Males",
            legendText: "Males",
            showInLegend: true,
            dataPoints:[
                { label: "4-11 years", y: 16.5 , indexLabel: " 16.5"},
                { label: "12-17 years", y: 15.9 , indexLabel: " 15.9"},
            ]
        },
            {
                type: "column",
                name: "Females",
                legendText: "Females",
                showInLegend: true,
                dataPoints:[
                    { label: "4-11 years", y: 10.6 , indexLabel: " 10.6"},
                    { label: "12-17 years", y: 12.8 , indexLabel: " 12.8"},
                ]
            }]
    });
    chart1.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart1.render();
    }


    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Severity of different types of mental\n" +
                "disorders experienced by 4-17 year-olds in the\n" +
                "past 12 months ",
            fontSize: 20,
        },
        axisY: {
            title: "Prevalence (%)",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        data: [
            {
            type: "column",
            name: "Mild",
            legendText: "Mild",
            showInLegend: true,
            dataPoints:[
                {label: "ADHD", y: 4.9 , indexLabel: " 4.9"},
                {label: "Conduct Disorder", y: 1.2, indexLabel: " 1.2"},
                {label: "Anxiety Disorder", y: 3.7, indexLabel: " 3.7"},
                {label: "Major Depressive Disorder", y: 0.6, indexLabel: " 0.6"},
            ]
        },
            {
                type: "column",
                name: "Moderate",
                legendText: "Moderate",
                showInLegend: true,
                dataPoints:[
                    {label: "ADHD", y: 1.8 , indexLabel: " 1.8"},
                    {label: "Conduct Disorder", y: 0.5, indexLabel: " 0.5"},
                    {label: "Anxiety Disorder", y: 1.9, indexLabel: " 1.9"},
                    {label: "Major Depressive Disorder", y: 1.0, indexLabel: " 1.0"},
                ]
            },
            {
                type: "column",
                name: "Severe",
                legendText: "Severe",
                showInLegend: true,
                dataPoints:[
                    {label: "ADHD", y: 0.8 , indexLabel: " 0.8"},
                    {label: "Conduct Disorder", y: 0.4 , indexLabel: " 0.4"},
                    {label: "Anxiety Disorder", y: 1.3 , indexLabel: " 1.3"},
                    {label: "Major Depressive Disorder", y: 1.2, indexLabel: " 1.2"},
                ]
            }
        ]


    });
    chart2.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart2.render();
    }

    var chart3 = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text:"Need for different types of help in the\n" +
                "past 12 months in 4-17 year-olds with mental\n" +
                "disorder",
            fontSize: 20,
        },
        axisX:{
            interval: 1
        },
        axisY2:{
            interlacedColor: "rgba(1,77,101,.2)",
            gridColor: "rgba(1,77,101,.1)",
            title: "Proportion (%) of those with a need for help"
        },
        data: [{
            type: "bar",
            name: "Helps",
            axisYType: "secondary",
            color: "#60c783",
            dataPoints: [
                { y: 41.7, label: "Information" , indexLabel: " 41.7"},
                { y: 22.3, label: "Medication" , indexLabel: " 22.3"},
                { y: 68.1, label: "Counselling" , indexLabel: " 68.1"},
                { y: 36.0, label: "Life Skills" , indexLabel: " 36.0"},
            ]
        }]
    });
    chart3.render();

    var chart4 = new CanvasJS.Chart("chartContainer4", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: "Students using health service \n" +
            "provider services in the past 12 months who \n" +
           "were referred by their school",
            fontSize: 20,
        },
        axisY: {
            title: "Proportion (%)",
        },
        data: [{
            type: "column",
            dataPoints: [
                {y: 15.8, label: "General Practitioner" , indexLabel: " 15.8"},
                {y: 25.3, label: "Paediatrician" , indexLabel: " 25.3"},
                {y: 17.0, label: "Psychiatrist" , indexLabel: " 17.0"},
                {y: 16.9, label: "Psychologist" , indexLabel: " 16.9"},
                {y: 22.6, label: "Any Health Service Provider" , indexLabel: " 22.6"},
            ]
        }]
    });
    chart4.render();

    var chart5 = new CanvasJS.Chart("chartContainer5", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Self harm in the past 12 months in 12 -\n" +
                "17 year-olds by sex and age group",
            fontSize: 20,
        },
        axisY: {
            title: "Proportion (%)",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Males",
            legendText: "Males",
            showInLegend: true,
            dataPoints:[
                { label: "12-15 years", y: 3.0 , indexLabel: " 3.0"},
                { label: "16-17 years", y: 6.2 , indexLabel: " 6.2"},
            ]
        },
            {
                type: "column",
                name: "Females",
                legendText: "Females",
                showInLegend: true,
                dataPoints:[
                    { label: "12-15 years", y: 9.8 , indexLabel: " 9.8"},
                    { label: "16-17 years", y: 16.8 , indexLabel: " 16.8"},
                ]
            }]
    });
    chart5.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart5.render();
    }

};