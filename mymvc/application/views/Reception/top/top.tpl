
<link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">
                <img src="{$url}static/Navigation/{$logo.url}" alt="暂无logo" style="width: 140px;height: 50px">
            </div>
            <ul class="layui-nav layui-layout-left">
                {foreach from=$navigation item='val'}
                    {if $val.fID==1}
                    <li class="layui-nav-item">
                        <a href="{$val.pUrl}" target="body">
                            {$val.pName}
                        </a>
                    </li>
                    {/if}
                {/foreach}
            </ul>
        </div>
    </div>
<script src="{$jsUrl}jquery.js"></script>