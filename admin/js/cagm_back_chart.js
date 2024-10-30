// pie chart
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

    //console.log('good morning');
    jQuery('#savevalue').click(function() {
        //var number = jQuery('.chart_container').children('div').length;
        //var display = number + 1;
        // console.log(number);
        var form = "<div class='chart_container'>" +
            "<div>" +
            "<table>" + "<tr class='closechart'>" +
            "<th>" + "<label>Labels :</label>" + "</th>" +
            "<td>" + "<input type='text' name='chart[chart_label][]' value=''>" + "</td>" +
            "<th>" + "<label>Labels Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='chart[chart_data][]' value='' size='5' required>" + "</td>" +
            "<th>" + "<label>BackgroundColor :</label>" + "</th>" +
            "<td>" + "<input type='text' class='color-picker' data-alpha='true' data-default-color='#dd3333' name='chart[chart_backgroundcolor][]' value='#07000a'>" + "</td>" +
            "<th class='chartbackcolor'>" + "<label>Bordercolor :</label>" + "</th>" +
            "<td class='chartbackcolor'>" + "<input type='text' class='color-picker' data-alpha='true' data-default-color='#dd3333' name='chart[chart_bordercolor][]' value='#07000a'>" + "</td>" + "</td>" +
            "<td>" + "<input type='button' id='remove_acf' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>" +
            "</div>";
        jQuery('.addcontainer').append(form);

    });
    return false;
});
jQuery(document).on('click', '#remove_acf', function() {
    jQuery(this).closest('.closechart').remove();
});

// // Bubble Chart //
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

    //console.log('good morning');
    jQuery('#bubblechart_savevalue').click(function() {
        //var number = jQuery('.chart_container').children('div').length;
        //var display = number + 1;
        // console.log(number);
        var bubble_form = "<div>" +
            "<table>" + "<tr class='bobbleclosechart'>" +
            "<th>" + "<label>Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='bubble_chart[fxserise][]' size='1'>" + " <input type='text' name='bubble_chart[fxdata][]'>" + "</td>" +
            "<td>" + "<input type='text' name='bubble_chart[fyserise][]' size='1'>" + "<input type='text' name='bubble_chart[fydata][]' required>" + "</td>" +
            "<td>" + "<input type='text' name='bubble_chart[frserise][]' size='1'>" + "<input type='text' name='bubble_chart[frdata][]' required>" + "</td>" +
            "<td>" + "<input type='button' id='remove_bubble' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>";
        jQuery('.add_bubblechart_container').append(bubble_form);

    });
    return false;
});
jQuery(document).on('click', '#remove_bubble', function() {
    jQuery(this).closest('.bobbleclosechart').remove();
});

// // scatter Chart //
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

   // console.log('good morning');
    jQuery('#scatter_savevalue').click(function() {
        //var number = jQuery('.chart_container').children('div').length;
        //var display = number + 1;
        // console.log(number);
        var scatter_form = "<div class='scatter_container'>" +
            "<table>" + "<tr class='scatter_closechart'>" +
            "<th>" + "<label>Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='scatter_chart[scatter_xserise][]' size='1'>" + " <input type='text' name='scatter_chart[scatter_xdata][]'>" + "</td>" +
            "<td>" + "<input type='text' name='scatter_chart[scatter_yserise][]' size='1'>" + "<input type='text' name='scatter_chart[scatter_ydata][]' required>" + "</td>" +
            "<td>" + "<input type='button' id='scatter_remove' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>";
        jQuery('.add_scatter_container').append(scatter_form);

    });
    return false;
});
jQuery(document).on('click', '#scatter_remove', function() {
    jQuery(this).closest('.scatter_closechart').remove();
});

// // line Chart //
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

    //console.log('good morning');
    jQuery('#line_chart_add').click(function() {
        
        var line_form = "<div>" +
            "<table>" + "<tr class='lineclosechart'>" +
            "<th>" + "<label>Labels :</label>" + "</th>" +
            "<td>" + "<input type='text' name='line_chart[linechart_label][]' value=''>" + "</td>" +
            "<th>" + "<label>Labels Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='line_chart[linechart_data][]' value='' required>" + "</td>" +
             "<td>" + "<input type='button' id='remove_linechart' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>";
        jQuery('.addline_container').append(line_form);

    });
    return false;
});
jQuery(document).on('click', '#remove_linechart', function() {
    jQuery(this).closest('.lineclosechart').remove();
});


// // bar Chart //
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

    //console.log('good morning');
    jQuery('#savebar_value').click(function() {
        //var number = jQuery('.chart_container').children('div').length;
        //var display = number + 1;
        // console.log(number);
        var form = "<div class='bar_chart_container'>" +
            "<div>" +
            "<table>" + "<tr class='closebar_chart'>" +
            "<th>" + "<label>Labels :</label>" + "</th>" +
            "<td>" + "<input type='text' name='bar_chart[bar_chart_label][]' value=''>" + "</td>" +
            "<th>" + "<label>Labels Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='bar_chart[bar_chart_data][]' value='' size='5' required>" + "</td>" +
            "<th>" + "<label>BackgroundColor :</label>" + "</th>" +
            "<td>" + "<input type='text' class='color-picker' data-alpha='true' data-default-color='#dd3333' name='bar_chart[bar_backgroundcolor][]' value='#07000a'>" + "</td>" +
            "<th class='chartbackcolor'>" + "<label>Bordercolor :</label>" + "</th>" +
            "<td class='chartbackcolor'>" + "<input type='text' class='color-picker' data-alpha='true' data-default-color='#dd3333' name='bar_chart[bar_bordercolor][]' value='#07000a'>" + "</td>" + "</td>" +
            "<td>" + "<input type='button' id='bar_remove_acf' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>" +
            "</div>";
        jQuery('.addbar_container').append(form);

    });
    return false;
});
jQuery(document).on('click', '#bar_remove_acf', function() {
    jQuery(this).closest('.closebar_chart').remove();
});

