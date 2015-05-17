<div class="program row">
    <div class="large-8 medium-8 columns">
        <div class="view">

            <div class="item">
                <div class="title">
                    <h4>{$writing.title}</h4>
                </div>
                <div class="about">
                    <i class="calendar icon"></i>
                    <a class="date">{$writing.created_at}</a>
                    <i class="tag icon"></i>
                    <a class="tag-name" href="/literature/domain/{$writing.domain.id}">{$writing.domain.name}</a>
                </div>
            </div>

            <div class="content">
                <h5>
                    {$writing.content}
                </h5>
            </div>


        </div>
    </div>
    <div class="large-4 medium-4 columns">
        {include file="./literature_side.tpl"}
    </div>
</div>