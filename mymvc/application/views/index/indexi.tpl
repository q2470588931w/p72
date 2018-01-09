<link rel="stylesheet" href="{$layUrl}css/layui.css">
<div class="layui-body" name="right">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            {section name=sec1 loop=$admin}
                欢迎您：{$admin[sec1].gName}
                <br>
                您使用的账号: {$admin[sec1].user}
                您的权限是：{$admin[sec1].gName}
                <br>
                您的上次登录时间是: {$loginTime}
                <br>
                您的上次登录IP地址是: {$loginIP}
                <br>
                不是本人登录的？
                <a href="{$url}userPass/my" class="layui-btn layui-btn-xs">点这里</a>
            {/section}
        </div>
</div>
