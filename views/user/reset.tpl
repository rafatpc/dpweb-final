<div class="user-option-box">
    <table>
        <tr>
            <td>
                <form method="post" action="./{$r['gid']}">
                    <input type="submit" value="Reset" />
                    <input type="hidden" value="{$r['gid']}" name="gid" />
                </form>
            </td>
            <td>
                {if $r['Resets'] < 999}
                    <img src="{$layout['baseurl']}{$layout['imgs']}check.png" alt="OK" />
                {else}
                    <img src="{$layout['baseurl']}{$layout['imgs']}cancel.png" alt="NOT" />
                {/if}
                Under 999 Resets
            </td>
            <td>
                {if $r['cLevel'] >= 400}
                    <img src="{$layout['baseurl']}{$layout['imgs']}check.png" alt="OK" />
                {else}
                    <img src="{$layout['baseurl']}{$layout['imgs']}cancel.png" alt="NOT" />
                {/if}
                Level 400
            </td>
            <td>
                {if $r['Money'] >= 10000000}
                    <img src="{$layout['baseurl']}{$layout['imgs']}check.png" alt="OK" />
                {else}
                    <img src="{$layout['baseurl']}{$layout['imgs']}cancel.png" alt="NOT" />
                {/if}
                {10000000|number_format:0:".":","} Zen
            </td>
        </tr>
    </table>
</div>