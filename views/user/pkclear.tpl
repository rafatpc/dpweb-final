{if $r['PkLevel'] > 3}
    {$kills = 1}
{else}
    {$kills = 0}
{/if}

{$reqMoney = (1000000 * ($r['PkLevel'] - 3))}
{if $reqMoney <= 0}
    {$reqMoney = 0}
{/if}

{if $r['Money'] >= $reqMoney}
    {$money = 1}
{else}
    {$money = 0}
{/if}

<div class="user-option-box clearfix">
    <div class="form-holder">
        {if $money == 1 and $kills == 1}
            <form method="post" action="./pkclear/{$r['gid']}-{$r['Name']}">
                <input type="submit" value="Clear" />
                <input type="hidden" value="{$r['gid']}" name="gid" />
            </form>
        {else}
            <div class="disabled-button">
                Clear
            </div>
        {/if}
    </div>
    <div class="table-holder">
        <table>
            <tr>
                <td>
                    {if $kills == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    Murderer Level
                </td>
                <td>
                    {if $money == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    {$reqMoney|number_format:0:".":","} Zen
                </td>
            </tr>
        </table>
    </div>
</div>