<div id="userpanel-holder">
    <h2>Account Options</h2>
    <ul>
        <li>
            <a href="./user/overview">Account overview</a>
        </li>
        <li>
            <a href="./user/edit/password">Change Password</a>
        </li>
        <li>
            <a href="./user/edit/email">Change E-mail</a>
        </li>
        <li>
            <a href="./logout.php" id="logout-submit">Logout</a>
        </li>
    </ul>

    <h2>Character Options</h2>
    <ul>
        <li>
            <a href="#">Reset</a>
        </li>
        <li>
            <a href="#">Grand Reset</a>
        </li>
        <li>
            <a href="#">Add stats</a>
        </li>
        <li>
            <a href="#">Double stat</a>
        </li>
        <li>
            <a href="#">Warp</a>
        </li>
        <li>
            <a href="#">PK Clear</a>
        </li>
    </ul>

    <h2>Items Options</h2>
    <ul>
        <li>
            <a href="#">Market</a>
        </li>
        <li>
            <a href="#">Webshop</a>
        </li>
        <li>
            <a href="#">Take random item</a>
        </li>
        <li>
            <a href="#">Auction</a>
        </li>
        <li>
            <a href="#">Web Quest</a>
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
    <form action="logout.php" method="post" id="logout-form">
        <input type="hidden" name="logout" value="true" />
    </form>
</div>