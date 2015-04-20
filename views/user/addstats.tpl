{if $r['LevelUpPoint'] > 0}
    {$lupp = 1}
{else}
    {$lupp = 0}
{/if}

{if $r['Money'] >= 1000000}
    {$money = 1}
{else}
    {$money = 0}
{/if}
{literal}
    <script type="text/javascript">
        function ptsAdd(gid) {
            $('#ptsadd-' + gid).stop().slideToggle(500);
        }
    </script>
{/literal}
<div class="user-option-box clearfix">
    <div class="form-holder">
        {if $money == 1 and $lupp == 1}
            <form>
                <input type="button" value="Add" onclick="ptsAdd({$r['gid']})" />
            </form>
        {else}
            <div class="disabled-button">
                Add
            </div>
        {/if}
    </div>
    <div class="table-holder">
        <table>
            <tr>
                <td>
                    {if $lupp == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    {$r['LevelUpPoint']|number_format:0:".":","} Points
                </td>
                <td>
                    {if $money == 1}
                        <img src="/{$layout['imgs']}check.png" alt="OK" />
                    {else}
                        <img src="/{$layout['imgs']}cancel.png" alt="NOT" />
                    {/if}
                    {1000000|number_format:0:".":","} Zen
                </td>
            </tr>
        </table>
    </div>
</div>
{if $money == 1 and $lupp == 1}
    <div class="points-added empy-character" id="ptsadd-{$r['gid']}">
        <form>
            <div class="left-column">
                <label>Strength <span>[<span>{$r['Strength']|number_format:0:".":","}</span>]</span></label>
                <input type="text" name="str" />
                <label>Agility <span>[<span>{$r['Dexterity']|number_format:0:".":","}</span>]</span></label>
                <input type="text" name="agi" />
            </div>
            <div class="left-column">
                <label>Vitality <span>[<span>{$r['Vitality']|number_format:0:".":","}</span>]</span></label>
                <input type="text" name="vit" />
                <label>Energy <span>[<span>{$r['Energy']|number_format:0:".":","}</span>]</span></label>
                <input type="text" name="ene" />
            </div>
            <div class="left-column">
                {if $r['Class'] > 60 and $r['Class'] < 70}
                    <label>Command <span>[<span>{$r['Leadership']|number_format:0:".":","}</span>]</span></label>
                    <input type="text" name="com" />
                {/if}
                <label>&nbsp;</label>
                <input type="submit" value="Add Stats" />
            </div>
        </form>
    </div>
{/if}