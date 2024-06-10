<?php
if(isset($item))
    echo <<<HTML
<div class="col-sm-4">
  <div class="card border-dark mb-4">
    <div class="card-header text-center">{$item->getTitle()}</div>
    <div class="card-body">{$item->getDescription()}</div>
    <div class="card-footer text-center">{$item->getPrice()} euro</div>
  </div>
</div>
HTML;