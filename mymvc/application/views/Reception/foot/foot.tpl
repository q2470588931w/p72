<link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">


        <div class="layui-footer" style="background-color:white">
            <p style="height: 29px">
                {foreach from=$friendship item="val"}
                    &ensp;&ensp;<a href="{$val.url}" class="layui-btn layui-btn-sm layui-btn-normal">{$val.name}</a>&ensp;&ensp;
                {/foreach}
                &ensp;&ensp;{$statement}&ensp;&ensp;{$Notice}&ensp;&ensp;{$Company_address}&ensp;&ensp;{$Record_number}&ensp;&ensp;{$Internet_ICP_record}
            </p>
        </div>
