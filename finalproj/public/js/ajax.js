/**
 * Created by inet2005 on 12/12/16.
 */
//JQuery Stuff
$(document).ready(function() {

    // QTip Powered Tooltip functionality
    $('a.story').each(function() {
        $(this).qtip({
            content: {
                text: function(event, api) {
                    $.ajax({
                        url: '../ajax/' + api.elements.target.attr('id') // Use href attribute as URL
                    })
                        .then(function(content) {
                            // Set the tooltip content upon successful retrieval
                            api.set('content.text', content);
                        }, function(xhr, status, error) {
                            // Upon failure... set the tooltip content to error
                            api.set('content.text', status + ': ' + error + '  ../ajax/' + api.elements.target.attr('id'));
                        });

                    return 'Loading...'; // Set some initial text
                }
            },
            position: {
                viewport: $(window)
            },
            style: 'qtip-wiki'
        });
    });

    $('a.storyclick').each(function() {
        $(this).qtip({
            show: 'click',
            hide: 'click',
            content: {
                text: function(event, api) {
                    $.ajax({
                        url: '../ajax/' + api.elements.target.attr('id') // Use href attribute as URL
                    })
                        .then(function(content) {
                            // Set the tooltip content upon successful retrieval
                            api.set('content.text', content);
                        }, function(xhr, status, error) {
                            // Upon failure... set the tooltip content to error
                            api.set('content.text', status + ': ' + error + '  ../ajax/' + api.elements.target.attr('id'));
                        });

                    return 'Loading...'; // Set some initial text
                }
            },
            position: {
                viewport: $(window)
            },
            style: 'qtip-wiki'
        });
    });

    //a trick to get how long ago edited
    jQuery("LastEdited").timeago();
});


