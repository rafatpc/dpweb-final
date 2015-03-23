<div id="userpanel-holder">
    <h2>Account Options</h2>
    <ul>
        <li>
            <a href="{$layout['baseurl']}user/overview">Account overview</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}user/edit/password">Change Password</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}user/edit/email">Change E-mail</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}logout.php" id="logout-submit">Logout</a>
        </li>
    </ul>

    <h2>Character Options</h2>
    <ul>
        <li>
            <a href="{$layout['baseurl']}character/reset">Reset</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}character/grandreset">Grand Reset</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}character/addstats">Add stats</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}character/doulestats">Double stat</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}character/warp">Warp</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}character/pkclear">PK Clear</a>
        </li>
    </ul>

    <h2>Items Options</h2>
    <ul>
        <li>
            <a href="{$layout['baseurl']}items/market">Market</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}items/webshop">Webshop</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}items/randomitem">Take random item</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}items/auction">Auction</a>
        </li>
        <li>
            <a href="{$layout['baseurl']}items/quest">Web Quest</a>
        </li>
    </ul>

    <h2>Credits Options</h2>
    <ul>
        <li>
            <a href="#">Buy credits</a>
        </li>
        <li>
            <a href="#">Referal System</a>
        </li>
        <li>
            <a href="#">Games</a>
        </li>
    </ul>

    {if !$admin}
        <h2>Admin Options</h2>
        <ul>
            <li>
                <a href="#">Ban/Unban</a>
            </li>
            <li>
                <a href="#">Character Edit</a>
            </li>
            <li>
                <a href="#">Account Edit</a>
            </li>
            <li>
                <a href="#">Web Settings</a>
            </li>
        </ul>
    {/if}
    <hr />
    <form action="{$layout['baseurl']}logout.php" method="post" id="logout-form">
        <input type="hidden" name="logout" value="true" />
    </form>
</div>