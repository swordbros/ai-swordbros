<?php
$enc = $this->encoder();
?><div class="info-title">
<h1  style="font-size: 30px;
    line-height: 36px;
    font-weight: 700;
    text-align: center;"><?= $enc->attr( $this->label ); ?></h1></div>

<div class="info-body">
<?= $enc->attr( $this->content ); ?></div>

