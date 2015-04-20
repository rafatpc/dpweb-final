<div id="userpanel-holder">
    <h2>Account Options</h2>
    <ul>
        <li>
            <a href="/user/overview">Account overview</a>
        </li>
        <li>
            <a href="/user/edit/password">Change Password</a>
        </li>
        <li>
            <a href="/user/edit/email">Change E-mail</a>
        </li>
        <li>
            <a href="/logout" id="logout-submit">Logout</a>
        </li>
    </ul>

    <h2>Character Options</h2>
    <ul>
        <li>
            <a href="/character/reset">Reset</a>
        </li>
        <li>
            <a href="/character/grandreset">Grand Reset</a>
        </li>
        <li>
            <a href="/character/addstats">Add stats</a>
        </li>
        <li>
            <a href="/character/doulestats">Double stat</a>
        </li>
        <li>
            <a href="/character/warp">Warp</a>
        </li>
        <li>
            <a href="/character/pkclear">PK Clear</a>
        </li>
    </ul>

    <h2>Items Options</h2>
    <ul>
        <li>
            <a href="/items/market">Market</a>
        </li>
        <li>
            <a href="/items/webshop">Webshop</a>
        </li>
        <li>
            <a href="/items/randomitem">Take random item</a>
        </li>
        <li>
            <a href="/items/auction">Auction</a>
        </li>
        <li>
            <a href="/items/quest">Web Quest</a>
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
    <form action="/logout" method="post" id="logout-form">
        <input type="hidden" name="logout" value="true" />
    </form>
</div>