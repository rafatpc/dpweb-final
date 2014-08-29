{if $r['Money'] >= 1000000}
    {$money = 1}
{else}
    {$money = 0}
{/if}

<div class="user-option-box clearfix">
    <div class="form-holder">
        {if $money == 1}
            <form method="post" action="./warp/{$r['gid']}-{$r['Name']}">
                <input type="submit" value="Warp" />
                <input type="hidden" value="{$r['gid']}" name="gid" />
            </form>
        {else}
            <div class="disabled-button">
                Warp
            </div>
        {/if}
    </div>
    <div class="table-holder">
        <table>
            <tr>
                <td>
                    {if $money == 1}
                        <img src="{$layout['baseurl']}{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="{$layout['baseurl']}{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    {1000000|number_format:0:".":","} Zen
                </td>
                <td>
                    {$r['MapNumber']}
                </td>
                <td>
                    X: {$r['MapPosX']} Y: {$r['MapPosY']}
                </td>
            </tr>
        </table>
    </div>
</div>