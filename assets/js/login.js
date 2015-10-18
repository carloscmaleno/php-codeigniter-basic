/**
 * Created by carlos on 29/09/15.
 */
jQuery(document).ready(function($){

    $("a.login").click(function(e){

        e.preventDefault();

        $.post(ajaxUrl, {action: 'login'}, function(r){
           if(r.response){
               location.href = siteurl;
           }
        });

    });

    $("a.registro").click(function(e){

        e.preventDefault();

        $.post(ajaxUrl, {action: 'registro'}, function(r){
            if(r.response){
                location.href = siteurl;
            }
        });

    });
});