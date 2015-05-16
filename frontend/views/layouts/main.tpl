{use class='yii\helpers\Html'}
{$this->beginPage()}
<!DOCTYPE html>
<html lang="{Yii::$app->language}">
<head>
    <meta charset="{Yii::$app->charset}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {Html::csrfMetaTags()}
    <title>{Html::encode($this->title)}</title>

    {$this->registerCssFile('/css/index.css')}
    {$this->registerJsFile('/js/jquery.min.js')}
    {$this->registerJsFile('/js/index.js')}


    {$this->head()}
</head>
<body>
{$this->beginBody()}
{include file="./header.tpl"}
<div id="site-content">
    {$content}
</div>
{include file="./footer.tpl"}
{$this->endBody()}
</body>
</html>
{$this->endPage()}
