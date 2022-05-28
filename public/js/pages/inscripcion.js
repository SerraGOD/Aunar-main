/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
    $('a[href="#finish"]').click(function () {
//        alert('Sign new href executed.');
        $("form").submit();
    });
    
    $('#periodo_academico_a').change(function () {
        var conYear = $('#periodo_academico_a').val();
        var conPer = $('#periodo_academico_b').val();
        
        $('#periodo_academico').val(conYear+'-'+conPer);
    });
    
    $('#periodo_academico_b').change(function () {
        var conYear = $('#periodo_academico_a').val();
        var conPer = $('#periodo_academico_b').val();
        
        $('#periodo_academico').val(conYear+'-'+conPer);
    });
});


