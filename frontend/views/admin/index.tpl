<ul class="model-list">
    {foreach $models as $model_name=>$model_path}
    <li>
        <a href="/{$model_path}/index">{$model_name}</a><br>
    </li>
    {/foreach}
</ul>


