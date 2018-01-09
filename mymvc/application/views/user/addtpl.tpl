  账  号：<input type="text" id="name"><br>
  密  码：<input type="password" id="pass"><br>
确认密码：<input type="password"  id="pass2"><br>
  权限：<select  id="grade">
      {foreach from=$grade item="val"}
        <option value="{$val.gID}">{$val.gName}</option>
      {/foreach}
  </select>