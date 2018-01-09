
<link rel="stylesheet" href="{$cssUrl}index/body.css" >
<link href="{$cssUrl}index/style.css" rel="stylesheet" type="text/css" media="all" />
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="container">
                    <div id="portfoliolist">
                        {foreach from=$men item="val"}
                        <div class="portfolio logo1" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="{$url}static/role/{$val.mImg}"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title">{$val.cName}——{$val.mName}</p>
                                        <span class="text-category">{$val.levalName}——{$val.modelName}</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                        {/foreach}

<script src="{$jsUrl}jquery.js"></script>
<script type="text/javascript" src="{$jsUrl}jquery.mixitup.min.js"></script>
<script>
    {literal}
    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {

                // Simple parallax effect
                $('#portfoliolist .portfolio').hover(
                        function () {
                            $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                            $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                        },
                        function () {
                            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                        }
                );

            }

        };

        // Run the show!
        filterList.init();

    });
    {/literal}
</script>