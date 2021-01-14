<br />

<div class="container">
    <div class="row">
        <div class="col">
            <h3><?=$page->title->rendered?></h3>
            <?=$page->content->rendered?>
        </div>
    </div>
</div>

<pre><?=print_r($page, true)?></pre>
