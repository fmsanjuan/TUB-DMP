jQuery.fn.exists = function(){return this.length>0;}

$( document ).ready(function() {
        
    //$.jGrowl.defaults.position = 'center';

    $.facebox.settings.closeImage = '/dmp/images/vendor/facebox/closelabel.png';
    $.facebox.settings.loadingImage = '/dmp/images/vendor/facebox/loading.gif';

    
    /*
    $('form').dirtyForms();

    $.DirtyForms.debug = false;    
    $.DirtyForms.title = 'Achtung!';
    $.DirtyForms.message = 'Ungesicherte Änderungen in Ihrem Datenmanagementplan!';
    $.DirtyForms.dirtyClass = 'red'; 
    */
    
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                      scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
    
    if( $('#flash').exists() ) {
        msg = $('#flash').attr('data');
        console.log( msg );
        $('#basicModal').modal();
        $("#basicModal .modal-body").text( msg );        
        setTimeout(function() { $('#basicModal').modal('hide'); }, 50000);
    }
    
    //if( $('#flash').exists() ) {
        //$('#basicModal').modal();
    //}
    
    /*
    if( $('#flash').exists() ) {

        if ($('#flash').attr('rel') == 'general_error') {
            position = 'center-big';
            stickyness = true;
            closer = true;
            closer_template = '<input type="button" value="OK" />';
        } else {
            position = 'center';
            stickyness = false;
            closer = false;
            closer_template = '';
        }

        $('#flash').hide();

        flash_message = $('#flash').attr('data');

        switch( $('#flash').attr('rel') ) {
            case 'general_error':
                flash_title = 'SuperFehler';
                flash_type = 'general_error';
                break;            
            case 'error':
                flash_title = 'Fehler';
                flash_type = 'error';
                break;
            case 'success':
                flash_title = 'Erfolg';
                flash_type = 'success';
                break;            
            default:
                flash_title = 'Hinweis';
                flash_type = 'notice';           
        }

        $.jGrowl( flash_message , { 
            //header: flash_title,
            sticky: stickyness,
            position: position,
            corners: '15px',
            closer: closer,
            closeTemplate: closer_template,
            life: '1000',
            closeDuration: 'fast',
            openDuration: 'fast',
            theme: flash_type
        });
          
    }
    */
    
   /**
     * German translations for jQueryUI Datepicker
     */    

    $.datepicker.regional['de'] = {clearText: 'löschen', clearStatus: 'aktuelles Datum löschen',
                closeText: 'schließen', closeStatus: 'ohne Änderungen schließen',
                prevText: 'Zurück', prevStatus: 'letzten Monat zeigen',
                nextText: 'Vor', nextStatus: 'nächsten Monat zeigen',
                currentText: 'heute', currentStatus: '',
                monthNames: ['Januar','Februar','März','April','Mai','Juni',
                'Juli','August','September','Oktober','November','Dezember'],
                monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
                'Jul','Aug','Sep','Okt','Nov','Dez'],
                monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
                weekHeader: 'Wo', weekStatus: 'Woche des Monats',
                dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
                dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
                dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
                dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'Wähle D, M d',
                dateFormat: 'dd.mm.yy', firstDay: 1, 
                initStatus: 'Wähle ein Datum', isRTL: false};
        $.datepicker.setDefaults($.datepicker.regional['de']);


   /**
     * Setup jQeryUI Datepicker
     */        
    $('.question-date, .question-daterange').datepicker(
        {
            dateFormat: 'dd.mm.yy',
            changeMonth: true,
            changeYear: true,
            yearRange: new Date().getFullYear() + 'c:+10'
        }
    );

    
   /**
     * Setup jQeryUI Slider with ranges enabled
      
    $('.question-valuerange-slider').each(function() {
        $(this).slider(
            {
            range: true,
            min: parseInt( $(this).attr('min') ),
            max: parseInt( $(this).attr('max') ),
            //step: parseInt( $(this).attr('step') ),
            values: [ 35, $(this).parent().find(".question-value").val() ],
            slide: function(event, ui) {
                $(this).parent().find(".question-value").val( ui.values[0] + " - " + ui.values[1] );
            }
        });
        //$( "#price-range" ).val( + $( "#slider-range" ).slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
        //    " - " + $( "#slider-range" ).slider( "values", 1 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
        //
        //$(".range-slide span.amount").html("" + $(this).slider("values", 0) + " - " + $(this).slider("values", 1));
    });
*/   
    /*
    var ValueChanger = function( slider ) {
        console.log( slider );
        foo = $(slider).parent().find(".question-value").text( slider.value );
        //$('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
    };
    
    $('.question-value-slider').each(function() {
        $(this).slider(
            {
                tooltip: 'always',
                formater: function(value) {
                    return 'Wert: ' + value;
                }
            }).on('slide', ValueChanger);
            //range: false,
            //min: parseInt( $(this).attr('min') ),
            //max: parseInt( $(this).attr('max') ),
            //step: parseInt( $(this).attr('step') ),
            //value: $(this).parent().find(".question-value").val(),
            //slide: function(event, ui) {
            //    $(this).parent().find(".question-value").val( ui.value );
            //}
        //}
        //$( "#price-range" ).val( + $( "#slider-range" ).slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
        //    " - " + $( "#slider-range" ).slider( "values", 1 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
        //
        //$(".range-slide span.amount").html("" + $(this).slider("values", 0) + " - " + $(this).slider("values", 1));
    });
    */

    /*
    $('.question-valuerange-slider').each(function() {
        $(this).slider(
            {
            range: true,
            min: parseInt( $(this).attr('min') ),
            max: parseInt( $(this).attr('max') ),
            //step: parseInt( $(this).attr('step') ),
            values: [ 35, $(this).parent().find(".question-value").val() ],
            slide: function(event, ui) {
                $(this).parent().find(".question-value").val( ui.values[0] + " - " + ui.values[1] );
            }
        });
        //$( "#price-range" ).val( + $( "#slider-range" ).slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
        //    " - " + $( "#slider-range" ).slider( "values", 1 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
        //
        //$(".range-slide span.amount").html("" + $(this).slider("values", 0) + " - " + $(this).slider("values", 1));
    });
    */
   
   /**
     * Ajax Tests
     */    
    /*
    $("form#save_plan .quick-save").click(function(e){
    
    }
    */
    
    
    $("form#save_plan").submit(function(e){
        
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/dmp/plan/save',
            data: $( this ).serialize(),
            success: function( msgFromPartialView ){
                $('#basicModal').modal();
                $("#basicModal .modal-body").text( msgFromPartialView );        
                setTimeout(function() { $('#basicModal').modal('hide'); }, 2000);
            }            
        });
        
        
        
        
        
        /*
        .done(function( msg ) {
            $.jGrowl( msg , { 
            //header: flash_title,
            sticky: false,
            //position: 'center',
            corners: '0px',
            closer: false,
            closeTemplate: '',
            life: '2000',
            closeDuration: 'fast',
            openDuration: 'fast',
            theme: flash_type
        });
            //setTimeout( jQuery(document).trigger('close.facebox'), 10000 );
        });
        */
    });
   
    // Feedback-Button
    $('input#feedback-button').click(function(){
        window.location.href = "mailto:pilot.dmp@ub.tu-berlin.de";
    }); 

});