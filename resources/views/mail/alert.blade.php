<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

PL&R notification alert a change was made for <i>{{ $alert->company }}</i>
 
<div>
<p><b>Message:</b></p>
<p>
    {{ $alert->msj }}
</p>
</div>

 
Thank You, 
<br/>
<i>{{ $alert->sender }}</i>
<p>
    Please do not reply to this message, the email is only for dispatch of alerts.
</p>
