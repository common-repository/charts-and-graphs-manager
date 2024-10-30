<?php
function CAGM_addallchart($attr){
    //print_r($attr['id']);
    ob_start();
    $post_multi_id = explode(",",$attr['id']);
    //print_r($post_multi_id);

    foreach ($post_multi_id as $postdatas) {
        //print_r($postdatas);
        $postmid = explode(",",$postdatas);
       //print_r($postmid);
            $linemulti_chart =  get_post_field('line_chart', $postmid[0]);
            $mulposttypeess = get_post_field('scatter_chart', $postmid[0]);
            $chartrt_labels =  get_post_field('chart', $postmid[0]);
            $chartrt_types =  get_post_field('chart_types', $postmid[0]);
            $chartrt_title_label =  get_post_field('chart_title_label', $postmid[0]);
            $bubblechartrt = get_post_field('bubble_chart', $postmid[0]);
            $bar_titlesul_label = get_post_field('bar_title_label', $postmid[0]);
            $doughnut_titlesee_label = get_post_field('doughnut_title_label', $postmid[0]);
            $polarArea_titlesese_label = get_post_field('polarArea_title_label', $postmid[0]);
            $doughnut_hoversetset = get_post_field('doughnut_hoverset', $postmid[0]);
            $bar_chartrtrt =  get_post_field('bar_chart', $postmid[0]);
            $doughnut_charted =  get_post_field('doughnut_chart', $postmid[0]);
            $polarAreaa_charted =  get_post_field('polarArea_chart', $postmid[0]);
            $bubble_charted_title =  get_post_field('bubble_chart_title', $postmid[0]);
            $scatter_charted_title =  get_post_field('scatter_chart_title', $postmid[0]);
            $line_chart_tension =  get_post_field('line_chart_tension', $postmid[0]);
            $bubbless_backcolor =  get_post_field('bubble_backcolor', $postmid[0]);
            $scatterss_backcolor =  get_post_field('scatter_backcolor', $postmid[0]);
            $linesss_bordercolor =  get_post_field('line_bordercolor', $postmid[0]);
            $charted_filled =  get_post_field('chart_fill', $postmid[0]);
            $line_chart_title =  get_post_field('line_charttitle', $postmid[0]);
        // echo "<pre>";
        // print_r($bubblechartrt);
        // echo "</pre>";
        if(isset($bubblechartrt['fxserise'])){
            $fxserise = $bubblechartrt['fxserise'];
        }else{
            $fxserise = "";
        }
        if(isset($bubblechartrt['fyserise'])){
            $fyserise = $bubblechartrt['fyserise'];
        }else{
            $fyserise = "";
        }
        if(isset($bubblechartrt['frserise'])){
            $frserise = $bubblechartrt['frserise'];
        }else{
            $frserise = "";
        }
        if(isset($bubblechartrt['fxdata'])){
            $fxdata = $bubblechartrt['fxdata'];
        }else{
            $fxdata = "";
        }
        if(isset($bubblechartrt['fydata'])){
            $fydata = $bubblechartrt['fydata'];
        }else{
            $fydata = "";
        }
        if(isset($bubblechartrt['frdata'])){
            $frdata = $bubblechartrt['frdata'];
        }else{
            $frdata = "";
        }
        
        if (is_countable($fxserise) && count($fxserise) > 0) {
            $arr = array();
            for ($index = 0; $index < count($fxserise); $index++) {
                $arr[$index] = "{". $fxserise[$index].":".$fxdata[$index].",".$fyserise[$index].":".$fydata[$index].",".$frserise[$index].":".$frdata[$index]."}";
            }
            $resultss = implode(",", $arr);
        }
        //print_r($result);
        // print_r($bubblechart['fxdata']);
        if(isset($mulposttypeess['scatter_xserise'])){
            $scatter_xserise = $mulposttypeess['scatter_xserise'];
        }else{
            $scatter_xserise = "";
        }
        if(isset($mulposttypeess['scatter_xdata'])){
           $scatter_xdata = $mulposttypeess['scatter_xdata'];
        }else{
            $scatter_xdata = "";
        }
        if(isset($mulposttypeess['scatter_yserise'])){
           $scatter_yserise = $mulposttypeess['scatter_yserise'];
        }else{
            $scatter_yserise = "";
        }
        if(isset($mulposttypeess['scatter_ydata'])){
            $scatter_ydata = $mulposttypeess['scatter_ydata'];
        }else{
            $scatter_ydata = "";
        }
        
        
        
        if (is_countable($scatter_xserise) && count($scatter_xserise) > 0) {
            $sca_arr = array();
            for ($sca = 0; $sca < count($scatter_xserise); $sca++) {
                $sca_arr[$sca] = "{". $scatter_xserise[$sca].":".$scatter_xdata[$sca].",".$scatter_yserise[$sca].":".$scatter_ydata[$sca] ."}";
            }

            $scadataresulter = implode(",", $sca_arr);
        }


        if($chartrt_types == 'bubble'){
            ?>
                <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
                <script>
                                   
                    var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                    var myChart = new Chart(ctx, {

                        type: '<?php echo esc_attr($chartrt_types); ?>',
                        data: {
                            datasets: [{
                                label: '<?php echo esc_attr($bubble_charted_title); ?>',
                                data: [
                                  <?php echo esc_attr($resultss); ?>
                                ],
                                backgroundColor: '<?php echo esc_attr($bubbless_backcolor);  ?>',
                              }]
                        },
                        options: {
                            // scales: { 
                            // x: {
                            //     grid: {
                            //       tickColor: 'red'
                            //     },
                            //     ticks: {
                            //       color: 'blue',
                            //     }
                            //   }
                            // }
                        }
                    });
                </script>
            <?php
        }
        if($chartrt_types == 'scatter'){
            ?>
            <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
            <script>
                               
                var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chartrt_types); ?>',
                    data: {
                        datasets: [{
                            label: '<?php echo esc_attr($scatter_charted_title); ?>',
                            data: [
                              <?php echo esc_attr($scadataresulter); ?>
                            ],
                            backgroundColor: '<?php echo esc_attr($scatterss_backcolor);  ?>',
                          }]
                    },
                    options: {
                        // scales: { 
                        // x: {
                        //     grid: {
                        //       tickColor: 'red'
                        //     },
                        //     ticks: {
                        //       color: 'blue',
                        //     }
                        //   }
                        // }
                    }
                });
            </script>

            <?php
        }
        if($chartrt_types == 'pie'){ 
            ?>
                <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
                <script>
                    var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                    var myChart = new Chart(ctx, {

                        type: '<?php echo esc_attr($chartrt_types); ?>',
                        data: {
                            labels: ['<?php echo implode("','",array_map('esc_attr',$chartrt_labels['chart_label'])); ?>'],
                            datasets: [{
                                label: '<?php echo esc_attr($chartrt_title_label); ?>',
                                data: [<?php echo implode(',', array_map('esc_attr',$chartrt_labels['chart_data'])); ?>],// phpcs:ignore WordPress.Security.EscapeOutput?>,
                                backgroundColor: ['<?php echo implode("','", array_map('esc_attr',$chartrt_labels['chart_backgroundcolor'])); ?>'],
                                borderColor: ['<?php echo implode("','", array_map('esc_attr',$chartrt_labels['chart_bordercolor'])); ?>'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            
                        }
                    });
                </script>
            <?php
        }
        if ($chartrt_types == 'line') {
            ?>
                <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
                <script>
                    var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                    var myChart = new Chart(ctx, {

                        type: '<?php echo esc_attr($chartrt_types); ?>',
                        data: {
                            labels: ['<?php echo implode("','",array_map('esc_attr',$linemulti_chart['linechart_label'])); ?>'],
                            datasets: [{
                                label: '<?php echo esc_attr($line_chart_title); ?>',
                                data: [<?php echo implode(",", array_map('esc_attr',$linemulti_chart['linechart_data']));  ?>],
                                fill: <?php echo esc_attr($charted_filled); ?>,
                                borderColor: '<?php echo esc_attr($linesss_bordercolor); ?>',
                                tension: <?php echo esc_attr($line_chart_tension); ?>
                            }]
                        },
                        options: {
                            // scales: { 
                            // x: {
                            //     grid: {
                            //       tickColor: 'red'
                            //     },
                            //     ticks: {
                            //       color: 'blue',
                            //     }
                            //   }
                            // }
                        }
                    });
                </script>
            <?php
        }
        if ($chartrt_types == 'bar') {
            ?>
                <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
                <script>
                    var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                    var myChart = new Chart(ctx, {

                        type: '<?php echo esc_attr($chartrt_types); ?>',
                        data: {
                          labels: ['<?php echo implode("','",array_map('esc_attr',$bar_chartrtrt['bar_chart_label'])); ?>'],
                          datasets: [{
                                label: '<?php echo esc_attr($bar_titlesul_label); ?>',
                                data: [<?php echo implode(',', esc_attr($bar_chartrtrt['bar_chart_data'])); ?>],
                                backgroundColor: ['<?php echo implode("','", array_map('esc_attr',$bar_chartrtrt['bar_backgroundcolor'])); ?>'],
                                borderColor: ['<?php echo implode("','", array_map('esc_attr',$bar_chartrtrt['bar_bordercolor'])); ?>'],
                                borderWidth: 1
                              }]
                        },
                        options: {
                            // scales: { 
                            // x: {
                            //     grid: {
                            //       tickColor: 'red'
                            //     },
                            //     ticks: {
                            //       color: 'blue',
                            //     }
                            //   }
                            // }
                        }
                    });
                </script>
            <?php
        }
        if ($chartrt_types == 'doughnut') {
            ?>
                <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
                <script>
                    var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                    var myChart = new Chart(ctx, {

                        type: '<?php echo esc_attr($chartrt_types); ?>',
                        data: {
                            labels: ['<?php echo implode("','",array_map('esc_attr',$doughnut_charted['doughnut_chart_label'])); ?>'],
                            datasets: [{
                                label: '<?php echo esc_attr($doughnut_titlesee_label); ?>',
                                data: [<?php echo implode(',', array_map('esc_attr',$doughnut_charted['doughnut_chart_data'])); ?>],
                                backgroundColor:['<?php echo implode("','", array_map('esc_attr',$doughnut_charted['doughnut_backgroundcolor'])); ?>'],
                                hoverOffset: <?php echo esc_attr($doughnut_hoversetset); ?>
                            }]
                        },
                        options: {
                            // scales: { 
                            // x: {
                            //     grid: {
                            //       tickColor: 'red'
                            //     },
                            //     ticks: {
                            //       color: 'blue',
                            //     }
                            //   }
                            // }
                        }
                    });
                </script>
            <?php
        }
        if ($chartrt_types == 'polarArea') {
            ?>
                <canvas id="<?php echo esc_attr($postmid[0]); ?>" width="300" height="300"></canvas>
                <script>
                    var ctx = document.getElementById(<?php echo esc_attr($postmid[0]); ?>).getContext('2d');
                    var myChart = new Chart(ctx, {

                        type: '<?php echo esc_attr($chartrt_types); ?>',
                        data: {
                            labels: ['<?php echo implode("','",array_map('esc_attr',$polarAreaa_charted['polarArea_chart_label'])); ?>'],
                            datasets: [{
                                label: '<?php echo esc_attr($polarArea_titlesese_label); ?>',
                                data: [<?php echo implode(',', array_map('esc_attr',$polarAreaa_charted['polarArea_chart_data'])); ?>],
                                backgroundColor: ['<?php echo implode("','", array_map('esc_attr',$polarAreaa_charted['polarArea_backgroundcolor'])); ?>']
                            }]
                        },
                        options: {
                            // scales: { 
                            // x: {
                            //     grid: {
                            //       tickColor: 'red'
                            //     },
                            //     ticks: {
                            //       color: 'blue',
                            //     }
                            //   }
                            // }
                        }
                    });
                </script>
            <?php
        }
    }
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
}
add_shortcode('CAGM-addallchart', 'CAGM_addallchart');

// create chart
function CAGM_addchart($attr){
        //print_r($attr);
        //echo "<br>";
        $chart_labels =  get_post_meta($attr['id'], 'chart', true);
        $chart_types =  get_post_meta($attr['id'], 'chart_types', true);
        $chart_title_label =  get_post_meta($attr['id'], 'chart_title_label', true);
        $bubblechart = get_post_meta($attr['id'], 'bubble_chart', true);
        $bar_title_label = get_post_meta($attr['id'], 'bar_title_label', true);
        $doughnut_title_label = get_post_meta($attr['id'], 'doughnut_title_label', true);
        $polarArea_title_label = get_post_meta($attr['id'], 'polarArea_title_label', true);
        $doughnut_hoverset = get_post_meta($attr['id'], 'doughnut_hoverset', true);

        if (empty($bubblechart)) {
            $bubblechart = array();
        }

        $bar_chart =  get_post_meta($attr['id'], 'bar_chart', true);
        if (empty($bar_chart)) {
            $bar_chart = array();
        }

        $doughnut_chart =  get_post_meta($attr['id'], 'doughnut_chart', true);
        if (empty($doughnut_chart)) {
            $doughnut_chart = array();
        }

        $polarArea_chart =  get_post_meta($attr['id'], 'polarArea_chart', true);
        if (empty($polarArea_chart)) {
            $polarArea_chart = array();
        }

        $scatter_chart = get_post_meta($attr['id'], 'scatter_chart', true);
        if (empty($scatter_chart)) {
            $scatter_chart = array();
        }

        $line_chart = get_post_meta($attr['id'], 'line_chart', true);
        if (empty($line_chart)) {
            $line_chart = array();
        }
       
        $bubblechart_title = get_post_meta($attr['id'], 'bubble_chart_title', true);
        $scatterchart_title = get_post_meta($attr['id'], 'scatter_chart_title', true);
      
        $linecharttension = get_post_meta($attr['id'], 'line_chart_tension', true);
        $bubble_backcolor = get_post_meta($attr['id'], 'bubble_backcolor', true);
        $scatter_backcolor = get_post_meta($attr['id'], 'scatter_backcolor', true);

        $linechartboeder = get_post_meta($attr['id'], 'line_bordercolor', true);
        $chart_fill = get_post_meta($attr['id'], 'chart_fill', true);
        $line_charttitle = get_post_meta($attr['id'], 'line_charttitle', true);
        // echo "<pre>";
        // print_r($attr['id']);
        // echo "</pre>";

        if(isset($bubblechart['fxserise'])){
            $fxserise = $bubblechart['fxserise'];
        }else{
            $fxserise = "";
        }
        if(isset($bubblechart['fyserise'])){
            $fyserise = $bubblechart['fyserise'];
        }else{
            $fyserise = "";
        }
        if(isset($bubblechart['frserise'])){
            $frserise = $bubblechart['frserise'];
        }else{
            $frserise = "";
        }
        if(isset($bubblechart['fxdata'])){
            $fxdata = $bubblechart['fxdata'];
        }else{
            $fxdata = "";
        }
        if(isset($bubblechart['fydata'])){
            $fydata = $bubblechart['fydata'];
        }else{
            $fydata = "";
        }
        if(isset($bubblechart['frdata'])){
            $frdata = $bubblechart['frdata'];
        }else{
            $frdata = "";
        }
        
        if (is_countable($fxserise) && count($fxserise) > 0) {
            $arr = array();
            for ($index = 0; $index < count($fxserise); $index++) {
                $arr[$index] = "{". $fxserise[$index].":".$fxdata[$index].",".$fyserise[$index].":".$fydata[$index].",".$frserise[$index].":".$frdata[$index]."}";
            }
            $result = implode(",", $arr);
        }
        //print_r($result);
        // print_r($bubblechart['fxdata']);
        if(isset($scatter_chart['scatter_xserise'])){
            $scatter_xserise = $scatter_chart['scatter_xserise'];
        }else{
            $scatter_xserise = "";
        }
        if(isset($scatter_chart['scatter_xdata'])){
           $scatter_xdata = $scatter_chart['scatter_xdata'];
        }else{
            $scatter_xdata = "";
        }
        if(isset($scatter_chart['scatter_yserise'])){
           $scatter_yserise = $scatter_chart['scatter_yserise'];
        }else{
            $scatter_yserise = "";
        }
        if(isset($scatter_chart['scatter_ydata'])){
            $scatter_ydata = $scatter_chart['scatter_ydata'];
        }else{
            $scatter_ydata = "";
        }
        
        
        
        if (is_countable($scatter_xserise) && count($scatter_xserise) > 0) {
            $sca_arr = array();
            for ($sca = 0; $sca < count($scatter_xserise); $sca++) {
                $sca_arr[$sca] = "{". $scatter_xserise[$sca].":".$scatter_xdata[$sca].",".$scatter_yserise[$sca].":".$scatter_ydata[$sca] ."}";
            }

            $scadataresult = implode(",", $sca_arr);
        }
        ob_start();
    // scatter chart script start //
    if($chart_types == 'scatter'){
        ?>
        <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
        <script>
                           
            var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
            var myChart = new Chart(ctx, {

                type: '<?php echo esc_attr($chart_types); ?>',
                data: {
                    datasets: [{
                        label: '<?php echo esc_attr($scatterchart_title); ?>',
                        data: [
                          <?php echo esc_attr($scadataresult); ?>
                        ],
                        backgroundColor: '<?php echo esc_attr($scatter_backcolor);  ?>',
                      }]
                },
                options: {
                    // scales: { 
                    // x: {
                    //     grid: {
                    //       tickColor: 'red'
                    //     },
                    //     ticks: {
                    //       color: 'blue',
                    //     }
                    //   }
                    // }
                }
            });
        </script>

        <?php
    }
    // scatter chart script end //

    // bubble chart script start //
    if($chart_types == 'bubble'){
        ?>
            <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
            <script>
                               
                var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chart_types); ?>',
                    data: {
                        datasets: [{
                            label: '<?php echo esc_attr($bubblechart_title); ?>',
                            data: [
                              <?php echo esc_attr($result); ?>
                            ],
                            backgroundColor: '<?php echo esc_attr($bubble_backcolor);  ?>',
                          }]
                    },
                    options: {
                        // scales: { 
                        // x: {
                        //     grid: {
                        //       tickColor: 'red'
                        //     },
                        //     ticks: {
                        //       color: 'blue',
                        //     }
                        //   }
                        // }
                    }
                });
            </script>

        <?php
    } 
     // pie chart script start //
    if($chart_types == 'pie'){ 
        ?>
            <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
            <script>
                var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chart_types); ?>',
                    data: {
                        labels: ['<?php echo implode("','",array_map('esc_attr',$chart_labels['chart_label'])); ?>'],
                        datasets: [{
                            label: '<?php echo esc_attr($chart_title_label); ?>',
                            data: [<?php echo implode(',', array_map('esc_attr',$chart_labels['chart_data'])); ?>],
                            backgroundColor: ['<?php echo implode("','", array_map('esc_attr',$chart_labels['chart_backgroundcolor'])); ?>'],
                            borderColor: ['<?php echo implode("','", array_map('esc_attr',$chart_labels['chart_bordercolor'])); ?>'],
                            borderWidth: <?php echo esc_attr($attr['border-width']); ?>
                        }]
                    },
                    options: {
                        
                    }
                });
            </script>
        <?php
    }

    if ($chart_types == 'line') {
        ?>
            <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
            <script>
                var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chart_types); ?>',
                    data: {
                        labels: ['<?php echo implode("','",array_map('esc_attr',$line_chart['linechart_label'])); ?>'],
                        datasets: [{
                            label: '<?php echo esc_attr($line_charttitle); ?>',
                            data: [<?php echo implode(",", array_map('esc_attr',$line_chart['linechart_data']));  ?>],
                            fill: <?php echo esc_attr($chart_fill); ?>,
                            borderColor: '<?php echo esc_attr($linechartboeder); ?>',
                            tension: <?php echo esc_attr($linecharttension); ?>
                        }]
                    },
                    options: {
                        // scales: { 
                        // x: {
                        //     grid: {
                        //       tickColor: 'red'
                        //     },
                        //     ticks: {
                        //       color: 'blue',
                        //     }
                        //   }
                        // }
                    }
                });
            </script>
        <?php
    }

    if ($chart_types == 'bar') {
        ?>
            <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
            <script>
                var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chart_types); ?>',
                    data: {
                      labels: ['<?php echo implode("','",array_map('esc_attr',$bar_chart['bar_chart_label'])); ?>'],
                      datasets: [{
                            label: '<?php echo esc_attr($bar_title_label); ?>',
                            data: [<?php echo implode(',', array_map('esc_attr',$bar_chart['bar_chart_data'])); ?>],
                            backgroundColor: ['<?php echo implode("','", array_map('esc_attr',$bar_chart['bar_backgroundcolor'])); ?>'],
                            borderColor: ['<?php echo implode("','", array_map('esc_attr',$bar_chart['bar_bordercolor'])); ?>'],
                            borderWidth: 1
                          }]
                    },
                    options: {
                        // scales: { 
                        // x: {
                        //     grid: {
                        //       tickColor: 'red'
                        //     },
                        //     ticks: {
                        //       color: 'blue',
                        //     }
                        //   }
                        // }
                    }
                });
            </script>
        <?php
    }
  
    if ($chart_types == 'doughnut') {
        ?>
            <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
            <script>
                var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chart_types); ?>',
                    data: {
                        labels: ['<?php echo implode("','",array_map('esc_attr',$doughnut_chart['doughnut_chart_label'])); ?>'],
                        datasets: [{
                            label: '<?php echo esc_attr($doughnut_title_label); ?>',
                            data: [<?php echo implode(',', array_map('esc_attr',$doughnut_chart['doughnut_chart_data'])); ?>],
                            backgroundColor:['<?php echo implode("','", array_map('esc_attr',$doughnut_chart['doughnut_backgroundcolor'])); ?>'],
                            hoverOffset: <?php echo esc_attr($doughnut_hoverset); ?>
                        }]
                    },
                    options: {
                        // scales: { 
                        // x: {
                        //     grid: {
                        //       tickColor: 'red'
                        //     },
                        //     ticks: {
                        //       color: 'blue',
                        //     }
                        //   }
                        // }
                    }
                });
            </script>
        <?php
    }

    if ($chart_types == 'polarArea') {
        ?>
            <canvas id="<?php echo esc_attr($attr['id']); ?>" width="300" height="300"></canvas>
            <script>
                var ctx = document.getElementById(<?php echo esc_attr($attr['id']); ?>).getContext('2d');
                var myChart = new Chart(ctx, {

                    type: '<?php echo esc_attr($chart_types); ?>',
                    data: {
                        labels: ['<?php echo implode("','",array_map('esc_attr',$polarArea_chart['polarArea_chart_label'])); ?>'],
                        datasets: [{
                            label: '<?php echo esc_attr($polarArea_title_label); ?>',
                            data: [<?php echo implode(',', array_map('esc_attr',$polarArea_chart['polarArea_chart_data'])); ?>],
                            backgroundColor: ['<?php echo implode("','", array_map('esc_attr',$polarArea_chart['polarArea_backgroundcolor'])); ?>']
                        }]
                    },
                    options: {
                        // scales: { 
                        // x: {
                        //     grid: {
                        //       tickColor: 'red'
                        //     },
                        //     ticks: {
                        //       color: 'blue',
                        //     }
                        //   }
                        // }
                    }
                });
            </script>
        <?php
    }

        $output = ob_get_contents();
        ob_end_clean();
        return $output;
}
add_shortcode('CAGM-addchart', 'CAGM_addchart');
?>