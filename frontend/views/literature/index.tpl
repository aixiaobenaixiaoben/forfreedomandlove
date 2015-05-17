<div class="program row">
    <div class="large-8 medium-8 columns">
        <div class="board">

            {if $tag!=''}
                <div class="tag-name">
                    <i class="large tag icon"></i>
                    <h4>{$tag.name}</h4>
                </div>
            {/if}

            {foreach $writings as $writing}
                <div class="item">
                    <div class="title">
                        <a href="/literature/{$writing.id}"><h5>{$writing.title}</h5></a>
                    </div>
                    <div class="content-summary">
                        <h5>{$writing.content}</h5>
                    </div>
                    <div class="about">
                        <i class="calendar icon"></i>
                        <a class="date">{$writing.created_at}</a>
                        <i class="pointing right icon"></i>
                        <a class="link"
                           href="/literature/{$writing.id}">forfreedomandlove.com/literature/{$writing.id}</a>
                    </div>
                </div>
            {/foreach}


        </div>
    </div>
    <div class="large-4 medium-4 columns">
        {include file="./literature_side.tpl"}
    </div>
</div>