<div class="empy-character">
    <h2>Market</h2>
    <p class="tiny">
        Here you can trade your items for different kind of currency (Zen, Credits or/and Jewels).
        It is 100% safe to trade here - you can't be scammed and you will always get the items which you want!
    </p>
    <div class="centered" id="market-search">
        <form action="" method="post">
            <label>Search for an item</label><br />
            <input type="text" name="itemname" placeholder="Item name" />
            <select name="category">
                <option value="" selected>All categories</option>
                <optgroup label="Equipment">
                    <option value="">Swords</option>
                    <option value="">Axes</option>
                    <option value="">Armors</option>
                    <option value="">Helms</option>
                    <option value="">Boots</option>
                </optgroup>
                <optgroup label="Miscellaneous">
                    <option value="">Jewels</option>
                    <option value="">Spells</option>
                </optgroup>
            </select>
            <input type="button" name="search" value="Search" />
        </form> 
    </div>
    <table id="itemlist-table">
        <colgroup>
            <col style="width: 20px;"/>
            <col/>
            <col style="width: 150px;"/>
            <col style="width: 132px;"/>
        </colgroup>
        <tr>
            <td>#</td>
            <td>Item</td>
            <td>Price</td>
            <td>Options</td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <span class="normal">Black Dragon Armor</span>
            </td>
            <td>20 credits</td>
            <td>
                <input type="button" value="Buy" />
                <input type="button" value="Edit" />
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <span class="excellent">Bone Blade</span>
            </td>
            <td>250 credits</td>
            <td>
                <input type="button" value="Buy" />
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <span class="ancient">Wind Armor</span>
            </td>
            <td>400 credits</td>
            <td>
                <input type="button" value="Buy" />
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>
                <span class="socket">Guardian Shield</span>
            </td>
            <td>450 credits</td>
            <td>
                <input type="button" value="Buy" />
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>
                <span class="harmony">Dragon Armor</span>
            </td>
            <td>200 credits</td>
            <td>
                <input type="button" value="Buy" />
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>
                <span class="expensive">Legendary Armor</span>
            </td>
            <td>50 credits</td>
            <td>
                <input type="button" value="Buy" />
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>
                <span class="guardian">Venom Mist Armor</span>
            </td>
            <td>350 credits</td>
            <td>
                <input type="button" value="Buy" />
            </td>
        </tr>
    </table>
</div>