// // doughnut Chart //
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

    //console.log('good morning');
    jQuery('#savedoughnut_value').click(function() {
        //var number = jQuery('.chart_container').children('div').length;
        //var display = number + 1;
        // console.log(number);
        var form = "<div class='doughnut_chart_container'>" +
            "<div>" +
            "<table>" + "<tr class='closedoughnut_chart'>" +
            "<th>" + "<label>Labels :</label>" + "</th>" +
            "<td>" + "<input type='text' name='doughnut_chart[doughnut_chart_label][]' value=''>" + "</td>" +
            "<th>" + "<label>Labels Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='doughnut_chart[doughnut_chart_data][]' value='' size='5' required>" + "</td>" +
            "<th>" + "<label>BackgroundColor :</label>" + "</th>" +
            "<td>" + "<input type='text' class='color-picker' data-alpha='true' data-default-color='#dd3333' name='doughnut_chart[doughnut_backgroundcolor][]' value='#07000a'>" + "</td>" +
            "<td>" + "<input type='button' id='doughnut_remove_acf' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>" +
            "</div>";
        jQuery('.adddoughnut_container').append(form);

    });
    return false;
});
jQuery(document).on('click', '#doughnut_remove_acf', function() {
    jQuery(this).closest('.closedoughnut_chart').remove();
});

// // doughnut Chart //
jQuery(document).ready(function() {
   
    setInterval(function () {
       jQuery('.color-picker').wpColorPicker();
    }, 1000);

    //console.log('good morning');
    jQuery('#savepolarArea_value').click(function() {
        //var number = jQuery('.chart_container').children('div').length;
        //var display = number + 1;
        // console.log(number);
        var form = "<div class='polarArea_chart_container'>" +
            "<div>" +
            "<table>" + "<tr class='closepolarArea_chart'>" +
            "<th>" + "<label>Labels :</label>" + "</th>" +
            "<td>" + "<input type='text' name='polarArea_chart[polarArea_chart_label][]' value=''>" + "</td>" +
            "<th>" + "<label>Labels Data :</label>" + "</th>" +
            "<td>" + "<input type='text' name='polarArea_chart[polarArea_chart_data][]' value='' size='5' required>" + "</td>" +
            "<th>" + "<label>BackgroundColor :</label>" + "</th>" +
            "<td>" + "<input type='text' class='color-picker' data-alpha='true' data-default-color='#dd3333' name='polarArea_chart[polarArea_backgroundcolor][]' value='#07000a'>" + "</td>" +
            "<td>" + "<input type='button' id='polarArea_remove_acf' value='Delete' class='button button-primary'>" + "</td>" +
            "</tr>" + "</table>" +
            "</div>" +
            "</div>";
        jQuery('.addpolarArea_container').append(form);

    });
    return false;
});
jQuery(document).on('click', '#polarArea_remove_acf', function() {
    jQuery(this).closest('.closepolarArea_chart').remove();
});


jQuery(document).ready(function() {
   var charttps = jquerypostjs.chart_typesss;
   //console.log(charttps);
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').show();
        if (charttps == 'scatter') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').show();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }
        if (charttps == 'pie') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').show(); 
        }
        if (charttps == 'line') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').show();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }
        if (charttps == 'bubble') {
            jQuery('.bubble_chart_container').show();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }
        if (charttps == 'bar') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').show();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }
        if (charttps == 'doughnut') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').show();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }
        if (charttps == 'polarArea') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').show();
            jQuery('.pie_chart_container').hide();
        }

    jQuery('#chart_type').change(function(){
       var chart_types = jQuery(this).val();
       //console.log(chart_types);

        if (chart_types == 'pie') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').show();
           
        }

        if (chart_types == 'line') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').show();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
           
        
        }
        if (chart_types == 'bubble') {
            jQuery('.bubble_chart_container').show();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }

        if (chart_types == 'scatter') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').show();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
           
        }

        if (chart_types == 'bar') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').show();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }

        if (chart_types == 'doughnut') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').show();
            jQuery('.polarArea_chart_container').hide();
            jQuery('.pie_chart_container').hide();
        }

        if (chart_types == 'polarArea') {
            jQuery('.bubble_chart_container').hide();
            jQuery('.scatter_chart_container').hide();
            jQuery('.line_chart_container').hide();
            jQuery('.bar_chart_container').hide();
            jQuery('.doughnut_chart_container').hide();
            jQuery('.polarArea_chart_container').show();
            jQuery('.pie_chart_container').hide();
        }

      
    });   
  
});
