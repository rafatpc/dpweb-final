{if !$characters}
    <div class="empy-character">
        <div>You don't have characters in your account yet.</div>
    </div>
{/if}

{$currentPage = "/"|explode:$smarty.server.REQUEST_URI}
{assign var="tplPath" value="./views/user/`$currentPage[2]`.tpl"}
{assign var="tplFile" value="./`$currentPage[2]`.tpl"}
{$opt = $currentPage[2]}
{foreach from=$characters key=k item=r}
    <div class="character clearfix">
        <div id="class-image">
            <img src="{$layout['baseurl']}{$layout['imgs']}classes/small/{$r['image']}.png" alt="{$r['image']}" />
        </div>
        <div id="character-info">
            <table>
                <tr>
                    <td>
                        <h2>{$r['Name']}</h2>
                        {if $r['status'] == 1}
                            <span class="online char-status">Online</span>
                        {else}
                            <span class="offline char-status">Offline</span>
                        {/if}
                    </td>
                    <td>Level {$r['cLevel']}</td>
                    <td>{$r['Resets']} Resets</td>
                </tr>
                <tr>
                    <td>{$r['classname']}</td>
                    <td>Strength {$r['Strength']|number_format:0:".":","}</td>
                    <td>Agility {$r['Dexterity']|number_format:0:".":","}</td>
                </tr>
                <tr>
                    <td>Vitality {$r['Vitality']|number_format:0:".":","}</td>
                    <td>Energy {$r['Energy']|number_format:0:".":","}</td>
                    <td>
                        {if $r['image'] === 'dl'}
                            Command {$r['Leadership']|number_format:0:".":","}
                        {else}
                            {$r['Money']|number_format:0:".":","} Zen
                        {/if}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {if file_exists($tplPath)}
        {include file=$tplFile}
    {/if}
{/foreach}