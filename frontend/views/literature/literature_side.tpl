<div class="side">
    <div class="list">
        <div class="title"><h5>目录</h5></div>

        {foreach $domains as $domain}
            {if count($domain.writings)==0}{continue}{/if}
            <div class="parent">
                <div class="line">
                    <a href="/literature/domain/{$domain.id}"><h5>{$domain.name}</h5></a>
                    <i class="large unordered list icon"></i>
                </div>
            </div>
            <div class="sub-list">
                {foreach $domain.writings as $writing}
                    <div class="child">
                        <a href="/literature/{$writing.id}">
                            <div class="line">
                                <i class="big angle right icon"></i>
                                <h6>{$writing.title}</h6>
                            </div>
                        </a>
                    </div>
                {/foreach}
            </div>
        {/foreach}

    </div>

    <div class="tag">

        <div class="title"><h5>标签</h5></div>

        {foreach $tags as $tag}
            {if count($tag.relationships)==0}{continue}{/if}
            <div class="parent">
                <a class="ui teal large ribbon label" href="/literature/tag/{$tag.id}">{$tag.name}</a>
                <a class="ui teal large tag  label" href="/literature/tag/{$tag.id}">{count($tag.relationships)}个话题</a>
            </div>
        {/foreach}


    </div>
</div>