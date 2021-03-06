<div class="program row">
    <div class="large-8 medium-7 columns">
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
                        <a href="/{$writing.id}"><h5>{$writing.title}</h5></a>
                    </div>
                    <div class="content-summary">
                        <h5>{$writing.content|truncate:100:"[……]"}</h5>
                    </div>
                    <div class="about">
                        <div class="large-5 columns">
                            <i class="calendar icon"></i>
                            <a class="date">{$writing.created_at}</a>
                        </div>
                        <div class="large-7 columns">
                            <i class="pointing right icon"></i>
                            <a class="link" href="/{$writing.id}">freedomandlove.com/{$writing.id}</a>
                        </div>
                    </div>
                </div>
            {/foreach}


        </div>
    </div>
    <div class="large-4 medium-5 columns">
        {include file="./side.tpl"}
    </div>
</div>