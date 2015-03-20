jQuery.fn.exists = function(){return this.length>0;}

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substrRegex;
 
    // an array that will be populated with substring matches
    matches = [];
 
    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');
 
    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        // the typeahead jQuery plugin expects suggestions to a
        // JavaScript object, refer to typeahead docs for more info
        matches.push({ value: str });
      }
    });
 
    cb(matches);
  };
};



$( document ).ready(function() {
       
    $('.section-header').next("div.section-form").hide();   
    $('.guidance').hide();
    $('div.bootstrap-tagsinput').addClass('col-md-12');
    $('.progress .progress-bar').progressbar({
        display_text: 'center'
        //,refresh_speed: 200
    });

    
    $(".section-header").click(function(){ // trigger
        $(this).next("div.section-form").slideToggle("fast"); // blendet beim Klick auf "dt" die nächste "dd" ein.
        $(this).children("a").toggleClass("closed open"); // wechselt beim Klick auf "dt" die Klasse des enthaltenen a-Tags von "closed" zu "open".
    });
    
    $('.question').tooltip({
        disabled: true,
        position: {
            my: "left-150",
            at: "right+160"
        },
        show: {
            delay: 0
        },
        hide: {
            fixed: true,
            delay: 0
        }
    }).on('focus', function () {
        $(this)
            .tooltip('enable')
            .tooltip('open');
    })
    /*
    .on('focusout', function () {
        $(this)
            .tooltip('close')
            .tooltip('disable');
    })
    */
    ;
 
    /*
    $('.question').on( 'focus', function() {
        //tooltips.tooltip( "open" );
        console.log( 'now show the tooltip' );
    });
    */
    
    
    /* 
    $('a.show-guidance').on('click', function(e){
        e.preventDefault();
        $(this).next('.guidance').show();
    });
    */
    $('.tags').tagsinput({
        typeahead: {
            source: ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
        }
    });
    
    $("input.slider").slider({
        tooltip: 'hide'
    });
    
    $("input.slider").on("slide", function( slideEvt )
    {
        $(this).parent().next('span.slider-value').html(slideEvt.value);       
    });
    
    $("input.slider-range").slider({
        tooltip: 'hide'
    });
    
    $("input.slider-range").on("slide", function( slideEvt )
    {
        $(this).parent().siblings('input.slider-range-input-alpha').val(slideEvt.value[0]).next('input.slider-range-input-omega').val(slideEvt.value[1]);
        $(this).parent().siblings('span.slider-range-display-alpha').html(slideEvt.value[0]).next('span.slider-range-display-omega').html(slideEvt.value[1]);
        
    });
    
        
    // realize as json include which is dynamically filled from the database
    
    var institutions = [
        'Deutsche Forschungsgesellschaft',
        'Technische Universität Berlin',
        'Universitätsbibliothek Technische Universität Berlin',
        'Fakultät I',
        'Fakultät II',
        'Fakultät III',
        'Fakultät IV',
        'Fakultät V',
        'Fakultät VI'
    ];
    
    /*
    $("input.typeahead").typeahead({
        hint: true,
        minLength: 3,
        highlight: true,
    },
    {
        name: 'institutions',
        displayKey: 'value',
        source: substringMatcher(institutions)
    });    
    */    
        
        
    /*    
    $('.tags').tagsInput({
        // my parameters here
        delimiter: '|',
        minChars: 3,
        width: '100%',
        height: 'auto',
        defaultText: 'Schlagwort hinzufügen & [Enter]',
        'onAddTag': sync_tags_inputs,
        'onRemoveTag': sync_tags_inputs,
        'onChange' : sync_tags_inputs
    });

    function sync_tags_inputs() {
        if ($('.tags').val() != '') {
            $('.tags_list').val( $('.tags').val() );            
        } else {
            $('.tags_list').val('');          
        }
    }
    */

});