{if $r['Resets'] == 999}
    {$resetLimit = 1}
{else}
    {$resetLimit = 0}
{/if}

{if $r['cLevel'] >= 400}
    {$level = 1}
{else}
    {$level = 0}
{/if}

{if $r['Money'] >= 2000000000}
    {$money = 1}
{else}
    {$money = 0}
{/if}

<div class="user-option-box clearfix">
    <div class="form-holder">
        {if $money == 1 and $level == 1 and $resetLimit == 1}
            <form method="post" action="./grandreset/{$r['gid']}-{$r['Name']}">
                <input type="submit" value="Reset" />
                <input type="hidden" value="{$r['gid']}" name="gid" />
            </form>
        {else}
            <div class="disabled-button">
                Reset
            </div>
        {/if}
    </div>
    <div class="table-holder">
        <table>
            <tr>
                <td>
                    {if $resetLimit == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    999 Resets
                </td>
                <td>
                    {if $level == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    Level 400
                </td>
                <td>
                    {if $money == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    {2000000000|number_format:0:".":","} Zen
                </td>
            </tr>
        </table>
    </div>
</div>