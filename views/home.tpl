{foreach from=$layout['news'] key=k item=v}
    <div class="news">
        <h2>{$k}</h2>
        <p>{$v}</p>
    </div>
{/foreach}