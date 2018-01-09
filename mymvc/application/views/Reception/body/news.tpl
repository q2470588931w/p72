<link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
<div class="layui-layout layui-layout-admin" style="background-color: ">
    <div class="layui-carousel" id="test2" style="margin-top: 15px;margin: auto">
        <div carousel-item="" >
            {foreach from=$carousel item='val'}
                <div style="text-align: center"><img src="{$url}static/news/Carousel/{$val.cUrl}" alt="暂无图片"></div>
            {/foreach}
        </div>
    </div>
    <table class="layui-table" >
        <thead>
        <tr>
            {literal}
            <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
            <th lay-data="{field:'id', width:80, sort: true, fixed: true}">序号</th>
            <th lay-data="{field:'sign', width:160}">新闻</th>
            {/literal}
        </tr>
        </thead>
        <tbody>
            {foreach from=$news item='val' key='key'}
                <tr>
                    {literal}
                        <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
                    {/literal}
                    <td>{$key+1}</td>
                    <td>
                        <a href="#" class="news">
                            {$val.nTitle}
                        </a><input type="hidden" value="{$val.nID}" >
                        <span style="float: right">
                            {$val.nTime}
                        </span>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

</div>

<script src="{$jsUrl}jquery.js"></script>
<script src="{$layUrl}layui.js" charset="utf-8"></script>
<script>
    {literal}
    layui.use(['carousel', 'form'], function(){
        var carousel = layui.carousel
                ,form = layui.form;


        //改变下时间间隔、动画类型、高度
        carousel.render({
            elem: '#test2'
            ,interval: 1800
            ,anim: 'fade'
            ,height: '120px'
        });

        var $ = layui.$, active = {
            set: function(othis){
                var THIS = 'layui-bg-normal'
                        ,key = othis.data('key')
                        ,options = {};

                othis.css('background-color', '#5FB878').siblings().removeAttr('style');
                options[key] = othis.data('value');
                ins3.reload(options);
            }
        };

        //监听开关
        form.on('switch(autoplay)', function(){
            ins3.reload({
                autoplay: this.checked
            });
        });

        $('.demoSet').on('keyup', function(){
            var value = this.value
                    ,options = {};
            if(!/^\d+$/.test(value)) return;

            options[this.name] = value;
            ins3.reload(options);
        });

        //其它示例
        $('.demoTest .layui-btn').on('click', function(){
            var othis = $(this), type = othis.data('type');
            active[type] ? active[type].call(this, othis) : '';
        });
    });
    $('.news').click(function(){
        var url  = $(this).next().val();
        //console.log(url);
        layer.open({
            type:2,
            area:['700px','500px'],
            title:'新闻',
            shade:0.6,
            anim:2,
            {/literal}
            content: '{$url}index/temp1/('+url+')',
            {literal}
            cancel:function(){
                //右上角关闭回调
            },
            yes:function(index){
                var name = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("name").value;

                var url  = document.getElementById("layui-layer-iframe" + index).contentWindow.document.getElementById("url").value;
                $.ajax({
                    {/literal}
                    url:'{$url}navigation/addChild',
                    {literal}
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    timeout:5000,    //超时时间
                    data:{'name':name,'url':url,'pid':pid},
                    dataType:'text',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data){
                        if(data==1100){
                            layer.msg('添加成功');
                            setTimeout(function(){
                                self.location.reload();//页面刷新
                            },1000);
                        }else {
                            alert(data);
                        }

                    },
                    error:function(xhr,textStatus){
                        console.log('错误')
                    }
                });
                layer.close();
            }
        })
    })
    {/literal}
</script>