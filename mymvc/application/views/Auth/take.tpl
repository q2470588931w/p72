<link rel="stylesheet" href="{$cssUrl}Auth/take.css">
    <div class="main">
        <table>
            <tr>
                <th>有</th>
                <td>
                    <select multiple="multiple" class="let" id="have">
                        {foreach from=$had item="val"}
                            <option value="{$val}">{$val}</option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <div class="cer">
                        <button>——></button>
                        <button>====></button>
                        <button><——</button>
                        <button><====</button>
                    </div>
                </td>
                <td>
                    <select multiple="multiple" class="rit">
                        {foreach from=$not item="val"}
                            <option value="{$val}">{$val}</option>
                        {/foreach}
                    </select>
                </td>
                <th>无</th>
            </tr>
        </table>
    </div>
<script src="{$jsUrl}jquery.js"></script>
<script src="{$jsUrl}Auth/take.js"></script>
