<?php 

/*Custom Post type start*/
function cagm_post_type_Charts() {
    $supports = array(
        'title', // post title
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('Charts', 'plural'),
        'singular_name' => _x('Charts', 'singular'),
        'menu_name' => _x('Charts', 'admin menu'),
        'name_admin_bar' => _x('Charts', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New Charts'),
        'new_item' => __('New Charts'),
        'edit_item' => __('Edit Charts'),
        'view_item' => __('View Charts'),
        'all_items' => __('All Charts'),
        'search_items' => __('Search Charts'),
        'not_found' => __('No Charts found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Charts'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-chart-pie'
    );
    register_post_type('Charts', $args);
}
add_action('init', 'cagm_post_type_Charts');
/*Custom Post type end*/
function cagm_add_custom_meta_box_2() {
   add_meta_box(
       'customcharts',       // $id
       'Charts Setting',                  // $title
       'cagm_setting_callback_function',  // $callback
       'Charts',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
}
add_action('add_meta_boxes', 'cagm_add_custom_meta_box_2');

function cagm_setting_callback_function($post){
    $chart = get_post_meta($post->ID, 'chart', true);
    $chart_types = get_post_meta($post->ID, 'chart_types', true);
    $scatter_chart = get_post_meta($post->ID, 'scatter_chart', true);
    $bubblechart = get_post_meta($post->ID, 'bubble_chart', true);
    $line_chart = get_post_meta($post->ID, 'line_chart', true);
    $line_fill = get_post_meta($post->ID, 'chart_fill', true);
    $bar_chart = get_post_meta($post->ID, 'bar_chart', true);
    $doughnut_chart = get_post_meta($post->ID, 'doughnut_chart', true);
    $polarArea_chart = get_post_meta($post->ID, 'polarArea_chart', true);
    ?>
    <form action="" method="post">
        <div class="charttypesmenu">
            <label style="font-size: 16px;font-weight: 700;">Chart Types :</label>
            <select name="chart_types" id="chart_type" data-attr="<?php echo esc_attr($post->ID); ?>">
                <option value="pie" <?php if($chart_types == 'pie'){ echo 'selected="selected"'; } ?>>pie</option>
                <option value="line" <?php if($chart_types == 'line'){ echo 'selected="selected"'; } ?>>line</option>
                <option value="bar" <?php if($chart_types == 'bar'){ echo 'selected="selected"'; } ?>>bar</option>
                <option value="doughnut" <?php if($chart_types == 'doughnut'){ echo 'selected="selected"'; } ?>>doughnut</option>
                <option value="polarArea" <?php if($chart_types == 'polarArea'){ echo 'selected="selected"'; } ?>>polarArea</option>
                <option value="bubble" <?php if($chart_types == 'bubble'){ echo 'selected="selected"'; } ?>>bubble</option>
                <option value="scatter" <?php if($chart_types == 'scatter'){ echo 'selected="selected"'; } ?>>scatter</option>
            </select>
        </div>

        <div class="pie_chart_container">
            <tr>
                <th><label class="chart_lables">Title :</label></th>
                <td>
                    <input type='text' name='chart_title_label' value="<?php echo get_post_meta($post->ID, 'chart_title_label', true); ?>" >
                </td>
            </tr>
            <?php  
            if(!empty($chart['chart_label'])){ ?>
                <div>
                    <table id="showtable">
                            
                     <?php foreach ($chart['chart_label'] as $key_chart =>$chart_labels_value) {
                      
                      if(!empty($chart_labels_value)){?>

                        <tr class="closechart">
                            <th><label>Labels :</label></th>
                            <td>
                                <input type='text' name='chart[chart_label][]' value="<?php echo esc_attr($chart_labels_value) ?>" >
                            </td>
                            <th><label>Labels Data :</label></th>
                            <td>
                                <input type='text' name='chart[chart_data][]' value="<?php echo esc_attr($chart['chart_data'][$key_chart]); ?>" size="5">
                            </td>
                            <th><label>BackgroundColor :</label></th>
                            <td>
                                <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="chart[chart_backgroundcolor][]" value="<?php echo esc_attr($chart['chart_backgroundcolor'][$key_chart]); ?>">
                            </td>
                            <th><label>BorderColor :</label></th>
                            <td>
                                <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="chart[chart_bordercolor][]" value="<?php echo esc_attr($chart['chart_bordercolor'][$key_chart]); ?>">
                            </td>
                            <td>
                                <input type="button" id="remove_acf" value="Delete" class="button button-primary">
                            </td>
                        </tr>
                         <?php
                        }
                        } ?>
                    </table>
                </div>
            <?php   
            }else{ ?>
            <div>
                <div>
                    <table id="showtable">
                        <tr>
                            <th><label>Labels :</label></th>
                            <td>
                                <input type='text' name='chart[chart_label][]' >
                            </td>
                            <th><label>Labels Data :</label></th>
                            <td>
                                <input type='text' name='chart[chart_data][]' size="5">
                            </td>
                            <th><label>BackgroundColor :</label></th>
                            <td>
                                <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="chart[chart_backgroundcolor][]">
                            </td>
                            <th><label>BorderColor :</label></th>
                            <td>
                                <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="chart[chart_bordercolor][]">
                            </td>
                            <td>
                                <input type="button" id="remove_acf" value="Delete" class="button button-primary">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php 
             }
            ?>
            
            <div class="addcontainer"></div>
            <br>
            <input type="button" id="savevalue" value="Add" class="button button-primary" >
        </div>
    
        <div class="bubble_chart_container">
                    <tr>
                        <th><label class="chart_lables">Title :</label></th>
                        <td>
                            <input type="text" name="bubble_chart_title" value="<?php echo get_post_meta($post->ID, 'bubble_chart_title', true);  ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><label class="chart_lables">BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="bubble_backcolor" value="<?php echo get_post_meta($post->ID, 'bubble_backcolor', true); ?>">
                        </td>
                    </tr>
                <?php 
                if(!empty($bubblechart['fxdata'])){ ?>
                    <div>
                        <table>
                            
                            <tr>
                                <th></th>
                                <th>X Data</th>
                                <th>Y Data</th>
                                <th>R Data</th>
                            </tr>
                            <?php foreach ($bubblechart['fxdata'] as $key_bubblechart =>$bubblechart_labels_value) {
                                if (!empty($bubblechart_labels_value)) {
                                ?>
                            <tr class="bobbleclosechart">
                                <th><label>Data :</label></th>
                                <td>
                                    <input type="text" name="bubble_chart[fxserise][]" size="1" value="<?php echo esc_attr($bubblechart['fxserise'][$key_bubblechart]); ?>">
                                    <input type="text" name="bubble_chart[fxdata][]" value="<?php echo esc_attr($bubblechart_labels_value);  ?>">
                                </td>
                                <td>
                                    <input type="text" name="bubble_chart[fyserise][]" size="1" value="<?php echo esc_attr($bubblechart['fyserise'][$key_bubblechart]); ?>">
                                    <input type="text" name="bubble_chart[fydata][]" value="<?php echo esc_attr($bubblechart['fydata'][$key_bubblechart]); ?>">
                                </td>
                                <td>
                                    <input type="text" name="bubble_chart[frserise][]" size="1" value="<?php echo esc_attr($bubblechart['frserise'][$key_bubblechart]); ?>">
                                    <input type="text" name="bubble_chart[frdata][]" value="<?php echo esc_attr($bubblechart['frdata'][$key_bubblechart]); ?>">
                                </td>
                                <td>
                                    <input type="button" id="remove_bubble" value="Delete" class="button button-primary">
                                </td>
                            </tr>
                        <?php
                            }
                        }
                         ?>
                        </table>
                    </div>
                     <?php   
                }else{ ?>
                    <div>
                        <table>
                            <tr>
                                <th><label>Data :</label></th>
                                <td>
                                    <input type="text" name="bubble_chart[fxserise][]" size="1">
                                    <input type="text" name="bubble_chart[fxdata][]">
                                </td>
                                <td>
                                    <input type="text" name="bubble_chart[fyserise][]" size="1">
                                    <input type="text" name="bubble_chart[fydata][]">
                                </td>
                                <td>
                                    <input type="text" name="bubble_chart[frserise][]" size="1">
                                    <input type="text" name="bubble_chart[frdata][]">
                                </td>
                                <td>
                                    <input type="button" id="remove_bubble" value="Delete" class="button button-primary">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
                ?>
                <div class="add_bubblechart_container"></div>
                <br>
                <input type="button" id="bubblechart_savevalue" value="Add" class="button button-primary" >
        </div>                

        <div class="scatter_chart_container">
                    <tr>
                        <th><label class="chart_lables">Title :</label></th>
                        <td>
                            <input type="text" name="scatter_chart_title" value="<?php echo get_post_meta($post->ID, 'scatter_chart_title', true);  ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><label class="chart_lables">BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="scatter_backcolor" value="<?php echo get_post_meta($post->ID, 'scatter_backcolor', true); ?>">
                        </td>
                    </tr>
                <?php if(!empty($scatter_chart['scatter_xdata'])){  ?>
                    <div>
                        <table>
                            
                            <tr>
                                <th></th>
                                <th>X Data</th>
                                <th>Y Data</th>
                            </tr>
                            <?php foreach ($scatter_chart['scatter_xdata'] as $key_scatter =>$scatter_labels_value) {
                                //print_r($scatter_chart['scatter_xdata']);
                                if (!empty($scatter_labels_value)) {
                                    ?>
                                    <tr class="scatter_closechart">
                                        <th><label>Data :</label></th>
                                        <td>
                                            <input type="text" name="scatter_chart[scatter_xserise][]" size="1" value="<?php echo esc_attr($scatter_chart['scatter_xserise'][$key_scatter]); ?>">
                                            <input type="text" name="scatter_chart[scatter_xdata][]" value="<?php echo esc_attr($scatter_labels_value);  ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="scatter_chart[scatter_yserise][]" size="1" value="<?php echo esc_attr($scatter_chart['scatter_yserise'][$key_scatter]); ?>">
                                            <input type="text" name="scatter_chart[scatter_ydata][]" value="<?php echo esc_attr($scatter_chart['scatter_ydata'][$key_scatter]); ?>">
                                        </td>
                                        
                                        <td>
                                            <input type="button" id="scatter_remove" value="Delete" class="button button-primary">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                     <?php   
                }else{ 
                 ?>

                    <div>
                        <table>
                            
                            <tr>
                                <th><label>Data :</label></th>
                                <td>
                                    <input type="text" name="scatter_chart[scatter_xserise][]" size="1">
                                    <input type="text" name="scatter_chart[scatter_xdata][]">
                                </td>
                                <td>
                                    <input type="text" name="scatter_chart[scatter_yserise][]" size="1">
                                    <input type="text" name="scatter_chart[scatter_ydata][]">
                                </td>
                                
                                <td>
                                    <input type="button" id="scatter_remove" value="Delete" class="button button-primary">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php
            }
            ?>
            <div class="add_scatter_container"></div>
            <br>
            <input type="button" id="scatter_savevalue" value="Add" class="button button-primary">
        </div>

        <div class="line_chart_container">
                <tr>
                    <th><label class="chart_lables">Title :</label></th>
                    <td>
                        <input type="text" name="line_charttitle" value="<?php echo get_post_meta($post->ID, 'line_charttitle', true); ?>">
                    </td>
                    <th><label class="chart_lables">tension :</label></th>
                    <td>
                        <input type="text" name="line_chart_tension" value="<?php echo get_post_meta($post->ID, 'line_chart_tension', true); ?>">
                    </td>
                    <th><label class="chart_lables">Fill :</label></th>
                    <td>
                        <input type="radio" name="chart_fill" id="gender" value="true" <?php checked('true' ,$line_fill) ?>>True
                        <input type="radio" name="chart_fill" id="gender" value="false" <?php checked('false',$line_fill) ?>>False
                    </td>
                    <th><label class="chart_lables">BorderColor :</label></th>
                    <td>
                        <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="line_bordercolor" value="<?php echo get_post_meta($post->ID, 'line_bordercolor', true); ?>">
                    </td>
                </tr>
            <?php if(!empty($line_chart['linechart_label'])){ ?>
            <div>
            <table id="linetable">
                
             <?php foreach ($line_chart['linechart_label'] as $key_line_chart =>$line_chartlabels_value) {
              ///print_r($line_chart['linechart_label']);
              if(!empty($line_chartlabels_value)){?>

                <tr class="lineclosechart">
                    <th><label>Labels :</label></th>
                    <td>
                        <input type='text' name='line_chart[linechart_label][]' value="<?php echo esc_attr($line_chartlabels_value); ?>" >
                    </td>
                    <th><label>Labels Data :</label></th>
                    <td>
                        <input type='text' name='line_chart[linechart_data][]' value="<?php echo esc_attr($line_chart['linechart_data'][$key_line_chart]); ?>" size="5">
                    </td>
                    <td>
                        <input type="button" id="remove_linechart" value="Delete" class="button button-primary">
                    </td>
                </tr>
                 <?php
                }
                } ?>
            </table>
            </div>
                <?php   
            }else{ ?>
                <div>
                    <div>
                        <table id="linetable">
                            <tr>
                                <th><label>Labels :</label></th>
                                <td>
                                    <input type='text' name='line_chart[linechart_label][]' >
                                </td>
                                <th><label>Labels Data :</label></th>
                                <td>
                                    <input type='text' name='line_chart[linechart_data][]' size="5">
                                </td>
                                <td>
                                    <input type="button" id="remove_linechart" value="Delete" class="button button-primary">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?php 
            }
                ?>
                
                <div class="addline_container"></div>
                
                <input type="button" id="line_chart_add" value="Add" class="button button-primary" >           
        </div>

        <div class="bar_chart_container">
                        <th><label class="chart_lables">Title :</label></th>
                        <td>
                            <input type='text' name='bar_title_label' value="<?php echo get_post_meta($post->ID, 'bar_title_label', true); ?>" >
                        </td>
            <?php   if(!empty($bar_chart['bar_chart_label'])){ ?>
            <div>
                <table id="bartable">

                 <?php foreach ($bar_chart['bar_chart_label'] as $key_bar_chart =>$bar_labels_value) {
                  //print_r($bar_chart);
                  if(!empty($bar_labels_value)){?>

                    <tr class="closebar_chart">
                        <th><label>Labels :</label></th>
                        <td>
                            <input type='text' name='bar_chart[bar_chart_label][]' value="<?php echo esc_attr($bar_labels_value); ?>" >
                        </td>
                        <th><label>Labels Data :</label></th>
                        <td>
                            <input type='text' name='bar_chart[bar_chart_data][]' value="<?php echo esc_attr($bar_chart['bar_chart_data'][$key_bar_chart]); ?>" size="5">
                        </td>
                        <th><label>BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="bar_chart[bar_backgroundcolor][]" value="<?php echo esc_attr($bar_chart['bar_backgroundcolor'][$key_bar_chart]); ?>">
                        </td>
                        <th><label>BorderColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="bar_chart[bar_bordercolor][]" value="<?php echo esc_attr($bar_chart['bar_bordercolor'][$key_bar_chart]); ?>">
                        </td>
                        <td>
                            <input type="button" id="bar_remove_acf" value="Delete" class="button button-primary">
                        </td>
                    </tr>
                     <?php
                    }
                    } ?>
                </table>
            </div>
            <?php   
            }else{ ?>
            <div>
                <table id="bar_table">
                    <tr>
                        <th><label>Labels :</label></th>
                        <td>
                            <input type='text' name='bar_chart[bar_chart_label][]' >
                        </td>
                        <th><label>Labels Data :</label></th>
                        <td>
                            <input type='text' name='bar_chart[bar_chart_data][]' size="5">
                        </td>
                        <th><label>BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="bar_chart[bar_backgroundcolor][]">
                        </td>
                        <th><label>BorderColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="bar_chart[bar_bordercolor][]">
                        </td>
                        <td>
                            <input type="button" id="bar_remove_acf" value="Delete" class="button button-primary">
                        </td>
                    </tr>
                </table>
            </div>

            <?php 
             }
            ?>
            
            <div class="addbar_container"></div>
            <br>
            <input type="button" id="savebar_value" value="Add" class="button button-primary" >
        </div>

        <div class="doughnut_chart_container">
                    <th><label class="chart_lables">Title :</label></th>
                    <td>
                        <input type='text' name='doughnut_title_label' value="<?php echo get_post_meta($post->ID, 'doughnut_title_label', true); ?>" >
                    </td>
                    <th><label class="chart_lables">Hover Effect :</label></th>
                    <td>
                        <input type="text" name="doughnut_hoverset" value="<?php echo get_post_meta($post->ID, 'doughnut_hoverset', true); ?>">
                    </td>
            <?php   if(!empty($doughnut_chart['doughnut_chart_label'])){ ?>
            <div>
                <table id="doughnuttable">
                    
                        
                 <?php foreach ($doughnut_chart['doughnut_chart_label'] as $key_doughnut_chart =>$doughnut_labels_value) {
                  //print_r($doughnut_chart);
                  if(!empty($doughnut_labels_value)){?>

                    <tr class="closedoughnut_chart">
                        <th><label>Labels :</label></th>
                        <td>
                            <input type='text' name='doughnut_chart[doughnut_chart_label][]' value="<?php echo esc_attr($doughnut_labels_value); ?>" >
                        </td>
                        <th><label>Labels Data :</label></th>
                        <td>
                            <input type='text' name='doughnut_chart[doughnut_chart_data][]' value="<?php echo esc_attr($doughnut_chart['doughnut_chart_data'][$key_doughnut_chart]); ?>" size="5">
                        </td>
                        <th><label>BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="doughnut_chart[doughnut_backgroundcolor][]" value="<?php echo esc_attr($doughnut_chart['doughnut_backgroundcolor'][$key_doughnut_chart]); ?>">
                        </td>
                        <td>
                            <input type="button" id="doughnut_remove_acf" value="Delete" class="button button-primary">
                        </td>
                    </tr>
                     <?php
                    }
                    } ?>
                </table>
            </div>
            <?php   
            }else{ ?>
            <div>
                <table id="doughnut_table">
                    <tr>
                        <th><label>Labels :</label></th>
                        <td>
                            <input type='text' name='doughnut_chart[doughnut_chart_label][]' >
                        </td>
                        <th><label>Labels Data :</label></th>
                        <td>
                            <input type='text' name='doughnut_chart[doughnut_chart_data][]' size="5">
                        </td>
                        <th><label>BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="doughnut_chart[doughnut_backgroundcolor][]">
                        </td>
                        
                        <td>
                            <input type="button" id="doughnut_remove_acf" value="Delete" class="button button-primary">
                        </td>
                    </tr>
                </table>
            </div>

            <?php 
             }
            ?>
            
            <div class="adddoughnut_container"></div>
            <br>
            <input type="button" id="savedoughnut_value" value="Add" class="button button-primary" >
        </div>

        <div class="polarArea_chart_container">
                        <th><label class="chart_lables">Title :</label></th>
                        <td>
                            <input type='text' name='polarArea_title_label' value="<?php echo get_post_meta($post->ID, 'polarArea_title_label', true); ?>" >
                        </td>
            <?php   if(!empty($polarArea_chart['polarArea_chart_label'])){ ?>
            <div>
                <table id="polarAreatable">
                        
                 <?php foreach ($polarArea_chart['polarArea_chart_label'] as $key_polarArea_chart =>$polarArea_labels_value) {
                  //print_r($doughnut_chart);
                  if(!empty($polarArea_labels_value)){?>

                    <tr class="closepolarArea_chart">
                        <th><label>Labels :</label></th>
                        <td>
                            <input type='text' name='polarArea_chart[polarArea_chart_label][]' value="<?php echo esc_attr($polarArea_labels_value); ?>" >
                        </td>
                        <th><label>Labels Data :</label></th>
                        <td>
                            <input type='text' name='polarArea_chart[polarArea_chart_data][]' value="<?php echo esc_attr($polarArea_chart['polarArea_chart_data'][$key_polarArea_chart]); ?>" size="5">
                        </td>
                        <th><label>BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="polarArea_chart[polarArea_backgroundcolor][]" value="<?php echo esc_attr($polarArea_chart['polarArea_backgroundcolor'][$key_polarArea_chart]); ?>">
                        </td>
                        <td>
                            <input type="button" id="polarArea_remove_acf" value="Delete" class="button button-primary">
                        </td>
                    </tr>
                     <?php
                    }
                    } ?>
                </table>
            </div>
            <?php   
            }else{ ?>
            <div>
                <table id="doughnut_table">
                    <tr>
                        <th><label>Labels :</label></th>
                        <td>
                            <input type='text' name='polarArea_chart[polarArea_chart_label][]' >
                        </td>
                        <th><label>Labels Data :</label></th>
                        <td>
                            <input type='text' name='polarArea_chart[polarArea_chart_data][]' size="5">
                        </td>
                        <th><label>BackgroundColor :</label></th>
                        <td>
                            <input type="text" class="color-picker" data-alpha="true" data-default-color="#dd3333" name="polarArea_chart[polarArea_backgroundcolor][]">
                        </td>
                        
                        <td>
                            <input type="button" id="polarArea_remove_acf" value="Delete" class="button button-primary">
                        </td>
                    </tr>
                </table>
            </div>

            <?php 
             }
            ?>
            
            <div class="addpolarArea_container"></div>
            <br>
            <input type="button" id="savepolarArea_value" value="Add" class="button button-primary" >
        </div>
    </form>
    <?php  
}

function cagm_recursive_sanitize_text_field($array) {  
        if(!empty($array)) {
            foreach ( $array as $key => $value ) {
                if ( is_array( $value ) ) {
                    $value = cagm_recursive_sanitize_text_field($value);
                }else{
                    $value = sanitize_text_field( $value );
                }
            }
        }
        return $array;
}

add_action('save_post', 'cagm_save_postmeta');
function cagm_save_postmeta($post) {
    
    $ocdata = "";
    if(!empty($_REQUEST['chart'] )){
        $ocdata = cagm_recursive_sanitize_text_field($_REQUEST['chart']);
    }
    update_post_meta($post, 'chart', $ocdata);

    $bar_data = "";
    if(!empty($_REQUEST['bar_chart'] )){
        $bar_data = cagm_recursive_sanitize_text_field($_REQUEST['bar_chart']);
    }
    update_post_meta($post, 'bar_chart', $bar_data);

    $doughnut_data = "";
    if(!empty($_REQUEST['doughnut_chart'] )){
        $doughnut_data = cagm_recursive_sanitize_text_field($_REQUEST['doughnut_chart']);
    }
    update_post_meta($post, 'doughnut_chart', $doughnut_data);

    $polarArea_data = "";
    if(!empty($_REQUEST['polarArea_chart'] )){
        $polarArea_data = cagm_recursive_sanitize_text_field($_REQUEST['polarArea_chart']);
    }
    update_post_meta($post, 'polarArea_chart', $polarArea_data);

    $bubbledata = "";
    if(!empty($_REQUEST['bubble_chart'] )){
        $bubbledata = cagm_recursive_sanitize_text_field($_REQUEST['bubble_chart']);
    }
    update_post_meta($post, 'bubble_chart', $bubbledata);;
    
    $scatter_chart = "";
    if(!empty($_REQUEST['scatter_chart'] )){
        $scatter_chart = cagm_recursive_sanitize_text_field($_REQUEST['scatter_chart']);
    }
    update_post_meta($post, 'scatter_chart', $scatter_chart);

    $linechart = "";
    if(!empty($_REQUEST['line_chart'] )){
        $linechart = cagm_recursive_sanitize_text_field($_REQUEST['line_chart']);
    }
    update_post_meta($post, 'line_chart', $linechart);
    
    if(isset($_REQUEST['chart_types'])){
        update_post_meta($post, 'chart_types', sanitize_text_field($_REQUEST['chart_types']));
    }
    if(isset($_REQUEST['chart_title_label'])){
        update_post_meta($post, 'chart_title_label', sanitize_text_field($_REQUEST['chart_title_label']));
    }
    if(isset($_REQUEST['bubble_chart_title'])){
        update_post_meta($post, 'bubble_chart_title', sanitize_text_field($_REQUEST['bubble_chart_title']));
    }
    if(isset($_REQUEST['bar_title_label'])){
        update_post_meta($post, 'bar_title_label', sanitize_text_field($_REQUEST['bar_title_label']));
    }
    if(isset($_REQUEST['scatter_chart_title'])){
        update_post_meta($post, 'scatter_chart_title', sanitize_text_field($_REQUEST['scatter_chart_title']));
    }
    if(isset($_REQUEST['line_bordercolor'])){
        update_post_meta($post, 'line_bordercolor', sanitize_text_field($_REQUEST['line_bordercolor']));
    }
    if(isset($_REQUEST['line_chart_tension'])){
        update_post_meta($post, 'line_chart_tension', sanitize_text_field($_REQUEST['line_chart_tension']));
    }
    if(isset($_REQUEST['chart_fill'])){
        update_post_meta($post, 'chart_fill', sanitize_text_field($_REQUEST['chart_fill']));
    }
    if(isset($_REQUEST['line_charttitle'])){
        update_post_meta($post, 'line_charttitle', sanitize_text_field($_REQUEST['line_charttitle']));
    }
    if(isset($_REQUEST['bubble_backcolor'])){
        update_post_meta($post, 'bubble_backcolor', sanitize_text_field($_REQUEST['bubble_backcolor']));
    }
    if(isset($_REQUEST['scatter_backcolor'])){
        update_post_meta($post, 'scatter_backcolor', sanitize_text_field($_REQUEST['scatter_backcolor']));
    }
    if(isset($_REQUEST['doughnut_hoverset'])){
        update_post_meta($post, 'doughnut_hoverset', sanitize_text_field($_REQUEST['doughnut_hoverset']));
    }
    if(isset($_REQUEST['doughnut_title_label'])){
        update_post_meta($post, 'doughnut_title_label', sanitize_text_field($_REQUEST['doughnut_title_label']));
    }
    if(isset($_REQUEST['polarArea_title_label'])){
        update_post_meta($post, 'polarArea_title_label', sanitize_text_field($_REQUEST['polarArea_title_label']));
    }
    //  exit;
}

add_filter( 'manage_charts_posts_columns', 'CAGM_set_custom_edit_chart_columns' );
function CAGM_set_custom_edit_chart_columns($columns) {
    $columns['Charts_Shortcode'] = __( 'Shortcode', 'your_text_domain' );
    return $columns;
}

add_action( 'manage_charts_posts_custom_column' , 'CAGM_custom_chart_column_inner', 10, 2 );
function CAGM_custom_chart_column_inner( $column, $post_id ) {
    ?>
    <input type="text" value='[CAGM-addchart id="<?php echo esc_attr($post_id);?>" border-width ="1"]' size="40" readonly>
    <?php
}

add_action( 'manage_posts_extra_tablenav', 'CAGM_order_list_top_bar_buttom', 20, 1 );
function CAGM_order_list_top_bar_buttom( $which ) {
    global $typenow;

    if ( 'charts' === $typenow && 'bottom' === $which ) {
        ?>
           <p class="multichart">Put this shortcode if you want to bring up multiple charts => <strong>[CAGM-addallchart id='1,2' border-width ='1']</strong></p>
        <?php
    }
}
