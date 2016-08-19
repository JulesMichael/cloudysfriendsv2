<?php
echo "<script type=\"text/javascript\">
    $(function () {
    $('#g').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Vue'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
                month: '%e. %b',
                year: '%b'
            },
            title: {
                text: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Nombre de vues'
            },
            min: 0
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
            pointFormat: '{point.x:%e. %b}: {point.y} vues'
        },

        plotOptions: {
            spline: {
                marker: {
                    enabled: true
                }
            }
        },

        series: [{
            name: 'Vues par chargement de page',
            
            data: [";
            
            $statistiques = $stats->vues($projet["id"]);
            foreach ($statistiques as $stat){
                //var_dump($stat);
                echo "[Date.UTC(".date('Y,m-1,d,H,i,s', $stat["time"])."),".count($stats->vues($projet["id"],$timestamp=$stat["time"]))."]";
                if(end ($statistiques) != $stat){
                    echo ",\n";
                }
            }    
            
                echo "\n
            ]
        }]
    });
});</script>";



            
            
            

echo '<div id="g" style="margin: 0 auto"></div>';
?>